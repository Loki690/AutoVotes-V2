<?php
include('includes/admin-header.php');
require_once('class.php');
$elections = $vote->getElectionId();
$vote->session();
?>

<body class="sb-nav-fixed">

    <?php include('includes/user-nav.php') ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" class="nav-link mt-4 active" href="student-dashboard.php">
                            <div class="sb-nav-link-icon" id="icon"><i class="fas fa-home"></i></div>Home
                        </a>
                        <hr class="dropdown-divider bg-dark" />

                        <a id="nav-hover" href="student-myvotes.php" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list" id="icon"></i></div>My Votes
                        </a>
                        <hr class="dropdown-divider bg-dark" />



                    </div>

                </div>
                <div class="sb-sidenav-footer" id="nav-footer">
                    <div class="small">Logged in as:</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="d-flex justify-content-between mt-4 mx-4 my-3">
                    <h3 class=""> <i class="fas fa-home mx-3"></i>Home</h3>


                </div>
                <hr>

                <div class="row mx-4">

                    <div class="d-flex justify-content-start mt-3 mx-3 my-3">
                        <h2>Choose Election</h2>
                    </div>
                    <?php foreach ($elections as $elec) {
                        $start_date = $elec['start_date'];
                        $end_date = $elec['end_date'];
                        $now = date("Y-m-d H:i:s");

                        // Check if the current time is between start_date and end_date
                        if ($now >= $start_date && $now <= $end_date) {
                    ?>
                            <div class="col-sm-4 mt-2">
                                <div class="card" style="border-radius:25px;" id="shadow2">
                                    <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                    <img class="card-img img-fluid" style="width:500px; height: 300px;" src="uploads/<?= $elec['election_poster']; ?>" alt="">
                                    <a type="button" class="btn btn-primary mx-4 my-4" href="student-vote.php?id=<?= $elec['election_id'] ?>">Vote here</a>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-sm-4 mt-2">
                                <div class="card" style="border-radius:25px;" id="shadow2">
                                    <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                    <img class="card-img img-fluid" style="width:500px; height: 300px;" src="uploads/<?= $elec['election_poster']; ?>" alt="">
                                    <button type="button" class="btn btn-warning mx-4 my-4" disabled>Voting Disabled</button>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <!-- <div class="col-sm-4 mt-2">
                       
                            <div class="card">
                                <h3 class="mx-3 my-3"> ITE Election 3rd year</h3>
                                <img class="img-fluid mx-3 my-3" src="img/ITE.png" alt="">
                                
                                <a type="button" class="btn btn-primary mx-4 my-4" href="Student-Select-Candidates.html">Vote here..</a>
                            </div>

                        </div>

                        <div class="col-sm-4 mt-2">
                  
                            <div class="card">
                                <h3 class="mx-3 my-3"> ITE Election 1st year</h3>
                            
                                <img class="img-fluid mx-3 my-3" src="img/ITE.png" alt="">
                              <a type="button" class="btn btn-primary mx-4 my-4" href="Student-Select-Candidates.html">Vote here..</a>
                            </div>

                        </div> -->
                </div>
            </main>

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
                                    <label for="inputPassword" class="col-sm-3 col-form-label">First Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="First Name" id="">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="MiddleName" class="col-sm-3 col-form-label">Middle Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="Middle Name" id="">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="LastName" class="col-sm-3 col-form-label">Last Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="Last Name" id="">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="Access Code" class="col-sm-3 col-form-label">Access Code: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="Access Code" id="">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Add as Admin</button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; TEAM DROPBOX 2023</div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>