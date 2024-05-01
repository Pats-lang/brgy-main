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
                            <h1>Request Log</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item text-secondary">Request Log</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <table id="manageClient_inquiriesTable" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>MEMBER ID</th>
                                                <th>Transaction ID</th>
                                                <th>Request</th>
                                                <th>Status</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
        $query = "SELECT transaction_id, member_id, request, status, time FROM request_brgybp
                  WHERE member_id = (SELECT member_id FROM member_account WHERE username = '$userLogged')
                  UNION
                  SELECT transaction_id, member_id, request, status, time FROM request_brgycert
                  WHERE member_id = (SELECT member_id FROM member_account WHERE username = '$userLogged')
                  UNION
                  SELECT transaction_id, member_id, request, status, time FROM request_brgyclrs
                  WHERE member_id = (SELECT member_id FROM member_account WHERE username = '$userLogged')
                  UNION
                  SELECT transaction_id, member_id, request, status, time FROM request_brgycoi
                  WHERE member_id = (SELECT member_id FROM member_account WHERE username = '$userLogged')
                  UNION
                  SELECT transaction_id, member_id, request, status, time FROM request_busclearance
                  WHERE member_id = (SELECT member_id FROM member_account WHERE username = '$userLogged')
                  UNION
                  SELECT transaction_id, member_id, item, status, time_added FROM request_tools
                  WHERE member_id = (SELECT member_id FROM member_account WHERE username = '$userLogged')";

        $result = mysqli_query(getDatabase(), $query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                                            <tr>
                                                <td><?php echo $row['member_id']; ?></td>
                                                <td><?php echo $row['transaction_id']; ?></td>
                                                <td><?php echo $row['request']; ?></td>
                                                <td>
                                                    <?php
                        if (isset($row['status'])) {
                            $status = $row['status'];
                            if ($status == 1) {
                                echo '<span class="badge badge-danger">Declined</span>';
                            } elseif ($status == 2) {
                                echo '<span class="badge badge-success">Approved</span>';
                            } else {
                                echo '<span class="badge badge-warning">Pending</span>';
                            }
                        } else {
                            echo '<span class="badge badge-secondary">Unknown</span>';
                        }
                        ?>
                                                </td>
                                                <td><?php echo date("m/d/Y g:i A", strtotime($row['time'])); ?></td>
                                            </tr>
                                            <?php }
        } else {
            // Handle query error
            echo "<tr><td colspan='5'>Error: " . mysqli_error(getDatabase()) . "</td></tr>";
        }
        ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </div>

                    </div>


                </div>


            </section>
            <!-- Main content -->

        </div>
        <!-- /.content-wrapper -->

        <?php include 'includes/admin_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>

<script>
$(document).ready(function() {
    $('#manageClient_inquiriesTable').DataTable({
        dom: 'ftp',
        responsive: true
    });
});
</script>

</html>