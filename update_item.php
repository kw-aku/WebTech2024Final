<?php
include(dirname(__FILE__)."/../setting/connection.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id']; 
    $item = $_POST['item'];


    $query = "UPDATE Inventory SET item = '$item' WHERE id = '$id'";
    
    // executing query to database
    $result = mysqli_query($conn, $query);

    // condition if there's an error
    if($result){ 
        echo "<script>window.location.href='../vendor_home.php';</script>";
    }else{
        
    }

}else{
    echo "Something went wrong";
}

$conn->close();




?>