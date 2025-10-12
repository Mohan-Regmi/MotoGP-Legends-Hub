<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "motogp");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $author = !empty($_POST['author']) ? trim($_POST['author']) : 'Admin';
    $status = !empty($_POST['status']) ? trim($_POST['status']) : 'published';
    $content = trim($_POST['content']);

    if (empty($title) || empty($category)) die("❌ Title and category are required.");

    if (!empty($_FILES['featured_image']['name']) && $_FILES['featured_image']['error'] === 0) {

        $allowedTypes = ['image/jpeg','image/png','image/gif'];
        $maxSize = 5*1024*1024;

        $imageTmp = $_FILES['featured_image']['tmp_name'];
        $imageType = $_FILES['featured_image']['type'];
        $imageSize = $_FILES['featured_image']['size'];

        if (!in_array($imageType,$allowedTypes)) die("❌ Invalid image type.");
        if ($imageSize > $maxSize) die("❌ Image too large.");

        $imageData = file_get_contents($imageTmp);

        $stmt = $conn->prepare("INSERT INTO blogs (title, category, author, status, content, featured_image) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) die("Prepare failed: " . $conn->error);

$null = NULL; // placeholder for blob
$stmt->bind_param("sssssb", $title, $category, $author, $status, $content, $null);

// Send blob data (index 5 = featured_image, zero-based)
$stmt->send_long_data(5, $imageData);

if ($stmt->execute()) {
    echo "✅ Blog added successfully!";
} else {
    die("Database insert failed: " . $stmt->error);
}

$stmt->close();

    } else {
        die("❌ Please select a featured image.");
    }
}

$conn->close();
?>
