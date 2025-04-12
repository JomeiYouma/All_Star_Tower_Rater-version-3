<?php
// Paramètres à fournir avant include
$searchField = $searchField ?? 'name'; // nom du champ GET (ex: 'name1', 'name2')
$label = $label ?? 'Search';           // texte du label
/* $title = $title ?? 'Résultats';    */

// input actuelle
$searchValue = $_GET[$searchField] ?? '';

?>

<!-- Formulaire -->
<form method="get">
    <label for="<?= $searchField ?>"><?= $label ?></label>
    <input type="text" name="<?= $searchField ?>" id="<?= $searchField ?>" value="<?= htmlspecialchars($searchValue) ?>">
    <button type="submit">Rechercher</button>
</form>

<?php
//SI INPUT NON VIDE
if ($searchValue !== '') {
    $conn = new PDO("mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8", "root", "");
/*LIMIT 6 pour ne pas charger plus d'units que necessaire mais quand même savoir quand il y en a trop*/
    $stmt = $conn->prepare("
        SELECT in_game_name, real_name, unit_id FROM units 
        WHERE in_game_name LIKE :search 
        OR real_name LIKE :search
        ORDER BY in_game_name
        LIMIT 6 
    ");
    $stmt->execute(['search' => '%' . $searchValue . '%']);
    $units = $stmt->fetchAll();
    if (count($units)) {
        echo "<ul>";
        foreach ($units as $unit) {
            echo "<li>" . htmlspecialchars($unit['in_game_name']) . " (" . htmlspecialchars($unit['real_name']) . ")</li>";
        } 
        if (count($units)>5) { echo "<li>and more …</li>"; }
        echo "</ul>";
    } else {
        echo "Aucun résultat trouvé.";
    }
}
?>
