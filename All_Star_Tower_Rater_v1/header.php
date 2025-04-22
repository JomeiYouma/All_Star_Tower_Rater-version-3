<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<header>
    <nav>
        <ul class="nav">
            <li><a class="whiteLink" href="siteindex.php">Hub</a></li>
            <li><a class="whiteLink" href="engine.php">Advanced Research</a></li>
            <li><a class="whiteLink" href="comparator.php">Comparator</a></li>
            <li><a class="whiteLink" href="settings.php">Settings</a></li>

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