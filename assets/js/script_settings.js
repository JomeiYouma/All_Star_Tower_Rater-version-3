//========================== FONCTION DE GESTION DE LA PAGE DE PARAMÈTRES ==========================
async function importJson() {
  //IMPORT DATA ONLY SETTINGS
  let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
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

//START DOM CONTENT LOADER
document.addEventListener("DOMContentLoaded", async () => {
  let ip = "";

  fetch("https://api.ipify.org?format=json")
    .then((response) => response.json())
    .then((data) => {
      ip = data.ip;
    });
  await importJson(); // Attendre que les données soient chargées
  console.log("Données récupérées depuis sessionStorage:");
  console.log(
    "Settings Data:",
    JSON.parse(sessionStorage.getItem("settings_data"))
  );
  let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
  //Fonction pour insérer dans les SPAN le contenu du preset de travail
  function addParamsData() {
    const params = document.querySelectorAll(".param");
    params.forEach((param) => {
      const span = param ? param.querySelector("label .pre-value") : null;
      const checkboxInput = param.querySelector("input[type='checkbox']");
      if (checkboxInput) {
        // Si c'est une checkbox, juste ON ou OFF
        const id = checkboxInput.id;
        if (settingsData[0][id] == 0) {
          span.innerHTML = "Off";
          console.log("AA", id, span);
        } else {
          console.log(id);
          span.innerHTML = "On";
        }
      }
      const otherInput = param.querySelector(
        "input[type='text'],input[type='number'],select"
      );
      if (otherInput) {
        const id = otherInput.id; //Sinon, on met la valeur, avec une majuscule si c'est pas un nombre.
        console.log(id, settingsData[0][id]);
        if (otherInput.type == "number") {
          span.innerHTML = settingsData[0][id];
        } else {
          console.log(
            "Type de settingsData[0][id] :",
            typeof settingsData[0][id],
            " - Valeur :",
            settingsData[0][id]
          );
          console.log(typeof settingsData[0][id], settingsData[0][id]);
          const value = String(settingsData[0][id]);
          span.innerHTML = value.charAt(0).toUpperCase() + value.slice(1); //Majuscule en début de string
        }
      }
    });
  }
  addParamsData();
  let paramsObj = {}; // Stockage global

  //Fonction pour, pour chaque paramètre, inclure dans paramsObj les modif apportées par l'utilisateur
  function watchParamsChanges() {
    const inputs = document.querySelectorAll(
      ".param input, .param select, .param textarea"
    );
    inputs.forEach((input) => {
      input.addEventListener("change", () => {
        const paramDiv = input.closest(".param");
        const span = paramDiv
          ? paramDiv.querySelector("label .pre-value")
          : null;
        const id = input.id || input.name;
        if (!id) return;

        let value;
        if (input.type === "checkbox") {
          value = Number(input.checked);
        } else {
          value = input.value;
        }

        // Ajout ou mise à jour dans paramsObj
        paramsObj[id] = {
          value: value,
        };
        if (value == "") {
          //Rajouter une barre sur le span pour visualiser le changement, et le retirer si retour à 0.
          span.style.textDecoration = "none";
        } else {
          span.style.textDecoration = "line-through black";
        }
        console.log(paramsObj);
      });
    });
  }
  watchParamsChanges();

  // 1. Sélection des éléments HTML
  let searchPreset = document.querySelector('input[name="preset_search"]');
  let resultsContainer = document.querySelector("#resultsContainer");
  const nativePresetSelect = document.querySelector("#native_preset");
  const selectionDisplay = document.querySelector("#selectedPreset");

  // 2. Écoute des changements dans le champ de recherche
  searchPreset.addEventListener("input", () => {
    resultsContainer.innerHTML = ""; // 2.1. Réinitialisation de l'affichage des résultats
    const query = searchPreset.value.trim(); // 2.2. Nettoyage de la saisie
    let count = 0; // 2.3. Compteur pour limiter à 3 résultats

    // 3. Si aucun texte n'est entré, on cache les résultats
    if (query === "") {
      resultsContainer.style.visibility = "hidden";
      return;
    }

    // 4. Parcours de tous les presets pour vérifier les correspondances
    settingsData.forEach((preset) => {
      resultsContainer.style.visibility = "visible"; // 4.1. Affichage du conteneur de résultats
      if (count >= 3) return; // 4.2. Si on a déjà 3 résultats, on arrête

      // 4.3. Comparaison du nom ou de l'ID avec la recherche
      const nameMatch = preset.preset_name
        .toLowerCase()
        .includes(query.toLowerCase());
      const idMatch =
        preset.preset_id == query || preset.preset_id == Number(query);

      // 4.4. Si correspondance trouvée et que l’ID est valide (non 0)
      if ((nameMatch || idMatch) && preset.preset_id != 0) {
        const resultPreset = document.createElement("div"); // 4.5. Création d’un élément HTML
        resultPreset.classList.add("resultPreset");
        resultPreset.innerHTML = `
        <h2>${preset.preset_name}</h2>
        <p>Gamemode : <strong>${preset.preset_gamemode}</strong><br>ID : ${preset.preset_id}</p>
      `;
        resultsContainer.appendChild(resultPreset); // 4.6. Ajout du résultat à l’affichage
        count++; // 4.7. Incrémentation du compteur

        // 5. Quand l’utilisateur clique sur un résultat
        resultPreset.addEventListener("click", () => {
          //5.0 Clear l'autre
          nativePresetSelect.value = "";
          // 5.1. Mise à jour du champ avec le nom sélectionné
          searchPreset.value = preset.preset_name;

          // 5.2. Cacher les résultats
          resultsContainer.style.visibility = "hidden";
          resultsContainer.innerHTML = "";

          // 5.3. Affichage du preset sélectionné dans une zone dédiée

          selectionDisplay.innerHTML = `
          <h2>Selected Preset :</h2>
          <p><strong>Nom :</strong> ${preset.preset_name}</p>
          <p ><strong>ID :</strong> <span class="selectedPresetID">${preset.preset_id}</span></p>
          <p><strong>Gamemode :</strong> ${preset.preset_gamemode}</p>
        `;

          // 5.4. Stockage du preset sélectionné dans une variable globale
          selectedPreset = preset;
        });
      }
    });
  });
  // 6. Comportement Native Preset
  nativePresetSelect.addEventListener("change", () => {
    const value = nativePresetSelect.value;

    if (value === "") {
      return; // Rien de sélectionné
    }

    if (value === "Neutral preset") {
      selectionDisplay.innerHTML = `
                <h2>Selected Preset :</h2>
                <p><strong>Nom :</strong> Neutral Preset</p>
                <p><strong>ID :</strong> <span class="selectedPresetID">2</span></p>
                <p><strong>Gamemode :</strong> Max</p>
                `;
    } else if (value === "Start preset") {
      selectionDisplay.innerHTML = `
                <h2>Selected Preset :</h2>
                <p><strong>Nom :</strong> Start Preset</p>
                <p><strong>ID :</strong> <span class="selectedPresetID">3</span></p>
                <p><strong>Gamemode :</strong> Start</p>
                `;
    } else if (value === "Raid preset") {
      selectionDisplay.innerHTML = `
                <h2>Selected Preset :</h2>
                <p><strong>Nom :</strong> Raid Preset</p>
                <p><strong>ID :</strong> <span class="selectedPresetID">4</span></p>
                <p><strong>Gamemode :</strong> Raid</p>
                `;
    }

    // Réinitialiser la recherche après sélection
    searchPreset.value = "";
  });
  //Actualiser l'affichage des input RANGE
  function updateRangeDisplay(input) {
    const inputId = input.id;
    const valueRangeSpan = document.getElementById(inputId + "RangeDisplay");
    if (valueRangeSpan) valueRangeSpan.textContent = input.value;
  }
  document.querySelectorAll('input[type="range"]').forEach((input) => {
    input.addEventListener("input", () => updateRangeDisplay(input));
    updateRangeDisplay(input); // Initialise la valeur affichée
  });

  function loadPreset() {
    const loadBtn = document.querySelector(".load");

    loadBtn.addEventListener("click", () => {
      const sPI = document.querySelector(".selectedPresetID")?.innerText;

      if (sPI && !isNaN(sPI)) {
        const selectedID = parseInt(sPI);
        let fullList = JSON.parse(sessionStorage.getItem("settings_data"));
        let foundPreset = fullList.find((p) => p.preset_id === selectedID); //.find Pratique : Trouve l'élément de droite dans celui de gauche.

        if (foundPreset) {
          fullList[0] = foundPreset; // Ne remplace que la 1ère ligne
          sessionStorage.setItem("settings_data", JSON.stringify(fullList));
          settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
          addParamsData(); // Recharge les valeurs affichées
          //reset de l'affichage de la sélection
          const selectionDisplay = document.querySelector("#selectedPreset");
          visualReturn(
            selectionDisplay,
            "Preset successfully loaded :)",
            "RGB(46, 204, 113)",
            "white"
          );
          searchPreset.value = "";

          console.log("Preset successfully loaded");
        } else {
          alert("No preset found with this ID.");
        }
      } else {
        alert("No selected preset.");
      }
    });
  }
  let newPresetObj = {};
  function addToBDD() {
    const presetNameInput = document.getElementById("preset_name");

    if (presetNameInput.value !== "") {
      if (Object.keys(paramsObj).length !== 0) {
        newPresetObj = {}; // reset à chaque appel

        Object.keys(settingsData[0]).forEach((key) => {
          // On utilise la valeur dans paramsObj si elle existe, sinon celle de settingsData
          newPresetObj[key] =
            paramsObj[key]?.value !== undefined
              ? paramsObj[key].value
              : settingsData[0][key];
        });
        newPresetObj["preset_name"] = presetNameInput.value;
        newPresetObj["permission"] = "user";
        newPresetObj["preset_ip"] = ip;
        console.log("✅ Nouvel objet enregistré :", newPresetObj);
        // Faire le lien et les test via la bdd
        fetch("/All_Star_Tower_Rater/assets/php_sup/add_preset.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(newPresetObj),
        })
          .then(async (res) => {
            const text = await res.text(); // ⚠️ pas .json()
            console.log("RAW response", text); // <--- VOIR le vrai contenu
            try {
              const json = JSON.parse(text);
              if (json.success) {
                visualReturn(
                  presetNameInput,
                  "Preset added successfully!",
                  "rgb(150, 250, 150)",
                  "black"
                );
                alert("Added preset. New preset's ID : " + json.preset_id);
              } else {
                alert("Erreur : " + json.message);
              }
            } catch (e) {
              console.error("JSON Parsing error :", e);
            }
          })
          .catch((error) => console.error("Network error", error));
      } else {
        alert("No settings modification.");
      }
    } else {
      visualReturn(
        presetNameInput,
        "Enter valid name.",
        "RGB(250, 150, 150)",
        "black"
      );
      alert("Preset Name is not filled.");
    }
  }
  let buttonApply = document.getElementById("apply");
  let consentCheckContainer = document.querySelector(".consent-check");
  let buttonSave = document.getElementById("save");
  let buttonApplynt = document.getElementById("applynt");
  let buttonApply2 = document.getElementById("apply2");
  function applyPreset() {
    if (Object.keys(paramsObj).length !== 0) {
      newPresetObj = {}; // reset à chaque appel

      Object.keys(settingsData[0]).forEach((key) => {
        // On utilise la valeur dans paramsObj si elle existe, sinon celle de settingsData
        newPresetObj[key] =
          paramsObj[key]?.value !== undefined
            ? paramsObj[key].value
            : settingsData[0][key];
      });
      console.log("✅ Nouvel objet enregistré :", newPresetObj);
      // Faire le lien et les test via la bdd
      fetch("/All_Star_Tower_Rater/assets/php_sup/apply_preset.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(newPresetObj),
      })
        .then(async (res) => {
          const text = await res.text();
          console.log("RAW response", text); // <--- VOIR le vrai contenu
          try {
            const json = JSON.parse(text);
            if (json.success) {
              alert(
                "Applied preset.You must remember the preset ID : " +
                  json.preset_id
              );
            } else {
              consentCheckContainer.style.visibility = "visible";
              consentCheckContainer.style.display = "flex"; //Affiche la div du choix
              buttonApply.style.visibility = "hidden";
              buttonApply.style.display = "none";
              alert("Warning : " + json.message);
            }
          } catch (e) {
            console.error("JSON Parsing error :", e);
          }
        })
        .catch((error) => console.error("Network error", error));
    } else {
      alert("No settings modification.");
    }
  }
  loadPreset();
  buttonSave.addEventListener("click", () => {
    addToBDD();
  });
  buttonApply.addEventListener("click", () => {
    applyPreset();
  });
  buttonApply2.addEventListener("click", () => {
    consentCheckContainer.style.visibility = "hidden";
    consentCheckContainer.style.display = "none";
    buttonApply.style.visibility = "visible";
    buttonApply.style.display = "block";
    visualReturn(
      buttonApply,
      "Applied Preset",
      "rgb(150, 250, 177)",
      "black",
      "A P P L Y"
    );
    let fullList = JSON.parse(sessionStorage.getItem("settings_data"));
    fullList[0] = newPresetObj; // Modif settings en local (oui j'ai compris qu'il y avait une différence trop tard, j'aurais pu faire quelque chose de beaucoup plus condensé)
    sessionStorage.setItem("settings_data", JSON.stringify(fullList)); //Et du coup modif en storage.
    addParamsData();
    console.log(fullList);
  });
  buttonApplynt.addEventListener("click", () => {
    consentCheckContainer.style.visibility = "hidden";
    consentCheckContainer.style.display = "none";
    buttonApply.style.visibility = "visible";
    buttonApply.style.display = "block";
    visualReturn(
      buttonApply,
      "Apply Canceled",
      "rgb(250, 152, 150)",
      "black",
      "S A V E"
    );
  });
});

//C'est un peu le bazar, mais ça marche (sauf mes checkbox dont je dois changer l'apparence par défaut si elles sont checkées ou pas).
