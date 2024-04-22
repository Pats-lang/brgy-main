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

    $sql_2 = "SELECT * FROM settings";
    $result_2 = mysqli_query($connection, $sql_2);
    $row_2 = mysqli_fetch_assoc($result_2);
  
    
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EGBMS | E-Governance Barangay Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../assets/images/logo/"><?php echo $row_2['sLogo'];}?>

  
  <?php include 'import.php'; ?>  
</head>




    </style>

<body class="hold-transition sidebar-mini layout-fixed">
  
<?php include 'includes/client_nav.php'; ?>




  <?php include 'includes/admin_footer.php'; ?>
  
</div>


</body>

</html>