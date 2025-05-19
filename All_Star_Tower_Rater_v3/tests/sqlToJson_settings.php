<?php
require_once 'pdo.php';
$sortie = $pdo->query("SELECT * FROM presets");
echo json_encode($sortie->fetchAll(PDO::FETCH_ASSOC));
?>