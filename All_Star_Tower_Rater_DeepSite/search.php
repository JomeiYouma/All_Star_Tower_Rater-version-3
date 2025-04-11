<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASTR SEARCH</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
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
            font-size: 32px;
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
    </style>
</head>
<body>

<a class="title" href="index.php">ALL STAR TOWER RATER v0.2</a>
<h1>Unit list</h1>
<div id="personnages" class="personnages"></div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    fetch('sqlToJson.php')
        .then(response => response.json())
        .then(afficherPersonnages)
        .catch(error => console.error('Erreur:', error));
});

function afficherPersonnages(units) {
    const container = document.getElementById('personnages');
    container.innerHTML = '';

    Object.values(units).forEach(unit => {
        const card = document.createElement('div');
        card.classList.add('card');

        card.innerHTML = `
            <img src="/All_Star_Tower_Rater/image_file/${unit.unit_file}" alt="">
            <h2>${unit.in_game_name}</h2>
            <h3>${unit.real_name}</h3>
            <div class="stats">
                <div class="stat">DPS: ${unit.dps_max}</div>
                <div class="stat">RNG: ${unit.rng_max}</div>
                <div class="stat">Coût: ${unit.cost_max}</div>
            </div>
        `;

        container.appendChild(card);
    });
}
</script>

</body>
</html>
