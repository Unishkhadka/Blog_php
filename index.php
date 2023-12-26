<?php
include "common/nav.php";
include "common/authenticate.php";
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/index.css">
  <title>Blogs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <?php
    $sql = "SELECT * from blogs";
    $result = $con->query($sql);
    $user = $con->query("SELECT * from users");
    while ($row = $result->fetch_assoc()) {
      while ($row_user = $user->fetch_assoc()) {
        echo "
        <div class='row mb-4 justify-content-center'>
          <div class='col-md-9'>
            <div class='card'>
              <img src='...' class='card-img-top' alt=''>
              <div class='card-body'>
                <h5 class='card-title'>" . $row['title'] . "</h5>
                <p class='card-text'>" . $row['description'] . "</p>
                <div class='d-flex justify-content-between'>
                  <a href='read.php?id=" . $row['blog_id'] . "' class='btn btn-primary'>Read</a>
                  <a href='author.php?id=" . $row_user['user_id'] . "' class='btn btn-link text-end'>" . $row_user['fullname'] . "</a>
                </div>
              </div>
            </div>
          </div>
        </div>";
      }
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>