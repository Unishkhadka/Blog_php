<?php
include "common/nav.php";
include "common/authenticate.php";
include "common/header.php";
?>
<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      $sql = "SELECT * from blogs order by blog_id desc";
      $result = $con->query($sql);

      while ($row = $result->fetch_assoc()) {
        $author_id = $row['user_id'];
        $author_result = $con->query("SELECT * from users where user_id = $author_id");
        $author = $author_result->fetch_assoc();
        $title = $row['title'];
        $desc = $row['description'];
        $blog_id = $row["blog_id"];
        $name = $author["fullname"];
        $image = $row['image_url'];
        echo "
        <div class='col'>
          <div class='card shadow-sm'>
            <img src='$image'>
            <div class='card-body'>
              <h4>$title</h4>
              <p class='card-text'>$desc</p>
              <div class='d-flex'>
                <div>
                  <small class='text-body-secondary'>9 mins</small>
                </div>
                <div class='text-end'>
                  <a type='button' href='read.php?id=$blog_id' class='btn btn-sm btn-link'>Read</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        ";
      }
      ?>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
