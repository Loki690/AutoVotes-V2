<!-- Modals add admin-->

<div class="modal fade modal-signin" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Adding Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">

          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" name="first_name" class="form-control" placeholder="First Name" id="" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="MiddleName" class="col-sm-4 col-form-label">Middle Name</label>
            <div class="col-sm-8">
              <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" id="" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="LastName" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
              <input type="text" name="last_name" class="form-control" placeholder="Last Name" id="" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-4 col-form-label">Access Code</label>
            <div class="col-sm-8">
              <input type="text" name="access_code" class="form-control" placeholder="Access Code" id="" value="<?= $accesscode; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="add-admin">Add as Admin</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- edit admin info -->
<div class="modal fade modal-signin" id="edit-admin<?= $item['admin_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Name of the admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" name="first_name" class="form-control" value="<?= $item['first_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="MiddleName" class="col-sm-4 col-form-label">Middle Name</label>
            <div class="col-sm-8">
              <input type="text" name="middle_name" class="form-control" value="<?= $item['middle_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="LastName" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
              <input type="text" name="last_name" class="form-control" value="<?= $item['last_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-4 col-form-label">Access Code</label>
            <div class="col-sm-8">
              <input type="text" name="access_code" class="form-control" value="<?= $item['accesscode'] ?>">
              <input type="hidden" name="admin_id" value="<?= $item['admin_id'] ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="edit-admin">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- delete admin info -->
