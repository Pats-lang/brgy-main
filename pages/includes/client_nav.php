<?php

$sql = "SELECT * FROM settings";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_assoc($result)){
?>


<link rel="icon" href="../../assets/images/logo/barangay.gif <?php echo $row['sLogo']; ?>">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="client_dashboard.php" class="nav-link">Welcome to <?php echo $row['sName']; ?></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
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
    <a href="../pages/client_dashboard.php" class="brand-link text-decoration-none">
        <i class="fas fa-solid fa-address-card fa-lg ml-3 mr-2"></i>
        <span class="brand-text font-weight-bold"><?php echo $row['sAlias']; ?></span>
    </a>
    <?php } ?>
    <!-- Sidebar -->
    <div class="sidebar">

        <php>

        
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false" style="display: flex; flex-direction: column;">

                    <li class="nav-item">
                        <a href="../pages/client_dashboard.php" class="nav-link">
                            <?php
                    $conn = mysqli_connect("localhost", "root", "", "u907822938_barangaydb") or die("DI GUMANA");
                    $sql = "SELECT members.picture, members.fullname
                            FROM members
                            INNER JOIN member_account ON members.member_id = member_account.member_id
                            WHERE member_account.username = '$userLogged'";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query returned any rows
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $fullname = $row['picture'];
                        $firstname = $row['fullname'];
                        
                    } else {
                        echo "No member found for the logged-in admin.";
                    }
                ?>

<div style="display: flex; align-items: center;">
        <img src="../assets/images/member_pictures/<?php echo $row['picture']; ?>" class="rounded-circle img-fluid object-position: center; object-fit-cover" alt="Logo" width="50" height="50">
        <p class="mx-1" style="margin-left: 5px;"><b><?php echo $row['fullname']; ?></b></p>
    </div>
                        </a>
                    </li>

                    <hr>

                    <li class="nav-item">
                        <a href="../pages/client_dashboard.php" class="nav-link">
                            <i class="fa-solid fa-house nav-icon"
                                style="color: #4285f4; font-size: 15px;"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="system_administrators.php" class="nav-link">
                            <i class="fa-solid fa-screwdriver-wrench nav-icon"
                                style="color: #4285f4; font-size: 15px;"></i>
                            <p>Announcement</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="../pages/client_services.php" class="nav-link">
                            <i class="fa-solid fa-gears nav-icon" style="color: #4285f4; font-size: 15px;"></i>
                            <p>Services</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/client_request_log.php" class="nav-link">
                            <i class="fa-solid fa-history nav-icon"
                                style="color: #4285f4; font-size: 15px;"></i>
                            <p>Request Log</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/client_profile.php" class="nav-link">
                            <i class="fa-solid fa-user nav-icon" style="color: #4285f4; font-size: 15px;"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../server/client_logout.php" class="nav-link">
                            <i class="fa-solid fa-right-from-bracket nav-icon" style="color: #4285f4; font-size: 15px;"></i>
                            <p href="server/client_logout.php">Logout</p>
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar 

    <div class="sidebar-custom border-0">
        <a href="#" class="btn btn-link dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"><i class="fas fa-cogs"></i></a>
        <a href="#" class="btn btn-primary hide-on-collapse pos-right"><?php echo $db_adminFullName; ?></a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <button type="button" class="dropdown-item">Profile</button>
            <a type="button" class="dropdown-item" href="../server/admin_logout.php">Log-out</a>
        </div>
         /.sidebar-custom -->
    </div>

</aside>