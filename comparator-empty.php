<section class="empty-search-space">
    <section class="search-part">
    <!-- <h1>Select first unit</h1> -->
        <?php
            // PREMIÈRE BARRE DE RECHERCHE
            $searchField = 'name1';
            $label = 'Recherche en haut';
            $title = 'Résultats de la recherche du haut';
            if  (isset($id2)) {
                $linkPrefix = 'comparator.php?id2='.$id2.'&id1=';
            }else {
                $linkPrefix = 'comparator.php?id1=';
        ?>
         <?php 
            } include 'search.php';
            if  (isset($id1)) {
                $pdo = new PDO("mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8", "root", "");
                $stmt = $pdo->prepare("SELECT * FROM units WHERE unit_id = ?");
                $stmt->execute([$id1]);
                $unit = $stmt->fetch();
                echo '
                <div class="part-search-card">
                <h2>'.$unit['in_game_name'].'</h2>
                <img src="image_file/'.$unit['unit_file'].'">
                <p>Farming difficulty : '.$unit['farming_difficulty'].'</p><br>
                <p>Enchant : '.$unit['enchant'].'</p>
                <a  class="clear-the-selection" href="comparator.php">Clear the Selection</a>
                </div>
                ';
                /* var_dump($unit); */
            }else {
                echo '
                <div class="part-search-nothing" id="first-box">Select first unit</div>
                ';
            }
        ?>
</section>
<section class="search-part">
<!-- <h1>Select second unit</h1> -->
<?php
// DEUXIÈME BARRE DE RECHERCHE
$searchField = 'name2';
$label = 'Recherche en bas';
$title = 'Résultats de la recherche du bas';
if  (isset($id1)) {
    $linkPrefix = 'comparator.php?id1='.$id1.'&id2=';
}else {
    $linkPrefix = 'comparator.php?id2=';
}
include 'search.php';
if  (isset($id2)) {
    $pdo = new PDO("mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8", "root", "");
    $stmt = $pdo->prepare("SELECT * FROM units WHERE unit_id = ?");
    $stmt->execute([$id2]);
    $unit = $stmt->fetch();
    echo '
    <div class="part-search-card">
    <h2>'.$unit['in_game_name'].'</h2>
    <img src="image_file/'.$unit['unit_file'].'">
    <p>Farming difficulty : '.$unit['farming_difficulty'].'</p><br>
    <p>Enchant : '.$unit['enchant'].'</p>
    <a  class="clear-the-selection" href="comparator.php">Clear the Selection</a>
    </div>
    ';
    /* var_dump($unit); */
}else {
    echo '
        <div class="part-search-nothing"  id="second-box">Select second unit</div>
    ';
}
?>
</section>
</section>
<script>
  document.getElementById("first-box").addEventListener("click", function() {
    document.getElementById("name1").focus();
  });
  document.getElementById("second-box").addEventListener("click", function() {
    document.getElementById("name2").focus();
  });
</script>