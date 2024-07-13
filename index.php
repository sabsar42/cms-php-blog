<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}


if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}


$sql = "SELECT * FROM post ORDER BY date DESC";
$result = $connect->query($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="./css/index.css" rel="stylesheet">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <div class="mt-3 mb-3">
            <a href="create.php" class="btn btn-primary" style="background-color:darkslategrey; border-color:aquamarine; color:white;"><i class="fas fa-plus"></i> Create New Post</a>
            <a href="?logout=true" class="btn btn-danger" style="background-color:firebrick; border-color: #dc3545; color: #fff;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
        <br><br>
        <h3>Posts List</h3>
        <div class="posts-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='post'>";
                    echo "<h4>" . $row["title"] . "</h4>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "<p><strong>Author:</strong> " . $row["author"] . "</p>";
                    echo "<p><strong>Date Added:</strong> " . $row["date"] . "</p>";
                    echo "<a href='update.php?id=" . $row["id"] . "' class='btn btn-primary' style='background-color:orange; border-color:aquamarine; color:white;'><i class='fas fa-edit'></i> Update</a>";
                    echo "&nbsp;";
                    echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i> Delete</a>";

                    echo "</div><hr>";
                }
            } else {
                echo "No posts found.";
            }
            ?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>