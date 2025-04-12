// Fonction pour calculer les DPS
function calculateDpsHit(unitId, gamemode, settingsData, mp) {
    const dps_hit = unitsData[unitId][`dps_${gamemode}_unit`] *
                    (1 + settingsData[0].buff / 100) *
                    mp *
                    (1 + settingsData[0].idol / 100) *
                    (1 + settingsData[0].fear / 100) *
                    (1 + settingsData[0].typebane / 100) *
                    (1 + settingsData[0].enchant_str / 100) *
                    (1 + settingsData[0].enchant_wkn / 100) *
                    (1 + settingsData[0].leader / 100) *
                    (1 + settingsData[0].leader_special / 100);
    return dps_hit;
}

// Fonction pour calculer les DPS DOT
function calculateDpsDot(unitId, gamemode, settingsData) {
    const dps_dot = unitsData[unitId][`dps_${gamemode}_dot`] *
                    (1 + settingsData[0].enchant_str / 100) *
                    (1 + settingsData[0].enchant_wkn / 100) *
                    (1 + settingsData[0].leader / 100) *
                    (1 + settingsData[0].leader_special / 100) *
                    (1 + settingsData[0].stroke / 100) *
                    (1 + settingsData[0].buff / 100) *
                    (1 + settingsData[0].idol / 100) *
                    (1 + settingsData[0].fear / 100) *
                    (1 + settingsData[0].bloodmoon / 100) *
                    (1 + settingsData[0].typebane / 100);
    return dps_dot;
}

// Fonction pour calculer le DPS ABILITY
function calculateDpsAbility(unitId, gamemode, settingsData, mp) {
    const dps_placement = unitsData[unitId][`dps_${gamemode}_placement`] * mp * (1 + settingsData[0].idol / 100) * (1 + settingsData[0].fear / 100);
    const dps_fix_placement = unitsData[unitId][`dps_${gamemode}_fix_placement`] * (1 + settingsData[0].idol / 100) * (1 + settingsData[0].fear / 100);
    const dps_buffable = unitsData[unitId][`dps_${gamemode}_buffable`] *
                         (1 + settingsData[0].enchant_str / 100) *
                         (1 + settingsData[0].enchant_wkn / 100) *
                         (1 + settingsData[0].leader / 100) *
                         (1 + settingsData[0].leader_special / 100) *
                         (1 + settingsData[0].typebane / 100) *
                         (1 + settingsData[0].idol / 100) *
                         (1 + settingsData[0].fear / 100);
    const dps_not_buffable = unitsData[unitId][`dps_${gamemode}_not_buffable`] *
                             (1 + settingsData[0].idol / 100) *
                             (1 + settingsData[0].fear / 100) *
                             (1 + settingsData[0].enchant_str / 100) *
                             (1 + settingsData[0].enchant_wkn / 100);

    return dps_placement + dps_fix_placement + dps_buffable + dps_not_buffable;
}

// Fonction pour calculer le DPS total
function calculateDpsTotal(dps_hit, dps_dot, dps_ability) {
    return dps_hit + dps_dot + dps_ability;
}
// Fonction pour calculer le coût
function calculateCost(unitId, gamemode, settingsData, mp) {
    return unitsData[unitId][`cost_${gamemode}`]*mp*(1 - settingsData[0].leader_cost / 100);
}

// Fonction pour calculer le ratio WT
function calculateWt(ds, co) {
    let dsValue = parseFormattedNumber(ds);
    let coValue = parseFormattedNumber(co);
    return dsValue / coValue;
}