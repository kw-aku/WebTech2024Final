<?php
include(dirname(__FILE__)."/../setting/connection.php");

// Turn on error reporting for debugging (optional but recommended)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Collecting the data from the html file
if (isset($_POST['submit'])) {
  // Retrieve form data
  $email = $_POST['email'];
  $passwd = $_POST['password'];

  // Prepared statements for security
  $stmt_user = $conn->prepare("SELECT * FROM user WHERE email = ?");
  $stmt_pub = $conn->prepare("SELECT * FROM pub WHERE email = ?");

  $stmt_user->bind_param("s", $email);
  $stmt_pub->bind_param("s", $email);

  // Check email in user table first
  $stmt_user->execute();
  $result_user = $stmt_user->get_result(); // Get results

  if ($result_user->num_rows > 0) {
      $user_data = $result_user->fetch_assoc(); // Fetch user data

      // Verify password (using password_verify for hashed passwords)
      if (password_verify($passwd, $user_data['passwd'])) {
        $_SESSION['user_id'] = $user_data['id']; //Storing pub data id
        $_SESSION['logged_in'] = true; //login status
        echo "<script>window.location.href='../regular_home.php'</script>";
          // Handle successful user login (e.g., redirect to user dashboard)
      } else {
          echo "Incorrect password for user";
      }
  } else {
      // Email not found in user table, check pub table
      $stmt_pub->execute();
      $result_pub = $stmt_pub->get_result();

      if ($result_pub->num_rows > 0) {
          $pub_data = $result_pub->fetch_assoc(); // Fetch pub data

          // Verify password (using password_verify for hashed passwords)
          if (password_verify($passwd, $pub_data['passwd'])) {
            $_SESSION['user_id'] = $pub_data['id']; //Storing pub data id
            $_SESSION['logged_in'] = true; //login status
            echo "<script>window.location.href='../vendor_home.php'</script>";
              // Handle successful pub login (e.g., redirect to pub dashboard)
          } else {
              echo "Incorrect password for pub";
          }
      } else {
          echo "Email not found in user or pub tables.";
      }
  }

  // Close prepared statements
  $stmt_user->close();
  $stmt_pub->close();
} else {
  echo "Error: No data received from form";
}

// Closing connection
$conn->close();
?>

