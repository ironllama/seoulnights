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

// Ensure that this script can accept JSON data
header("Content-Type: application/json");

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the JSON data from the request body
    $json_data = file_get_contents("php://input"); // grabbing the sent json data

    // Check if the JSON data is valid
    $decoded_data = json_decode($json_data); // decoding the data
    
    if ($decoded_data !== null) { // if the data arrived 

        /// now getting current state of the game values ///
        $currentPlayerValues = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$session_id'");
        $currentPlayerValues->execute();
        $playerResults = $currentPlayerValues->fetch(PDO::FETCH_ASSOC);

        $currentEnergyLevel = $playerResults['run_energyLevel'];
        $currentMoneyLevel = $playerResults['run_moneyLevel'];
        $currentDrunkLevel = $playerResults['run_drunkLevel'];
        
        //checks to see if it's a battle resolution - index[1] represents player's choice of Energy("1"), Drunk("2"), or Money("3")
        if ($decoded_data[0] === "b") {
            if ($decoded_data[1] === "1") {
                $updatedEnergyLevel = $currentEnergyLevel + 15;
                $updatedMoneyLevel = $currentMoneyLevel;
                $updatedDrunkLevel = $currentDrunkLevel;
                if ($updatedEnergyLevel > 100) $updatedEnergyLevel = 100;
            }
            if ($decoded_data[1] === "2") {
                $updatedEnergyLevel = $currentEnergyLevel;
                $updatedMoneyLevel = $currentMoneyLevel;
                $updatedDrunkLevel = $currentDrunkLevel + 5;
                if ($updatedDrunkLevel > 100) $updatedDrunkLevel = 100;
            }
            if ($decoded_data[1] === "3") {
                $updatedEnergyLevel = $currentEnergyLevel;
                $updatedMoneyLevel = $currentMoneyLevel + 20000;
                $updatedDrunkLevel = $currentDrunkLevel;
            }
            
            // updating the current run's values for the player
            $updatePlayerValues = $db->prepare("UPDATE gameplay_logs set run_energyLevel = '$updatedEnergyLevel', run_moneyLevel = '$updatedMoneyLevel', run_drunkLevel = '$updatedDrunkLevel' where run_sessionID = '$session_id'");
            $updatePlayerValues->execute();

            $response = [
                "updatedEnergyLevel" => $updatedEnergyLevel,
                "updatedMoneyLevel" => $updatedMoneyLevel,
                "updatedDrunkLevel" => $updatedDrunkLevel
            ];
            echo json_encode($response);
            exit();
        }
        
        //otherwise checks options ID for the options table
        $optionID = intval($decoded_data[0]); // selecting the 0 index of the data

        // finding the values correlated with the selected option
        $selectedOptionValues = $db->prepare("SELECT * FROM options where option_id = '$optionID'");
        $selectedOptionValues->execute();
        $optionResults = $selectedOptionValues->fetch(PDO::FETCH_ASSOC);

        // putting option values into easy to understand variables
        $optionEnergyValue = $optionResults['option_energy'];
        $optionMoneyValue = $optionResults['option_money'];
        $optionDrunkValue = $optionResults['option_drunk'];

        /// doing the math to update the values ///
        $updatedEnergyLevel = $currentEnergyLevel + $optionEnergyValue;
        $updatedMoneyLevel = $currentMoneyLevel + $optionMoneyValue;
        $updatedDrunkLevel = $currentDrunkLevel + $optionDrunkValue;
        if ($updatedDrunkLevel > 100) $updatedDrunkLevel = 100;
        if ($updatedDrunkLevel < 0) $updatedDrunkLevel = 0;
        if ($updatedEnergyLevel > 100) $updatedEnergyLevel = 100;
        
        // updating the current run's values for the player
        $updatePlayerValues = $db->prepare("UPDATE gameplay_logs set run_energyLevel = '$updatedEnergyLevel', run_moneyLevel = '$updatedMoneyLevel', run_drunkLevel = '$updatedDrunkLevel' where run_sessionID = '$session_id'");
        $updatePlayerValues->execute();

        // Create a response array
        $response = [
            "updatedEnergyLevel" => $updatedEnergyLevel,
            "updatedMoneyLevel" => $updatedMoneyLevel,
            "updatedDrunkLevel" => $updatedDrunkLevel
        ];
        echo json_encode($response);
    } else {
        // JSON data is invalid
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Invalid JSON data"]);
    }
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Invalid request method"]);
}
