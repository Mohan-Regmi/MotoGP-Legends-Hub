<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Bike - Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
    body { display: flex; min-height: 100vh; background: #f4f7fa; color: #333; }

    /* Sidebar */
    .sidebar {
      width: 250px; background: #1e293b; color: #fff; padding: 20px; position: fixed; height: 100%;
    }
    .sidebar h2 { font-size: 22px; font-weight: 600; margin-bottom: 30px; text-align: center; }
    .sidebar ul { list-style: none; }
    .sidebar ul li {
      padding: 12px; margin: 8px 0; border-radius: 8px; cursor: pointer; transition: 0.3s;
    }
    .sidebar ul li:hover { background: #334155; }

    /* Main Content */
    .main { margin-left: 250px; padding: 20px; width: 100%; }
    .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    .header h1 { font-size: 24px; font-weight: 600; }
    .logout-btn {
      padding:10px 20px; border:none; background:#1e293b; color:#fff;
      border-radius:8px; cursor:pointer; text-decoration:none;
    }

    /* Form Card */
    .form-card {
      background:#fff; padding:30px; border-radius:12px;
      max-width:600px; margin:auto; box-shadow:0 4px 10px rgba(0,0,0,0.1);
    }
    .form-card h2 {
      text-align:center; margin-bottom:20px; color:#1e293b;
    }
    label { display:block; margin-top:15px; margin-bottom:5px; font-weight:600; }
    input, select, textarea {
      width:100%; padding:12px; border:1px solid #ddd; border-radius:8px; margin-bottom:10px;
      font-size:15px; transition:0.3s;
    }
    input:focus, select:focus, textarea:focus {
      border-color:#1e293b; outline:none;
    }
    button {
      background:#1e293b; color:#fff; padding:14px 20px;
      border:none; border-radius:8px; font-size:16px; cursor:pointer;
      width:100%; margin-top:15px; transition:0.3s;
    }
    button:hover { background:#334155; }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <!-- Sidebar -->
<div class="sidebar">
  <h2>Admin Panel</h2>
  <ul>
    <li><a href="landingpage.php" style="color:inherit; text-decoration:none; display:block;">Dashboard</a></li>
    <li><a href="showBlog.php" style="color:inherit; text-decoration:none; display:block;">Blogs</a></li>
    <li style="background:#334155;"><a href="addBike.php" style="color:inherit; text-decoration:none; display:block;">Bikes</a></li>
    <li>
  <a href="../Home/home.php" id="logoutLink" style="color:inherit; text-decoration:none; display:block;">
    Logout
  </a>  </ul>
</div>


  <!-- Main Content -->
  <div class="main">
    <div class="header">
      <h1>Add New Bike</h1>
      <a href="../Home/home.php" class="logout-btn">Logout</a>
    </div>

    <!-- Form -->
    <div class="form-card">
      <h2>Bike Details</h2>
      <form action="../php_folder/add_bikes.php" method="POST" enctype="multipart/form-data">
        <label for="name">Bike Name</label>
        <input type="text" name="name" id="name" required>

        <label for="type">Type</label>
        <select name="type" id="type" required>
          <option value="sports">Sports</option>
          <option value="cruiser">Cruiser</option>
          <option value="naked">Naked</option>
        </select>

        <label for="mileage">Mileage (km/l)</label>
        <input type="text" name="mileage" id="mileage" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <label for="image">Bike Image</label>
        <input type="file" name="image" id="image" accept="image/*" required>

        <button type="submit">➕ Add Bike</button>
      </form>
    </div>
  </div>

  <footer style="text-align:center; padding:15px 0; background:#1e293b; color:white; position:fixed; width:100%; bottom:0;">
    NepalTechGroup - Tech Company
  </footer>
<script>
    document.getElementById("logoutLink").addEventListener("click", function(event) {
    const confirmed = confirm("Are you sure you want to logout?");
    if (!confirmed) {
      // Prevent navigation if user clicks Cancel
      event.preventDefault();
    }
  });

</script>
</body>
</html>
