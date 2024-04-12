<?php
include(dirname(__FILE__)."/../setting/connection.php");

if (isset($_GET['id'])){
        
    $id = $_GET['id'];

    $sql = "DELETE FROM Inventory WHERE id='$id' ";

    $result = $conn->query($sql);

    if($result){
        echo "<script>window.location.href='../vendor_home.php'</script>";
    }else{
        echo "Does not exist";
    }
}else{
    echo "Something went wrong";
}

$conn->close();

?>