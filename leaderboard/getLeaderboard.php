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

$session_id = session_id();

$currentLeaderboard = $db->prepare("SELECT * FROM gameplay_logs WHERE run_completed = 'yes' ORDER BY run_score DESC LIMIT 10");
$currentLeaderboard->execute();
$results = $currentLeaderboard->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results, JSON_PRETTY_PRINT);
