<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";
include $root . "/common/header.php";

$id=$_GET['id'];
$sql = "DELETE FROM blogs where blog_id=$id";
$comment = "DELETE FROM comments where blog_id=$id";
$delete_blog = $con->query($sql);
$delete_comment = $con->query($comment);


if($delete_blog){
    echo "Blog deleted.";
}
else{
    echo "Blog deletion failed.";
}
header("Location: /Blog_php/profile/profile.php");
?>