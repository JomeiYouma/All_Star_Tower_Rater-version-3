<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Page All Star Tower Rater</title>
    <link href="/All_Star_Tower_Rater/style_character_page.css" rel="stylesheet" />
    <link rel="icon" href="image_file/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="characterPageBody">
    
<?php include 'header.php'; ?>

<main class="characterPageMain">

    <!-- Nom et Illustration -->
    <section class="top-section">
        <div class="character-name">
            <h1>Nom du personnage</h1>
            <p>Description ou sous-texte</p>
        </div>
        <div class="character-illu">
            <img src="image_file/4-Eye_Sorcerer_29_29.webp" alt="">
        </div>
    </section>

    <!-- Capacités et Diagramme en étoile -->
    <section class="middle-section">
        
        <div class="abilities-container">
            <div class="abilities-title">Abilities</div>
            <br>
            <aside class="character-abilities">
                <img src="image_file/mighty-force.png" alt="Ability 1">
                <img src="image_file/targeting.png" alt="Ability 2">
                <img src="image_file/targeting.png" alt="Ability 2">
                <img src="image_file/targeting.png" alt="Ability 2">
            </aside>
        </div>
        <section class="character-star-diagram">
            <img src="image_file/diagram(2).png" alt="Change calculation method">
            <canvas id="myChart"></canvas></section>
        <section class="recommandations">
            <h3>Quick Changes</h3>
            <form action="">
            <label for="gamemodeFast" class="gamemodeFast">Gamemode : <span>250</span></label>
                <select name="gamemodeFast" id="gamemodeFast">
                    <option value="">--Please choose an option--</option>
                    <option value="start">Start</option>
                    <option value="raid">Raid</option>
                     <option value="max">Max</option>
                 </select>
                <label for="buffFast">Buff strength : <span>250</span> %</label>
                <input type="number" name="buffFast" id="buffFast" min="0" max="300" placeholder="--Please enter a buff nbr--">
                <label for="loadPresetFast">Load preset by ID</label>
                <input type="text" name="loadPresetFast" id="loadPresetFast" placeholder="--Please select preset ID--">
                <input class="fastSubmit" type="submit">
            </form>
        </section>               

    </section>
</div>
    <!-- Statistiques -->
    <section class="character-stats">
        <h2>Stats</h2>
        <div class="stat-box">
            <img src="image_file/three-friends.png" alt="" class="stat-icon">
            <span class="stat-name">Maximum Placement</span>
            <span class="stat-value mp">8</span>
        </div>
        <div class="stat-box">
            <img src="image_file/elements.png" alt="" class="stat-icon">
            <span class="stat-name">Enchant Type</span>
            <span class="stat-value  ec">Nature</span>
        </div>
        <div class="stat-box">
            <img src="image_file/image-removebg-preview (30).png" alt="" class="stat-icon">
            <span class="stat-name">Role</span>
            <span class="stat-value rl">Crowd Control, Executionner</span>
        </div>
        <div class="stat-box">
            <img src="image_file/eye-target.png" alt="" class="stat-icon">
            <span class="stat-name">Target</span>
            <span class="stat-value ar">Hybrid</span>
        </div>
        <div class="stat-box">
            <img src="image_file/summonning.png" alt="" class="stat-icon">
            <span class="stat-name">Farming Difficulty</span>
            <span class="stat-value fd">A-</span>
        </div>
        <div class="stat-box">
            <img src="image_file/upgrading.png" alt="" class="stat-icon">
            <span class="stat-name">Upgrade Progression</span>
            <span class="stat-value up">A+</span>
        </div>
        <div class="stat-box">
            <img src="image_file/aoe.png" alt="" class="stat-icon">
            <span class="stat-name">Area of Effect Type</span>
            <span class="stat-value ae">Full</span>
        </div>
        <div class="stat-box">
            <img src="image_file/range.png" alt="" class="stat-icon">
            <span class="stat-name">Hitting Range</span>
            <span class="stat-value hr">65</span>
        </div>
        <div class="stat-box">
            <img src="image_file/fierce-man.png" alt="" class="stat-icon">
            <span class="stat-name">Damage / seconds</span>
            <span class="stat-value ds">43,670</span>
        </div>
        <div class="stat-box">
            <img src="image_file/bleeding_heart.png" alt="" class="stat-icon">
            <span class="stat-name">DPS from DoT</span>
            <span class="stat-value dd">13,440</span>
        </div>
        <div class="stat-box">
            <img src="image_file/raw_damage.png" alt="" class="stat-icon">
            <span class="stat-name">DPS from hits</span>
            <span class="stat-value dh">29,780</span>
        </div>
        <div class="stat-box">
            <img src="image_file/magic_damage.png" alt="" class="stat-icon">
            <span class="stat-name">DPS from Abilities</span>
            <span class="stat-value da">450</span>
        </div>
        <div class="stat-box">
            <img src="image_file/take-my-money.png" alt="" class="stat-icon">
            <span class="stat-name">Cost</span>
            <span class="stat-value co">27500</span>
        </div>
        <div class="stat-box">
            <img src="image_file/buy-card.png" alt="" class="stat-icon">
            <span class="stat-name">Worthiness</span>
            <span class="stat-value wt">3.7</span>
        </div>
        
    </section>
        <br><br>
    </div>
