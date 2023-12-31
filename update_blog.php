<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";
include $root . "/common/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['blog_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    if ($_FILES['image']['error'] !== 4) {
        $image = $con->query("SELECT image_url from blogs WHERE blog_id=$id");
        $image = $image->fetch_assoc();
        if ($image['image_url'] && file_exists($root . $image['image_url'])) {
            unlink($root . $image['image_url']);
        }
        $image = $_FILES['image']['name'];
        $date = date("Y-m-d");
        $temp = $_FILES['image']['tmp_name'];
        $folder = "images/" . time() . '_' . $image;
        move_uploaded_file($temp, $folder);

        $sql = "UPDATE blogs SET  title ='$title', content ='$content', category ='$category', updated_at ='$date', image_url ='$folder',
         description ='$description' where blog_id=$id";
    } else {
        $sql = "UPDATE blogs SET  title ='$title', content ='$content', category ='$category', updated_at ='$date', description ='$description' where blog_id=$id";
    }
    $update = $con->query($sql);
} else {
    echo "Post failed!";
}
header("Location: read.php?id=$id");
