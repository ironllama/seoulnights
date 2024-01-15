<?php
session_start();
header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

$session_id = session_id();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('php://input');

    if (!empty($jsonData)) {
        $roundData = json_decode($jsonData, true);

        // $roundData[0];  < --- this is the entire object for the played card
        // $roundData[1];  < --- this is the enemy move object

        //parsing for the individual battle stats of player and enemy
        $card_attack = $roundData[0]['card_attack'];
        $card_defense = $roundData[0]['card_defense'];
        $card_regen = $roundData[0]['card_regen'];

        $enemyMove_attack = $roundData[1]['move_attack'];
        $enemyMove_defense = $roundData[1]['move_defend'];
        $enemyMove_regen = $roundData[1]['move_regen'];

        //getting current gamestate on card click
        $currentGameState = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$session_id'");
        $currentGameState->execute();
        $playerStats = $currentGameState->fetch(PDO::FETCH_ASSOC);

        $playerEnergyLevel = $playerStats['run_energyLevel']; // current energy levels that were found on click
        $playerMoneyLevel = $playerStats['run_moneyLevel'];
        $playerDrunkLevel = $playerStats['run_drunkLevel'];

        // battle logic

        $takenPlayerDamage = $card_defense - $enemyMove_attack; // card defense - enemy attack
        $takenEnemyDamage = $enemyMove_defense - $card_attack; // enemy defense - card attack
        $totalPlayerRegen = $card_regen; // card regen value
        $totalEnemyRegen = $enemyMove_regen; // enemy regen value


        if ($takenPlayerDamage >= 0) { // if defense is higher
            $takenPlayerDamage = 0; // players takes 0 damage
        } else $takenPlayerDamage; // otherwise takenplayerdamage 

        if ($takenEnemyDamage >= 0) { // if enemy defense is higher
            $takenEnemyDamage = 0; // enemy takes 0 damage
        } else $takenEnemyDamage; // otherwise takenenemydamage

        $roundPlayerEnergy = ($takenPlayerDamage + $totalPlayerRegen);
        $roundEnemyEnergy = ($takenEnemyDamage + $totalEnemyRegen);

        if ($playerEnergyLevel + $takenPlayerDamage > $playerEnergyLevel) {
            $playerHealth = $playerEnergyLevel;
        } else {
            $updatedEnergy = ($playerEnergyLevel + $takenPlayerDamage);
            $playerHealth = $updatedEnergy;
        }

        $updatePlayerEnergy = $db->prepare("UPDATE gameplay_logs set run_energyLevel = '$playerHealth' where run_sessionID = '$session_id'");
        $updatePlayerEnergy->execute();

        $results = array(
            'updatedEnergyLevel' => $playerHealth,
            'updatedMoneyLevel' => $playerMoneyLevel,
            'updatedDrunkLevel' => $playerDrunkLevel
        );

        echo json_encode($results);
    } else echo "Nothing was sent";
} else {
    $currentGameState = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$session_id'");
    $currentGameState->execute();
    $playerStats = $currentGameState->fetch(PDO::FETCH_ASSOC);

    $playerEnergyLevel = $playerStats['run_energyLevel'];
    $playerMoneyLevel = $playerStats['run_moneyLevel'];
    $playerDrunkLevel = $playerStats['run_drunkLevel'];

    $results = array(
        'updatedEnergyLevel' => $playerEnergyLevel,
        'updatedMoneyLevel' => $playerMoneyLevel,
        'updatedDrunkLevel' => $playerDrunkLevel
    );

    echo json_encode($results);
}
