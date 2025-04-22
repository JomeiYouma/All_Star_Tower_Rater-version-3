<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Search All Star Tower Rater</title>
    <link href="style_general.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link rel="icon" href="image_file/favicon.ico">
    <style>
        .searchResults {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .personnages {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            max-width: 1200px;
        }

        .card {
            width: 200px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 8px;
        }

        .card img {
            width: 100px;
            height: 100px;
            border-radius: 6px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .stats {
            font-size: 12px;
        }

        .stat {
            font-weight: bold;
            background: #007BFF;
            color: white;
            padding: 3px;
            border-radius: 4px;
            margin-top: 5px;
        }
        .card {
    cursor: pointer;
}
    </style>
    
</head>
<body class="searchBody">
    
<?php include "header.php"?>

<main class="settingsMain">
    <div class="frame">
        <h1>Advanced Search</h1>
        <p>Les paramètres vous permettent d'activer les différents boosts pour vos unités et de modifier les coefficients des variables dont dépendent les calculs subjectifs. Vous pouvez également choisir le mode de jeu considéré par l'outil. Il est possible d'enregistrer vos paramètres en créant un "preset".</p>
            <form action="" method="GET" class="settingsForm">
    <details open class="generalSettingsDetails">
        <summary>
            <p class="form-title">Filters :</p>
        </summary>    
        <div class="divi">

            <div class="param">
                <label for="name">Name :</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="param">
                <label for="enchantFilter">Enchant :</label>
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
                <label for="isHittingAir">Air damage :</label>
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
                <label for="role">Role :</label>
                <select name="role" id="role">
                    <option value="">--Please choose an option--</option>
                    <option value="Executionner">Executionner</option>
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
                <label for="roleNbr">Number of roles:</label>
                <select name="roleNbr" id="roleNbr">
                    <option value="">--Please choose an option--</option>
                    <option value="one">1</option>
                    <option value="two">2</option>
                    <option value="three">3</option>
                    <option value="four">4</option>
                    <option value="oneNoExecutionner">1 (without Executionner)</option>
                </select>
            </div>

            <div class="param">
                <label for="abilityType">Type of abilities :</label>
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
                <label for="startCost">Placement cost (per unit):</label>
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
                <label for="maxCost">Maximum cost (per unit):</label>
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
                <label for="max_placement">Maximum Placement :</label>
                <select name="max_placement" id="max_placement">
                    <option value="">--Please choose an option--</option>
                    <option value="1">1</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                </select>
            </div>

            <div class="param">
                <label for="collectionDifficulty">Collection difficulty (E=Ez):</label>
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

<!--             <button type="submit" class="button-85">Rechercher</button> -->
        </div>
        <p class="littleWarning"><span class="greenDot">*</span> Must be filled if you want to create a preset.</p>
    </details>
            </form>

    </div>
    <div class="frame searchResults">
        <h1>Search Results</h1>
        <h2 class="filtersMessage"><span class="foundUnits"></span>Waiting for filters...</h2>
        <div id="personnages" class="personnages"></div>
    </div>
</main>
<?php include "footer.php"?>

<script src="script.js"></script>

<script>
let enchant = (document.getElementById('enchantFilter'));//Déclaration des inputs
let name = (document.getElementById('name'));
let air = (document.getElementById('isHittingAir'));
let role = (document.getElementById('role'));
let roleNbr = (document.getElementById('roleNbr'));
let abilityType = (document.getElementById('abilityType'));
let startCost = (document.getElementById('startCost'));
let maxCost = (document.getElementById('maxCost'));
let max_placement = (document.getElementById('max_placement'));
let collectionDifficulty = (document.getElementById('collectionDifficulty'));

async function importJson() {
    let unitsData = JSON.parse(sessionStorage.getItem("units_data"));
    let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));

    if (!unitsData) { // Si "units_data" n'existe pas, on fetch
        console.log("No units data, fetching unit data...");
        try {
            const response = await fetch('sqlToJson_units.php');
            unitsData = await response.json();
            sessionStorage.setItem("units_data", JSON.stringify(unitsData));
            console.log("Units data fetched and saved:", unitsData);
        } catch (error) {
            console.error('Erreur:', error);
        }
    } else {
        console.log("Units data loaded, open to actions.", unitsData);
    }

    if (!settingsData) { // Si "settings_data" n'existe pas, on fetch
        console.log("No settings data, fetching settings data...");
        try {
            const response = await fetch('sqlToJson_settings.php');
            settingsData = await response.json();
            sessionStorage.setItem("settings_data", JSON.stringify(settingsData));
            console.log("Settings fetched and saved:", settingsData);
        } catch (error) {
            console.error('Erreur:', error);
        }
    } else {
        console.log("Settings data loaded, open to actions.", settingsData);
    }

    // Maintenant que les données sont prêtes, on affiche les personnages
    afficherPersonnages(unitsData);
}

