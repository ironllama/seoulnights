<?php
session_start();
$sessionid = session_id();

try {
    $pdo = new PDO("mysql:host=localhost;dbname=businessdb", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$itemData = json_decode(file_get_contents('php://input')); // returns clicked item data

if ($itemData[0] === "s") {
    $justLooking = true;
    $itemData = substr($itemData, 1);
} else $justLooking = false;

$item = $pdo->prepare("SELECT * from mart_items where mart_id='$itemData'");
$item->execute();
$itemDetails = $item->fetch(PDO::FETCH_ASSOC);

$itemCost = $itemDetails['price_hit'];
$itemEnergy = $itemDetails['energy_hit'];
$itemDrunk = $itemDetails['drunk_hit'];

$currentGameState = $pdo->prepare("select * from gameplay_logs where run_sessionID= '$sessionid'");
$currentGameState->execute();
$currentGameStateDetails = $currentGameState->fetch(PDO::FETCH_ASSOC);

if ($justLooking === true) {
    echo json_encode($currentGameStateDetails['run_moneyLevel'] + $itemCost >= 0);
    exit();
} else {
    //guard against negative money values (and stealing!)
    if ($currentGameStateDetails['run_moneyLevel'] + $itemCost < 0) {
        exit();
    } else {
        $updatedEnergyLevel = ($currentGameStateDetails['run_energyLevel'] + $itemEnergy);
        if ($updatedEnergyLevel > 100) {
            $updatedEnergyLevel = 100;
        }

        $updatedMoneyLevel = ($currentGameStateDetails['run_moneyLevel'] + $itemCost);

        $updatedDrunkLevel = ($currentGameStateDetails['run_drunkLevel'] + $itemDrunk);
        if ($updatedDrunkLevel > 100) {
            $updatedDrunkLevel = 100;
        } else if ($updatedDrunkLevel < 0) {
            $updatedDrunkLevel = 0;
        }

        $updateGameState = $pdo->prepare("update gameplay_logs set run_energyLevel = '$updatedEnergyLevel', run_moneyLevel = '$updatedMoneyLevel', run_drunkLevel = '$updatedDrunkLevel' where run_sessionID= '$sessionid'");
        $updateGameState->execute();

        $newValues = array(
            'energy' => $updatedEnergyLevel,
            'drunk' => $updatedDrunkLevel,
            'money' => $updatedMoneyLevel
        );
        echo json_encode($newValues);
    }
}