<?php
session_start();
$sessionID = session_id();

try {
    $db = new PDO("mysql:host=localhost;dbname=businessdb", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$currentState = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$sessionID'");
$currentState->execute();
$currentStateDetails = $currentState->fetch(PDO::FETCH_ASSOC);

echo json_encode($currentStateDetails, JSON_PRETTY_PRINT);
