<?php require_once __DIR__ . '/../php_sup/pdo.php';
$sortie = $pdo->query("SELECT * FROM presets");
echo json_encode($sortie->fetchAll(PDO::FETCH_ASSOC));
?>