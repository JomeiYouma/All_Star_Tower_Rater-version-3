
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tpOneTwo.php">
        <input type="number" name="number">Niveau de bègue.
    </form>

<?php
if (isset($_GET['number']) /* && is_numeric($_GET['number']) */) {
    $max = /* (int) */ $_GET['number'];

    for ($i = 0; $i < $max; $i++) {
        echo "Bonjour numéro $i <br>";
    }
} else {
    echo "Veuillez fournir un nombre valide.";
}
?>
<br>
<form action="tpOneTwo.php" method="GET">
    <select name="resolution" id="resolution">
        <option value="1">4k</option>
        <option value="2">HD</option>
        <option value="3">SD</option>
    </select><br><br>
    <input type="radio" id="fr" name="lang" value="fr" />Français
    <input type="radio" id="eng" name="lang" value="eng" />English
    <input type="submit" name="bouton_soumettre" value="Envoyer">
</form>

<?php

if (isset($_GET['resolution'])) {
    switch ($_GET ["resolution"]) {
        case "3":
        $largeur = 320;
        $hauteur = 200;
        break;
        case "2":
        $largeur = 512;
        $hauteur = 368;
        break;
        case "1":
        $largeur = 750;
        $hauteur = 512;
        break;
        }
    
    echo "<img src='mj.png' width='$largeur' height='$hauteur' alt=''>";;
    
} else {
    echo "Veuillez fournir une resolution   ";
}

?>

</body>
</html>

