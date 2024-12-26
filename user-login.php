<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>getAgasobanuye-Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <!-- Optional: Add custom CSS for the eye icon -->
  <style>
body{
  font-family: sans-serif;
  height: 100%;
}
/* General Navbar Styles */
.navbar {
  background-color: #0b0c10;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  padding: 10px 20px;
  border-radius: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative; /* Fix the navbar to the top */
  width: 100%;
  height: 120px;
}

/* Logo Section */
.navbar-brand {
  display: flex;
  align-items: center;
}

.navbar-brand  img {
  height: 100px;
  margin-right: 10px;
}

.navbar-brand .navbar-text {
  font-size: 1.8rem;
  font-weight: bold;
  color: #66fcf1;
}

/* Navbar Link */
.navbar-nav {
  display: flex;
  align-items: center;
}

.nav-item {
  margin-right: 20px;
}

.nav-item a {
  text-decoration: none;
  color: #c5c6c7;
  font-size: 2rem;
  padding: 8px 15px;
  position: relative;
  transition: color 0.3s ease;
}

.nav-item a:hover {
  color: #66fcf1;
}
.nav-item a::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 3px;
  border-radius: 10px;
  background-color: #66fcf1;
  transition: width 0.3s ease;
}

.nav-item a:hover::after {
  width: 100%;
}


/* Media Query for Small Screens */
@media screen and (max-width: 768px) {
  .navbar {
    flex-direction: column;
    align-items: flex-start;
    padding: 20px;
  }

  .navbar-brand {
    margin-top: -25px;
    justify-content: flex-start;
  }

  .navbar-items {
    flex-direction: column;
    width: 100%;
  }

  .nav-item {
    margin: 10px 0; /* Add spacing between items */
  }

  .nav-item a {
    font-size: 1.6rem; /* Adjust font size for smaller screens */
  }
}
    .eye-icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }

.jumbotron{
  position: sticky;
  margin-top: 7%;

}
.loginbutton{
  text-align: center;
  align-items: center;
}
.jumbotron h1{
  color: black;
  font-weight: bold;

}
.container-fluid{
  background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0,0,0,0.7)),url(images/back.jpg);
  height: 100vh;
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
}

.row img{
  height: 60px;
  width: 60px;
  margin-left: 40%;
  margin-bottom: 20%;
}

footer {
  background-color: #1e1e1e;
  color: #ffffff;
  padding: 10px;
  text-align: center;
  font-size: 14px;
  font-weight: bold;
  border-radius: 10px;
}

footer a {
  color: #f0a500;
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}

  </style>
</head>

<body>
  <header>
    <div class="container-fluid">
      <nav class="navbar">
        <a href="login.php" class="navbar-brand"> <img src="images/logo.png" alt=""> 
        <span class="navbar-text">getAgasobunuye</span></a>

        <ul class="navbar-nav">
          <li class="nav-item"> <a href="test.php">SignUp</a> </li>
        </ul>
      </nav>

      <div class="container">
        <div class="jumbotron">
          <h1>Login to your account</h1><br>
          <form action="Plogin.php" method="POST">
            <input type="email" class="form-control" placeholder="Username/ Email Address" name="mail" value="">
            <br>
            
            <!-- Password input with toggle functionality -->
            <div class="position-relative">
              <input type="password" id="password" class="form-control" placeholder="Password" name="pass" value="">
              <span class="eye-icon" id="togglePassword" onclick="togglePasswordVisibility()">
                <i class="fas fa-eye"></i> <!-- FontAwesome eye icon -->
              </span>
            </div>
            <br><br>

            <div class="loginbutton">
              <button type="submit" class="btn btn-success btn-lg" name="login">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© <script>document.write(new Date().getFullYear());</script> Copyright:
      <a href="mailto:hirwap96@gmail.com">hirwap96@gmail.com</a>
    </div>
  </footer>

  <!-- Add FontAwesome CDN for eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- JavaScript to toggle password visibility -->
  <script>
    function togglePasswordVisibility() {
      var passwordField = document.getElementById("password");
      var eyeIcon = document.getElementById("togglePassword");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';  // Change icon to 'eye-slash'
      } else {
        passwordField.type = "password";
        eyeIcon.innerHTML = '<i class="fas fa-eye"></i>';  // Change icon to 'eye'
      }
    }
  </script>
</body>
</html>
