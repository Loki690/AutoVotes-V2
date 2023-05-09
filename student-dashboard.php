<?php
include('includes/admin-header.php');
require_once('class.php');
$elections = $vote->getElectionId();
$vote->session();
?>

<body onload="countdown()" class="sb-nav-fixed">



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
                    <div class="small">Logged in as: Student</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
        <main>
                <div class="d-flex justify-content-between mt-4 mx-4 my-3">
                    <h3 class=""> <i class="fas fa-home mx-3"></i>Home</h3>


                </div>
                <hr>

                <div class="row mx-3">

                    <div class="d-flex justify-content-start mt-3 mx-3 my-3">
                        <h2>Choose Election</h2>
                    </div>

                    <?php
                    date_default_timezone_set('Asia/Manila');
                    
                    foreach ($elections as $elec) {
                        $start_date = $elec['start_date'];
                        $end_date = $elec['end_date'];
                        $now = date("Y-m-d H:i:s");

                        // Check if the current time is between start_date and end_date
                        if ($now >= $start_date && $now <= $end_date) {
                    ?>
                            <?php if ($vote->isStudentVoted($voterDetails['school_id'], $elec['election_id'])) { ?>
                                <div class="col-sm-4 mt-2">
                                    <div class="card" style="border-radius:25px;" id="shadow2">
                                        <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                        <p class="px-3">Thank you for voting!</p>
                                        <img class="card-img img-fluid px-3" style="width:100%; height: 300px;" src="uploads/<?= $elec['election_poster']; ?>" alt="">
                                        <button class="btn btn-primary mx-4 my-4" disabled>You already Voted</button>
                                    </div>
                                </div>
                            <?php } else {
                            ?>
                                <div class="col-sm-4 mt-2">
                                    <div class="card" style="border-radius:25px;" id="shadow2">
                                        <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                        <p class="px-3">Please vote wisely</p>
                                        <img class="card-img img-fluid px-3" style="width:100%; height: 300px;" src="uploads/<?= $elec['election_poster']; ?>" alt="">
                                        <a type="button" class="btn btn-primary mx-4 my-4" href="student-vote.php?id=<?= $elec['election_id'] ?>">Vote here</a>
                                    </div>
                                </div>
                            <?php
                            } ?>

                        <?php
                        } else if ($now >= $end_date) {
                        ?>
                            <div class="col-sm-4  mt-2">
                                <div class="card" style="border-radius:25px;" id="shadow2">
                                    <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                    <p class="px-3">Contact MIS Interns</p>
                                    <img class="card-img img-fluid px-3" style="width:100%; height: 300px; filter:grayscale(100%);" src="uploads/<?= $elec['election_poster']; ?>" alt="poster">
                                    <div class="mask text-light d-flex justify-content-center flex-column text-center" style="background-color: rgba(0, 0, 0, 0.5)">
                                        <h4 class="position-absolute bg-danger p-3 md-1" style="top:220px; left:40px; opacity:85%;"> VOTING ENDED!</h4>
                                    </div>
                                    <button type="button" class="btn btn-primary mx-4 my-4" disabled>Voting Ended</button>
                                </div>
                            </div>
                        <?php
                        } else if ($now <= $end_date) {
                        ?>
                            <div class="col-sm-4  mt-2">
                                <div class="card" style="border-radius:25px;" id="shadow2">
                                    <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                    <p class="px-3">Upcoming Election</p>
                                    <img class="card-img img-fluid px-3" style="width:100%; height: 300px;" src="uploads/<?= $elec['election_poster']; ?>" alt="poster">
                                    <button type="button" class="btn btn-primary mx-4 my-4" disabled><?= date('F d, Y g:i A', strtotime($elec['start_date'])) ?></button>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </main>
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