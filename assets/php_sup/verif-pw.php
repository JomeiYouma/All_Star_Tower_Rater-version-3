<?php //Script de vérification de mot de passe. Inspiré de https://www.primfx.com/securiser-mot-de-passe-php-password-hash-verify/
require "./db.php";

if (!empty($_POST["login"]) && !empty($_POST["password"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];

    var_dump($login);
    var_dump($password);

    $q = $db->prepare("SELECT * FROM users WHERE login = :login");
    $q->bindValue("login", $login);
    $q->execute();
    $res = $q->fetch(PDO::FETCH_ASSOC);

    var_dump($res);

    if ($res) {
        $passwordHash = $res["password"];
        if (password_verify($password, $passwordHash)) {
            echo "Connexion réussie !";
            // Exécute la requête et récupère les résultats triés (concaténation avec \ parce que sinon je ne m'y retrouve plus.)
            /*  $sortie = $pdo->query("SELECT * FROM glossary ORDER BY glossary_name");
            $glossaryData = $sortie->fetchAll(PDO::FETCH_ASSOC);

            $currentLetter = '';
            foreach ($glossaryData as $entry) {
                $term = $entry['glossary_name'];
                $definition = $entry['glossary_explaination'];
                $firstLetter = strtoupper($term[0]); */

            // Affiche le terme et sa définition
            /*            echo "<div class=\"term\">\n";
                echo "  <h2>$term</h2>\n";
                echo "  <p>$definition</p>\n";
                echo "</div>\n"; 
            }*/
        } else {
            echo "Identifiants invalides";
        }
    } else {
        echo "Identifiants invalides";
    }
} ?>
