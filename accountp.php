<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>getAgasobanuye-Account</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <!-- Font Awesome for Eye Icon -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
      position: relative;
      width: 100%;
      height: 120px;
    }

    /* Logo Section */
    .navbar-brand {
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
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
        margin: 10px 0;
      }

      .nav-item a {
        font-size: 1.6rem;
      }
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
      padding-right: 40px; /* Space for the eye icon */
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

    /* Align Signup Button */
    .signupbutton {
      text-align: center;
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

    .form-group{
      display: flex;
    }
    .form-group input{
      height: 60px;
    }
    .form-group input::placeholder{
      font-weight: bold;
    }
    .form-group span{
      margin-top: 33px;
      margin-left: -30px;
    }
    /* Password Toggle */
    .password-toggle {
      position: relative;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #c5c6c7;
      font-size: 1.5rem;
      transition: color 0.3s ease;
    }

    .password-toggle:hover {
      color: #66fcf1;
    }

  </style>
</head>

<body>
  <header>
    <nav class="navbar">
      <a href="homepage.php" class="navbar-brand">
        <img src="images/logo.png" alt="">
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
      $newrecords = mysqli_query($conn, $sql);
      $result = mysqli_fetch_assoc($newrecords);

      echo "
        <form action='update.php' method='POST'>
          <br><br><input type='text' class='form-control' placeholder='Enter full name' name='fname' value='".ucwords($result['name'])."'><br>
          <input type='text' class='form-control' placeholder='Enter mobile number' name='phn' value='".$result['phone']."'><br>
          <label><b>Date of Birth : </b></label>
          <input type='date' class='form-control' placeholder='Enter Date of Birth' name='dob' value='".$result['DOB']."'><br>
          <div class='signupbutton'>
            <br><br>
            <button type='submit' class='btn btn-success' name='sub' value='submit'>Update Details</button>
          </div>
        </form>
        <br><br>
        <label><b>Email Id : </b>".$result['email']."</label>
        <br><br>
        <form action='updatep.php' method='POST'>
          <div class='form-group'>
            <input type='password' class='form-control' id='oldPassword' placeholder='Enter old password...' name='oldp'><br>
            <span class='password-toggle' id='toggleOldPassword'><i class='fas fa-eye'></i></span>
          </div>

          <div class='form-group'>
            <input type='password' class='form-control' id='newPassword' placeholder='Enter new password...' name='newp'><br>
            <span class='password-toggle' id='toggleNewPassword'><i class='fas fa-eye'></i></span>
          </div>

          <button type='submit' class='btn btn-success ' name='subpass' value='submit'>Update Password</button><br>
        </form>
      ";
    ?>
  </div>

  <script>
    // Toggle visibility for old password
    document.getElementById('toggleOldPassword').addEventListener('click', function () {
      const oldPassword = document.getElementById('oldPassword');
      const icon = this.querySelector('i');
      if (oldPassword.type === 'password') {
        oldPassword.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        oldPassword.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });

    // Toggle visibility for new password
    document.getElementById('toggleNewPassword').addEventListener('click', function () {
      const newPassword = document.getElementById('newPassword');
      const icon = this.querySelector('i');
      if (newPassword.type === 'password') {
        newPassword.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        newPassword.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  </script>
</body>
</html>
