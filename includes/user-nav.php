<?php
$voterDetails = $vote->getUserData();
$vote->logout();
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark" id="nav-color">
  <!-- Navbar Brand-->
  <a class="navbar-brand mx-2" href="index.php">
        <img class="nav-logo" src="img/DCC2.png" width="50" height="50" alt="Dcc" /> DCC AUTOVOTES
  </a>
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  <!-- Navbar Search-->
  <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

  </form>
  <!-- Navbar-->
  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle user-name" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?= $voterDetails['first_name'] ?></a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
        <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
        <!-- <li>
          <hr class="dropdown-divider" />
        </li> -->
        <li><a class="dropdown-item" href="#!" data-bs-toggle="modal" class="btn btn-outline-light" data-bs-target="#voter-logout">Logout</a></li>
      </ul>
    </li>
  </ul>
</nav>


<!-- Modal -->
<div class="modal fade" id="voter-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content" style="border-radius: 30px;">
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">
          You want to Logout?
        </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="" method="POST">
          <button type="submit" class="btn btn-danger text-white" name="logout">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>