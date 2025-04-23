function addContentForUnit(unitId, elements) {
    const {
        name, desc, illu, capaContainer,
        mpElement, ecElement, rlElement, arElement,
        fdElement, upElement, aeElement, hrElement,
        dsElement, ddElement, dhElement, daElement,
        coElement, wtElement, ecElement2 /* gmFast */
    } = elements;

    if (unitId && unitsData[unitId]) {
        name.innerHTML = unitsData[unitId].in_game_name;
        desc.innerHTML = unitsData[unitId].real_name;
        illu.innerHTML = `<img src="/All_Star_Tower_Rater/assets/images/${unitsData[unitId].unit_file}" alt="">`;
        console.log(illu);

        capaContainer.innerHTML = "";

        if (unitsData[unitId].gamemodes[gamemode]) {
            let abilities = unitsData[unitId].gamemodes[gamemode].abilities;

            if (abilities && typeof abilities === "object") {
                capaContainer.innerHTML = "";
                Object.values(abilities).forEach(ability => {
                    const typeArray = ability.ability_types
                        ? Object.values(ability.ability_types).map(typeObj => typeObj.ability_type_name)
                        : [];

                    capaContainer.innerHTML += `
                        <div class="tooltip">
                            <img src="../images/${ability.ability_file}" alt='${ability.ability_name}'>
                            <div class="tooltiptext">
                                <strong class="effect-text">Effect :</strong> ${ability.ability_description}<br>
                                <strong class="type-text">Ability type :</strong> ${typeArray.join(", ") || "N/A"}<br>
                                <strong class="cd-text">Cooldown :</strong> ${ability.ability_cooldown}s
                            </div>
                        </div>`;
                });
            } else {
                capaContainer.innerHTML = "<p>No ability found</p>";
            }
        }

        let mp = gamemode === "raid"
            ? unitsData[unitId].placement_raid || unitsData[unitId].placement
            : gamemode === "start" ? 1 : unitsData[unitId].placement;

        mpElement.innerHTML = mp;
        ecElement.innerHTML = unitsData[unitId].enchant;
        if (ecElement2) {
            ecElement2.innerHTML = unitsData[unitId].enchant;
        }
        rlElement.innerHTML = unitsData[unitId][`role_${gamemode}`];
        arElement.innerHTML = unitsData[unitId][`hit_air_${gamemode}`];
        fdElement.innerHTML = unitsData[unitId].farming_difficulty;
        upElement.innerHTML = unitsData[unitId].progression;
        aeElement.innerHTML = unitsData[unitId][`aoe_${gamemode}`];
        hrElement.innerHTML = unitsData[unitId][`rng_${gamemode}`] * (1 + settingsData[0].rng_buff / 100);

        const dps_hit = calculateDpsHit(unitId, gamemode, settingsData, mp);
        const dps_dot = calculateDpsDot(unitId, gamemode, settingsData);
        const dps_ability = calculateDpsAbility(unitId, gamemode, settingsData, mp);

        dhElement.innerHTML = (calculateLevelBasedDps(dps_hit));
        ddElement.innerHTML = (calculateLevelBasedDps(dps_dot));
        daElement.innerHTML = (dps_ability);
        dsElement.innerHTML = (
            calculateDpsTotal(
                calculateLevelBasedDps(dps_hit),
                calculateLevelBasedDps(dps_dot),
                dps_ability
            )
        );

        const cost = calculateCost(unitId, gamemode, settingsData, mp);
        coElement.innerHTML = (cost);
        wtElement.innerHTML = (calculateWt(dsElement.innerHTML, coElement.innerHTML));

        /* gmFast.innerHTML = gamemode; */
    }
}