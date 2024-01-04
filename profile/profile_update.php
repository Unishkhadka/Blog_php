<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    session_start();
    $Uid = $_SESSION['Uid'];
    $sql = "UPDATE `users` SET `fullname`='$fullname', `email`='$email', `address`='$address' WHERE `user_id`='$Uid'";
    $update = $con->query($sql);

    if ($update) {
        echo "Profile updated.";
        header("Location: profile.php");
    } else {
        echo "Update failed.";
    }
} else {
    echo "Post failed.";
}
?>
