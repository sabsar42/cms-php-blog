<?php
session_start();
include 'db.php';

// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete post from database
    $sql = "DELETE FROM post WHERE id=?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('i', $id); // 'i' indicates integer type for id
    if ($stmt->execute()) {
        echo "Post deleted successfully.";
    } else {
        echo "Error deleting post: " . $stmt->error;
    }
    $stmt->close();
}

// Redirect back to dashboard
header("Location: index.php");
exit;
