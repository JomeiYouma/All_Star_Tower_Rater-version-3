<?php
$currentPage = basename($_SERVER["PHP_SELF"]);
function isSelected($pageName, $currentPage)
{
    return strpos($currentPage, $pageName) !== false ? "selected-page" : ""; //strpos retourne la position (index) de la première occurrence d’une sous-chaîne dans une autre.
}
?>

<header>
    <nav>
    <ul class="nav">
    <!-- Burger menu (mobile only) -->
    <li class="tel mobile-only">
        <details class="burger">
            <summary>☰</summary>
            <ul>
                <li>
                    <a class="tel whiteLink <?= isSelected(
                        "index.php",
                        $currentPage
                    ) ?>" href="/All_Star_Tower_Rater/assets/php_main/index.php">Hub</a>
                </li>
                <li>
                    <a class="tel whiteLink <?= isSelected(
                        "engine.php",
                        $currentPage
                    ) ?>" href="/All_Star_Tower_Rater/assets/php_main/engine.php">Advanced Research</a>
                </li>
                <li>
                    <a class="tel whiteLink <?= isSelected(
                        "comparator.php",
                        $currentPage
                    ) ?>" href="/All_Star_Tower_Rater/assets/php_main/comparator.php">Comparator</a>
                </li>
                <li>
                    <a class="tel whiteLink <?= isSelected(
                        "settings.php",
                        $currentPage
                    ) ?>" href="/All_Star_Tower_Rater/assets/php_main/settings.php">Settings</a>
                </li>
            </ul>
        </details>
    </li>

    <!-- Desktop links -->
    <li class="desktop-only">
        <a class="desktop whiteLink <?= isSelected(
            "index.php",
            $currentPage
        ) ?>" href="/All_Star_Tower_Rater/assets/php_main/index.php">Hub</a>
    </li>
    <li class="desktop-only">
        <a class="desktop whiteLink <?= isSelected(
            "engine.php",
            $currentPage
        ) ?>" href="/All_Star_Tower_Rater/assets/php_main/engine.php">Advanced Research</a>
    </li>
    <li class="desktop-only">
        <a class="desktop whiteLink <?= isSelected(
            "comparator.php",
            $currentPage
        ) ?>" href="/All_Star_Tower_Rater/assets/php_main/comparator.php">Comparator</a>
    </li>
    <li class="desktop-only">
        <a class="desktop whiteLink <?= isSelected(
            "settings.php",
            $currentPage
        ) ?>" href="/All_Star_Tower_Rater/assets/php_main/settings.php">Settings</a>
    </li>


            <!-- Barre de recherche 
             strpos Cherche la position numérique de la première occurrence de 'engine.php' dans $currentPage (et retourne false sinon).-->
            <?php if (strpos($currentPage, "engine.php") === false): ?> 
                <li class="search-li">
                    <?php
                    $linkPrefix =
                        "/All_Star_Tower_Rater/assets/php_main/characterPageTest.php?id=";
                    include __DIR__ . "/../php_sup/search.php";
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<!-- Oui ça me crée un bug qui est que si on cherche avec la search "engine" le morceau disparaît-->