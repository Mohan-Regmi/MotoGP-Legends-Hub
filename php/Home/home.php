<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MotoGP Home</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
    body { background:#0f172a; color:#fff; }

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

    /* Hero */
    .hero {
      height:80vh; display:flex; justify-content:center; align-items:center; text-align:center;
      background:url("https://m.media-amazon.com/images/I/818RsqgmYNL._UF1000,1000_QL80_.jpg") no-repeat center/cover;
      position:relative; color:#fff;
    }
    .hero::after {
      content:""; position:absolute; top:0; left:0; width:100%; height:100%;
      background:rgba(0,0,0,0.6);
    }
    .hero-content { position:relative; z-index:2; }
    .hero h2 { font-size:60px; font-weight:900; margin-bottom:20px; text-transform:uppercase; color:#e10600; }
    .hero p { font-size:20px; margin-bottom:30px; }
    .hero button {
      background:#e10600; border:none; padding:15px 35px; font-size:16px;
      border-radius:8px; cursor:pointer; transition:0.3s; font-weight:bold;
    }
    .hero button:hover { background:#fff; color:#e10600; }

    /* Section */
    .section { padding:70px 50px; text-align:center; }
    .section h2 { font-size:36px; margin-bottom:40px; color:#e10600; text-transform:uppercase; }

    /* Cards */
    .cards {
      display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:30px;
    }
    .card {
      background:rgba(255,255,255,0.05); backdrop-filter:blur(10px);
      border:1px solid rgba(224,6,6,0.3); border-radius:20px; overflow:hidden;
      box-shadow:0 8px 20px rgba(0,0,0,0.4); transition:0.4s; position:relative;
    }
    .card img { width:100%; height:220px; object-fit:cover; transition:0.3s; filter:brightness(0.8); }
    .card:hover img { filter:brightness(1); transform:scale(1.05); }
    .card h3 { margin:20px 0 10px; font-size:20px; color:#fff; }
    .card p { padding:0 20px 25px; font-size:14px; color:#ddd; line-height:1.6; }
    .card::before {
      content:""; position:absolute; top:0; left:0; width:100%; height:5px;
      background:#e10600;
    }
    .card:hover { transform:translateY(-10px) scale(1.03); box-shadow:0 20px 40px rgba(224,6,6,0.6); }

    /* Footer */
    footer {
      background:#0b1220; color:#fff; text-align:center; padding:25px;
      border-top:2px solid #e10600; margin-top:50px;
    }
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


<!-- Hero -->
<div class="hero">
  <div class="hero-content">
    <h2>Speed. Power. Passion.</h2>
    <p>Experience the thrill of MotoGP and legendary riders.</p>
    <button onclick="window.location.href='../Rider/rider.php'">Explore Riders</button>
  </div>
</div>

<!-- Riders -->
<div class="section">
  <h2>Top Riders</h2>
  <div class="cards">
    <div class="card">
      <img src="https://m.media-amazon.com/images/I/71ZK5+JYfZL._AC_UF894,1000_QL80_.jpg" alt="Marc Marquez"/>
      <h3>Marc Márquez</h3>
      <p>Six-time MotoGP World Champion. Known for his fearless racing style.</p>
    </div>
    <div class="card">
      <img src="https://m.media-amazon.com/images/I/81lfVdY82oL._AC_UF894,1000_QL80_.jpg" alt="Valentino Rossi"/>
      <h3>Valentino Rossi</h3>
      <p>The Doctor. MotoGP legend with an incredible career spanning two decades.</p>
    </div>
    <div class="card">
      <img src="https://m.media-amazon.com/images/I/71KXjq3PszL._AC_UF894,1000_QL80_.jpg" alt="Francesco Bagnaia"/>
      <h3>Francesco Bagnaia</h3>
      <p>Ducati rider and 2022 MotoGP World Champion, leading a new generation of racers.</p>
    </div>
  </div>
</div>

<!-- Bikes -->
<div class="section">
  <h2>Iconic Bikes</h2>
  <div class="cards">
    <div class="card">
      <img src="https://m.media-amazon.com/images/I/818RsqgmYNL._UF1000,1000_QL80_.jpg" alt="Ducati MotoGP"/>
      <h3>Ducati Desmosedici GP</h3>
      <p>Powerful MotoGP machine with unmatched acceleration and speed.</p>
    </div>
    <div class="card">
      <img src="https://m.media-amazon.com/images/I/71rZ7C8pR1L._AC_UF894,1000_QL80_.jpg" alt="Yamaha YZR-M1"/>
      <h3>Yamaha YZR-M1</h3>
      <p>Legendary bike that carried Rossi to multiple championships.</p>
    </div>
    <div class="card">
      <img src="https://m.media-amazon.com/images/I/81pXy+0TATL._AC_UF894,1000_QL80_.jpg" alt="Honda RC213V"/>
      <h3>Honda RC213V</h3>
      <p>Trusted by Marc Márquez to dominate the MotoGP grid for years.</p>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <p>&copy; 2025 Nepal MotoGP World. All Rights Reserved.</p>
</footer>

</body>
</html>
