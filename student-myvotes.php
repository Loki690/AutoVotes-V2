<?php
include('includes/admin-header.php');

require_once('class.php');

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
                        <a id="nav-hover" class="nav-link mt-4" href="student-dashboard.php">
                            <div class="sb-nav-link-icon" id="icon"><i class="fas fa-home"></i></div>Home
                        </a>
                        <hr class="dropdown-divider bg-dark" />

                        <a id="nav-hover" href="" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical" id="icon"></i>
                            </div>Results
                        </a>
                        <hr class="dropdown-divider bg-dark" />


                        <a id="nav-hover" href="" class="nav-link active">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list" id="icon"></i></div>My Votes
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
                    <h3 class="">My Votes</h3>
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Student-dasboard.html" style="text-decoration: none;">
                                    <i class="fas fa-square-poll-vertical"></i> RESULTS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-list"></i> MY VOTES
                            </li>
                        </ol>
                    </nav>
                </div>

                <hr>
                <div class="container">

                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th scope="col">Position</th>
                                <th scope="col">Cadidates</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($positions as $position) {

                                $pos_id = $position['position_id'];
                                $myvotes = $vote->getVoterVotes($voterDetails['school_id'], $pos_id)

                            ?>
                                <tr>
                                    <td><?= $position['position_title'] ?></td>

                                    <td>
                                        <?php if (!empty($myvotes)) { ?>
                                            <?php foreach ($myvotes as $myvote) { ?>
                                                <li>
                                                    <?= $myvote['first_name']." ".$myvote['middle_name']." ".$myvote['last_name'] ?>
                                                </li>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <li>
                                                No data
                                            </li>
                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php } ?>


                    </table>



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





        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
</body>

</html>