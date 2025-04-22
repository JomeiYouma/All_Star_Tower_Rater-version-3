async function importJson() {
    let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
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