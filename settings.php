<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Tower Rater Hub</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="icon" href="image_file/favicon.ico">
</head>
<body class="settingsBody">
    
<?php include "header.php"?>
<main class="settingsMain">
    <div class="frame">
        <h1>Settings</h1>
        <p>Les paramètres vous permettent d'activer les différents boosts pour vos unités et de modifier les coefficients des variables dont dépendent les calculs subjectifs. Vous pouvez également choisir le mode de jeu considéré par l'outil. Il est possible d'enregistrer vos paramètres en créant un "preset".</p>
        <form action="" class="settingsForm">
                    <details open class="generalSettingsDetails">
                        <summary>
                            <p class="form-title">General Settings :</p>
                        </summary>    
                        <div class="divi">
                        <div class="param">
                            <label for="gamemode">Gamemode<span class="greenDot">*</span> : <span>Start</span></label>
                            <select name="gamemode" id="gamemode">
                                <option value="">--Please choose an option--</option>
                                <option value="start">Start</option>
                                <option value="raid">Raid</option>
                                <option value="max">Max</option>
                            </select>
                        </div>
                        
                        <div class="param">
                            <label for="level">Unit level : <span>175</span></label>
                            <input type="number" name="level" id="level" min="1" max="175" placeholder="--Please enter a level--">
                        </div>
        
                        <div class="param">
                            <label for="buff">Buff strength : <span>250</span> %</label>
                            <input type="number" name="buff" id="buff" min="0" max="300" placeholder="--Please enter a buff nbr--">
                        </div>
        
                        <div class="param">
                            <label for="leader">Leader buff : <span>20</span> %</label>
                            <input type="number" name="leader" id="leader" min="0" max="20" placeholder="--Please enter a buff nbr--">
                        </div>
        
                        <div class="param">
                            <label for="leader_special">Leader DoT buff : <span>12</span> %</label>
                            <input type="number" name="leader_special" id="leader_special" min="0" max="30" placeholder="--Please enter a buff nbr--">
                        </div>
        
                        <div class="param">
                            <label for="leader_cost">Leader cost economy : <span>20</span> %</label>
                            <input type="number" name="leader_cost" id="leader_cost" min="0" max="20" placeholder="--Please enter an economy--">
                        </div></div>
                        <p class="littleWarning"><span class="greenDot">*</span>:Must be filled if you want create a preset.</p>
                    </details>
                    <details class="generalSettingsDetails">
                        <summary>
                            <p class="form-title">Special damage boost :</p>
                        </summary>    
                        <div class="divi">
                        <div class="param">
                            <label for="enemy_enchant">Enemy enchant : <span>None</span><span class="redDot">*</span></label>
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
                            <label for="enchant_str">Enchant strength : <span>Off</span><span class="redDot">*</span></label>
                            <input type="checkbox" id="enchant_str" name="enchant_str" />
                        </div>
        
                        <div class="param">
                            <label for="enchant_wkn">Enchant weakness : <span>Off</span><span class="redDot">*</span></label>
                            <input type="checkbox" id="enchant_wkn" name="enchant_wkn" />
                        </div>
        
                        <div class="param">
                            <label for="stroke">Stroke : <span>Off</span></label>
                            <input type="checkbox" id="stroke" name="stoke" />
                        </div>
        
                        <div class="param">
                            <label for="bloodmoon">Blood moon : <span>Off</span></label>
                            <input type="checkbox" id="bloodmoon" name="bloodmoon" />
                        </div>
        
                        <div class="param">
                            <label for="fear">Fear : <span>Off</span></label>
                            <input type="checkbox" id="fear" name="fear" />
                        </div>

                        <div class="param">
                            <label for="idol">Shine shine (Idol) : <span>Off</span></label>
                            <input type="checkbox" id="idol" name="idol" />
                        </div>

                        <div class="param">
                            <label for="typebane">Typebane : <span>Off</span></label>
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
                            <label for="pa_full">Points for Full : <span>100</span></label>
                            <input type="number" name="pa_full" id="pa_full" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_multiple">Points for Multiple : <span>100</span></label>
                            <input type="number" name="pa_multiple" id="pa_multiple" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="separator"></div>

                        <div class="param">
                            <label for="pa_cone_half">Points for Cone Half : <span>100</span></label>
                            <input type="number" name="pa_cone_half" id="pa_cone_half" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_wide">Points for Cone Wide : <span>100</span></label>
                            <input type="number" name="pa_cone_wide" id="pa_cone_wide" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_square">P.f. Cone Square : <span>100</span></label>
                            <input type="number" name="pa_cone_square" id="pa_cone_square" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_pyramid">P.f. Cone Pyramid : <span>100</span></label>
                            <input type="number" name="pa_cone_pyramid" id="pa_cone_pyramid" min="0" max="100" placeholder="--Please enter a value--">
                        </div>

                        <div class="param">
                            <label for="pa_cone">Points for Cone : <span>100</span></label>
                            <input type="number" name="pa_cone" id="pa_cone" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_spike">Points for Cone Spike : <span>100</span></label>
                            <input type="number" name="pa_cone_spike" id="pa_cone_spike" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_narrow">P.f. Cone Narrow : <span>100</span></label>
                            <input type="number" name="pa_cone_narrow" id="pa_cone_narrow" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_line">Points for Line : <span>100</span></label>
                            <input type="number" name="pa_line" id="pa_line" min="0" max="100" placeholder="--Please enter a value--">
                        </div>

                        <div class="separator"></div>
                        
                        <div class="param">
                            <label for="pa_circle_fat">Points for Circle Fat : <span>100</span></label>
                            <input type="number" name="pa_circle_fat" id="pa_circle_fat" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_huge">Points for Circle Huge : <span>100</span></label>
                            <input type="number" name="pa_circle_huge" id="pa_circle_huge" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_verylarge">P.f. Circle Very Large : <span>100</span></label>
                            <input type="number" name="pa_circle_verylarge" id="pa_circle_verylarge" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_large">Points for Circle Large : <span>100</span></label>
                            <input type="number" name="pa_circle_large" id="pa_circle_large" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                                                
                        <div class="param">
                            <label for="pa_circle">Points for Circle : <span>100</span></label>
                            <input type="number" name="pa_circle" id="pa_circle" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_medium">P.f. Circle Medium : <span>100</span></label>
                            <input type="number" name="pa_circle_medium" id="pa_circle_medium" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_little">Points for Circle Little : <span>100</span></label>
                            <input type="number" name="pa_circle_little" id="pa_circle_little" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_tiny">Points for Circle Tiny : <span>100</span></label>
                            <input type="number" name="pa_circle_tiny" id="pa_circle_tiny" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_single">Points for Single : <span>100</span></label>
                            <input type="number" name="pa_single" id="pa_single" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_single_trap">Points for Single Trap : <span>100</span></label>
                            <input type="number" name="pa_single_trap" id="pa_single_trap" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_summon">Points for Summon : <span>100</span></label>
                            <input type="number" name="pa_summon" id="pa_summon" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_controllable">P.f. Controllable : <span>100</span></label>
                            <input type="number" name="pa_controllable" id="pa_controllable" min="0" max="100" placeholder="--Please enter a value--">
                        </div>

                        <div class="separator"></div>

                        <div class="param">
                            <label for="importance_aoetype"> Importance AoE Type : <span>100</span></label>
                            <input type="number" name="importance_aoetype" id="importance_aoetype" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="importance_range">Importance Range : <span>100</span></label>
                            <input type="number" name="importance_range" id="importance_range" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="importance_dps">Importance DPS : <span>100</span></label>
                            <input type="number" name="importance_dps" id="importance_dps" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="importance_aoe">Importance AoE : <span>100</span></label>
                            <input type="number" name="importance_aoe" id="importance_aoe" min="0" max="100" placeholder="--Please enter a value--">
                        </div>

                        <div class="separator"></div>

                        <div class="param">
                            <label for="chart_scaling">Chart Scaling : <span>logarithmic</span></label>
                            <select name="chart_scaling" id="chart_scaling">
                                <option value="">--Please choose an option--</option>
                                <option value="linear">Linear</option>
                                <option value="logarithmic">Logarithmic</option>
                            </select>
                        </div>
                        
                        <div class="param">
                            <label for="chart_order_scaling">Chart Order Scaling : <span>100</span> %</label>
                            <input type="number" name="chart_order_scaling" id="chart_order_scaling" min="0" max="100" placeholder="--Please enter a value--">
                        </div></div>
                    </details>

        </form>
    </div><br>
    <div class="frame">
        <h1>Preset</h1>
        <form action="" class="settingsForm">
                    <details class="generalSettingsDetails">
                        <summary>
                            <p class="form-title">Load Preset</p>
                        </summary>    
                        <div class="divi">
                            <div class="param">
                                <label for="preset_search">Search by Id or Name<span class="redDot">*</span></label>
                                <input type="text" name="preset_search" id="preset_search" placeholder="--Please type search--">
                            </div>
                            <p class="or">OR</p>
                            <div class="param">
                                <label for="native_preset">Native preset<span class="redDot">*</span></label>
                                <select name="native_preset" id="native_preset">
                                    <option value="">--Please choose an option--</option>
                                    <option value="Neutral preset">Neutral preset</option>
                                    <option value="Start preset">Start preset</option>
                                    <option value="Raid preset">Raid preset</option>
                                </select>
                            </div>
                            <a href="" class="button-85 load" role="button">L O A D</a>
                        </div>
                        <p class="littleWarning"><span class="redDot">*</span>:Can't be used together or it will mess up.</p>
                    </details>
                    <details open class="generalSettingsDetails">
                        <summary>
                            <p class="form-title">Save Preset</p>
                        </summary>    
                        <div class="divi">
                            <div class="param">
                                <label for="preset_name">Preset Name<span class="greenDot">*</span></label>
                                <input type="text" name="preset_name" id="preset_name" placeholder="--Please set name--">
                            </div>
                            <div class="param">
                                <label for="preset_password">Preset Password</label>
                                <input type="password" name="preset_password" id="preset_password" placeholder="--Please set password--">
                            </div>
                            <a href="" class="button-85 save" role="button">S A V E</a><br>
                            <a href="" class="button-85 save" role="button">APPLY PRESET</a>
                        </div>
                        <p class="littleWarning"><span class="greenDot">*</span>:Must be filled.</p>
                       </details>

        </form>
    </div><br>
    </div>
</main>

<?php include "footer.php"?>



</body>
</html>