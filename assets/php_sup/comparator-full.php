<section class="presentationSection">
        <div class="firstPresentation blue fade-in" style="animation-delay: 0.1s">
            <h1 class="name1">The Founder</h1>
            <p class="forname1">Ymir Fritz - SNK</p>
            <p class="enchant1">Holy</p>
            <p class="role1">Nuker. Mobility Control. Summoner</p>
            <div class="illu1">
                <img src="/All_Star_Tower_Rater/assets/images/blank_character.png" alt="">
            </div>
            <?php
            $searchField = 'name2';
            $label = 'Change the unit';           // texte du label (oui oui)
            $linkPrefix = '/All_Star_Tower_Rater/assets/php_main/comparator.php?id2='.$id2.'&id1=';
            include __DIR__ . '/../php_sup/search.php';
            ?>
        </div>
        <div class="secondPresentation red fade-in" style="animation-delay: 0.2s">
            <div class="illu2">
                <img src="/All_Star_Tower_Rater/assets/images/blank_character.png" alt="">
            </div>
            <h1 class="name2">4 Eye Sorcerer (Timer)</h1>
            <p class="forname2">Nanamin (Hot Fried Chicken)</p>
            <p class="enchant2">Nature</p>
            <p class="role2">Crowd Control</p>
            <?php
            $searchField = 'name2';
            $label = 'Change the unit';           // texte du label (oui oui)
            $linkPrefix = '/All_Star_Tower_Rater/assets/php_main/comparator.php?id1='.$id1.'&id2=';
            include __DIR__ . '/../php_sup/search.php';
            ?>
        </div>
    </section>

    <section class="middleSecionComparator fade-in" style="animation-delay: 0.3s">
        <h2>Abilities</h2>
        <aside class="firstAbilities blue">
        </aside>
        <aside class="secondAbilities red">
        </aside>
        <section class="comparativeStar fade-in" style="animation-delay: 0.4s">
            <div class="tooltip">
                <img src="/All_Star_Tower_Rater/assets/images/diagram-lin-2.png" alt="Change calculation method">
                <div class="tooltiptext">
                    Change calculation method
                </div>
            </div>
            <canvas id="myChart"></canvas>
        </section>
    </section>
    
    <h2>Stats</h2>
    <section class="infoComparator fade-in" style="animation-delay: 0.5s">
        <table class="stats-table">
            <thead>
                <tr>
                    <th class="NUPES">Stat</th>
                    <th class="thName1">Blank</th>
                    <th>Comparison</th>
                    <th class="thName2">Blank</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/three-friends.png" class="stat-icon">Maximum Placement</td>
                    <td class="stat-value mp1">?</td>
                    <td class="comparison-value mpC">-</td>
                    <td class="stat-value mp2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/elements.png" class="stat-icon">Enchant Type</td>
                    <td class="stat-value ec1">?</td>
                    <td class="comparison-value ecC">-</td>
                    <td class="stat-value ec2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/eye-target.png" class="stat-icon">Target</td>
                    <td class="stat-value ar1">?</td>
                    <td class="comparison-value arC">-</td>
                    <td class="stat-value ar2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/summonning.png" class="stat-icon">Farming Difficulty</td>
                    <td class="stat-value fd1">?</td>
                    <td class="comparison-value "><span class="fdC">-</span> pts</td>
                    <td class="stat-value fd2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/upgrading.png" class="stat-icon">Upgrade Progression</td>
                    <td class="stat-value up1">?</td>
                    <td class="comparison-value "><span class="upC">-</span> pts</td>
                    <td class="stat-value up2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/aoe.png" class="stat-icon">Area of Effect Type</td>
                    <td class="stat-value ae1">?</td>
                    <td class="comparison-value "><span class="aeC">-</span> pts</td>
                    <td class="stat-value ae2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/range.png" class="stat-icon">Hitting Range</td>
                    <td class="stat-value hr1">?</td>
                    <td class="comparison-value "><span class="hrC">-</span> pts</td>
                    <td class="stat-value hr2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/fierce-man.png" class="stat-icon">Damage / seconds</td>
                    <td class="stat-value ds1">?</td>
                    <td class="comparison-value dsC">-</td>
                    <td class="stat-value ds2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/bleeding_heart.png" class="stat-icon">DPS from DoT</td>
                    <td class="stat-value dd1">?</td>
                    <td class="comparison-value ddC">-</td>
                    <td class="stat-value dd2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/raw_damage.png" class="stat-icon">DPS from hits</td>
                    <td class="stat-value dh1">?</td>
                    <td class="comparison-value dhC">-</td>
                    <td class="stat-value dh2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/magic_damage.png" class="stat-icon">DPS from Abilities</td>
                    <td class="stat-value da1">?</td>
                    <td class="comparison-value daC">-</td>
                    <td class="stat-value da2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/take-my-money.png" class="stat-icon">Cost</td>
                    <td class="stat-value co1">?</td>
                    <td class="comparison-value coC">-</td>
                    <td class="stat-value co2">?</td>
                </tr>
                <tr>
                    <td class="stat-name"><img src="/All_Star_Tower_Rater/assets/images/buy-card.png" class="stat-icon">Worthiness</td>
                    <td class="stat-value wt1">?</td>
                    <td class="comparison-value wtC">-</td>
                    <td class="stat-value wt2">?</td>
                </tr>
            </tbody>
        </table>
    </section>

