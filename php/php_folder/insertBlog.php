<?php
// Enable full error reporting
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
    $title    = trim($_POST['title']);
    $content  = trim($_POST['content']);
    $category = trim($_POST['category']);
    $author   = trim($_POST['author']);
    $status   = trim($_POST['status']);

    // Validate required fields
    if (empty($title) || empty($content) || empty($category) || empty($author) || empty($status)) {
        die("❌ Please fill in all required fields.");
    }

    // Handle image upload
    if (!empty($_FILES['featured_image']['name']) && $_FILES['featured_image']['error'] === 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 5 * 1024 * 1024; // 5 MB

        $imageTmp  = $_FILES['featured_image']['tmp_name'];
        $imageType = $_FILES['featured_image']['type'];
        $imageSize = $_FILES['featured_image']['size'];

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

        // Insert into database using prepared statement with LONGBLOB
        $stmt = $conn->prepare("INSERT INTO blogs (title, content, category, author, status, featured_image) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $null = null; // placeholder for blob
        $stmt->bind_param("sssssb", $title, $content, $category, $author, $status, $null);
        $stmt->send_long_data(5, $imageData); // 5 = position of "featured_image" parameter

        if ($stmt->execute()) {
            echo "<script>alert('✅ Blog added successfully!'); window.location.href='../Admin/showBlog.php';</script>";
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
