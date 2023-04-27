<?php
require_once('class.php');
include('includes/admin-header.php');

$vote->adminSession();
$voteResults = $vote->getCandidates();
$getElection = $vote->getElectionId();
$vote->resultPrint();




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
                        <hr class="dropdown-divider bg-white" />
                        <a id="nav-hover" class="nav-link mt-4" href="admin-dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home" id="icon"></i></div>Home
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="admin-add-com.php" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fa fa-user me-2" id="icon"></i></div>Comelec
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="admin-interview.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-podcast" id="icon"></i></div>Interview
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="admin-candidate.php" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fas fa-users" id="icon"></i></div>Candidates
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="admin-results.php" class="nav-link active">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical" id="icon"></i>
                            </div>Results
                        </a>
                        <hr class="dropdown-divider bg-dark" />

                        <a id="nav-hover" href="admin-election.php" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class='fas fa-vote-yea' id="icon"></i></div>Election
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
                            <li class="breadcrumb-item"><a href="admin-candidate.php" style="text-decoration: none;"> <i class="fas fa-users"></i> CANDIDATES</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-users"></i> RESULTS
                            </li>
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
                        
                        <button type="submit" name="print-result" class="btn btn-primary mx-2">PRINT</button>
                    </form>

                    <form action="" method="post">
                        <button type="submit" name="print-result" class="btn btn-primary mx-2">PRINT</button>
                    </form>

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
                                <?php if (!empty($voteResults)) { ?>

                                    <?php foreach ($voteResults as $result) {
                                        $voteResult = $vote->getVoteResults($result['id']);
                                        $position = $vote->getPosition($result['position_id']);
                                        $election = $vote->getElection($result['election_id']);
                                    ?>
                                        <tr>

                                            <td><?= $result['student_id'] ?></td>
                                            <td><?= $result['first_name'] . " " . $result['middle_name'] . " " . $result['last_name'] ?>
                                            </td>
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