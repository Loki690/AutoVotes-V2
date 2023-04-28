<?php
include('includes/header.php');
require_once('class.php');
$voterDetails = $vote->getUserData();
$vote->session();

?>

<?php
include 'includes/usernav.php'
?>

<main>
  <div class="container-fluid bg-white">
    <div class="row">
      <div class="col-md-12">
        <div class="px-4 pt-5 my-5 text-center border-bottom">
          <h1 class="display-4 fw-bold title-app">Welcome <?= $voterDetails['first_name'] ?></h1>
          <div class="col-lg-6 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
              <a href="student-dashboard.php"><button type="button" class="btn btn-primary btn-lg px-4 me-sm-3 text-white" id="loginbutton">VOTE</button>
              </a>
              <a href="https://qrcodescan.in/"><button type="button" class="btn btn-primary btn-lg px-4 me-sm-3 text-white" id="loginbutton">QR Scanner</button>
              </a>
            </div>
          </div>
          <!-- <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
              <img src="uploads/<?= $voterDetails['course'] ?>" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="1000" height="500" loading="lazy">
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include('includes/footer.php');
?>