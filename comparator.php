<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Tower Rater Comparator</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="icon" href="image_file/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="comparatorBody">
<?php include "header.php"?>
<main class="empty-comparatorMain">

</main>
<main class="comparatorMain">

</main>
</div>
<?php include "footer.php"?>

</body>


<script src="function-import-data.js"></script>
<script src="function-format.js"></script>
<script>


function startPage(id1,id2) {
    if (!id2) {
        document.querySelector(".comparatorMain").style.display = "none";
        document.querySelector(".empty-comparatorMain").innerHTML=`<?php include "comparator-empty.php" ?>`;
    } else {
        document.querySelector(".empty-comparatorMain").style.display = "none";
        document.querySelector(".comparatorMain").innerHTML=`<?php include "comparator-full.php" ?>`;

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
const unitId1 = urlParams.get("id1");
const unitId2 = urlParams.get("id2");
console.log(unitId1,unitId2);
startPage(unitId1,unitId2)//Load la bonne page
});

</script>
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