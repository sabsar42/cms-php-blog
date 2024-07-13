<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Background Image</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .navbar {
            background-image: url('https://vi.wordpress.org/files/2018/09/20_motorboat.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100px;

        }

        .nav-link {
            font-size: large;
            font-weight: bold;
            color: white !important;
        }

        .navbar-brand {
            font-size: large;
            font-weight: bold;
            font-family: cursive;
            color: white !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">ABSCMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" style="color:white;" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="achievements.php">Achievements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="upload_project.php">Projects</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="contact_me.php">Public Profiles</a>
                        <a class="dropdown-item" href="view_resume.php">Resume</a>
                        <a class="dropdown-item" href="anonymous_message.php">Send a Message</a>

                    </div>
                </li>
            </ul>
        </div>
    </nav>