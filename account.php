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

  /* Form Container */
  .container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #1e1e1e;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    color: #c5c6c7;
  }

  /* Form Labels */
  label {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
  }

  /* Input Fields */
  .form-control {
    background-color: #0b0c10;
    color: #c5c6c7;
    border: 1px solid #66fcf1;
    border-radius: 5px;
    padding: 10px;
    font-size: 1rem;
    margin-bottom: 15px;
    transition: border-color 0.3s;
  }

  .form-control:focus {
    border-color: #45a29e;
    outline: none;
    box-shadow: 0 0 5px #45a29e;
  }

  /* Submit Button */
  .btn-success {
    background-color: #66fcf1;
    color: #0b0c10;
    border: none;
    padding: 10px 20px;
    font-size: 1.2rem;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-success:hover {
    background-color: #45a29e;
    color: #ffffff;
  }

  /* Link Styling */
  a {
    color: #66fcf1;
    text-decoration: none;
    font-size: 1rem;
  }

  a:hover {
    text-decoration: underline;
  }

  /* Align Signup Button */
  .signupbutton {
    text-align: center;
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

         <nav class="navbar">
             <a href="homepage.php" class="navbar-brand"> <img src="images/logo.png" alt=""> 
             <span class="navbar-text">getAgasobanuye</span></a>

             <ul class="navbar-nav">

               <li class="nav-item"> <a href="homepage.php" class="nav-link">Home</a> </li>

               <li class="nav-item"> <a href="logout.php" class="nav-link">Logout</a> </li>
             </ul>


         </nav>

      </header>

      <div class="container">
        <?php
              include 'dbh.php';
              $id = $_SESSION['id'];
              $sql = "SELECT * FROM user1 WHERE id = $id ";
              $newrecords = mysqli_query($conn,$sql);
              $result = mysqli_fetch_assoc($newrecords);

      echo"  <form  action='update.php' method='POST'>

          <br><br><input type='text' class='form-control' placeholder='Enter full name' name='fname' value='".ucwords($result['name'])."'>
          <br>
          <input type='text' class='form-control' placeholder='Enter mobile number' name='phn' value='".$result['phone']."'>
          <br>
          <label><b>Date of Birth : </b></label>
          <input type='date' class='from-control' placeholder='Enter Date of Birth' name='dob' value='".$result['DOB']."'><br>

              <div class='signupbutton'>
                <br><br>
                <button type='submit' class='btn btn-success' name='sub' value='submit'>Update Details</button>

              </div>
              </form>


              <br><br>
              <label><b>Email Id : </b>".$result['email']."</label>
              <br><br>
              <a href='accountp.php'>Change Password</a>



              ";
         ?>




      </div>

    </body>

  </html>
