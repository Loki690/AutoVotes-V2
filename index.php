<?php
require_once('class.php');

$vote->Login();
$vote->voterRegister();
$vote->loginAdmin();

$vote->registerCandidate();
$elec = $vote->getElectionId();
$pos = $vote->getPositionId();
$par = $vote->getPartyId();

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
<div id="background"></div>
<main>
  <section id="home">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-overlay"></div>
          <img src="img/Cover2.png" class="d-block w-100" alt="Carousel Image">
        </div>
      </div>
    </div>
  </section>


 
  <!--Candidates-->
  <section class="mb-5" id="elections">
   
    <div class="container">
      <div class="row">
      <h5 class="title-app text-center mt-5" id="elections">UPCOMING ELECTION</h5>
        <?php foreach ($elections as $election) { ?>
          
          <div class="col-sm-4 pt-2 mt-5" data-aos="fade-right">
            <div class="card text-start hvr-grow" style="border-radius:25px;" id="shadow2">
              <img class="card-img img-fluid" style="width:500px; height: 300px; border-top-left-radius:25px; border-top-right-radius:25px;" src="uploads/<?= $election['election_poster']; ?>" alt="ELECTION POSTER" />

              <div class="card-body">
                <h4 class="card-title"><?= $election['election_name'] ?></h4>
                <div>
                  <small class="fw-bold text-muted">Election Starts : <?= date('F d, Y g:i A', strtotime($election['start_date'])) ?></small>
                </div>
                <div class="mt-2">
                  <small class="fw-bold text-muted">Election Ends : <?= date('F d, Y g:i A', strtotime($election['end_date'])) ?></small>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="view-candidates.php?id=<?= $election['election_id'] ?>">
                  <button type="button" class="btn btn-outline-primary mt-2">
                    View Candidates
                  </button>
                  </a>
                </div>
              
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    

  </section>

  <section class="mt-5" id="Candidacy">
  <div class="container mt-4 pt-5">
    <div class="card" style="border-radius:30px;" id="shadow2">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <img  class="img" src="img/comelec.png" width="100" height="100" alt="">
          <h3 class="Rtitle text-center mt-5">OFFICIAL CERTIFICATION OF CANDIDACY</h3>
          <img  class="img" src="img/DCC2.png" width="100" height="100" alt="">
        </div>
        
      </div>
   
      <form class=" mx-5 my-5" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="StudentID">Student ID</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="student_id" aria-describedby="" placeholder="Enter student ID">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="ElectionID">Election ID</label>
              <select class="form-select" name="election_id" aria-label="Default select example">
              <option selected>Select Election</option>
                <?php foreach ($elec as $item) { ?>
                  <option value="<?= $item['election_id'] ?>"><?= $item['election_name']; ?></option>
                  <!-- <option value="">CSSG</option>
                    <option value="">ITE</option> -->
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="ElectionID">Date Filed</label>
              <input type="date" class="form-control" id="exampleInputEmail1" name="date_filed" aria-describedby="emailHelp" placeholder="Date of Filling">
            </div>
          </div>

          <?php
          ?>
          
          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="ElectionID">Position ID</label>
              <select class="form-select" name="position_id" aria-label="Default select example">
                <option selected>Select Available Position</option>
                <?php foreach ($pos as $item) { ?>
                  <option value="<?= $item['position_id'] ?>"><?= $item['position_title']; ?></option>
                <?php } ?>
              </select>

            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="PartyID">Party ID</label>
              <select class="form-select" name="party_id" aria-label="Default select example">
              <option selected>Select Party</option>
                <?php foreach ($par as $item) { ?>
                  <option value="<?= $item['party_id'] ?>"><?= $item['party'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>



        </div>

        <div class="row mt-4">
          <h4>PERSONAL INFORMATION:</h4>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="FirstName">First Name</label>
              <input type="text" class="form-control" id="FirstName" name="first_name" aria-describedby="emailHelp" placeholder="First Name">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="MiddleName">Middle Name</label>
              <input type="text" class="form-control" id="LastName" name="middle_name" aria-describedby="emailHelp" placeholder="Middle Name">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="LastName">Last Name</label>
              <input type="text" class="form-control" id="LastName" name="last_name" aria-describedby="emailHelp" placeholder="Last Name">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Gender">Gender</label>
              <select class="form-select" name="gender" aria-label="Default select example">
                <option selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Age">Age</label>
              <input type="number" class="form-control" id="Age" name="age" aria-describedby="emailHelp" placeholder="Age">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="DateOfBirth">Date Of Birth</label>
              <input type="date" class="form-control" name="date_birth" id="DateOfBirth" aria-describedby="emailHelp" placeholder="Date Of Birth">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="PlaceOfBirth">Place Of Birth</label>
              <input type="text" class="form-control" name="place_birth" id="PlaceOfBirth" aria-describedby="emailHelp" placeholder="Place Of Birth">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="height">Height</label>
              <input type="text" class="form-control" name="height" id="Height" aria-describedby="emailHelp" placeholder="Height">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Weight">Weight</label>
              <input type="text" class="form-control" id="Weight" name="weight" aria-describedby="emailHelp" placeholder="Weight">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="HomeAdd">Home Address</label>
              <input type="text" class="form-control" id="HomeAddress" name="home_add" aria-describedby="emailHelp" placeholder="Home Address">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Civil Status">Civil Status</label>
              <select class="form-select" name="status" aria-label="Default select example">
                <option selected>Select Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
              </select>
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Religion">Religion</label>
              <input type="text" class="form-control" name="religion" id="Religion" aria-describedby="emailHelp" placeholder="Religion">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Language">Language</label>
              <input type="text" class="form-control" id="Language" name="language" aria-describedby="emailHelp" placeholder="Language">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Citizenship">Citizenship</label>
              <input type="text" class="form-control" id="Citizenship" name="citizenship" aria-describedby="emailHelp" placeholder="Citizenship">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="ContactNumber">Contact Number</label>
              <input type="number" class="form-control" id="ContactNumber" name="contact_num" aria-describedby="emailHelp" placeholder="Contact Number">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="SpouseName">Spouse Name</label>
              <input type="text" class="form-control" id="SpouseName" name="spouse_name" aria-describedby="emailHelp" placeholder="Spouse Name">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="SpouseAdd">Spouse Address</label>
              <input type="text" class="form-control" id="SpouseAdd" name="spouse_add" aria-describedby="emailHelp" placeholder="Spouse Address">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="NumofChild">No. Of Child</label>
              <input type="number" class="form-control" id="NumofChild" name="num_child" aria-describedby="emailHelp" placeholder="No. Of Child">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="NumofChild">Email</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="example@gmail.com">
            </div>
          </div>

        </div>

        <div class="row mt-4">
          <h4>EDUCATIONAL BACKGROUND:</h4>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Tertiary">Tertiary</label>
              <input type="text" class="form-control" id="Tertiary" name="tertiary_lev" aria-describedby="emailHelp" placeholder="eg. DCC">
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Course">Course</label>
              <select class="form-select" name="course" aria-label="Default select example">
                <option selected>Select Course</option>
                <option value="BSIT">BSIT</option>
                <option value="BSAT">BSAT</option>
                <option value="BSBA">BSBA</option>
                <option value="BSED">BSED</option>
                <option value="BSHRM">BSHRM</option>
                <option value="BSCRIM">BSCRIM</option>
              </select>
            </div>
          </div>

          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="YearLevel">Year Level</label>
              <select class="form-select" name="year_lev" aria-label="Default select example">
                <option selected>Select Year Level</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>

              </select>
            </div>
          </div>
          <div class="col-md-3 mt-3">
            <div class="form-group">
              <label for="Major">Major</label>
              <input type="text" class="form-control" id="Major" name="major" aria-describedby="emailHelp" placeholder="Major">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="Secondary">Secondary</label>
              <input type="text" class="form-control" id="Secondary" name="second_lev" aria-describedby="emailHelp" placeholder="eg. DCC">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="SecondaryGraduated">Secondary Graduated</label>
              <input type="date" class="form-control" id="Secondary" name="secondary_grad" aria-describedby="emailHelp" placeholder="eg. DCC">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="Elementary">Elementary</label>
              <input type="text" class="form-control" id="Elementary" name="elementary" aria-describedby="emailHelp" placeholder="eg. DCC">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="ElementaryGraduated">Elementary Graduated</label>
              <input type="date" class="form-control" id="Secondary" name="elementary_grad" aria-describedby="emailHelp" placeholder="eg. DCC">
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Achievements</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="achievements" rows="4"></textarea>
            </div>
          </div>

          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="Organization">Organization</label>
              <input type="text" class="form-control" id="Organization" name="organization" aria-describedby="emailHelp" placeholder="Organization">
            </div>

            <div class="form-group mt-2">
              <label for="URL">URL</label>
              <input type="text" class="form-control" id="Organization" name="url" aria-describedby="emailHelp" placeholder="URL">
            </div>

          </div>
          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label for="photo">Submit Photo</label>
              <input type="file" class="form-control" id="photo" name="photo" aria-describedby="emailHelp" style="padding: 2rem;" required>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" name="register-candidate" class="btn btn-primary mt-3">Submit Application</button>
        </div>

      </form>


    </div>
      



  </div>



          

  </section>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
<script>
var setVanta = ()=>{
if (window.VANTA) window.VANTA.WAVES({
  el: "#background",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color: 0xb284a
})



}
_strk.push(function() {
  setVanta()
  window.edit_page.Event.subscribe( "Page.beforeNewOneFadeIn", setVanta )
})
</script>