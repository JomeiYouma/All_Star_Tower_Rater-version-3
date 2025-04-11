<?php
require 'db_connection.php'; // Assurez-vous d'inclure votre connexion à la BDD

if (!empty($_GET['name'])) {
    $name = '%' . $_GET['name'] . '%';

    $sql = "SELECT id, name_in_game, name_real FROM units WHERE name_in_game LIKE :name OR name_real LIKE :name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
}
?>
