<?php
// Creating variables for connections
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brewski";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checkign connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// echo "success";
?>