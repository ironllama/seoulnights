<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST['locationID'][0] == "e") {
    $encountertype = "event";
};

if ($_POST['locationID'][0] == "b") {
    $encountertype = "battle";
};

if ($_POST['locationID'] == 'store') {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }

    $sessionID = session_id();

    $currentGameState = $pdo->prepare("select * from gameplay_logs where run_sessionID= '$sessionID'");
    $currentGameState->execute();
    $currentGameStateDetails = $currentGameState->fetch(PDO::FETCH_ASSOC);

    $newVisits = $currentGameStateDetails["store_visits_left"] - 1;

    $updateGameState = $pdo->prepare("update gameplay_logs set store_visits_left = '$newVisits' where run_sessionID= '$sessionID'");
    $updateGameState->execute();

    echo $newVisits;
    exit();
}

$locationID = substr(($_POST['locationID']), 1); // assiging location ID to $location
if ($encountertype == 'event') {
    if (isset($_POST['locationID'])) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');

            $findEvents = $db->prepare("SELECT * FROM location_events WHERE location_id = '$locationID' ORDER BY RAND() LIMIT 1"); // finding all possible events from location_events table
            $findEvents->execute();
            $singularEvent = $findEvents->fetch(PDO::FETCH_ASSOC);

            $locationEvent = $singularEvent['event_id']; //finding specific event ID from locationID

            $eventData = $db->prepare("SELECT * FROM events where event_id = $locationEvent");
            $eventData->execute();
            $eventResult = $eventData->fetch(PDO::FETCH_ASSOC); // getting the eventData from the eventID
            $eventResult['encounter_type'] = $encountertype;

            $eventOptions = $db->prepare("SELECT * FROM event_options where event_id = $locationEvent order by rand() limit 3");
            $eventOptions->execute();
            $eventOptionsResult = $eventOptions->fetchAll(PDO::FETCH_ASSOC); // getting all options associated with the event

            $options = array(); // instantiating options variable into type array

            foreach ($eventOptionsResult as $option) {
                $optionid = $option['option_id']; // getting the option id of each option available to the event
                $optionquery = $db->prepare("SELECT * FROM OPTIONS WHERE option_id=$optionid"); // querying for the specifc option
                $optionquery->execute(); // executing the statement
                $optionsData = $optionquery->fetch(PDO::FETCH_ASSOC); // fetching the actual data

                $option = array( // formatting the options into an array
                    "option_id" => $optionsData["option_id"],
                    "option_name" => $optionsData["option_description"],
                    "option_energy" => $optionsData["option_energy"],
                    "option_money" => $optionsData["option_money"],
                    "option_drunk" => $optionsData["option_drunk"]
                );
                $options[] = $option; // appending each option into the options array
                $eventResult["options"] = $options; // appending the options into the main event array
            };

            echo json_encode($eventResult, JSON_PRETTY_PRINT); // json_pretty_print adds whitespace in the json to prettify
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        $errorMessage = "No locationID received";
        echo json_encode($errorMessage);
    }
} else if ($encountertype == 'battle') {

    try {
        $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }

    $sessionID = session_id();


    //getting enemy data
    $getEnemy = $db->prepare("SELECT * FROM enemies where enemy_locationID = '$locationID' ORDER BY RAND() LIMIT 1"); // were finding 1 enemy that is at this location sorted randomly
    $getEnemy->execute();
    $foundEnemy = $getEnemy->fetch(PDO::FETCH_ASSOC); //returns an object of the enemy from the enemies table
    $foundEnemy['encounter_type'] = 'battle';
    $enemyID = $foundEnemy['enemy_id']; // assign the enemy id to a variable


    //getting enemy move data
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


    //getting current game state
    $currentGameState = $db->prepare("SELECT * FROM gameplay_logs where run_sessionID = '$sessionID'");
    $currentGameState->execute();
    $currentPlayer = $currentGameState->fetch(PDO::FETCH_ASSOC);

    $playerEnergyLevel = $currentPlayer['run_energyLevel'];
    $playerMoneyLevel = $currentPlayer['run_moneyLevel'];
    $playerDrunkLevel = $currentPlayer['run_drunkLevel'];


    $foundEnemy['currentPlayerEnergy'] = $playerEnergyLevel;
    $foundEnemy['currentPlayerMoney'] = $playerMoneyLevel;
    $foundEnemy['currentPlayerDrunk'] = $playerDrunkLevel;

    echo json_encode($foundEnemy, JSON_PRETTY_PRINT); // sending it back

};
