<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Tower Rater Hub</title>
    <link href="style_general.css" rel="stylesheet" />
    <link href="style_settings.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="image_file/favicon.ico">
</head>
<body class="settingsBody">
    
<?php include "header.php"?>
<main class="settingsMain">
    <div class="frame">
        <h1>Settings</h1>
        <p>These settings let you activate various boosts for your units and adjust the coefficients of variables that affect subjective calculations.   You can also choose the game mode considered by the tool. It is possible to save your settings by creating a "<a class="anchor" href="#anchor_preset">preset</a>".</p>
        <form action="" class="settingsForm">
                    <details open class="generalSettingsDetails">
                        <summary>
                            <p class="form-title">General Settings :</p>
                        </summary>    
                        <div class="divi">
                        <div class="param">
                            <label for="preset_gamemode">Gamemode : <span class="pre-value">Start</span></label>
                            <select name="preset_gamemode" id="preset_gamemode">
                                <option value="">--Please choose an option--</option>
                                <option value="start">Start</option>
                                <option value="raid">Raid</option>
                                <option value="max">Max</option>
                            </select>
                        </div>
                        
                        <div class="param">
                            <label for="level">Unit level : <span class="pre-value">175</span></label>
                            <div class="rangeContainer">
                                <span id="levelRangeDisplay">0.1</span>
                                <input type="range" name="level" id="level" min="1" max="175" value="175" step="1">
                            </div>
                        </div>
        
                        <div class="param">
                            <label for="buff">Buff strength : <span class="pre-value">250</span> %</label>
                            <div class="rangeContainer">
                                <span id="buffRangeDisplay">250</span>
                                <input type="range" name="buff" id="buff" min="0" max="300" value="250" step="10">
                            </div>
                        </div>
        
                        <div class="param">
                            <label for="leader">Leader buff : <span class="pre-value">20</span> %</label>
                            <div class="rangeContainer">
                                <span id="leaderRangeDisplay">20</span>
                                <input type="range" name="leader" id="leader" min="0" max="20" value="20" step="1">
                            </div>
                        </div>

                        <div class="param">
                            <label for="leader_special">Leader DoT buff : <span class="pre-value">12</span> %</label>
                            <div class="rangeContainer">
                                <span id="leader_specialRangeDisplay">12</span>
                                <input type="range" name="leader_special" id="leader_special" min="0" max="30" value="12" step="1">
                            </div>
                        </div>
                                
                        <div class="param">
                            <label for="leader_cost">Leader cost economy : <span class="pre-value">20</span> %
                            </label>
                                <div class="rangeContainer">
                                    <span id="leader_costRangeDisplay">20</span>
                                    <input type="range" name="leader_cost" id="leader_cost" min="0" max="20" value="20" step="1">
                            </div>
                        </div>
                    </div>
                    </details>
                    <details class="generalSettingsDetails">
                        <summary>
                            <p class="form-title">Special damage boost :</p>
                        </summary>    
                        <div class="divi">
                        <div class="param">
                            <label for="enemy_enchant">Enemy enchant : <span class="pre-value">None</span><span class="redDot">*</span></label>
                            <select name="enemy_enchant" id="enemy_enchant">
                                <option value="">--Please choose an option--</option>
                                <option value="none">None</option>
                                <option value="fire">Fire</option>
                                <option value="water">Water</option>
                                <option value="electric">Electric</option>
                                <option value="nature">Nature</option>
                                <option value="holy">Holy</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                        
                        <div class="param">
                            <label for="enchant_str">Enchant strength : <span class="pre-value">Off</span><span class="redDot">*</span></label>
                            <input type="checkbox" id="enchant_str" name="enchant_str" />
                        </div>
        
                        <div class="param">
                            <label for="enchant_wkn">Enchant weakness : <span class="pre-value">Off</span><span class="redDot">*</span></label>
                            <input type="checkbox" id="enchant_wkn" name="enchant_wkn" />
                        </div>
        
                        <div class="param">
                            <label for="stroke">Stroke : <span class="pre-value">Off</span></label>
                            <input type="checkbox" id="stroke" name="stoke" />
                        </div>
        
                        <div class="param">
                            <label for="bloodmoon">Blood moon : <span class="pre-value">Off</span></label>
                            <input type="checkbox" id="bloodmoon" name="bloodmoon" />
                        </div>
        
                        <div class="param">
                            <label for="fear">Fear : <span class="pre-value">Off</span></label>
                            <input type="checkbox" id="fear" name="fear" />
                        </div>

                        <div class="param">
                            <label for="idol">Shine shine (Idol) : <span class="pre-value">Off</span></label>
                            <input type="checkbox" id="idol" name="idol" />
                        </div>

                        <div class="param">
                            <label for="typebane">Typebane : <span class="pre-value">Off</span></label>
                            <input type="checkbox" id="typebane" name="typebane" />
                        </div></div>
                        <p class="littleWarning"><span class="redDot">*</span>:Can't be turned on together or it will mess up.</p>
                    </details>
                    <details class="generalSettingsDetails">
                        <summary>
                            
                            <p class="form-title">Arbitrary settings :</p>
                        </summary>
                        <div class="divi">   
    <div class="param">
        <label for="pa_full">Points for Full : <span class="pre-value">100</span> | <span id="pa_fullRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_full" id="pa_full" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_multiple">Points for Multiple : <span class="pre-value">100</span> | <span id="pa_multipleRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_multiple" id="pa_multiple" min="0" max="100" value="100">
        </div>
    </div>

    <div class="separator"></div>

    <div class="param">
        <label for="pa_cone_half">Points for Cone Half : <span class="pre-value">100</span> | <span id="pa_cone_halfRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_cone_half" id="pa_cone_half" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_cone_wide">Points for Cone Wide : <span class="pre-value">100</span> | <span id="pa_cone_wideRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_cone_wide" id="pa_cone_wide" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_cone_square">P.f. Cone Square : <span class="pre-value">100</span> | <span id="pa_cone_squareRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_cone_square" id="pa_cone_square" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_cone_pyramid">P.f. Cone Pyramid : <span class="pre-value">100</span> | <span id="pa_cone_pyramidRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_cone_pyramid" id="pa_cone_pyramid" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_cone">Points for Cone : <span class="pre-value">100</span> | <span id="pa_coneRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_cone" id="pa_cone" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_cone_spike">Points for Cone Spike : <span class="pre-value">100</span> | <span id="pa_cone_spikeRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_cone_spike" id="pa_cone_spike" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_cone_narrow">P.f. Cone Narrow : <span class="pre-value">100</span> | <span id="pa_cone_narrowRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_cone_narrow" id="pa_cone_narrow" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_line">Points for Line : <span class="pre-value">100</span> | <span id="pa_lineRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_line" id="pa_line" min="0" max="100" value="100">
        </div>
    </div>

    <div class="separator"></div>

    <div class="param">
        <label for="pa_circle_fat">Points for Circle Fat : <span class="pre-value">100</span> | <span id="pa_circle_fatRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_circle_fat" id="pa_circle_fat" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_circle_huge">Points for Circle Huge : <span class="pre-value">100</span> | <span id="pa_circle_hugeRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_circle_huge" id="pa_circle_huge" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_circle_verylarge">P.f. Circle Very Large : <span class="pre-value">100</span> | <span id="pa_circle_verylargeRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_circle_verylarge" id="pa_circle_verylarge" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_circle_large">Points for Circle Large : <span class="pre-value">100</span> | <span id="pa_circle_largeRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_circle_large" id="pa_circle_large" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_circle">Points for Circle : <span class="pre-value">100</span> | <span id="pa_circleRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_circle" id="pa_circle" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_circle_medium">P.f. Circle Medium : <span class="pre-value">100</span> | <span id="pa_circle_mediumRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_circle_medium" id="pa_circle_medium" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_circle_little">Points for Circle Little : <span class="pre-value">100</span> | <span id="pa_circle_littleRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_circle_little" id="pa_circle_little" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_circle_tiny">Points for Circle Tiny : <span class="pre-value">100</span> | <span id="pa_circle_tinyRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_circle_tiny" id="pa_circle_tiny" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_single">Points for Single : <span class="pre-value">100</span> | <span id="pa_singleRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_single" id="pa_single" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_single_trap">Points for Single Trap : <span class="pre-value">100</span> | <span id="pa_single_trapRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_single_trap" id="pa_single_trap" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_summon">Points for Summon : <span class="pre-value">100</span> | <span id="pa_summonRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_summon" id="pa_summon" min="0" max="100" value="100">
        </div>
    </div>

    <div class="param">
        <label for="pa_controllable">P.f. Controllable : <span class="pre-value">100</span> | <span id="pa_controllableRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="pa_controllable" id="pa_controllable" min="0" max="100" value="100">
        </div>
    </div>

    <div class="separator"></div>

    <div class="param">
        <label for="importance_aoetype">Importance AoE Type : <span class="pre-value">100</span> | <span id="importance_aoetypeRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="importance_aoetype" id="importance_aoetype" min="0" max="100" value="100">
        </div>
    </div>

    <div class="separator"></div>

    <div class="param">
        <label for="method">Chart Scaling : <span class="pre-value">logarithmic</span></label>
        <select name="method" id="method">
            <option value="">--Please choose an option--</option>
            <option value="linear">Linear</option>
            <option value="logarithmic">Logarithmic</option>
        </select>
    </div>

    <div class="param">
        <label for="ranking_percentage">Chart Order Scaling : <span class="pre-value">100</span> | <span id="ranking_percentageRangeDisplay">100</span></label>
        <div class="rangeContainer">
            <input type="range" name="ranking_percentage" id="ranking_percentage" min="0" max="100" value="100">
        </div>
    </div>
