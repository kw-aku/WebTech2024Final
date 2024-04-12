<?php
include(dirname(__FILE__)."/../setting/connection.php");

// Collecting the data from the html file
if (isset($_POST['submit'])) {
  // Retrieve form data
  $pubname = $_POST['pubname'];
  $city = $_POST['city'];
  $email = $_POST['email'];
  $passwd = $_POST['password'];

  $hashpass = password_hash($passwd, PASSWORD_BCRYPT);


  // Inserting into the User table
  $sql = "INSERT INTO Pub (rid, pubname, city, email, passwd) VALUES
  (2,'$pubname','$city','$email','$hashpass')";

  $result = $conn->query($sql);
  
  if ($result) {
    // echo "hi";
    echo "<script>window.location.href='../login.php'</script>";
  } else {
    echo "Error";
  }
} else {
  echo "Error: No data received from form";
}

// Closing connection
$conn->close();
?>