</main>


<?php include 'footer.php'; ?>


<script>
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

}

document.addEventListener('DOMContentLoaded', async () => {
await importJson(); // Attendre que les données soient chargées
    console.log("Données récupérées depuis sessionStorage:");
    console.log("Units Data:", JSON.parse(sessionStorage.getItem("units_data")));
    console.log("Settings Data:", JSON.parse(sessionStorage.getItem("settings_data")));

//Récupération des paramètres de l'url 
// Récupérer l'ID depuis l'URL
const urlParams = new URLSearchParams(window.location.search);
const unitId = urlParams.get("id");

// Récupération du gamemode depuis les settings sauvegardés
let unitsData = JSON.parse(sessionStorage.getItem("units_data"));
let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
let gamemode = settingsData ? settingsData[0].preset_gamemode : "";
//Définir les différents endroits dans lesquels insérer la data
let name = document.querySelector(".character-name h1");
let desc = document.querySelector(".character-name p");
let img = document.querySelector(".character-illu");
let capaContainer = document.querySelector(".character-abilities");
//Fast Settings
let gmFast = document.querySelector(".gamemodeFast span");
let buffFast = document.querySelector(".buffFast span");
//Stats
    let mpElement = document.querySelector(".mp");//Oui franchement j'ai bourriné mais bon c'est rapide au moins.
    let ecElement = document.querySelector(".ec");
    let rlElement = document.querySelector(".rl");
    let arElement = document.querySelector(".ar");
    let fdElement = document.querySelector(".fd");
    let upElement = document.querySelector(".up");
    let aeElement = document.querySelector(".ae");
    let hrElement = document.querySelector(".hr");
    let dsElement = document.querySelector(".ds");
    let ddElement = document.querySelector(".dd");
    let dhElement = document.querySelector(".dh");
    let daElement = document.querySelector(".da");
    let coElement = document.querySelector(".co");
    let wtElement = document.querySelector(".wt");

// Fonction pour calculer les DPS
function calculateDpsHit(unitId, gamemode, settingsData, mp) {
    const dps_hit = unitsData[unitId][`dps_${gamemode}_unit`] *
                    (1 + settingsData[0].buff / 100) *
                    mp *
                    (1 + settingsData[0].idol / 100) *
                    (1 + settingsData[0].fear / 100) *
                    (1 + settingsData[0].typebane / 100) *
                    (1 + settingsData[0].enchant_str / 100) *
                    (1 + settingsData[0].enchant_wkn / 100) *
                    (1 + settingsData[0].leader / 100) *
                    (1 + settingsData[0].leader_special / 100);
    return dps_hit;
}

// Fonction pour calculer les DPS DOT
function calculateDpsDot(unitId, gamemode, settingsData) {
    const dps_dot = unitsData[unitId][`dps_${gamemode}_dot`] *
                    (1 + settingsData[0].enchant_str / 100) *
                    (1 + settingsData[0].enchant_wkn / 100) *
                    (1 + settingsData[0].leader / 100) *
                    (1 + settingsData[0].leader_special / 100) *
                    (1 + settingsData[0].stroke / 100) *
                    (1 + settingsData[0].buff / 100) *
                    (1 + settingsData[0].idol / 100) *
                    (1 + settingsData[0].fear / 100) *
                    (1 + settingsData[0].bloodmoon / 100) *
                    (1 + settingsData[0].typebane / 100);
    return dps_dot;
}

// Fonction pour calculer le DPS ABILITY
function calculateDpsAbility(unitId, gamemode, settingsData, mp) {
    const dps_placement = unitsData[unitId][`dps_${gamemode}_placement`] * mp * (1 + settingsData[0].idol / 100) * (1 + settingsData[0].fear / 100);
    const dps_fix_placement = unitsData[unitId][`dps_${gamemode}_fix_placement`] * (1 + settingsData[0].idol / 100) * (1 + settingsData[0].fear / 100);
    const dps_buffable = unitsData[unitId][`dps_${gamemode}_buffable`] *
                         (1 + settingsData[0].enchant_str / 100) *
                         (1 + settingsData[0].enchant_wkn / 100) *
                         (1 + settingsData[0].leader / 100) *
                         (1 + settingsData[0].leader_special / 100) *
                         (1 + settingsData[0].typebane / 100) *
                         (1 + settingsData[0].idol / 100) *
                         (1 + settingsData[0].fear / 100);
    const dps_not_buffable = unitsData[unitId][`dps_${gamemode}_not_buffable`] *
                             (1 + settingsData[0].idol / 100) *
                             (1 + settingsData[0].fear / 100) *
                             (1 + settingsData[0].enchant_str / 100) *
                             (1 + settingsData[0].enchant_wkn / 100);

    return dps_placement + dps_fix_placement + dps_buffable + dps_not_buffable;
}

// Fonction pour calculer le DPS total
function calculateDpsTotal(dps_hit, dps_dot, dps_ability) {
    return dps_hit + dps_dot + dps_ability;
}
// Fonction pour calculer le coût
function calculateCost(unitId, gamemode, settingsData, mp) {
    return unitsData[unitId][`cost_${gamemode}`]*mp*(1 - settingsData[0].leader_cost / 100);
}


function parseFormattedNumber(numStr) {
    if (typeof numStr !== "string") {
        numStr = numStr.toString(); // Convertir en string si ce n'est pas déjà le cas
    }
    if (numStr.includes("M")) return parseFloat(numStr) * 1e6;
    if (numStr.includes("k")) return parseFloat(numStr) * 1e3;
    if (numStr.includes("B")) return parseFloat(numStr) * 1e9;
    return parseFloat(numStr);
}
// Fonction pour calculer le ratio WT
function calculateWt(ds, co) {
    let dsValue = parseFormattedNumber(ds);
    let coValue = parseFormattedNumber(co);
    return dsValue / coValue;
}
/* function calculateWt(ds, co) { <= Ancienne version buggée pour les valeurs extrêmes 
    return parseFloat(ds) / parseFloat(co);
} */
function formatNumber(num) {
    if (num >= 1e9) return (num / 1e9).toFixed(2) + "B";
    if (num >= 1e6) return (num / 1e6).toFixed(2) + "M";
    if (num >= 1e3) return (num / 1e3).toFixed(2) + "k";
    return num.toFixed(2);
}
function addContent() {
    if (unitId && unitsData[unitId]) {
        // Assigner le nom de l'unit
        name.innerHTML = unitsData[unitId].in_game_name;
        // Assigner la description de l'unit
        desc.innerHTML = unitsData[unitId].real_name;
        // Assigner l'image de l'unit
        img.innerHTML = `<img src="image_file/${unitsData[unitId].unit_file}" alt="">`;

        capaContainer.innerHTML = ""; //Vider le conteneur des capacités

        if (unitsData[unitId].gamemodes[`${gamemode}`]) {
    let abilities = unitsData[unitId].gamemodes[`${gamemode}`].abilities;

    if (abilities && typeof abilities === "object") {
        let abilitiesArray = Object.values(abilities);
        capaContainer.innerHTML = "";

        abilitiesArray.forEach(ability => {
            // Récupération des types
            let typeArray = [];
            if (ability.ability_types && typeof ability.ability_types === "object") {
                typeArray = Object.values(ability.ability_types).map(typeObj => typeObj.ability_type_name);
            }

            let typeList = typeArray.join(", ") || "N/A";

            capaContainer.innerHTML += `
                <div class="tooltip">
                    <img src="image_file/${ability.ability_file}" alt='${ability.ability_name}'>
                    <div class="tooltiptext">
                        <strong class="effect-text">Effect :</strong> ${ability.ability_description}<br>
                        <strong class="type-text">Ability type :</strong> ${typeList}<br>
                        <strong class="cd-text">Cooldown :</strong> ${ability.ability_cooldown}s
                    </div>
                </div>`;
        });
    } else {
        capaContainer.innerHTML = "<p>No ability found</p>";
    }
}

        // Calcul des stats
        let mp = 1;
        switch (gamemode) {
            case "raid":
                mp = unitsData[unitId].placement_raid || unitsData[unitId].placement;
                break;
            case "start":
                mp = 1;
                break;
            default:
                mp = unitsData[unitId].placement;
                break;
        }

        mpElement.innerHTML = mp;
        ecElement.innerHTML = unitsData[unitId].enchant;
        rlElement.innerHTML = unitsData[unitId][`role_${gamemode}`];
        arElement.innerHTML = unitsData[unitId][`hit_air_${gamemode}`];
        fdElement.innerHTML = unitsData[unitId].farming_difficulty;
        upElement.innerHTML = unitsData[unitId].progression;
        aeElement.innerHTML = unitsData[unitId][`aoe_${gamemode}`];
        hrElement.innerHTML = unitsData[unitId][`rng_${gamemode}`] * (1 + settingsData[0].rng_buff / 100);

        // Calcul du DPS Hit, DPS DOT et DPS Ability
        let dps_hit = calculateDpsHit(unitId, gamemode, settingsData, mp);
        let dps_dot = calculateDpsDot(unitId, gamemode, settingsData);
        let dps_ability = calculateDpsAbility(unitId, gamemode, settingsData, mp);
        // Affichage des DPS avec le calcul du level
        dhElement.innerHTML = formatNumber(calculateLevelBasedDps(dps_hit));
        ddElement.innerHTML = formatNumber(calculateLevelBasedDps(dps_dot));
        daElement.innerHTML = formatNumber(dps_ability);
        dsElement.innerHTML = formatNumber(calculateDpsTotal(calculateLevelBasedDps(dps_hit), calculateLevelBasedDps(dps_dot), dps_ability));

        // Calcul du coût et du ratio WT
        let cost = calculateCost(unitId, gamemode, settingsData, mp);
        coElement.innerHTML = formatNumber(cost);
        wtElement.innerHTML = formatNumber(calculateWt(dsElement.innerHTML, coElement.innerHTML));
        gmFast.innerHTML = gamemode;
    }
}
function calculateLevelBasedDps(dps) {
    let level = settingsData[0].level;
    switch (true) {
        case (level === 1):
            return dps;
        case (level <= 81):
            return dps * (1 + ((level - 1) / 100));
        case (level <= 121):
            return dps * (1 + ((0.2875 * level + 80) / 100));
        case (level <= 151):
            return dps * (1 + ((0.43666667 * level + 91.5) / 100));
        case (level <= 175):
            return dps * (1 + ((0.4 * level + 104.6) / 100));
    }
}
//-------------------------------------FONCTION POUR STOCKER DANS UN TAB TOUTES LES VALEURS MODIF POUR TOUTES LES UNITS
const aoeTypeMap = { //Selon le nom d'affichage, donner l'équivalence nom du champs
    "FULL": "pa_full",
    "AOE FULL": "pa_full",
    "MULTIPLE": "pa_multiple",
    "CONE (HALF)": "pa_cone_half",
    "HALF": "pa_cone_half",
    "CONE (WIDE)": "pa_cone_wide",
    "CONE (HUGE)": "pa_cone_wide",
    "CONE (SQUARE)": "pa_cone_square",
    "CONE (PYRAMID)": "pa_cone_pyramid",
    "CONE": "pa_cone",
    "CIRCLE (": "pa_circle",
    "CONE (SPIKE)": "pa_cone_spike",
    "CONE (NARROW)": "pa_cone_narrow",
    "LINE": "pa_line",
    "CIRCLE (FAT)": "pa_circle_fat",
    "CIRCLE (HUGE)": "pa_circle_huge",
    "CIRCLE (VERY LARGE)": "pa_circle_verylarge",
    "CIRCLE (LARGE)": "pa_circle_large",
    "CIRCLE": "pa_circle",
    "CIRCLE (MEDIUM)": "pa_circle_medium",
    "CIRCLE (LITTLE)": "pa_circle_little",
    "CIRCLE (SMALL)": "pa_circle_little",
    "CIRCLE (TINY)": "pa_circle_tiny",
    "SINGLE": "pa_single",
    "SINGLE (TRAP)": "pa_single_trap",
    "SUMMON": "pa_summon",
    "CONTROLLABLE": "pa_controllable",
    "NONE": 0,
    "NO": 0
}; //Étape 1 : déclarer les variables min max value
let modifiedData = [];
let unitsNbr = 0;
let minCostValue = 0;
let maxCostValue = 0;
let minAoeValue = 0;
let maxAoeValue = 0;
let minRngValue = 0;
let maxRngValue = 0;
let minDpsValue = 0;
let maxDpsValue = 0;
let minWtValue = 0;
let maxWtValue = 0;
function addModifiedData() {
    modifiedData = [];

    Object.entries(unitsData).forEach(([unitId, unit]) => {
        let mp = unit.placement;
        if (gamemode === "raid") {
            mp = unit.placement_raid || unit.placement;
        }

        // Calcul des DPS
        let dps_hit = calculateDpsHit(unitId, gamemode, settingsData, mp);
        let dps_dot = calculateDpsDot(unitId, gamemode, settingsData);
        let dps_ability = calculateDpsAbility(unitId, gamemode, settingsData, mp);
        let dps_total = calculateDpsTotal(dps_hit, dps_dot, dps_ability);

        // Calcul du coût
        let cost = calculateCost(unitId, gamemode, settingsData, mp);

        //Calcul des points accordés pour le type d'AOE
        const aoeType = unit[`aoe_${gamemode}`].toUpperCase();
        /* console.log(aoeType); */
        const aoeKey = aoeTypeMap[aoeType];
        const aoePoints = settingsData[0][aoeKey] ?? 0;
        /* console.log("AOE",unit[`aoe_${gamemode}`],aoeType,aoeKey,aoePoints); */

        // Calcul du ratio WT
        let wt = calculateWt(dps_total, cost);

        // Stockage des valeurs modifiées
        modifiedData.push({
            unitId: unitId,
            in_game_name: unit.in_game_name,
            real_name: unit.real_name,
            placement: mp,
            enchant: unit.enchant,
            role: unit[`role_${gamemode}`],
            hit_air: unit[`hit_air_${gamemode}`],
            farming_difficulty: unit.farming_difficulty,
            progression: unit.progression,
            aoe: unit[`aoe_${gamemode}`],
            aoe_points: aoePoints,
            range: parseFloat(unit[`rng_${gamemode}`] * (1 + settingsData[0].rng_buff / 100)),
            /* range_points: rangePoints, */
            dps_hit: dps_hit,
            dps_dot: dps_dot,
            dps_ability: dps_ability,
            dps_total: dps_total,
            cost: cost,
            wt: wt
        });
    });
//Ordonner et ranker
    unitsNbr = modifiedData.length;
    console.log("Nombre d'units",unitsNbr);
// COST RANK ###########################################################
    modifiedData.sort((a, b) => parseFloat(a.cost) - parseFloat(b.cost));
    maxCostValue = modifiedData[modifiedData.length - 1].cost;
    minCostValue = modifiedData[0].cost;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_cost = index + 1;
    /* console.log("Cost",unit.cost , unit.unitId , unit.rank_cost , unit.in_game_name); */
    });
/* console.log('Max cost =',maxCostValue);
console.log('Min cost =',minCostValue); */
// AOE RANK ##########################################################
    modifiedData.sort((a, b) => parseFloat(a.aoe_points) - parseFloat(b.aoe_points));
    maxAoeValue = modifiedData[modifiedData.length - 1].aoe_points;
    minAoeValue = modifiedData[0].aoe_points;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_aoe = index + 1;
/*     console.log("AOE",unit.aoe_points , unit.unitId , unit.rank_aoe , unit.in_game_name); */
    });