</div></div>
                    </details>

        </form>
    </div><br>
    <div class="frame">
        <h1 id="anchor_preset">Preset</h1>
        <form action="" class="settingsForm">
                    <details class="generalSettingsDetails">
                        <summary>
                            <p class="form-title">Import Preset</p>
                        </summary>    
                        <div class="divi">
                            <div class="paramBis">
                                <label for="preset_search">Search by Id or Name<!-- <span class="redDot">*</span> --></label>
                                <input type="text" name="preset_search" id="preset_search" placeholder="--Please type search--">
                                <div id="resultsContainer"></div>
                            </div>
                            <p class="or">OR</p>
                            <div class="paramBis">
                                <label for="native_preset">Native preset<!-- <span class="redDot">*</span> --></label>
                                <select name="native_preset" id="native_preset">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Neutral preset">Neutral preset</option>
                                    <option value="Start preset">Start preset</option>
                                    <option value="Raid preset">Raid preset</option>
                                </select>
                            </div>
                            <button class="button-85 load" role="button" type="button">L O A D</button>
                        </div>
<!--                         <p class="littleWarning"><span class="redDot">*</span>:Can't be used together or it will mess up.</p> -->
                        <div id="selectedPreset" class="selected-preset"></div>
                    </details>
                    <details open class="generalSettingsDetails">
                        <summary>
                            <p class="form-title">Save Preset</p>
                        </summary>    
                        <div class="divi">
                            <div class="paramBis">
                                <label for="preset_name">Preset Name<span class="greenDot">*</span></label>
                                <input type="text" name="preset_name" id="preset_name" placeholder="--Please set name--">
                            </div>
<!--                             <div class="paramBis"> Pas implémenté
                                <label for="preset_password">Preset Password</label>
                                <input type="password" name="preset_password" id="preset_password" placeholder="--Please set password--">
                            </div> -->
                            <button class="button-85 save" id="save" role="button" type="button" >S A V E</button>
                            <button class="button-85 save" id="apply" role="button" type="button">APPLY PRESET</button>
                        </div>
                        
                        <div class="consent-check">
                        <p>Your preset will not be saved. You'll can access to it until you close the site.</p>
                        <button class="button-85 save" id="apply2" role="button" type="button" >STILL APPLY</button>
                        
                        <button class="button-85 save" id="applynt" role="button" type="button" >CANCEL APPLY</button>
                        </div>
                        <p class="littleWarning"><span class="greenDot">*</span>:Must be filled.</p>
                       </details>

        </form>
    </div><br>
    </div>
</main>

<?php include "footerBis.php";?>
<!-- <script src="function-import-data-settings.js"></script> -->
<script>
    <?php include "function-visual-return.js";?>
    <?php include "script_settings.js";?>
</script>
</body>
</html>