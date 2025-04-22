<?php
require_once __DIR__ . '/../php_sup/pdo.php';

// Requête SQL
$query = $pdo->query("
    SELECT * FROM all_star_tower_rater.units
    LEFT JOIN ability_attribution_mode ON units.unit_id = ability_attribution_mode.id_unit
    LEFT JOIN abilities ON ability_attribution_mode.id_ability = abilities.ability_id
    LEFT JOIN ability_type_attribution ON abilities.ability_id = ability_type_attribution.id_ability
    LEFT JOIN ability_types ON ability_type_attribution.id_ability_type = ability_types.ability_type_id
    ORDER BY units.unit_id, ability_attribution_mode.gamemode, abilities.ability_id;
");

$units = [];
while ($entree = $query->fetch(PDO::FETCH_ASSOC)) {
    if (!isset($units[$entree["unit_id"]])) {
        $units[$entree["unit_id"]] = [
            "unit_id" => $entree["unit_id"],
            "in_game_name" => $entree["in_game_name"],
            "real_name" => $entree["real_name"],
            "unit_file" => $entree["unit_file"],
            "placement" => $entree["placement"],
            "enchant" => $entree["enchant"],
            "farming_difficulty" => $entree["farming_difficulty"],
            "farming_difficulty_points" => $entree["farming_difficulty_points"],
            "progression" => $entree["progression"],
            "progression_points" => $entree["progression_points"],
            "aoe_start" => $entree["aoe_start"],
            "aoe_start_computed" => $entree["aoe_start_computed"],
            "aoe_start_position" => $entree["aoe_start_position"],
            "aoe_start_points" => $entree["aoe_start_points"],
            "rng_start" => $entree["rng_start"],
            "rng_start_position" => $entree["rng_start_position"],
            "rng_start_points" => $entree["rng_start_points"],
            "dps_start_buffable" => $entree["dps_start_buffable"],
            "dps_start_not_buffable" => $entree["dps_start_not_buffable"],
            "dps_max_not_buffable" => $entree["dps_max_not_buffable"],
            "dps_raid_not_buffable" => $entree["dps_raid_not_buffable"],
            "dps_start" => $entree["dps_start"],
            "dps_start_unit" => $entree["dps_start_unit"],
            "dps_start_dot" => $entree["dps_start_dot"],
            "dps_start-computed" => $entree["dps_start_computed"],
            "dps_start_position" => $entree["dps_start_position"],
            "dps_start_placement" => $entree["dps_start_placement"],
            "dps_start_fix_placement" => $entree["dps_start_fix_placement"],
            "dps_start_points" => $entree["dps_start_points"],
            "cost_start" => $entree["cost_start"],
            "prix_start_position" => $entree["prix_start_position"],
            "prix_start_points" => $entree["prix_start_points"],
            "worthiness_start" => $entree["worthiness_start"],
            "worthiness_start_position" => $entree["worthiness_start_position"],
            "worthiness_start_points" => $entree["worthiness_start_points"],
            "role_start" => $entree["role_start"],
            "effet_start_indicateur_excel" => $entree["effet_start_indicateur_excel"],
            "hit_air_start" => $entree["hit_air_start"],
            "aoe_max" => $entree["aoe_max"],
            "aoe_max_computed" => $entree["aoe_max_computed"],
            "aoe_max_position" => $entree["aoe_max_position"],
            "aoe_max_points" => $entree["aoe_max_points"],
            "rng_max" => $entree["rng_max"],
            "rng_max_position" => $entree["rng_max_position"],
            "rng_max_points" => $entree["rng_max_points"],
            "attack_max" => $entree["attack_max"],
            "spa_max" => $entree["spa_max"],
            "dps_max" => $entree["dps_max"],
            "dps_max_unit" => $entree["dps_max_unit"],
            "dps_max_fix_placement" => $entree["dps_max_fix_placement"],
            "dps_max_buffable" => $entree["dps_max_buffable"],
            "dps_max_placement" => $entree["dps_max_placement"],
            "dps_max_dot" => $entree["dps_max_dot"],
            "dps_max_computed" => $entree["dps_max_computed"],
            "dps_max_position" => $entree["dps_max_position"],
            "dps_max_points" => $entree["dps_max_points"],
            "cost_max" => $entree["cost_max"],
            "prix_max_computed" => $entree["prix_max_computed"],
            "prix_max_position" => $entree["prix_max_position"],
            "prix_max_points" => $entree["prix_max_points"],
            "role_max" => $entree["role_max"],
            "effet_max_indicateur_excel" => $entree["effet_max_indicateur_excel"],
            "hit_air_max" => $entree["hit_air_max"],
            "aoe_raid" => $entree["aoe_raid"],
            "aoe_raid_computed" => $entree["aoe_raid_computed"],
            "aoe_raid_position" => $entree["aoe_raid_position"],
            "aoe_raid_points" => $entree["aoe_raid_points"],
            "rng_raid" => $entree["rng_raid"],
            "rng_raid_position" => $entree["rng_raid_position"],
            "rng_raid_points" => $entree["rng_raid_points"],
            "dps_raid" => $entree["dps_raid"],
            "dps_raid_unit" => $entree["dps_raid_unit"],
            "dps_raid_fix_placement" => $entree["dps_raid_fix_placement"],
            "dps_raid_buffable" => $entree["dps_raid_buffable"],
            "dps_raid_placement" => $entree["dps_raid_placement"],
            "dps_raid_dot" => $entree["dps_raid_dot"],
            "dps_raid_computed" => $entree["dps_raid_computed"],
            "dps_raid_position" => $entree["dps_raid_position"],
            "dps_raid_points" => $entree["dps_raid_points"],
            "cost_raid" => $entree["cost_raid"],
            "prix_raid_computed" => $entree["prix_raid_computed"],
            "prix_raid_position" => $entree["prix_raid_position"],
            "prix_raid_points" => $entree["prix_raid_points"],
            "role_raid" => $entree["role_raid"],
            "effet_raid" => $entree["effet_raid"],
            "hit_air_raid" => $entree["hit_air_raid"],
            "placement_raid" => $entree["placement_raid"], 
            "gamemodes" => [],
        ];
    }
    if (!isset($units[$entree["unit_id"]]["gamemodes"][$entree["gamemode"]])) {
        $units[$entree["unit_id"]]["gamemodes"][$entree["gamemode"]] = [
            "gamemode" => $entree["gamemode"],
            "abilities" => [],
        ];
    }
    if (!isset($units[$entree["unit_id"]]["gamemodes"][$entree["gamemode"]]["abilities"][$entree["id_ability"]])) {
        $units[$entree["unit_id"]]["gamemodes"][$entree["gamemode"]]["abilities"][$entree["id_ability"]] = [
            "id_ability" => $entree["id_ability"],
            "ability_file" => $entree["ability_file"],
            "ability_name" => $entree["ability_name"],
            "ability_description" => $entree["ability_description"],
            "ability_cooldown" => $entree["ability_cooldown"],
            "ability_types" => [],
        ];
    }
    if (!isset($units[$entree["unit_id"]]["gamemodes"][$entree["gamemode"]]["abilities"][$entree["id_ability"]]["ability_types"][$entree["ability_type_id"]])) {
        $units[$entree["unit_id"]]["gamemodes"][$entree["gamemode"]]["abilities"][$entree["id_ability"]]["ability_types"][$entree["ability_type_id"]] = [
            "id_ability_type" => $entree["id_ability_type"],
            "ability_type_name" => $entree["ability_type_name"],
            "ability_type_description" => $entree["ability_type_description"],
        ];
    }
}

/* while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $units[] = $row; // Store each row in the array
} */

/* echo $units; */
header('Content-Type: application/json');
echo json_encode($units);
?>