console.log('Max aoe =',maxAoeValue);
console.log('Min aoe =',minAoeValue);
// RANGE RANK ##########################################################
modifiedData.sort((a, b) => parseFloat(a.range) - parseFloat(b.range));
    if ((modifiedData[modifiedData.length - 1].range)<200) { //Évite de compter les range absurdes comme 1024, 200 = toute la map.
        maxRngValue = modifiedData[modifiedData.length - 1].range;
    } else {
        maxRngValue = 160
    }
    minRangeValue = modifiedData[0].range;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_range = index + 1;
/*     console.log("Range",unit.range, unit.unitId , unit.rank_range , unit.in_game_name); */
    });
console.log('Max range =',maxRngValue);
console.log('Min range =',minRngValue);
// DPS RANK ##########################################################
modifiedData.sort((a, b) => parseFloat(a.dps_total) - parseFloat(b.dps_total));
    maxDpsValue = modifiedData[modifiedData.length - 1].dps_total;
    minDpsValue = modifiedData[0].dps_total;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_dps_total = index + 1;
/*     console.log("DPS",unit.dps_total , unit.unitId , unit.rank_dps_total , unit.in_game_name); */
    });
console.log('Max dps =',maxDpsValue);
console.log('Min dps =',minDpsValue);
// WORTHINESS RANK ##########################################################
modifiedData.sort((b, a) => parseFloat(b.wt) - parseFloat(a.wt));
    maxWtValue = modifiedData[modifiedData.length - 1].wt;
    minWtValue = modifiedData[0].wt;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_wt = index + 1;
    /* console.log("Worthiness",unit.wt , unit.unitId , unit.rank_wt , unit.in_game_name); */
    });
