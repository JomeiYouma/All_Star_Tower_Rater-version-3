<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Page All Star Tower Rater</title>
    <link href="style_general.css" rel="stylesheet" />
    <link href="/All_Star_Tower_Rater/style_character_page.css" rel="stylesheet" />
    <link rel="icon" href="image_file/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="characterPageBody">
    
<?php include "header.php"?>

<main class="characterPageMain">

    <!-- Nom et Illustration -->
    <section class="top-section">
        <div class="character-name">
            <h1>Nom du personnage</h1>
            <p>Description ou sous-texte</p>
        </div>
        <div class="character-illu">
            <img src="image_file/blank_character.png" alt="">
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
            <div class="tooltip">
            <img src="image_file/diagram(2).png" alt="Change calculation method">
            <div class="tooltiptext">
            Change calculation method
            </div>
            </div>
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


<?php include "footer.php"?>

<script src="function-import-data.js"></script>
<script src="function-format.js"></script>
<script>
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
<?php include "function-calculate-macro.js";?> //Calculs des stats qui apparaissent dans la page
<?php include "function-add-content.js";?>
<?php include "function-add-modified-data.js";?>
//----------------------------------------------------------------------------
// Appel de la fonction après le chargement des données
addContentForUnit(unitId, {
    name: name,
    desc: desc,
    illu: img,
    capaContainer: capaContainer,
    mpElement: mpElement,
    ecElement: ecElement,
    rlElement: rlElement,
    arElement: arElement,
    fdElement: fdElement,
    upElement: upElement,
    aeElement: aeElement,
    hrElement: hrElement,
    dsElement: dsElement,
    ddElement: ddElement,
    dhElement: dhElement,
    daElement: daElement,
    coElement: coElement,
    wtElement: wtElement,
});
addModifiedData();
//----- PRÉPARATION DIAGRAMME ------
const ctx = document.getElementById('myChart');
<?php include "function-diagram-ratio.js"; ?> //Paramétrage
let unitA = modifiedData.find(unit => unit.unitId === unitId); //Récupère l'ID
let values1 = {}; //Se prépare à accueillir les values
applyMethod(unitA, values1); 
// ----- CONSTRUCTION DIAGRAMME ------
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
           /*Worthiness */ values1.wt ,
           /*Cost */ values1.cost,
           /*Farming Difficulty */ unitsData[unitId].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */values1.range ,
           /*Progression */unitsData[unitId].progression_points ,
           /*DPS */ values1.dps,
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
function methodChanger(way) {//Pour réutiliser au clic et au chargement dans le sens inverse.
    let from;
    if (way == 1) {
        from = "logarithmic"
    } else {
        from ="linear"
    }
    let methodColor; // Déclaration de la variable à l'extérieur de la condition

if (settingMethode == from) {
    settingMethode = "linear";
    diagramImg.src = "image_file/diagram(2).png";
    diagramImg.alt = "Change calculation method to logarithmic";
    methodColor = '255,204,113'; 
} else {
    settingMethode = "logarithmic";
    diagramImg.src = "image_file/diagram-log.png";
    diagramImg.alt = "Change calculation method to linear";
    methodColor = '113,193,255'; 
}

applyMethod(unitA, values1); // Recalcule les données en fonction de la méthode

// Actualisation du diagramme avec les couleurs dynamiques
myChart.data.datasets = [{
    label: name.innerHTML,
    data: [
       /*Worthiness */ values1.wt ,
       /*Cost */ values1.cost,
       /*Farming Difficulty */ unitsData[unitId].farming_difficulty_points,
       /*Range */ /* hrElement.innerHTML */values1.range ,
       /*Progression */unitsData[unitId].progression_points ,
       /*DPS */ values1.dps,
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
}
diagramImg.addEventListener("click", () => {
    methodChanger(1);
});
methodChanger(0); //Initialisation à la bonne couleur
/* console.log(settingMethode); */
});
</script>
</body>
</html>
