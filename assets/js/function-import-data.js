//========================== FONCTION POUR IMPORTER APRÈS LE CHARGEMENT DE LA BDD LES DONNÉES, DEPUIS LE SESSION STORAGE, ET LES IMPORTER SI C'EST PAS DÉJÀ FAIT ==========================
//C'est pareil que dans function-import-data-settings.js, mais pour les deux datas.
async function importJson() {
  let unitsData = JSON.parse(sessionStorage.getItem("units_data"));
  let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
  if (!unitsData) {
    // Si "units_data" n'existe pas, on fetch
    console.log("No units data, fetching unit data...");
    try {
      const response = await fetch(
        "/All_Star_Tower_Rater/assets/php_sup/sqlToJson_units.php"
      );
      unitsData = await response.json();
      sessionStorage.setItem("units_data", JSON.stringify(unitsData));
      console.log("Units data fetched and saved:", unitsData);
    } catch (error) {
      console.error("Erreur:", error);
    }
  } else {
    console.log("Units data loaded, open to actions.", unitsData);
  }

  if (!settingsData) {
    // Si "settings_data" n'existe pas, on fetch
    console.log("No settings data, fetching settings data...");
    try {
      const response = await fetch(
        "/All_Star_Tower_Rater/assets/php_sup/sqlToJson_settings.php"
      );
      settingsData = await response.json();
      sessionStorage.setItem("settings_data", JSON.stringify(settingsData));
      console.log("Settings fetched and saved:", settingsData);
    } catch (error) {
      console.error("Erreur:", error);
    }
  } else {
    console.log("Settings data loaded, open to actions.", settingsData);
  }
}
