<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Tower Rater Hub</title>
    <meta name="description" content="Welcome to All Star Tower Rater — your go-to platform for detailed stats, comparisons, and rankings in All Star Tower Defense on Roblox." >
    <link href="/All_Star_Tower_Rater/assets/css/style_general.css" rel="stylesheet" />
    <link href="/All_Star_Tower_Rater/assets/css/style_hub.css" rel="stylesheet" />
    <link rel="icon" href="/All_Star_Tower_Rater/assets/images/favicon_local.ico">

</head>
<body class="hubBody">
        <!-- Background animé -->
        <div class="bg-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
<?php include __DIR__ . "/../php_sup/header.php"; ?>

 <div class="main-container">
        <h1 class="title fade-in">All star tower rater</h1>
        <p class="subtitle fade-in delay-1"><!-- ordre pour le delay de l'animation -->
            The ultimate tool for pro All Star Tower Defense players. Rate, compare and optimize your team compositions.
            Find the best units, create powerful teams and dominate the battlefield!
        </p>
        
        <div class="button-container">
            <a href="/All_Star_Tower_Rater/assets/php_main/comparator.php" class="action-btn btn-comparator slide-up delay-4">
                Unit Comparator
            </a>
            <a href="/All_Star_Tower_Rater/assets/php_main/engine.php" class="action-btn btn-team slide-up delay-2">
                Search Engine
            </a>
            <a href="/All_Star_Tower_Rater/assets/php_main/settings.php" class="action-btn btn-settings slide-up delay-3">
                Settings & Presets
            </a>
        </div>
    </div>
<?php include __DIR__ . "/../php_sup/footer.php"; ?>



</body>
</html>