<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ducati Blogs</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
    body{background:#0f172a;color:#fff;}
    a{text-decoration:none;color:inherit;}
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

    /* Hero Blog */
    .middle_blog_part{display:flex;flex-wrap:wrap;gap:30px;margin-top:40px;}
    .left_blog{flex:2;}
    .blog_big_card{border:2px solid #e00606;border-radius:20px;overflow:hidden;box-shadow:0 0 20px rgba(224,6,6,0.4);transition:0.4s;}
    .blog_big_card:hover{transform:translateY(-10px);box-shadow:0 20px 40px rgba(224,6,6,0.8);}
    .blog_big_card img{width:100%;height:300px;object-fit:cover;}
    .blog_big_card span{color:#e00606;font-weight:bold;display:block;margin:15px;text-transform:uppercase;}
    .blog_big_card h2{padding:0 15px 20px 15px;}

    .right_blog{flex:1;background:#1b2536;padding:20px;border-radius:20px;border:2px solid #e00606;}
    .right_blog h1{color:#e00606;margin-bottom:20px;}
    .first_blog{margin-bottom:15px;padding:10px;border-left:3px solid #e00606;background:#0f172a;border-radius:8px;transition:0.3s;}
    .first_blog:hover{background:#e00606;color:#fff;border-left-color:#fff;}

    /* Blog Cards */
    .blog_card_container{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:25px;margin-top:40px;}
    .card1{background:#1b2536;border:2px solid #e00606;border-radius:20px;overflow:hidden;box-shadow:0 0 20px rgba(224,6,6,0.4);transition:0.4s;}
    .card1:hover{transform:scale(1.05);box-shadow:0 15px 40px rgba(224,6,6,0.8);}
    .card_header img{width:100%;height:150px;object-fit:cover;filter:brightness(0.7);transition:0.3s;}
    .card1:hover .card_header img{filter:brightness(1);}
    .card_body{padding:15px;}
    .home_card_p{color:#e00606;font-weight:bold;text-transform:uppercase;margin-bottom:10px;}
    .home_card_h2{font-size:1.2rem;line-height:1.4;}
    .read_more_btn{display:inline-block;margin-top:10px;padding:6px 15px;background:#e00606;color:#fff;border-radius:5px;transition:0.3s;}
    .read_more_btn:hover{background:#fff;color:#e00606;}
  </style>
</head>
<body>

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

<?php
$conn = new mysqli("localhost", "root", "", "motogp");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Big blog
$sql_big = "SELECT * FROM blogs WHERE status='published' ORDER BY published_date DESC LIMIT 1";
$result_big = $conn->query($sql_big);
if ($result_big->num_rows > 0) {
    $big = $result_big->fetch_assoc();
    echo '<div class="container middle_blog_part">
            <div class="left_blog">
              <div class="blog_big_card">
                <a href="blog_detail.php?id='.$big['id'].'">
                  <img src="'.$big['featured_image'].'" alt="">
                  <span>'.$big['category'].'</span>
                  <h2>'.$big['title'].'</h2>
                </a>
              </div>
            </div>
            <div class="right_blog">
              <h1>Popular Blogs</h1>';
    $sql_popular = "SELECT * FROM blogs WHERE status='published' ORDER BY RAND() LIMIT 3";
    $result_popular = $conn->query($sql_popular);
    while($pop = $result_popular->fetch_assoc()) {
        echo '<div class="first_blog">
                <a href="blog_detail.php?id='.$pop['id'].'">
                  <h4>'.$pop['title'].'</h4>
                  <p>'.substr(strip_tags($pop['content']),0,100).'...</p>
                </a>
              </div>';
    }
    echo '</div></div>';
}

// Blog cards
echo '<div class="container blog_card_container">';
$sql_cards = "SELECT * FROM blogs WHERE status='published' ORDER BY published_date DESC LIMIT 6";
$result_cards = $conn->query($sql_cards);
if ($result_cards->num_rows > 0) {
    while($row = $result_cards->fetch_assoc()) {
        echo '<div class="card1">
                <div class="card_header">
                  <img src="'.$row['featured_image'].'" alt="">
                </div>
                <div class="card_body">
                  <p class="home_card_p">'.$row['category'].'</p>
                  <h4 class="home_card_h2">'.$row['title'].'</h4>
                  <a href="blog_detail.php?id='.$row['id'].'" class="read_more_btn">Read More</a>
                </div>
              </div>';
    }
} else { echo "<p>No blogs available</p>"; }
echo '</div>';
$conn->close();
?>

</body>
</html>
