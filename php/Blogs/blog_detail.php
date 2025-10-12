<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Detail</title>
  <style>
    body {background:#0f172a; color:#fff; font-family:'Poppins',sans-serif; margin:0; padding:0;}
    .container {width:90%; margin:auto; padding:20px;}

    /* Navbar */
    .navbar {width:100%; background:#0f172a; padding:15px 40px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; z-index:1000;}
    .navbar .logo img {height:50px; width:auto;}
    .navbar .nav-links {display:flex; align-items:center; gap:25px;}
    .navbar .nav-links a {color:white; text-decoration:none; font-weight:500; transition:0.3s;}
    .navbar .nav-links a:hover {color:rgb(224,6,6);}
    .login_btn {padding:8px 18px; border:none; background:rgb(224,6,6); color:#fff; border-radius:6px; cursor:pointer; transition:0.3s;}
    .login_btn:hover {background:#ff1a1a;}

    /* Blog Detail */
    .blog_detail {margin-top:40px;}
    .blog_detail img {width:100%; border-radius:15px; margin-bottom:20px; object-fit:cover; max-height:400px;}
    .blog_detail h1 {color:#e00606; margin-bottom:15px;}
    .blog_detail p {line-height:1.7; margin-bottom:15px;}
    .back_btn {display:inline-block; margin-top:20px; padding:8px 20px; background:#e00606; color:#fff; border-radius:5px; text-decoration:none; transition:0.3s;}
    .back_btn:hover {background:#fff; color:#e00606;}
  </style>
</head>
<body>
  <div class="container">
    <!-- Navbar -->
    <nav class="navbar">
      <div class="logo">
        <a href="../Home/home.php"><img src="../../assets/ducati logo.png" alt="Logo" /></a>
      </div>
      <div class="nav-links">
        <a href="../Home/home.php">Home</a>
        <a href="../Bike/bike.php">Bike</a>
        <a href="../Blogs/blogs.php">Blogs</a>
        <a href="../Rider/rider.php">Rider</a>
        <a href="../contact/contact.php">Contact Us</a>
        <a href="../login/login.php"><button class="login_btn">LogIn</button></a>
      </div>
    </nav>

    <div class="blog_detail">
      <?php
      // Database connection
      $conn = new mysqli("localhost", "root", "", "motogp");
      if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

      // Get blog id from URL
      if (isset($_GET['id'])) {
          $id = intval($_GET['id']);
          $stmt = $conn->prepare("SELECT * FROM blogs WHERE id=? AND status='published'");
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
              $blog = $result->fetch_assoc();

              // Convert LONGBLOB to base64
              if (!empty($blog['featured_image'])) {
                  $imageType = !empty($blog['image_type']) ? $blog['image_type'] : 'image/jpeg';
                  $base64Image = base64_encode($blog['featured_image']);
                  $imageSrc = "data:$imageType;base64,$base64Image";
              } else {
                  $imageSrc = "../../assets/default-blog.png"; // fallback image
              }

              echo '<img src="'.$imageSrc.'" alt="Blog Image">';
              echo '<h1>'.htmlspecialchars($blog['title']).'</h1>';
              echo '<p><em>Category: '.htmlspecialchars($blog['category']).' | Author: '.htmlspecialchars($blog['author']).'</em></p>';
              echo '<p>'.nl2br(htmlspecialchars($blog['content'])).'</p>';
              echo '<a href="blogs.php" class="back_btn">← Back to Blogs</a>';
          } else {
              echo "<p>Blog not found.</p>";
          }

          $stmt->close();
      } else {
          echo "<p>Invalid blog request.</p>";
      }

      $conn->close();
      ?>
    </div>
  </div>
</body>
</html>
