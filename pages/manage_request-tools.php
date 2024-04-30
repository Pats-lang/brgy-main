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
</head>
<style>
.modal-lg {
    max-width: 80%;
    /* You can adjust the percentage according to your needs */
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Requesting Tools</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Request</i>
                                </li>
                                <li class="breadcrumb-item text-secondary">Requesting Tools</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <table id="manageitem_Table" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item Name</th>
                                                <th>Fullname</th>
                                                <th>Address</th>
                                                <th>Borrowed_sched</th>
                                                <th >Return_sched</th>
                                                <th >Contact</th>
                                                <th >Purpose</th>
                                                <th >Status</th>
                                                <th >Time_added</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $count =1;
                                            $query = "SELECT * FROM `request_tools` ";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr id="<?php echo $row['id']; ?>">
                                                <td>
                                                    <?php echo $count++ ?>
                                                </td>
                                                <td>
                                                 <?php echo $row['Item']; ?>
                                                </td>
                                                <td>
                                                <?php echo $row['fullname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['address']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['borrowed_sched']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['return_sched']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['contact']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['purpose']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['status']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['time_added']; ?>
                                                </td>
                                                <td class="text-center" style="width: 150px;">
                                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#viewItem_modal" data-id="<?php echo $row['id']; ?>" data-role="viewItem_btn">
                                                            <i class="fa-solid fa-eye fa-xl" style="color: green;"></i>
                                                        </button>

                                                        <button type="button" class="btn " data-id="<?php echo $row['id']; ?>" data-role="deleteItem_btn">
                                                            <i class="fa-solid fa-trash fa-xl" style="color: red;"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </div>

                    </div>


                </div>


            </section>


        </div>
    </div>
    <?php include 'includes/admin_footer.php'; ?>
    <script>
    $(document).ready(function() {
        $('#manageitem_Table').DataTable({
            buttons: [{
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copy'
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> PDF'
                },
            ],
            dom: 'Bfrtip',
            responsive: true
        });
    });
   
    

    </script>
</body>

</html>