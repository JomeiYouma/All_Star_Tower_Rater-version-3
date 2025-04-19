<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Tower Rater Hub</title>
    <link href="style_general.css" rel="stylesheet" />
    <link href="style_settings.css" rel="stylesheet" />
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
                            <label for="preset_gamemode">Gamemode<span class="greenDot">*</span> : <span class="pre-value">Start</span></label>
                            <select name="preset_gamemode" id="preset_gamemode">
                                <option value="">--Please choose an option--</option>
                                <option value="start">Start</option>
                                <option value="raid">Raid</option>
                                <option value="max">Max</option>
                            </select>
                        </div>
                        
                        <div class="param">
                            <label for="level">Unit level : <span class="pre-value">175</span></label>
                            <input type="number" name="level" id="level" min="1" max="175" placeholder="--Please enter a level--">
                        </div>
        
                        <div class="param">
                            <label for="buff">Buff strength : <span class="pre-value">250</span> %</label>
                            <input type="number" name="buff" id="buff" min="0" max="300" placeholder="--Please enter a buff nbr--">
                        </div>
        
                        <div class="param">
                            <label for="leader">Leader buff : <span class="pre-value">20</span> %</label>
                            <input type="number" name="leader" id="leader" min="0" max="20" placeholder="--Please enter a buff nbr--">
                        </div>
        
                        <div class="param">
                            <label for="leader_special">Leader DoT buff : <span class="pre-value">12</span> %</label>
                            <input type="number" name="leader_special" id="leader_special" min="0" max="30" placeholder="--Please enter a buff nbr--">
                        </div>
        
                        <div class="param">
                            <label for="leader_cost">Leader cost economy : <span class="pre-value">20</span> %</label>
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
                            <label for="pa_full">Points for Full : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_full" id="pa_full" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_multiple">Points for Multiple : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_multiple" id="pa_multiple" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="separator"></div>

                        <div class="param">
                            <label for="pa_cone_half">Points for Cone Half : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_cone_half" id="pa_cone_half" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_wide">Points for Cone Wide : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_cone_wide" id="pa_cone_wide" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_square">P.f. Cone Square : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_cone_square" id="pa_cone_square" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_pyramid">P.f. Cone Pyramid : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_cone_pyramid" id="pa_cone_pyramid" min="0" max="100" placeholder="--Please enter a value--">
                        </div>

                        <div class="param">
                            <label for="pa_cone">Points for Cone : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_cone" id="pa_cone" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_spike">Points for Cone Spike : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_cone_spike" id="pa_cone_spike" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_cone_narrow">P.f. Cone Narrow : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_cone_narrow" id="pa_cone_narrow" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_line">Points for Line : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_line" id="pa_line" min="0" max="100" placeholder="--Please enter a value--">
                        </div>

                        <div class="separator"></div>
                        
                        <div class="param">
                            <label for="pa_circle_fat">Points for Circle Fat : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_circle_fat" id="pa_circle_fat" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_huge">Points for Circle Huge : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_circle_huge" id="pa_circle_huge" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_verylarge">P.f. Circle Very Large : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_circle_verylarge" id="pa_circle_verylarge" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_large">Points for Circle Large : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_circle_large" id="pa_circle_large" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                                                
                        <div class="param">
                            <label for="pa_circle">Points for Circle : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_circle" id="pa_circle" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_medium">P.f. Circle Medium : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_circle_medium" id="pa_circle_medium" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_little">Points for Circle Little : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_circle_little" id="pa_circle_little" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_circle_tiny">Points for Circle Tiny : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_circle_tiny" id="pa_circle_tiny" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_single">Points for Single : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_single" id="pa_single" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_single_trap">Points for Single Trap : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_single_trap" id="pa_single_trap" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_summon">Points for Summon : <span class="pre-value">100</span></label>
                            <input type="number" name="pa_summon" id="pa_summon" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="pa_controllable">P.f. Controllable : <span  class="pre-value">100</span></label>
                            <input type="number" name="pa_controllable" id="pa_controllable" min="0" max="100" placeholder="--Please enter a value--">
                        </div>

                        <div class="separator"></div>

                        <div class="param">
                            <label for="importance_aoetype"> Importance AoE Type : <span  class="pre-value">100</span></label>
                            <input type="number" name="importance_aoetype" id="importance_aoetype" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="importance_range">Importance Range : <span class="pre-value">100</span></label>
                            <input type="number" name="importance_range" id="importance_range" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="importance_dps">Importance DPS : <span class="pre-value">100</span></label>
                            <input type="number" name="importance_dps" id="importance_dps" min="0" max="100" placeholder="--Please enter a value--">
                        </div>
                        
                        <div class="param">
                            <label for="importance_aoe">Importance AoE : <span class="pre-value">100</span></label>
                            <input type="number" name="importance_aoe" id="importance_aoe" min="0" max="100" placeholder="--Please enter a value--">
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
                            <label for="ranking_percentage">Chart Order Scaling : <span class="pre-value">100</span> %</label>
                            <input type="number" name="ranking_percentage" id="ranking_percentage" min="0" max="100" placeholder="--Please enter a value--">
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
                            <a href="" class="button-85 load" role="button">L O A D</a>
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
                            <div class="paramBis">
                                <label for="preset_password">Preset Password</label>
                                <input type="password" name="preset_password" id="preset_password" placeholder="--Please set password--">
                            </div>
                            <a href="" class="button-85 save" id="save" role="button">S A V E</a><br>
                            <a href="" class="button-85 save" id="apply" role="button">APPLY PRESET</a>
                        </div>
                        <p class="littleWarning"><span class="greenDot">*</span>:Must be filled.</p>
                       </details>

        </form>
    </div><br>
    </div>
