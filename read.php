<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root."/common/connection.php";
include $root."/common/authenticate.php";
include $root."/common/nav.php";
include $root."/common/header.php";
?>
<style>
  .img-circle {
    border-radius: 50%;
    height: 25px;
    width: 25px;
    overflow: hidden;
    margin-right: 10px;
  }

  .img-circle img {
    width: 100%;
    height: auto;
  }
</style>
<div class="container mt-5">
  <?php
  $id = $_GET['id'];
  $sql = "SELECT * from blogs where blog_id=$id";
  $result = $con->query($sql);

  while ($row = $result->fetch_assoc()) {
    $title = $row['title'];
    $content = $row['content'];
    $image = $row['image_url'];
    $author_id = $row['user_id'];
    $author_result = $con->query("SELECT * from users WHERE user_id=$author_id");
    $author = $author_result->fetch_assoc();
    $author_name = $author['fullname'];
    if ($author['profile_image']) {
      $profile_image = $author['profile_image'];
    } else {
      $profile_image = 'static/static_avatar.jpg';
    }
    echo "
        <div class='container'>
          <h2 class='card-title'>" . $title . " :</h2>
          <div class='d-flex flex-start'>
          <div class='img-circle vert'>
            <img src=$profile_image  alt='$author_name'>
          </div>
          <a href='profile/author.php?id=" . $author_id . "' class='btn-link'>" . $author_name . "</a>
          </div>
          <hr>
          <div class='text-center'>
          <img src='" . $image . "' class='img-fluid my-3' alt=''>
          </div>
          <h5 class='card-text'>" . $content . "</h5>
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

<div class="container mb-4">
  <hr>
  <h4 class="pb-2">Comments</h4>
  <?php
  $sql = "SELECT * from comments where blog_id=$id";
  $comments = $con->query($sql);
  while ($row = $comments->fetch_assoc()) {
    $user_id = $row['user_id'];
    $user_result = $con->query("SELECT fullname from users WHERE user_id=$user_id");
    $user = $user_result->fetch_assoc();
    echo "
      <div class='row'>
        <div class='col-md-12 col-lg-10 col-xl-8'>
          <div class='card mb-3'>
            <div class='card-body'>
              <div class='d-flex flex-start'>
                <img class='rounded-circle shadow-1-strong me-3'
                  src='static/temp_avatar.jpg' width='40'
                  height='40' />
                <div class='w-100'>
                  <div class='d-flex justify-content-between align-items-center mb-3'>
                    <h6 class='fw-bold mb-0'>
                      " . $user['fullname'] . ":
                      <span class='text-primary ms-2'>" . $row['content'] . "</span>
                    </h6>
                    <p class='mb-0'>2 days ago</p>
                  </div>
                  <div class='d-flex justify-content-between align-items-center'>
                    <p class='small mb-0' style='color: #aaa;'>";
    $Uid = $_SESSION['Uid'];
    if ($Uid == $user_id) {
      echo "
                        <a href='#!' class='link-grey'>Delete<i class='fa-solid fa-trash'></i></a> •
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
    } else {
      echo "
    <a href='#!' class='link-grey'>Like<i class='fa-regular fa-heart'></i></i></a> •
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
}

  ?>
</div>

<?php include "common/footer.php"; ?>