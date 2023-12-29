<?php
$root = "C:/xampp/htdocs/Blog_php/";
include $root . "/common/connection.php";
include $root . "/common/authenticate.php";
include $root . "/common/nav.php";
include $root . "/common/header.php";

$blog_id = $_GET['id'];
$sql = "SELECT * from blogs WHERE blog_id=$blog_id";
$result = $con->query($sql);
while($row=$result->fetch_assoc()){
    $title = $row['title'];
    $description = $row['description'];
    $blog_category = $row['category'];
    $content = $row['content'];
    $image = $row['image_url'];
echo"
<div class='container-fluid px-4'>
  <form action='update_blog.php' method='post' enctype='multipart/form-data'>
    <div class='pt-3 pb-3 px-4'>
      <h4>Blog Title</h4>
      <input type='text' name='title' class='form-control' value='$title' required>
    </div>
    <div class='pb-3 px-4'>
      <h4>Category</h4>
      <select class='form-select' name='category' aria-label='Default select example'>
      <option selected>$blog_category</option>
      ";
        $sql = 'SELECT * FROM categories';
        $result = $con->query($sql);
        // Check if the query executed successfully
        if ($result) {
          // Fetch categories and populate the dropdown
          while ($row = $result->fetch_assoc()) {
            $id = $row['category_id'];
            $category = $row['category'];
            echo "<option value='$id'>$category</option>";
          }
        } else {
          // Handle the case where the query fails
          echo 'Error: ' . $con->error;
        }
        echo"
</select>
    </div>
    <div class='pb-3 px-4'>
      <h4>Description</h4>
      <input type='text' name='description' class='form-control' value='$description' maxlength='130' required>
    </div>
    <div class='mb-3 px-4'>
      <h4>Content</h4>
      <textarea class='form-control' name='content' id='content' rows='20' placeholder='Write your blog content here' required>$content</textarea>
    </div>
    <div class='mb-3 px-4'>
      <h5>Update image(optional)</h5>
      <input type='file' name='image' id='image' enctype='multipart/form-data'>
    </div>
    <input type='hidden' name='blog_id' value='$blog_id'>
    <div class='pb-3 px-4 text-end'>
      <button type='submit' class='btn btn-outline-primary'>Update</button>
    </div>
  </form>
</div>

<!-- Load CKEditor 4 from CDN -->
<script src='https://cdn.ckeditor.com/4.16.2/full/ckeditor.js'></script>
<!-- Initialize CKEditor 4 -->
<script>
  CKEDITOR.replace('content');
</script>";}
 include "common/footer.php";?>
