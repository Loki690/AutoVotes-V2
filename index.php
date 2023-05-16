<?php
include('includes/header.php');
?>

<main>

<?php
require_once('class.php');
$vote->Login();
$vote->voterRegister();
$vote->loginAdmin();

$vote->registerCandidate();
$elec = $vote->getElectionId();
$pos = $vote->getPositionId();
$par = $vote->getPartyId();



if ($vote->getUserData() == true) {
  include('includes/usernav.php');
} else {
  include('includes/nav.php');
}
$elections = $vote->getElectionId();


?>
<section id="home">
  <div class="hero vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <img src="img/DCC2.png" height="200" weight="200" alt="">
                    <h1 class="display-4 text-white fw-bold"><span style="color:green;">DCC</span> <span class="text-white" style="color:blue;">AUTOVOTES</span> </h1>
                    <a href="#elections" class="btn me-2 btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</section>

  <!--Candidates-->
<section class="mt-5" id="elections">
  <div class="container">
    <div class="mb-5">
        <div class="row">
          <h3 class="title-app text-center mt-5" id="elections">UPCOMING ELECTION</h3>
          <?php foreach ($elections as $election) {
            
            ?>
            <div class="col-sm-3 mt-2" data-aos="fade-right">
              <div class="card" style="border-radius:25px;" id="shadow2">
                <h4 class="elec-name mx-3 my-3 text-truncate"><?= $election['election_name'] ?></h4>
                <img class="elec-img img-fluid px-3" src="uploads/<?= $election['election_poster'] ?>" alt="">
              
                <div class="d-flex justify-content-center mb-3 mt-2">
                <a href="view-candidates.php?id=<?= $election['election_id'] ?>"><button type="button" class="btn btn-sm btn-outline-primary mt-2">View Candidates</button></a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
    </div>
  </div>

</section>
  

  <section class="mt-5" id="Candidacy">
    <div class="container mt-4 pt-5">
      <div class="card" style="border-radius:30px;" id="shadow2">
        <div class="card-header">
          <div class="d-flex justify-content-between">
            <img class="img" src="img/comelec.png" width="100" height="100" alt="">
            <h3 class="Rtitle text-center mt-5">OFFICIAL CERTIFICATION OF CANDIDACY</h3>
            <img class="img" src="img/DCC2.png" width="100" height="100" alt="">
          </div>
        </div>

        <form class="mx-5 my-5" action="" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="FirstName" name="first_name" aria-describedby="emailHelp" placeholder="First Name" required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="MiddleName">Middle Name</label>
                <input type="text" class="form-control" id="LastName" name="middle_name" aria-describedby="emailHelp" placeholder="Middle Name"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" class="form-control" id="LastName" name="last_name" aria-describedby="emailHelp" placeholder="Last Name" required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Gender">Gender</label>
                <select class="form-select" name="gender" aria-label="Default select example"  required>
                  <option selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Age">Age</label>
                <input type="number" class="form-control" id="Age" name="age" aria-describedby="emailHelp" placeholder="Age"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="DateOfBirth">Date Of Birth</label>
                <input type="date" class="form-control" name="date_birth" id="DateOfBirth" aria-describedby="emailHelp" placeholder="Date Of Birth"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="PlaceOfBirth">Place Of Birth</label>
                <input type="text" class="form-control" name="place_birth" id="PlaceOfBirth" aria-describedby="emailHelp" placeholder="Place Of Birth"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="height">Height</label>
                <input type="text" class="form-control" name="height" id="Height" aria-describedby="emailHelp" placeholder="Height"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Weight">Weight</label>
                <input type="text" class="form-control" id="Weight" name="weight" aria-describedby="emailHelp" placeholder="Weight"  required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="HomeAdd">Home Address</label>
                <input type="text" class="form-control" id="HomeAddress" name="home_add" aria-describedby="emailHelp" placeholder="Home Address"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Civil Status">Civil Status</label>
                <select class="form-select" name="status" aria-label="Default select example"  required> 
                  <option selected>Select Status</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                </select>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Religion">Religion</label> 
                <input type="text" class="form-control" name="religion" id="Religion" aria-describedby="emailHelp" placeholder="Religion"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Language">Language</label>
                <input type="text" class="form-control" id="Language" name="language" aria-describedby="emailHelp" placeholder="Language"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Citizenship">Citizenship</label>
                <input type="text" class="form-control" id="Citizenship" name="citizenship" aria-describedby="emailHelp" placeholder="Citizenship"  required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="ContactNumber">Contact Number</label>
                <input type="number" class="form-control" id="ContactNumber" name="contact_num" aria-describedby="emailHelp" placeholder="Contact Number"  required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="SpouseName">Spouse Name</label>
                <input type="text" class="form-control" id="SpouseName" name="spouse_name" aria-describedby="emailHelp" placeholder="Spouse Name or Write N/A if none"  required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="SpouseAdd">Spouse Address</label>
                <input type="text" class="form-control" id="SpouseAdd" name="spouse_add" aria-describedby="emailHelp" placeholder="Spouse Address or Write N/A if none" required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="NumofChild">No. Of Child</label>
                <input type="number" class="form-control" id="NumofChild" name="num_child" aria-describedby="emailHelp" placeholder="No. Of Child or Write N/A if none" required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="NumofChild">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="example@gmail.com" required>
              </div>
            </div>

          </div>

          <div class="row mt-4">
            <h4>EDUCATIONAL BACKGROUND:</h4>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Tertiary">Tertiary</label>
                <input type="text" class="form-control" id="Tertiary" name="tertiary_lev" aria-describedby="emailHelp" placeholder="eg. DCC" required>
              </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="form-group">
                <label for="Course">Course</label>
                <select class="form-select" name="course" aria-label="Default select example" required>
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
                <select class="form-select" name="year_lev" aria-label="Default select example" required>
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
                <input type="text" class="form-control" id="Major" name="major" aria-describedby="emailHelp" placeholder="Major" required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="Secondary">Secondary</label>
                <input type="text" class="form-control" id="Secondary" name="second_lev" aria-describedby="emailHelp" placeholder="eg. DCC" required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="SecondaryGraduated">Secondary Graduated</label>
                <input type="date" class="form-control" id="Secondary" name="secondary_grad" aria-describedby="emailHelp" placeholder="eg. DCC" required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="Elementary">Elementary</label>
                <input type="text" class="form-control" id="Elementary" name="elementary" aria-describedby="emailHelp" placeholder="eg. DCC" required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="ElementaryGraduated">Elementary Graduated</label>
                <input type="date" class="form-control" id="Secondary" name="elementary_grad" aria-describedby="emailHelp" placeholder="eg. DCC" required>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Achievements</label> 
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Write N/A if none" name="achievements" rows="4" required></textarea>
              </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="Organization">Organization</label>
                <input type="text" class="form-control" id="Organization" name="organization" aria-describedby="emailHelp" placeholder="Organization" required>
              </div>

              <div class="form-group mt-2">
                <label for="URL">URL</label>
                <input type="text" class="form-control" id="Organization" name="url" aria-describedby="emailHelp" placeholder="URL" required>
              </div>

            </div>
            <div class="col-md-6 mt-3">
              <div class="form-group">
                <label for="photo">Submit Photo</label>
                <input type="file" class="form-control" id="image" name="photo" aria-describedby="emailHelp" style="padding: 2rem;" required>
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
<script type="text/javascript">
      window.onload = function () {
        // Get the file input element
        const inputElement = document.getElementById("image");

        // Listen for changes to the file input
        inputElement.addEventListener("change", (event) => {
          // Get the file object
          const file = event.target.files[0];

          // Check if the file size is greater than 2 MB
          if (file.size > 2 * 1024 * 1024) {
            // Display an error message
            alert("The selected file exceeds the maximum allowed size of 2 MB.");

            // Clear the file input
            event.target.value = "";
          }
        });
      };
    </script>

<?php
include('includes/footer.php');
?>
<?php
include('includes/modals.php');
?>
<!-- Login and register modals  -->




<?php

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
<script>
  var setVanta = () => {
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
    window.edit_page.Event.subscribe("Page.beforeNewOneFadeIn", setVanta)
  })
</script>