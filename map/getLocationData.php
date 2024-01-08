<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

// purpose is to fetch all the location values and have it prepoulate the map from the database

$locations = $db->prepare("SELECT * FROM location ORDER BY RAND() LIMIT 14");
$locations->execute();
$locationResults = $locations->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($locationResults);

// foreach ($locationResults as $result) {
//     echo "location name is : " . $result['location_name'] . "<br>";
// };
