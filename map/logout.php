<?php

session_start();


unset($_SESSION['name']);
session_regenerate_id(true);
session_destroy();
header('Location: ../login/login.php');
exit; // Ensure the script exits after redirection