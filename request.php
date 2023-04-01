<?php
//configure your database settings here
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "wood4life";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// Collect the data that was sent by the form
$name = $_POST['name'];
$email = $_POST['email'];
$command = $_POST['command'];

// Build the SQL query
$sql = "INSERT INTO orders (name, email, command) VALUES (?, ?, ?)";

// prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $command);

// Execute the query
if ($stmt->execute()) 
{
    echo "Message sent successfully!";
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

header("Location: index.html");
exit;

?>