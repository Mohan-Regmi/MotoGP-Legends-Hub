<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Detail</title>
  <style>
    body{background:#0f172a;color:#fff;font-family:'Poppins',sans-serif;margin:0;}
    .container{width:90%;margin:auto;}

    /* Navbar */
    .navbar {width: 100%; background: #0f172a; padding: 15px 40px;
      display: flex; justify-content: space-between; align-items: center;
      position: sticky; top: 0; z-index: 1000;}
    .navbar .logo img {height: 50px; width: auto;}
    .navbar .nav-links {display: flex; align-items: center; gap: 25px;}
    .navbar .nav-links a {color: white; text-decoration: none; font-weight: 500; transition: color 0.3s ease;}
    .navbar .nav-links a:hover {color: rgb(224, 6, 6);}
    .login_btn {padding: 8px 18px; border: none; background: rgb(224, 6, 6); color: white; border-radius: 6px; cursor: pointer; transition: 0.3s;}
    .login_btn:hover {background: #ff1a1a;}

   
    .blog_detail{margin:40px 0;}
    .blog_detail img{width:100%;border-radius:15px;margin-bottom:20px;}
    .blog_detail h1{color:#e00606;margin-bottom:15px;}
    .blog_detail p{line-height:1.7;margin-bottom:15px;}
    .back_btn{display:inline-block;margin-top:20px;padding:8px 20px;background:#e00606;color:#fff;border-radius:5px;transition:0.3s;}
    .back_btn:hover{background:#fff;color:#e00606;}
  </style>
</head>
<body>
<div class="container">
  <nav>
    <a href=""><img src="../../assets/ducati logo.png" alt="Logo" width="120"/></a>
    <div>
      <a href="../Home/home.php" class="anchor_tag">Home</a>
      <a href="../Bike/bike.php" class="anchor_tag">Bike</a>
      <a href="blogs.php" class="anchor_tag">Blogs</a>
      <a href="../Rider/rider.php" class="anchor_tag">Rider</a>
      <a href="../contact/contact.php" class="anchor_tag">Contact Us</a>
      <a href="../login/login.php"><button class="login_btn">LogIn</button></a>
    </div>
  </nav>
</div>
    
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

</div>
<div class="container">
    
<div class="container blog_detail">
<?php
$conn = new mysqli("localhost", "root", "", "motogp");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM blogs WHERE id=$id AND status='published'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $blog = $result->fetch_assoc();
        echo '<img src="'.$blog['featured_image'].'" alt="">
              <h1>'.$blog['title'].'</h1>
              <p><em>Category: '.$blog['category'].' | Published: '.$blog['published_date'].' | Author: '.$blog['author'].'</em></p>
              <p>'.nl2br($blog['content']).'</p>
              <a href="blogs.php" class="back_btn">← Back to Blogs</a>';
    } else {
        echo "<p>Blog not found.</p>";
    }
} else {
    echo "<p>Invalid blog request.</p>";
}
$conn->close();
?>
</div>

</div>
</body>
</html>
