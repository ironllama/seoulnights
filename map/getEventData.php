<?php
if (isset($_POST['locationID'])) {
    $locationID = $_POST['locationID'];
    $ass_id = "%" . "(" . $locationID . ")" . "%";

    try {
        $db = new PDO('mysql:host=localhost;dbname=businessdb;charset=utf8', 'root', '');

        // Using LIKE to find matching locationID within the associative_ids column
        $sql = 'SELECT * FROM events WHERE associative_id LIKE :locationID';
        $stmt = $db->prepare($sql);

        // Concatenate wildcards to match the locationID anywhere in associative_ids
        $stmt->execute([
            "locationID" => $ass_id
        ]);

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($events) {
            shuffle($events);
            echo json_encode($events[0]);
        } else {
            echo "No events found with locationID $locationID";
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "No locationID received";
}
?>

