<?php
header("Content-Type: application/json");

require_once __DIR__ . "/../php_sup/pdo.php";

// Lecture des données reçues
$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    echo json_encode(["success" => false, "message" => "Aucune donnée reçue."]);
    exit;
}

// Champs à ignorer dans la comparaison
$exclude_keys = ["preset_name", "preset_ip", "permission", "preset_id"];

// Données filtrées (à comparer)
$filtered_data = array_filter($data, function($key) use ($exclude_keys) {
    return !in_array($key, $exclude_keys);
}, ARRAY_FILTER_USE_KEY);

// On récupère tous les presets de la base
$query = "SELECT * FROM presets";
$all_presets = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

// Vérifie si un preset identique existe
foreach ($all_presets as $preset) {
    $match = true;
    foreach ($filtered_data as $key => $value) {
        if (!isset($preset[$key]) || $preset[$key] != $value) {
            $match = false;
            break;
        }
    }
    if ($match) {
        //Trouvé
        echo json_encode([
            "success" => true,
            "message" => "Presset applied.",
            "preset_id" => $preset["preset_id"]
        ]);
        exit;
    }
}

//Aucun preset identique
echo json_encode([
    "success" => false,
    "message" => "No identical preset found. Your settings will not be saved after closing the browser tab."
]);
?>