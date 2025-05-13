function hasAbilityType(unit,ability_id) {
    const abilities = unit?.gamemodes?.start?.abilities; 
    if (!abilities) return false;

    for (const abilityId in abilities) {
        const ability = abilities[abilityId];
        const types = ability?.ability_types;
        if (!types) continue;

        for (const typeId in types) {
            const type = types[typeId];
            if (type?.id_ability_type === Number(ability_id)) {
                return true;
            }
        }
    }

    return false;
}
//Note : utiliser le ?. permet que si n’importe laquelle des propriétés précédentes est undefined, alors abilities devient simplement undefined sans erreur.        

function verifEnchant(unitId, settingsData) {
    console.log("Log CALCULATE enchant : Ennemy :", enemyEnchant, " Unit :", unitEnchant, "STR ? ", isStrength, "WKN ? ", isWeakness);
    
    switch (true) { // Priorité : Str > Wkn > Ennemy enchant > Neutral
        case (isStrength == 1):
            isUnitWeak = 0;
            isUnitStrong = 1;
            console.log("STRONG");
            break;

        case (isWeakness == 1):
            if (unitChangeEnchant == 1) {
                isUnitStrong = 1;
                isUnitWeak = 0;
                console.log("STRONG");
            } else {
            isUnitStrong = 0;
            isUnitWeak = 1;
            console.log("WEAK"); 
            }

            break;
        case (enemyEnchant.toUpperCase() !== "NONE") :
            switch (true) {
                case (unitChangeEnchant == 1):
                    isUnitStrong = 1;
                    isUnitWeak = 0;
                    console.log("STRONG");
                    break;
                case (enemyEnchant.toUpperCase() == "FIRE"):
                    if (unitEnchant.toUpperCase() == "NATURE") {
                        isUnitStrong = 0;
                        isUnitWeak = 1;
                        console.log("WEAK to fire");
                    } else if (unitEnchant.toUpperCase() == "WATER") {
                        isUnitStrong = 1;
                        isUnitWeak = 0;
                        console.log("STRONG to fire");
                    } else {
                        console.log("Neutral to fire")
                    }
                    break;

                case (enemyEnchant.toUpperCase() == "NATURE"):
                    if (unitEnchant.toUpperCase() == "ELECTRIC") {
                        isUnitStrong = 0;
                        isUnitWeak = 1;
                        console.log("WEAK to nature");
                    } else if (unitEnchant.toUpperCase() == "FIRE") {
                        isUnitStrong = 1;
                        isUnitWeak = 0;
                        console.log("STRONG to nature");
                    } else {
                        console.log("Neutral to nature");
                    }
                    break;

                case (enemyEnchant.toUpperCase() == "WATER"):
                if (unitEnchant.toUpperCase() == "FIRE") {
                    isUnitStrong = 0;
                    isUnitWeak = 1;
                    console.log("WEAK to water");
                } else if (unitEnchant.toUpperCase() == "ELECTRIC") {
                    isUnitStrong = 1;
                    isUnitWeak = 0;
                    console.log("STRONG to water");
                } else {
                    console.log("Neutral to water")
                }
                break;

                case (enemyEnchant.toUpperCase() == "ELECTRIC"):
                    if (unitEnchant.toUpperCase() == "WATER") {
                        isUnitStrong = 0;
                        isUnitWeak = 1;
                        console.log("WEAK to electric");
                    } else if (unitEnchant.toUpperCase() == "NATURE") {
                        isUnitStrong = 1;
                        isUnitWeak = 0;
                        console.log("STRONG to electric");
                    } else {
                        console.log("Neutral to electric");
                    }
                    break;
                
                case (enemyEnchant.toUpperCase() == "HOLY"):
                    if (unitEnchant.toUpperCase() == "DARK") {
                        isUnitStrong = 1;
                        isUnitWeak = 0;
                        console.log("STRONG to holy");
                    } else {
                        console.log("Neutral to holy")
                    }
                    break;

                case (enemyEnchant.toUpperCase() == "DARK"):
                    if (unitEnchant.toUpperCase() == "HOLY") {
                        isUnitStrong = 1;
                        isUnitWeak = 0;
                        console.log("STRONG to dark");
                    } else {
                        console.log("Neutral to dark")
                    }
                    break;

                default:
                    console.log("No enchant calculation for these settings");
                    console.log(enemyEnchant);
            break;
            }
        break;

        

        default:
            console.log("No enchant calculation for these settings");
            console.log(enemyEnchant);
            break;
    }
};