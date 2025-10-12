<?php
// Enable full error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motogp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Trim and get POST data
    $name = trim($_POST['name']);
    $type = trim($_POST['type']);
    $mileage = trim($_POST['mileage']);
    $description = trim($_POST['description']);

    // Validate required fields
    if (empty($name) || empty($type) || empty($mileage) || empty($description)) {
        die("❌ Please fill in all required fields.");
    }

    // Check if image was uploaded
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 5 * 1024 * 1024; // 5 MB

        $imageTmp  = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];
        $imageSize = $_FILES['image']['size'];

        // Validate image type
        if (!in_array($imageType, $allowedTypes)) {
            die("❌ Invalid image type! Only JPG, PNG, GIF allowed.");
        }

        // Validate image size
        if ($imageSize > $maxSize) {
            die("❌ Image too large! Maximum 5MB allowed.");
        }

        // Read image binary data
        $imageData = file_get_contents($imageTmp);

        // Prepare insert statement with LONGBLOB
        $stmt = $conn->prepare("INSERT INTO bikes (name, image, description, type, mileage) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $null = null; // placeholder for blob
        $stmt->bind_param("sbsss", $name, $null, $description, $type, $mileage);
        $stmt->send_long_data(1, $imageData); // 1 = position of "image" parameter

        if ($stmt->execute()) {
            echo "✅ New bike added successfully!";
        } else {
            die("Database insert failed: " . $stmt->error);
        }

        $stmt->close();

    } else {
        die("❌ Please select an image to upload.");
    }
}

$conn->close();
?>
