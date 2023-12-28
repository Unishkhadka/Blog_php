<?php
include "common/nav.php";
include "common/authenticate.php";
include "common/header.php";
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

    .card {
      height: 100%;
    }

    .card-img {
      object-fit: cover;
      height: 200px; /* Set the desired height for the image */
    }

    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }

    .card-description {
      height: 80px; /* Set the desired height for the description */
      overflow: hidden;
      text-overflow: ellipsis;
    }
</style>
<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      $sql = "SELECT * from blogs order by blog_id desc";
      $result = $con->query($sql);

      while ($row = $result->fetch_assoc()) {
        $author_id = $row['user_id'];
        $author_result = $con->query("SELECT * from users where user_id = $author_id");
        $author = $author_result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
        $desc = $row['description'];
        $blog_id = $row["blog_id"];
        $name = $author["fullname"];
        $image = $row['image_url'];
        if($author['profile_image']){
          $profile_image = $author['profile_image'];
          }
          else{
              $profile_image = 'static/static_avatar.jpg';
          }
        $time = time();
        echo "
        <div class='col'>
          <div class='card shadow-sm'>
            <img src='$image' class='card-img'>
            <div class='card-body'>
              <div class='d-flex flex-start'>
                <div class='img-circle vert'>
                  <img src=$profile_image alt='$name'>
                </div>
                <div class='w-100'>
                  <div class='d-flex justify-content-between align-items-center mb-3'>
                    <a  href='author.php?id=$author_id'><h6 class='fw-bold mb-0'>
                        " . $name . "
                      </h6></a>
                    <hr>
                  </div>
                </div>
              </div>
              <h4>$title</h4>
              <p class='card-text card-description'>$desc</p>
              <div class='d-flex'>
                <div>
                  <small class='text-body-secondary'>9 mins</small>
                </div>
                <div class='ms-auto'>
                  <a type='button' href='read.php?id=$blog_id' class='btn btn-sm btn-link'>Read <i class='fa-solid fa-arrow-right'></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        ";
      }
      ?>
    </div>
  </div>
</div>

<?php
include "common/footer.php";
?>
