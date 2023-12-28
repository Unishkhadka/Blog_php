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
                        
            </div>
        </div>
    </div>
            </div>
<?php include 'common/footer.php'; ?>