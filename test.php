<?php
session_start();
?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <!-- Optional: Add custom CSS for the eye icon -->
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
        <a href="login.php" class="navbar-brand"> <img src="images/logo.png" alt=""> 
        <span class="navbar-text">getAgasobanuye</span></a>

        <ul class="navbar-nav">
          <li class="nav-item"> <a href="user-login.php">SignIn</a> </li>
        </ul>
      </nav>

      <div class="container">
        <div class="jumbotron">
          <h1>Create an account</h1>
          <p>It's free and always will be. </p><br>

          <form action="user.php" method="POST">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="First Name" name="fname" value="">
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="">
              </div>
            </div><br>
            <input type="text" class="form-control" placeholder="Mobile Number" name="phn" value="">
            <br>
            <input type="email" class="form-control" placeholder="Email Address" name="mail" value="">
            <br>
            
            <!-- Password field with show/hide toggle -->
            <div class="position-relative">
              <input type="password" id="password" class="form-control" placeholder="Password" name="pass" value="">
              <span class="eye-icon" id="togglePassword" onclick="togglePasswordVisibility()">
                <i class="fas fa-eye"></i> <!-- FontAwesome eye icon -->
              </span>
            </div>
            <br>

            <div class="form-group col-md-8">
              <label for="dob"> <br> Birthday </label>
              <div class="row">
                <div class="col">
                  <select class="form-control" name='date'>
                    <option selected>Date..</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    <option value='9'>9</option>
                    <option value='10'>10</option>
                    <option value='11'>11</option>
                    <option value='12'>12</option>
                    <option value='13'>13</option>
                    <option value='14'>14</option>
                    <option value='15'>15</option>
                    <option value='16'>16</option>
                    <option value='17'>17</option>
                    <option value='18'>18</option>
                    <option value='19'>19</option>
                    <option value='20'>20</option>
                    <option value='21'>21</option>
                    <option value='22'>22</option>
                    <option value='23'>23</option>
                    <option value='24'>24</option>
                    <option value='25'>25</option>
                    <option value='26'>26</option>
                    <option value='27'>27</option>
                    <option value='28'>28</option>
                    <option value='29'>29</option>
                    <option value='30'>30</option>
                    <option value='31'>31</option>
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name='month'>
                    <option selected>month...</option>
                    <option value='01'>Jan</option>
                    <option value='02'>Feb</option>
                    <option value='03'>Mar</option>
                    <option value='04'>Apr</option>
                    <option value='05'>May</option>
                    <option value='06'>Jun</option>
                    <option value='07'>Jul</option>
                    <option value='08'>Aug</option>
                    <option value='09'>Sep</option>
                    <option value='10'>Oct</option>
                    <option value='11'>Nov</option>
                    <option value='12'>Dec</option>
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name='year'>
                    <option selected>year...</option>
                    <option value='1980'>1980</option>
                    <option value='1981'>1981</option>
                    <option value='1982'>1982</option>
                    <option value='1983'>1983</option>
                    <option value='1984'>1984</option>
                    <option value='1985'>1985</option>
                    <option value='1986'>1986</option>
                    <option value='1987'>1987</option>
                    <option value='1988'>1988</option>
                    <option value='1989'>1989</option>
                    <option value='1990'>1990</option>
                    <option value='1991'>1991</option>
                    <option value='1992'>1992</option>
                    <option value='1993'>1993</option>
                    <option value='1994'>1994</option>
                    <option value='1995'>1995</option>
                    <option value='1996'>1996</option>
                    <option value='1997'>1997</option>
                    <option value='1998'>1998</option>
                    <option value='1999'>1999</option>
                    <option value='2000'>2000</option>
                    <option value='2001'>2001</option>
                    <option value='2002'>2002</option>
                    <option value='2003'>2003</option>
                    <option value='2004'>2004</option>
                    <option value='2005'>2005</option>
                    <option value='2006'>2006</option>
                    <option value='2007'>2007</option>
                    <option value='2008'>2008</option>
                    <option value='2009'>2009</option>
                    <option value='2010'>2010</option>
                    <option value='2011'>2011</option>
                    <option value='2012'>2012</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="signupbutton">
              <br><br>
              <button type="submit" class="btn btn-success btn-lg" name="sub" value="submit">Sign Up</button>
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
