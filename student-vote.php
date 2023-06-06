<?php
include('includes/admin-header.php');
require_once('class.php');
$elec_id = $_GET['id'];
$election = $vote->getElection($elec_id);
$positions = $vote->getPositionId();
$vote->session();
// $vote->isElectionEnded($end_date, $start_date, $elec_id);
?>


<body class="sb-nav-fixed">
    <?php include('includes/user-nav.php');


    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" class="nav-link mt-4 active" href="">
                            <div class="sb-nav-link-icon" id="icon"><i class="fas fa-home"></i></div>Home
                        </a>
                        <hr class="dropdown-divider bg-dark" />

                        <a id="nav-hover" href="student-myvotes.php" class="nav-link">
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
                <div class="d-flex justify-content-between mt-4 mx-2 my-2">
                    <h3 class="elec-name">
                        <a class="navbar-brand mx-2" href="#">
                            <img src="uploads/<?= $election['election_poster']; ?>" width="50" height="50" alt="" />
                        </a>
                        <?= $election['election_name'] ?>
                    </h3>
                    <nav class="mt-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.php" style="text-decoration: none;">
                                    <i class="fas fa-home"></i> HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-vote-yea"></i>
                                <?= $election['election_name'] ?></li>
                        </ol>
                    </nav>
                </div>

                <hr>

                <?php

                $vote->vote2();
                ?>
                <form action="" method="POST" id="submitform">
                    <div class="container">

                        <?php foreach ($positions as $pos) {

                            $position_id = $pos['position_id'];
                            $candidates = $vote->getCandidate($elec_id, $position_id, $voterDetails['school_id']);

                        ?>

                            <?php if (!empty($candidates)) { ?>
                                <div class="row mx-2">
                                    <h1 class="mx-3 mt-5 fw-bold text-center"> Running for <?= $pos['position_title'] ?>
                                    </h1>
                                    <h4 class="mx-3 mt-4 text-center"> Only Vote <?= $pos['count'] . " " . $pos['position_title'] ?>
                                    </h4>
                                    <input type="hidden" value="<?= $pos['count'] ?>" name="pos_count">
                                    <?php foreach ($candidates as $candi) {
                                    ?>

                                        <div class="col-sm-3 mt-1">



                                            <div class="card mt-3" style="border-radius:25px;" id="shadow2">

                                                <h5 class="name mx-3 my-3 text-center">
                                                    <?= $candi['first_name'] . " " . $candi['last_name'] ?>
                                                </h5>

                                                <img class="vote-img img-fluid px-2" src="uploads/<?= $candi['photo'] ?>" alt="">

                                                <?php if ($pos['type'] == 'single') { ?>
                                                    <div class="d-flex justify-content-center mt-3 mb-3">
                                                        <input type="hidden" value="<?= $voterDetails['school_id'] ?>" name="voter_id">
                                                        <input type="hidden" value="<?= $candi['position_id'] ?>" name="pos_id[<?= $candi['id'] ?>]">
                                                        <input type="hidden" value="<?= $elec_id ?>" name="elec_id">
                                                        <div class="d-flex justify-content-center">
                                                            <input class="mx-3" type="radio" id="myRadioButton" name="candi_id[<?= $candi['position_id'] ?>]" value="<?= $candi['id'] ?>" required>
                                                            <label for="myRadioButton">Vote</label>
                                                        </div>
                                                    </div>
                                                <?php } elseif ($pos['type'] == 'multiple') { ?>
                                                    <div class="d-flex justify-content-center mt-3 mb-3">
                                                        <input type="hidden" value="<?= $voterDetails['school_id'] ?>" name="voter_id">
                                                        <input type="hidden" value="<?= $candi['position_id'] ?>" name="pos_id[<?= $candi['id'] ?>]">
                                                        <input type="hidden" value="<?= $elec_id ?>" name="elec_id">
                                                        <div class="d-flex justify-content-center">
                                                            <input class="mx-3 candi-checkbox" type="checkbox" id="checkbox<?= $candi['position_id'] ?><?= $candi['id'] ?>" name="candi_id[]" value="<?= $candi['id'] ?>" data-position-count="<?= $pos['count'] ?>" required>
                                                            <label for="checkbox<?= $candi['position_id'] ?><?= $candi['id'] ?>">Vote</label>
                                                        </div>
                                                    </div>
                                                <?php } ?>


                                                <script>
                                                    var checkboxes<?= $candi['position_id'] ?> = document.querySelectorAll('.candi-checkbox[data-position-count="<?= $pos['count'] ?>"]');
                                                    checkboxes<?= $candi['position_id'] ?>.forEach(function(checkbox) {
                                                        checkbox.addEventListener('change', function() {
                                                            var checkedCount = document.querySelectorAll('.candi-checkbox[data-position-count="<?= $pos['count'] ?>"]:checked').length;
                                                            if (checkedCount >= <?= $pos['count'] ?>) {
                                                                checkboxes<?= $candi['position_id'] ?>.forEach(function(uncheckedCheckbox) {
                                                                    if (!uncheckedCheckbox.checked) {
                                                                        uncheckedCheckbox.disabled = true;
                                                                    }
                                                                });

                                                            } else {
                                                                checkboxes<?= $candi['position_id'] ?>.forEach(function(checkbox) {
                                                                    checkbox.disabled = false;
                                                                });
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            <?php } ?>
                        <?php } ?>

                        <?php
                        date_default_timezone_set('Asia/Manila');
                        $start_date = $election['start_date'];
                        $end_date = $election['end_date'];
                        $now = date("Y-m-d H:i:s");

                        // Check if the current time is between start_date and end_date
                        if ($now >= $start_date && $now <= $end_date) {
                        ?>
                            <div class="d-flex justify-content-center mt-5">
                                <input class="btn btn-lg btn-primary" type="reset" value="Reset">
                                <button class="btn btn-lg btn-primary mx-3" type="submit" name="vote" id="submitvotes" onclick="disableButton()">Submit My Votes</button>

                            </div>
                        <?php } else if ($now >= $end_date) {
                        ?>
                            <div class="d-flex justify-content-center mt-5">
                                <button type="button" class="btn btn-primary mx-3" disabled>Voting Ended</button>
                            </div>
                        <?php
                        } else if ($now <= $end_date) {
                        ?>
                            <div class="d-flex justify-content-center mt-5">
                                <input class="btn btn-lg btn-primary" type="reset" value="Upcoming" disabled>
                                <button type="button" class="btn btn-primary mx-3" disabled><?= date('F d, Y g:i A', strtotime($election['start_date'])) ?></button>
                            </div>
                        <?php
                        } ?>

                    </div>

                    </head>

                </form>
                <script>
                    function disableButton() {
                        var btn = document.getElementById("submitvotes");
                        btn.disabled = true; // Disable the button
                        btn.innerText = "Processing..."; // Change button text to indicate processing

                        // Get form data
                        var formData = new FormData(document.getElementById("submitform"));

                        // Send form data to server-side script
                        $.ajax({
                            type: "POST",
                            url: "voteprocess.php", // Replace with your server-side script URL
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                btn.innerText = "Processed";
                                console.log(response);

                                // // Delay before displaying success message
                                setTimeout(function() {
                                    swal({
                                        title: "Voting Success!",
                                        icon: "success"
                                    }).then((success) => {
                                        if (success) {
                                            window.location.href = 'student-myvotes.php';
                                        }
                                    });
                                }, 2000); // Delay for 2 seconds (2000 milliseconds)
                                setTimeout(function() {
                                    window.location.href = 'voting-thanks.php?id=<?= $election['election_id'] ?>';
                                }, 4000)
                            },
                            error: function(xhr, status, error) {
                                btn.disabled = false; // Enable the button if an error occurs
                                btn.innerText = "Error";
                                console.error(error);
                            }
                        });
                    }
                </script>


            </main>
            <!--Footer-->
            <footer class="py-3 my-3">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item">
                        <div class="text-muted">Copyright &copy; TEAM DROPBOX 2023</div>
                    </li>
                </ul>
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