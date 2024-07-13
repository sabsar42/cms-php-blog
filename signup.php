<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $hashed_password = md5($password);


    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $hashed_password); // 'sss' indicates three string parameters
    if ($stmt->execute()) {
        echo "<script>alert('Registration Successfull')</script>";
        echo "<script>location.href='login.php'</script>";
    } else {
        echo "<script>alert('Invalid username Or Password, Try Again!')</script>";
        echo "<script>location.href='signup.php'</script>";
    }
    $stmt->close();
}
?>



<!-- html code  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="./css/signup.css" rel="stylesheet">
</head>

<body>
    <div class="bg-image">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="wrapper animated bounce">
                <h2>Register</h2>
                <hr>
                <form method="post" action="signup.php" onsubmit="return validateForm()">
                    <label for="username"><i class="fa fa-user"></i></label>
                    <input type="text" id="username" name="username" placeholder="Username" required>

                    <label for="email"><i class="fa fa-envelope"></i></label>
                    <input type="email" id="email" name="email" placeholder="Email" required>

                    <label for="password"><i class="fa fa-lock"></i></label>
                    <input type="password" id="password" name="password" placeholder="Password" required>

                    <input type="submit" value="Register">
                    <hr>
                    <div class="crtacc"><a href="login.php">Already have an account? Login here</a></div>
                </form>
            </div>
        </div>
    </div>


    <script src="./js/validateForm.js"></script>

</body>

</html>