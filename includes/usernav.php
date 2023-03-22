<?php
$voterDetails = $vote->getUserData();
$vote->logout();
?>
<!-- Navbar with Login and Sign up-->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/dcc.png" width="350" height="60" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color: white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
      <div class="d-flex">
        <button type="button" class="btn btn-outline-light mx-1" tabindex="-1">
          <?= $voterDetails['first_name'] ?>
        </button>
        <button type="button" data-bs-toggle="modal" class="btn btn-outline-light" data-bs-target="#store_logout" ">
         Logout
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="store_logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>
          Are you sure you want to Logout?
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
