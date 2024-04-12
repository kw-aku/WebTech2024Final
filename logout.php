<?php
session_start();

session_unset();

session_destroy();

// redirecting
echo "<script>window.location.href='../login.php'</script>";
?>