console.log('Max wt =',maxWtValue);
console.log('Min wt =',minWtValue);
};
//-------------------------------------------------------------------------------------------------------------------------------------
// Appel de la fonction après le chargement des données
addContent();
addModifiedData();
/* console.log(unitsData[unitId].progression_points); */
//--------------------------------------------------DIAGRAMME DE LA MORT QUI TUE-------------------------------------------
const ctx = document.getElementById('myChart');
let settingImportanceAoeType = 50; //ça sera une setting plus tard
let settingMethode = 1; // 1 = log, 2 = linear
let settingRankRatio = 70; //Immportance de du rank par rapport à l'importance de la valeur (ça sera une setting plus tard)

function ratioGeneral(stat1, statRank1, rankNbr, maxValue1, minValue1, importance, stat2, statRank2, maxValue2, minValue2) {//Fonction pour les deux échelles

console.log('-------------Infos générales-------------');
console.log("rankNbr:", rankNbr);
console.log("importance Stat 2 -> 1:", importance,' %');
console.log("settingRankRatio:", settingRankRatio, ' %');
console.log("settingMethode:", settingMethode, ' 0=linear');
console.log('-------------Infos Stat 1 (ex : dps)-------------');
console.log("stat1:", stat1);
console.log("minValue1:", minValue1);
console.log("maxValue1:", maxValue1);
console.log("statRank1:", statRank1);
console.log('Stat log',Math.log(1 + stat1))
console.log('Min value log',Math.log(1 + minValue1))
console.log('Max value log',Math.log(1 + maxValue1))
console.log('Stat - MinStat log',Math.log(1 + stat1) - Math.log(1 + minValue1));
console.log('Rank1 / MaRank * ratiorank',(statRank1 / rankNbr) * (settingRankRatio / 100))
console.log('Calcul Stat - MinStat log / Max - Min log',(
                        (Math.log(1 + stat1) - Math.log(1 + minValue1)) /
                        (Math.log(1 + maxValue1) - Math.log(1 + minValue1))
                    ));
console.log('FirstCalc * 1-rankRatio%) + rank/maxRank * rankRatio%) * 1-importance',(
            (
                (
                    (
                        (Math.log(1 + stat1) - Math.log(1 + minValue1)) /
                        (Math.log(1 + maxValue1) - Math.log(1 + minValue1))
                    ) * (1 - settingRankRatio / 100)
                ) +
                (statRank1 / rankNbr) * (settingRankRatio / 100)
            ) * (1 - importance / 100)
        ));
console.log('-------------Infos Stat 2 (ex : aoe)-------------');
console.log("stat2:", stat2);
console.log("minValue2:", minValue2);
console.log("maxValue2:", maxValue2);
console.log("statRank2:", statRank2);
                    
    /* console.log('Importance',100-importance); */

console.log('Stat2 log', Math.log(1 + stat2));
console.log('Min value 2 log', Math.log(1 + minValue2));
console.log('Max value 2 log', Math.log(1 + maxValue2));
console.log('Stat2-MinStat', Math.log(1 + stat2) - Math.log(1 + minValue2));
console.log('Rank2 / MaRank * ratiorank',(statRank1 / rankNbr) * (settingRankRatio / 100))
console.log('Calcul Stat - MinStat log / Max - Min log', (
    (Math.log(1 + stat2) - Math.log(1 + minValue2)) /
    (Math.log(1 + maxValue2) - Math.log(1 + minValue2))
));
console.log('FirstCalc * 1-rankRatio%) + rank/maxRank * rankRatio%) * importance', (
    (
        (
            (Math.log(1 + stat2) - Math.log(1 + minValue2)) /
            (Math.log(1 + maxValue2) - Math.log(1 + minValue2))
        ) * (1 - (settingRankRatio / 100))
    ) +
    (statRank2 / rankNbr) * (settingRankRatio / 100)
) * (importance / 100));

    if (settingMethode === 0) {
            return (
                (((((stat1/maxValue1) * (1-settingRankRatio/100)) + ((statRank1/rankNbr) * (settingRankRatio/100))) * (1-(importance/100))) + (((stat2/maxValue2) * (1-settingRankRatio/100)) + ((statRank2/rankNbr) * (settingRankRatio/100))) * (importance/100))*100
        )
        } else {
            
            return (
            ((
                (
                    (
                        (Math.log(1 + stat1) - Math.log(1 + minValue1)) /
                        (Math.log(1 + maxValue1) - Math.log(1 + minValue1))
                    ) * (1 - settingRankRatio / 100)
                ) +
                (statRank1 / rankNbr) * (settingRankRatio / 100)
            ) * (1 - importance / 100)
        ) +
        (
            (
                (
                    (Math.log(1 + stat2) - Math.log(1 + minValue2)) /
                    (Math.log(1 + maxValue2) - Math.log(1 + minValue2))
                ) * (1 - settingRankRatio / 100)
            ) +
            (statRank2 / rankNbr) * (settingRankRatio / 100)
        ) * (importance / 100)) * 100;

    }; 
};
let currentUnit = modifiedData.find(unit => unit.unitId === unitId);
/* console.log(currentUnit); */
let costLogValue = 0;
let worthinessLogValue =0;
let dpsLogValue = 0;
let rangeLogValue = 0;

