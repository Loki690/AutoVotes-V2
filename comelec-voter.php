<?php

include('includes/admin-header.php');
require_once('class.php');
$vote->adminSession();


?>

<body class="sb-nav-fixed">
    <?php
    $voters = $vote->getVoters();
    $vote->deleteVoter();
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
                        <a id="nav-hover" href="comelec-voter.php" class="nav-link active">
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
                    <div class="small text-white">Logged in as: <?= $adminDetails['last_name'] ?></div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="d-flex justify-content-between mt-4 mx-4 my-3">

                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="comelec-disapproved.php" style="text-decoration: none;"> <i class="fa-solid fa-trash"></i> DISAPPROVED</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-user"></i> VOTER</li>
                        </ol>
                    </nav>

                </div>
                <hr>
                <?php
                $vote->insertExcelFile();
                ?>
                <div class="card mx-3 my-3 mt-3 mb-4" id="shadow2">
                    <div class="class-title">
                        <h3 class="mx-3 my-3"> Import CSV/Excel file</h3>
                    </div>
                    <hr>
                    <div class="card-body">
                        <form class="d-flex" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-sm-4">
                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="formFileLg">
                            </div>
                            <button class="btn btn-lg btn-primary mx-3" name="upload"> UPLOAD</button>
                        </form>

                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4 mx-4 my-3">

                    <?php
                    $election = $vote->getElectionId();
                    ?>
                    <form class="d-flex" method="get" action="">
                        <select class="form-select" name="course" aria-label="Default select example">
                            <option selected>Select Course</option>
                            <option value="BSIT">BSIT</option>
                            <option value="BSBA">BSBA</option>
                            <option value="BSED">BSED</option>
                            <option value="BSHRM">BSHRM</option>
                            <option value="BSCRIM">BSCRIM</option>
                        </select>
                        <button type="submit" class="btn btn-primary mx-2" name="search-course">GENERATE</button>
                    </form>

                    <button class="btn btn-primary mx-2">PRINT</button>

                </div>


                <div class="card mx-3 my-3 mt-3 mb-4" id="shadow2">
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>STUDENT ID</th>
                                    <th>FULL NAME</th>
                                    <th>GENDER</th>
                                    <th>COURSE</th>
                                    <th>YEAR LEVEL</th>
                                    <th>PASSWORD</th>
                                    <!-- <th>ACTION</th> -->
                                </tr>
                            <tbody>

                            <?php if(!empty($voters)) { ?>

                                <?php foreach ($voters as $voter) { ?>
                                    <tr>
                                        <td><?= $voter['school_id'] ?></td>
                                        <td><?= $voter['first_name'] . " " . $voter['middle_name'] . " " . $voter['last_name'] ?></td>
                                        <td><?= $voter['gender']; ?></td>
                                        <td><?= $voter['course']; ?></td>
                                        <td><?= $voter['year_level']; ?></td>
                                        <td><?= md5($voter['password']); ?></td>
                                        <!-- <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-sm btn-outline-danger" tabindex="-1" data-bs-toggle="modal" data-bs-target="#delete-voter<?= $voter['student_id'] ?>"><i class="fas fa-trash"></i> Delete</button>
                                            </div>

                                        </td> -->

                                    </tr>
                                    <?php
                                    include('includes/modals.php');
                                    ?>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>