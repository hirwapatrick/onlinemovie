<?php
if (isset($_POST['upload'])) {
    include 'dbh.php'; // Database connection file

    // Collect and sanitize form data
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $release = mysqli_real_escape_string($conn, $_POST['release']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $rtime = mysqli_real_escape_string($conn, $_POST['rtime']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $video_url = mysqli_real_escape_string($conn, $_POST['video_url']);
    $trailer_url = mysqli_real_escape_string($conn, $_POST['trailer_url']);

    // Handle image upload
    $image = $_FILES['image'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image['name']);
    $upload_ok = 1;

    // Validate the uploaded image
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($image['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
        $upload_ok = 0;
    }

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $upload_ok = 0;
    }

    if ($upload_ok === 0) {
        die("Sorry, your file was not uploaded.");
    } else {
        if (!move_uploaded_file($image['tmp_name'], $target_file)) {
            die("Error uploading image.");
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO movies (name, genre, rdate, runtime, description, imgpath, videopath, trailer_url) 
            VALUES ('$mname', '$genre', '$release', '$rtime', '$desc', '$target_file', '$video_url', '$trailer_url')";

    if (mysqli_query($conn, $sql)) {
        echo "Movie uploaded successfully!";
        echo "<a href='homepage.php'>Go back to admin page</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
