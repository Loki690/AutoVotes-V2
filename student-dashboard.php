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
                            <?php if ($vote->isStudentVoted($voterDetails['school_id'], $elec['election_id'])) { ?>
                                <div class="col-sm-4 mt-2">
                                    <div class="card" style="border-radius:25px;" id="shadow2">
                                        <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                        <p><?= date('F d, Y g:i A', strtotime($elec['end_date'])) ?></p>
                                        <img class="card-img img-fluid" style="width:500px; height: 300px;" src="uploads/<?= $elec['election_poster']; ?>" alt="">
                                        <button class="btn btn-primary mx-4 my-4" disabled>You already Voted</button>
                                    </div>
                                </div>
                            <?php } else {
                            ?>
                                <div class="col-sm-4 mt-2">
                                    <div class="card" style="border-radius:25px;" id="shadow2">
                                        <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                        <p class="px-3"><?= date('F d, Y g:i A', strtotime($elec['end_date'])) ?></p>
                                        <img class="card-img img-fluid" style="width:500px; height: 300px;" src="uploads/<?= $elec['election_poster']; ?>" alt="">
                                        <a type="button" class="btn btn-primary mx-4 my-4" href="student-vote.php?id=<?= $elec['election_id'] ?>">Vote here</a>
                                    </div>
                                </div>
                            <?php
                            } ?>

                        <?php
                        } else {
                        ?>
                            <script type="text/javascript">
                                function countdown() {


                                    var now = new Date();
                                    var eventDate = new Date("<?= date('F d, Y g:i A',strtotime($elec['start_date'] )) ?>");

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
                            <div class="col-sm-4 mt-2">
                                <div class="card" style="border-radius:25px;" id="shadow2">
                                    <h4 class="elec-name mx-3 my-3 text-truncate"><?= $elec['election_name'] ?></h4>
                                    <img class="card-img img-fluid" style="width:500px; height: 300px;" src="uploads/<?= $elec['election_poster']; ?>" alt="">
                                    <button type="button" class="btn btn-warning mx-4 my-4" disabled>Voting Ended</button>
                                    <div class="d-flex justify-content-center">
                                    <p class="px-2"><span id="days"></span><span class=""> Days</span></p>
                                    <p class="px-2"><span id="hours"></span><span class=""> Hours</span></p>
                                    <p class="px-2"><span id="minutes"></span><span class=""> Minutes</span></p>
                                    <p class="px-2"><span id="seconds"></span><span class=""> Seconds</span></p>
                                    </div>
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