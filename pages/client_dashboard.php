<?php
include '../config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EGBMS | E-Governance Barangay Management System</title>
  

  <?php include 'import.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  
<?php include 'includes/client_nav.php'; ?>
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
                Good day! <?php echo $adminLogged; ?>
              </div>
              <!-- /.card-body -->
            
            </div>
            <!-- /.card -->
        <!-- =========================================================== -->

        <div class="container-fluid">
        <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-6">
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
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                <?php
                  $conn = mysqli_connect("localhost", "root", "", "u907822938_barangaydb") or die("DI GUMANA");
                  $sql = "SELECT * from request_brgycor WHERE status = 0"; 
                  $result = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($result);
                  echo $count;
                  ?>
                </h3>

                <p>Done Request</p>
              </div>
              <div class="icon">
                <i class="fa-file-text"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
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

                <p>Registered User</p>
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
          <div class="col-lg-3 col-6">
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