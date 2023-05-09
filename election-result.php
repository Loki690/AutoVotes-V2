<?php

include('includes/admin-header.php');
require_once('class.php');
$countCandidate = $vote->countCandidate();
$countApplicant = $vote->countApplicants();
$countElections = $vote->countElections();
$countVoters = $vote->countVoters();

$eid = $_GET['id'];
$election = $vote->getElection($eid);
$positions = $vote->getPositionId();

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
                        <a id="nav-hover" href="comelec-results.php" class="nav-link active">
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
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="comelec-results.php" style="text-decoration: none;"> <i
                                        class="fas fa-users"></i> CHOOSE ELECTION</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-users"></i> RESULTS
                            </li>
                        </ol>
                    </nav>
                        
                <form action="" method="post">
                        <button type="submit" onclick="window.print()" class="btn btn-primary mx-2">PRINT</button>
                </form>

                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <h1 class="display-6"><?= $election['election_name'] ?></h1>
                </div>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div class="container">
                <div class="row mt-5">
                    <?php
                    foreach ($positions as $position) {
                        $pos_count = $position['count']; // winners per $positions
                        $pos_id = $position['position_id'];
                        $candidates = $vote->getCandidate($eid, $pos_id, $adminDetails['last_name']);
                        $candidate_names = array();
                        $candidate_votes = array();

                    

                        if (!empty($candidates)) {
                            foreach ($candidates as $candidate) {
                                $candidate_names[] = $candidate['first_name'].' '.$candidate['last_name'];
                                $candidate_votes[] = $vote->getVoteResults($candidate['id']);
                                $colors = array('#282E33', '#25373A', '#164852', '#495E67', '#FF3838');
                                $new_colors = array('#F4D03F', '#229954', '#F5B041', '#3498DB', '#FDEDEC', '#1E8449', '#2C3E50', '#BB8FCE', '#196F3D', '#6C3483', '#F39C12', '#5B2C6F', '#E74C3C', '#7D6608', '#117A65', '#E67E22', '#943126', '#1B4F72', '#CA6F1E', '#145A32', '#8E44AD', '#839192', '#D35400', '#154360', '#1D8348', '#7B241C', '#0E6251', '#B7950B', '#512E5F', '#E74C3C');
                                $colors = array_merge($colors, $new_colors); // Define array of colors
                                
                            }

                            // Sort the candidates and votes arrays in descending order based on vote count
                            array_multisort($candidate_votes, SORT_DESC, $candidate_names);

                    ?>
                            <div class="col-md-6 mt-2 ">
                            
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <div class="mt-3">
                                    <h2 class="mx-3"><?= $position['position_title'] ?></h2>

                                    <div class="card" id="shadow2">
                                        <canvas class="mx-3 my-3" id="chart<?= $pos_id ?>"></canvas>
                                    </div>
                                  
                                </div>

                                <script>
                                    const ctx<?= $pos_id ?> = document.getElementById('chart<?= $pos_id ?>').getContext('2d');
                                    const chart<?= $pos_id ?> = new Chart(ctx<?= $pos_id ?>, {
                                        type: 'bar',
                                        data: {
                                            labels: <?= json_encode($candidate_names) ?>,
                                            datasets: [{
                                                label: 'Votes',
                                                data: <?= json_encode($candidate_votes) ?>,
                                                backgroundColor: <?= json_encode($colors) ?>, // Set the background color for each dataset
                                               
                                            }],
                                        },
                                        options: {
                                            indexAxis: 'y',
                                            responsive: true,
                                            plugins: {
                                                legend: {
                                                    position: 'bottom',
                                                },
                                                title: {
                                                    display: true,
                                                    text: 'Vote Results',
                                                },
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    ticks: {
                                                        stepSize: 1,
                                                    },
                                                },
                                            },
                                        }
                                    });
                                </script>
                            </div>
                    <?php }
                    } ?>


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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>




</html>