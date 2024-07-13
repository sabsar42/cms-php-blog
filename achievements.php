<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Achievement</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/achievements.css">

</head>

<body>
  <?php include('navbar.php'); ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-5">
        <div class="upload-section">
          <h2>Upload Achievement</h2>
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="image">Select Image:</label>
              <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Upload</button>
          </form>
        </div>
      </div>
      <div class="col-md-7">
        <div class="uploaded-section">
          <h2>Uploaded Achievements</h2>
          <?php
          include 'db.php';


          $sql = "SELECT * FROM achievements";
          $result = $connect->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<div class='card mb-3'>";
              echo "<div class='card-body'>";
              echo "<h5 class='card-title'>" . $row['title'] . "</h5>";
              echo "<p class='card-text'>" . $row['description'] . "</p>";
              echo "<img src='uploads/" . $row['image'] . "' class='card-img-top' alt='" . $row['title'] . "' style='max-height: 200px;'>";
              echo "</div>";
              echo "</div>";
            }
          } else {
            echo "<p>No achievements uploaded yet.</p>";
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