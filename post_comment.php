<?php
include "common/connection.php";
session_start();
$Uid = $_SESSION['Uid'];
$blog_id = $_POST['blog_id'];

if("REQUEST_METHOD"=="POST"){
    $comment = $_POST['comment'];
$sql = "INSERT into comments (`comment`, `blog_id`, `user_id`) VALUES('$comment', $blog_id,$Uid)";
$insert = $con->query($sql);
if($insert){
    echo "Commented succesfully";
}
else{
    echo "Comment failed";
}
header("Location: index.php");
}
else{
    echo "Post failed.";
}
?>