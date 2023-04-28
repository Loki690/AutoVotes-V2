<?php
require_once('class.php');
$vote->Login();
$vote->voterRegister();
$vote->loginAdmin();
$vote->comelecLogin();
include('includes/header.php');
if ($vote->getUserData() == true) {
  include('includes/usernav.php');
} else {
  include('includes/nav.php');
}
$elections = $vote->getElectionId();
?>
<script type="text/javascript">
  function countdown() {


    var now = new Date();
    var eventDate = new Date("<?php echo date('M d, Y H:i:s', strtotime('March 30, 2023 00:00:00')); ?>");

    var currentTime = now.getTime();
    var eventTime = eventDate.getTime();

    var remainingTime = eventTime - currentTime;

    var seconds = Math.floor(remainingTime / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;
    setTimeout(countdown, 1000);

  }
</script>

<main>
  <!-- Dcc Logo-->
  <div class="container-fuid cover d-flex justify-content-center">
    <img class="img-fluid" id="cover" src="img/cover.png"  style="width:100%; height:450;" alt="" />
  </div>

  <div class="container d-flex justify-content-center">
    <h5 class="title-app mt-5">UPCOMING ELECTION</h5>
  </div>
  <!--Candidates-->
  <div class="container">
    <div class="row">
      <?php foreach ($elections as $election) { ?>
        <div class="col-sm-4 pt-2 mt-5" data-aos="fade-right">
          <div class="card text-start hvr-grow" style="border-radius:25px;" id="shadow2">
            <img class="card-img img-fluid" style="width:500px; height: 350px; border-top-left-radius:25px; border-top-right-radius:25px;" src="uploads/<?= $election['election_poster']; ?>" alt="ELECTION POSTER" />

            <div class="card-body">
              <h4 class="card-title"><?= $election['election_name'] ?></h4>
              <div>
                <small class="fw-bold text-muted">Election Starts : <?= date('F d, Y g:i A', strtotime($election['start_date'])) ?></small>
              </div>
              <div class="mt-2">
                <small class="fw-bold text-muted">Election Ends : <?= date('F d, Y g:i A', strtotime($election['end_date'])) ?></small>
              </div>
              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-outline-primary mt-5" tabindex="-1" data-bs-toggle="modal" data-bs-target="#login">
                  View Elections
                </button>

              </div>
            
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!--Candidates-->
</main>

<!-- modal admin login -->
<div class="modal fade modal-signin" id="login-admin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title text-white" id="staticBackdropLabel">
          Admin Login
        </h5>
        <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close">
          x
        </button>
      </div>
      <br />
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group mt-2">
            <label for="exampleInputPassword1" class="form-label">Access Code</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="accesscode" placeholder="Password" required />
            <a href="#" class="mt-2"><small>Forgot Access Code? </small> </a>
          </div>
          <div class="d-flex pt-1">
            <button type="submit" id="loginbutton" name="login-admin" class="btn btn-primary mt-2 flex-grow-1">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal comelec login -->
<div class="modal fade modal-signin" id="login-comelec" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title text-white" id="staticBackdropLabel">
          Comelec Login
        </h5>
        <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close">
          x
        </button>
      </div>
      <br />
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group mt-2">
            <label for="exampleInputPassword1" class="form-label">Access Code</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="accesscode" placeholder="Password" required />
            <a href="#" class="mt-2"><small>Forgot Access Code? </small> </a>
          </div>
          <div class="d-flex pt-1">
            <button type="submit" id="loginbutton" name="login-comelec" class="btn btn-primary mt-2 flex-grow-1">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="container d-flex justify-content-center mt-lg-5">
  <h5 class="title-app display-1 mb-5">Filing of Candidacy</h5>
</div>

<div class="container">
  <div class="row text-center">
    <div class="col-md-4">
      <h3>
        <a href="register-candi.php" class="btn btn-primary btn-lg"> Candidacy Form</a>
      </h3>
    </div>
    <div class="col-md-4">
      <h3>
        <a href="register-candi.php" class="btn btn-outline-primary btn-lg"> Candidacy Form</a>
      </h3>
    </div>
    <div class="col-md-4">
      <h3>
        Deadline of Filing
      </h3>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>
<?php
include('includes/modals.php');
?>
<!-- Login and register modals  -->



<div class="container mt-5 pt-5 d-flex justify-content-center">
  <div class="row ">
    <div class="col-md-12">
      <h1 class="title-app display- mt-5">Election Countdown</h1>
    </div>
  </div>

</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-3 text-center bg-info p-5">
      <h1><span id="days"></span></h1>
      <h2 class="">Days</h2>
    </div>
    <div class="col-md-3 text-center bg-danger p-5">
      <h1><span id="hours"></span></h1>
      <h2 class="">Hours</h2>
    </div>
    <div class="col-md-3 text-center bg-info p-5">
      <h1><span id="minutes"></span></h1>
      <h2 class="">Minutes</h2>
    </div>
    <div class="col-md-3 text-center bg-danger p-5">
      <h1><strong><span id="seconds"></span></strong></h1>
      <h2 class="">Seconds</h2>
    </div>
  </div>
</div>
<?php

?>