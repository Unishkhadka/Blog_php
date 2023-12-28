<?php
include "C:/xampp/htdocs/Blog_php/common/connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password != $cpassword){
        echo "Password and Confirm Password doesn't match.";
    }
    elseif(strlen($password) < 8){
        echo "Password is too short";
    }
    else{
    $sql = "INSERT INTO `users`(`fullname`, `email`, `password`, `address`) VALUES ('$user_name','$email','$password','$address')";
    $result = $con->query($sql);

    if ($result) {
        echo "User inserted successfully!";
        header("Location: /Blog_php/login/login.php");
    } else {
        echo "Error: " . $con->error;
    }}
}
?>
