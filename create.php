<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['username'];


    $sql = "INSERT INTO post (title, content, author, date, added) VALUES (?, ?, ?, NOW(),NOW())";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('sss', $title, $content, $author); // 'sss' indicates three string parameters
    if ($stmt->execute()) {
        echo "<script>alert('Post added Succesfully')</script>";
        echo "<script>location.href='index.php'</script>";
    } else {
        echo "<script>alert('Invalid input!')</script>";
        echo "<script>location.href='create.php'</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="./css/create.css" rel="stylesheet">
</head>


<body>
    <?php include('navbar.php'); ?>
    <h2>Create Post</h2>

    <br><br>
    <form method="post" action="create.php">
        Title: <input type="text" name="title" required><br>
        Content: <textarea name="content" rows="4" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>