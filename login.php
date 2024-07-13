<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "<script>alert('Invalid username and Password!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}
?>


<!-- html code  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="./css/login.css" rel="stylesheet">
</head>

<body>
    <div class="bg-image">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="wrapper animated bounce">
                <h1>ABSCMS</h1>
                <hr>
                <form method="post" action="login.php">
                    <label id="icon" for="username"><i class="fa fa-user"></i></label>
                    <input type="text" placeholder="Username" name="username" required>
                    <label id="icon" for="password"><i class="fa fa-key"></i></label>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="submit" value="Sign In">
                    <hr>
                    <div class="crtacc"><a href="signup.php">Create Account</a></div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>