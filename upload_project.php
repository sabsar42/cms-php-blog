<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $github_link = $_POST['github_link'];


    $sql = "INSERT INTO projects (title, description, github_link) VALUES ('$title', '$description', '$github_link')";

    if ($connect->query($sql) === TRUE) {
        $_SESSION['successMessage'] = "Project uploaded successfully.";
        header("Location: upload_project.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/projects.css">
    <style>
        .project-card {
            margin-bottom: 20px;
        }

        .project-card img {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="upload-section">
                    <h2>Upload Project</h2>
                    <form action="upload_project.php" method="post">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="github_link">GitHub Link:</label>
                            <input type="url" class="form-control" id="github_link" name="github_link" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="uploaded-section">
                    <h2>Projects</h2>
                    <?php
                    $sql = "SELECT * FROM projects";
                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='card mb-3 project-card'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>" . $row['title'] . "</h5>";
                            echo "<p class='card-text'>" . $row['description'] . "</p>";
                            echo "<img src='https://via.placeholder.com/300x200' class='card-img-top' alt='Project Image'>";
                            echo "<a href='" . $row['github_link'] . "' class='btn btn-primary mt-2' target='_blank'>View on GitHub</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No projects uploaded yet.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>