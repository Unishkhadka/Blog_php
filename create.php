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
      <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter your blog title" required>
    </div>
    <div class="pb-3 px-4">
        <h4>Category</h4>
      <input type="text" name="category" class="form-control" id="exampleFormControlInput1" placeholder="For example: psycology" required>
    </div>
    <div class="pb-3 px-4">
        <h4>Description</h4>
      <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="A couple of sentences as a highlight." required>
    </div>
    <div class="mb-3 px-4">
        <h4>Content</h4>
      <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="15" placeholder="Write your blog content here" required></textarea>
    </div>
    <div class="mb-3 px-4">
    <h5>Select image to upload:
    <input type="file" name="image" id="image" enctype="multipart/form-data" required></h5>
    </div>
    <div class="pb-3 px-4 text-end">
      <button type="submit" class="btn btn-outline-primary">Publish</button>
    </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>