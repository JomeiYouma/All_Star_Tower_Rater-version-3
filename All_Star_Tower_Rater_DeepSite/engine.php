<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Search | All Star Tower Rater</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .stat-badge {
            transition: all 0.2s ease;
        }
        .stat-badge:hover {
            transform: scale(1.05);
        }
        .filter-section {
            transition: all 0.3s ease;
        }
        .smooth-scroll {
            scroll-behavior: smooth;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        .order-dropdown {
            min-width: 200px;
        }
    </style>
</head>
<body class="bg-gray-100 smooth-scroll">
    <!-- Header -->
    <?php include 'header.php'; ?>
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Search Filters Section -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8">
            <div class="flex items-center mb-6">
                <i class="fas fa-sliders-h text-2xl text-indigo-700 mr-3"></i>
                <h2 class="text-2xl font-bold text-gray-800">Advanced Search Filters</h2>
            </div>
            
            <p class="text-gray-600 mb-6">Use the filters below to find the perfect units for your strategy. You can filter by name, enchant type, roles, abilities, costs and more.</p>
            
            <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Name Filter -->
                <div class="filter-section">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-tag mr-2 text-indigo-600"></i>Name:</label>
                    <div class="relative">
                        <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Search by name...">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                
                <!-- Enchant Filter -->
                <div class="filter-section">
                    <label for="enchantFilter" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-fire mr-2 text-indigo-600"></i>Enchant:</label>
                    <select name="enchant" id="enchantFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">All Enchant Types</option>
                        <option value="fire" class="text-red-600">Fire</option>
                        <option value="water" class="text-blue-600">Water</option>
                        <option value="nature" class="text-green-600">Nature</option>
                        <option value="electric" class="text-yellow-500">Lightning</option>
                        <option value="dark" class="text-purple-900">Dark</option>
                        <option value="holy" class="text-yellow-300">Holy</option>
                        <option value="none">None</option>
                    </select>
                </div>
                
                <!-- Air Damage Filter -->
                <div class="filter-section">
                    <label for="isHittingAir" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-plane mr-2 text-indigo-600"></i>Air Damage:</label>
                    <select name="air" id="isHittingAir" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">All Air Damage Types</option>
                        <option value="ground">Ground (no)</option>
                        <option value="hill">Hill (yes)</option>
                        <option value="hybrid">Hybrid (yes)</option>
                        <option value="hill_hybrid">Both Hill & Hybrid</option>
                        <option value="only_air">Only Air (yes, but no ground damage)</option>
                        <option value="hill_hybrid_only_air">Both Hill, Hybrid & Only Air</option>
                    </select>
                </div>
                
                <!-- Role Filter -->
                <div class="filter-section">
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-user-tag mr-2 text-indigo-600"></i>Role:</label>
                    <select name="role" id="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">All Roles</option>
                        <option value="Executionner">Executionner</option>
                        <option value="Nuker">Nuker</option>
                        <option value="Camper">Camper</option>
                        <option value="Crowd Control">Crowd Control</option>
                        <option value="Health Reducer">Mob Health Reducer</option>
                        <option value="Starter">Starter</option>
                        <option value="Buffer">Buffer</option>
                        <option value="SpB">Special Buffer</option>
                        <option value="Mobility Control">Mobility Control</option>
                        <option value="Slow">Slow</option>
                        <option value="Invest">Investment</option>
                        <option value="Money">Money Unit</option>
                        <option value="Healer">Base Healer</option>
                        <option value="Revealer">Revealer</option>
                        <option value="Summonner">Summonner</option>
                        <option value="Deployer">Units Deployer</option>
                        <option value="Solo">Solo</option>
                        <option value="Cooldown Reset">Cooldown Reset</option>
                    </select>
                </div>
                
                <!-- Number of Roles Filter -->
                <div class="filter-section">
                    <label for="roleNbr" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-list-ol mr-2 text-indigo-600"></i>Number of Roles:</label>
                    <select name="roleNbr" id="roleNbr" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">Any Number</option>
                        <option value="one">1</option>
                        <option value="two">2</option>
                        <option value="three">3</option>
                        <option value="four">4</option>
                        <option value="oneNoExecutionner">1 (without Executionner)</option>
                    </select>
                </div>
                
                <!-- Ability Type Filter -->
                <div class="filter-section">
                    <label for="abilityType" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-bolt mr-2 text-indigo-600"></i>Type of Abilities:</label>
                    <select name="abilityType" id="abilityType" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">All Ability Types</option>
                        <option value="Attack Change">Attack Change</option>
                        <option value="Base Protection">Base Protection</option>
                        <option value="Buff">Buff</option>
                        <option value="Critical">Critical</option>
                        <option value="Damage by %">Damage by %</option>
                        <option value="Damage Over Time">Damage Over Time</option>
                        <option value="Enchant Change">Enchant Change</option>
                        <option value="Golden Stun">Golden Stun</option>
                        <option value="Stun">Stun</option>
                        <option value="Heal">Heal</option>
                        <option value="Income">Income</option>
                        <option value="Instant Damage">Instant Damage</option>
                        <option value="Nuke">Nuke</option>
                        <option value="Nuke by %">Nuke by %</option>
                        <option value="Raging">Raging</option>
                        <option value="Reveal">Reveal</option>
                        <option value="Rewind">Rewind</option>
                        <option value="Self Buff">Self Buff</option>
                        <option value="Summon">Summon</option>
                        <option value="Teleport">Teleport</option>
                        <option value="Trap">Trap</option>
                        <option value="Slow">Slow</option>
                        <option value="Special">Special</option>
                        <option value="Standby">Standby</option>
                        <option value="None">None</option>
                    </select>
                </div>
                
                <!-- Placement Cost Filter -->
                <div class="filter-section">
                    <label for="startCost" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-coins mr-2 text-indigo-600"></i>Placement Cost:</label>
                    <select name="startCost" id="startCost" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">Any Cost</option>
                        <option value="500 or less">500 or less</option>
                        <option value="between500and550">500 to 550</option>
                        <option value="between550and600">550 to 600</option>
                        <option value="minus1000">Less than 1000</option>
                        <option value="plus1000">More than 1000</option>
                        <option value="custom">Custom* (in development)</option>
                    </select>
                </div>
                
                <!-- Maximum Cost Filter -->
                <div class="filter-section">
                    <label for="maxCost" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-money-bill-wave mr-2 text-indigo-600"></i>Maximum Cost:</label>
                    <select name="maxCost" id="maxCost" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">Any Cost</option>
                        <option value="minus50k">Less than 50,000</option>
                        <option value="minus100k">Less than 100,000</option>
                        <option value="minus1mil">Less than 1,000,000</option>
                        <option value="minus5mil">Less than 5,000,000</option>
                        <option value="minus10mil">Less than 10,000,000</option>
                        <option value="plus10mil">More than 10,000,000</option>
                        <option value="custom">Custom* (in development)</option>
                    </select>
                </div>
                
                <!-- Maximum Placement Filter -->
                <div class="filter-section">
                    <label for="max_placement" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-layer-group mr-2 text-indigo-600"></i>Maximum Placement:</label>
                    <select name="max_placement" id="max_placement" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">Any Number</option>
                        <option value="1">1</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                    </select>
                </div>
                
                <!-- Collection Difficulty Filter -->
                <div class="filter-section">
                    <label for="collectionDifficulty" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-star mr-2 text-indigo-600"></i>Collection Difficulty:</label>
                    <select name="collectionDifficulty" id="collectionDifficulty" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none">
                        <option value="">Any Difficulty</option>
                        <option value="f">F and less</option>
                        <option value="e">E and less</option>
                        <option value="d">D and less</option>
                        <option value="c">C and less</option>
                        <option value="b">B and less</option>
                        <option value="a">A and less</option>
                        <option value="s">S and +</option>
                    </select>
                </div>
                
                <!-- Order By Filter -->
                <div class="filter-section">
                    <label for="orderBy" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-sort-amount-down mr-2 text-indigo-600"></i>Order By:</label>
                    <select name="orderBy" id="orderBy" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none order-dropdown">
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                        <option value="cost_start_asc">Placement Cost (Low to High)</option>
                        <option value="cost_start_desc">Placement Cost (High to Low)</option>
                        <option value="cost_max_asc">Max Cost (Low to High)</option>
                        <option value="cost_max_desc">Max Cost (High to Low)</option>
                        <option value="difficulty_asc">Collection Difficulty (Easy to Hard)</option>
                        <option value="difficulty_desc">Collection Difficulty (Hard to Easy)</option>
                        <option value="placement_asc">Max Placement (Low to High)</option>
                        <option value="placement_desc">Max Placement (High to Low)</option>
                    </select>
                </div>
                
                <!-- Reset & Search Buttons -->
                <div class="filter-section col-span-full flex justify-end space-x-4 mt-4">
                    <button type="reset" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition flex items-center">
                        <i class="fas fa-undo mr-2"></i> Reset Filters
                    </button>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition flex items-center">
                        <i class="fas fa-search mr-2"></i> Search Units
                    </button>
                </div>
                
                <p class="text-xs text-gray-500 col-span-full"><i class="fas fa-info-circle mr-1"></i> *Custom options are currently in development and may not work as expected.</p>
            </form>
        </section>

        <!-- Search Results Section -->
        <section class="bg-white rounded-xl shadow-md p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <i class="fas fa-list-ul text-2xl text-indigo-700 mr-3"></i>
                    <h2 class="text-2xl font-bold text-gray-800">Search Results</h2>
                </div>
                <div id="resultsCount" class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm font-medium">
                    <i class="fas fa-spinner fa-spin mr-1"></i> Waiting for filters...
                </div>
            </div>
            
            <div id="personnages" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                <!-- Results will be populated here by JavaScript -->
            </div>
            
            <div id="noResults" class="text-center py-12 hidden">
                <i class="fas fa-search text-4xl text-gray-400 mb-4"></i>
                <h3 class="text-xl font-medium text-gray-600">No units found matching your criteria</h3>
                <p class="text-gray-500 mt-2">Try adjusting your filters to find what you're looking for.</p>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script>
        // Enhanced version of your JavaScript with better UI interactions
        document.addEventListener('DOMContentLoaded', async () => {
            // Initialize elements
            const filters = {
                enchant: document.getElementById('enchantFilter'),
                name: document.getElementById('name'),
                air: document.getElementById('isHittingAir'),
                role: document.getElementById('role'),
                roleNbr: document.getElementById('roleNbr'),
                abilityType: document.getElementById('abilityType'),
                startCost: document.getElementById('startCost'),
                maxCost: document.getElementById('maxCost'),
                max_placement: document.getElementById('max_placement'),
                collectionDifficulty: document.getElementById('collectionDifficulty'),
                orderBy: document.getElementById('orderBy')
            };
            
            const resultsContainer = document.getElementById('personnages');
            const noResultsMessage = document.getElementById('noResults');
            const resultsCount = document.getElementById('resultsCount');
            
            // Load data
            let unitsData = JSON.parse(sessionStorage.getItem("units_data"));
            let settingsData = JSON.parse(sessionStorage.getItem("settings_data"));
            
            if (!unitsData) {
                try {
                    const response = await fetch('sqlToJson_units.php');
                    unitsData = await response.json();
                    sessionStorage.setItem("units_data", JSON.stringify(unitsData));
                    console.log("Units data fetched and saved:", unitsData);
                } catch (error) {
                    console.error('Error fetching units:', error);
                    showError("Failed to load units data. Please try again later.");
                    return;
                }
            }
            
            if (!settingsData) {
                try {
                    const response = await fetch('sqlToJson_settings.php');
                    settingsData = await response.json();
                    sessionStorage.setItem("settings_data", JSON.stringify(settingsData));
                    console.log("Settings fetched and saved:", settingsData);
                } catch (error) {
                    console.error('Error fetching settings:', error);
                    // Continue without settings as they might not be critical
                }
            }
            
            // Display initial units
            displayUnits(unitsData);
            
            // Add event listeners to all filters
            Object.values(filters).forEach(filter => {
                filter.addEventListener('change', () => {
                    displayUnits(unitsData);
                });
            });
            
            // Add input event for name filter for real-time search
            filters.name.addEventListener('input', () => {
                displayUnits(unitsData);
            });
            
            // Card click handler
            resultsContainer.addEventListener('click', (event) => {
                const unitCard = event.target.closest(".card");
                if (unitCard) {
                    const characterId = unitCard.dataset.id;
                    console.log("Selected ID:", characterId);
                    
                    // Add visual feedback
                    unitCard.classList.add('ring-2', 'ring-indigo-500');
                    setTimeout(() => {
                        window.location.href = `characterPageTest.php?id=${characterId}`;
                    }, 300);
                }
            });
            
            // Helper function to count separators
            function countSeparators(testedString, separator) {
                return testedString ? testedString.split(separator).length - 1 : 0;
            };
            
            // Function to sort units based on selected order
            function sortUnits(units, orderBy) {
                if (!units || units.length === 0) return units;
                
                return [...units].sort((a, b) => {
                    switch(orderBy) {
                        case 'name_asc':
                            return a.in_game_name.localeCompare(b.in_game_name);
                        case 'name_desc':
                            return b.in_game_name.localeCompare(a.in_game_name);
                        case 'cost_start_asc':
                            return (a.cost_start || 0) - (b.cost_start || 0);
                        case 'cost_start_desc':
                            return (b.cost_start || 0) - (a.cost_start || 0);
                        case 'cost_max_asc':
                            return (a.cost_max || 0) - (b.cost_max || 0);
                        case 'cost_max_desc':
                            return (b.cost_max || 0) - (a.cost_max || 0);
                        case 'difficulty_asc':
                            return (a.farming_difficulty_points || 0) - (b.farming_difficulty_points || 0);
                        case 'difficulty_desc':
                            return (b.farming_difficulty_points || 0) - (a.farming_difficulty_points || 0);
                        case 'placement_asc':
                            return (a.placement || 0) - (b.placement || 0);
                        case 'placement_desc':
                            return (b.placement || 0) - (a.placement || 0);
                        default:
                            return a.in_game_name.localeCompare(b.in_game_name);
                    }
                });
            }
            
            // Main function to display filtered units
            function displayUnits(units) {
                if (!units || Object.keys(units).length === 0) {
                    showNoResults();
                    return;
                }
                
                let foundUnits = 0;
                resultsContainer.innerHTML = '';
                
                // Get gamemode from settings
                let gamemode = settingsData ? settingsData[0]?.preset_gamemode : "";
                
                // Get order by value
                const orderBy = filters.orderBy.value;
                
                // Filter units
                const filteredUnits = Object.values(units).filter(unit => {
                    // Check filters
                    if (filters.name.value && 
                        !(unit.in_game_name.toLowerCase().includes(filters.name.value.toLowerCase()) ||
                          unit.real_name.toLowerCase().includes(filters.name.value.toLowerCase()))) {
                        return false;
                    }
                    
                    if (filters.enchant.value && filters.enchant.value !== unit.enchant.toLowerCase()) {
                        return false;
                    }
                    
                    if (filters.max_placement.value && String(filters.max_placement.value) !== String(unit.placement)) {
                        return false;
                    }
                    
                    if (filters.role.value && !unit[`role_${gamemode}`]?.includes(filters.role.value)) {
                        return false;
                    }
                    
                    if (filters.roleNbr.value) {
                        let separatorCount = countSeparators(unit[`role_${gamemode}`], ".");
                        
                        if (filters.roleNbr.value === "one" && separatorCount !== 0) {
                            return false;
                        }
                        
                        if (filters.roleNbr.value === "two" && separatorCount !== 1) {
                            return false;
                        }
                        
                        if (filters.roleNbr.value === "three" && separatorCount !== 2) {
                            return false;
                        }
                        
                        if (filters.roleNbr.value === "four" && separatorCount !== 3) {
                            return false;
                        }
                        
                        if (filters.roleNbr.value === "oneNoExecutionner" &&
                            !(separatorCount === 0 && unit[`role_${gamemode}`] !== "Executionner")) {
                            return false;
                        }
                    }
                    
                    if (filters.abilityType.value) {
                        let selectedGamemode = unit.gamemodes[gamemode];
                        
                        if (filters.abilityType.value == "None") {
                            if (unit.gamemodes[gamemode]) {
                                return false;
                            }
                        } else {
                            let hasMatchingType = false;
                            
                            if (selectedGamemode?.abilities) {
                                Object.values(selectedGamemode.abilities).forEach(ability => {
                                    if (ability.ability_types) {
                                        Object.values(ability.ability_types).forEach(type => {
                                            if (type.ability_type_name && type.ability_type_name.includes(filters.abilityType.value)) {
                                                hasMatchingType = true;
                                            }
                                        });
                                    }
                                });
                                
                                if (!hasMatchingType) {
                                    return false;
                                }
                            } else {
                                return false;
                            }
                        }
                    }
                    
                    if (filters.startCost.value) {
                        switch (filters.startCost.value) {
                            case "500 or less":
                                if (unit.cost_start > 500) return false;
                                break;
                            case "between500and550":
                                if (unit.cost_start < 500 || unit.cost_start > 550) return false;
                                break;
                            case "between550and600":
                                if (unit.cost_start < 550 || unit.cost_start > 600) return false;
                                break;
                            case "minus1000":
                                if (unit.cost_start >= 1000) return false;
                                break;
                            case "plus1000":
                                if (unit.cost_start <= 1000) return false;
                                break;
                        }
                    }
                    
                    if (filters.maxCost.value) {
                        switch (filters.maxCost.value) {
                            case "minus50k":
                                if (unit.cost_max >= 50000) return false;
                                break;
                            case "minus100k":
                                if (unit.cost_max >= 100000) return false;
                                break;
                            case "minus1mil":
                                if (unit.cost_max >= 1000000) return false;
                                break;
                            case "minus5mil":
                                if (unit.cost_max >= 5000000) return false;
                                break;
                            case "minus10mil":
                                if (unit.cost_max >= 10000000) return false;
                                break;
                            case "plus10mil":
                                if (unit.cost_max <= 10000000) return false;
                                break;
                        }
                    }
                    
                    if (filters.collectionDifficulty.value) {
                        switch (filters.collectionDifficulty.value) {
                            case "f":
                                if (unit.farming_difficulty_points >= 15) return false;
                                break;
                            case "e":
                                if (unit.farming_difficulty_points >= 26) return false;
                                break;
                            case "d":
                                if (unit.farming_difficulty_points >= 38) return false;
                                break;
                            case "c":
                                if (unit.farming_difficulty_points >= 51) return false;
                                break;
                            case "b":
                                if (unit.farming_difficulty_points >= 64) return false;
                                break;
                            case "a":
                                if (unit.farming_difficulty_points >= 82) return false;
                                break;
                            case "s":
                                if (unit.farming_difficulty_points < 82) return false;
                                break;
                        }
                    }
                    
                    if (filters.air.value) {
                        let airType = unit[`hit_air_${gamemode}`];
                        
                        switch (filters.air.value) {
                            case "ground":
                                if (airType !== "Ground") return false;
                                break;
                            case "hill":
                                if (airType !== "Hill") return false;
                                break;
                            case "hybrid":
                                if (airType !== "Hybrid") return false;
                                break;
                            case "hill_hybrid":
                                if (!["Hill","Hybrid"].includes(airType)) return false;
                                break;
                            case "only_air":
                                if (airType !== "Air Only") return false;
                                break;
                            case "hill_hybrid_only_air":
                                if (!["Hill","Hybrid","Air Only"].includes(airType)) return false;
                                break;
                        }
                    }
                    
                    return true;
                });
                
                // Sort units
                const sortedUnits = sortUnits(filteredUnits, orderBy);
                
                // Display sorted units
                sortedUnits.forEach(unit => {
                    foundUnits++;
                    
                    // Determine enchant color
                    let enchantColor = 'bg-gray-200';
                    if (unit.enchant) {
                        switch(unit.enchant.toLowerCase()) {
                            case 'fire': enchantColor = 'bg-red-500'; break;
                            case 'water': enchantColor = 'bg-blue-500'; break;
                            case 'nature': enchantColor = 'bg-green-500'; break;
                            case 'electric': enchantColor = 'bg-yellow-400'; break;
                            case 'dark': enchantColor = 'bg-purple-900'; break;
                            case 'holy': enchantColor = 'bg-yellow-200'; break;
                        }
                    }
                    
                    // Create card
                    const card = document.createElement('div');
                    card.className = 'card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition cursor-pointer';
                    card.dataset.id = unit.unit_id;
                    
                    card.innerHTML = `
                        <div class="relative">
                            <div class="absolute top-2 left-2 w-8 h-8 ${enchantColor} rounded-full flex items-center justify-center text-white">
                                <i class="fas ${unit.enchant ? 'fa-fire' : 'fa-ban'} text-xs"></i>
                            </div>
                            <img src="/All_Star_Tower_Rater/image_file/${unit.unit_file}" alt="${unit.in_game_name}" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-gray-800 truncate">${unit.in_game_name}</h3>
                            <p class="text-sm text-gray-600 mb-2">${unit.real_name}</p>
                            
                            <div class="flex flex-wrap gap-2 mt-3">
                                <span class="stat-badge bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded">${unit.role_max || 'No Role'}</span>
                                <span class="stat-badge bg-green-100 text-green-800 text-xs px-2 py-1 rounded">FD: ${unit.farming_difficulty || '?'}</span>
                                <span class="stat-badge bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">$${unit.cost_max?.toLocaleString() || '0'}</span>
                            </div>
                        </div>
                    `;
                    
                    resultsContainer.appendChild(card);
                });
                
                // Update results count
                if (foundUnits > 0) {
                    resultsCount.innerHTML = `<i class="fas fa-check-circle mr-1"></i> ${foundUnits} ${foundUnits === 1 ? 'unit' : 'units'} found`;
                    resultsCount.className = 'bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium';
                    noResultsMessage.classList.add('hidden');
                } else {
                    showNoResults();
                }
            }
            
            function showNoResults() {
                resultsCount.innerHTML = `<i class="fas fa-exclamation-circle mr-1"></i> 0 units found`;
                resultsCount.className = 'bg-red-100 text-red-800 px-4 py-2 rounded-full text-sm font-medium';
                noResultsMessage.classList.remove('hidden');
            }
            
            function showError(message) {
                resultsContainer.innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <i class="fas fa-exclamation-triangle text-4xl text-red-500 mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-600">Error Loading Data</h3>
                        <p class="text-gray-500 mt-2">${message}</p>
                    </div>
                `;
            }
        });
    </script>
</body>
</html>