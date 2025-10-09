<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "motogp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$title = $_POST['title'];
$content = $_POST['content'];
$category = $_POST['category'];
$author = $_POST['author'];
$status = $_POST['status'];

// Handle image upload
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$featured_image = "";
if (!empty($_FILES["featured_image"]["name"])) {
    $image_name = basename($_FILES["featured_image"]["name"]);
    $target_file = $target_dir . time() . "_" . $image_name;
    if (move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file)) {
        $featured_image = $target_file;
    }
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO blogs (title, content, category, author, status, featured_image) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $title, $content, $category, $author, $status, $featured_image);

if ($stmt->execute()) {
    echo "<script>alert('✅ Blog added successfully!'); window.location.href='../Admin/addBlogs.php';</script>";
} else {
    echo "<script>alert('❌ Error adding blog: " . $conn->error . "'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
