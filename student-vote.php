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
                            <a id="nav-hover" class="nav-link mt-4 active" href="">
                                <div class="sb-nav-link-icon" id="icon"><i class="fas fa-home"></i></div>Home
                            </a>
                            <hr class="dropdown-divider bg-dark"/>
                    
                            <a id="nav-hover" href="" class="nav-link"><div class="sb-nav-link-icon"><i 
                                class="fa-solid fa-square-poll-vertical" id="icon"></i></div>Results</a>
                            <hr class="dropdown-divider bg-dark"/>


                            <a id="nav-hover" href="" class="nav-link"><div class="sb-nav-link-icon"><i 
                                class="fa-solid fa-list" id="icon"></i></div>My Votes</a>
                            <hr class="dropdown-divider bg-dark"/>

                          
                        
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
                <h3 class="">Home</h3>
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

                <?php

                $vote->vote2();
                ?>
                <form action="" method="POST">
                    <div class="container">

                        <h3 class="mx-3 mt-4"> <?= $election['election_name'] ?></h3>

                        <?php foreach ($positions as $pos) {

                            $position_id = $pos['position_id'];
                            $candidates = $vote->getCandidate($elec_id, $position_id, $voterDetails['school_id'] );

                        ?>

                            <?php if (!empty($candidates)) { ?>
                                <div class="row">
                                    <h3 class="mx-3 mt-4"> Candidates for <?= $pos['position_title'] ?>
                                    </h3>
                                    <h4 class="mx-3 mt-4"> Only Vote <?= $pos['count'] . " " . $pos['position_title'] ?>
                                    </h4>
                                    <input type="hidden" value="<?= $pos['count'] ?>" name="pos_count">
                                    <?php foreach ($candidates as $candi) {
                                    ?>

                                        <div class="col-sm-4">

                                            <div class="card mx-3 mt-3">

                                                <img class="card-img img-fluid" src="img/donaldmc.jpg" width="100" height="100" alt="">
                                                <h4 class="mx-3 my-3 text-center">
                                                    <?= $candi['first_name'] . " " . $candi['middle_name'] . " " . $candi['last_name'] ?>
                                                </h4>
                                                <h5 class="mx-3 my-3 text-center">
                                                    <?= $pos['position_title'] ?>
                                                </h5>

                                                <div class="d-flex justify-content-center mb-3">
                                                    <input type="hidden" value="<?= $voterDetails['school_id'] ?>" name="voter_id">
                                                    <input type="hidden" value="<?= $candi['position_id'] ?>" name="pos_id[<?= $candi['id'] ?>]">
                                                    <input type="hidden" value="<?= $elec_id ?>" name="elec_id">
                                                    <?php if ($pos['count'] == 1) { ?>
                                                        <div class="d-flex justify-content-center">
                                                            <input class="mx-3" type="radio" id="myRadioButton" name="candi_id[]" value="<?= $candi['id'] ?>" required>
                                                            <label for="myRadioButton">Vote</label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="d-flex justify-content-center">
                                                            <input class="mx-3 candi-checkbox" type="checkbox" id="checkbox<?= $candi['position_id'] ?><?= $candi['id'] ?>" name="candi_id[]" value="<?= $candi['id'] ?>" data-position-count="<?= $pos['count'] ?>" required>
                                                            <label for="checkbox<?= $candi['position_id'] ?><?= $candi['id'] ?>">Vote</label>
                                                        </div>

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
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>


                                    <?php } ?>

                                </div>
                                <hr>
                            <?php } ?>


                        <?php } ?>
                        
                        <input type="reset" value="Reset">
                        <button type="submit" name="vote">Submit My Votes</button>
                        
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





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>