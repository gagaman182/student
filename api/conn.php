<?php

// hospital
$servername = "192.168.4.3";
$username = "root";
$password = "1234";
$dbname = "studentcovid";
// home
// $servername = "localhost";
// $username = "root";
// $password = "123456789";
// $dbname = "studentcovid";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn -> set_charset("utf8");

?>