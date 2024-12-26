<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>getAgasobanuye-Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
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
  flex-direction: row;
}

.nav-item {
  margin-right: 20px;
}

.nav-item a {
  text-decoration: none;
  color: #c5c6c7;
  font-size: 2rem;
  padding: 8px 18px;
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
    .position-relative {
      position: relative;
    }

    .jumbotron {
  position: inherit;
  margin-top: 7%;

}

.jumbotron h1 {
  color: black;
  font-weight: bold;

}





.container-fluid {
  background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(images/back.jpg);
  height: 130vh;
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
}



.signupbutton {

  text-align: center;
}

.row img {
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
        <a href="homepage.php" class="navbar-brand"><img src="images/logo.png" alt="">
        <span class="navbar-text">getAgasobanuye</span></a>
        <ul class="navbar-nav">
          <li class="nav-item"><a href="homepage.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
      </nav>

      <div class="container">
        <div class="jumbotron">
          <h1>Enter the Movie Details</h1>
          <form action="admin-control.php" method="POST" enctype="multipart/form-data">
            <input type="text" class="form-control" placeholder="Movie Name" name="mname" required><br>
            <input type="text" class="form-control" placeholder="Year of Release" name="release" required><br>
            <input type="text" class="form-control" placeholder="Genre" name="genre" required><br>
            <input type="number" class="form-control" placeholder="Runtime in minutes" name="rtime"><br>
            <input type="text" class="form-control" placeholder="Description..." name="desc" required><br>

            <div class="row">
              <div class="col">
                <table>
                  <tr>
                    <td><label for=""><b>Upload Image:</b></label></td>
                    <td>
                      <div>
                        <input type="hidden" name="size" value="100000">
                        <input type="file" name="image" accept="image/*" required>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="col">
                <table>
                  <tr>
                    <td><label for=""><b>Upload Movie URL:</b></label></td>
                    <td>
                      <div>
                        <input type="url" name="video_url" class="form-control" placeholder="Main video URL" required>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><label for=""><b>Upload Trailer URL:</b></label></td>
                    <td>
                      <div>
                        <input type="url" name="trailer_url" class="form-control" placeholder="Trailer video URL" required>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div><br>

            <div class="signupbutton">
              <input type="submit" class="btn btn-success btn-lg" name="upload" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">
      © <script>document.write(new Date().getFullYear());</script> Copyright:
      <a href="mailto:hirwap96@gmail.com">hirwap96@gmail.com</a>
    </div>
  </footer>
</body>
</html>
