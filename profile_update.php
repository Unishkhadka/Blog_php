<?php
include "common/connection.php";
if("REQUEST_METHOD" == "POST"){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
$sql = "UPDATE TABLE `users` SET `fullname`='$fullname',`email`='$email', `address`='$address'";
$insert = $con->query($sql);
if($insert){
    echo "Profile updated.";
}
else{
    echo "Update failed.";
}
header("Location: profile.php");
}
else{
    echo "Post failed.";
}
?>