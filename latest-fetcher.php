<?php
include 'dbh.php';

// Fetch the latest 5 movies including their upload time
$im = "SELECT mid, name, imgpath, uploaded_at FROM movies ORDER BY mid DESC LIMIT 5";
$newrecords = mysqli_query($conn, $im);

if (mysqli_num_rows($newrecords) > 0) {
    echo "<section class='movie-carousel-wrapper'>";
    echo "<div class='movie-carousel-container'>";
    echo "<div class='movie-carousel' id='carousel-container'>";

    while ($fetchr = mysqli_fetch_assoc($newrecords)) {
        // Calculate time elapsed since upload
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

        echo "<div class='movie-card'>";
        echo "<img src='" . htmlspecialchars($fetchr['imgpath']) . "' alt='" . htmlspecialchars($fetchr['name']) . "' class='movie-img' />";
        echo "<div class='movie-info'>";
        echo "<p class='upload-time'>$timeElapsed</p>";
        echo "<form action='movie.php' method='POST'>";
        echo "<input type='submit' name='submit' class='movie-btn' value='" . htmlspecialchars(ucwords($fetchr['name'])) . "' />";
        echo "<input type='hidden' name='mid' value='" . htmlspecialchars($fetchr['mid']) . "' />";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }

    echo "</div>"; // Close movie-carousel
    echo "</div>"; // Close movie-carousel-container
    echo "</section>";
}
?>

<style>

body {
    background-color: #121212;
    color: #fff;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.movie-carousel-wrapper {
    margin: 40px auto;
    max-width: 100%;
    position: relative;
    padding: 10px;

}

.movie-carousel-container {
    position: relative;
    overflow: hidden; /* Clip overflow for a clean look */
    padding: 30px 30px;
}

.movie-carousel {
    display: flex;
    align-items: center;
    overflow-x: hidden; /* Enable horizontal scrolling */
    white-space: nowrap;
    scroll-behavior: smooth;
}

@keyframes animatingShadow {
    0% {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3), 
                    0 8px 20px rgba(0, 0, 0, 0.2);
    }
    50% {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5), 
                    0 16px 40px rgb(225, 0, 255); /* Slight glow in the middle */
    }
    100% {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3), 
                    0 8px 20px rgba(255, 3, 234, 0.2);
    }
}

.movie-card {
    display: inline-block;
    margin: 20px 10px;
    width: 300px;
    height: 400px;
    border-radius: 12px;
    background-color: rgba(255, 255, 255, 0.05);
    text-align: center;
    animation: animatingShadow 3s infinite ease-in-out; /* Apply the shadow animation */
    transition: transform 0.3s ease; /* Smooth scaling */
}

.movie-img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 8px;
    transition: transform 0.5s ease, height 0.3s ease;
}

.movie-card:hover {
    width: 340px; /* Increase width */
    height: 400px; /* Increase height */
    transform: scale(1.05); /* Optional scaling on hover */
}




.movie-info {
    margin-top: 10px;
}

.movie-btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 6px;
    background-color: #007bff;
    color: white;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.movie-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Scroll buttons (for small devices) */
.scroll-button {
    position: absolute;
    top: 35px;
    background-color: rgb(255, 255, 255);
    color: white;
    border: none;
    border-radius: 50%;
    padding: 10px;
    cursor: pointer;
    width: 60px;
    height: 60px;
    margin-top: 10px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}


.scroll-left {
    right: 90px;
    transform: translateY(-50%);
}

.scroll-right {
    right: 10px;
    transform: translateY(-50%);
}
.scroll-button:hover {
    background-color: #007bff;
    transform: scale(1.1);
}

/* Small Devices (≥576px) */
@media (min-width: 576px) {
    .movie-card {
        width: 180px;
        height: 240px;
    }

    .movie-img {
        height: 180px;
    }
}

/* Medium Devices (≥768px) */
@media (min-width: 768px) {
    .movie-card {
        width: 200px;
        height: 280px;
    }

    .movie-img {
        height: 200px;
    }

    .movie-btn {
        font-size: 14px;
    }
}

/* Large Devices (≥992px) */
@media (min-width: 992px) {
    .movie-card {
        width: 250px;
        height: 350px;
    }

    .movie-img {
        height: 260px;
    }

    .movie-btn {
        font-size: 16px;
    }
}

/* Extra Large Devices (≥1200px) */
@media (min-width: 1200px) {
    .movie-card {
        width: 300px;
        height: 400px;
    }

    .movie-img {
        height: 280px;
    }

    .movie-btn {
        font-size: 18px;
    }
}

/* XXL Devices (≥1400px) */
@media (min-width: 1400px) {
    .movie-card {
        width: 350px;
        height: 450px;
    }

    .movie-img {
        height: 300px;
    }

    .movie-btn {
        font-size: 20px;
    }
}
</style>
<script src="vendors/jquery-3.7.1.min_2.js"></script>
<script>
$(document).ready(function () {
    const $container = $('#carousel-container');
    const scrollAmount = 250; // Adjust scroll speed

    // Add scroll buttons for manual scrolling
    const $scrollLeftButton = $('<button class="scroll-button scroll-left"><img src="images/left.png" width="30" height="30"></button>');
    const $scrollRightButton = $('<button class="scroll-button scroll-right"><img src="images/right.png" width="30" height="30"></button>');
    $('.movie-carousel-container').append($scrollLeftButton, $scrollRightButton);

    // Scroll left button functionality
    $scrollLeftButton.on('click', function () {
        $container.scrollLeft($container.scrollLeft() - scrollAmount);
    });

    // Scroll right button functionality
    $scrollRightButton.on('click', function () {
        $container.scrollLeft($container.scrollLeft() + scrollAmount);
    });
});
</script>

