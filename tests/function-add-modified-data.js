//-------------------------------------FONCTION POUR STOCKER DANS UN TAB TOUTES LES VALEURS MODIF POUR TOUTES LES UNITS
const aoeTypeMap = { //Selon le nom d'affichage, donner l'équivalence nom du champs
    "FULL": "pa_full",
    "AOE FULL": "pa_full",
    "MULTIPLE": "pa_multiple",
    "CONE (HALF)": "pa_cone_half",
    "HALF": "pa_cone_half",
    "CONE (WIDE)": "pa_cone_wide",
    "CONE (HUGE)": "pa_cone_wide",
    "CONE (SQUARE)": "pa_cone_square",
    "CONE (PYRAMID)": "pa_cone_pyramid",
    "CONE": "pa_cone",
    "CIRCLE (": "pa_circle",
    "CONE (SPIKE)": "pa_cone_spike",
    "CONE (NARROW)": "pa_cone_narrow",
    "LINE": "pa_line",
    "CIRCLE (FAT)": "pa_circle_fat",
    "CIRCLE (HUGE)": "pa_circle_huge",
    "CIRCLE (VERY LARGE)": "pa_circle_verylarge",
    "CIRCLE (LARGE)": "pa_circle_large",
    "CIRCLE": "pa_circle",
    "CIRCLE (MEDIUM)": "pa_circle_medium",
    "CIRCLE (LITTLE)": "pa_circle_little",
    "CIRCLE (SMALL)": "pa_circle_little",
    "CIRCLE (TINY)": "pa_circle_tiny",
    "SINGLE": "pa_single",
    "SINGLE (TRAP)": "pa_single_trap",
    "SUMMON": "pa_summon",
    "CONTROLLABLE": "pa_controllable",
    "NONE": 0,
    "NO": 0
}; //Étape 1 : déclarer les variables min max value
let modifiedData = [];
let unitsNbr = 0;
let minCostValue = 0;
let maxCostValue = 0;
let minAoeValue = 0;
let maxAoeValue = 0;
let minRngValue = 0;
let maxRngValue = 0;
let minDpsValue = 0;
let maxDpsValue = 0;
let minWtValue = 0;
let maxWtValue = 0;
function addModifiedData() {
    modifiedData = [];

    Object.entries(unitsData).forEach(([unitId, unit]) => {
        let mp = unit.placement;
        if (gamemode === "raid") {
            mp = unit.placement_raid || unit.placement;
        }
        //Étape 2 : Calculs
        // Calcul des DPS
        let dps_hit = calculateDpsHit(unitId, gamemode, settingsData, mp);
        let dps_dot = calculateDpsDot(unitId, gamemode, settingsData);
        let dps_ability = calculateDpsAbility(unitId, gamemode, settingsData, mp);
        let dps_total = calculateDpsTotal(dps_hit, dps_dot, dps_ability);

        // Calcul du coût
        let cost = calculateCost(unitId, gamemode, settingsData, mp);

        //Calcul des points accordés pour le type d'AOE
        const aoeType = unit[`aoe_${gamemode}`].toUpperCase();
        /* console.log(aoeType); */
        const aoeKey = aoeTypeMap[aoeType];
        const aoePoints = settingsData[0][aoeKey] ?? 0;
        /* console.log("AOE",unit[`aoe_${gamemode}`],aoeType,aoeKey,aoePoints); */

        // Calcul du ratio WT
        let wt = calculateWt(dps_total, cost);

        // Stockage des valeurs modifiées
        modifiedData.push({
            unitId: unitId,
            in_game_name: unit.in_game_name,
            real_name: unit.real_name,
            placement: mp,
            enchant: unit.enchant,
            role: unit[`role_${gamemode}`],
            hit_air: unit[`hit_air_${gamemode}`],
            farming_difficulty: unit.farming_difficulty,
            farming_difficulty_points:unit.farming_difficulty_points,
            progression: unit.progression,
            progression_points: unit.progression_points,
            aoe: unit[`aoe_${gamemode}`],
            aoe_points: aoePoints,
            range: parseFloat(unit[`rng_${gamemode}`] * (1 + settingsData[0].rng_buff / 100)),
            /* range_points: rangePoints, */
            dps_hit: dps_hit,
            dps_dot: dps_dot,
            dps_ability: dps_ability,
            dps_total: dps_total,
            cost: cost,
            wt: wt
        });
    });
//Étape 3 : Ordonner et ranker
    unitsNbr = modifiedData.length;
    console.log("Nombre d'units",unitsNbr);
// COST RANK ###########################################################
    modifiedData.sort((a, b) => parseFloat(a.cost) - parseFloat(b.cost));
    maxCostValue = modifiedData[modifiedData.length - 1].cost;
    minCostValue = modifiedData[0].cost;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_cost = index + 1;
    /* console.log("Cost",unit.cost , unit.unitId , unit.rank_cost , unit.in_game_name); */
    });
/* console.log('Max cost =',maxCostValue);
console.log('Min cost =',minCostValue); */
// AOE RANK ##########################################################
    modifiedData.sort((a, b) => parseFloat(a.aoe_points) - parseFloat(b.aoe_points));
    maxAoeValue = modifiedData[modifiedData.length - 1].aoe_points;
    minAoeValue = modifiedData[0].aoe_points;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_aoe = index + 1;
/*     console.log("AOE",unit.aoe_points , unit.unitId , unit.rank_aoe , unit.in_game_name); */
    });
console.log('Max aoe =',maxAoeValue);
console.log('Min aoe =',minAoeValue);
// RANGE RANK ##########################################################
modifiedData.sort((a, b) => parseFloat(a.range) - parseFloat(b.range));
    if ((modifiedData[modifiedData.length - 1].range)<200) { //Évite de compter les range absurdes comme 1024, 200 = toute la map.
        maxRngValue = modifiedData[modifiedData.length - 1].range;
    } else {
        maxRngValue = 160
    }
    minRangeValue = modifiedData[0].range;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_range = index + 1;
/*     console.log("Range",unit.range, unit.unitId , unit.rank_range , unit.in_game_name); */
    });
console.log('Max range =',maxRngValue);
console.log('Min range =',minRngValue);
// DPS RANK ##########################################################
modifiedData.sort((a, b) => parseFloat(a.dps_total) - parseFloat(b.dps_total));
    maxDpsValue = modifiedData[modifiedData.length - 1].dps_total;
    minDpsValue = modifiedData[0].dps_total;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_dps_total = index + 1;
/*     console.log("DPS",unit.dps_total , unit.unitId , unit.rank_dps_total , unit.in_game_name); */
    });
console.log('Max dps =',maxDpsValue);
console.log('Min dps =',minDpsValue);
// WORTHINESS RANK ##########################################################
modifiedData.sort((b, a) => parseFloat(b.wt) - parseFloat(a.wt));
    maxWtValue = modifiedData[modifiedData.length - 1].wt;
    minWtValue = modifiedData[0].wt;
    modifiedData.forEach((unit, index) => { // Ajouter le rang dans modifiedData 1er = rang 1
        unit.rank_wt = index + 1;
    /* console.log("Worthiness",unit.wt , unit.unitId , unit.rank_wt , unit.in_game_name); */
    });
console.log('Max wt =',maxWtValue);
console.log('Min wt =',minWtValue);
};