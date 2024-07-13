<?php
$servername = "localhost";
$username = "cms";
$password = "password";
$dbname = "cms";


$connect = new mysqli($servername, $username, $password, $dbname);


if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


function login($username, $password)
{
    global $connect;
    $sql = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $connect->prepare($sql);
    $hashed_password = md5($password); // stronger hashing methods like password_hash() in production
    $stmt->bind_param('ss', $username, $hashed_password); // 'ss' indicates two string parameters
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->num_rows > 0 ? true : false;
}


function getUserDetails($username)
{
    global $connect;
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('s', $username); // 's' indicates string parameter
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}
