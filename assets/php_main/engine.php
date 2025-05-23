<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Search All Star Tower Rater</title>
    <meta name="description" content="Use the advanced search engine to filter and find All Star Tower Defense units by stats, traits, rarity, and more for optimal team building." >
    <link href="/All_Star_Tower_Rater/assets/css/style_general.css" rel="stylesheet" />
    <link href="/All_Star_Tower_Rater/assets/css/style_engine.css" rel="stylesheet" />
    <link rel="icon" href="/All_Star_Tower_Rater/assets/images/favicon_local.ico">
</head>
<body class="searchBody">
    
<?php include __DIR__ . "/../php_sup/header.php"; ?>

<main class="engineMain">
    <div class="frame">
        <h1>Advanced search filters</h1>
        <p>Use the filters below to find the perfect units for your strategy. You can filter by name, enchant type, roles, abilities, costs and more.</p>
            <form action="" method="GET" class="settingsForm">

        <div class="divi">

            <div class="param">
                <label for="name"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/tag.png" alt=""> Name :</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="param">
                <label for="enchantFilter"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/flame.png" alt=""> Enchant :</label>
                <select name="enchant" id="enchantFilter">
                    <option value="">--Please choose an option--</option>
                    <option value="fire">Fire</option>
                    <option value="water">Water</option>
                    <option value="nature">Nature</option>
                    <option value="electric">Lightning</option>
                    <option value="dark">Dark</option>
                    <option value="holy">Holy</option>
                    <option value="none">None</option>
                </select>
            </div>

            <div class="param">
                <label for="isHittingAir"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/target_air.png" alt=""> Air damage :</label>
                <select name="air" id="isHittingAir">
                    <option value="">--Please choose an option--</option>
                    <option value="ground">Ground (no)</option>
                    <option value="hill">Hill (yes)</option>
                    <option value="hybrid">Hybrid (yes)</option>
                    <option value="hill_hybrid">Both Hill & Hybrid</option>
                    <option value="only_air">Only Air (yes, but no ground damage)</option>
                    <option value="hill_hybrid_only_air">Both Hill, Hybrid & Only Air</option>
                </select>
            </div>

            <div class="param">
                <label for="role"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/role.png" alt=""> Role :</label>
                <select name="role" id="role">
                    <option value="">--Please choose an option--</option>
                    <option value="Executionner">Executioner</option>
                    <option value="Nuker">Nuker</option>
                    <option value="Camper">Camper</option>
                    <option value="Crowd Control">Crowd Control</option>
                    <option value="Health Reducer">Mob Health Reducer</option>
                    <option value="Starter">Starter</option>
                    <option value="Buffer">Buffer</option>
                    <option value="SpB">Special Buffer</option>
                    <option value="Mobility Control">Mobility Control</option>
                    <option value="Slow">Slow</option>
                    <option value="Invest">Investment</option>
                    <option value="Money">Money Unit</option>
                    <option value="Healer">Base Healer</option>
                    <option value="Revealer">Revealer</option>
                    <option value="Summonner">Summonner</option>
                    <option value="Deployer">Units Deployer</option>
                    <option value="Solo">Solo</option>
                    <option value="Cooldown Reset">Cooldown Reset</option>
                </select>
            </div>

            <div class="param">
                <label for="roleNbr"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/epingle.png" alt=""> Number of roles:</label>
                <select name="roleNbr" id="roleNbr">
                    <option value="">--Please choose an option--</option>
                    <option value="one">1</option>
                    <option value="two">2</option>
                    <option value="three">3</option>
                    <option value="four">4</option>
                    <option value="oneNoExecutionner">1 (without Executioner)</option>
                </select>
            </div>

            <div class="param">
                <label for="abilityType"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/tonnerre.png" alt=""> Type of abilities :</label>
                <select name="abilityType" id="abilityType">
                    <option value="">--Please choose an option (A->Z)--</option>
                    <option value="Attack Change">Attack Change</option>
                    <option value="Base Protection">Base Protection</option>
                    <option value="Buff">Buff</option>
                    <option value="Critical">Critical</option>
                    <option value="Damage by %">Damage by %</option>
                    <option value="Damage Over Time">Damage Over Time</option>
                    <option value="Enchant Change">Enchant Change</option>
                    <option value="Golden Stun">Golden Stun</option>
                    <option value="Stun">Stun</option>
                    <option value="Heal">Heal</option>
                    <option value="Income">Income</option>
                    <option value="Instant Damage">Instant Damage</option>
                    <option value="Nuke">Nuke</option>
                    <option value="Nuke by %">Nuke by %</option>
                    <option value="Raging">Raging</option>
                    <option value="Reveal">Reveal</option>
                    <option value="Rewind">Rewind</option>
                    <option value="Self Buff">Self Buff</option>
                    <option value="Summon">Summon</option>
                    <option value="Teleport">Teleport</option>
                    <option value="Trap">Trap</option>
                    <option value="Slow">Slow</option>
                    <option value="Special">Special</option>
                    <option value="Standby">Standby</option>
                    <option value="None">None</option>
                </select>
            </div>

            <div class="param">
                <label for="startCost"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/pile-de-pieces.png" alt=""> Placement cost (per unit):</label>
                <select name="startCost" id="startCost">
                    <option value="">--Please choose an option--</option>
                    <option value="500 or less">500 or less</option>
                    <option value="between500and550">500 to 550</option>
                    <option value="between550and600">550 to 600</option>
                    <option value="minus1000">Less than 1000</option>
                    <option value="plus1000">More than 1000</option>
                    <option value="custom">Custom* (in developpement)</option>
                </select>
            </div>
 
            <div class="param">
                <label for="maxCost"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/de-largent.png" alt=""> Maximum cost (per unit):</label>
                <select name="maxCost" id="maxCost">
                    <option value="">--Please choose an option--</option>
                    <option value="minus50k">Less than 50 000</option>
                    <option value="minus100k">Less than 100 000</option>
                    <option value="minus1mil">Less than 1 000 000</option>
                    <option value="minus5mil">Less than 5 000 000</option>
                    <option value="minus10mil">Less than 10 000 000</option>
                    <option value="plus10mil">More than 10 000 000</option>
                    <option value="custom">Custom* (in developpement)</option>
                </select>
            </div>

            <div class="param">
                <label for="max_placement"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/cube-avec-des-couches.png" alt=""> Maximum Placement :</label>
                <select name="max_placement" id="max_placement">
                    <option value="">--Please choose an option--</option>
                    <option value="1">1</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                </select>
            </div>

            <div class="param">
                <label for="collectionDifficulty"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/star.png" alt=""> Collection difficulty (E=Ez):</label>
                <select name="collectionDifficulty" id="collectionDifficulty">
                    <option value="">--Please choose an option--</option>
                    <option value="f">F and less</option>
                    <option value="e">E and less</option>
                    <option value="d">D and less</option>
                    <option value="c">C and less</option>
                    <option value="b">B and less</option>
                    <option value="a">A and less</option>
                    <option value="s">S and +</option>
                </select>
            </div>
                    <!-- Order By Filter -->
            <div class="param">
                <label for="orderBy" class="filter-label"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/trier.png" alt=""> Order By:</label>
                <select name="orderBy" id="orderBy" class="filter-select">
                    <option value="name_asc">Name (A-Z)</option>
                    <option value="name_desc">Name (Z-A)</option>
                    <option value="cost_start_asc">Placement Cost (Low to High)</option>
                    <option value="cost_start_desc">Placement Cost (High to Low)</option>
                    <option value="cost_max_asc">Max Cost (Low to High)</option>
                    <option value="cost_max_desc">Max Cost (High to Low)</option>
                    <option value="difficulty_asc">Collection Difficulty (Easy to Hard)</option>
                    <option value="difficulty_desc">Collection Difficulty (Hard to Easy)</option>
                    <option value="placement_asc">Max Placement (Low to High)</option>
                    <option value="placement_desc">Max Placement (High to Low)</option>
                </select>
        </div>
                        <!-- Reset & Search Buttons -->
                        <div class="filter-actions">
                    <a href="engine.php" class="filter-button reset-button">
                    <img style="width: 15px;" src="/All_Star_Tower_Rater/assets/images/annuler.png" alt=""> Reset Filters
                    <a>
                </div>

<!--             <button type="submit" class="button-85">Rechercher</button> -->
        </div>
        <p class="littleWarning"><img style="width: 15px;" class="engineIcon"  src="/All_Star_Tower_Rater/assets/images/information-gray.png" alt=""> * Custom options are currently in development and may not work as expected..</p>
            </form>

    </div>
    <div class="frame searchResults">
        <div class="inline-container">
        <h1>Search Results</h1>
        <h2 class="filtersMessage"><span class="foundUnits"></span>Waiting for filters...</h2>
        </div>
        <div id="personnages" class="personnages"></div>
    </div>
</main>
<?php include __DIR__ . "/../php_sup/footer.php"; ?>
<script src="/All_Star_Tower_Rater/assets/js/engine.js"></script>

</body>
</html>