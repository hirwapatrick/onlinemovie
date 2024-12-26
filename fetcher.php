<?php
include 'dbh.php';

// Fetch all movies, including genre and upload time, ordered by genre and name
$movieQuery = "SELECT mid, name, genre, imgpath, uploaded_at FROM movies ORDER BY genre ASC, name ASC";
$movieResult = mysqli_query($conn, $movieQuery);

if (mysqli_num_rows($movieResult) > 0) {
    $currentGenre = ''; // Initialize the current genre variable
    echo "<div class='movie-container'>"; // Start the movie container

    while ($fetchr = mysqli_fetch_assoc($movieResult)) {
        // Check if the genre has changed
        if ($fetchr['genre'] !== $currentGenre) {
            // If the genre has changed, close the previous section and display the new genre heading
            if ($currentGenre !== '') {
                echo "</div>"; // Close the previous genre section
            }

            $currentGenre = $fetchr['genre']; // Update the current genre
            echo "<h2 class='genre-heading'>" . htmlspecialchars(ucwords($currentGenre)) . "</h2>"; // Display the genre as a heading
            echo "<div class='genre-section-container inline-flex'>"; // Start container for each genre
            echo "<button class='scroll-btn left' data-genre='$currentGenre'><img src='images/left.png' width='30' height='30'></button>"; // Left scroll button
            echo "<button class='scroll-btn right' data-genre='$currentGenre'><img src='images/right.png' width='30' height='30'></button>"; // Right scroll button
            echo "<div class='genre-section' id='genre-" . htmlspecialchars($currentGenre) . "'>"; // Start movie list
        }

        // Time elapsed logic
        $uploadedAt = new DateTime($fetchr['uploaded_at']);
        $now = new DateTime();
        $interval = $uploadedAt->diff($now);

        if ($interval->y > 0) {
            $timeElapsed = $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
        } elseif ($interval->m > 0) {
            $timeElapsed = $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
        } elseif ($interval->d > 0) {
            $timeElapsed = $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
        } elseif ($interval->h > 0) {
            $timeElapsed = $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
        } elseif ($interval->i > 0) {
            $timeElapsed = $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
        } else {
            $timeElapsed = "Just now";
        }

        // Create the movie card for each movie
        echo "<div class='movie-card'>";
        echo "<img src='" . htmlspecialchars($fetchr['imgpath']) . "' alt='" . htmlspecialchars($fetchr['name']) . "' class='movie-img' />";
        echo "<div class='movie-info'>";
        echo "<p class='upload-time'>$timeElapsed</p>";
        echo "<form action='movie.php' method='POST'>";
        echo "<input type='submit' name='submit' class='btn btn-outline-info movie-btn' value='" . htmlspecialchars(ucwords($fetchr['name'])) . "' />";
        echo "<input type='hidden' name='mid' value='" . htmlspecialchars($fetchr['mid']) . "' />";
        echo "</form>";
        echo "</div>"; // End movie-info
        echo "</div>"; // End movie-card
    }

    echo "</div>"; // End genre section
    echo "</div>"; // End genre-section-container
    echo "</div>"; // End movie-container
}
mysqli_close($conn);
?>

<!-- Styles -->
<style>
/* General Body Styles */
body {
    background-color: #121212;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

/* Movie Container */
.movie-container {
    padding: 20px;
    margin-top: 30px;
}

/* Genre Heading */
.genre-heading {
    font-size: 2rem;
    color: #ff7f50;
    margin-top: 30px;
    margin-bottom: 15px;
    text-transform: uppercase;
}

/* Genre Section Container */
.genre-section-container {
    position: relative;
    margin-bottom: 40px;
}

/* Scroll Buttons */
.scroll-btn {
    position: absolute;
    top: 10px;
    background-color: rgb(255, 255, 255);
    color: white;
    border: none;
    border-radius: 50%;
    padding: 10px;
    cursor: pointer;
    width: 60px;
    height: 60px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.scroll-btn.left {
    right: 90px;
    transform: translateY(-50%);
}

.scroll-btn.right {
    right: 10px;
    transform: translateY(-50%);
}

.scroll-btn:hover {
    background-color: #007bff;
    transform: scale(1.1);
}

/* Genre Section */
.genre-section {
    display: flex;
    overflow-x: hidden;
    gap: -10px;
    padding: 10px 0;
    scroll-snap-type: x mandatory;
}

/* Movie Card */
.movie-card {
    min-width: 300px;
    max-width: 300px;
    height: 400px;
    background-color: #000;
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    margin-top: 100px;
    box-shadow: 0 6px 15px pink;
}

/* Movie Image */
.movie-img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 8px;
}

/* Movie Info */
.movie-info {
    margin-top: 10px;
}

.upload-time {
    font-size: 0.9rem;
    color: #888;
    margin-bottom: 10px;
}

/* Movie Button */
.movie-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
}

.movie-btn:hover {
    background-color: #0056b3;
}

</style>

<!-- Script -->
<script src="vendors/jquery-3.7.1.min_2.js"></script>
<script>
$(document).ready(function() {
    $('.scroll-btn.left').click(function() {
        var genre = $(this).data('genre');
        $('#genre-' + genre).animate({ scrollLeft: '-=250' }, 500);
    });

    $('.scroll-btn.right').click(function() {
        var genre = $(this).data('genre');
        $('#genre-' + genre).animate({ scrollLeft: '+=250' }, 500);
    });
});
</script>
