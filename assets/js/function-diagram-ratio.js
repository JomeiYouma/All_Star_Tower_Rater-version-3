//###################  DIAGRAMME PARAMETRABLE  ####################

let settingImportanceAoeType = settingsData[0].importance_aoetype;
let settingMethode = settingsData[0].method; // log or linear
let settingRankRatio = settingsData[0].ranking_percentage; //Immportance du rank par rapport à l'importance de la valeur.

function ratioGeneral(stat1, statRank1, rankNbr, maxValue1, minValue1, importance, stat2, statRank2, maxValue2, minValue2) {//Fonction pour les deux échelles

function logComplete() {
        console.log('-------------Infos générales-------------');
console.log("rankNbr:", rankNbr);
console.log("importance Stat 2 -> 1:", importance,' %');
console.log("settingRankRatio:", settingRankRatio, ' %');
console.log("settingMethode:", settingMethode, ' 0=linear');
console.log('-------------Infos Stat 1 (ex : dps)-------------');
console.log("stat1:", stat1);
console.log("minValue1:", minValue1);
console.log("maxValue1:", maxValue1); //ICI DEBUG : BIEN LA MÊME VALEUR QUE DANS LE MODIFIED DATA
console.log("statRank1:", statRank1);
console.log('Stat log',Math.log(1 + stat1))
console.log('Min value log',Math.log(1 + minValue1))
console.log('Max value log',Math.log(1 + maxValue1))
console.log('Stat - MinStat log',Math.log(1 + stat1) - Math.log(1 + minValue1));
console.log('Rank1 / MaRank * ratiorank',(statRank1 / rankNbr) * (settingRankRatio / 100))
console.log('Calcul Stat - MinStat log / Max - Min log',(
                        (Math.log(1 + stat1) - Math.log(1 + minValue1)) /
                        (Math.log(1 + maxValue1) - Math.log(1 + minValue1))
                    ));
console.log('FirstCalc * 1-rankRatio%) + rank/maxRank * rankRatio%) * 1-importance',(
            (
                (
                    (
                        (Math.log(1 + stat1) - Math.log(1 + minValue1)) /
                        (Math.log(1 + maxValue1) - Math.log(1 + minValue1))
                    ) * (1 - settingRankRatio / 100)
                ) +
                (statRank1 / rankNbr) * (settingRankRatio / 100)
            ) * (1 - importance / 100)
        ));
console.log('-------------Infos Stat 2 (ex : aoe)-------------');
console.log("stat2:", stat2);
console.log("minValue2:", minValue2);
console.log("maxValue2:", maxValue2);
console.log("statRank2:", statRank2);
                    
    /* console.log('Importance',100-importance); */

console.log('Stat2 log', Math.log(1 + stat2));
console.log('Min value 2 log', Math.log(1 + minValue2));
console.log('Max value 2 log', Math.log(1 + maxValue2));
console.log('Stat2-MinStat', Math.log(1 + stat2) - Math.log(1 + minValue2));
console.log('Rank2 / MaRank * ratiorank',(statRank1 / rankNbr) * (settingRankRatio / 100))
console.log('Calcul Stat - MinStat log / Max - Min log', (
    (Math.log(1 + stat2) - Math.log(1 + minValue2)) /
    (Math.log(1 + maxValue2) - Math.log(1 + minValue2))
));
console.log('FirstCalc * 1-rankRatio%) + rank/maxRank * rankRatio%) * importance', (
    (
        (
            (Math.log(1 + stat2) - Math.log(1 + minValue2)) /
            (Math.log(1 + maxValue2) - Math.log(1 + minValue2))
        ) * (1 - (settingRankRatio / 100))
    ) +
    (statRank2 / rankNbr) * (settingRankRatio / 100)
) * (importance / 100));
    };
    logComplete();
    let result;
    if (settingMethode == "linear") {
        result = (
            (((((stat1/maxValue1) * (1-settingRankRatio/100)) + ((statRank1/rankNbr) * (settingRankRatio/100))) * (1-(importance/100))) + (((stat2/maxValue2) * (1-settingRankRatio/100)) + ((statRank2/rankNbr) * (settingRankRatio/100))) * (importance/100))*100
    )
            return result;
            if (result > 100) {
                console.warn("⚠️ Score > 100 détecté !");
            }
            console.log(
                "stat1 : ", stat1,
                "maxValue1 : ", maxValue1,
                "stat1/maxValue1 : " ,stat1 / maxValue1,
                "statRank1 : ", statRank1,
                "rankNbr : ", rankNbr,
                "statRank1/rankNbr : ", statRank1 / rankNbr,
                "stat2 : ", stat2,
                "maxValue2 : ", maxValue2,
                "stat2/maxValue2 : ", stat2 / maxValue2,
                "statRank2 : ", statRank2,
                "statRank2/rankNbr : ", statRank2 / rankNbr,
                "settingRankRatio (%) : ", settingRankRatio,
                "importance (%) :", importance,
                "Résultat final :", result
            );
        } else {
            
            result = (
            ((
                (
                    (
                        (Math.log(1 + stat1) - Math.log(1 + minValue1)) /
                        (Math.log(1 + maxValue1) - Math.log(1 + minValue1))
                    ) * (1 - settingRankRatio / 100)
                ) +
                (statRank1 / rankNbr) * (settingRankRatio / 100)
            ) * (1 - importance / 100)
        ) +
        (
            (
                (
                    (Math.log(1 + stat2) - Math.log(1 + minValue2)) /
                    (Math.log(1 + maxValue2) - Math.log(1 + minValue2))
                ) * (1 - settingRankRatio / 100)
            ) +
            (statRank2 / rankNbr) * (settingRankRatio / 100)
        ) * (importance / 100)) * 100;
        return result;
        if (result > 100) {
            console.warn("⚠️ Score > 100 détecté !");
        }
        console.log(
            "stat1 : ", stat1,
            "maxValue1 : ", maxValue1,
            "stat1/maxValue1 : " ,stat1 / maxValue1,
            "statRank1 : ", statRank1,
            "rankNbr : ", rankNbr,
            "statRank1/rankNbr : ", statRank1 / rankNbr,
            "stat2 : ", stat2,
            "maxValue2 : ", maxValue2,
            "stat2/maxValue2 : ", stat2 / maxValue2,
            "statRank2 : ", statRank2,
            "statRank2/rankNbr : ", statRank2 / rankNbr,
            "settingRankRatio (%) : ", settingRankRatio,
            "importance (%) :", importance,
            "Résultat final :", result
        );
    }; 
   
};





function applyMethod(currentUnit, valuesObj){
    console.log("################ COST ################")
    valuesObj.cost = ratioGeneral(currentUnit.cost, currentUnit.rank_cost, unitsNbr, maxCostValue, minCostValue, 0, 10, 140, 1000, 0);
    console.log("################ WT ################")
    valuesObj.wt = ratioGeneral(currentUnit.wt, currentUnit.rank_wt, unitsNbr, maxWtValue, minWtValue, 0, 10, 140, 1000, 0);
    console.log("################ DPS ################")
    valuesObj.dps = ratioGeneral(currentUnit.dps_total, currentUnit.rank_dps_total, unitsNbr, maxDpsValue, minDpsValue, 0, 10, 140, 1000, 0);
    console.log("################ AOE ################")
    valuesObj.range = ratioGeneral(currentUnit.range, currentUnit.rank_range, unitsNbr, maxRngValue, minRngValue, settingImportanceAoeType, currentUnit.aoe_points, currentUnit.rank_aoe, maxAoeValue, minAoeValue);

    console.log('Cost : ', valuesObj.cost);
    console.log('Wt : ', valuesObj.wt);
    console.log('Dps : ', valuesObj.dps);
    console.log('Rng : ', valuesObj.range);
}