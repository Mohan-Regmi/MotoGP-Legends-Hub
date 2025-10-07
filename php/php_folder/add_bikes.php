<?php
// Database connection
$servername = "localhost";
$username = "root"; // change if different
$password = "";     // change if you set one
$dbname = "motogp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $mileage = $_POST['mileage'];
    $description = $_POST['description'];

    // Handle image upload
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $imageName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $imageName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    // Insert into DB
    $sql = "INSERT INTO bikes (name, image, description, type, mileage) 
            VALUES ('$name', '$imageName', '$description', '$type', '$mileage')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New bike added successfully!'); window.location.href='add_bike.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
