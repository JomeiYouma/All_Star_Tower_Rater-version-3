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

        } else {
            echo "Identifiants invalides";
        }
    } else {
        echo "Identifiants invalides";
    }
} ?>
