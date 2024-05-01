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
                                                <th>Return_sched</th>
                                                <th>Contact</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                                <th>Time_added</th>
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
                                                    <button type="button" class="btn " data-bs-toggle="modal"
                                                        data-bs-target="#viewItem_modal"
                                                        data-id="<?php echo $row['id']; ?>" data-role="viewItem_btn">
                                                        <i class="fa-solid fa-eye fa-xl" style="color: green;"></i>
                                                    </button>

                                                    <button type="button" class="btn "
                                                        data-id="<?php echo $row['id']; ?>" data-role="deleteItem_btn">
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
    <!--view Modal -->
    <div class="modal fade" id="viewItem_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Request Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <img src="" id="view_tools" class="img-fluid">
                            </div>
                            <div class="col">
                                <label for="item_name">Item Name</label>
                                <input type="text" class="form-control form-control-border" id="item_name"
                                    name="itemname" readonly>

                                <label for="fullname">fullname</label>
                                <input type="text" class="form-control form-control-border" id="fullname"
                                    name="fullname" readonly>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <label for="address">Address</label>
                                <input type="text" class="form-control form-control-border" id="address" name="address"
                                    readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="borrowed_sched">Borrowed Schedule</label>
                                <input type="date" class="form-control form-control-border" id="borrowed_sched"
                                    name="borrowed_sched" readonly>
                            </div>
                            <div class="col">
                                <label for="return_sched">Return Schedule</label>
                                <input type="date" class="form-control form-control-border" id="return_sched"
                                    name="return_sched" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="contact">Contact No</label>
                                <input type="number" class="form-control form-control-border" id="contact"
                                    name="contact" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="purpose">Purpose</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="purpose"
                                        name="purpose" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="stats" class="form-label">Status</label>
                                <select class="form-select" id="stats" name="stats">

                                    <option value="1">ACCEPTED</option>
                                    <option value="3">REMOVE</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-block">Understood</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

            // View Announcement: Populate Fields 
            $(document).on('click', 'button[data-role=viewItem_btn]', function() {
            $.ajax({
                type: "POST",
                url: "../server/read_request-tools.php",
                data: {
                    id: $(this).attr('data-id'),
                },
                dataType: "json",
                success: function(response) {
                    $('#view_tools').attr('src', '../assets/images/item' + response.img);
                    $('#view_titleAnnouncements').val(response.title);
                    $('#view_descriptionAnnouncements').val(response.description);
                    $('#view_lastModifiedAnnouncements').val(response.last_modified);
                }
            })

        });
    </script>
</body>

</html>