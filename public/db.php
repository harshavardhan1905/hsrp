<?php

$db_host = "localhost";
$db_name = "hsrpbooking";
$db_user = "dev_harsha";
$db_pass = "Harsha@123";


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}