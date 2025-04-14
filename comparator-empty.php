<?php
// PREMIÈRE BARRE DE RECHERCHE
$searchField = 'name1';
$label = 'Recherche en haut';
$title = 'Résultats de la recherche du haut';
if  (isset($_GET['id2'])) {
    $linkPrefix = 'comparator.php?id2='.$_GET['id2'].'&id1=';
}else {
    $linkPrefix = 'comparator.php?id1=';
}
include 'search.php';

echo "<hr>";

// DEUXIÈME BARRE DE RECHERCHE
$searchField = 'name2';
$label = 'Recherche en bas';
$title = 'Résultats de la recherche du bas';
if  (isset($_GET['id1'])) {
    $linkPrefix = 'comparator.php?id1='.$_GET['id1'].'&id2=';
}else {
    $linkPrefix = 'comparator.php?id2=';
}
include 'search.php';
?>