<?php
session_start();
$sessionID = session_id();

try {
    $db = new PDO("mysql:host=localhost;dbname=businessdb", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}


if (isset($_POST['update'])) {
    $yesUpdate = $_POST['update'];

    //updating the database
    $updateFinalScore = $db->prepare("UPDATE gameplay_logs set run_completed = '$yesUpdate' WHERE run_sessionID = '$sessionID'");
    $updateFinalScore->execute();

    echo "Score Uploaded";
} else {
    $currentState = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$sessionID'");
    $currentState->execute();
    $currentStateDetails = $currentState->fetch(PDO::FETCH_ASSOC);

    // next steps is to calculate run_score using end of game player stats
    $endGameEnergy = $currentStateDetails['run_energyLevel'];
    $endGameMoney = $currentStateDetails['run_moneyLevel'];
    $endGameDrunk = $currentStateDetails['run_drunkLevel'];

    // calculate run score
    $endGameRunScore = ($endGameEnergy + $endGameMoney) * $endGameDrunk;

    $updateFinalScore = $db->prepare("UPDATE gameplay_logs set run_score = '$endGameRunScore' WHERE run_sessionID = '$sessionID'");
    $updateFinalScore->execute();

    $new = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$sessionID'");
    $new->execute();
    $newResult = $new->fetch(PDO::FETCH_ASSOC);

    echo json_encode($newResult, JSON_PRETTY_PRINT);
}
