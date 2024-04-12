<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    // header('Location: ../regular_register.php');
    // echo "<script>window.location.href='login.php'</script>";
    // echo "<script>window.location.href='../login.php'</script>";
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./css/regular_home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--for the font Inter-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="left-side">
        <p id="inventory">Inventory</p>
        <a href="./actions/logout.php"><p id="logout">Logout ->]</p></a>
    </div>
    
    <div id="right-side">
        <div id="search-container">
            <input type="search" id="location-search" placeholder="eg. Kumasi">
            <button id="search-btn">Search</button>
        </div>
        <div id="search-results"></div> <script>
            // Script for search functionality
            const searchInput = document.getElementById('location-search');
            const searchBtn = document.getElementById('search-btn');
            const searchResults = document.getElementById('search-results');

            searchBtn.addEventListener('click', () => {
                const searchTerm = searchInput.value;
                
                // Send AJAX request with searchTerm
                fetch('./actions/fxn_view_pub.php?searchTerm=' + searchTerm)
                    .then(response => response.text())
                    .then(data => {
                        searchResults.innerHTML = data; // Update search results with response
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        searchResults.innerHTML = '<p>Error: An error occurred during search.</p>';
                    });
            });
        </script>

               
    </div>
</body>
</html>