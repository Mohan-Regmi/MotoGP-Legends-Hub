<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "motogp"; // your database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert into contact table
$sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "<script>alert('Message sent successfully!'); window.location.href='../contact/contact.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
