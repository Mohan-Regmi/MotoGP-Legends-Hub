<?php
session_start();

// Database connection
$servername = "localhost"; 
$db_username = "root";     // your MySQL username
$db_password = "";         // your MySQL password
$dbname = "motogp";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get input from form
$username = $_POST['username'];
$password = $_POST['password'];

// Prevent SQL injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Query database (assuming table is named `login` with columns `username`, `password`)
$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Success
    $_SESSION['username'] = $username;
    header("Location: ../Admin/landingpage.php"); // redirect after login
    exit();
} else {
    // Fail
    echo "<script>alert('Invalid Username or Password'); window.location.href='../login/login.php';</script>";
}

$conn->close();
?>
