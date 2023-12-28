<?php include "header.php";?>

<body style="font-family: 'Jost', sans-serif; ">
  <nav class="navbar navbar-expand-lg bg-primary " style="font-family: 'Jost', sans-serif;">
    <div class="container-fluid">
      <a class="navbar-brand ms-3" href="index.php">
        <h3>AURA <i class="fa-solid fa-pen"></i></h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item ms-3">
            <a class="nav-link" aria-current="page" href="index.php">Dashboard <i class="fa-solid fa-house"></i></a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link" href="#">My Blogs</a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link" href="create.php">Create</a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link" href="profile.php"><i class="fa-solid fa-user"></i></a>
          </li>
          <a href="logout.php"> <button class="btn btn-danger btn-sm ms-3">Logout</button>
          </a>
        </ul>
      </div>
    </div>
  </nav>