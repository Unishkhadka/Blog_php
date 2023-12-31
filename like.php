<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";

if(isset($_POST['like'])){
    $comment_id=$_GET['like'];
    $status = 'liked';
}
if(isset($_POST['unlike'])){
    $comment_id=$_GET['unliked'];
    $status = 'unliked';
}
header("Location: /Blog_php/read.php")
?>