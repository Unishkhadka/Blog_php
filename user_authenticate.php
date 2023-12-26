<?php
include "C:/xampp/htdocs/Blog_php/common/connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * from users WHERE email='$email' AND password='$password'";
    $result = $con->query($sql);

    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
                $Uid = $row['user_id'];
                session_start();
                $_SESSION['Uid']=$Uid;
                header("Location: index.php");
            }
        }
        else{
            echo "No user found.";
        }
    
    }
    
