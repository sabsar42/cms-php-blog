<?php
include 'db.php';


$sql = "SELECT file_name, file_data FROM resumes ORDER BY uploaded_at DESC LIMIT 1";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $file_name = $row['file_name'];
    $file_data = $row['file_data'];


    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=\"$file_name\"");
    header("Content-Transfer-Encoding: binary");
    header("Accept-Ranges: bytes");


    echo $file_data;
} else {
    die("Resume not found.");
}


$connect->close();
