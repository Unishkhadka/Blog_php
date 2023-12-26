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
            ";
    }
    ?>
  </div>
  <div class='container mt-4'>
    <form action='post_comment.php' method='post'>
      <div class='mb-3'>
        <label for='exampleFormControlTextarea1' class='form-label'>
          <h5>Comment:</h5>
        </label>
        <textarea class='form-control' name='comment' id='exampleFormControlTextarea1' rows='2'></textarea>
      </div>
      <div class='text-end'>
        <input type='hidden' name='blog_id' value='<?php echo $id; ?>'>
        <button type='submit' class='btn btn-primary'>Comment</button>
      </div>
    </form>
  </div>
 
<div class="container">
<hr>
  <h4 class="pb-2">Comments</h4>
    <?php
      $sql = "SELECT * from comments where blog_id=$id";
      $comments = $con->query($sql);
      while($row = $comments->fetch_assoc()){
        $user_id = $row['user_id'];
        $user_result = $con->query("SELECT fullname from users WHERE user_id=$user_id");
        $user = $user_result->fetch_assoc();
        echo"
    <div class='row'>
      <div class='col-md-12 col-lg-10 col-xl-8'>
        <div class='card mb-3'>
        <div class='card-body'>
          <div class='d-flex flex-start'>
            <img class='rounded-circle shadow-1-strong me-3'
              src='static/temp_avatar.jpg'  width='40'
              height='40' />
            <div class='w-100'>
              <div class='d-flex justify-content-between align-items-center mb-3'>
                <h6 class='fw-bold mb-0'>
                  ".$user['fullname'].":
                  <span class='text-primary ms-2'>".$row['content']."</span>
                </h6>
                <p class='mb-0'>2 days ago</p>
              </div>
              <div class='d-flex justify-content-between align-items-center'>
                <p class='small mb-0' style='color: #aaa;'>
                  <a href='#!' class='link-grey'>Remove</a> •
                  <a href='#!' class='link-grey'>Reply</a> •
                  <a href='#!' class='link-grey'>Translate</a>
                </p>
                <div class='d-flex flex-row'>
                  <i class='fas fa-star text-warning me-2'></i>
                  <i class='far fa-check-circle' style='color: #aaa;'></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>";
      }
    ?>

</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>