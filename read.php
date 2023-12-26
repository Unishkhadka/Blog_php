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
        $id = $_GET['id'];
        $sql = "SELECT * from blogs where blog_id=$id";
        $result = $con->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='container'>
              <h2 class='card-title'>" . $row['title'] . " :</h2>
              <img src='...' class='img-fluid' alt=''>
              <h5 class='card-text'>" . $row['content'] . "</h5>
              </div>
              <hr>
            ";}
            ?>
              <div class='container mt-4'>
              <form action='post_comment.php' method='post'>
              <div class='mb-3'>
  <label for='exampleFormControlTextarea1' class='form-label'><h5>Comment:</h5></label>
  <textarea class='form-control' name='comment' id='exampleFormControlTextarea1' rows='3'></textarea>
</div>
<div class='text-end'>
<input type='hidden' name='blog_id' value='<?php echo $id; ?>'>
<button type='submit' class='btn btn-primary'>Comment</button>
</div>  
        </form>   
</div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>