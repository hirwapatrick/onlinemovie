<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mid'])) {
    include 'dbh.php'; // Database connection file

    // Get the movie ID from the POST request
    $movie_id = intval($_POST['mid']);

    // Fetch the movie name based on the movie ID
    $stmt = $conn->prepare('SELECT name FROM movies WHERE mid = ?');
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<div class='alert alert-danger text-center'>No movie found with the provided ID.</div>";
        exit;
    }

    $movie_name = '';
    while ($row = $result->fetch_assoc()) {
        $movie_name = $row['name']; // Store the name of the movie
    }

    // Now fetch all movies with the same name, regardless of their ID
    $stmt = $conn->prepare('SELECT * FROM movies WHERE name = ?');
    $stmt->bind_param("s", $movie_name);
    $stmt->execute();
    $records = $stmt->get_result();

    // Check if any movies with the same name exist
    if ($records->num_rows === 0) {
        echo "<div class='alert alert-danger text-center'>No movies found with the provided name.</div>";
        exit;
    }

    // Start the page HTML output
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Movie Details</title>
        <link rel='stylesheet' href='movie.css'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
        <style>
            .row {
                display: flex;
                justify-content: space-between;
            }
            .col-md-6 {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .embed-responsive-16by9 {
                flex-grow: 1;
                position: relative;
                height: 100%;
                width: 100%;
            }
            .embed-responsive-item {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                margin-top: 4px;
            }
            .card-body {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
        </style>
    </head>
    <body class='bg-dark text-light'>
        <div class='container py-5'>
            <a href='homepage.php' class='btn btn-outline-warning mb-3'>Back to Home</a>";

    // Loop through each movie result
    while ($result = $records->fetch_assoc()) {
        $mname = $result['name'];
        $movie_id = $result['mid'];
        $current = $result['viewers'];
        $newcount = $current + 1;

        // Update the viewer count in the database
        $updateStmt = $conn->prepare("UPDATE movies SET viewers = ? WHERE mid = ?");
        $updateStmt->bind_param("ii", $newcount, $movie_id);
        $updateStmt->execute();

        // Update the user's movie record
        $nsql = "UPDATE user1 SET mid = ? WHERE id = ?";
        $userStmt = $conn->prepare($nsql);
        $userStmt->bind_param("ii", $movie_id, $_SESSION['id']);
        $userStmt->execute();

        // Get movie video and trailer URLs
        $url = htmlspecialchars($result['videopath']);
        $trailer_url = htmlspecialchars($result['trailer_url']);

        // Output the movie's HTML structure
        echo "
        <div class='row align-items-start mb-4'>
            <!-- Trailer Section -->
            <div class='col-md-6'>
                <div class='embed-responsive embed-responsive-16by9'>
                    <iframe class='embed-responsive-item' width='560' height='315' src='$trailer_url' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe>
                </div>
            </div>

            <!-- Movie Details Section -->
            <div class='col-md-6'>
                <div class='card bg-secondary text-light'>
                    <div class='card-body'>
                        <h1 class='card-title text-warning'>" . ucwords($mname) . "</h1>
                        <p><strong>Genre:</strong> " . ucwords($result['genre']) . "</p>
                        <p><strong>Release Year:</strong> " . $result['rdate'] . "</p>
                        <p><strong>Description:</strong> " . ucfirst($result['description']) . "</p>
                        <p><strong>Runtime:</strong> " . $result['runtime'] . " mins</p>
                        <p><strong>Views:</strong> " . $newcount . "</p>
                        <a href='$url' target='_blank' class='btn btn-primary btn-lg'>Access Movie</a>
                    </div>
                </div>
            </div>
        </div>";
    }

    // End the page HTML output
    echo "</div></body></html>";

    // Close database connections
    $stmt->close();
    $conn->close();
}
?>
