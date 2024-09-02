<?php
require_once '../pdoconfig.php';
session_start();
$sessionID = session_id();

try {
    $db = new PDO(`mysql:host=$host;dbname=$dbname`, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$currentState = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$sessionID'");
$currentState->execute();
$currentStateDetails = $currentState->fetch(PDO::FETCH_ASSOC);

echo json_encode($currentStateDetails, JSON_PRETTY_PRINT);
