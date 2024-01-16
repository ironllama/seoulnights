<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

$name = $_SESSION['name'];
$session_id = session_id();


$player_identifier = $_POST['player_identifier'];

$exists = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$session_id'");
$exists->execute();
$ifExists = $exists->rowCount();

if ($ifExists == 0) {
    $newGame = $db->prepare("INSERT INTO gameplay_logs (player_name,run_sessionID,player_identifier) VALUES ('$name','$session_id','$player_identifier')");
    $newGame->execute();
    echo "New Player Run added to the database";
} else if ($ifExists == 1) {
    echo "Run has already been added. Was not added to the database";
}
