<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}


$row = [];


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM post WHERE id=?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Post not found.";
        exit;
    }
    $stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];


    $sql = "UPDATE post SET title=?, content=? WHERE id=?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('ssi', $title, $content, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Post Updated Succesfully')</script>";
        echo "<script>location.href='index.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";
        echo "<script>location.href='update.php'</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Post</title>

    <head>
        <title>Create Post</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="./css/update.css" rel="stylesheet">
    </head>
</head>

<body>
    <h2>Update Post</h2>
    <?php include('navbar.php'); ?>

    <br><br>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        Title: <input type="text" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>" required><br>
        Content: <textarea name="content" rows="4" required><?php echo isset($row['content']) ? $row['content'] : ''; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>