
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
            const response = await fetch('/All_Star_Tower_Rater/assets/php_sup/sqlToJson_units.php');
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
            const response = await fetch('/All_Star_Tower_Rater/assets/php_sup/sqlToJson_settings.php');
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

        window.location.href = `/All_Star_Tower_Rater/assets/php_main/characterPageTest.php?id=${characterId}`;
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

    // Affichage du type et des données actuelles de 'units' dans la console
console.log("unitsData type:", typeof units); // Affiche le type de 'units' (devrait être un objet)
console.log("unitsData:", units); // Affiche l'objet 'units'

// On convertit l'objet 'units' en tableau, ce qui permet de le trier
const unitsArray = Object.values(units); // 'Object.values' transforme l'objet en tableau
console.log(unitsArray); // Affiche le tableau 'unitsArray' pour vérification

// Sélectionne l'élément du DOM qui contient l'option de tri
let orderBy = document.getElementById('orderBy'); // Récupère l'élément avec l'ID 'orderBy' (généralement un <select>)

// Fonction qui trie le tableau 'unitsArray' en fonction de la valeur du tri sélectionné
function sortUnits(unitsArray, orderByValue) {
    if (!unitsArray || unitsArray.length === 0) return unitsArray; // Si le tableau est vide ou inexistant, renvoie tel quel
    
    return unitsArray.sort((a, b) => {
        switch(orderByValue) { // En fonction de la valeur de tri choisie (par exemple 'name_asc')
            case 'name_asc': // Tri par nom croissant
                return a.in_game_name.localeCompare(b.in_game_name); // Compare les noms en ordre alphabétique croissant
            case 'name_desc': // Tri par nom décroissant
                return b.in_game_name.localeCompare(a.in_game_name); // Compare les noms en ordre alphabétique décroissant
            case 'cost_start_asc': // Tri par coût de départ croissant
                return (a.cost_start || 0) - (b.cost_start || 0); // Si 'cost_start' est absent, considère 0
            case 'cost_start_desc': // Tri par coût de départ décroissant
                return (b.cost_start || 0) - (a.cost_start || 0); // Idem mais dans l'ordre inverse
            case 'cost_max_asc': // Tri par coût maximum croissant
                return (a.cost_max || 0) - (b.cost_max || 0);
            case 'cost_max_desc': // Tri par coût maximum décroissant
                return (b.cost_max || 0) - (a.cost_max || 0);
            case 'difficulty_asc': // Tri par difficulté croissante
                return (a.farming_difficulty_points || 0) - (b.farming_difficulty_points || 0);
            case 'difficulty_desc': // Tri par difficulté décroissante
                return (b.farming_difficulty_points || 0) - (a.farming_difficulty_points || 0);
            case 'placement_asc': // Tri par placement croissant
                return (a.placement || 0) - (b.placement || 0);
            case 'placement_desc': // Tri par placement décroissant
                return (b.placement || 0) - (a.placement || 0);
            default: // Si aucune option n'est sélectionnée, tri par nom croissant par défaut
                return a.in_game_name.localeCompare(b.in_game_name);
        }
    });
}

// Fonction pour reconvertir un tableau en objet
function arrayToObject(arr) {
    const obj = {}; // Crée un objet vide
    arr.forEach((item, index) => { // Parcours chaque élément du tableau
        obj[index] = item; // Ajoute chaque élément dans l'objet avec la clé index (0, 1, 2, ...)
    });
    return obj; // Retourne l'objet reconstruit
}

// On applique le tri sur le tableau et ensuite on le reconvertit en objet
units = arrayToObject(sortUnits(unitsArray, orderBy.value)); // 'units' devient un objet trié en fonction de l'option sélectionnée

// Optionnel : Sauvegarde dans sessionStorage pour persister les données triées
/* sessionStorage.setItem("units_data", JSON.stringify(units));  */// Sauvegarde 'units' trié sous forme de JSON
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
        document.querySelector(".filtersMessage").innerHTML = "<span class='foundUnits'></span> units found"   
        }
        document.querySelector(".foundUnits").innerHTML = foundUnits;
    }
        
        card.innerHTML = `
        <div class="unit-card-image-container">
            <img class="card-image" loading="lazy" src="/All_Star_Tower_Rater/assets/images/${unit.unit_file}" alt="">
            </div>
            <div class="unit-card-content">
            <h2>${unit.in_game_name}</h2>
            <h3>${unit.real_name}</h3>
            <div class="unit-stats">
                <div class="stat-badge role-badge">ROLE: ${unit.role_max}</div>
                <div class="stat-badge difficulty-badge">F D: ${unit.farming_difficulty}</div>
                <div class="stat-badge cost-badge">Coût: ${unit.cost_max?.toLocaleString()} $</div> 
            </div>
            </div>
        `; 
        //Pour espacer les chiffres donc les rendre lisibles => toLocaleString()
        container.appendChild(card);
    });
    
}
