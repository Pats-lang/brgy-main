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
          
        <!-- barangay-->
        <div class="row">
                            <div class="col-lg-4 mt-2 mb-3">
                                <div class="card card-secondary shadow">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5><i class="fas fa-solid fa-calendar fa-sm"></i> Documents:</h5>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse" data-card-show="#borrowedCardBody">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div id="borrowedCardBody" class="card-body" style="display: none;">
                                        <?php
                // Establish database connection
                $conn = mysqli_connect("localhost", "root", "", "u907822938_barangaydb") or die("DI GUMANA");

                // SQL query to fetch counts from different request tables with specified status values
                $sql = "SELECT 
                            COUNT(DISTINCT coi.id) AS coi_count,
                            COUNT(DISTINCT clrs.id) AS clrs_count,
                            COUNT(DISTINCT busclearance.id) AS busclearance_count
                        FROM request_brgycoi coi
                        INNER JOIN request_brgyclrs clrs ON coi.status = clrs.status
                        INNER JOIN request_busclearance busclearance ON clrs.status = busclearance.status
                        WHERE coi.status = 2";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch counts from the result
                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                        // Access counts for each document type
                        $coi_count = isset($row['coi_count']) ? $row['coi_count'] : 2;
                        $clrs_count = isset($row['clrs_count']) ? $row['clrs_count'] : 2;
                        $busclearance_count = isset($row['busclearance_count']) ? $row['busclearance_count'] : 0;

                        // Output the counts wherever needed in your HTML
                        echo "<div class='card my-3'>
                        <div class='card-header'>
                            <h5 class='card-title'><a href='manage_brgy_rqst_coi.php' style='text-decoration:none;color:black;'><i class='fas fa-check-circle fa-sm'></i> Barangay Indigency</a></h5>
                        </div>
                        <div class='card-body'>
                            <p class='card-text text-center fs-5' style='font-size: 1.1rem;'>Barangay Indigency: $coi_count</p>
                        </div>
                    </div>";
                echo "<div class='card my-3'>
                        <div class='card-header'>
                            <h5 class='card-title'><a href='manage_brgy_rqst_clrs.php' style='text-decoration:none;color:black;'><i class='far fa-clock'></i> Barangay Clerance</a></h5>
                        </div>
                        <div class='card-body'>
                            <p class='card-text text-center fs-4' style='font-size: 1.1rem;'>Barangay Clearance: $clrs_count</p>
                        </div>
                    </div>";
                echo "<div class='card my-3'>
                        <div class='card-header'>
                            <h5 class='card-title'><a href='manage_brgy_rqst_busclearance.php' style='text-decoration:none;color:black;'><i class='fas fa-star'></i> Barangay Business Clearance</a></h5>
                        </div>
                        <div class='card-body'>
                            <p class='card-text text-center fs-4' style='font-size: 1rem;'>Barangay Business Clearance: $busclearance_count</p>
                        </div>
                    </div>";
                    } else {
                        echo "No data found.";
                    }
                } else {
                    // Handle query execution error
                    echo "Error executing query: " . mysqli_error($conn);
                }

                // Close database connection
                mysqli_close($conn);
                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- Default box -->
                </div>
                <!-- /.col -->

                <!-- /.content-wrapper -->
        </div>
        </section>
    </div>

<!-- hindi tapos-->

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