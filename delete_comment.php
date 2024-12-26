<?php
session_start();
include 'dbh.php';

// Check if admin is logged in
if (isset($_SESSION['id']) && $_SESSION['id'] == 1) {
    if (isset($_POST['comment_id'])) {
        $comment_id = intval($_POST['comment_id']);
        
        // Delete the comment
        $delete_query = "DELETE FROM comments WHERE id = ?";
        $stmt = mysqli_prepare($conn, $delete_query);
        mysqli_stmt_bind_param($stmt, "i", $comment_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Comment deleted successfully.');
                    window.location.href = 'homepage.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to delete comment.');
                    window.location.href = 'homepage.php';
                  </script>";
        }
    }
} else {
    echo "<script>
            alert('Unauthorized access.');
            window.location.href = 'homepage.php';
          </script>";
}
?>
