<?php
include('includes/admin-header.php');

require_once('class.php');

$elec_id = $_GET['id'];

$election = $vote->getElection($elec_id);
$positions = $vote->getPositionId();

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



                        <a id="nav-hover" href="" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical" id="icon"></i>
                            </div>Results
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
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.php" style="text-decoration: none;">
                                    <i class="fas fa-home"></i> HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-trash"></i>
                                <?= $election['election_name'] ?></li>
                        </ol>
                    </nav>
                </div>

                <hr>
                <div class="container">

                    <h3 class="mx-3 mt-4"> <?= $election['election_name'] ?></h3>

                    <?php foreach ($positions as $pos) {

                        $position_id = $pos['position_id'];
                        $candidates = $vote->getCandidate($elec_id, $position_id);

                    ?>
                    
                        <div class="row">
                            <h3 class="mx-3 mt-4"> Candidates for <?= $pos['position_title'] ?> 
                            </h3>
                            <h4 class="mx-3 mt-4"> Only Vote <?= $pos['count']." ".$pos['position_title'] ?> 
                            </h4>
                                <?php if (!empty($candidates)) { ?>
                                    <?php foreach ($candidates as $candi) {
                                    ?>
                                     <div class="col-sm-4">
                                        <div class="card mx-3 mt-3">
                                            <img class="card-img img-fluid" src="uploads/<?= $candi['photo'] ?>" width="200" alt="">
                                            <h4 class="mx-3 my-3 text-center">
                                                <?= $candi['first_name'] . " " . $candi['middle_name'] . " " . $candi['last_name'] ?>
                                            </h4>
                                            <div class="progress mx-5 mb-3">
                                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25</div>
                                            </div>
                                            <div class="d-flex justify-content-center mb-3">
                                                <?php 
                                                $vote->vote();
                                                $voter = $vote->getVoterVote($voterDetails['studentID'], $candi['id'], $pos['position_id']);
                                                ?>
                                                <?php if(empty($voter)){ ?>

                                                <form action="" method="POST">
                                                    <input type="hidden" value="<?= $candi['id'] ?>" name="candi_id">
                                                    <input type="hidden" value="<?= $voterDetails['studentID']  ?>" name="voter_id">
                                                    <input type="hidden" value="<?= $pos['position_id']  ?>" name="pos_id">
                                                    <input type="hidden" value="<?= $elec_id  ?>" name="elec_id">
                                                    <input type="hidden" value=" <?= $pos['count']?>" name="pos-count">
                                                
                                                <button class="btn btn-outline-primary flex-grow-1 mx-5" name="vote" type="submit">Vote</button>
                                                </form>
                                                <?php }else{ ?>
                                                    <button class="btn btn-secondary flex-grow-1 mx-5" name="vote" type="submit">Voted</button>
                                                    <?php } ?>
                                            </div>
                                        </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                           
                        </div>
                        <hr>
                    <?php } ?>







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

            <footer class="py-4 bg-light mt-4">
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