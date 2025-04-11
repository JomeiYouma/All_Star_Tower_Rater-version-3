<?php
var_dump($_GET);
$conn = new PDO("mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8","root",""); //Se connecter au localhost

$sql = "SELECT * FROM units WHERE 1=1"; //Construction de la base et de la structure de la requête SQL
$params = [];

//-----------------------------------DIFFERENTS FILTRES

if(!empty($_GET['name'])){
    $sql .= " AND (name_in_game LIKE :name OR name_real LIKE :name)";
    $params['name'] = "%" . $_GET['name'] . "%";
}

if(!empty($_GET['role'])){
    $sql .= " AND (role_start LIKE :role)";
    $params['role'] = "%" . $_GET['role'] . "%";
}

if(!empty($_GET['enchant'])){
    $sql .= " AND (enchant LIKE :enchant)";
    $params['enchant'] = $_GET['enchant'];
}

/* $_GET['maxPlacement'] = '1'; */ 

if (!empty($_GET['max_placement'])) {
    $sql .= " AND placement = :max_placement";
    $params['max_placement'] = $_GET['max_placement'];
}


$mapping = [
    'ground' => ['Ground'],   // "ground" doit rechercher "Ground"
    'hill'   => ['Hill'], // "hill" doit rechercher "Hill"
    'hybrid'   => ['Hybrid'], // "hybrid" doit rechercher "Hybrid"
    'only_air' => ['Only Air'],
    'hill_hybrid'  => ['Hill', 'Hybrid'], // "hill_hybrid" doit rechercher "Hill" OU "Hybrid"
    'hill_hybrid_only_air' => ['Hill', 'Hybrid', "Only Air"], // Les trois.
];

$mapping = [
    'ground' => ['Ground'],   
    'hill'   => ['Hill'], 
    'hybrid'   => ['Hybrid'], 
    'only_air' => ['Only Air'],
    'hill_hybrid'  => ['Hill', 'Hybrid'], 
    'hill_hybrid_only_air' => ['Hill', 'Hybrid', "Only Air"], 
];

// Merci ChatGPT pour la syntaxe et l'idée d'utiliser les différentes méthodes pour ce formulaire.
if (!empty($_GET['air']) && array_key_exists($_GET['air'], $mapping)) {
    $values = $mapping[$_GET['air']]; // Récupère la liste des valeurs à rechercher

    // Si plusieurs valeurs (cas de "both"), on utilise IN()
    if (count($values) > 1) {
        $placeholders = [];
        foreach ($values as $index => $value) {
            $placeholder = ":value" . $index; // Crée un nom de variable unique
            $placeholders[] = $placeholder;
            $params[$placeholder] = $value; // Ajoute la valeur au tableau de paramètres
        }
        $sql .= " AND (hit_air_start IN (" . implode(', ', $placeholders) . "))";
    } else {
        $sql .= " AND (hit_air_start = :value0)";
        $params[':value0'] = $values[0]; // Ajoute la valeur au tableau de paramètres
    }
}


$mappingDifficulty = [
    'f' => ['%f%'],
    'e' => ['%e%', '%f%'],
    'd' => ['%d%', '%e%', '%f%'],
    'c' => ['%c%', '%d%', '%e%', '%f%'],
    'b' => ['%b%', '%c%', '%d%', '%e%', '%f%'],
    'a' => ['%a%', '%b%', '%c%', '%d%', '%e%', '%f%'],
    's' => ['%s%'], // S doit chercher uniquement %s%
];

if (!empty($_GET['maxPlacement']) && array_key_exists($_GET['maxPlacement'], $mappingDifficulty)) {
    $values = $mappingDifficulty[$_GET['maxPlacement']]; // Récupère la liste des valeurs à rechercher

    if (count($values) > 1) {
        $conditions = [];
        foreach ($values as $index => $value) {
            $placeholder = ":difficulty" . $index; // Crée un nom de variable unique
            $conditions[] = "farming_difficulty LIKE $placeholder"; // Ajoute la condition pour LIKE
            $params[$placeholder] = $value; // Ajoute la valeur au tableau de paramètres
        }
        $sql .= " AND (" . implode(' OR ', $conditions) . ")";
    } else {
        $sql .= " AND (farming_difficulty LIKE :difficulty0)";
        $params[':difficulty0'] = $values[0]; // Ajoute la valeur au tableau de paramètres
    }
}


