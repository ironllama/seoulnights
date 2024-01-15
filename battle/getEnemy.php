<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

$locationID = $_POST['location']; // bring in the passed locationID of the location we're at. currently were imitating this by using a button

$getEnemy = $db->prepare("SELECT * FROM enemies where enemy_locationID = '$locationID' ORDER BY RAND() LIMIT 1"); // were finding 1 enemy that is at this location sorted randomly
$getEnemy->execute();
$foundEnemy = $getEnemy->fetch(PDO::FETCH_ASSOC); //returns an object of the enemy from the enemies table

$enemyID = $foundEnemy['enemy_id']; // assign the enemy id to a variable

$getMoveIDs = $db->prepare("SELECT * FROM enemy_moves where enemy_id = '$enemyID'"); // getting all the moveIDs for the specific enemy
$getMoveIDs->execute();
$foundMoveIDs = $getMoveIDs->fetchAll(PDO::FETCH_ASSOC);


$moves = array();

foreach ($foundMoveIDs as $move) { // for each move ID, trying to make an array
    $moveID = $move['move_id']; // getting each individual moveID

    $getMoves = $db->prepare("SELECT * FROM moves where move_id = '$moveID'"); // finding the exact move using the moveID
    $getMoves->execute();
    $foundMove = $getMoves->fetch(PDO::FETCH_ASSOC);

    $move = array( // creating the array
        "move_id" => $foundMove['move_id'],
        "move_name" => $foundMove['move_name'],
        "move_desc" => $foundMove['move_desc'],
        "move_attack" => $foundMove['move_attack'],
        "move_defend" => $foundMove['move_defend'],
        "move_regen" => $foundMove['move_regen']
    );

    $moves[] = $move; // appending each array to the bigger array
    $foundEnemy['enemy_moves'] = $moves; // appending the bigger array to the original enemy array
}

echo json_encode($foundEnemy, JSON_PRETTY_PRINT); // sending it back
