<?php

include('includes/admin-header.php');
require_once('class.php');


$vote->adminSession();

?>

<body class="sb-nav-fixed">
    <?php

    $applicants = $vote->getApplicants();

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
                        <a id="nav-hover" href="comelec-approval.php" class="nav-link active">
                            <div class="sb-nav-link-icon"><i class="fas fa-check-square fa-spin" id="icon"></i></div>Approval
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
                    <div class="small">Logged in as:</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="d-flex justify-content-between mt-4 mx-4 my-3">


                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="COMELEC.html" style="text-decoration: none;"> <i class="fa-solid fa-home"></i> HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-check-square"></i> APPROVAL</li>
                        </ol>
                    </nav>
                </div>
                <hr>
                <div class="card mx-3 my-3 mt-3 mb-4" id="shadow">
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>FULL NAME</th>
                                    <th>POSITION</th>
                                    <th>PARTY</th>
                                    <th>ELECTION</th>
                                    <th>REQUIREMENTS</th>
                                    <th>ACTION</th>

                                </tr>
                            <tbody>
                                <?php foreach ($applicants as $applicant) { ?>
                                    <tr>
                                        <td><?= $applicant['student_id'] ?></td>
                                        <td><?= $applicant['first_name'] . " " . $applicant['middle_name'] . " " . $applicant['last_name']; ?></td>
                                        <?php
                                        $position_id = $applicant['position_id'];
                                        $pos = $vote->getPosition($position_id);
                                        ?>
                                        <td><?= $pos['position_title'] ?></td>
                                        <?php
                                        $party_id = $applicant['party_id'];
                                        $par = $vote->getParty($party_id);
                                        ?>
                                        <td><?= $par['party'] ?></td>
                                        <?php
                                        $election_id = $applicant['election_id'];
                                        $elec = $vote->getElection($election_id);
                                        ?>
                                        <?php if (empty($elec['election_name'])) { ?>
                                            <td>No data</td>
                                        <?php } else { ?>
                                            <td><?= $elec['election_name'] ?></td>
                                        <?php } ?>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="spr">
                                                <label class="form-check-label" for="defaultCheck1">
                                                   SPR
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="school_id" >
                                                <label class="form-check-label" for="defaultCheck1">
                                                    SCHOOL ID
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-sm btn-outline-success mx-3"><i class="fas fa-check"></i> Approve</button>

                                            </div>

                                        </td>

                                    </tr>



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