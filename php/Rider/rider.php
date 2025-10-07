<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riders 2024</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:"Poppins", sans-serif; }
    body { background:#0f172a; color:#fff; }

    /* Navbar */
    .navbar {
      display:flex;
      justify-content:space-between;
      align-items:center;
      padding:15px 40px;
      background:#0f172a;
      position: sticky;
      top:0;
      z-index:1000;
    }
    .navbar .logo img { height:50px; }
    .navbar .nav-links { display:flex; gap:25px; align-items:center; }
    .navbar .nav-links a { color:#fff; text-decoration:none; font-weight:500; transition:0.3s; }
    .navbar .nav-links a:hover { color:#e00606; }
    .login_btn { padding:8px 18px; border:none; background:#e00606; border-radius:6px; cursor:pointer; transition:0.3s; }
    .login_btn:hover { background:#ff1a1a; }

    /* Hero */
    .hero_rider {
      background: linear-gradient(to right, rgba(15,23,42,0.9), rgba(15,23,42,0.9)), url('../../assets/rider-hero.jpg') no-repeat center/cover;
      padding:80px 40px;
      text-align:center;
      border-bottom:3px solid #e00606;
    }
    .hero_rider h1 { font-size:3rem; margin-bottom:20px; }
    .hero_rider h1 span { color:#e00606; }
    .hero_rider p { font-size:1.2rem; color:#cbd5e1; }

    /* Rider Grid Section */
    .rider_section {
      padding:50px 20px;
    }
    .rider_section h2 { text-align:center; font-size:2.5rem; margin-bottom:50px; color:#fff; }
    .rider_grid {
      display:grid;
      grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
      gap:30px;
      padding:0 40px;
    }
    .rider_card {
      background:rgba(255,255,255,0.05);
      border-radius:20px;
      overflow:hidden;
      text-align:center;
      padding:20px;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .rider_card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 30px rgba(224,6,6,0.6);
    }
    .rider_card img {
      width:150px;
      height:150px;
      border-radius:50%;
      object-fit:cover;
      border:3px solid #e00606;
      margin-bottom:15px;
    }
    .rider_card h3 { color:#fff; margin-bottom:10px; }
    .rider_card p { color:#cbd5e1; font-size:14px; margin-bottom:5px; }

    /* Stats Section */
    .stats_section {
      background:#1e293b;
      padding:50px 40px;
      display:flex;
      justify-content:space-around;
      flex-wrap:wrap;
      gap:30px;
      text-align:center;
    }
    .stat_box {
      flex:1 1 200px;
      background:rgba(224,6,6,0.1);
      border-radius:16px;
      padding:30px;
      transition:0.3s;
    }
    .stat_box:hover { background:rgba(224,6,6,0.2); }
    .stat_box h3 { font-size:2rem; color:#fff; margin-bottom:10px; }
    .stat_box p { font-size:1rem; color:#cbd5e1; }

    /* Footer */
    footer {
      background:#0f172a;
      color:#fff;
      text-align:center;
      padding:25px;
      margin-top:50px;
      border-top:3px solid #e00606;
    }

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="logo">
    <a href=""><img src="../../assets/ducati logo.png" alt="Logo" /></a>
  </div>
  <div class="nav-links">
    <a href="../Home/home.php">Home</a>
    <a href="../Bike/bike.php">Bike</a>
    <a href="">Accessories</a>
    <a href="../Blogs/blogs.php">Blogs</a>
    <a href="../Rider/rider.php">Rider</a>
    <a href="../contact/contact.php">Contact Us</a>
    <a href="../login/login.php"><button class="login_btn">LogIn</button></a>
  </div>
</nav>

<!-- Hero -->
<section class="hero_rider">
  <h1>Meet the Top <span>Riders</span></h1>
  <p>The fastest, boldest, and most skilled riders of the 2024 season.</p>
</section>

<!-- Rider Cards -->
<section class="rider_section">
  <h2>Star Riders 2024</h2>
  <div class="rider_grid">
    <?php
      // DB connection
      $conn = new mysqli("localhost", "root", "", "motogp");

      if($conn->connect_error){ die("Connection failed: ".$conn->connect_error); }

      $sql = "SELECT id,name,country,team,image FROM riders ORDER BY id ASC";
      $result = $conn->query($sql);

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          echo '<div class="rider_card">
                  <img src="'.phpspecialchars($row['image']).'" alt="'.phpspecialchars($row['name']).'">
                  <h3>'.phpspecialchars($row['name']).'</h3>
                  <p>Team: '.phpspecialchars($row['team']).'</p>
                  <p>Country: '.phpspecialchars($row['country']).'</p>
                </div>';
        }
      } else {
        echo "<p style='color:#fff;'>No riders found.</p>";
      }

      $conn->close();
    ?>
  </div>
</section>

<!-- Stats Section -->
<section class="stats_section">
  <div class="stat_box">
    <h3>12</h3>
    <p>Grand Prix Wins</p>
  </div>
  <div class="stat_box">
    <h3>5</h3>
    <p>Championships</p>
  </div>
  <div class="stat_box">
    <h3>3</h3>
    <p>Rookie Awards</p>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>© 2024 Ducati Company & Co. | Designed with ❤️ for Riders</p>
</footer>

</body>
</html>
