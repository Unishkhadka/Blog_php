<?php
include "common/nav.php";
include "common/connection.php";
include "common/authenticate.php";
include "common/header.php";
?>
<link rel="stylesheet" href="style/circular_image.css">
<div class="container my-4">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">

                            <?php
                            $Uid = $_SESSION['Uid'];
                            $sql = "SELECT * from users where user_id = $Uid";
                            $result = $con->query($sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row['fullname'];
                                $address = $row['address'];
                                if($row['profile_image']){
                                $profile_image = $row['profile_image'];
                                }
                                else{
                                    $profile_image = 'static/static_avatar.jpg';
                                }
                                echo "
                                <div class='img-circle vert'>
                                <img src=$profile_image class='bg-light' alt='$name'>
                                </div>
                                <div class='mt-3'>
                                    <h4>$name</h4>
                                    <p class='text-secondary mb-1'>Full Stack Developer</p>
                                    <p class='text-muted font-size-sm'>$address</p>
                                    <a href='profile_image.php' class='btn btn-primary'>Upload Image</a>";
                            }
                            ?>
                        </div>
                    </div>
                    <hr class="my-4">
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
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <form action="profile_update.php" method="post">
                                <?php
                                $Uid = $_SESSION['Uid'];
                                $sql = "SELECT * from users where user_id = $Uid";
                                $result = $con->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                    <h6 class='mb-0'>Full Name</h6>
                                </div>
                                <div class='col-sm-9 text-secondary'>
                                <input type='text' name='fullname' class='form-control' value='" . $row['fullname'] . "'>

                                </div>
                            </div>
                            <div class='row mb-3'>
                                <div class='col-sm-3'>
                                    <h6 class='mb-0'>Email</h6>
                                </div>
                                <div class='col-sm-9 text-secondary'>
                                    <input type='text' name='email' class='form-control' value='" . $row['email'] . "'>
                                </div>
                            </div>
                            <div class='row mb-3'>
                                <div class='col-sm-3'>
                                    <h6 class='mb-0'>Address</h6>
                                </div>
                                <div class='col-sm-9 text-secondary'>
                                    <input type='text' name='address' class='form-control' value='" . $row['address'] . "'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-3'></div>
                                <div class='col-sm-9 text-secondary'>
                                    <button type='submit' class='btn btn-primary px-4' >Save Changes</button>
                                </div>
                            </div>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "common/footer.php"; ?>