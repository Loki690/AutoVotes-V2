<?php
include('includes/admin-header.php');

require_once('class.php');

$positions = $vote->getPositionId();
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
                        <a id="nav-hover" class="nav-link mt-4" href="student-dashboard.php">
                            <div class="sb-nav-link-icon" id="icon"><i class="fas fa-home"></i></div>Home
                        </a>
                        <hr class="dropdown-divider bg-dark" />


                        <a id="nav-hover" href="" class="nav-link active">
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
                    <h3 class="">My Votes</h3>
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.php" style="text-decoration: none;">
                                    <i class="fas fa-square-poll-vertical"></i> HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-list"></i> MY VOTES
                            </li>
                        </ol>
                    </nav>
                </div>

                <hr>

                <div class="container-fluid">
                <div class="row">
                        <?php foreach ($elections as $election) {
                
                            ?>
                        <div class="col-sm-3 mt-2" data-aos="fade-right">
                            <div class="card" style="border-radius:25px;" id="shadow2">
                                <h4 class="elec-name mx-3 my-3 text-truncate"><?= $election['election_name'] ?></h4>
                                <img class="elec-img px-3" src="uploads/<?= $election['election_poster'] ?>" alt="">

                                <div class="d-flex justify-content-center mb-3 mt-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" tabindex="-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#Myvotes<?= $election['election_id'] ?>">My Votes</button>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade modal-signin" id="Myvotes<?= $election['election_id'] ?>"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content rounded-5 shadow" style="border-radius: 30px">
                                    <div class="modal-header p-3 pb-3">
                                        <h5 class="modal-title" id="staticBackdropLabel">
                                            My Votes
                                        </h5>
                                        <button type="button" class="btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            x
                                        </button>
                                    </div>
                                    <br />
                                        <table class="table table-hover table-responsive px-2 py-2">
                                            <thead>
                                                <tr>
                                                <th scope="col">Position</th>
                                                <th scope="col">Candidates</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($positions as $position) {

                                                $pos_id = $position['position_id'];
                                                $myvotes = $vote->getVoterVotes($voterDetails['school_id'], $pos_id, $election['election_id'])

                                                ?>
                                                <tr>
                                                <td><?= $position['position_title'] ?></td>
                                                <td>
                                                    <?php if (!empty($myvotes)) { ?>
                                                    <?php foreach ($myvotes as $myvote) { ?>
                                                        <li class="list-unstyled">
                                                        <span class="badge rounded-pill bg-success text-white"><?= $myvote['first_name']." ".$myvote['middle_name']." ".$myvote['last_name'] ?></span>
                                                        </li>
                                                    <?php } ?>
                                                    <?php } else { ?>
                                                    <li class="list-unstyled">
                                                        <span class="badge rounded-pill bg-info text-dark">No Data</span>
                                                    </li>
                                                    <?php } ?>
                                                </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                        <?php } ?>


                    </div>
                </div>




            </main>




            <!--Footer-->
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item">
                        <div class="text-muted">Copyright &copy; TEAM DROPBOX 2023</div>
                    </li>
                </ul>
            </footer>
        </div>








        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>