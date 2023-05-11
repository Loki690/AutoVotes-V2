<?php
require_once('class.php');
include('includes/admin-header.php');
$elections = $vote->getElectionId();

$vote->addElection($_POST);
$vote->editElection($_POST);
$vote->updatePoster($_POST);
$vote->deleteElection();
$vote->saveQRCode();
// $vote->generateQR();

?>
<?php
function create_time_range($start, $end, $interval = '1 mins', $format = '12')
{
  $time_to_Start = strtotime($start);
  $time_to_End   = strtotime($end);
  $time_Format = ($format == '12') ? 'g:i:s A' : 'G:i:s';

  $current_time   = time();
  $time_adding   = strtotime('+' . $interval, $current_time);
  $difference_time      = $time_adding - $current_time;

  $time_lists = array();
  while ($time_to_Start < $time_to_End) {
    $time_lists[] = date($time_Format, $time_to_Start);
    $time_to_Start += $difference_time;
  }
  $time_lists[] = date($time_Format, $time_to_Start);
  return $time_lists;
}
$time_lists = create_time_range('7:00', '24:00', '1 hour');


if(isset($_POST['generate-qr'])){
    $data = $_POST['myqrcode'];
    $width = '50';
    $height = '50';
    $url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$data}";
    $result['img'] = $url;
  }
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
                            <hr class="dropdown-divider bg-white"/>
                            <a id="nav-hover" class="nav-link mt-4" href="admin-dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home" id="icon"></i></div>Home
                            </a>
                            <hr class="dropdown-divider bg-dark"/>
                            <a id="nav-hover" href="admin-add-com.php" class="nav-link "><div class="sb-nav-link-icon"><i
                                    class="fa fa-user me-2" id="icon"></i></div>Comelec</a>
                            <hr class="dropdown-divider bg-dark"/>
                            <a id="nav-hover" href="admin-interview.php" class="nav-link"><div class="sb-nav-link-icon"><i 
                                class="fa-solid fa-podcast" id="icon"></i></div>Interview</a>
                            <hr class="dropdown-divider bg-dark"/>
                            <a id="nav-hover" href="admin-candidate.php" class="nav-link "><div class="sb-nav-link-icon"><i 
                                class="fas fa-users" id="icon"></i></div>Candidates</a>
                            <hr class="dropdown-divider bg-dark"/>
                            <a id="nav-hover" href="admin-results.php" class="nav-link "><div class="sb-nav-link-icon"><i 
                                class="fa-solid fa-square-poll-vertical" id="icon"></i></div>Results</a>
                            <hr class="dropdown-divider bg-dark"/>

                            <a id="nav-hover" href="admin-election.php" class="nav-link active"><div class="sb-nav-link-icon"><i 
                                class='fas fa-vote-yea' id="icon"></i></div>Election</a>
                            <hr class="dropdown-divider bg-white"/>
                        
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
                              <li class="breadcrumb-item"><a href="admin-result.php" style="text-decoration: none;"> <i 
                                class="fa-solid fa-square-poll-vertical"></i> RESULTS</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i 
                                class='fas fa-vote-yea'></i> ELECTION</li>
                            </ol>
                        </nav>

                        <div>
                            <button type="button" class="btn btn-sm btn-primary mb-3 me-2" tabindex="-1" data-bs-toggle="modal" data-bs-target="#election">
                                <i class="fa fa-plus" aria-hidden="true" ></i>
                                    ADD ELECTION
                                </button>
                        </div>
                        
                       
                    </div>
                    <hr>
                    <div class="card mx-3 my-3 mt-3 mb-4" id="shadow2" style="border-radius: 15px;">
                        <div class="card-body table-responsive">
                            <table class="table table-hover" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ELECTION</th>
                                        <th>START DATE</th>
                                        <th>END DATE</th>
                                        <th>ACTION</th>
                                    </tr>
                                    <tbody>
                                        <?php
                                        foreach($elections as $elec){
                                            
                                        ?>
                                        <tr>
                                            <td><?= $elec['election_name'] ?></td>
                                            <td><?= date('F d, Y g:i A',strtotime($elec['start_date'] )) ?></td>
                                            <td><?= date('F d, Y g:i A',strtotime($elec['end_date'] )) ?></td>
                                          
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-sm btn-success mx-3" tabindex="-1" data-bs-toggle="modal" data-bs-target="#edit-election<?= $elec['election_id'] ?>" ><i class="fas fa-edit"> </i> Edit</button>
                                                    <button class="btn btn-sm btn-primary" tabindex="-1" data-bs-toggle="modal" data-bs-target="#create-qr<?= $elec['election_id'] ?>"><i class="fa-solid fa-qrcode"></i> QR Code</button>
                                                    <button class="btn btn-sm btn-danger mx-3" tabindex="-1" data-bs-toggle="modal" data-bs-target="#delete-election<?= $elec['election_id'] ?>"><i class="fas fa-trash"></i> Delete</button>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <?php 
                                        include('includes/modals.php');
                                      
                                        ?>
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
            $(document).ready(function () {
                $('#datatablesSimple').DataTable();
            });
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
