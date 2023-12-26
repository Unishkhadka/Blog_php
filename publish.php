<?php
include "common/connection.php";
include "common/authenticate.php";
$Uid = $_SESSION['Uid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    // $image = $_FILES['image']['name'];

    // Initialize $uploadOk to 1
    $uploadOk = 1;

    // Check if the file is uploaded
    if (isset($_FILES["image"])) {
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $temp = $_FILES['image']['tmp_name'];

        // Check if file already exists
        if (file_exists($target_dir.$image)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_dir.$image, PATHINFO_EXTENSION));
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Move the uploaded file to a permanent location
        if ($uploadOk=1) {
            move_uploaded_file($temp, $target_dir.$image);
        }
    }
}


$sql = "INSERT INTO `blogs`(`title`, `content`, `category`, `description`, `user_id`) VALUES ('$title', '$content', '$category', '$description', $Uid)";

$insert = $con->query($sql);

if ($insert) {
    $_SESSION['inserted'] = "1";
} else {
    $_SESSION['inserted'] = "0";
}

$con->close();

header("Location: index.php");
?>