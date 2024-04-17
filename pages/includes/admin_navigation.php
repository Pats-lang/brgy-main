<?php
 $dbHost = 'localhost';
 $dbName = 'u907822938_barangaydb';
 $dbUsername = 'root';
 $dbPassword = '';
 $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) ;
 
 if (!$connection) {
     die("Can't connect to the database server. Error: " . mysqli_connect_error());
 }
$sql = "SELECT * FROM settings";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)){
?>

 
<link rel="icon" href="../../assets/images/logo/barangay.gif <?php echo $row['sLogo']; ?>"/>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="dashboard.php" class="nav-link">Welcome to <?php echo $row['sName']; ?></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link text-decoration-none">
        <i class="fas fa-solid fa-address-card fa-lg ml-3 mr-2"></i>
        <span class="brand-text font-weight-bold"><?php echo $row['sAlias']; ?></span>
    </a>
    <?php } ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                        <span class="right badge badge-warning">!</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-tv nav-icon"></i>
                        <p>
                        Manage Client Page
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../pages/manage-client_announcements.php" class="nav-link">
                                <i class="fa-solid fa-bullhorn nav-icon"></i>
                                <p>Announcement</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/manage-client_directors.php" class="nav-link">
                                <i class="fa-solid fa-users nav-icon"></i>
                                <p>Brgy Officials</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../pages/assistance.php" class="nav-link">
                                <i class="fa-solid fa-circle-question nav-icon"></i>
                                <p>Assistance</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../pages/manage-client_projects.php" class="nav-link">
                                <i class="fa-solid fa-paintbrush nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/manage-client_history.php" class="nav-link">
                                <i class="fa-solid fa-book-open nav-icon"></i>
                                <p>History</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../pages/manage-client_inquiries.php" class="nav-link">
                                <i class="fa-solid fa-circle-question nav-icon"></i>
                                <p>Inquiries</p>
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="nav-header">Resident Registration</li>
                <li class="nav-item">
                    <a href="register_resident.php" class="nav-link">
                        <i class="fas nav-icon fa-solid fa-user-plus ml-1" style="color:#4285f4; font-size: 15px;"></i>
                        <p>Registration</p>
                    </a>
                </li>

                <li class="nav-header">
                    Residents</li>
                <li class="nav-item">
                    <a href="manage_residents-verification.php" class="nav-link">
                      
                        <i class="fas nav-icon fa-user-check " style="color: #4285f4; font-size: 15px;"></i>
                        <p>Residents Verification</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="manage_residents-list.php" class="nav-link">
                    <i class="fas  nav-icon fa-list" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Residents List</p>
                    </a>
                </li>
               

                <li class="nav-header">Request</li>

                <li class="nav-item">
                    <a href="manage_brgy_rqst_busclearance.php" class="nav-link">
                    <i class="fas  nav-icon fa-certificate" style="color: #4285f4; font-size: 15px;"></i>
                        <p style="font-size: 13px;">Barangay Business Clearance  </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="manage_brgy_rqst_clrs.php" class="nav-link">
                    <i class="fas  nav-icon fa-certificate" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Barangay Clearance</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="manage_brgy_rqst_id.php" class="nav-link">
                    <i class="fas  nav-icon fa-certificate" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Barangay Id</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="manage_brgy_rqst_coi.php" class="nav-link">
                    <i class="fas  nav-icon fa-certificate" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Barangay Indigency</p>
                    </a>
                </li>
             
                <li class="nav-item">
                    <a href="manage_brgy_rqst_cor.php" class="nav-link">
                    <i class="fas  nav-icon fa-certificate" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Barangay Residency</p>
                    </a>
                </li>

                <li class="nav-header">ID  </li>
                <li class="nav-item">
                    <a href="Idgenerator.php" class="nav-link">
                        <i class="fa-solid fa-id-card nav-icon" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Generated ID</p>
                    </a>
                </li>


                <li class="nav-header">System </li>
                <li class="nav-item">
                    <a href="system_administrators.php" class="nav-link">
                        <i class="fa-solid fa-screwdriver-wrench nav-icon" style="color: #4285f4; font-size: 15px;"></i>
                        <p>System Administrators</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="settings.php" class="nav-link">
                        <i class="fa-solid fa-gears nav-icon" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="archive.php" class="nav-link">
                        <i class="fa-solid fa-box-archive nav-icon" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Archive</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="change_logs.php" class="nav-link">
                        <i class="fa-solid fa-clipboard nav-icon" style="color: #4285f4; font-size: 15px;"></i>
                        <p>Change Logs</p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom border-0">
        <a href="#" class="btn btn-link dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"><i class="fas fa-cogs"></i></a>
        <a href="#" class="btn btn-primary hide-on-collapse pos-right"><?php echo $db_adminFullName; ?></a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <button type="button" class="dropdown-item">Profile</button>
            <a type="button" class="dropdown-item" href="../server/admin_logout.php">Log-out</a>
        </div>
        <!-- /.sidebar-custom -->
    </div>

</aside>