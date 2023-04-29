<?php

include('includes/admin-header.php');
require_once('class.php');
$vote->adminSession();
$voteResults = $vote->getCandidates();
$getElection = $vote->getElectionId()


?>

<body class="sb-nav-fixed">
    <?php
    include('includes/admin-nav.php');
    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" class="nav-link mt-4" href="comelec.php">
                            <div class="sb-nav-link-icon" id="icon"><i class="fas fa-home"></i></div>Home
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="comelec-approval.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-check-square fa-spin" id="icon"></i></div>Approval
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="comelec-disapproved.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-trash" id="icon"></i></div>Disapproved
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="comelec-voter.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-user" id="icon"></i></div>Voter
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="comelec-results.php" class="nav-link active">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical" id="icon"></i></div>Results
                        </a>
                        <hr class="dropdown-divider bg-dark" />

                        <a id="nav-hover" href="comelec-position.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class='fas fa-user' id="icon"></i></div>Position
                        </a>
                        <hr class="dropdown-divider bg-white" />

                        <a id="nav-hover" href="comelec-requirement.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-asterisk" id="icon"></i></div>Requirement
                        </a>
                        <hr class="dropdown-divider bg-white" />

                        <a id="nav-hover" href="comelec-party.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-hand-fist" id="icon"></i></div>Party
                        </a>
                        <hr class="dropdown-divider bg-white" />

                    </div>

                </div>
                <div class="sb-sidenav-footer" id="nav-footer">
                    <div class="small text-white">Logged in as: <?= $adminDetails['last_name'] ?></div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="d-flex justify-content-between mt-4 mx-4 my-3">



                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="comelec-voter.php" style="text-decoration: none;"> <i class="fa-solid fa-user"></i> VOTER</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-square-poll-vertical"></i> RESULTS</li>
                        </ol>
                    </nav>

                </div>
                <hr>
                <div class="d-flex justify-content-between mt-4 mx-4 my-3">

                    <form class="d-flex" method="post" action="">
                        <select class="form-select" name="election" aria-label="Default select example">
                            <option selected>Select Election</option>
                            <?php foreach ($getElection as $elec) { ?>
                                <option value="<?= $elec['election_id'] ?>"><?= $elec['election_name'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-primary mx-2" name="search-election">GENERATE</button>
                    </form>


                    <button class="btn btn-primary mx-2">PRINT</button>

                </div>

                <div class="card mx-3 my-3 mt-3 mb-4" id="shadow2" style="border-radius: 15px;">
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>NAME</th>
                                    <th>ELECTION</th>
                                    <th>POSITION</th>
                                    <th>VOTE COUNT</th>


                                </tr>
                            <tbody>
                                <?php if(!empty($voteResults)) { ?>

                                <?php foreach ($voteResults as $result) {
                                    $voteResult = $vote->getVoteResults($result['id']);
                                    $position = $vote->getPosition($result['position_id']);
                                    $election = $vote->getElection($result['election_id']);
                                ?>
                                    <tr>

                                        <td><?= $result['student_id'] ?></td>
                                        <td><?= $result['first_name']." ".$result['middle_name']." ".$result['last_name'] ?></td>
                                        <td><?= $election['election_name'] ?></td>
                                        <td><?= $position['position_title'] ?></td>
                                        <td><?= $voteResult ?></td>

                                    </tr>
                                <?php } ?>
                                <?php } ?>



                            </tbody>

                            </thead>

                        </table>

                    </div>
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
        <script>
            $(document).ready(function() {
                $('#datatablesSimple').DataTable();
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/smooth-scroll/dist/smooth-scroll.min.js"></script>
        <script>
            var scroll = new SmoothScroll('a[href*="Add_Comelec.html"]');
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>