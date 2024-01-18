<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=businessdb", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM mart_items WHERE type = 'drink' ORDER BY RAND() LIMIT 6");
$stmt->execute();
$drink = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM mart_items WHERE type = 'food' ORDER BY RAND() LIMIT 6");
$stmt->execute();
$food = $stmt->fetchAll(PDO::FETCH_ASSOC);

/// this section was to bring in current game state upon CU enter ///
/// can delete as this api is only being called upon game init ///

$stmt = $pdo->prepare("SELECT run_energyLevel, run_moneyLevel, run_drunkLevel, run_sessionID FROM `gameplay_logs`");
$stmt->execute();
$gameplay_logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$run_energyLevel = $gameplay_logs[0]['run_energyLevel'];
$run_moneyLevel = $gameplay_logs[0]['run_moneyLevel'];
$run_drunkLevel = $gameplay_logs[0]['run_drunkLevel'];
$run_sessionID = $gameplay_logs[0]['run_sessionID'];

$data = [
    'items' => [
        'drink' => $drink,
        'food' => $food,
    ],
    'user_stats' => [
        'run_energyLevel' => $run_energyLevel,
        'run_moneyLevel' => $run_moneyLevel,
        'run_drunkLevel' => $run_drunkLevel,
        'run_sessionID' => $run_sessionID,
    ],
];

echo json_encode($data);
