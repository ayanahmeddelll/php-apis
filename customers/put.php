<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require '../inc/dbcon.php';
global $conn;
// Database configuration
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'php-apis';

// // Create a connection to the database
// $conn = mysqli_connect($host, $username, $password, $database);

// // Check if the connection was successful
// if (!$conn) {
//     die('Database connection failed: ' . mysqli_connect_error());
// }

// Define your API endpoint
$endpoint = 'customers';

// Handle PUT request
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Check if the requested endpoint matches the defined endpoint
    // if ($_GET['endpoint'] === $endpoint) {
        // Get the input data from the request body
        $data = json_decode(file_get_contents('php://input'), true);
        
        // Validate the input data (you can add your own validation logic here)

        // Extract the values from the input data
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];

        // Update the customer in the database
        $query = "UPDATE customers SET name = '$name', email = '$email' , phone = '$phone' WHERE id = $id";

        $result = mysqli_query($conn, $query);
        // Check if the update was successful
        if ($result) {
            echo json_encode(['message' => 'Customer updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update customer']);
        }
    // } else {
    //     // Invalid endpoint
    //     echo json_encode(['message' => 'Invalid endpoint']);
    // }
} else {
    // Invalid request method
    echo json_encode(['message' => 'Invalid request method']);
}

// Close the database connection
mysqli_close($conn);
?>
