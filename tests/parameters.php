<?php
$conn = new mysqli('localhost', 'root', '', 'all_star_tower_rater');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Requête SQL pour récupérer la première ligne
$sql = "SELECT * FROM presets ORDER BY id LIMIT 1";
$result = $conn->query($sql);

// Vérification et envoi des données JSON
header("Content-Type: application/json; charset=UTF-8");

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc(); // Récupérer la ligne sous forme de tableau associatif
    echo json_encode([$data]); // Retourner le JSON
} else {
    echo json_encode([]); // Retourner un tableau vide si aucune donnée
}

$conn->close();
?>