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

$full_name = $_POST['name'];
$loginMethod = $_POST['loginMethod']; // this distinguishes between google vs kakao
$_SESSION['name'] = $full_name;


// if loginMethod of google is sent over run this code
if ($loginMethod == 'google') {

    $email = $_POST['email'];

    $exists = $db->prepare("SELECT * FROM seoulnights_users where user_identifier = '$email'");
    $exists->execute();
    $ifExists = $exists->rowCount();

    if ($ifExists == 0) {
        $newUser = $db->prepare("INSERT INTO seoulnights_users (user_identifier,name,login_method) VALUES ('$email','$full_name','$loginMethod')");
        $newUser->execute();
        echo "New User Added to the database";
        echo "Current Session Player: " . $_SESSION['name'];
    } else if ($ifExists == 1) {
        echo "User already exists. Was not added to the database";
        echo "Current Session Player: " . $_SESSION['name'];
    }
} // if loginMethod of kakao is sent over run this code
else if ($loginMethod == 'kakao') {
    $playerid = $_POST['playerid'];

    $exists = $db->prepare("SELECT * FROM seoulnights_users where user_identifier = '$playerid'");
    $exists->execute();
    $ifExists = $exists->rowCount();

    if ($ifExists == 0) {
        $newUser = $db->prepare("INSERT INTO seoulnights_users (user_identifier,name,login_method) VALUES ('$playerid','$full_name','$loginMethod')");
        $newUser->execute();
        echo "New User Added to the database";
        echo "Current Session Player: " . $_SESSION['name'];
    } else if ($ifExists == 1) {
        echo "User already exists. Was not added to the database";
        echo "Current Session Player: " . $_SESSION['name'];
    }
}
