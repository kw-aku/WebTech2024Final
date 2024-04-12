<?php
session_start();
include(dirname(__FILE__)."/../setting/connection.php");
$id = $_SESSION['user_id'];

// Geting the items
$query = "SELECT * FROM Inventory WHERE vendor_id = $id";

//executing query
$result = mysqli_query($conn, $query);

// check if connection worked
if(!$result){
    die("Query failed");
}

// closing connection
$conn->close();



?>