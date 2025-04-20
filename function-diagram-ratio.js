//###################  DIAGRAMME PARAMETRABLE  ####################

let settingImportanceAoeType = 50; //ça sera une setting plus tard
let settingMethode = settingsData[0].method; // 1 = log, 2 = linear
let settingRankRatio = 50; //Immportance de du rank par rapport à l'importance de la valeur (ça sera une setting plus tard)

function ratioGeneral(stat1, statRank1, rankNbr, maxValue1, minValue1, importance, stat2, statRank2, maxValue2, minValue2) {//Fonction pour les deux échelles

console.log('-------------Infos générales-------------');
console.log("rankNbr:", rankNbr);
console.log("importance Stat 2 -> 1:", importance,' %');
console.log("settingRankRatio:", settingRankRatio, ' %');
console.log("settingMethode:", settingMethode, ' 0=linear');
console.log('-------------Infos Stat 1 (ex : dps)-------------');
console.log("stat1:", stat1);
console.log("minValue1:", minValue1);
console.log("maxValue1:", maxValue1);
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

    if (settingMethode == "linear") {
            return (
                (((((stat1/maxValue1) * (1-settingRankRatio/100)) + ((statRank1/rankNbr) * (settingRankRatio/100))) * (1-(importance/100))) + (((stat2/maxValue2) * (1-settingRankRatio/100)) + ((statRank2/rankNbr) * (settingRankRatio/100))) * (importance/100))*100
        )
        } else {
            
            return (
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

    }; 
};
function applyMethod(currentUnit, valuesObj){
    valuesObj.cost = ratioGeneral(currentUnit.cost, currentUnit.rank_cost, unitsNbr, maxCostValue, minCostValue, 0, 10, 140, 1000, 0);
    valuesObj.wt = ratioGeneral(currentUnit.wt, currentUnit.rank_wt, unitsNbr, maxWtValue, minWtValue, 0, 10, 140, 1000, 0);
    valuesObj.dps = ratioGeneral(currentUnit.dps_total, currentUnit.rank_dps_total, unitsNbr, maxDpsValue, minDpsValue, 0, 10, 140, 1000, 0);
    valuesObj.range = ratioGeneral(currentUnit.range, currentUnit.rank_range, unitsNbr, maxRngValue, minRngValue, settingImportanceAoeType, currentUnit.aoe_points, currentUnit.rank_aoe, maxAoeValue, minAoeValue);

    console.log('Cost : ', valuesObj.cost);
    console.log('Wt : ', valuesObj.wt);
    console.log('Dps : ', valuesObj.dps);
    console.log('Rng : ', valuesObj.range);
}