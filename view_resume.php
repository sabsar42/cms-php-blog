<?php
include 'db.php';

$sql = "SELECT file_name, file_data FROM resumes ORDER BY uploaded_at DESC LIMIT 1";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $file_name = $row['file_name'];
    $file_data = $row['file_data'];


    $base64_pdf = base64_encode($file_data);
} else {
    die("Resume not found.");
}

$connect->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shakib Absar Resume</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/resume.css" rel="stylesheet">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <h2>View Resume</h2>
        <a href="download_resume.php" target="_blank" class="btn btn-primary">Download Resume</a>
        <div class="iframe-container">
            <iframe src="data:application/pdf;base64,<?php echo $base64_pdf; ?>"></iframe>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>