<!-- 
<section class="presentationSection">
        <div class="firstPresentation blue">
            <h1 class="name1">The Founder</h1>
            <p class="forname1">Ymir Fritz - SNK</p>
            <p class="enchant1">Holy</p>
            <p class="role1">Nuker. Mobility Control. Summoner</p>
            <div class="illu1">
            <img src="image_file/blank_character.png" alt="">
            </div>
        </div>
        <div class="secondPresentation red">
            <h1 class="name2">4 Eye Sorcerer (Timer)</h1>
            <p class="forname2">Nanamin (Hot Fried Chicken)</p>
            <p class="enchant2">Nature</p>
            <p class="role2">Crowd Control</p>
            <div class="illu2">
            <img src="image_file/blank_character.png" alt="">
            </div>
        </div>
    </section>
    
    <section class="middleSecionComparator">
        <h2>Abilities</h2>
        <aside class="firstAbilities blue" >
            <div title="Abnormal Giant (Burns)
            Upon activation ; it will 4x the unit's damage in burn to all enemies on her range. Summons a Titan with 110B."> 
                <img src="image_file/attack_on_titan_309-1.webp" alt="Abnormal Giant (Burns)">
            </div>
            <div title="Armored Giant (Defense)
            Summons a Titan with 234 ;66M hp.">
                <img src="image_file/ArmoredGiant29.webp" alt="Armored Giant (Defense)">
            </div>
            <div title="Attack Giant (Rewinds)
            Summons a Titan with 95M hp.">
                <img src="image_file/AttackGiant29.webp" alt="Attack Giant (Rewinds)">
            </div>
            <div title="Cart Giant (Money)
            Summons a titan with 18k hp.">
                <img src="image_file/CartGiant29.webp" alt="Cart Giant (Money)">
            </div>
            <div title="Colossal Giant (Nuke)
            Upon activation ; it will deal 3 ;5B damage to all enemies. Summons a Titan with 134B.">
                <img src="image_file/ColossalGiant29.webp" alt="Colossal Giant (Nuke)">
            </div>
            <div title="Female Giant (Stops)
            Upon activation ; it will ultimate time stop all enemies for 40 seconds. Summons a Titan with 30 ;7B hp.">
                <img src="image_file/FemaleGiant29.webp" alt="Female Giant (Stops)">
            </div>
            <div title="Flying Giant
            Summons a Titan with 20 ;7B hp that hit only airs.">
                <img src="image_file/FlyingGiant.webp" alt="Flying Giant">
            </div>
            <div title="Jaw Giant (Bleeds)
            Upon activation ; it will apply bleed to all enemies on her range. Summons a Titan with 2 ;4M hp.">
                <img src="image_file/Jaw_Titan_29_character_image_29.webp" alt="Jaw Giant (Bleeds)">
            </div>
        </div>
        <div title="Warhammer Giant (Bleeds)
        Upon activation ; it will apply 1 ;5x the unit's damage in rupture to all enemies on her range. Summons a Titan with 126B.">
            <img src="image_file/Lara_Tybur_29_character_image_29.webp" alt="Warhammer Giant (Bleeds)">
        </div>
        </aside>
        <aside class="secondAbilities red">
            <div title="Critical C
            Every 3 attacks ; the unit does an attack which deals 3x his base damage."> 
                <img src="image_file/targeting.png" alt="Critical C">
            </div>
            <div title="Raging Nanami
            Gains an additionnal 108 000 damage for 11 waves. (1 118 000)">
                <img src="image_file/mighty-force.png" alt="Raging Nanami">
            </div>
        </aside>
        <section class="comparativeStar">
            <br>
            <div class="tooltip">
            <img src="image_file/diagram-lin-2.png" alt="Change calculation method">
            <div class="tooltiptext">
            Change calculation method
            </div>
            </div>
            <canvas id="myChart"></canvas>
        </section>
    </section>
    <h2>Stats</h2>
    <section class="infoComparator">
        <div class="firstInfo blue">
            <div class="stat-box">
                <img src="image_file/three-friends.png" alt="" class="stat-icon">
                <span class="stat-name">Maximum Placement</span>
                <span class="stat-value mp1">1</span>
            </div>
            <div class="stat-box">
                <img src="image_file/elements.png" alt="" class="stat-icon">
                <span class="stat-name">Enchant Type</span>
                <span class="stat-value ec1">Holy</span>
            </div>
            <div class="stat-box">
                <img src="image_file/eye-target.png" alt="" class="stat-icon">
                <span class="stat-name">Target</span>
                <span class="stat-value ar1">Hybrid</span>
            </div>
            <div class="stat-box">
                <img src="image_file/summonning.png" alt="" class="stat-icon">
                <span class="stat-name">Farming Difficulty</span>
                <span class="stat-value fd1">A-</span>
            </div>
            <div class="stat-box">
                <img src="image_file/upgrading.png" alt="" class="stat-icon">
                <span class="stat-name">Upgrade Progression</span>
                <span class="stat-value up1">E-</span>
            </div>
            <div class="stat-box">
                <img src="image_file/aoe.png" alt="" class="stat-icon">
                <span class="stat-name">Area of Effect Type</span>
                <span class="stat-value ae1">Circle (Large)</span>
            </div>
            <div class="stat-box">
                <img src="image_file/range.png" alt="" class="stat-icon">
                <span class="stat-name">Hitting Range</span>
                <span class="stat-value hr1">100</span>
            </div>
            <div class="stat-box">
                <img src="image_file/fierce-man.png" alt="" class="stat-icon">
                <span class="stat-name">Damage / seconds</span>
                <span class="stat-value ds1">2900000</span>
            </div>
            <div class="stat-box">
                <img src="image_file/bleeding_heart.png" alt="" class="stat-icon">
                <span class="stat-name">DPS from DoT</span>
                <span class="stat-value dd1">0</span>
            </div>
            <div class="stat-box">
                <img src="image_file/raw_damage.png" alt="" class="stat-icon">
                <span class="stat-name">DPS from hits</span>
                <span class="stat-value dh1">2900000</span>
            </div>
            <div class="stat-box">
                <img src="image_file/magic_damage.png" alt="" class="stat-icon">
                <span class="stat-name">DPS from Abilities</span>
                <span class="stat-value da1">0</span>
            </div>
            <div class="stat-box">
                <img src="image_file/take-my-money.png" alt="" class="stat-icon">
                <span class="stat-name">Cost</span>
                <span class="stat-value co1">22000000</span>
            </div>
            <div class="stat-box">
                <img src="image_file/buy-card.png" alt="" class="stat-icon">
                <span class="stat-name">Worthiness</span>
                <span class="stat-value wt1">0.13</span>
            </div>
        </div>
        <div class="secondInfo red">
            <div class="stat-box">
                <img src="image_file/three-friends.png" alt="" class="stat-icon">
                <span class="stat-name">Maximum Placement</span>
                <span class="stat-value mp2">8</span>
            </div>
            <div class="stat-box">
                <img src="image_file/elements.png" alt="" class="stat-icon">
                <span class="stat-name">Enchant Type</span>
                <span class="stat-value ec2">Nature</span>
            </div>
            <div class="stat-box">
                <img src="image_file/eye-target.png" alt="" class="stat-icon">
                <span class="stat-name">Target</span>
                <span class="stat-value ar2">Hybrid</span>
            </div>
            <div class="stat-box">
                <img src="image_file/summonning.png" alt="" class="stat-icon">
                <span class="stat-name">Farming Difficulty</span>
                <span class="stat-value fd2">A-</span>
            </div>
            <div class="stat-box">
                <img src="image_file/upgrading.png" alt="" class="stat-icon">
                <span class="stat-name">Upgrade Progression</span>
                <span class="stat-value up2">A+</span>
            </div>
            <div class="stat-box">
                <img src="image_file/aoe.png" alt="" class="stat-icon">
                <span class="stat-name">Area of Effect Type</span>
                <span class="stat-value ae2">Full</span>
            </div>
            <div class="stat-box">
                <img src="image_file/range.png" alt="" class="stat-icon">
                <span class="stat-name">Hitting Range</span>
                <span class="stat-value hr2">120</span>
            </div>
            <div class="stat-box">
                <img src="image_file/fierce-man.png" alt="" class="stat-icon">
                <span class="stat-name">Damage / seconds</span>
                <span class="stat-value ds2">732889</span>
            </div>
            <div class="stat-box">
                <img src="image_file/bleeding_heart.png" alt="" class="stat-icon">
                <span class="stat-name">DPS from DoT</span>
                <span class="stat-value dd2">0</span>
            </div>
            <div class="stat-box">
                <img src="image_file/raw_damage.png" alt="" class="stat-icon">
                <span class="stat-name">DPS from hits</span>
                <span class="stat-value dh2">732889</span>
            </div>
            <div class="stat-box">
                <img src="image_file/magic_damage.png" alt="" class="stat-icon">
                <span class="stat-name">DPS from Abilities</span>
                <span class="stat-value da2">0</span>
            </div>
            <div class="stat-box">
                <img src="image_file/take-my-money.png" alt="" class="stat-icon">
                <span class="stat-name">Cost</span>
                <span class="stat-value co2">2755000</span>
            </div>
            <div class="stat-box">
                <img src="image_file/buy-card.png" alt="" class="stat-icon">
                <span class="stat-name">Worthiness</span>
                <span class="stat-value wt2">0.7</span>
            </div>
        </div>
    </section> -->