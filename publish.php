<?php
include "common/connection.php";
include "common/authenticate.php";
$Uid = $_SESSION['Uid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $folder = "images/".time().'_'.$image;
    move_uploaded_file($temp, $folder);


$sql = "INSERT INTO `blogs`(`title`, `content`, `category`,`image_url`, `description`, `user_id`) VALUES ('$title', '$content', '$category','$folder', '$description', $Uid)";

$insert = $con->query($sql);

if ($insert) {
    echo "Blog published.";
    $_SESSION['inserted'] = "1";
} else {
    echo "Blog failed to publish.";
    $_SESSION['inserted'] = "0";
}
header("Location: index.php");
}

else{
    echo "Post failed.";
}
?>