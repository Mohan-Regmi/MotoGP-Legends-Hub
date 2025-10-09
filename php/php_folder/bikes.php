<?php

$servername = "localhost"; 
$username = "root";  // change if needed
$password = "";      // change if needed
$dbname = "motogp"; // change this to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, description, type, mileage FROM bikes";
$result = $conn->query($sql);
?>
