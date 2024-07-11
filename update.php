<?php
session_start();
include 'db.php';

// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Initialize $row to avoid errors when first loading the page
$row = [];

// Handle GET request to fetch post data for update
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM post WHERE id=?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('i', $id); // 'i' indicates integer type for id
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

// Handle POST request to update post data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update the SQL query to use correct column names
    $sql = "UPDATE post SET title=?, content=? WHERE id=?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('ssi', $title, $content, $id); // 'ssi' indicates two strings and one integer parameters
    if ($stmt->execute()) {
        echo "Post updated successfully.";
    } else {
        echo "Error updating post: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Post</title>
</head>

<body>
    <h2>Update Post</h2>
    <a href="index.php">Back to Dashboard</a>
    <br><br>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        Title: <input type="text" name="title" value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>" required><br>
        Content: <textarea name="content" rows="4" required><?php echo isset($row['content']) ? $row['content'] : ''; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>