<div class="modal fade modal-signin" id="delete-admin<?= $item['admin_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Delete
          <?= $item['first_name'] . " " . $item['last_name']; ?>?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" name="first_name" class="form-control" value="<?= $item['first_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="MiddleName" class="col-sm-4 col-form-label">Middle Name</label>
            <div class="col-sm-8">
              <input type="text" name="middle_name" class="form-control" value="<?= $item['middle_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="LastName" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
              <input type="text" name="last_name" class="form-control" value="<?= $item['last_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-4 col-form-label">Access Code</label>
            <div class="col-sm-8">
              <input type="text" name="access_code" class="form-control" value="<?= $item['accesscode'] ?>">
              <input type="hidden" name="admin_id" value="<?= $item['admin_id'] ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" name="delete-admin">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal for adding comelec -->
<div class="modal fade modal-signin" id="add-comelec" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Adding COMELEC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">

          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-3 col-form-label">First Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="first_name" placeholder="First Name" id="" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="MiddleName" class="col-sm-3 col-form-label">Middle Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="last_name" placeholder="Middle Name" id="" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="LastName" class="col-sm-3 col-form-label">Last Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="middle_name" placeholder="Last Name" id="" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-3 col-form-label">Access Code: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accesscode" placeholder="Access Code" id="" required>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="add-comelec">Add as Comelec</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!--Login and Register Modal-->
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
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="school_id" placeholder="Student ID" required />
          </div>
          <div class="form-group mt-2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required />
          </div>
          <div class="d-flex pt-1">
            <button type="submit" id="loginbutton" name="login-voter" class="btn btn-primary mt-2 flex-grow-1">
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
          Voter's Registration
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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name" placeholder="Jerecho" required />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="last_name" placeholder="Miles" required />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                <select class="form-select" name="gender" aria-label="Default select example" required>
                  <option selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Course</label>
                <select class="form-select" name="course" aria-label="Default select example" required>
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
                <select class="form-select" name="year_level" aria-label="Default select example" required>
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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="school_id" placeholder="Valid student ID number" required />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" placeholder="Enter Password" required />
              </div>
            </div>
          </div>

          <button type="submit" name="voter-register" class="btn btn-primary mt-3">
            Register
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- edit comelec info -->
<div class="modal fade modal-signin" id="edit-comelec<?= $comelec['admin_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Name of the admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" name="first_name" class="form-control" value="<?= $comelec['first_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="MiddleName" class="col-sm-4 col-form-label">Middle Name</label>
            <div class="col-sm-8">
              <input type="text" name="middle_name" class="form-control" value="<?= $comelec['middle_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="LastName" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
              <input type="text" name="last_name" class="form-control" value="<?= $comelec['last_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-4 col-form-label">Access Code</label>
            <div class="col-sm-8">
              <input type="text" name="access_code" class="form-control" value="<?= $comelec['accesscode'] ?>">
              <input type="hidden" name="admin_id" value="<?= $comelec['admin_id'] ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="edit-comelec">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- delete comelec info -->
<div class="modal fade modal-signin" id="delete-comelec<?= $comelec['admin_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Delete
          <?= $comelec['first_name'] . " " . $comelec['last_name']; ?>?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" name="first_name" class="form-control" value="<?= $comelec['first_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="MiddleName" class="col-sm-4 col-form-label">Middle Name</label>
            <div class="col-sm-8">
              <input type="text" name="middle_name" class="form-control" value="<?= $comelec['middle_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="LastName" class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
              <input type="text" name="last_name" class="form-control" value="<?= $comelec['last_name'] ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-4 col-form-label">Access Code</label>
            <div class="col-sm-8">
              <input type="text" name="access_code" class="form-control" value="<?= $comelec['accesscode'] ?>">
              <input type="hidden" name="admin_id" value="<?= $comelec['admin_id'] ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" name="delete-comelec">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add election -->



<div class="modal fade modal-signin" id="election" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Adding Election</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="mb-3 row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Election Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="election_name" placeholder="Election Name" id="" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="ElectionDate" class="col-sm-3 col-form-label">Election Date: </label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="election_date" placeholder="Election Date" id="">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-3 col-form-label">Start Time: </label>
            <div class="col-sm-4">
              <select class="form-select" aria-label="Default select example" name="election_start">
                <option selected>Select Time</option>
                <option value="6">6AM</option>
                <option value="7">7AM</option>
                <option value="8">8AM</option>
                <option value="9">9AM</option>
                <option value="10">10AM</option>
                <option value="11">11AM</option>
                <option value="12">12PM</option>
                <option value="13">1PM</option>
                <option value="14">2PM</option>
                <option value="15">3PM</option>
                <option value="16">4PM</option>
                <option value="17">5PM</option>
                <option value="18">6PM</option>
                <option value="19">7PM</option>
                <option value="20">8PM</option>
                <option value="21">9PM</option>
                <option value="22">10PM</option>
                <option value="23">11PM</option>
              </select>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-3 col-form-label">End Time: </label>
            <div class="col-sm-4">
              <select class="form-select" aria-label="Default select example" name="election_end">
                <option selected>Select Time</option>
                <option value="6">6AM</option>
                <option value="7">7AM</option>
                <option value="8">8AM</option>
                <option value="9">9AM</option>
                <option value="10">10AM</option>
                <option value="11">11AM</option>
                <option value="12">12PM</option>
                <option value="13">1PM</option>
                <option value="14">2PM</option>
                <option value="15">3PM</option>
                <option value="16">4PM</option>
                <option value="17">5PM</option>
                <option value="18">6PM</option>
                <option value="19">7PM</option>
                <option value="20">8PM</option>
                <option value="21">9PM</option>
                <option value="22">10PM</option>
                <option value="23">11PM</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ElectionDate" class="col-sm-3 col-form-label">Election Poster</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="election_poster" id="" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="add-election">Add Election</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- edit elections -->
<div class="modal fade modal-signin" id="edit-election<?= $elec['election_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Election</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="mb-3 row">
            <label for="ElectionDate" class="col-sm-3 col-form-label">Update Poster</label>
            <div class="d-flex col-md-8">
              <input type="hidden" name="election_id" value="<?= $elec['election_id'] ?>">
              <input type="file" class="form-control mx-2" name="election_poster" id="election_poster" value="uploads/<?= $elec['election_poster']; ?>" required>
              <button type="submit" class="btn btn-success" name="update-poster">Update</button>
            </div>
          </div>
          <div class="row">
            <label for="ElectionDate" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
              <img class="img-fluid rouded-circle mx-sm-3" src="uploads/<?= $elec['election_poster']; ?>" alt="Election Poster" width="100px">
            </div>
          </div>
        </div>
      </form>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="mb-3 row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Election Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $elec['election_name'] ?>" name="election_name" id="" required>
            </div>
          </div>
          <div class="mb-3 row">
          <label for="ElectionDate" class="col-sm-3 col-form-label">Election Date: </label>
            <div class="col-sm-4">
            <input type="datetime-local" class="form-control" id="birthdaytime" name="election_start" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-3 col-form-label">Election End: </label>
            <div class="col-sm-4">
            <input type="datetime-local" class="form-control" id="birthdaytime" name="election_end" required>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-8">
              <select class="form-select" aria-label="Default select example" name="status">
                <option value="<?= $elec['x'] ?>" selected><?= $elec['x'] ?></option>
                <option value="active">active</option>
                <option value="inactive">inactive</option>
                <option value="completed">completed</option>
              </select>
            </div>
          </div>
          <input type="hidden" value="<?= $elec['election_id']; ?>" name="election_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="edit-election">Edit Election</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- delete election  -->
<div class="modal fade modal-signin" id="delete-election<?= $elec['election_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Election</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Election Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $elec['election_name'] ?>" name="election_name" id="" readonly>
            </div>
          </div>
          <input type="hidden" value="<?= $elec['election_id']; ?>" name="election_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="delete-election">Delete Election</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- generate qr code for election  -->
<div class="modal fade modal-signin" id="create-qr<?= $elec['election_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">GENERATE QR CODE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="d-flex justify-content-center mb-4" id="qrcode<?= $elec['election_id']?>">
            <img class="" src="" alt="">
          </div>
          
          <div class="mb-3 row">
            <label for="input<?= $elec['election_id'] ?>" class="col-sm-2 col-form-label">Url:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="input<?= $elec['election_id'] ?>" name="input" value="<?= 'http://192.168.0.114/AutoVotes-V2/student-vote.php?id=' . $elec['election_id'] ?>">
            </div>
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-primary mt-3 mx-3" onclick="generateQR('<?= $elec['election_id'] ?>')" id="generate-btn<?= $elec['election_id'] ?>">Generate QR Code</button>
              <button type="button" class="btn btn-primary mt-3" onclick="downloadQR('<?= $elec['election_id'] ?>')" id="download-btn<?= $elec['election_id'] ?>" disabled>Download QR Code</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-primary" name="save-qr">Save QR</button> -->
        </div>
      </form>
    </div>
  </div>

  <script>
    var qrcode;

    function generateQR(election_id) {
      var input = document.getElementById("input" + election_id).value;
      if (input.trim() === "") {
        alert("Please enter some text to encode.");
        return;
      }
      var qrcode = new QRCode(document.getElementById("qrcode" + election_id), {
        text: input,
        width: 256,
        height: 256,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
      });
      document.getElementById("generate-btn" + election_id).disabled = true;
      document.getElementById("download-btn" + election_id).disabled = false;
    }

    function downloadQR(election_id) {
      var canvas = document.getElementById("qrcode" + election_id).getElementsByTagName("canvas")[0];
      var img = canvas.toDataURL("image/png");
      var link = document.createElement("a");
      link.download = "<?= $elec['election_name'] ?>.png";
      link.href = img;
      link.click();
    }
  </script>
</div>

<!-- delete voter -->
<div class="modal fade modal-signin" id="delete-voter<?= $voter['student_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Voter's Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $voter['first_name'] . " " . $voter['middle_name'] . " " . $voter['last_name'] ?>" name="election_name" id="" readonly>
            </div>
          </div>
          <input type="hidden" value="<?= $voter['student_id']; ?>" name="voter_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="delete-voter">Delete Voter</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- Adding Position -->
<div class="modal fade modal-signin" id="addPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Adding Position</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">

          <div class="mb-3 row">
            <label for="Position" class="col-sm-3 col-form-label">Position: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Position" id="" name="position" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="type" class="col-sm-3 col-form-label">Type: </label>
            <div class="col-sm-8">
              <select class="form-select" aria-label="Default select example" name="type" id="type-select">
                <option selected>Select Type</option>
                <option value="single">Single</option>
                <option value="multiple">Multiple</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row form-group" id="count-input" style="display: none;">
            <label for="position_count" class="col-sm-3 col-form-label">Max #: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="count" placeholder="Max #">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="add-position">Add Position</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- delete posotion -->
<div class="modal fade modal-signin" id="delete-posotion<?= $pos['position_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Position Title: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $pos['position_title'] ?>" name="election_name" id="" readonly>
            </div>
          </div>
          <input type="hidden" value="<?= $pos['position_id']; ?>" name="position_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="delete-position">Delete Position</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- edit position -->
<div class="modal fade modal-signin" id="edit-posotion<?= $pos['position_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Position</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">

          <div class="mb-3 row">
            <label for="Position" class="col-sm-3 col-form-label">Position: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Position" id="" name="position" value="<?= $pos['position_title'] ?>">
              <input type="hidden" value="<?= $pos['position_id'] ?>" name="position_id">
            </div>
          </div>

          <!-- <div class="mb-3 row">
                        <label for="type" class="col-sm-3 col-form-label">Type: </label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" name="type" id="type-select<?= $pos['position_id'] ?>">
                                <option value="<?= $pos['type'] ?>" selected >Select Type</option>
                                <option value="single">Single</option>
                                <option value="multiple">Multiple</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row form-group"  id="count-input<?= $pos['position_id'] ?>" style="display: none;">
                    <label for="position_count" class="col-sm-3 col-form-label">Max #: </label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" name="count" placeholder="Max #">
                        </div>
                    </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="edit-position">Edit Position</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- add requirements  -->
<div class="modal fade modal-signin" id="add-requirement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Adding Requirements</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">

          <div class="mb-3 row">
            <label for="Requirement" class="col-sm-3 col-form-label">Requirement: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Requirement" id="" name="requirement">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="add-requirement">Add Requiment</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- delete requirement -->
<div class="modal fade modal-signin" id="delete-requirement<?= $req['requirement_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Position Title: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $req['requirement'] ?>" name="election_name" id="" readonly>
            </div>
          </div>
          <input type="hidden" value="<?= $req['requirement_id'] ?>" name="requirement_id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="delete-requirement">Delete</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- edit requirements -->
<div class="modal fade modal-signin" id="edit-requirement<?= $req['requirement_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Requirement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Position Title: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $req['requirement'] ?>" name="requirement" id="" required>
            </div>
          </div>
          <input type="hidden" value="<?= $req['requirement_id'] ?>" name="requirement_id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="edit-requirement">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- add party -->
<div class="modal fade modal-signin" id="add-party" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Add Party</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">

          <div class="mb-3 row">
            <label for="inputParty" class="col-sm-3 col-form-label">Party Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Party" id="" name="party">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="add-party">Add Party</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- 
edit party -->
<div class="modal fade modal-signin" id="edit-party<?= $party['party_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Requirement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Party Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $party['party'] ?>" name="party" id="" required>
            </div>
          </div>
          <input type="hidden" value="<?= $party['party_id'] ?>" name="party_id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="edit-party">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- delete party -->
<div class="modal fade modal-signin" id="delete-party<?= $party['party_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Party Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $party['party'] ?>" name="party" id="" readonly>
            </div>
          </div>
          <input type="hidden" value="<?= $party['party_id'] ?>" name="party_id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="delete-party">Delete</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- 
accept candidate -->
<div class="modal fade modal-signin" id="accept-applicant<?= $applicant['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Candidate for <?= $pos['position_title']; ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Candidates Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $applicant['first_name'] . " " . $applicant['middle_name'] . " " . $applicant['last_name']; ?>" name="applicant_name" id="" readonly>
            </div>
          </div>
          <input type="hidden" value="<?= $applicant['id'] ?>" name="id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="accept-candidate">Accept as Candidate</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- denied candidate -->
<div class="modal fade modal-signin" id="denied-applicant<?= $applicant['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Denied Candidate for <?= $pos['position_title']; ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row mb-3">
            <label for="ElectionName" class="col-sm-3 col-form-label">Note: </label>
            <div class="col-sm-8">
              <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="4"></textarea>
            </div>
          </div>
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Candidates Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $applicant['first_name'] . " " . $applicant['middle_name'] . " " . $applicant['last_name']; ?>" name="applicant_name" id="" readonly>
            </div>
          </div>
          <input type="hidden" value="<?= $applicant['id'] ?>" name="id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="denied-candidate">Denied as Candidate</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- delete denied applicant -->
<div class="modal fade modal-signin" id="delete-denied<?= $applicant['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Applicant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body p-5 pt-0">
          <div class="row">
            <label for="ElectionName" class="col-sm-3 col-form-label">Applicant Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $applicant['first_name'] . " " . $applicant['middle_name'] . " " . $applicant['last_name']; ?>" name="applicant_name" id="" readonly>
            </div>
          </div>
          <input type="hidden" value="<?= $applicant['id'] ?>" name="id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="delete-denied">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- view candidates -->

<!--Modals-->