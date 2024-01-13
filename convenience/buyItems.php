<?php

$sessionid = session_id();

try {
    $pdo = new PDO("mysql:host=localhost;dbname=businessdb", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
$itemData = json_decode(file_get_contents('php://input'));


$stmt = $pdo->prepare("SELECT * from mart_items where id='$itemData'");
$stmt->execute();
$drink = $stmt->fetch(PDO::FETCH_ASSOC);

$cost = $drink['price_hit'];
$energy = $drink['energy_hit'];
$drunk = $drink['drunk_hit'];

$stmt = $pdo->prepare("select * from gameplay_logs where run_sessionID= '$sessionid'");
$stmt->execute();
$playState = $stmt->fetch(PDO::FETCH_ASSOC);

$newEnergy = ($playState['run_energyLevel'] + $energy);
$newMoney = ($playState['run_moneyLevel'] + $cost);
$newDrunk = ($playState['run_drunkLevel'] + $drunk);


$stmt = $pdo->prepare("update gameplay_logs set run_energyLevel = '$newEnergy', run_moneyLevel = '$newMoney', run_drunkLevel = '$newDrunk' where run_sessionID= '$sessionid'");
$stmt->execute();


$newValues = array(
    'energy' => $newEnergy,
    'drunk' => $newDrunk,
    'money' => $newMoney
);
echo json_encode($newValues);
