<div>
<?php

// Paramètres à fournir avant include
$linkPrefix = $linkPrefix ?? '/All_Star_Tower_Rater/assets/php_main/characterPageTest.php?id='; // Pour pouvoir utiliser la searchbar pour plusieurs choses
$searchField = $searchField ?? 'name'; // nom du champ GET (ex: 'name1', 'name2')
$label = $label ?? 'Search a character';           // texte du label
/* $title = $title ?? 'Résultats';    */

// input actuelle
$searchValue = $_GET[$searchField] ?? '';

?>

<!-- Formulaire -->
<form method="get" class="search">
<?php
    foreach ($_GET as $key => $value) {
        if ($key !== $searchField) {
            echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
        }
    }
    ?>
   <!--  <label for="<?= $searchField ?>"><?= $label ?></label> -->
    <input  placeholder="<?= $label ?>" type="text" name="<?= $searchField ?>" id="<?= $searchField ?>" value="<?= htmlspecialchars($searchValue) ?>">
    <button type="submit"><img src="/All_Star_Tower_Rater/assets/images/white-research.png" alt="Rechercher un personnage."></button>
</form>

<?php
//SI INPUT NON VIDE
if ($searchValue !== '') {
require_once __DIR__ . '/../php_main/pdo.php';
/*LIMIT 6 pour ne pas charger plus d'units que necessaire mais quand même savoir quand il y en a trop*/
    $stmt = $pdo->prepare("
        SELECT in_game_name, real_name, unit_id, unit_file FROM units 
        WHERE in_game_name LIKE :search 
        OR real_name LIKE :search
        ORDER BY in_game_name
        LIMIT 6 
    ");
    $stmt->execute(['search' => '%' . $searchValue . '%']);
    $units = $stmt->fetchAll();
    if (count($units)) {
        echo "<ul class='results'>";
        $i = 0;
        foreach ($units as $unit) {
            if ($i >= 5) break;
            echo "<li><a class='search-link' href='" . $linkPrefix . urlencode($unit['unit_id']) . "'>"
            . htmlspecialchars($unit['in_game_name']) . " (" . htmlspecialchars($unit['real_name']) . ")"
            . "</a></li>";
            $i++;
        }
        if (count($units)>5) { echo "<li>and more …</li>"; }
        echo "</ul>";
    } else {
        echo "<p>Aucun résultat trouvé.</p>";
    }
}
?>
</div>