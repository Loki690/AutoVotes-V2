<?php
$vote->Login();
$vote->loginAdmin();
?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/dcc.png" width="290" height="60" alt="" class="" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color: white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
        <li class="nav-item" id="nav-item-hover">
          <a class="nav-link" href="index.php" id="nav-link"><i class="fas fa-home"></i> Home</a>
        </li>

        <li class="nav-item" id="nav-item-hover">
          <a class="nav-link" href="#elections" id="nav-link"><i class="fas fa-vote-yea"></i> Elections</a>
        </li>

        <li class="nav-item" id="nav-item-hover">
          <a class="nav-link" href="#Candidacy" id="nav-link"><i class="fas fa-user"></i> Candidacy</a>
        </li>

        <li class="nav-item" id="nav-item-hover">
          <a class="nav-link" href="#" id="nav-link"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
        </li>
      </ul>
      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-outline-light mx-2" tabindex="-1" data-bs-toggle="modal" data-bs-target="#login">
          Login
        </button>
        <!-- <button type="button" class="btn btn-outline-light" tabindex="-1" data-bs-toggle="modal" data-bs-target="#Register">
          Register
        </button> -->
      </div>
    </div>
  </div>
</nav>
