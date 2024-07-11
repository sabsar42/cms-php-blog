<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Redirect to dashboard or homepage
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
</head>

<body>
    <h2>User Login</h2>
    <form method="post" action="login.php">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <a href="signup.php">Don't have an account? Sign Up</a>
</body>

</html>