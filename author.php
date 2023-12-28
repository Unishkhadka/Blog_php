<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";
include $root . "/common/nav.php";
include $root . "/common/header.php";
?>
<link rel="stylesheet" href="style/circular_image.css">
<div class="container mt-4">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                                <?php
                                $auth_id = $_GET['id'];
                                $sql = "SELECT * from users where user_id = $auth_id";
                                $result = $con->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name = $row['fullname'];
                                    $address = $row['address'];
                                    if ($row['profile_image']) {
                                        $profile_image = $row['profile_image'];
                                    } else {
                                        $profile_image = 'static/static_avatar.jpg';
                                    }
                                    echo "
                                    <div class='img-circle vert'>
                                    <img src=$profile_image  alt='$name'>
                                    </div>
                                    <div class='mt-3'>
                                  <h4>".$name."</h4>
                                  <p class='text-muted font-size-sm'>".$address."</p>
                                  <button class='btn btn-primary'>Follow</button>
                                  <button class='btn btn-outline-primary'>Message</button>";
                                    }
                                  ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fa-solid fa-globe"></i> Website</h6>
                                <span class="text-secondary">bootdey</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fa-brands fa-github"></i> Github</h6>
                                <span class="text-secondary">bootdey</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fa-brands fa-square-twitter"></i> @bootdey</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fa-brands fa-square-instagram "></i> Instagram</h6>
                                <span class="text-secondary">bootdey</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fa-brands fa-facebook"></i> Facebook</h6>
                                <span class="text-secondary">bootdey</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Full Name</h6>
                                </div>
                            <?php
                            $auth_id = $_GET['id'];
                            $sql = "SELECT * from users where user_id = $auth_id";
                            $result = $con->query($sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                    <div class='col-sm-9'>
                    " . $row['fullname'] . "
                    </div>
                  </div>
                  <hr>
                  <div class='row'>
                    <div class='col-sm-3'>
                      <h6 class='mb-0'>Email</h6>
                    </div>
                    <div class='col-sm-9'>
                    " . $row['email'] . "
                    </div>
                  </div>
                  <hr>
                  <div class='row'>
                    <div class='col-sm-3'>
                      <h6 class='mb-0'>Address</h6>
                    </div>
                    <div class='col-sm-9 '>
                    " . $row['address'] . "
                    </div>
                  </div>
                  <hr>
                  </div>
                    </div>
                </div>";
                            }
                            ?>
                    <div class="album my-3 bg-body-tertiary">
            <div class="container">
              <h1>Blogs:</h1>
              <div class="row row-cols-1 row-cols-sm-2  ">
                <?php
                $sql = "SELECT * from blogs where user_id=$auth_id order by blog_id desc";
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
                  if ($author['profile_image']) {
                    $profile_image = $author['profile_image'];
                  } else {
                    $profile_image = 'static/static_avatar.jpg';
                  }
                  $time = time();
                  echo "
        <div class='col pt-4'>
          <div class='card shadow-sm'>
            <img src='$image' class='card-img'>
            <div class='card-body'>
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
        </div>
      </div>
<?php include 'common/footer.php'; ?>