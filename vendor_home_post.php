<?php
include(dirname(__FILE__)."/../setting/connection.php");

if (isset($_POST['submit'])) {
    // Retrieve form data
    $id = $_POST['user_id'];
    $item = $_POST['item'];

    // Inserting into the User table
    $sql = "INSERT INTO Inventory (vendor_id, item) VALUES
    ('$id','$item')";

    $result = $conn->query($sql);
    
    if ($result) {
    // echo "hi";
    echo "<script>window.location.href='../vendor_home.php'</script>";
    } else {
    echo "Error";
    }

}
?>