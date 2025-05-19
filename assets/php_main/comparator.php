<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Tower Rater Comparator</title>
    <meta name="description" content="Compare All Star Tower Defense units side by side. Analyze stats, rarity, and performance to choose the best characters for your team." >
    <link href="/All_Star_Tower_Rater/assets/css/style_general.css" rel="stylesheet" />
    <link href="/All_Star_Tower_Rater/assets/css/style_comparator.css" rel="stylesheet" />
    <link rel="icon" href="/All_Star_Tower_Rater/assets/images/favicon_local.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="comparatorBody">
<?php 
    $id1 = $_GET['id1']?? null;
    $id2 = $_GET['id2']?? null;
    include __DIR__ . "/../php_sup/header.php"?><?php if (isset($id2) && isset($id1)): ?>
    <main class="empty-comparatorMain" style="display: none;"></main>
    <main class="comparatorMain">
<?php include __DIR__ . "/../php_sup/comparator-full.php"; ?>
    </main>
<?php else: ?>
    <main class="empty-comparatorMain">
<?php include __DIR__ . "/../php_sup/comparator-empty.php"; ?>
    </main>
    <main class="comparatorMain" style="display: none;"></main>
<?php endif; ?>
<?php include __DIR__ . "/../php_sup/footer.php"?>

</body>


