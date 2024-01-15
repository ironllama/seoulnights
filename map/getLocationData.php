<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

// Prepare and execute the query to fetch locations
$locations = $db->prepare("SELECT * FROM locations ORDER BY RAND() LIMIT 14");
$locations->execute();
$locationResults = $locations->fetchAll(PDO::FETCH_ASSOC);

function generateRandomEorBArray($count)
{
    // Create an array with $count random values of "e" or "b"
    $randomValues = array_fill(0, $count, '');

    // Use array_map to assign random "e" or "b" values to the array
    $randomValues = array_map(function () {
        return (rand(0, 1) === 0) ? 'e' : 'b';
    }, $randomValues);

    return $randomValues;
}

// Call generateRandomEorBArray to get the random values
$randomValues = generateRandomEorBArray(14);

// Modify the 'location_ID' values in the fetched results
foreach ($locationResults as &$row) {
    $row['location_id'] = $randomValues[0] . $row['location_id'];
    array_shift($randomValues);
}

// Output the JSON result
echo json_encode($locationResults);

// foreach ($locationResults as $result) {
//     echo "location name is : " . $result['location_name'] . "<br>";
// };
