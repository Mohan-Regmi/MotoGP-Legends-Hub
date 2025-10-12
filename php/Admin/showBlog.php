<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "motogp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all blogs
$sql = "SELECT * FROM blogs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Blogs</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif;}
    body {display:flex; min-height:100vh; background:#f4f7fa;}
    
    /* Sidebar */
    .sidebar {width:250px; background:#1e293b; color:#fff; padding:20px; position:fixed; height:100%;}
    .sidebar h2 {text-align:center; margin-bottom:30px;}
    .sidebar ul {list-style:none;}
    .sidebar ul li {padding:12px; margin:8px 0; border-radius:8px; transition:0.3s;}
    .sidebar ul li:hover {background:#334155;}
    .sidebar ul li a {color:inherit; text-decoration:none; display:block;}
    
    /* Main content */
    .main {margin-left:250px; padding:20px; width:100%;}
    .header {display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;}
    .header h1 {font-size:24px; font-weight:600;}
    .btn {padding:10px 20px; border:none; background:#1e293b; color:#fff; border-radius:8px; cursor:pointer; text-decoration:none;}
    .btn:hover {background:#334155;}

    /* Table styling */
    table {width:100%; border-collapse:collapse; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.05);}
    th, td {padding:15px; text-align:left; border-bottom:1px solid #ddd;}
    th {background:#e10600; color:#fff;}
    td img {width:100px; height:60px; object-fit:cover; border-radius:6px;}
    a.action-btn {padding:5px 10px; background:#1e293b; color:#fff; border-radius:6px; text-decoration:none; margin-right:5px;}
    a.action-btn:hover {background:#334155;}
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="landingpage.php">Dashboard</a></li>
      <li><a href="showBlog.php">Blogs</a></li>
      <li><a href="addBike.php">Bikes</a></li>
      <li><a href="../Home/home.php" id="logoutLink">Logout</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="header">
      <h1>Manage Blogs</h1>
      <a href="insertBlogs.php" class="btn">Add New Blog</a>
    </div>

    <!-- Blogs Table -->
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Category</th>
          <th>Featured Image</th>
          <th>Author</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                // Handle image display
                if (!empty($row['featured_image'])) {
                    // If it’s a BLOB, encode to base64
                    $imgSrc = 'data:image/jpeg;base64,' . base64_encode($row['featured_image']);
                } else {
                    // Default or missing image
                    $imgSrc = '../../assets/no-image.png';
                }

                echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.htmlspecialchars($row['title']).'</td>
                    <td>'.htmlspecialchars($row['category']).'</td>
                    <td><img src="'.$imgSrc.'" alt="Image"></td>
                    <td>'.htmlspecialchars($row['author']).'</td>
                    <td>'.htmlspecialchars($row['status']).'</td>
                </tr>';
            }
        } else {
            echo '<tr><td colspan="6" style="text-align:center;">No blogs found.</td></tr>';
        }
        ?>
      </tbody>
    </table>
  </div>

  <footer style="text-align:center; padding:15px 0; background:#1e293b; color:white; position:fixed; width:100%; bottom:0;">
    NepalTechGroup - Tech Company
  </footer>

  <script>
    document.getElementById("logoutLink").addEventListener("click", function(event) {
      const confirmed = confirm("Are you sure you want to logout?");
      if (!confirmed) event.preventDefault();
    });
  </script>

</body>
</html>

<?php $conn->close(); ?>