<script src="/All_Star_Tower_Rater/assets/js/function-import-data.js"></script>
<script src="/All_Star_Tower_Rater/assets/js/function-format.js"></script>
<?php if (isset($id2) && isset($id1)): ?><!-- ##################SCRIPT FULL############# -->
<script>
document.addEventListener('DOMContentLoaded', async () => {
    
<?php include __DIR__ . "/../js/function-calculate-macro.js"?>
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
await importJson(); // Attendre que les données soient chargées
    console.log("Données récupérées depuis sessionStorage:");
    console.log("Units Data:", JSON.parse(sessionStorage.getItem("units_data")));
    console.log("Settings Data:", JSON.parse(sessionStorage.getItem("settings_data")));

// Récupération des paramètres de l'url 
// Récupérer l'ID depuis l'URL
const urlParams = new URLSearchParams(window.location.search);
const unitId1 = urlParams.get("id1");
const unitId2 = urlParams.get("id2");
console.log(unitId1,unitId2);

// Récupération du gamemode depuis les settings sauvegardés
let unitsData = JSON.parse(sessionStorage.getItem("units_data"));
let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
let gamemode = settingsData ? settingsData[0].preset_gamemode : "";
//### Définir les différents endroits dans lesquels insérer la data
//Infos
let name1 = document.querySelector(".name1");
let thName1 = document.querySelector(".thName1");
let forname1 = document.querySelector(".forname1");
let enchant1 = document.querySelector(".enchant1");
let role1 = document.querySelector(".role1");
let illu1 = document.querySelector(".illu1");

let capaContainer1 = document.querySelector(".firstAbilities");

let name2 = document.querySelector(".name2");
let thName2 = document.querySelector(".thName2");
let forname2 = document.querySelector(".forname2");
let enchant2 = document.querySelector(".enchant2");
let role2 = document.querySelector(".role2");
let illu2 = document.querySelector(".illu2");

let capaContainer2 = document.querySelector(".secondAbilities");

//Stats (oui il y en a un certain nombre)
// Unit 1 stats
let mp1 = document.querySelector(".mp1");
let ec1 = document.querySelector(".ec1");
let ar1 = document.querySelector(".ar1");
let fd1 = document.querySelector(".fd1");
let up1 = document.querySelector(".up1");
let ae1 = document.querySelector(".ae1");
let hr1 = document.querySelector(".hr1");
let ds1 = document.querySelector(".ds1");
let dd1 = document.querySelector(".dd1");
let dh1 = document.querySelector(".dh1");
let da1 = document.querySelector(".da1");
let co1 = document.querySelector(".co1");
let wt1 = document.querySelector(".wt1");

// Unit 2 stats
let mp2 = document.querySelector(".mp2");
let ec2 = document.querySelector(".ec2");
let ar2 = document.querySelector(".ar2");
let fd2 = document.querySelector(".fd2");
let up2 = document.querySelector(".up2");
let ae2 = document.querySelector(".ae2");
let hr2 = document.querySelector(".hr2");
let ds2 = document.querySelector(".ds2");
let dd2 = document.querySelector(".dd2");
let dh2 = document.querySelector(".dh2");
let da2 = document.querySelector(".da2");
let co2 = document.querySelector(".co2");
let wt2 = document.querySelector(".wt2");

//Fast Settings
let gmFast = document.querySelector(".gamemodeFast span");
let buffFast = document.querySelector(".buffFast span");
<?php include __DIR__ . "/../js/function-add-content.js"?>
<?php include __DIR__ . "/../js/function-add-modified-data.js";?>
//----------------------------------------------------------------------------
// Appel de la fonction après le chargement des données
function doubleAddContent() {
    addContentForUnit(unitId1, {
    name: name1,
    desc: forname1,
    illu: illu1,
    capaContainer: capaContainer1,
    mpElement: mp1,
    ecElement: ec1,
    rlElement: role1,
    arElement: ar1,
    fdElement: fd1,
    upElement: up1,
    aeElement: ae1,
    hrElement: hr1,
    dsElement: ds1,
    ddElement: dd1,
    dhElement: dh1,
    daElement: da1,
    coElement: co1,
    wtElement: wt1,
    ecElement2: enchant1,
});

addContentForUnit(unitId2, {
    name: name2,
    desc: forname2,
    illu: illu2,
    capaContainer: capaContainer2,
    mpElement: mp2,
    ecElement: ec2,
    rlElement: role2,
    arElement: ar2,
    fdElement: fd2,
    upElement: up2,
    aeElement: ae2,
    hrElement: hr2,
    dsElement: ds2,
    ddElement: dd2,
    dhElement: dh2,
    daElement: da2,
    coElement: co2,
    wtElement: wt2,
    ecElement2: enchant2,
});
addModifiedData();
}
doubleAddContent();

//-----COMPARATOR ROW------------
function cellAdjucement(cell) {
    const rawText = cell.innerHTML.trim();
    const value = parseFormattedNumber(rawText);
    cell.innerHTML = formatNumberShort(value);

    switch (true) {
        case value < 0:
            cell.style.color = 'var(--dark-red)';
            break;
        case value > 0:
            cell.style.color = 'var(--dark-green)';
            cell.innerHTML = '+ ' + cell.innerHTML;
            break;
        default:
            cell.style.color = 'var(--text-gray)';
            break;
    }
}
//Sélection des cases de comparaison et calcul des différence, puis on applique un style selon. Désolé je n'ai pas priorisé la factorisation de cette partie.
let fdC = document.querySelector('.fdC');
let upC = document.querySelector('.upC');
let aeC = document.querySelector('.aeC');
let hrC = document.querySelector('.hrC');
let dsC = document.querySelector('.dsC');
let ddC = document.querySelector('.ddC');
let dhC = document.querySelector('.dhC');
let daC = document.querySelector('.daC');
let coC = document.querySelector('.coC');
let wtC = document.querySelector('.wtC');

function applyCell() {
 fdC.innerHTML = modifiedData.find(obj => obj.unitId === unitId1).farming_difficulty_points - modifiedData.find(obj => obj.unitId === unitId2).farming_difficulty_points;
cellAdjucement(fdC);

upC.innerHTML = modifiedData.find(obj => obj.unitId === unitId1).progression_points - modifiedData.find(obj => obj.unitId === unitId2).progression_points;
cellAdjucement(upC);

aeC.innerHTML = modifiedData.find(obj => obj.unitId === unitId1).aoe_points - modifiedData.find(obj => obj.unitId === unitId2).aoe_points;
cellAdjucement(aeC);

hrC.innerHTML = modifiedData.find(obj => obj.unitId === unitId1).range - modifiedData.find(obj => obj.unitId === unitId2).range;
console.log("DEBUG 1 :", modifiedData.find(obj => obj.unitId === unitId1).dps_total);
console.log("DEBUG 2 :", modifiedData.find(obj => obj.unitId === unitId2).dps_total)
cellAdjucement(hrC);

dsC.innerHTML = ds1.innerHTML - ds2.innerHTML;
cellAdjucement(dsC);
ds1.innerHTML = formatNumberShort(ds1.innerHTML);
ds2.innerHTML = formatNumberShort(ds2.innerHTML);

ddC.innerHTML = dd1.innerHTML - dd2.innerHTML;
cellAdjucement(ddC);
dd1.innerHTML = formatNumberShort(dd1.innerHTML);
dd2.innerHTML = formatNumberShort(dd2.innerHTML);

dhC.innerHTML = dh1.innerHTML - dh2.innerHTML;
cellAdjucement(dhC);
dh1.innerHTML = formatNumberShort(dh1.innerHTML);
dh2.innerHTML = formatNumberShort(dh2.innerHTML);

daC.innerHTML = da1.innerHTML - da2.innerHTML;
cellAdjucement(daC);
da1.innerHTML = formatNumberShort(da1.innerHTML);
da2.innerHTML = formatNumberShort(da2.innerHTML);

coC.innerHTML = co1.innerHTML - co2.innerHTML;
cellAdjucement(coC);
co1.innerHTML = formatNumberShort(co1.innerHTML);
co2.innerHTML = formatNumberShort(co2.innerHTML);

wtC.innerHTML = wt1.innerHTML - wt2.innerHTML;
cellAdjucement(wtC);
wt1.innerHTML = formatNumberShort(wt1.innerHTML);
wt2.innerHTML = formatNumberShort(wt2.innerHTML);
thName1.innerHTML = modifiedData.find(obj => obj.unitId === unitId1).in_game_name;
thName2.innerHTML = modifiedData.find(obj => obj.unitId === unitId2).in_game_name;   
};
applyCell();



//----- PRÉPARATION DIAGRAMME ------
const ctx = document.getElementById('myChart');
<?php include __DIR__ . "/../js/function-diagram-ratio.js"; ?> //Paramétrage
let unitA = modifiedData.find(unit => unit.unitId === unitId1); //Récupère l'ID
let unitB = modifiedData.find(unit => unit.unitId === unitId2); 
let values1 = {}; //Se prépare à accueillir les values
let values2 = {}; 
applyMethod(unitA, values1); 
applyMethod(unitB, values2); 
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
        label: name1.innerHTML,
        data: [
           /*Worthiness */ values1.wt ,
           /*Cost */ values1.cost,
           /*Farming Difficulty */ unitsData[unitId1].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */values1.range ,
           /*Progression */unitsData[unitId1].progression_points ,
           /*DPS */ values1.dps,
        ],
        fill: true,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointBackgroundColor: 'rgb(255, 99, 132)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(255, 99, 132)'
    },{
        label: name2.innerHTML,
        data: [
           /*Worthiness */ values2.wt ,
           /*Cost */ values2.cost,
           /*Farming Difficulty */ unitsData[unitId2].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */values2.range ,
           /*Progression */unitsData[unitId2].progression_points ,
           /*DPS */ values2.dps,
        ],
        fill: true,
        backgroundColor: 'rgba(113,193,255, 0.2)',
        borderColor: 'rgb(113,193,255)',
        pointBackgroundColor: 'rgb(113,193,255)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(113,193,255)'
    }]
};

