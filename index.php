<?php

require_once('class.php');
$vote->Login();
$vote->voterRegister();

include('header.php');

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

<!-- Navbar with Login and Sign up-->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/dcc.png" width="350" height="60" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color: white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
      <div class="d-flex">
        <button type="button" class="btn btn-outline-light mx-1" tabindex="-1" data-bs-toggle="modal"
          data-bs-target="#login">
          Login
        </button>

        <button type="button" class="btn btn-outline-light mx-1" tabindex="-1" data-bs-toggle="modal"
          data-bs-target="#Register">
          Register
        </button>
      </div>
    </div>
  </div>
</nav>

<main>
  <!-- Dcc Logo-->
  <div class="banner">
    <h1>DCC AUTOVOTE LOGO</h1>
  </div>

  <div class="container d-flex justify-content-center">
    <!-- <h5 class="title-app display-1 mb-5">AUTOVOTES</h5> -->
  </div>
  <!--Candidates-->
  <div class="container mt-5">
    <div class="container d-flex justify-content-start">
      <h5 class="title-app">Candidates for 2023 - 2024 Election</h5>
    </div>

    <div class="row">
      <div class="col-lg-3 col-sm-3 pt-2">
        <div class="card text-start">
          <img class="card-img-top" src="img/donaldmc.jpg" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">For President</h4>
            <p class="card-text">Donald Trump</p>
            <button class="btn btn-outline-primary">View Candidate</button>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 pt-2">
        <div class="card text-start">
          <img class="card-img-top" src="img/donaldmc.jpg" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">For President</h4>
            <p class="card-text">Donald Trump</p>
            <button class="btn btn-outline-primary">View Candidate</button>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 pt-2">
        <div class="card text-start">
          <img class="card-img-top" src="img/donaldmc.jpg" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">For President</h4>
            <p class="card-text">Donald Trump</p>
            <button class="btn btn-outline-primary">View Candidate</button>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3 pt-2">
        <div class="card text-start">
          <img class="card-img-top" src="img/donaldmc.jpg" alt="Title" />
          <div class="card-body">
            <h4 class="card-title">For President</h4>
            <p class="card-text">Donald Trump</p>
            <button class="btn btn-outline-primary">View Candidate</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Candidates-->
</main>
<!--Modals-->
<div class="modal fade modal-signin" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px">
      <div class="modal-header p-3 pb-3"
        style="background-color:  #13005a; border-top-left-radius: 20px; border-top-right-radius: 20px;">
        <h5 class="modal-title text-white" id="staticBackdropLabel">Login to DCC Autovote</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
          style="color:white;"></button>
      </div>
      <br />
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="school_id" id="exampleInputEmail1"
              aria-describedby="emailHelp" placeholder="Enter Student ID">
            <small id="emailHelp" class="form-text text-muted">We'll never share your student id with anyone
              else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
              placeholder="Enter Password">
            <a href="#" class="mt-2"><small> Forgot Password? </small> </a>

          </div>
          <div class="d-flex pt-1">
            <button type="submit" id="loginbutton" name="login-voter"
              class="btn btn-primary mt-2 flex-grow-1">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>


<div class="modal fade modal-signin" id="Register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px">
      <div class="modal-header p-3 pb-3"
        style="background-color:  #13005a; border-top-left-radius: 20px; border-top-right-radius: 20px;">
        <h5 class="modal-title text-white" id="staticBackdropLabel">Register Autovote</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
          style="color:white;"></button>
      </div>
      <br />
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">


          <div class="row mt-2">

            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-2">First Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="first_name"
                  aria-describedby="emailHelp" placeholder="First Name">

              </div>

            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-2">Last Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="last_name"
                  aria-describedby="emailHelp" placeholder="Last Name">

              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-2">Gender</label>
                <select class="form-select" aria-label="Default select example" name="gender">
                  <option selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-2">Course</label>
                <select class="form-select" aria-label="Default select example" name="course">
                  <option selected>Select Course</option>
                  <option value="BSIT">BSIT</option>
                  <option value="BSCRIM">BSCRIM</option>
                  <option value="BSHM">BSHM</option>
                  <option value="BSBA">BSBA</option>
                  <option value="BSED">BSED</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-2">Year Level</label>
                <select class="form-select" aria-label="Default select example" name="year_level">
                  <option selected>Select Year Level</option>
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-2">Student ID</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="school_id"
                  aria-describedby="emailHelp" placeholder="Student ID">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-2">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" name="password"
                  aria-describedby="emailHelp" placeholder="Enter Password">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-3" name="voter-register">Register</button>
        </form>
      </div>
    </div>
  </div>

</div>
<!--Modals-->

<div class="container d-flex justify-content-center mt-lg-5">
  <h5 class="title-app display-1 mb-5">Filing of Candidacy</h5>
</div>

<div class="container">
<div class="row text-center">
    <div class="col-md-4">
      <h3>
        Requirements
      </h3>
    </div>
    <div class="col-md-4">
      <h3>
        Candidacy Form
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
?>
<?php

include('footer.php');
?>