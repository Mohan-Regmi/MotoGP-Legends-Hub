<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
    body { background: #0f172a; color: #fff; line-height: 1.5; }

    /* Navbar */
    .navbar {
      width: 100%; background: #0f172a; padding: 15px 40px;
      display: flex; justify-content: space-between; align-items: center;
      position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 15px rgba(0,0,0,0.4);
    }
    .navbar .logo img { height: 50px; width: auto; }
    .navbar .nav-links { display: flex; align-items: center; gap: 25px; }
    .navbar .nav-links a { color: white; text-decoration: none; font-weight: 500; transition: 0.3s; }
    .navbar .nav-links a:hover { color: #e10600; }
    .login_btn { padding: 8px 18px; border: none; background: #e10600; color: white; border-radius: 6px; cursor: pointer; transition: 0.3s; }
    .login_btn:hover { background: #ff1a1a; }

    /* Hero Banner */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(15,23,42,0.9)),
                  url('https://m.media-amazon.com/images/I/81e6kIKXjYL._AC_UF1000,1000_QL80_.jpg') no-repeat center center/cover;
      height: 350px; display: flex; justify-content: center; align-items: center; text-align: center;
    }
    .hero h1 { font-size: 48px; color: #fff; text-transform: uppercase; letter-spacing: 2px; }

    /* Contact Section */
    .contact-section {
      max-width: 700px; margin: -80px auto 50px; 
      background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(12px);
      padding: 40px; border-radius: 20px; 
      box-shadow: 0 10px 30px rgba(224,6,6,0.4); 
      animation: fadeUp 1s ease forwards;
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .contact-section h2 { text-align: center; color: #e10600; margin-bottom: 30px; font-size: 32px; }

    .contact-section form { display: flex; flex-direction: column; }
    .contact-section label { margin-bottom: 5px; font-weight: 500; color: #cbd5e1; }

    .contact-section input, .contact-section textarea {
      padding: 12px; margin-bottom: 20px; border-radius: 8px; border: none;
      font-size: 16px; background: rgba(255,255,255,0.1); color: #fff;
      transition: 0.3s; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.2);
    }
    .contact-section input:focus, .contact-section textarea:focus {
      outline: none; box-shadow: inset 0 0 0 2px #e10600, 0 0 10px #e10600;
    }

    .contact-section button {
      background: #e10600; color: #fff; padding: 15px;
      border: none; border-radius: 10px; font-size: 18px; font-weight: bold;
      cursor: pointer; transition: 0.3s; letter-spacing: 1px;
    }
    .contact-section button:hover {
      background: #ff1a1a; transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(224,6,6,0.6);
    }

    /* Footer */
    footer {
      background: #1e293b; color: #fff; text-align: center;
      padding: 25px; margin-top: 50px; font-size: 14px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="logo">
    <a href="../Home/home.php"><img src="../../assets/ducati logo.png" alt="Ducati Logo" /></a>
  </div>
  <div class="nav-links">
    <a href="../Home/home.php">Home</a>
    <a href="../Bike/bike.php">Bike</a>
    <a href="">Accessories</a>
    <a href="../Blogs/blogs.php">Blogs</a>
    <a href="../Rider/rider.php">Rider</a>
    <a href="../Contact/contact.php" style="color:#e10600">Contact Us</a>
    <a href="../login/login.php"><button class="login_btn">LogIn</button></a>
  </div>
</nav>

<!-- Hero -->
<div class="hero">
  <h1>Contact Us</h1>
</div>

<!-- Contact Form -->
<div class="contact-section">
  <h2>Get In Touch</h2>
  <form action="../php_folder/contact.php" method="POST">
    <label for="name">Full Name</label>
    <input type="text" name="name" id="name" placeholder="Your full name" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Your email address" required>

    <label for="message">Message</label>
    <textarea name="message" id="message" rows="5" placeholder="Write your message here..." required></textarea>

    <button type="submit">Send Message</button>
  </form>
</div>

<!-- Footer -->
<footer>
  <p>&copy; 2025 MotoGP World. All Rights Reserved. | Designed with ❤️ for Riders</p>
</footer>

</body>
</html>