let myChart = new Chart(ctx, {
    type: 'radar',
    data: data,
    options: {
        animations: {
            tension: {
                duration: 0,
                easing: 'ease in out',
                from: 0,
                to: 0,
                loop: true
            }
        },
        scales: {
            r: {
                min: 0,
                max: 100
            }
        }
    }
});
//Clic diagram//
    let methodColor1; 
    let methodColor2;
const diagramImg = document.querySelector(".comparativeStar img");
function methodChanger(way) { //Pour réutiliser au clic et au chargement dans le sens inverse.
    let from;
    if (way == 1) {
        from = "logarithmic"
    } else {
        from = "linear"
    }

    if (settingMethode == from) {
        settingMethode = "linear";
        diagramImg.src = "/All_Star_Tower_Rater/assets/images/diagram-lin-2.png";
        diagramImg.alt = "Change calculation method to logarithmic";
        methodColor1 = '255,204,113';
        methodColor2 = '143,113,255';
    } else {
        settingMethode = "logarithmic";
        diagramImg.src = "/All_Star_Tower_Rater/assets/images/diagram-log-2.png";
        diagramImg.alt = "Change calculation method to linear";
        methodColor1 = '255,99,132';
        methodColor2 = '113,193,255'; 
    }

    applyMethod(unitA, values1); // Recalcule les données en fonction de la méthode
    applyMethod(unitB, values2);

    // Actualisation du diagramme avec les couleurs dynamiques
    myChart.data.datasets = [{
        label: name1.innerHTML,
        data: [
           /*Worthiness */ values1.wt ,
           /*Cost */ values1.cost,
           /*Farming Difficulty */ unitsData[unitId1].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */values1.range ,
           /*Progression */unitsData[unitId1].progression_points ,
           /*DPS */ values1.dps,
        ],
        fill: true,
        backgroundColor: `rgba(${methodColor1}, 0.2)`, 
        borderColor: `rgb(${methodColor1})`,        
        pointBackgroundColor: `rgb(${methodColor1})`, 
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: `rgb(${methodColor1})` 
    },{
        label: name2.innerHTML,
        data: [
           /*Worthiness */ values2.wt ,
           /*Cost */ values2.cost,
           /*Farming Difficulty */ unitsData[unitId2].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */values2.range ,
           /*Progression */unitsData[unitId2].progression_points ,
           /*DPS */ values2.dps,
        ],
        fill: true,
        backgroundColor: `rgba(${methodColor2}, 0.2)`, 
        borderColor: `rgb(${methodColor2})`,        
        pointBackgroundColor: `rgb(${methodColor2})`, 
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: `rgb(${methodColor2})` 
    }];
    myChart.update();
}
diagramImg.addEventListener("click", () => {
    methodChanger(1);
});
methodChanger(0);
/* console.log(settingMethode); */
if ((unitId1 == 175 && unitId2 == 96)||(unitId1 == 96 && unitId2 == 175)) {
    const script = document.createElement('script');
    script.src = "/All_Star_Tower_Rater/assets/js/dubstep_canva.js";
    document.body.appendChild(script);}


