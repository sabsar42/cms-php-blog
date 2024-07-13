<?php
include 'db.php';

$sql = "SELECT * FROM contact_links";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="icon" href="images/motorboat.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-+1xztl4QF+IY5IVTPe5v/1EVX25j9fgtYOiv/31HFfh3LQD+QblK4UPlG3q91SZixRyIu58IZayR9A7GxgG4Ug==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- Font Awesome for icons -->
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2>Public Profiles</h2>
                </center>

                <div class="profile-links">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $platform = strtolower($row['platform_name']);
                            echo '<a href="' . $row['profile_link'] . '" target="_blank" class="profile-link">';
                            echo '<div class="profile-box btn btn-' . $platform . '">';
                            echo '<i class="fab fa-' . $platform . '"></i>';
                            echo '<span>' . $row['platform_name'] . '</span>';
                            echo '</div></a>';
                        }
                    } else {
                        echo '<p>No contact links available.</p>';
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