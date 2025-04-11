<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test/Exemple</title>
</head>
<body>

<script>
async function importJson() {
    if (sessionStorage.getItem("units_data")) {//Cherche si il existe units_data dans le storage
        console.log("Units data loaded, open to actions.");
        console.log(JSON.parse(sessionStorage.getItem("units_data")));
    } else {
        console.log("No units data, fetching unit data...");
        await fetch('sqlToJson_units.php')
            .then(response => response.json()) // Convertir la réponse en JSON
            .then(units_data => {
                sessionStorage.setItem("units_data", JSON.stringify(units_data));
                console.log("Data fetched and saved:", units_data);
            })
            .catch(error => console.error('Erreur:', error));
    }
    if (sessionStorage.getItem("settings_data")) {//Cherche si il existe settings_data dans le storage
        console.log("Settings data loaded, open to actions.");
        console.log(JSON.parse(sessionStorage.getItem("settings_data")));
    } else {
        console.log("No settings data, fetching settings data...");
        await fetch('sqlToJson_settings.php')
            .then(response => response.json()) // Convertir la réponse en JSON
            .then(settings_data => {
                sessionStorage.setItem("settings_data", JSON.stringify(settings_data));
                console.log("Settings fetched and saved:", settings_data);
            })
            .catch(error => console.error('Erreur:', error));
    }
    let unitsData = Object.values(JSON.parse(sessionStorage.getItem("units_data")));
    let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));

    console.log("Units Data:", unitsData);
    console.log("Settings Data:", settingsData);
}

document.addEventListener('DOMContentLoaded', () => {
    importJson();
});
    </script>
</body>
</html>