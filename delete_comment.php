<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";
include $root . "/common/header.php";

$id=$_GET['id'];
$blog_id = $_GET['blog_id'];
$sql = "DELETE FROM comments where comment_id=$id";
$delete = $con->query($sql);

if($delete){
    echo "Comment deleted.";
}
else{
    echo "Comment deletion failed.";
}
header("Location: /Blog_php/read.php?id=$blog_id");
?>