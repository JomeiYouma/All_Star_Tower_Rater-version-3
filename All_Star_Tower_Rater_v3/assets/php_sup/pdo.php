<?php

$pdo = new PDO(
    "mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8",
    "root",
    ""
);
/* try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8",
        "root",
        ""
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => true, "message" => "Connexion échouée : " . $e->getMessage()]);
    exit;
} */
?>