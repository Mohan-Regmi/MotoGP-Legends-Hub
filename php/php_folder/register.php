<?php
// Database connection
$servername = "localhost";
$db_username = "root";   // your MySQL username
$db_password = "";       // your MySQL password
$dbname = "motogp";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

// Prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Insert into database
$sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration successful! You can now log in.');
          window.location.href='../login/login.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
