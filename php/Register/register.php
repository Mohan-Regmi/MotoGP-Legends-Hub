<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background: #ffffff;
        color: #000000;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }

      .container {
        width: 100%;
        max-width: 400px;
        padding: 20px;
      }

      .main_form {
        background: #fff;
        border: 2px solid #e10600;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      }

      h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #e10600;
        font-size: 28px;
        font-weight: bold;
      }

      label {
        margin: 10px 0 5px;
        font-weight: 600;
        display: block;
        color: #000;
      }

      input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        outline: none;
        font-size: 14px;
        transition: all 0.3s ease;
      }

      input:focus {
        border-color: #e10600;
        box-shadow: 0 0 5px rgba(225, 6, 0, 0.5);
      }

      .btn {
        background: #e10600;
        color: #fff;
        border: none;
        padding: 12px;
        margin: 15px 0;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: 0.3s ease;
        width: 100%;
      }

      .btn:hover {
        background: #b30500;
        transform: scale(1.02);
      }

      a {
        color: #000;
        text-decoration: none;
        font-size: 14px;
        display: block;
        text-align: center;
        margin-top: 10px;
      }

      a:hover {
        color: #e10600;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="main_form">
        <h1>Register</h1>
        <form action="../php_folder/register.php" method="POST" onsubmit="return validateForm()">
          <label for="name">Full Name</label>
          <input type="text" name="name" required />

          <label for="username">Username</label>
          <input type="text" name="username" required />

          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />

          <label for="confirm_password">Retype Password</label>
          <input type="password" id="confirm_password" name="confirm_password" required />

          <button type="submit" class="btn">Register</button>
        </form>

        <a href="../login/login.php">Already have an account? Login</a>
      </div>
    </div>

    <script>
      function validateForm() {
        const pass = document.getElementById("password").value;
        const confirmPass = document.getElementById("confirm_password").value;

        if (pass !== confirmPass) {
          alert("Passwords do not match!");
          return false;
        }
        return true;
      }
    </script>
  </body>
</html>
