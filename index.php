<?php
session_start();
include 'db.php';

// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// Fetch all posts
$sql = "SELECT * FROM post ORDER BY date DESC";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>CMS Dashboard</title>
</head>

<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <a href="create.php">Create New Post</a> | <a href="?logout=true">Logout</a>
    <br><br>
    <h3>Posts List</h3>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h4>" . $row["title"] . "</h4>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<p><strong>Author:</strong> " . $row["author"] . "</p>";
            echo "<p><strong>Date Added:</strong> " . $row["date_added"] . "</p>";
            echo "<a href='update.php?id=" . $row["id"] . "'>Update</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a>";
            echo "</div><hr>";
        }
    } else {
        echo "No posts found.";
    }
    ?>
</body>

</html>