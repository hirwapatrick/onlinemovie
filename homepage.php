<?php
session_start();
require_once 'dbh.php'; // Ensure connection is valid and secure

// Check if user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit();
}

// Sanitize session variables
$userId = intval($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>getAgasobanuye - Homepage</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="vendors/jquery-3.7.1.min_2.js"></script>

  <style>
    body {
      font-family: 'Roboto', Arial, sans-serif;
      background-color: #1f2833;
      /* Softer dark blue-gray */
      color: #c5c6c7;
      /* Soft gray for text */
      margin: 0;
      padding: 10px;
    }



/* Navbar General Styles */
.navbar {
  background-color: #0b0c10;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  padding: 10px 20px;
  border-radius: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative; /* Fix the navbar to the top */
  top: 0; /* Ensure it stays at the top */
  left: 0; /* Ensure it stretches across the full width */
  width: 100%; /* Full width of the screen */
  z-index: 1000; /* Ensure the navbar stays on top of other elements */
}


/* Logo Section */
.navbar-logo {
  display: flex;
  align-items: center;
}

.navbar-logo img.logo {
  height: 60px;
  margin-right: 10px;
}

.navbar-text {
  font-size: 1.8rem;
  font-weight: bold;
  color: #66fcf1;
}

/* Navbar Links */
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

.nav-item a:hover {
  color: #66fcf1;
}

.nav-item a:hover::after {
  width: 100%;
}

/* Mobile Toggler Icon */
.navbar-toggler {
  border-color: #66fcf1;
}

.navbar-toggler-icon {
  background-color: #66fcf1;
  width: 25px;
  height: 3px;
  display: block;
  margin: 5px auto;
}

    .container-fluid {
      height: 30vh;
      background: linear-gradient(to bottom, black, pink);
      background-size: cover;
      background-position: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #f0a500;
      text-align: center;
      border-radius: 10px;
    }

    .container-fluid h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .jumbotron {
      background-color: #1e1e1e;
      color: #ffffff;
      border-radius: 8px;
      padding: 20px;
      margin-top: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
    }

    .jumbotron h2 {
      font-family: Arial, sans-serif;
      margin-bottom: 15px;
      line-height: 1.4;
      color: white;
      position: relative;
      padding: 10px 5px;
      border-radius: 20px;
    }

    .jumbotron h2::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 110px;
      height: 5px;
      border-radius: 10px;
      background-color: white;
    }

    .jumbotron h3 {
      font-family: Arial, sans-serif;
      margin-bottom: 15px;
      line-height: 1.4;
      color: white;
      position: relative;
      padding: 10px 5px;
      border-radius: 20px;

    }

    .jumbotron h3::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 5px;
      border-radius: 10px;
      background-color: white;

    }

    .jumbotron h4 {
      font-family: Arial, sans-serif;
      margin-bottom: 15px;
      line-height: 1.4;
      color: white;
      position: relative;
      padding: 10px 5px;
      border-radius: 20px;

    }

    .jumbotron h4::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 210px;
      height: 5px;
      border-radius: 10px;
      background-color: white;

    }



    /* General Styling for Search Form */
    .search-form {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 15px;
      background-color: #1e1e1e;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .search-form:hover {
      box-shadow: 0 6px 12px rgba(0, 128, 0, 0.4);
      transform: translateY(-3px);
    }

    /* Dropdown Styling */
    .custom-select {
      padding: 4px 5px;
      border: 1px solid #444;
      border-radius: 8px;
      background-color: #2c2c2c;
      color: #f8f9fa;
      font-size: 1rem;
      transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-select:focus {
      border-color: #66fcf1;
      box-shadow: 0 0 8px rgba(102, 252, 241, 0.8);
      outline: none;
    }

    /* Input Field Styling */
    .search-input {
      flex: 1;
      padding: 10px 15px;
      border: 1px solid #444;
      border-radius: 8px;
      background-color: #2c2c2c;
      color: #f8f9fa;
      font-size: 1rem;
      transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .search-input:focus {
      border-color: #66fcf1;
      box-shadow: 0 0 8px rgba(102, 252, 241, 0.8);
      outline: none;
    }

    /* Submit Button Styling */
    .search-btn {
      padding: 10px 20px;
      font-size: 1rem;
      background-color: #28a745;
      border: none;
      border-radius: 8px;
      color: #ffffff;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .search-btn:hover {
      background-color: #218838;
      transform: scale(1.05);
    }



    .comments-section {
      background-color: #2c2c2c;
      border-radius: 12px;
      padding: 25px;
      color: #f8f9fa;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .comments-section h3 {
      font-size: 1.8rem;
      font-weight: 500;
      margin-bottom: 20px;
      text-align: center;
      color: #f0f0f0;
      position: relative;
    }

    .comments-section h3::after {
      content: "";
      display: block;
      width: 80px;
      height: 4px;
      margin: 10px auto 0;
      background-color: #f0a500;
      border-radius: 2px;
    }

    .comment-box {
      background-color: #0f0f0f;
      border: 1px solid #444;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .comment-box:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .comment-box h5 {
      color: #f0a500;
      font-size: 1.4rem;
      margin-bottom: 5px;
    }

    .comment-box .text-muted {
      font-size: 0.85rem;
      color: #ffffff;
      margin-bottom: 10px;
    }

    .comment-box p {
      font-size: 1rem;
      color: black;
      font-weight: bold;
      line-height: 1.6;
    }

    .comment-box button {
      margin-top: 10px;
      padding: 5px 10px;
      font-size: 0.9rem;
      color: #ffffff;
      background-color: #f0a500;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .comment-box button:hover {
      background-color: #e59400;
    }

    /* Comment Form Styling */
    .comment-form {
      background-color: #1e1e1e;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transition: box-shadow 0.3s ease, transform 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .comment-form:hover {
      box-shadow: 0 6px 12px rgba(240, 165, 0, 0.5);
      transform: translateY(-5px);
    }

    /* Input and Textarea Styling */
    .comment-form input,
    .comment-form textarea {
      width: 100%;
      padding: 12px 15px;
      margin-top: 10px;
      border: 1px solid #444;
      border-radius: 8px;
      background-color: #2c2c2c;
      color: white;
      font-size: 17px;
      transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .comment-form input:focus,
    .comment-form textarea:focus {
      border: 1px solid #f0a500;
      box-shadow: 0 0 8px rgba(240, 165, 0, 0.8);
      outline: none;
    }

    /* Placeholder Text Color */
    .comment-form input::placeholder,
    .comment-form textarea::placeholder {
      color: #bbbbbb;
    }

    /* Submit Button Styling */
    .comment-form button {
      margin-top: 20px;
      padding: 12px 30px;
      font-size: 1rem;
      color: #ffffff;
      background-color: #f0a500;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s ease;
    }

    .comment-form button:hover {
      border-radius: 10px;
      background-color: #e59400;
      transform: scale(1.02);

    }

    /* Heading Styling */
    h3 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #ffffff;
      text-align: center;
      margin-bottom: 15px;
      position: relative;
      padding: 10px;
      display: inline-block;
      border-radius: 10px;
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

    @media (max-width: 768px) {
      .navbar-text {
        font-size: 22px;
      }

      .container-fluid h1 {
        font-size: 2.2rem;
      }

      .jumbotron h2 {
        font-size: 1.5rem;
      }

      .search-form {
        flex-direction: column;
        gap: 10px;
      }

      .search-input,
      .custom-select,
      .search-btn {
        width: 100%;
      }


    }

    /* Scrollbar styling for webkit browsers (Chrome, Edge, Safari) */
::-webkit-scrollbar {
    width: 15px; /* Width of the scrollbar */
    height: 15px; /* Height for horizontal scrollbar */
}

::-webkit-scrollbar-track {
    background: #1e1e1e; /* Background of the scrollbar track */
    border-radius: 10px; /* Rounded edges for track */
}

::-webkit-scrollbar-thumb {
    background: #007bff; /* Color of the scrollbar thumb */
    border-radius: 10px; /* Rounded edges for thumb */
    border: 2px solid #1e1e1e; /* Border around the thumb */
}

::-webkit-scrollbar-thumb:hover {
    background: #0056b3; /* Thumb color on hover */
}

/* Styling for Firefox (uses scrollbar-width and scrollbar-color) */
body {
    scrollbar-width: thin; /* Thin scrollbar */
    scrollbar-color: #007bff #1e1e1e; /* Thumb and track colors */
}
@media (max-width: 768px) {
  .navbar {
    flex-direction: column;  /* Stack navbar items vertically */
    padding: 15px 10px;  /* Adjust padding */
  }

  .navbar-logo {
    margin-bottom: 15px; /* Space between logo and navbar links */
  }

  .navbar-logo img.logo {
    height: 50px; /* Reduce logo size for smaller screens */
  }

  .navbar-text {
    font-size: 1.5rem; /* Reduce font size for navbar text */
    margin-bottom: 10px; /* Add space below text */
  }

  .nav-item {
    margin-right: 0;  /* Remove space between navbar items */
    margin-bottom: 10px;  /* Space between items */
  }

  .nav-item a {
    font-size: 1.5rem;  /* Adjust font size for links */
    padding: 10px;  /* Add more padding for easy tap */
  }

  /* Ensure the navbar toggler is visible on small screens */
  .navbar-toggler {
    display: block;  /* Make sure toggler is visible */
  }
  /* Hero Section */
  .container-fluid h1 {
    font-size: 2rem;
    padding-top: 60px;
  }

  /* Jumbotron */
  .jumbotron {
    padding: 15px;
    text-align: left;
  }
  .jumbotron h2, 
  .jumbotron h3, 
  .jumbotron h4 {
    font-size: 1.2rem;
  }
  .jumbotron h2.h{
    display: flex;
    flex-direction: column;
  }
  .jumbotron h2.h::after{
    background: none;
  }
  
  

  /* Search Form */
  .search-form {
    flex-direction: column;
    gap: 10px;
  }
  .search-input,
  .custom-select,
  .search-btn {
    width: 100%;
  }

  /* Comments Section */
  .comments-section {
    padding: 15px;
  }
  .comment-box {
    padding: 15px;
  }
  .comment-box h5 {
    font-size: 1.2rem;
  }

  /* Footer */
  footer {
    font-size: 12px;
  }
}

@media (max-width: 480px) {
  .navbar-text {
    font-size: 1.2rem; /* Reduce navbar text size even more */
  }

  .navbar-logo img.logo {
    height: 40px; /* Even smaller logo for very small screens */
  }

  .nav-item a {
    font-size: 1.2rem; /* Smaller links for mobile */
    padding: 12px; /* Increase padding for mobile usability */
  }
  .container-fluid h1 {
    font-size: 1.8rem;
  }
  .jumbotron h2,
  .jumbotron h3,
  .jumbotron h4 {
    font-size: 1rem;
  }
  .comment-box h5 {
    font-size: 1rem;
  }
}


  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md">
      <!-- Logo Section -->
      <div class="navbar-logo">
        <a href="#">
          <img src="images/logo.png" alt="Logo" class="logo">
        </a>
        <span class="navbar-text">getAgasobanuye</span>
      </div>

      <!-- Navbar Links -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <?php
          // Admin-specific links
          if ($userId == 1) {
            echo "<li class='nav-item'><a href='admin.php' class='nav-link'>Add Movie</a></li>";
          }
          // General user links
          echo "<li class='nav-item'><a href='account.php' class='nav-link'>Account</a></li>
              <li class='nav-item'><a href='logout.php' class='nav-link'>Logout</a></li>";
          ?>
        </ul>
      </div>
    </nav>


    <div class="container-fluid">
      <br><br><br>
      <?php
      // Fetch user details
      $stmt = $conn->prepare("SELECT * FROM user1 WHERE id = ?");
      $stmt->bind_param("i", $userId);
      $stmt->execute();
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();

      echo "<h1 style='color:black;position:sticky;'>WELCOME</h1>
            <b style='color: black;font-size: 25px'><i>" . htmlspecialchars(ucwords($user['name'])) . "!</i></b>";
      ?>
    </div>
  </header>

  <section>
    <div class="jumbotron" style="margin-top:15px; padding-top:30px; padding-bottom:30px;">
      <div class="row">
        <div class="col">
        <form action="movie.php" method="POST">
            <?php
            // Prepare and execute the query to fetch the movie name
            $stmt = $conn->prepare("SELECT name, mid FROM movies WHERE mid IN (SELECT mid FROM user1 WHERE id = ?)");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $movieResult = $stmt->get_result();
            $movie = $movieResult->fetch_assoc();
            $recentMovie = $movie ? htmlspecialchars(ucwords($movie['name'])) : "No Movie";
            $movieId = $movie ? $movie['mid'] : null;
            ?>
            <h2 style="color:white; font-size:30px;" class='h'>Recent:
              <input type="submit" name="submit" class="btn btn-success" style="display:inline; width:200px; margin-left:20px; margin-right:20px;"
                value="<?php echo $recentMovie; ?>" />
            </h2>
            <?php if ($movieId): ?>
              <input type="hidden" name="mid" value="<?php echo $movieId; ?>" />
            <?php endif; ?>
        </form>

        </div>

        <div class="col">
          <form action="search.php" method="POST" class="search-form">
            <select name="option" class="custom-select" required>
              <option selected disabled>Search By</option>
              <option value="name">Name</option>
              <option value="genre">Genre</option>
              <option value="rdate">Release Year</option>
            </select>
            <input
              type="text"
              placeholder="Enter search term..."
              name="textoption"
              class="search-input"
              required>
            <input
              type="submit"
              name="submit"
              class="search-btn btn btn-success"
              value="Search" />
          </form>
        </div>

      </div>
    </div>

    <div class="jumbotron">
      <h2 style="margin-top:0px; padding-top:0px;">Latest Updated</h2>
      <div class="row">
        <?php include 'latest-fetcher.php'; ?>
      </div>
    </div>

    <div class="jumbotron">
      <h2>All Movies</h2>
      <?php include 'fetcher.php'; ?>
    </div>
    <section>
      <div class="jumbotron">
        <h3 class="text-center md-4">Comments</h3>
        <form action="save_comment.php" method="POST" class="comment-form p-4 rounded shadow-sm">
          <div class="form-group">
            <label for="name" class="font-weight-bold">Your Name:</label>
            <input type="text" id="name" name="name" class="form-control border-secondary" placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label for="email" class="font-weight-bold">Your Email:</label>
            <input type="email" id="email" name="email" class="form-control border-secondary" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="comment" class="font-weight-bold">Your Comment:</label>
            <textarea id="comment" name="comment" class="form-control border-secondary" rows="5" placeholder="Write your comment here..." required></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block font-weight-bold">Add Comment</button>
        </form>

        <h4 class="mt-5">Recent Comments:</h4>
      <div class="comments-section mt-4">
    <?php
    include 'dbh.php';
    // Fetch comments ordered by newest first
    $commentQuery = "SELECT * FROM comments ORDER BY id DESC";
    $commentResult = $conn->query($commentQuery);

    if ($commentResult && $commentResult->num_rows > 0) {
        while ($comment = $commentResult->fetch_assoc()) {
            echo "<div class='comment-box p-3 mb-3 rounded shadow-sm' style='background-color: #343a40; color: #f8f9fa;'>";
            echo "<h5 class='font-weight-bold text-info'>" . htmlspecialchars($comment['name']) . "</h5>";
            echo "<p class='text-muted'><small>" . htmlspecialchars($comment['email']) . " • " . date('F j, Y, g:i a', strtotime($comment['created_at'])) . "</small></p>";
            echo "<p>" . nl2br(htmlspecialchars($comment['comment'])) . "</p>";

            // Display delete button for admins (userId == 1)
            if (isset($userId) && $userId == 1) {
                echo "<form action='delete_comment.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='comment_id' value='" . intval($comment['id']) . "'>
                    <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                </form>";
            }

            echo "</div>";
        }
    } else {
        echo "<p class='text-muted text-center'>No comments yet. Be the first to comment!</p>";
    }
    ?>
    </div>
  </section>
  <!-- Bootstrap JS, Popper.js, and your custom jQuery for toggler functionality -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Ensure navbar toggler works on mobile devices
    $(document).ready(function(){
      $('.navbar-toggler').click(function() {
        $('.navbar-collapse').toggleClass('show');
      });
    });
  </script>

    <footer class="page-footer font-small blue">
      <div class="footer-copyright text-center py-3">
        © <script>
          document.write(new Date().getFullYear());
        </script> Copyright:
        <a href="mailto:hirwap96@gmail.com">hirwap96@gmail.com</a>
      </div>
    </footer>
</body>
</html>