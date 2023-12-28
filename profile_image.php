<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root."/common/connection.php";
include $root."/common/authenticate.php";
include $root."/common/nav.php";
include $root."/common/header.php";

$Uid = $_SESSION['Uid'];
$sql = "SELECT * FROM users WHERE user_id = $Uid";
$result = $con->query($sql);
$row = mysqli_fetch_assoc($result);
$profile_image = $row['profile_image'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newImage = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $newImagePath = "profile_images/" . time() . '_' . $newImage;

    // Move the uploaded file to the destination
    move_uploaded_file($temp, $newImagePath);

    // Update the user's profile image path in the database
    $updateSql = "UPDATE users SET profile_image = '$newImagePath' WHERE user_id = $Uid";
    $con->query($updateSql);

    // Delete the existing profile image if it exists
    if ($profile_image && file_exists($profile_image)) {
        unlink($profile_image);
    }

    echo "Profile image updated successfully.";
}

?>
<link rel="stylesheet" href="style/circular_image.css">
<div class="container text-center ">
    <?php
    if (!$profile_image) {
        echo "<h3 class='mt-5'>No Profile Image</h3>
        <img src='static/static_avatar.jpg' class='rounded-circle p-1 bg-light' width='110px'>
        
        <form action='' method='post' enctype='multipart/form-data' class='mt-4'>
            <div class='mb-3 d-flex justify-content-center'>
                <input type='file' class='form-control' name='image' id='image' style='width: 400px;' required>
            </div>
            
            <button type='submit' class='btn btn-primary'>Upload Image</button>
        </form>";
    } else {
        echo "<h3 class='mt-5'>Profile Image</h3>
        <div class='d-flex justify-content-center'>
        <div class='img-circle vert'>
                        <img src=$profile_image alt='user'>
                        </div>
                        </div>
        <form action='' method='post' enctype='multipart/form-data' class='my-4 pb-4'>
            <div class='mb-3 d-flex justify-content-center'>
                <input type='file' class='form-control' name='image' id='image' style='width: 400px;' required>
            </div>
            
            <button type='submit' class='btn btn-primary'>Update Image</button>
        </form>";
    }
    ?>
</div>

<?php 
header("Location: profile.php")
//include "common/footer.php"; ?>
