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
              <input type="text" name="access_code" class="form-control" placeholder="Access Code" id="" required>
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
        <h5 class="modal-title" id="staticBackdropLabel">Delete <?= $item['first_name'] . " " . $item['last_name']; ?>?</h5>
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
            <small id="emailHelp" class="form-text text-muted">We'll never share your student id with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required />
            <a href="#" class="mt-2"><small>Forgot Password? </small> </a>
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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name" placeholder="First Name" />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="last_name" placeholder="Last Name" />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                <select class="form-select" name="gender" aria-label="Default select example">
                  <option selected>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Course</label>
                <select class="form-select" name="course" aria-label="Default select example">
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
                <select class="form-select" name="year_level" aria-label="Default select example">
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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="school_id" placeholder="Student ID" />
              </div>
            </div>

            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" placeholder="Enter Password" />
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
        <h5 class="modal-title" id="staticBackdropLabel">Delete <?= $comelec['first_name'] . " " . $comelec['last_name']; ?>?</h5>
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
<!-- 
edit electios -->
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
            <label for="ElectionName" class="col-sm-3 col-form-label">Election Name: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" value="<?= $elec['election_name'] ?>" name="election_name" id="" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="ElectionDate" class="col-sm-3 col-form-label">Election Date: </label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="election_date" id="">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-3 col-form-label">Start Time: </label>
            <div class="col-sm-4">
              <select class="form-select" aria-label="Default select example" name="election_start">
                <option selected>Select Time</option>
                <option value="6">6 AM</option>
                <option value="7">7 AM</option>
                <option value="8">8 AM</option>
                <option value="9">9 AM</option>
                <option value="10">10 AM</option>
                <option value="11">11 AM</option>
                <option value="12">12 PM</option>
                <option value="13">1 PM</option>
                <option value="14">2 PM</option>
                <option value="15">3 PM</option>
                <option value="16">4 PM</option>
                <option value="17">5 PM</option>
                <option value="18">6 PM</option>
                <option value="19">7 PM</option>
                <option value="20">8 PM</option>
                <option value="21">9 PM</option>
                <option value="22">10 PM</option>
                <option value="23">11 PM</option>
              </select>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" value="<?=  date('F d, Y g:i A',strtotime($elec['start_date'] )) ?>" readonly>
           
            </div>
          </div>

          <div class="mb-3 row">
            <label for="Access Code" class="col-sm-3 col-form-label">End Time: </label>
            <div class="col-sm-4">
              <select class="form-select" aria-label="Default select example" name="election_end">
                <option selected>Select Time</option>
                <option value="6">6 AM</option>
                <option value="7">7 AM</option>
                <option value="8">8 AM</option>
                <option value="9">9 AM</option>
                <option value="10">10 AM</option>
                <option value="11">11 AM</option>
                <option value="12">12 PM</option>
                <option value="13">1 PM</option>
                <option value="14">2 PM</option>
                <option value="15">3 PM</option>
                <option value="16">4 PM</option>
                <option value="17">5 PM</option>
                <option value="18">6 PM</option>
                <option value="19">7 PM</option>
                <option value="20">8 PM</option>
                <option value="21">9 PM</option>
                <option value="22">10 PM</option>
                <option value="23">11 PM</option>
              </select>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" value="<?=  date('F d, Y g:i A',strtotime($elec['end_date'] )) ?>" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ElectionDate" class="col-sm-3 col-form-label">Update Poster</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="election_poster" id="" value="<?= $elec['election_poster']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ElectionDate" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-8">
             <img src="uploads/<?= $elec['election_poster']; ?>" alt="Election Poster" width="100px" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-8">
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="<?= $elec['x'] ?>" selected><?= $elec['x']?></option>
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
              <input type="text" class="form-control" value="<?= $elec['election_name']?>" name="election_name" id="" readonly>
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
<!--Modals-->