if (!empty($_GET['roleNbr'])) {
    if ($_GET['roleNbr'] == 'one') {
        $sql .= " AND role_start NOT LIKE :pattern";
        $params['pattern'] = '%.%'; 
    }
    if ($_GET['roleNbr'] == 'two') {
        $sql .= " AND role_start LIKE :pattern";
        $params['pattern'] = '%.%'; 
    }
    if ($_GET['roleNbr'] == 'three') {
        $sql .= " AND role_start LIKE :pattern";
        $params['pattern'] = '%.%.%'; 
    }
    if ($_GET['roleNbr'] == 'four') {
        $sql .= " AND role_start LIKE :pattern";
        $params['pattern'] = '%.%.%.%'; 
    }
    if ($_GET['roleNbr'] == 'oneNoExecuter') {
        $sql .= " AND role_start NOT LIKE :pattern AND role_start NOT LIKE :executionner";
        $params['pattern'] = '%.%'; 
        $params['executionner'] = '%Executionner%';
    }
}

if (!empty($_GET['startCost'])) {
    if ($_GET['startCost'] == 'minus500') {
        $sql .= " AND prix_start <= :prix_start1";
        $params['prix_start1'] = 500; 
    }
    if ($_GET['startCost'] == 'between500and550') {
        $sql .= " AND prix_start BETWEEN :prix_start1 AND :prix_start2";
        $params['prix_start1'] = 501;
        $params['prix_start2'] = 550; 
    }
    if ($_GET['startCost'] == 'between550and600') {
        $sql .= " AND prix_start BETWEEN :prix_start1 AND :prix_start2";
        $params['prix_start1'] = 551;
        $params['prix_start2'] = 600; 
    }
    if ($_GET['startCost'] == 'minus1000') {
        $sql .= " AND prix_start < :prix_start1";
        $params['prix_start1'] = 1000; 
    }
    if ($_GET['startCost'] == 'plus1000') {
        $sql .= " AND prix_start > :prix_start1";
        $params['prix_start1'] = 1000;
    }
}

if (!empty($_GET['maxCost'])) {
    if ($_GET['maxCost'] == 'minus50k') {
        $sql .= " AND prix_max < :max_cost1";
        $params['max_cost1'] = 50000; 
    }
    if ($_GET['maxCost'] == 'minus100k') {
        $sql .= " AND prix_max < :max_cost1";
        $params['max_cost1'] = 100000; 
    }
    if ($_GET['maxCost'] == 'minus1mil') {
        $sql .= " AND prix_max < :max_cost1";
        $params['max_cost1'] = 1000000; 
    }
    if ($_GET['maxCost'] == 'minus5mil') {
        $sql .= " AND prix_max < :max_cost1";
        $params['max_cost1'] = 5000000; 
    }
    if ($_GET['maxCost'] == 'minus10mil') {
        $sql .= " AND prix_max < :max_cost1";
        $params['max_cost1'] = 10000000; 
    }
    if ($_GET['maxCost'] == 'plus10mil') {
        $sql .= " AND prix_max > :max_cost1";
        $params['max_cost1'] = 10000000; 
    }
}

if (!empty($_GET['abilityType'])) {
    $sql .= "
        AND EXISTS (
            SELECT 1
            FROM start_ability_attribution
            JOIN abilities ON start_ability_attribution.id_ability = abilities.id
            JOIN ability_type_attribution ON abilities.id = ability_type_attribution.id_ability
            JOIN ability_types ON ability_type_attribution.id_ability_type = ability_types.ID_ABILITY_TYPE
            WHERE start_ability_attribution.id_unit = units.id
            AND ability_types.ABILITY_TYPE = :ability_type
            )
        ";
    $params['ability_type'] = $_GET['abilityType'];
}

//-----------------------------------FIN DES FILTRES

echo "Requête SQL : " . $sql . "<br>"; //Pour vérifier la requête SQL
echo "Paramètres : ";
print_r($params);

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$units = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - All Star Tower Rater v0.2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
<br>
<a class="title" href="index.php">ALL STAR TOWER RATER v0.2</a><br><br>
<a href="engine.php">Return to search</a><br>
    <h2>Search Results</h2>
    <h3><?php echo count($units); ?> units found.</h3>
    <?php if (count($units) > 0): ?>
        <ul>
            <?php foreach ($units as $unit): ?>
                <li>
                    <strong><?= htmlspecialchars($unit['name_real']) ?></strong> - 
                    <img src="/All_Star_Tower_Rater/image_file/<?=htmlspecialchars($unit['image_url']) ?>" alt=""> 
                    In-game name : <?= htmlspecialchars($unit['name_in_game']) ?>,
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No unit found.</p>
    <?php endif; ?>

    <a href="engine.php">Return to search</a>
</body>  
</body>
</html>
