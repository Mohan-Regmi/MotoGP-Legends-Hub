<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bikes</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #0f172a;
      color: #fff;
      line-height: 1.5;
    }

    /* Navbar Styling */
    .navbar {
      width: 100%;
      background: #0f172a;
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar .logo img {
      height: 50px;
      width: auto;
    }

    .navbar .nav-links {
      display: flex;
      align-items: center;
      gap: 25px;
    }

    .navbar .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .navbar .nav-links a:hover {
      color: rgb(224, 6, 6);
    }

    .login_btn {
      padding: 8px 18px;
      border: none;
      background: rgb(224, 6, 6);
      color: white;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .login_btn:hover {
      background: #ff1a1a;
    }

    .home_first_body_inner {
      text-align: center;
      padding: 40px 20px;
    }

    .home_first_body_inner h1 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .home_first_body_inner img {
      max-width: 650px;
      width: 100%;
      margin-top: 20px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    }

    .home_second_body {
      text-align: center;
      margin: 30px 0;
    }

    .home_second_body button {
      background: #e00606;
      border: none;
      padding: 12px 20px;
      margin: 10px;
      border-radius: 25px;
      color: #fff;
      cursor: pointer;
      font-size: 15px;
      font-weight: 600;
      transition: all 0.3s ease-in-out;
    }

    .home_second_body button:hover {
      background: #b80404;
      transform: translateY(-3px);
    }

    .home_forth_body {
      text-align: center;
      padding: 50px 20px;
    }

    .home_forth_body h1 {
      font-size: 2rem;
      margin-bottom: 40px;
    }

    /* Bike Card Styling */
    .card_container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 25px;
      padding: 20px;
    }

    .card1 {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      cursor: pointer;
      position: relative;
    }

    .card1:hover {
      transform: translateY(-12px) scale(1.03);
      box-shadow: 0 15px 35px rgba(224, 6, 6, 0.6);
    }

    .card_header img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-bottom: 2px solid rgba(255,255,255,0.1);
    }

    .card_body {
      padding: 20px;
    }

    .card_body p {
      margin: 5px 0;
      font-size: 15px;
      color: #cbd5e1;
    }

    .card_body p:first-child {
      font-size: 18px;
      font-weight: 600;
      color: #fff;
    }

    footer {
      background: #1e293b;
      color: #fff;
      text-align: center;
      padding: 25px;
      margin-top: 50px;
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
    <a href="../Home/home.php" class="anchor_tag">Home</a>
    <a href="../Bike/bike.php" class="anchor_tag">Bike</a>
    <a href="../Blogs/blogs.php" class="anchor_tag">Blogs</a>
    <a href="../Rider/rider.php" class="anchor_tag">Rider</a>
    <a href="../contact/contact.php" class="anchor_tag">Contact Us</a>
    <a href="../login/login.php"><button class="login_btn">LogIn</button></a>
  </div>
</nav>

<!-- Hero -->
<div class="home_first_body_inner">
  <h1>Two Wheels, Endless Possibilities</h1>
  <h1>Where the Road Meets <span style="color: #e00606">Adventure.</span></h1>
  <img src="../../assets/diavel.webp" alt="Hero Bike" />
</div>

<!-- Buttons -->


<!-- Popular Bikes -->
<div class="home_forth_body">
  <h1>Popular Bike <span style="color:#e00606">2024</span></h1>
  <div class="card_container">
    
    <?php
      // DB Connection
      $conn = new mysqli("localhost", "root", "", "motogp"); // 🔧 change db name

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Fetch bikes
      $sql = "SELECT id, name, description, type, mileage, image FROM bikes";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo '<div class="card1">
                      <div class="card_header">
                        <img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '">
                      </div>
                      <div class="card_body">
                        <p>' . htmlspecialchars($row['name']) . '</p>
                        <p>' . htmlspecialchars($row['description']) . '</p>
                        <p>Type: ' . htmlspecialchars($row['type']) . '</p>
                        <p>Mileage: ' . htmlspecialchars($row['mileage']) . ' km/l</p>
                      </div>
                    </div>';
          }
      } else {
          echo "<p>No bikes found.</p>";
      }

      $conn->close();
    ?>
  </div>
</div>

<!-- Footer -->
<footer>
  <p>© 2024 Ducati Company & Co. | Designed with ❤️ for Riders</p>
</footer>

</body>
</html>
