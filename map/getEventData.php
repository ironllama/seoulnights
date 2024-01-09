<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['locationID'])) {
    $locationID = substr(($_POST['locationID']), 1); // assiging location ID to $location


    try {
        $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');

        // Using LIKE to find matching locationID within the associative_ids column
        // $sql = 'SELECT * FROM events WHERE associative_id LIKE :locationID';
        // $stmt = $db->prepare($sql);

        // Concatenate wildcards to match the locationID anywhere in associative_ids
        // $stmt->execute([
        //     "locationID" => $ass_id
        // ]);

        // $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // if ($events) {
        //     shuffle($events);
        //     echo json_encode($events[0]);
        // } else {
        //     echo "No events found with locationID $locationID";
        // }

        $findEvents = $db->prepare("SELECT * FROM location_events WHERE location_id = '$locationID' ORDER BY RAND() LIMIT 1"); // finding all possible events from location_events table
        $findEvents->execute();
        $singularEvent = $findEvents->fetch(PDO::FETCH_ASSOC);

        $locationEvent = $singularEvent['event_id']; //finding specific event ID from locationID

        $eventData = $db->prepare("SELECT * FROM events where event_id = $locationEvent");
        $eventData->execute();
        $eventResult = $eventData->fetch(PDO::FETCH_ASSOC); // getting the eventData from the eventID

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
                "option_sobriety" => $optionsData["option_sobriety"]
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
