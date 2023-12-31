<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";
include $root . "/common/nav.php";
?>
<style>
  .img-circle {
    border-radius: 50%;
    height: 25px;
    /* Adjust the height as needed */
    width: 25px;
    /* Adjust the width as needed */
    overflow: hidden;
    margin-right: 10px;
  }

  .img-circle-comment {
    border-radius: 50%;
    height: 40px;
    /* Adjust the height as needed */
    width: 40px;
    /* Adjust the width as needed */
    position: relative;
    overflow: hidden;
    margin-right: 10px;
  }

  .img-circle img,
  .img-circle-comment img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
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
      $profile_image = '/Blog_php/static/static_avatar.jpg';
    }
    echo "
        <div class='container'>
          <h2 class='card-title'>" . $title . "</h2>
          <div class='d-flex flex-start'>
          <div class='img-circle'>
            <img src=/Blog_php/profile/$profile_image  alt='$author_name'>
          </div>
          <a href='/Blog_php/profile/author.php?id=" . $author_id . "' class='btn-link'>" . $author_name . "</a>
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
    $comment_id = $row['comment_id'];
    $comment = $row['content'];
    $user_id = $row['user_id'];
    $user_result = $con->query("SELECT * from users WHERE user_id=$user_id");
    $user = $user_result->fetch_assoc();
    if ($user['profile_image']) {
      $image = 'profile/' . $user['profile_image'];
    } else {
      $image = '/Blog_php/static/static_avatar.jpg';
    }

    if (mysqli_num_rows($comments) > 0) {
      echo "
      <div class='row'>
        <div class='col-md-12 col-lg-10 col-xl-8'>
          <div class='card mb-3'>
            <div class='card-body'>
            <div class='d-flex flex-start'>
            <div class='img-circle-comment'>
              <img src='/Blog_php/$image' alt='$user[fullname]'>
            </div>
                <div class='w-100'>
                  <div class='d-flex justify-content-between align-items-center mb-3'>
                    <h6 class='fw-bold mb-0'>
                      " . $user['fullname'] . ":
                      <span class='text-primary ms-2'>" . $comment . "</span>
                    </h6>
                  </div>
                  <div class='d-flex justify-content-between align-items-center'>
                    <p class='small mb-0' style='color: #aaa;'>";
      $Uid = $_SESSION['Uid'];
      if ($Uid == $user_id) {
        echo "
                        <a href='/Blog_php/delete_comment.php?id=$comment_id && blog_id=$id' class='link-grey'>Delete<i class='fa-solid fa-trash'></i></a> •
                        <!-- Button trigger modal -->
                        <a type='button' class='link-grey' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                          Edit <i class='fa-solid fa-pen-to-square'></i>
                        </a>

                        <!-- Modal -->
                        <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h1 class='modal-title fs-5' id='staticBackdropLabel'>Comments</h1>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                              </div>
                              <div class='modal-body'>
                              <form action='/Blog_php/update_comment.php' method='post'>
                              <div class='mb-3'>
                                <textarea class='form-control' name='comment' id='exampleFormControlTextarea1' rows='2'>$comment</textarea>
                              </div>
                              <div class='modal-footer'>
                              <div class='text-end'>
                                <input type='hidden' name='comment_id' value='<?php echo $comment_id; ?>'
                                <button type='submit' class='btn btn-primary'>Comment</button>
                                </div>
                              </div>
                            </form>
                              </div>
                              
                            </div>
                          </div>
                        </div>
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
    <a href='#!' class='link-grey'><i class='fa-regular fa-heart'></i></i></a> •
                        <a href='#!' class='link-grey'>Translate</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>";
      }
    } else {
      echo "<h1>No comments!</h1>";
    }
  }
  ?>
  <?php include "common/footer.php";

  ?>