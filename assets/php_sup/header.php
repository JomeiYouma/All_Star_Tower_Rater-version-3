<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<header>
    <nav>
        <ul class="nav">
            <!-- Burger menu (mobile only) -->
            <li class="tel mobile-only">
                <details class="burger">
                    <summary>☰</summary>
                    <ul>
                        <li><a class="tel whiteLink" href="/All_Star_Tower_Rater/assets/php_main/index.php">Hub</a></li>
                        <li><a class="tel whiteLink" href="/All_Star_Tower_Rater/assets/php_main/engine.php">Advanced Research</a></li>
                        <li><a class="tel whiteLink" href="/All_Star_Tower_Rater/assets/php_main/comparator.php">Comparator</a></li>
                        <li><a class="tel whiteLink" href="/All_Star_Tower_Rater/assets/php_main/settings.php">Settings</a></li>
                    </ul>
                </details>
            </li>

            <!-- Liens de navigation (desktop only) -->
            <li class="desktop-only"><a class="desktop whiteLink" href="/All_Star_Tower_Rater/assets/php_main/index.php">Hub</a></li>
            <li class="desktop-only"><a class="desktop whiteLink" href="/All_Star_Tower_Rater/assets/php_main/engine.php">Advanced Research</a></li>
            <li class="desktop-only"><a class="desktop whiteLink" href="/All_Star_Tower_Rater/assets/php_main/comparator.php">Comparator</a></li>
            <li class="desktop-only"><a class="desktop whiteLink" href="/All_Star_Tower_Rater/assets/php_main/settings.php">Settings</a></li>

            <!-- Barre de recherche -->
            <?php if (strpos($currentPage, 'engine') === false): ?> 
                <li class="search-li">
                    <?php
                        $linkPrefix = '/All_Star_Tower_Rater/assets/php_main/characterPageTest.php?id=';
                        include __DIR__ . '/../php_sup/search.php';
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<!-- Oui ça me crée un bug qui est que si on cherche avec la search "engine" le morceau disparaît mais on va dire que c'est un easter egg. -->