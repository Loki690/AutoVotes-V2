<?php
include('includes/admin-header.php');
require_once('class.php');
$admin = $vote->getAdmins();
?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="nav-color">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">DCC Autovotes</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav text-white">
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" class="nav-link mt-4 active" href="">
                            <div class="sb-nav-link-icon "><i class="fas fa-home" id="icon"></i></div>Home
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fa fa-user me-2" id="icon"></i></div>Comelec
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-podcast" id="icon"></i></div>Interview
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="p" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fas fa-users" id="icon"></i></div>Candidates
                        </a>
                        <hr class="dropdown-divider bg-dark" />
                        <a id="nav-hover" href="" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical" id="icon"></i></div>Results
                        </a>
                        <hr class="dropdown-divider bg-dark" />

                        <a id="nav-hover" href="#" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class='fas fa-vote-yea' id="icon"></i></div>Election
                        </a>
                        <hr class="dropdown-divider bg-white" />

                    </div>

                </div>
                <div class="sb-sidenav-footer" id="nav-footer">
                    <div class="small text-white">Logged in as:</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="d-flex justify-content-between mt-5 mx-4 my-3">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>

                    <div>
                        <button type="button" class="btn btn-sm btn-primary mb-3 me-2" tabindex="-1" data-bs-toggle="modal" data-bs-target="#add">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Add Admin
                        </button>
                    </div>
                </div>

                <div class="card mx-3 my-3 mt-3 mb-4" id="shadow" style="border-radius: 15px;">
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Access code</th>
                                    <th>Action</th>

                                </tr>
                            <tbody>
                                <?php foreach ($admin as $item) { ?>
                                    <tr>
                                        <td scope="row"><?= $item['first_name'] . " " . $item['last_name']; ?></td>
                                        <td scope="row"><?= $item['accesscode']; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-sm btn-outline-success mx-3" tabindex="-1" data-bs-toggle="modal" data-bs-target="#edit-admin<?= $item['admin_id'] ?>"><i class="fas fa-edit"></i> Edit</button>
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-taurget="#delete-admin<?= $item['admin_id'] ?>"><i class="fas fa-trash"></i> Delete</button>
                                            </div>

                                        </td>

                                    </tr>
                                <?php

                                    include('includes/modals.php');
                                } ?>

                            </tbody>

                            </thead>

                        </table>

                    </div>
                </div>
            </main>

            <?php
            include('includes/modals.php')
            ?>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>