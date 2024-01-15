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

//purpose of this api is to push new users into the login if they don't already exist in the database

$email = $_POST['email'];
$full_name = $_POST['name'];

$_SESSION['name'] = $full_name;

$exists = $db->prepare("SELECT * FROM seoulnights_users where email = '$email'");
$exists->execute();
$ifExists = $exists->rowCount();

if ($ifExists == 0) {
    $newUser = $db->prepare("INSERT INTO seoulnights_users (email,name) VALUES ('$email','$full_name')");
    $newUser->execute();
    echo "New User Added to the database";
    echo "Current Session Player: " . $_SESSION['name'];
} else if ($ifExists == 1) {
    echo "User already exists. Was not added to the database";
    echo "Current Session Player: " . $_SESSION['name'];
}
