<?php
$host = "localhost";
$username = "root";
$password ="";
$dbname = "php-apis";


$conn = mysqli_connect($host, $username, $password, $dbname);


if(!$conn){

    die("connection falied:" . mysqli_connect_error());
}

// Assuming you receive the data through POST request
$name = $_POST['name'];
$email = $_POST['email'];
$phone  = $_POST['phone'];

// Prepare the SQL statement
$sql = "INSERT INTO  customers (name,email,phone) VALUES ('$name', '$email','$phone')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
