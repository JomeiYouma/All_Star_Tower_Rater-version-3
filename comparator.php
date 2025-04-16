<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Tower Rater Comparator</title>
    <link href="style_general.css" rel="stylesheet" />
    <link href="style_comparator.css" rel="stylesheet" />
    <link rel="icon" href="image_file/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="comparatorBody">
<?php 
    $id1 = $_GET['id1']?? null;
    $id2 = $_GET['id2']?? null;
    include "header.php"?><?php if (isset($id2) && isset($id1)): ?>
    <main class="empty-comparatorMain" style="display: none;"></main>
    <main class="comparatorMain">
        <?php include "comparator-full.php"; ?>
<?php else: ?>
    </main>
    <main class="empty-comparatorMain">
        <?php include "comparator-empty.php"; ?>
    </main>
    <main class="comparatorMain" style="display: none;"></main>
<?php endif; ?>
<?php include "footer.php"?>

</body>


<script src="function-import-data.js"></script>
<script src="function-format.js"></script>
<?php if (isset($id2) && isset($id1)): ?><!-- ##################SCRIPT FULL############# -->
<script>
document.addEventListener('DOMContentLoaded', async () => {
    <?php include "function-calculate-macro.js"?>
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
let forname1 = document.querySelector(".forname1");
let enchant1 = document.querySelector(".enchant1");
let role1 = document.querySelector(".role1");
let illu1 = document.querySelector(".illu1");

let capaContainer1 = document.querySelector(".firstAbilities");

let name2 = document.querySelector(".name2");
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
<?php include "function-add-content.js"?>

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
    /* gmFast: gmFast */
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
    /* gmFast: gmFast */
});
});
</script>
<?php else: ?><!-- ##################SCRIPT EMPTY############# -->
<script>
//Focus des boites vides vers la recherche
document.getElementById("first-box").addEventListener("click", function() {
document.getElementById("name1").focus();
});
document.getElementById("second-box").addEventListener("click", function() {
document.getElementById("name2").focus();
});
</script>
<?php endif; ?>

<script>
    const ctx = document.getElementById('myChart');

    const data = {
        labels: [
            'Worthiness',
            'Cost',
            'Attack',
            'Farming Difficulty',
            'Range',
            'Progression',
            'DPS'
        ],
        datasets: [{
            label: 'The Founder',
            data: [2, 93, 65, 97, 56, 12, 40],
            fill: true,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            pointBackgroundColor: 'rgb(255, 99, 132)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(255, 99, 132)'
        }, {
            label: '4 Eye Sorcerer (Timer)',
            data: [28, 48, 54, 19, 96, 87, 70],
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            pointBackgroundColor: 'rgb(54, 162, 235)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(54, 162, 235)'
        }]
    };

    new Chart(ctx, {
        type: 'radar',
        data: data,
        options: {
        }
    });
</script>