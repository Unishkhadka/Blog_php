<?php
include "common/connection.php";
include "common/nav.php";
include "common/authenticate.php";
include "common/header.php";
?>

<div class="container-fluid px-4">
  <form action="publish.php" method="post" enctype="multipart/form-data">
    <div class="pt-3 pb-3 px-4">
      <h4>Blog Title</h4>
      <input type="text" name="title" class="form-control" placeholder="Enter your blog title" required>
    </div>
    <div class="pb-3 px-4">
      <h4>Category</h4>
      <input type="text" name="category" class="form-control" placeholder="For example: psychology" required>
    </div>
    <div class="pb-3 px-4">
      <h4>Description</h4>
      <input type="text" name="description" class="form-control" placeholder="A couple of sentences as a highlight." required>
    </div>
    <div class="mb-3 px-4">
      <h4>Content</h4>
      <textarea class="form-control" name="content" id="content" rows="20" placeholder="Write your blog content here" required></textarea>
    </div>
    <div class="mb-3 px-4">
      <h5>Select image to upload:</h5>
      <input type="file" name="image" id="image" enctype="multipart/form-data" required>
    </div>
    <div class="pb-3 px-4 text-end">
      <button type="submit" class="btn btn-outline-primary">Publish</button>
    </div>
  </form>
</div>

<!-- Load CKEditor 4 from CDN -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<!-- Initialize CKEditor 4 -->
<script>
  CKEDITOR.replace('content');
</script>

<?php include "common/footer.php";?>
