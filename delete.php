<?php
session_start();
include 'db.php';


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];


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


header("Location: index.php");
exit;
