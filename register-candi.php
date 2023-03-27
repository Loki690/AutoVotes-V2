<?php
include('includes/header.php');
include('includes/nav.php');
require_once('class.php');

$vote->registerCandidate();
$elec = $vote->getElectionId();
$pos = $vote->getPositionId();
$par = $vote->getPartyId();

?>
<main>
  <div class="container mt-4 pt-5">
    <h1 class="text-center mb-3"> OFFICIAL CERTIFICATION OF CANDIDACY </h1>
    <form action="" method="POST" enctype="multipart/form-data">
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
              <?php foreach ($elec as $item) { ?>
                <option value="<?= $item['election_id'] ?>" selected><?= $item['election_name']; ?></option>
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

        <div class="col-md-3 mt-3">
          <div class="form-group">
            <label for="ElectionID">Position ID</label>
            <select class="form-select" name="position_id" aria-label="Default select example">
              <?php foreach ($pos as $item) { ?>
                <option value="<?= $item['position_id'] ?>" selected><?= $item['position_title']; ?></option>
              <?php } ?>
            </select>

          </div>
        </div>

        <div class="col-md-3 mt-3">
          <div class="form-group">
            <label for="PartyID">Party ID</label>
            <select class="form-select" name="party_id" aria-label="Default select example">
              <?php foreach ($par as $item) { ?>
                <option value="<?= $item['party_id'] ?>" selected><?= $item['party'] ?></option>
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

</main>
<!--Modals-->
<div class="modal fade modal-signin" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title text-white" id="staticBackdropLabel">
          Login to DCC Autovote
        </h5>
        <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close">
          x
        </button>
      </div>
      <br />
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Student ID</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Student ID" />
            <small id="emailHelp" class="form-text text-muted">We'll never share your student id with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
            <a href="#" class="mt-2"><small> Forgot Password? </small> </a>
          </div>

          <div class="d-flex pt-1">
            <button type="button" id="loginbutton" class="btn btn-primary mt-2 flex-grow-1">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-signin" id="Register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title text-white" id="staticBackdropLabel">
          Register Autovote
        </h5>
        <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close">
          x
        </button>
      </div>
      <br />
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-6 mt-3" data-aos="fade-right">
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Course</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Select Course</option>
                  <option value="BSIT">BSIT</option>
                  <option value="BSCRIM">BSCRIM</option>
                  <option value="BSHM">BSHM</option>
                  <option value="BSBA">BSBA</option>
                  <option value="BSED">BSED</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Year Level</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Select Year Level</option>
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Student ID</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Student ID" />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" />
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary mt-3" name="">
            Register
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Modals-->

<?php
include('includes/footer.php');
?>