<?php include "header.php";?>

<body style="font-family: 'Jost', sans-serif;">
  <nav class="navbar navbar-expand-lg bg-primary " style="font-family: 'Jost', sans-serif;">
    <div class="container-fluid">
      <a class="navbar-brand ms-3" href="index.php">
        <h3>AURA</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item ms-3">
            <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link" href="#">My Blogs</a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link" href="create.php">Create</a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <a href="login/logout.php"> <button class="btn btn-danger btn-sm ms-3">Logout</button>
          </a>
        </ul>
      </div>
    </div>
  </nav>
  <script src="script/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>