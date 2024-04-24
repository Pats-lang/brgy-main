<?php
include '../config/connection.php';
include '../server/admin_login-verification.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGBMS | E-Governance Barangay Management System</title>


    <?php include 'import.php'; ?>

    <style>
        /* Style to keep footer at the bottom */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .wrapper {
            flex: 1;
        }
        
        .footer {
            flex-shrink: 0;
        }
    </style>
    <!-- LOGO SA TAAS -->
    
    <?php include 'import.php'; ?>
</head>


<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Site wrapper -->
    <div class="wrapper"> 


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item text-secondary">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            
  
    <!-- Main content -->
    <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Admin</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        Good day! <?php echo $db_adminFullName; ?>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
                <!-- =========================================================== -->

                <div class="container-fluid">
                    <!-- Small Box (Stat card) -->
                    <div class="row">
                        <div class="col-lg-4 col-8">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?php
                  $conn = mysqli_connect("localhost", "root", "", "u907822938_barangaydb") or die("DI GUMANA");
                  $sql = "SELECT * FROM `members` WHERE `status` = '1' ";; 
                  $result = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($result);
                  echo $count;
                  ?>
                                    </h3>

                                    <p>Residents </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="members_main-campus.php" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- ./col -->
                        <div class="col-lg-4 col-8">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                        <?php
                  $conn = mysqli_connect("localhost", "root", "", "u907822938_barangaydb") or die("DI GUMANA");
                  $sql = "SELECT username, password FROM member_account  "; 
                  $result = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($result);
                  echo $count;
                  ?>
                                    </h3>

                                    <p>Pending Resident Account</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <a href="manage_residents-verification.php" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>


                        <!-- ./col -->
                        <div class="col-lg-4 col-8">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                        <?php
                  $conn = mysqli_connect("localhost", "root", "", "u907822938_barangaydb") or die("DI GUMANA");
                  $sql = "SELECT * FROM `admin` WHERE 1 "; 
                  $result = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($result);
                  echo $count;
                  ?>
                                    </h3>

                                    <p>Admins</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-users-gear"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
          
        
        </div>
        <!-- /.row -->
           <!-- Default box -->
                   </div>
          <!-- /.col -->

  <!-- /.content-wrapper -->
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/admin_footer.php'; ?>
  
</div>
<!-- ./wrapper -->

</body>

</html>