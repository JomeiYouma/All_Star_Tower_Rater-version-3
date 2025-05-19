<div class="head">
<h1>Comparator</h1>
<h2 class="classic">Select two units to compare their statistics.</h2><!-- H2 pour pas casser l'odre des h du footer -->
</div>
<section class="empty-search-space">
    <section class="search-part">
    <!-- <h1>Select first unit</h1> -->
        <?php
            // PREMIÈRE BARRE DE RECHERCHE
            $searchField = 'name1';
            $label = 'Select first unit';
            $title = 'Résultats de la recherche du haut';
            if  (isset($id2)) {
                $linkPrefix = '/All_Star_Tower_Rater/assets/php_main/comparator.php?id2='.$id2.'&id1=';
            }else {
                $linkPrefix = '/All_Star_Tower_Rater/assets/php_main/comparator.php?id1=';
        ?>
         <?php 
            } include 'search.php';
            if  (isset($id1)) {
                require_once __DIR__ . "/../php_sup/pdo.php";
                $stmt = $pdo->prepare("SELECT * FROM units WHERE unit_id = ?");
                $stmt->execute([$id1]);
                $unit = $stmt->fetch();
                echo '
                <div class="part-search-card">
                <h2>'.$unit['in_game_name'].'</h2>
                <img src="/All_Star_Tower_Rater/assets/images/'.$unit['unit_file'].'">
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
$label = 'Select second unit';
$title = 'Second search results';
if  (isset($id1)) {
    $linkPrefix = '/All_Star_Tower_Rater/assets/php_main/comparator.php?id1='.$id1.'&id2=';
}else {
    $linkPrefix = '/All_Star_Tower_Rater/assets/php_main/comparator.php?id2=';
}
include 'search.php';
if  (isset($id2)) {
    require_once __DIR__ . "/../php_sup/pdo.php";
    $stmt = $pdo->prepare("SELECT * FROM units WHERE unit_id = ?");
    $stmt->execute([$id2]);
    $unit = $stmt->fetch();
    echo '
    <div class="part-search-card">
    <h2>'.$unit['in_game_name'].'</h2>
    <img src="/All_Star_Tower_Rater/assets/images/'.$unit['unit_file'].'">
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
    let firstBox = document.getElementById("first-box");
    let secondBox = document.getElementById("second-box");
    //On est obligé de faire un if, sinon ça bug quand c'est remplacé dans le HTML parce qu'on les fait disparaître du HTML.
    if (firstBox !== null) {
        firstBox.addEventListener("click", function() {
    document.getElementById("name1").focus();
  });
    }
    if (secondBox !== null) { 
        document.getElementById("second-box").addEventListener("click", function() {
    document.getElementById("name2").focus();
  });
    }
</script>