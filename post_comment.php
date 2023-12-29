<?php
include "common/connection.php";
session_start();
$Uid = $_SESSION['Uid'];
$blog_id = $_POST['blog_id'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
$comment = $_POST['comment'];
$sql = "INSERT into comments (`content`, `blog_id`, `user_id`) VALUES('$comment', $blog_id,$Uid)";
$insert = $con->query($sql);
if($insert){
    echo "Commented succesfully";
}
else{
    echo "Comment failed";
}   

}
else{
    echo "Post failed.";
}
header("Location: read.php?id=$blog_id");
?>