</main>

<?php include "footer.php";?>
<script>
<?php include "function-import-data-settings.js";?>
document.addEventListener('DOMContentLoaded', async () => {
await importJson(); // Attendre que les données soient chargées
    console.log("Données récupérées depuis sessionStorage:");
    console.log("Settings Data:", JSON.parse(sessionStorage.getItem("settings_data")));
let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
//Fonction pour insérer dans les SPAN le contenu du preset de travail
function addParamsData() {
const params = document.querySelectorAll(".param");
params.forEach(param => {
    const span = param ? param.querySelector("label .pre-value") : null;
    const checkboxInput = param.querySelector("input[type='checkbox']");
        if (checkboxInput) { // Si c'est une checkbox, juste ON ou OFF
            const id = checkboxInput.id
            if (settingsData[0][id] == 0) {
                span.innerHTML="Off";
                console.log("AA",id, span);
            } else {
                console.log(id); 
                span.innerHTML="On";
            }
        }
    const otherInput = param.querySelector("input[type='text'],input[type='number'],select");
    if (otherInput) {
        const id = otherInput.id; //Sinon, on met la valeur, avec une majuscule si c'est pas un nombre.
        console.log(id,settingsData[0][id]);
            if (otherInput.type=="number") {
                span.innerHTML=settingsData[0][id]
            } else {
                span.innerHTML=settingsData[0][id].charAt(0).toUpperCase() + settingsData[0][id].slice(1); //Majuscule en début de string
            }
        
    }

});   
};
addParamsData();
let paramsObj = {}; // Stockage global

//Fonction pour, pour chaque paramètre, inclure dans paramsObj les modif apportées par l'utilisateur
function watchParamsChanges() {
  const inputs = document.querySelectorAll(".param input, .param select, .param textarea");
  inputs.forEach(input => {
    input.addEventListener("change", () => {
      const paramDiv = input.closest(".param");
      const span = paramDiv ? paramDiv.querySelector("label .pre-value") : null;
      const id = input.id || input.name;
      if (!id) return;

      let value;
      if (input.type === "checkbox") {
        value = input.checked;
      } else {
        value = input.value;
      }

      // Ajout ou mise à jour dans paramsObj
      paramsObj[id] = {
        value: value
      };
      if (value=="") { //Rajouter une barre sur le span pour visualiser le changement, et le retirer si retour à 0.
        span.style.textDecoration ="none";
      } else {
        span.style.textDecoration ="line-through black"; 
      }
      console.log(paramsObj);
    });
  });
}
watchParamsChanges();

// 1. Sélection des éléments HTML
let searchPreset = document.querySelector('input[name="preset_search"]');
let resultsContainer = document.querySelector('#resultsContainer');
const nativePresetSelect = document.querySelector('#native_preset');

// 2. Écoute des changements dans le champ de recherche
searchPreset.addEventListener('input', () => {
  resultsContainer.innerHTML = ""; // 2.1. Réinitialisation de l'affichage des résultats
  const query = searchPreset.value.trim(); // 2.2. Nettoyage de la saisie
  let count = 0; // 2.3. Compteur pour limiter à 3 résultats

  // 3. Si aucun texte n'est entré, on cache les résultats
  if (query === "") {
    resultsContainer.style.visibility = "hidden";
    return;
  }

  // 4. Parcours de tous les presets pour vérifier les correspondances
  settingsData.forEach(preset => {
    resultsContainer.style.visibility = "visible"; // 4.1. Affichage du conteneur de résultats
    if (count >= 3) return; // 4.2. Si on a déjà 3 résultats, on arrête

    // 4.3. Comparaison du nom ou de l'ID avec la recherche
    const nameMatch = preset.preset_name.toLowerCase().includes(query.toLowerCase());
    const idMatch = preset.preset_id == query || preset.preset_id == Number(query);

    // 4.4. Si correspondance trouvée et que l’ID est valide (non 0)
    if ((nameMatch || idMatch) && preset.preset_id != 0) {
      const resultPreset = document.createElement('div'); // 4.5. Création d’un élément HTML
      resultPreset.classList.add('resultPreset');
      resultPreset.innerHTML = `
        <h2>${preset.preset_name}</h2>
        <p>Gamemode : <strong>${preset.preset_gamemode}</strong><br>ID : ${preset.preset_id}</p>
      `;
      resultsContainer.appendChild(resultPreset); // 4.6. Ajout du résultat à l’affichage
      count++; // 4.7. Incrémentation du compteur

      // 5. Quand l’utilisateur clique sur un résultat
      resultPreset.addEventListener('click', () => {
        //5.0 Clear l'autre
        nativePresetSelect.value = "";
        // 5.1. Mise à jour du champ avec le nom sélectionné
        searchPreset.value = preset.preset_name;

        // 5.2. Cacher les résultats
        resultsContainer.style.visibility = "hidden";
        resultsContainer.innerHTML = "";

        // 5.3. Affichage du preset sélectionné dans une zone dédiée
        const selectionDisplay = document.querySelector('#selectedPreset');
        selectionDisplay.innerHTML = `
          <h2>Selected Preset :</h2>
          <p><strong>Nom :</strong> ${preset.preset_name}</p>
          <p ><strong>ID :</strong> <span class="selectedPresetID">${preset.preset_id}</span></p>
          <p><strong>Gamemode :</strong> ${preset.preset_gamemode}</p>
        `;
        
        // 5.4. Stockage du preset sélectionné dans une variable globale
        selectedPreset = preset;
        // 6. Comportement Native Preset
        nativePresetSelect.addEventListener('change', () => {
        const value = nativePresetSelect.value;

        if (value === "") {
            return; // Rien de sélectionné
        }

        if (value === "Neutral preset") {
            selectionDisplay.innerHTML = `
            <h2>Selected Preset :</h2>
            <p><strong>Nom :</strong> Neutral Preset</p>
            <p><strong>ID :</strong> <span class="selectedPresetID">1</span></p>
            <p><strong>Gamemode :</strong> Max</p>
            `;
        } else if (value === "Start preset") {
            selectionDisplay.innerHTML = `
            <h2>Selected Preset :</h2>
            <p><strong>Nom :</strong> Start Preset</p>
            <p><strong>ID :</strong> <span class="selectedPresetID">2</span></p>
            <p><strong>Gamemode :</strong> Start</p>
            `;
        } else if (value === "Raid preset") {
            selectionDisplay.innerHTML = `
            <h2>Selected Preset :</h2>
            <p><strong>Nom :</strong> Raid Preset</p>
            <p><strong>ID :</strong> <span class="selectedPresetID">3</span></p>
            <p><strong>Gamemode :</strong> Raid</p>
            `;
        }

        // Réinitialiser la recherche après sélection
        searchPreset.value = "";
        });
      });
    }
  });
});


function loadPreset() {
  const loadBtn = document.querySelector(".load");
  
  loadBtn.addEventListener("click", () => {
    const sPI = document.querySelector('.selectedPresetID')?.innerText; 

    if (sPI && !isNaN(sPI)) {
      const presetIndex = parseInt(sPI);
      if (settings[presetIndex]) {
        sessionStorage.setItem("settings_data", JSON.stringify([JSON.parse(sessionStorage.getItem("settings_data"))[selectedID]]));
        /* addParamsData(); */
        console.log(sessionStorage);
      } else {
        alert("Aucun ID trouvé !");
      }
    } else {
        alert("Aucun preset sélectionné !");
    }
  });
}
});
</script>
</body>
</html>