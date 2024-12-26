<?php
session_start();
include 'dbh.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Insert the comment into the database
    $sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";
    if (mysqli_query($conn, $sql)) {
        header("Location: homepage.php?message=Comment added successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
