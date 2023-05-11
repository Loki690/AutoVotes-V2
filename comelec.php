<?php

include('includes/admin-header.php');
require_once('class.php');
$candidates = $vote->getApplicantsForCandidate();
$countCandidate = $vote->countCandidate();
$countApplicant = $vote->countApplicants();
$countElections = $vote->countElections();
$countVoters = $vote->countVoters();

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
                        <a id="nav-hover" class="nav-link mt-4 active" href="comelec.php">
                            <div class="sb-nav-link-icon" id="icon"><i class="fas fa-home"></i></div>Home
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="comelec-approval.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-check-square fa-spin" id="icon"></i></div>
                            Approval
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="comelec-disapproved.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-trash" id="icon"></i></div>Disapproved
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="comelec-voter.php" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fas fa-user" id="icon"></i></div>Voter
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="comelec-results.php" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical" id="icon"></i>
                            </div>Results
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
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-home"></i>
                                DASHBOARD</li>
                        </ol>
                    </nav>
                </div>


                <hr>
                <div class="row">
                    <div class="col-sm-3 mt-2">

                        <div class="card mx-3 text-white" id="dashcard">
                            <div class="d-flex justify-content-center">
                                <h5 class="mx-3 mt-2"><i class="fa-solid fa-users-line mx-1"></i> Final Candidates</h5>
                            </div>
                            <h4 class="d-flex justify-content-center mx-3 mt-2"><?= $countCandidate ?></h4>
                        </div>

                    </div>
                    <div class="col-sm-3 mt-2">
                        <div class="card mx-3 text-white" id="dashcard">
                            <div class="d-flex justify-content-center">
                                <h4 class="mx-3 mt-2"><i class="fa-solid fa-check-to-slot mx-1"></i>Voters</h4>

                            </div>
                            <h4 class="d-flex justify-content-center mx-3 mt-2"><?= $countVoters ?></h4>

                        </div>

                    </div>
                    <div class="col-sm-3 mt-2">
                        <div class="card mx-3 text-white" id="dashcard">
                            <div class="d-flex justify-content-center">
                                <h4 class="mx-3 mt-2"><i class="fa-solid fa-users-line mx-1"></i>Applicants</h4>

                            </div>
                            <h4 class="d-flex justify-content-center mx-3 mt-2"><?= $countApplicant ?></h4>

                        </div>

                    </div>

                    <div class="col-sm-3 mt-2">

                        <div class="card mx-3 text-white" id="dashcard">
                            <div class="d-flex justify-content-center">
                                <h4 class="mx-3 mt-2"><i class="fa-solid fa-landmark mx-1"></i>Elections</h4>
                            </div>
                            <h4 class="d-flex justify-content-center mx-3 mt-2"><?= $countElections ?></h4>
                        </div>

                    </div>

                </div>

                <div class="card mx-3 my-3 mt-3 mb-4" id="shadow2">
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>STUDENT ID</th>
                                    <th>FULL NAME</th>
                                    <th>POSITION</th>
                                    <th>PARTY</th>
                                    <th>ELECTION</th>
                                    <th>ACTION</th>

                                </tr>
                            <tbody>
                                <?php if (!empty($candidates)) { ?>
                                    <?php foreach ($candidates as $candidate) {

                                        $party_id = $candidate['party_id'];
                                        $party = $vote->getParty($party_id);

                                        $position_id = $candidate['position_id'];
                                        $pos = $vote->getPosition($position_id);

                                        $election_id = $candidate['election_id'];
                                        $elec = $vote->getElection($election_id);

                                    ?>

                                        <tr>

                                            <td><?= $candidate['student_id'] ?></td>
                                            <td><?= $candidate['first_name'] . " " . $candidate['middle_name'] . " " . $candidate['last_name'] ?>
                                            </td>
                                            <td><?= $pos['position_title']; ?></td>
                                            <td><?= $party['party'] ?></td>
                                            <?php if (empty($elec['election_name'])) { ?>
                                                <td>No data</td>
                                            <?php } else { ?>
                                                <td><?= $elec['election_name'] ?>

                                                </td>
                                            <?php } ?>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- <button class="btn btn-sm btn-primary mx-3"><i class="fas fa-edit"></i>
                                                        Edit</button> -->
                                                    <button class="btn btn-sm btn-primary" tabindex="-1" data-bs-toggle="modal" data-bs-target="#view-candidate<?= $candidate['id'] ?>"><i class="fas fa-eye"></i> View
                                                        Information</button>
                                                </div>

                                            </td>

                                        </tr>

                                        <div class="modal fade modal-signin" id="view-candidate<?= $candidate['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticbackdroplabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
                                                    <div class="modal-header p-3 pb-3">
                                                        <h5 class="modal-title text-white" id="staticbackdroplabel">Candidates information
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                    </div>
                                                    <br>

                                                    <div class="modal-body p-5 pt-0">
                                                        <div class="container px-2 py-2" style="border-style: solid; border-width:1px; border-color:white; border-radius:20px">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="text-center">
                                                                    <img  src="uploads/<?=$candidate['photo']?>" style="border-radius: 20px; height:250px; width:100%;" alt="viewpic">
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $par = $vote->getParty($candidate['party_id']);
                                                                $pos = $vote->getPosition($candidate['position_id']);
                                                                ?>
                                                                <div class="col-md-8">
                                                                    <ul style="list-style-type: none; font-size:20px; margin-top:40px" id="ul-candi">
                                                                        <li><span class="fw-bold">Name: </span><?= $candidate['first_name'] . "  ". $candidate['middle_name']." " . $candidate['last_name'] ?> </li>
                                                                        <li><span class="fw-bold">Age: </span><?= $candidate['age'] ?></li>
                                                                        <li><span class="fw-bold">Course: </span><?= $candidate['course'] ?></li>
                                                                        <li><span class="fw-bold">Year: </span><?= $candidate['year_lev'] ?></li>
                                                                        <li><span class="fw-bold">Party: </span><?= $par['party'] ?></li>
                                                                        <li><span class="fw-bold">Running Position: </span><?= $pos['position_title'] ?></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>


                                <?php } ?>



                            </tbody>

                            </thead>

                        </table>

                    </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>




</html>