function applyMethod(){
    costLogValue = ratioGeneral(currentUnit.cost, currentUnit.rank_cost, unitsNbr, maxCostValue, minCostValue, 0, 10, 140, 1000, 0); //À la place du 0, insérer la bonne stat d'importance quand il y en a besoin (différent pour chaque calcul).
worthinessLogValue = ratioGeneral(currentUnit.wt, currentUnit.rank_wt, unitsNbr, maxWtValue, minWtValue, 0, 10, 140, 1000, 0);
dpsLogValue = ratioGeneral(currentUnit.dps_total, currentUnit.rank_dps_total, unitsNbr, maxDpsValue, minDpsValue, 0, 10, 140, 1000, 0);
rangeLogValue = ratioGeneral(currentUnit.range, currentUnit.rank_range, unitsNbr, maxRngValue, minRngValue, settingImportanceAoeType, currentUnit.aoe_points, currentUnit.rank_aoe, maxAoeValue, minAoeValue);
console.log('Cost : ', costLogValue);
console.log('Wt : ', worthinessLogValue);
console.log('Dps : ', dpsLogValue);
console.log('Rng : ', rangeLogValue);
};
applyMethod();

const data = {
    labels: [
        'Worthiness',
        'Cost',
        'Farming Difficulty',
        'Range',
        'Progression',
        'DPS'
    ],
    datasets: [{
        label: name.innerHTML,
        data: [
           /*Worthiness */ worthinessLogValue ,
           /*Cost */ costLogValue,
           /*Farming Difficulty */ unitsData[unitId].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */rangeLogValue ,
           /*Progression */unitsData[unitId].progression_points ,
           /*DPS */ dpsLogValue,
        ],
        fill: true,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointBackgroundColor: 'rgb(255, 99, 132)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(255, 99, 132)'
    }]
};

