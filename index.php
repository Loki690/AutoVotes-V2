<?php

require_once('class.php');

$vote->Login();

$vote->voterRegister();

include('includes/header.php');

if($vote->getUserData() == true){

  include('includes/usernav.php');

}else{

  include('includes/nav.php');
}

// $vote->session();


// // Set the end date and time for the countdown
// $end_date = "2023-03-17 00:00:00"; // YYYY-MM-DD HH:MM:SS

// // Calculate the remaining time in seconds
// $remaining_time = strtotime($end_date) - time();

// // Calculate the remaining days, hours, minutes, and seconds
// $days = floor($remaining_time / (60 * 60 * 24));
// $hours = floor(($remaining_time % (60 * 60 * 24)) / (60 * 60));
// $minutes = floor(($remaining_time % (60 * 60)) / 60);
// $seconds = $remaining_time % 60;

// $days = "March 30, 2030 00:00:00"



?>

<script type="text/javascript">
  function countdown() {


    var now = new Date();
    var eventDate = new Date("<?php echo date('M d, Y H:i:s', strtotime('March 30, 2030 00:00:00')); ?>");

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
  <div class="cover">
    <img class="img-fluid" id="cover" src="img/cover.png" width="1400" height="450" alt="" />
  </div>

  <div class="container d-flex justify-content-center">
    <h5 class="title-app mt-5">ELECTION TYPES</h5>
  </div>
  <!--Candidates-->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-sm-3 pt-2" data-aos="fade-right">
        <div class="card text-start hvr-grow" id="shadow">
          <img class="card-img-top" src="img/cssg.jpg" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">CSSG ELECTIONS</h4>
            <button type="button" class="btn btn-outline-primary" tabindex="-1" data-bs-toggle="modal" data-bs-target="#login">
              View Elections
            </button>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 pt-2" data-aos="fade-right">
        <div class="card text-start hvr-grow" id="shadow">
          <img class="card-img-top" src="img/ITE.png" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">ITE ELECTIONS</h4>

            <button type="button" class="btn btn-outline-primary" tabindex="-1" data-bs-toggle="modal" data-bs-target="#login">
              View Elections
            </button>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 pt-2" data-aos="fade-right">
        <div class="card text-start hvr-grow" id="shadow">
          <img class="card-img-top" src="img/BSAD.png" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">BUSINESS ADMINISTRATION ELECTION</h4>

            <button type="button" class="btn btn-outline-primary" tabindex="-1" data-bs-toggle="modal" data-bs-target="#login">
              View Elections
            </button>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 pt-2" data-aos="fade-right">
        <div class="card text-start hvr-grow" id="shadow">
          <img class="card-img-top" src="img/CELA.png" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">CELA ELECTION</h4>
            <button type="button" class="btn btn-outline-primary" tabindex="-1" data-bs-toggle="modal" data-bs-target="#login">
              View Elections
            </button>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 pt-2" data-aos="fade-left">
        <div class="card text-start hvr-grow" id="shadow">
          <img class="card-img-top" src="img/CJE.png" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">CJE ELECTION</h4>
            <button type="button" class="btn btn-outline-primary" tabindex="-1" data-bs-toggle="modal" data-bs-target="#login">
              View Elections
            </button>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 pt-2" data-aos="fade-left">
        <div class="card text-start hvr-grow" id="shadow">
          <img class="card-img-top" src="img/HM.png" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">HOSPITALITY MANAGEMENT ELECTION</h4>
            <button type="button" class="btn btn-outline-primary" tabindex="-1" data-bs-toggle="modal" data-bs-target="#login">
              View Elections
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Candidates-->
</main>


<!-- Login and register modals  -->
<?php
  include('includes/modals.php');
?>
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


<div>


</div>


<?php
// echo "Countdown to {$end_date}: {$days} days, {$hours} hours, {$minutes} minutes, {$seconds} seconds remaining.";
// $studentid['student_id']
?>
<?php

include('includes/footer.php');
?>