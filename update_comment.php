<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_comment'])) {
    $comment_id = $_POST['comment_id'];
    $new_comment = $_POST['comment'];
    $sql = "UPDATE comments SET comment = $new_comment WHERE comment_id = $comment_id";
    $update = $con->query($sql);
    if($update){
      echo "Comment updated";
    }
    else{
      echo "Comment failed to update";
    }
    // header("Location: /Blog_php/read.php?id=$id");
  }
  else{
    echo "Post failed!";
    // header("Location: /Blog_php/read.php?id=$id");
  } 
?>