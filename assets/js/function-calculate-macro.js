// Déclaration Hard-coded Modifiers
let enchant_str = 200;
let enchant_wkn = -75;
let fear = 5;
let typebane = 100;
let stroke = 50;
let idol = 15;
let bloodmoon = 30;


// LES VERSIONS "2" SONT LES VERSIONS QUI MARCHENT SANS LA MODIFICATION DES ENCHANTEMENTS
let enemyEnchant = "none";
let unitEnchant = "none";
let isStrength = 0;
let isWeakness = 0;
let unitChangeEnchant = false; 
let isUnitWeak = 0;
let isUnitStrong = 0;

function collectEnchants(unitId, settings){
 isWeakness = (settings[0].enchant_wkn);
 isStrength = (settings[0].enchant_str);
 enemyEnchant = (settings[0].enemy_enchant);
 const unitData = unitsData[unitId];   
 unitEnchant = unitData.enchant;
 console.log(unitEnchant,enemyEnchant,isStrength,isWeakness, unitId);
}


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

function verifEnchant() {
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

// Fonction pour calculer les DPS
function calculateDpsHit(unitId, gamemode, settingsData, mp, unitForTest) {

collectEnchants(unitId, settingsData)
unitChangeEnchant =(hasAbilityType(unitForTest,7));
verifEnchant(unitId, settingsData);


/* console.log(isUnitStrong,isUnitWeak); */
    const dps_hit = parseFloat(unitsData[unitId][`dps_${gamemode}_unit`]) *
                    (1 + parseFloat(settingsData[0].buff) / 100) *
                    parseFloat(mp) *
                    (1 + (parseFloat(settingsData[0].idol) * idol) / 100) *
                    (1 + (isUnitWeak * enchant_wkn) / 100) *
                    (1 + (parseFloat(settingsData[0].typebane) * typebane) / 100) *
                    (1 + (isUnitStrong * enchant_str) / 100) *
                    (1 + (parseFloat(settingsData[0].fear) * fear) / 100) *
                    (1 + parseFloat(settingsData[0].leader) / 100) *
                    (1 + parseFloat(settingsData[0].leader_special) / 100);

/*  console.log("AVEC ENCHANT:",(parseFloat(unitsData[unitId][`dps_${gamemode}_unit`]) * (1 + (parseFloat(isUnitWeak) * enchant_wkn) / 100)),(parseFloat(unitsData[unitId][`dps_${gamemode}_unit`]) * (1 + (parseFloat(isUnitStrong) * enchant_wkn) / 100))," SANS RIEN : ",(parseFloat(unitsData[unitId][`dps_${gamemode}_unit`]))) */
    return dps_hit;

    /* DEBUG POUR VOIR SI LE SYSTEME DE FAIBLESSES MARCHE */
}



// Fonction pour calculer les DPS DOT
function calculateDpsDot(unitId, gamemode, settingsData) {
verifEnchant(unitId, settingsData);

    const dps_dot = parseFloat(unitsData[unitId][`dps_${gamemode}_dot`]) *
                    (1 + (isUnitStrong * enchant_str) / 100) *
                    (1 + (isUnitWeak * enchant_wkn) / 100) *
                    (1 + parseFloat(settingsData[0].leader) / 100) *
                    (1 + parseFloat(settingsData[0].leader_special) / 100) *
                    (1 + (parseFloat(settingsData[0].stroke) * stroke) / 100) *
                    (1 + parseFloat(settingsData[0].buff) / 100) *
                    (1 + (parseFloat(settingsData[0].idol) * idol) / 100) *
                    (1 + (parseFloat(settingsData[0].fear) * fear) / 100) *
                    (1 + (parseFloat(settingsData[0].bloodmoon) * bloodmoon) / 100) *
                    (1 + (parseFloat(settingsData[0].typebane) * typebane) / 100);
    return dps_dot;
}

// Fonction pour calculer le DPS ABILITY
function calculateDpsAbility(unitId, gamemode, settingsData, mp) {

    const dps_placement = parseFloat(unitsData[unitId][`dps_${gamemode}_placement`]) * parseFloat(mp) *
                          (1 + parseFloat(settingsData[0].idol) / 100) *
                          (1 + parseFloat(settingsData[0].fear) / 100);
    const dps_fix_placement = parseFloat(unitsData[unitId][`dps_${gamemode}_fix_placement`]) *
                              (1 + parseFloat(settingsData[0].idol) / 100) *
                              (1 + parseFloat(settingsData[0].fear) / 100);
    const dps_buffable = parseFloat(unitsData[unitId][`dps_${gamemode}_buffable`]) *
                         (1 + (isUnitStrong * enchant_str) / 100) *
                         (1 + (isUnitWeak * enchant_wkn) / 100) *
                         (1 + parseFloat(settingsData[0].leader) / 100) *
                         (1 + parseFloat(settingsData[0].leader_special) / 100) *
                         (1 + (parseFloat(settingsData[0].typebane) * typebane) / 100) *
                         (1 + (parseFloat(settingsData[0].idol) * idol) / 100) *
                         (1 + (parseFloat(settingsData[0].fear) * fear) / 100);
    const dps_not_buffable = parseFloat(unitsData[unitId][`dps_${gamemode}_not_buffable`]) *
                             (1 + (parseFloat(settingsData[0].idol) * idol) / 100) *
                             (1 + (parseFloat(settingsData[0].fear) * fear) / 100) *
                             (1 + (isUnitStrong * enchant_str) / 100) *
                             (1 + (isUnitWeak * enchant_wkn) / 100) ;

    return dps_placement + dps_fix_placement + dps_buffable + dps_not_buffable;
}


// Fonction pour calculer le DPS total
function calculateDpsTotal(dps_hit, dps_dot, dps_ability) {
    return dps_hit + dps_dot + dps_ability;
}

// Fonction pour calculer le coût
function calculateCost(unitId, gamemode, settingsData, mp) {
    const unit = unitsData[unitId];
    const costList = unit[`cost_${gamemode}`];
/* 
    console.log(">>> COST DEBUG", unitId, gamemode, "mp =", mp, "costList =", costList); */

    if (Array.isArray(costList)) {
        return costList[mp];
    } else {
        return costList; // au cas où ce n’est pas une array mais un simple nombre
    }
    return parseFloat(unitsData[unitId][`cost_${gamemode}`]) * parseFloat(mp) *
           (1 - parseFloat(settingsData[0].leader_cost) / 100);
}

// Fonction pour calculer le ratio WT
function calculateWt(ds, co) {
    let dsValue = parseFormattedNumber(ds); //TRAQUER LE DS DEPUIS ICI CAR IL VAUT NaN !!
/*     console.log("DS dans WT:",dsValue); */
    let coValue = parseFormattedNumber(co);
/*     console.log("CO dans WT",coValue);
    console.log(dsValue / coValue || 0); */
    return dsValue / coValue || 0;
}

// Fonction pour calculer le level modifier
function calculateLevelBasedDps(dps) {
    let level = parseFloat(settingsData[0].level);
    switch (true) {// switch (true) => si validation du case
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
