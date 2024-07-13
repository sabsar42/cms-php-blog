<?php
session_start();
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];


    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {

            $sql = "INSERT INTO achievements (title, description, image) VALUES ('$title', '$description', '$fileName')";
            if ($connect->query($sql) === TRUE) {
                echo "<script>";
                echo "document.addEventListener('DOMContentLoaded', function() {";
                echo "    if (sessionStorage.getItem('successMessage')) {";
                echo "        alert(sessionStorage.getItem('successMessage'));";
                echo "        sessionStorage.removeItem('successMessage');";
                echo "    }";
                echo "});";
                echo "</script>";
                header("Location: achievements.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
        } else {
            echo "Error uploading your file.";
        }
    } else {
        echo "Only JPG, JPEG, PNG, GIF files are allowed.";
    }
}
