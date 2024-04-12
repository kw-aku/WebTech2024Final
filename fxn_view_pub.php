<?php
include(dirname(__FILE__)."/../setting/connection.php");
session_start();

// Get search term from URL parameter
$searchTerm = isset($_GET['searchTerm']) ? trim($_GET['searchTerm']) : '';

// Validate and sanitize search term (if needed)

// Construct your database query based on the search term
$sql = "SELECT * FROM Pub WHERE city LIKE '%$searchTerm%'";

$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    echo '<p>Error: Could not execute search query.</p>';
    exit;
}

// Process and format search results as a table
$searchResults = '';
if (mysqli_num_rows($result) > 0) {
    $searchResults .= '<table style="position: relative; clear: both; border-collapse: collapse; width: 45em; right: 8em; top: 10em;">';  
    $searchResults .= '<thead><tr><th style="border: 2px solid black; padding-left: 3em; text-align: center">Pub Name</th><th style="border: 2px solid black; padding-left: 3em; text-align: center">City</th></tr></thead><tbody>';
    $row_count = 1;  // Initialize counter for even rows
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract data from each row
        $searchResults .= '<tr style="';  // Open style attribute
        if ($row_count % 2 == 0) {  // Check if even row
            $searchResults .= 'background-color: #D9D9D9;';
        }
        $searchResults .= '">';  // Close style attribute (if needed)
        $searchResults .= '<td style="border: 2px solid black; padding-left: 3em; text-align: center">' . $row['pubname'] . '</td><td style="border: 2px solid black; padding-left: 3em; text-align: center">' . $row['city'] . '</td></tr>';
        $row_count++;  // Increment counter for next row
    }
    $searchResults .= '</tbody></table>';
} else {
    $searchResults = '<p>No results found for "' . $searchTerm . '".</p>';
}

echo $searchResults;


// Closing connection
$conn->close();

?>
