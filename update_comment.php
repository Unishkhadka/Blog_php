<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $blog_id = $_POST['blog_id'];
  $comment_id = $_POST['comment_id'];
  $new_comment = $_POST['comment'];
  $sql = "UPDATE comments SET `content` = '$new_comment' WHERE comment_id = $comment_id";
  $update = $con->query($sql);
  if ($update) {
    echo "Comment updated";
  } else {
    echo "Comment failed to update";
  }
} else {
  echo "Post failed!";
}
header("Location: /Blog_php/read.php?id=$blog_id");
?>