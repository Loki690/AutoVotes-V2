<?php
$voterDetails = $vote->getUserData();
$vote->logout();
?>
<!-- Navbar with Login and Sign up-->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand mx-2" href="index.php">
        <img class="nav-logo" src="img/DCC2.png" width="50" height="50" alt="Dcc" /> DCC AUTOVOTES
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color: white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-outline-light mx-1" tabindex="-1">
          <?= $voterDetails['first_name'] ?>
        </button>
        <button type="button" data-bs-toggle="modal" class="btn btn-outline-light" data-bs-target="#store_logout">
         Logout
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="store_logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content" style="border-radius: 30px;">
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center ">
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
