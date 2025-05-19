<?php
header("Content-Type: application/json");

require_once __DIR__ . "/../php_sup/pdo.php";

$data = json_decode(file_get_contents("php://input"), true);
if (!$data || empty($data["preset_name"])) {
    echo json_encode(["success" => false, "message" => "Preset name missing."]);
    exit;
}

// Séparation des champs
$preset_name = $data["preset_name"];
$preset_ip = $data["preset_ip"] ?? "unknown";
$permission = $data["permission"] ?? 0;

// Champs à exclure de la comparaison complète
$exclude_keys = ["preset_name", "preset_ip", "permission", "preset_id"];

// Filtrage pour comparaison
$filtered_data = array_filter($data, function($key) use ($exclude_keys) {
    return !in_array($key, $exclude_keys);
}, ARRAY_FILTER_USE_KEY);

// 🔍 Vérifier si un preset avec le même nom existe
$stmt = $pdo->prepare("SELECT * FROM presets WHERE preset_name = ?");
$stmt->execute([$preset_name]);
if ($stmt->rowCount() > 0) {
    echo json_encode(["success" => false, "message" => "This name is already used"]);
    exit;
}

// 🔍 Vérifier si un preset avec les mêmes paramètres existe
$query = "SELECT * FROM presets";
$all_presets = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

foreach ($all_presets as $preset) {
    $match = true;
    foreach ($filtered_data as $key => $value) {
        if (!isset($preset[$key]) || $preset[$key] != $value) {
            $match = false;
            break;
        }
    }
    if ($match) {
        // Ajout de l'ID du preset existant dans le message
        echo json_encode([
            "success" => false,
            "message" => "An identical preset already exists. ID : ".$preset["preset_id"],
            "preset_id" => $preset["preset_id"]  // Ajouter l'ID du preset existant
        ]);
        exit;
    }
}

// ✅ Insérer le preset
unset($data["preset_id"]); 
$columns = array_keys($data);
$placeholders = implode(",", array_fill(0, count($columns), "?"));
$colnames = implode(",", $columns);

$stmt = $pdo->prepare("INSERT INTO presets ($colnames) VALUES ($placeholders)");
$stmt->execute(array_values($data));
header("Content-Type: application/json"); // Pour forcer le JSON sinon il capte pas. J'ai essayé les deux manières de faire (info dans le php, info dans le js).
echo json_encode([
    "success" => true,
    "message" => "Added preset.",
    "preset_id" => $pdo->lastInsertId()
]);
?>
