<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #f4f7fa;
      color: #333;
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background: #1e293b;
      color: #fff;
      padding: 20px;
      position: fixed;
      height: 100%;
    }

    .sidebar h2 {
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 30px;
      text-align: center;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      padding: 12px;
      margin: 8px 0;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .sidebar ul li:hover {
      background: #334155;
    }

    /* Main Content */
    .main {
      margin-left: 250px;
      padding: 20px;
      width: 100%;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header h1 {
      font-size: 24px;
      font-weight: 600;
    }

    .card-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background: #fff;
      padding: 20px;
      border-radius: 16px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      text-align: center;
      transition: 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #555;
    }

    .card p {
      font-size: 26px;
      font-weight: 600;
      color: #1e293b;
    }

    /* Charts Layout */
    .charts {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 20px;
    }

    .chart-container {
      background: #fff;
      padding: 20px;
      border-radius: 16px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      text-align: center;
    }

    #pieChart {
      width: 300px !important;
      height: 300px !important;
      margin: auto;
      display: block;
    }

    #barChart {
      width: 100% !important;
      height: 300px !important;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
  <h2>Admin Panel</h2>
  <ul>
    <li><a href="landingpage.php" style="color:inherit; text-decoration:none; display:block;">Dashboard</a></li>
    <li><a href="showBlog.php" style="color:inherit; text-decoration:none; display:block;">Blogs</a></li>
    <li><a href="addBike.php" style="color:inherit; text-decoration:none; display:block;">Bikes</a></li>
    <li>
  <a href="../Home/home.php" id="logoutLink" style="color:inherit; text-decoration:none; display:block;">
    Logout
  </a>
</li>
  </ul>
</div>


  <!-- Main Content -->
  <div class="main">
    <div class="header">
      <h1>Dashboard Overview</h1>
      <button style="padding:10px 20px; border:none; background:#1e293b; color:#fff; border-radius:8px; cursor:pointer;">
        <a href="../Home/home.php" style="text-decoration: none;color: white;">
            Logout
        </a>
         
      </button>
    </div>

    <!-- Cards -->
    <div class="card-container">
      <div class="card">
        <h3>Total Users</h3>
        <p>10,340</p>
      </div>
      <div class="card">
        <h3>Active Users</h3>
        <p>2,540</p>
      </div>
      <div class="card">
        <h3>Total Bikes</h3>
        <p>2,430</p>
      </div>
      <div class="card">
        <h3>Rides Today</h3>
        <p>120</p>
      </div>
    </div>

    <!-- Charts -->
    <div class="charts">
      <!-- Pie Chart -->
      <div class="chart-container">
        <h3 style="margin-bottom:15px;">User Distribution</h3>
        <canvas id="pieChart"></canvas>
      </div>

      <!-- Bar Chart -->
      <div class="chart-container">
        <h3 style="margin-bottom:15px;">Bike Usage (Monthly)</h3>
        <canvas id="barChart"></canvas>
      </div>
    </div>
  </div>

  <script>
    // Pie Chart (Users)
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
      type: 'pie',
      data: {
        labels: ['Active Users', 'Inactive Users', 'New Users'],
        datasets: [{
          data: [8540, 3800, 1200],
          backgroundColor: ['#3b82f6','#f97316','#10b981'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: false,
        plugins: {
          legend: {
            position: 'bottom',
          }
        }
      }
    });

    // Bar Chart (Bike Usage)
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
          label: 'Bikes Rented',
          data: [120, 200, 150, 300, 250, 400, 350],
          backgroundColor: '#3b82f6'
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        },
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

  document.getElementById("logoutLink").addEventListener("click", function(event) {
    const confirmed = confirm("Are you sure you want to logout?");
    if (!confirmed) {
      // Prevent navigation if user clicks Cancel
      event.preventDefault();
    }
  });


  </script>
  <!-- Footer -->
  <footer style="text-align:center; padding:15px 0; background:#1e293b; color:white; position:fixed; width:100%; bottom:0;">
    NepalTechGroup - Tech Company
  </footer>

</body>
</html>