let myChart = new Chart(ctx, {
    type: 'radar',
    data: data,
    options: {
        scales: {
    r: {
      min: 0,
      max: 100,
    }
  }
    }
});
//Clic diagram//
const diagramImg = document.querySelector(".character-star-diagram img");

diagramImg.addEventListener("click", () => {
    let methodColor; // Déclaration de la variable à l'extérieur de la condition

    if (settingMethode === 1) {
        settingMethode = 0;
        diagramImg.src = "image_file/diagram(2).png";
        diagramImg.alt = "Change calculation method to logarithmic";
        methodColor = '255,204,113'; 
    } else {
        settingMethode = 1;
        diagramImg.src = "image_file/diagram-log.png";
        diagramImg.alt = "Change calculation method to linear";
        methodColor = '113,193,255'; 
    }

    applyMethod(); // Recalcule les données en fonction de la méthode

    // Actualisation du diagramme avec les couleurs dynamiques
    myChart.data.datasets = [{
        label: name.innerHTML,
        data: [
           /*Worthiness */ worthinessLogValue ,
           /*Cost */ costLogValue,
           /*Farming Difficulty */ unitsData[unitId].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */ rangeLogValue ,
           /*Progression */ unitsData[unitId].progression_points ,
           /*DPS */ dpsLogValue,
        ],
        fill: true,
        backgroundColor: `rgba(${methodColor}, 0.2)`, 
        borderColor: `rgb(${methodColor})`,        
        pointBackgroundColor: `rgb(${methodColor})`, 
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: `rgb(${methodColor})` 
    }];
    myChart.update();
});
});
</script>
</body>
</html>