//Settings(Quick)
//1: Recalcul
function reAddContentForUnit(){
  doubleAddContent()
    applyCell();

document.querySelectorAll(".format").forEach(element => {
    element.innerHTML = formatNumberShort(element.innerHTML);
});
let unitA = modifiedData.find(unit => unit.unitId === unitId1); 
let unitB = modifiedData.find(unit => unit.unitId === unitId2); 
    applyMethod(unitA, values1);
    applyMethod(unitB, values2);
// Actualisation du diagramme avec les couleurs dynamiques
myChart.data.datasets = [{
        label: name1.innerHTML,
        data: [
           /*Worthiness */ values1.wt ,
           /*Cost */ values1.cost,
           /*Farming Difficulty */ unitsData[unitId1].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */values1.range ,
           /*Progression */unitsData[unitId1].progression_points ,
           /*DPS */ values1.dps,
        ],
        fill: true,
        backgroundColor: `rgba(${methodColor1}, 0.2)`, 
        borderColor: `rgb(${methodColor1})`,        
        pointBackgroundColor: `rgb(${methodColor1})`, 
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: `rgb(${methodColor1})` 
    },{
        label: name2.innerHTML,
        data: [
           /*Worthiness */ values2.wt ,
           /*Cost */ values2.cost,
           /*Farming Difficulty */ unitsData[unitId2].farming_difficulty_points,
           /*Range */ /* hrElement.innerHTML */values2.range ,
           /*Progression */unitsData[unitId2].progression_points ,
           /*DPS */ values2.dps,
        ],
        fill: true,
        backgroundColor: `rgba(${methodColor2}, 0.2)`, 
        borderColor: `rgb(${methodColor2})`,        
        pointBackgroundColor: `rgb(${methodColor2})`, 
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: `rgb(${methodColor2})` 
    }];

myChart.update();  
}
//2: APPELS SELON LA FAST-SETTING
//Gamemode
let gmFastText = document.querySelector(".gamemodeFast span");
let gmFastInput = document.getElementById("gamemodeFast");
gmFastInput.addEventListener("change", () => {
    const selectedValue = gmFastInput.value;
    if (selectedValue !== "") {
          // Met à jour settingsData
  settingsData[0].preset_gamemode = selectedValue;

// Enregistre dans sessionStorage
sessionStorage.setItem("settingsData", JSON.stringify(settingsData));
gamemode = settingsData ? settingsData[0].preset_gamemode : "";
console.log(gamemode,settingsData);
// Met à jour le texte dans le span
gmFastText.innerText = selectedValue;
reAddContentForUnit()
    }
});
//Buff
let buffFastText = document.querySelector(".buffFast span");
let buffFastInput = document.getElementById("buffFast");
buffFastInput.addEventListener("change", () => {
    const selectedValue = buffFastInput.value;
    if (selectedValue !== "") {
          // Met à jour settingsData
  settingsData[0].buff = selectedValue;

// Enregistre dans sessionStorage
sessionStorage.setItem("settingsData", JSON.stringify(settingsData));
buff = settingsData ? settingsData[0].buff : "";
console.log(buff,settingsData);
// Met à jour le texte dans le span
buffFastText.innerText = selectedValue;
reAddContentForUnit()
    }
});
// LOAD PRESET BY ID
let fastID = document.querySelector(".fastSubmit");
let fastIDInput = document.getElementById("loadPresetFast");

fastID.addEventListener("click", () => {
    const selectedValue = fastIDInput.value.trim();

    if (selectedValue !== "") {
        let foundPreset = settingsData.find(preset => preset.preset_id == selectedValue);

        if (foundPreset) {
            console.log("Preset trouvé :", foundPreset);

            // Remplace le preset [0] par celui trouvé
            settingsData[0] = { ...foundPreset };

            // Met à jour sessionStorage
            sessionStorage.setItem("settings_data", JSON.stringify(settingsData));

            // Rafraîchir l’affichage
            reAddContentForUnit()

        } else {
            alert("Aucun preset trouvé avec preset_id =" + selectedValue);
        }
    } else {
        alert("Champ vide !");
    }
});
});
</script>
<?php endif; ?>
</html>