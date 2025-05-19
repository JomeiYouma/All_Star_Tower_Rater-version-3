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
        <br><br>
        <div class="responsiveSettings">
        <section class="comparativeStar fade-in" style="animation-delay: 0.4s">
            <div class="tooltip">
                <img src="/All_Star_Tower_Rater/assets/images/diagram-lin-2.png" alt="Change calculation method">
                <div class="tooltiptext">
                    Change calculation method
                </div>
            </div>
            <canvas id="myChart"></canvas>
            <p class="chart-explain">Representation of the unit’s notes, out of 100, determined in relation to the other units of the game, under the same conditions.</p>
        </section>
        <br>
        <section class="quickChanges">
    <h3>Quick Changes</h3>
            <div class="quickChanges">
            <label for="gamemodeFast" class="gamemodeFast">Gamemode : <span>Preset</span></label>
                <select name="gamemodeFast" id="gamemodeFast" class="inputWithMargin">
                    <option value="">--Please choose an option--</option>
                    <option value="start">Start</option>
                    <option value="raid">Raid</option>
                     <option value="max">Max</option>
                 </select>
                <label for="buffFast" class="buffFast inputWithMargin">Buff strength : <span>250</span> %</label>
                <input type="range" name="buffFast" id="buffFast" min="0" max="300" step="25" value="90"> 
                <label for="loadPresetFast">Load preset by ID</label>
                <input class="inputWithMargin" type="text" name="loadPresetFast" id="loadPresetFast" placeholder="--Please select preset ID--">
            <button class="fastSubmit">Load</button>
</div>
    </section>
</div>
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

