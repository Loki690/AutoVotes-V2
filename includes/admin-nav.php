<?php
$adminDetails = $vote->getAdminData();
    $vote->logoutAdmin();
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark" id="nav-color">
        <!-- Navbar Brand-->
        <a class="navbar-brand mx-2" href="#">
            <img src="img/DCC2.png" width="50" height="50" alt="" /> DCC AUTOVOTES
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>  <?= $adminDetails['last_name'] ?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <form action="" method="POST">
                    <li><a class="dropdown-item" href="#!"><button class="btn btn-danger" type="submit" name="logout-admin">Logout</button></a></li>
                    </form>
                  
                </ul>
            </li>
        </ul>
    </nav>