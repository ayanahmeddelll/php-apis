<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "php-apis";

$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    
}
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Get the ID of the item to be deleted from the request
 

    // Prepare the delete query
    $query = "DELETE FROM `customers` WHERE id = 1";

    // Prepare the statement
    $statement = $connection->prepare($query);

    // Bind the ID parameter to the statement


    // Execute the delete query
    $statement->execute();

    // If the delete was successful
    if ($statement->affected_rows > 0) {
        echo "Item deleted successfully";
    } 
  
    // else {
    //     echo "ok delete item";
    // }

    // Close the statement
    
}


?>