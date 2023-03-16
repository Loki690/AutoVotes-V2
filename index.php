<?php

  require_once('class.php');
  $vote->Login();
  
  include('header.php');
?>

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
          <button type="button" class="btn btn-outline-light mx-3" tabindex="-1" data-bs-toggle="modal"
            data-bs-target="#login">
            Login
          </button>

          <button type="button" class="btn btn-outline-light mx-3" tabindex="-1" data-bs-toggle="modal"
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
      <h5 class="title-app display-1 mb-5">AUTOVOTES</h5>
    </div>
    <!--Candidates-->
    <div class="container">
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
              <input type="text" class="form-control" name="school_id" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Student ID">
              <small id="emailHelp" class="form-text text-muted">We'll never share your student id with anyone
                else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Password">
              <a href="#" class="mt-2"><small> Forgot Password? </small> </a>

            </div>
            <div class="d-flex pt-1">
              <button type="submit" id="loginbutton" name="login-voter" class="btn btn-primary mt-2 flex-grow-1">Login</button>
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


            <div class="row">

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="First Name">

                </div>

              </div>

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Last Name">

                </div>

              </div>

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Gender</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                  </select>

                </div>

              </div>

              <div class="col-sm-5">
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

              <div class="col-sm-5">
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

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Student ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Student ID">
                </div>

              </div>

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter Password">
                </div>

              </div>


            </div>


            <button type="submit" class="btn btn-primary mt-3">Register </button>







          </form>
        </div>
      </div>
    </div>

  </div>
  <!--Modals-->

  <?php
  include('footer.php');
  ?>