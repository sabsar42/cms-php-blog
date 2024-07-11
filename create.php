<?php
session_start();
include 'db.php';

// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['username'];

    // Insert into database
    $sql = "INSERT INTO post (title, content, author, date, added) VALUES (?, ?, ?, NOW(),NOW())";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('sss', $title, $content, $author); // 'sss' indicates three string parameters
    if ($stmt->execute()) {
        echo "Post added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
</head>

<body>
    <h2>Create Post</h2>
    <a href="index.php">Back to Dashboard</a>
    <br><br>
    <form method="post" action="create.php">
        Title: <input type="text" name="title" required><br>
        Content: <textarea name="content" rows="4" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>