document.addEventListener('DOMContentLoaded', async () => {
    await importJson(); // Attendre que les données soient chargées

    document.querySelectorAll("select, input").forEach(element => {
    element.addEventListener("change", function() {
        /* if (element.value==="") {   Ce morceau empêche les filtres de revenir à la normale.
            console.log('Filter deleted.')
        } else { */
            afficherPersonnages(JSON.parse(sessionStorage.getItem("units_data")));//Parce que c'est pas encore défini à ce moment 
        /* } */
    });
    //Redirection vers la page de l'unit
    document.getElementById("personnages").addEventListener("click", (event) => {
    const unitCard = event.target.closest(".card"); // Vérifie si on a cliqué sur une carte

    if (unitCard) {
        const characterId = unitCard.dataset.id; // ✅ Récupère l'ID correctement
        console.log("ID sélectionné :", characterId);

        unitCard.style.border = "grey solid 2px"; 

        window.location.href = `characterPageTest.php?id=${characterId}`;
    }
});

});
    
});
function countSeparators(testedString,separator){
    return testedString.split(separator).length - 1;
};

function afficherPersonnages(units) {//Affichage des personnages
    let foundUnits = 0; //Déclaration du compteur de personnages sélectionnés
    const container = document.getElementById('personnages');
    container.innerHTML = '';

    if (!units || Object.keys(units).length === 0) {//ça va servir à rien en fait
        container.innerHTML = '<p>Aucun personnage à afficher.</p>';
        return;
    }

    // Récupération du gamemode depuis les settings sauvegardés
    let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
    let gamemode = settingsData ? settingsData[0].preset_gamemode : ""; 


    Object.values(units).forEach(unit => {
        const card = document.createElement('div');
        card.classList.add('card');
        card.dataset.id = unit.unit_id; // Stocke l'ID dans la carte pour la redirection au clic
    //Vérif des filtres
    if (name.value && !(unit.in_game_name.toLowerCase().includes(name.value.toLowerCase()) || unit.real_name.toLowerCase().includes(name.value.toLowerCase()))) {
    // Cache la carte si l'input ne correspond ni au nom in-game, ni au nom réel de l'unité
    card.style.display = 'none'; 
    }
        if (enchant.value && enchant.value !== unit.enchant.toLowerCase()) {//Si c'est multiple, si c'est pas renseigné, si ça vaut la bonne valeur => on affiche
           card.style.display = 'none'; 
        }
        if (max_placement.value && String(max_placement.value) !== String(unit.placement)) {//Comparer les nombres en tant que String pour cacher les units qui n'ont pas le bon nombre de placement possibles
           console.log(max_placement.value);
           console.log(unit.placement);
           card.style.display = 'none'; 
        }
        if (role.value && !unit[`role_${gamemode}`]?.includes(role.value)) {//Si le rôle est renseigné mais n'est pas contenu dans la liste des rôles (en fonction du gamemode)
            card.style.display = 'none'; 
        }
        if (roleNbr && roleNbr.value) {  
            let separatorCount = countSeparators(unit[`role_${gamemode}`], ".");

            if (roleNbr.value === "one" && separatorCount !== 0) { //Vérifie quel choix est sélectionné, cache en conséquence, selon le nombre de séparateurs.
            card.style.display = 'none';
            }

            if (roleNbr.value === "two" && separatorCount !== 1) {
            card.style.display = 'none';
            }

            if (roleNbr.value === "three" && separatorCount !== 2) {
            card.style.display = 'none';
            }

            if (roleNbr.value === "four" && separatorCount !== 3) {
            card.style.display = 'none';
            }

            if (roleNbr.value === "oneNoExecutionner" && !(separatorCount === 0 && unit[`role_${gamemode}`] !== "Executionner")) {//Ici on ajoute une option pour ne prendre que ceux qui ne sont pas Executionner Only.
            card.style.display = 'none';
            }
        }
        
        //Si le types d'ability est renseigné mais n'est pas contenu dans la liste (en fonction du gamemode)
if (abilityType.value) {
    let selectedGamemode = unit.gamemodes[gamemode]; // Récupère le mode choisi
    if (abilityType.value == "None") {
        if (unit.gamemodes[gamemode]) {
            card.style.display = 'none';
        }
    } else {
        let hasMatchingType = false; // Vérifier si une capacité correspond
    if (selectedGamemode?.abilities) {
        Object.values(selectedGamemode.abilities).forEach(ability => {
            if (ability.ability_types) {
                Object.values(ability.ability_types).forEach(type => {
                    // Vérifie si le type correspond à abilityType.value
                    if (type.ability_type_name && type.ability_type_name.includes(abilityType.value)) {
                        hasMatchingType = true;
                    }
                });
            } else {
                hasMatchingType = false;
            }
        });

        // Si aucun type de capacité ne correspond, cacher la carte
        if (!hasMatchingType) {
            card.style.display = 'none';
        }
    } else {
        card.style.display = 'none';
    }
    }
}

if (startCost.value) { //Sélectionner en fonction du prix de placement
    console.log(unit.cost_start);
    switch (startCost.value) {
        case "500 or less":
            if (unit.cost_start > 500) {
                card.style.display = 'none';
            }
            break;
        case "between500and550":
            if (unit.cost_start < 500 || unit.cost_start > 550) {
                card.style.display = 'none';
            }
            break;
        case "between550and600":
            if (unit.cost_start < 550 || unit.cost_start > 600) {
                card.style.display = 'none';
            }
            break;
        case "minus1000":
            if (unit.cost_start >= 1000) {
                card.style.display = 'none';
            }
            break;
        case "plus1000":
            if (unit.cost_start <= 1000) {
                card.style.display = 'none';
            }
            break;
        case "custom":
            // Gestion de la valeur custom (en développement, donc peut-être aucun changement ici)
            break;
    }
}

if (maxCost.value) { //Sélectionner en fonction du prix maximum par unit
        switch (maxCost.value) {
            case "minus50k":
                if (unit.cost_max >= 50000) {
                    card.style.display = 'none';
                }
                break;
            case "minus100k":
                if (unit.cost_max >= 100000) {
                    card.style.display = 'none';
                }
                break;
            case "minus1mil":
                if (unit.cost_max >= 1000000) {
                    card.style.display = 'none';
                }
                break;
            case "minus5mil":
                if (unit.cost_max >= 5000000) {
                    card.style.display = 'none';
                }
                break;
            case "minus10mil":
                if (unit.cost_max >= 10000000) {
                    card.style.display = 'none';
                }
                break;
            case "plus10mil":
                if (unit.cost_max <= 10000000) {
                    card.style.display = 'none';
                }
                break;
            case "custom":
                // Gestion de la valeur custom (en développement, donc peut-être aucun changement ici)
                break;
        }
}

if (collectionDifficulty.value) {
     //Sélectionner en fonction du prix maximum par unit
     console.log(unit.farming_difficulty_points);
     console.log(parseInt(unit.farming_difficulty_points));
        switch (collectionDifficulty.value) {
            case "f":
                if (unit.farming_difficulty_points >= 15) {
                    card.style.display = 'none';
                }
                break;
            case "e":
                if (unit.farming_difficulty_points >= 26) {
                    card.style.display = 'none';
                }
                break;
            case "d":
                if (unit.farming_difficulty_points >= 38) {
                    card.style.display = 'none';
                }
                break;
            case "c":
                if (unit.farming_difficulty_points >= 51) {
                    card.style.display = 'none';
                }
                break;
            case "b":
                if (unit.farming_difficulty_points >= 64) {
                    card.style.display = 'none';
                }
                break;
            case "a":
                if (unit.farming_difficulty_points >= 82) {
                    card.style.display = 'none';
                }
                break;
            case "s":
                if (unit.farming_difficulty_points < 82) {
                    card.style.display = 'none';
                }
                break;
        }
    }
    if (air.value) { 
    let airType = unit[`hit_air_${gamemode}`]; // Accède à la valeur

    switch (air.value) {
        case "ground":
            if (airType !== "Ground") {
                card.style.display = 'none';
            }
            break;
        case "hill":
            if (airType !== "Hill") {
                card.style.display = 'none';
            }
            break;
        case "hybrid":
            if (airType !== "Hybrid") {
                card.style.display = 'none';
            }
            break;
        case "hill_hybrid":
            if (!["Hill","Hybrid"].includes(airType)) {
                card.style.display = 'none';
            }
            break;
        case "only_air":
            if (airType !== "Air Only") {
                card.style.display = 'none';
            }
            break;
        case "hill_hybrid_only_air":
            if (!["Hill","Hybrid","Air Only"].includes(airType)) {
                card.style.display = 'none';
            }
            break;
    }
}

    if (card.style.display != 'none') { //Récupération du nombre d'units sélectionnées et accord de la phrase.
        foundUnits = foundUnits + 1;
        if ((foundUnits == 0) || (foundUnits == 1)) {
        document.querySelector(".filtersMessage").innerHTML = "<span class='foundUnits'></span> unit found."   
        } else {
        document.querySelector(".filtersMessage").innerHTML = "<span class='foundUnits'></span> units found."   
        }
        document.querySelector(".foundUnits").innerHTML = foundUnits;
    }
        
        card.innerHTML = `
            <img src="/All_Star_Tower_Rater/image_file/${unit.unit_file}" alt="Image de ${unit.in_game_name}">
            <h2>${unit.in_game_name}</h2>
            <h3>${unit.real_name}</h3>
            <div class="stats">
                <div class="stat">ROLE: ${unit.role_max}</div>
                <div class="stat">F D: ${unit.farming_difficulty}</div>
                <div class="stat">Coût: ${unit.cost_max}</div>
            </div>
        `; 
        container.appendChild(card);
    });
    
}

</script>

</body>
</html>