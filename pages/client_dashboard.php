<?php
include '../config/connection.php';
session_start();

$userLogged = $_SESSION['userLogged'];

if (empty($userLogged)) {
    header('Location: ../index.php');
    exit;
}

$sql = "SELECT members.name, members.picture
        FROM members
        INNER JOIN member_account ON members.member_id = member_account.member_id
        WHERE member_account.username = '$userLogged'";
$result = mysqli_query($db, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

  
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EGBMS | E-Governance Barangay Management System</title>

  <?php
    $sql_2 = "SELECT * FROM settings";
    $result_2 = mysqli_query($db, $sql_2);
    $row_2 = mysqli_fetch_assoc($result_2);
  ?>
  <link rel="icon" href="../assets/images/logo/<?php echo $row_2['sLogo']; ?>" />


  
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
                <h3 class="card-title">User</h3>

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
            <?php
              $conn = mysqli_connect("localhost", "root", "", "u907822938_barangaydb") or die("DI GUMANA");
              $sql = "SELECT members.fullname
                      FROM members
                      INNER JOIN member_account ON members.member_id = member_account.member_id
                      WHERE member_account.username = '$userLogged'";
              $result = mysqli_query($conn, $sql);

              // Check if the query returned any rows
              if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $fullname = $row['fullname'];
                 
              } else {
                  echo "No member found for the logged-in admin.";
              }
              ?>
                Good day! <?php echo  $fullname; ?>
              </div>
              <!-- /.card-body -->
            
            </div>

            <div class="card card-sm">
  <div class="card-header">
    <h3 class="card-title">Date and Time</h3>
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
  <?php
// Set the timezone to Philippines
date_default_timezone_set('Asia/Manila');
// Get current date and time in the Philippines
$currentDateTime = date("Y-m-d h:i A");

// Get current date in the Philippines
$currentDate = date("l, F j, Y");
?>
    <p>Current date: <?php echo $currentDate; ?></p>
    <p>Current time: <?php echo $currentDateTime; ?></p>
  </div>
</div>
            
<!--            -->

        <!-- =========================================================== -->

        <div class="container-fluid">
        <!-- Small Box (Stat card) -->
        
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