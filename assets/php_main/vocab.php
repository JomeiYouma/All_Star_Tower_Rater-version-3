<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Glossary All Star Tower Rater</title>
    <link href="/All_Star_Tower_Rater/assets/css/style_general.css" rel="stylesheet" />
    <link rel="icon" href="/All_Star_Tower_Rater/assets/images/favicon_local.ico">
  <style>
    footer{
      position: relative;
      z-index: 2;
    }
    body {
      background-color:var(--white);
      line-height: 1.6;
    }
    main{
      flex-wrap: wrap;
        margin:auto;
        padding:2rem;
        max-width:800px;
        color:var(--text-gray);
        display:flex;
    }
    aside{
      position:fixed;
      left: 40px;
    }

aside li{
  padding:2px 5px 2px 5px;
}

    aside a, aside a:visited{
      color:var(--dark-blue);
    }
    aside li:hover{
      transition:ease-in 0.1s transform;
      transform:scale(1.5);
    }
    h1 {
      width: 100%;
      text-align: center;
      color:var(--dark-blue);
      margin-bottom: 2rem;
    }
    .term {
      background:var(--light-gray);
      border-left: 4px solid var(--primary-blue);
      padding: 1rem 1.5rem;
      margin-bottom: 1rem;
      border-radius: 8px;
    }
    .term h2 {
      margin: 0;
      font-size: 1.2rem;
      color: var(--primary-blue);
    }
    .term p {
      margin-top: 0.5rem;
    }
  </style>
</head>

<body>
<?php include __DIR__ . "/../php_sup/header.php"?>
    <main>
    <h1>All Star Tower Rater - Glossary</h1>
      <aside>
      <ul>
  <li><a class="visually-hidden-focusable" href="#contenu">See all referencies.</a></li>
  <li><a href="#A">A</a></li>
  <li><a href="#B">B</a></li>
  <li><a href="#C">C</a></li>
  <li><a href="#D">D</a></li>
  <li><a href="#E">E</a></li>
  <li><a href="#F">F</a></li>
  <li><a href="#G">G</a></li>
  <li><a href="#H">H</a></li>
  <li><a href="#I">I</a></li>
  <li><a href="#J">J</a></li>
  <li><a href="#K">K</a></li>
  <li><a href="#L">L</a></li>
  <li><a href="#M">M</a></li>
  <li><a href="#N">N</a></li>
  <li><a href="#O">O</a></li>
  <li><a href="#P">P</a></li>
  <li><a href="#Q">Q</a></li>
  <li><a href="#R">R</a></li>
  <li><a href="#S">S</a></li>
  <li><a href="#T">T</a></li>
  <li><a href="#U">U</a></li>
  <li><a href="#V">V</a></li>
  <li><a href="#W">W</a></li>
  <li><a href="#X">X</a></li>
  <li><a href="#Y">Y</a></li>
  <li><a href="#Z">Z</a></li>
</ul>
      </aside>
<section class="terms" id="contenu">
<?php
require_once __DIR__ . '/../php_sup/pdo.php';

// Exécute la requête et récupère les résultats triés (concaténation avec \ parce que sinon je ne m'y retrouve plus.)
$sortie = $pdo->query("SELECT * FROM glossary ORDER BY glossary_name");
$glossaryData = $sortie->fetchAll(PDO::FETCH_ASSOC);

$currentLetter = '';
foreach ($glossaryData as $entry) {
    $term = $entry['glossary_name'];
    $definition = $entry['glossary_explaination'];
    $firstLetter = strtoupper($term[0]);

    // Si la première lettre a changé, ajoute une ancre
    if ($firstLetter !== $currentLetter) {
        echo "<div id=\"$firstLetter\"></div>\n";
        $currentLetter = $firstLetter;
    }

    // Affiche le terme et sa définition
    echo "<div class=\"term\">\n";
    echo "  <h2>$term</h2>\n";
    echo "  <p>$definition</p>\n";
    echo "</div>\n";
}
?>

  </section>
</main>
<?php include __DIR__ . "/../php_sup/footer.php";?>
</body>
</html>