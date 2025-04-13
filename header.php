<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<header>
    <nav>
        <ul class="nav">
            <li><a href="/All_Star_Tower_Rater/siteindex.php">Hub</a></li>
            <li><a href="/All_Star_Tower_Rater/engine.php">Advanced Research</a></li>
            <li><a href="/All_Star_Tower_Rater/comparator.php">Comparator</a></li>
            <li><a href="/All_Star_Tower_Rater/settings.php">Settings</a></li>

            <?php if ($currentPage !== 'engine.php'): ?>
                <li class="search-li">
                    <?php
                        $linkPrefix = 'characterPageTest.php?id=';
                        include 'search.php';
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>