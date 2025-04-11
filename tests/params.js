document.addEventListener("DOMContentLoaded", async function () {
    try {
        // Utilisation de fetch pour récupérer les données JSON depuis parameters.php
        const response = await fetch('parameters.php');
        
        // Si la requête échoue, on déclenche une erreur
        if (!response.ok) {
            throw new Error('Erreur de récupération des données');
        }

        // Convertir la réponse en JSON
        const data = await response.json();

        // Vérifier les données récupérées
        console.log("Données récupérées :", data);

        // On suppose que data[0] contient l'objet des paramètres
        const parametres = data[0]; // Récupérer la première ligne du JSON

        // Créer dynamiquement les champs d'input dans un conteneur spécifique
        const paramsContainer = document.getElementById("params-container");

        // Itérer sur les clés et valeurs de l'objet parametres
        for (let key in parametres) {
            if (parametres.hasOwnProperty(key)) {
                const label = document.createElement("label");
                label.textContent = `${key}: ${parametres[key]}`;

                const input = document.createElement("input");
                input.type = "text";
                input.name = key;
                input.value = parametres[key]; // Remplir l'input avec la valeur actuelle

                // Ajouter l'élément à la page
                paramsContainer.appendChild(label);
                paramsContainer.appendChild(input);
                paramsContainer.appendChild(document.createElement("br"));
            }
        }
    } catch (error) {
        console.error("Erreur lors du chargement des paramètres :", error);
    }
});


/*D'accord ! 🎯 Je vais te faire un script JavaScript qui :
✅ Récupère les paramètres depuis parameters.php
✅ Ignore les 4 premières colonnes
✅ Crée un <label> et un <input type="text"> pour chaque paramètre restant
✅ Affiche "Valeur actuellement dans le tableau"
*/