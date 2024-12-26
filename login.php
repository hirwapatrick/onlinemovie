<?php
session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>getAgasobanuye</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
      /* General Body Styles */
body {
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
  height: 100px;
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
    margin-top: -20px;
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


/* Jumbotron Styles */
.jumbotron {
  position: inherit;
  margin-top: 20%;
}

.jumbotron h1 {
  color: black;
  font-weight: bold;
  text-align: center;
}

/* Features Section */
.features h2 {
  margin-top: 60px;
  text-align: center;
  font-size: 40px;
  font-weight: bold;
}

h2:after {
  width: 150px;
  height: 2px;
  background-color: orange;
  display: block;
  content: "";
  margin: 0 auto;
  margin-top: 50px;
}

.features p {
  margin-top: 20%;
  width: 70%;
  margin-left: 15%;
}

.arrange {
  text-align: justify;
}

/* Row Images */
.row img {
  height: 60px;
  width: 60px;
  margin-left: 40%;
  margin-bottom: 20%;
}

/* Container Background */
.container-fluid {
  background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url(images/back.jpg);
  height: 100vh;
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">

            <a href="login.php" class="navbar-brand"> <img src="images/logo.png" alt="logo"> 
            <span class="navbar-text">getAgasobanuye</span></a></a>

            <ul class="navbar-nav">
              <li class="nav-item"> <a href="user-login.php">SignIn</a> </li>

            </ul>

        </nav>

        <div class="container">
          <div class="jumbotron">
            <h1>Watch Anywhere, <br> Watch Anytime... </h1> <br>
            <a href="test.php" type="button" class="btn btn-danger btn-block" style="font-weight: bold;">Sign Up Now</a>
          </div>
        </div>
      </div>

      </header>

    <footer class="page-footer font-small blue">

      <div class="footer-copyright text-center py-3">© <script>document.write(new Date().getFullYear());</script> Copyright:
      <a href="mailto:hirwap96@gmail.com">hirwap96@gmail.com</a>
      </div>

    </footer>
  </body>
</html>
