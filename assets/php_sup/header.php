<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<header>
    <nav>
        <ul class="nav">
            <li><a class="whiteLink" href="/All_Star_Tower_Rater/assets/php_main/index.php">Hub</a></li>
            <li><a class="whiteLink" href="/All_Star_Tower_Rater/assets/php_main/engine.php">Advanced Research</a></li>
            <li><a class="whiteLink" href="/All_Star_Tower_Rater/assets/php_main/comparator.php">Comparator</a></li>
            <li><a class="whiteLink" href="/All_Star_Tower_Rater/assets/php_main/settings.php">Settings</a></li>

            <?php if ($currentPage !== '/All_Star_Tower_Rater/assets/php_main/engine.php'): ?>
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