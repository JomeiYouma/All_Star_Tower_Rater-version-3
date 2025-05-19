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

//Stats
    let mpElement = document.querySelector(".mp");//Oui franchement j'ai bourriné mais bon c'est rapide au moins.
    let ecElement = document.querySelector(".ec");
    let ecElement2 = document.querySelector(".ecElement2");
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
<?php include __DIR__ . "/../js/function-calculate-macro.js";?> //Calculs des stats qui apparaissent dans la page
<?php include __DIR__ . "/../js/function-add-content.js";?>
<?php include __DIR__ . "/../js/function-add-modified-data.js";?>
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
    ecElement2 : ecElement2,
});
addModifiedData();
document.querySelectorAll(".format").forEach(element => {
    element.innerHTML = formatNumberShort(element.innerHTML);
});
//----- PRÉPARATION DIAGRAMME ------
const ctx = document.getElementById('myChart');
<?php include __DIR__ . "/../js/function-diagram-ratio.js"; ?> //Paramétrage
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
let methodColor; // Déclaration de la variable à l'extérieur de la condition


//Clic diagram//
const diagramImg = document.querySelector(".character-star-diagram img");
function methodChanger(way) {//Pour réutiliser au clic et au chargement dans le sens inverse.
    let from;
    if (way == 1) {
        from = "logarithmic"
    } else {
        from ="linear"
    }
   
if (settingMethode == from) {
    settingMethode = "linear";
    diagramImg.src = "/All_Star_Tower_Rater/assets/images/diagram(2).png";
    diagramImg.alt = "Change calculation method to logarithmic";
    methodColor = '255,204,113'; 
} else {
    settingMethode = "logarithmic";
    diagramImg.src = "/All_Star_Tower_Rater/assets/images/diagram-log.png";
    diagramImg.alt = "Change calculation method to linear";
    methodColor = '113,193,255'; 
}

applyMethod(unitA, values1); // Recalcule les données en fonction de la méthode , DEBUG : VÉRIFIER QUE UNIT A RENVOIE BIEN MODIFIED DATA

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


//Settings(Quick)
//1: Recalcul
function reAddContentForUnit(){
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
    ecElement2 : ecElement2,
}); 
addModifiedData();
document.querySelectorAll(".format").forEach(element => {
    element.innerHTML = formatNumberShort(element.innerHTML);
});
unitA = modifiedData.find(unit => unit.unitId === unitId);
applyMethod(unitA, values1); 
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