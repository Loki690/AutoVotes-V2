<!-- Modals add admin-->
<?php
require_once('class.php');

$vote->addAdmin();
$vote->editAdmin();
$vote->deleteAdmin();

?>
<div class="modal fade modal-signin" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Adding Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">
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

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add-admin">Add as Admin</button>
          </div>
        </form>
      </div>
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
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" name="first_name" class="form-control" value="<?= $item['first_name'] ?>" >
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
              <input type="text" name="admin_id" value="<?= $item['admin_id']?>">
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
</div>


<!-- delete admin info -->
<div class="modal fade modal-signin" id="delete-admin<?= $item['admin_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
      <div class="modal-header p-3 pb-3">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Name of the admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <div class="modal-body p-5 pt-0">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" name="first_name" class="form-control" value="<?= $item['first_name'] ?>" >
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
              <input type="text" name="admin_id" value="<?= $item['admin_id']?>">
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
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="school_id" placeholder="Student ID" />
            <small id="emailHelp" class="form-text text-muted">We'll never share your student id with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" />
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
<!--Modals-->