<?php
$pdo = new PDO("mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8", "root", "");
$sortie = $pdo->query("SELECT * FROM presets");
echo json_encode($sortie->fetchAll(PDO::FETCH_ASSOC));
?>