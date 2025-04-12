<?php
// PREMIÈRE BARRE DE RECHERCHE
$searchField = 'name1';
$label = 'Recherche en haut';
$title = 'Résultats de la recherche du haut';
include 'search.php';

echo "<hr>";

// DEUXIÈME BARRE DE RECHERCHE
$searchField = 'name2';
$label = 'Recherche en bas';
$title = 'Résultats de la recherche du bas';
include 'search.php';
?>