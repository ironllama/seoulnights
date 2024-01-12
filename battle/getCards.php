<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

$getCards = $db->prepare("SELECT * FROM cards ORDER BY RAND()");
$getCards->execute();

$receivedCards = $getCards->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($receivedCards, JSON_PRETTY_PRINT);
