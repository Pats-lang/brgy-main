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
                            <h1>Request Barangay Building Permit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Request</i>
                                </li>
                                <li class="breadcrumb-item text-secondary">Request Barangay Building Permit</li>
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
                                    <table id="manageClient_inquiriesTable" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>MEMBER ID</th>
                                                <th>Transaction ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Contact No</th>
                                                <th>Status</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM `request_brgybp` ";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr id="<?php echo $row['id']; ?>">
                                                    <td>
                                                        <?php echo $row['id']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $row['member_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['transaction_id']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $row['name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['address']; ?>
                                                    </td>
                                                  
                                                    <td>
                                                        <?php echo $row['contact_no']; ?>
                                                    </td>

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

                                                    <td class="text-center" style="width: 150px;">

                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewInquiry_modal" data-id="<?php echo $row['id']; ?>" data-role="editAnnouncement_btn">
                                                            Verify
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

    <!-- Modal -->
    <div class="modal fade" id="reviewInquiry_modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header card-primary card-outline">
                    <h5 class="modal-title" id="exampleModalLabel">Verify Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card-primary card-outline">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- /.card-header -->
                            <!-- /.card-header -->
                            <form id="editAnnouncementForm">
                                <div class="card-body">

                                    <div class="row ">
                                        <div class="col-md-4">

                                            <label for="add_Image_id">ID</label>
                                            <input type="text" class="form-control form-control-border" id="id" name="id" readonly>

                                        </div>
                                        <div class="col-md-4">

                                            <label for="add_Image_id">MEMBER ID</label>
                                            <input type="text" class="form-control form-control-border" id="member_id" name="member_id" readonly>

                                        </div>
                                        <div class="col-md-4">

                                            <label for="add_Image_id">TRANSACTION ID</label>
                                            <input type="text" class="form-control form-control-border" id="transaction" name="transaction" readonly>

                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="register_last_name">Name</label>
                                            <input type="text" class="form-control form-control-border" id="register_name" name="register_name" placeholder="Type your Last Name" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="register_first_name">Address</label>
                                            <input type="text" class="form-control form-control-border" id="register_address" name="register_address" placeholder="Type your First Name" readonly>
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                     
                                        <div class="col-md-4">
                                            <label for="register_email">Email Address</label>
                                            <input type="text" class="form-control form-control-border" id="register_email" name="register_email" placeholder="Type your Email Address" readonly>

                                        </div>
                                        <div class="col-md-4">
                                            <label for="register_email">Contact Number</label>
                                            <input type="text" class="form-control form-control-border" id="register_contact" name="register_contact" placeholder="Type your Email Address" readonly>

                                        </div>
                                    </div>


                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="register_bday">Purpose</label>
                                            <textarea type="text" class="form-control form-control-border" id="register_purpose" name="register_purpose" placeholder="Type your Birthday" readonly>
                                                </textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="register_contact">Request</label>
                                            <textarea type="text" class="form-control form-control-border" id="register_request" name="register_request" placeholder="Type your Contact" readonly>
                                                </textarea>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <label for="register_status">Status</label>
                                        <select type="text" class="form-control form-control-border" id="status" name="status" placeholder="Choose your Status">
                                            <option class="form-control form-control-border" value="2"> APPROVED
                                            </option>
                                            <option class="form-control form-control-border" value="1">REJECT</option>


                                        </select>
                                    </div>
                                </div>
                        </div>

                        <!-- /.card-footer -->
                        <div class="modal-footer">
                            <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">SUBMIT</button>

                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#manageClient_inquiriesTable').DataTable({
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
                    }, {
                        text: '<i class="fa-solid fa-print"></i>',
                        className: 'print-btn',
                        action: function(e, dt, node, config) {
                            location.href = "../server/print_member.php";
                        }
                    }
                ],
                dom: 'Bfrtip',
                responsive: true
            });
        });


        // Edit Announcement: Submit Fields
        $('#editAnnouncementForm').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: ' Save',
                denyButtonText: 'Dont save',
            }).then((result) => {
                $('#editAnnouncement_modal').modal('hide');
                if (result.isConfirmed) {
                    $.ajax({
                        url: "../server/edit_brgy_rqst_cor.php",
                        type: "POST",
                        data: new FormData(this),
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response_editAnnouncement) {
                            if (response_editAnnouncement.status) {
                                toastr.success(response_editAnnouncement.message, '', {
                                    timeOut: 1000,
                                    closeButton: false,
                                    onHidden: function() {
                                        setTimeout(function() {
                                            location.reload();
                                        }, 500); // Adjust the delay as needed
                                    }
                                });
                            } else {
                                toastr.error(response_editAnnouncement.message, '', {
                                    closeButton: false,
                                });
                            }
                        },
                        error: function(error) {
                            toastr.error('An Error occurred: ' + error, '', {
                                positionClass: 'toast-top-end',
                                closeButton: false
                            });
                        }
                    });
                } else if (result.isDenied) {
                    toastr.info('Changes are not saved', '', {
                        closeButton: false
                    });
                }
            });
        });

        // Edit Announcement: Populate Fields
        $(document).on('click', 'button[data-role=editAnnouncement_btn]', function() {
            $.ajax({
                type: "POST",
                url: "../server/read_brgy_bp.php",
                data: {
                    id: $(this).attr('data-id'),
                },
                dataType: "json",
                success: function(response_editAnnouncement) {
                    $('#id').val(response_editAnnouncement.id); // Corrected property name
                    $('#member_id').val(response_editAnnouncement.member_id); // Corrected property name
                    $('#transaction').val(response_editAnnouncement.transaction_id); // Corrected property name

                    $('#register_name').val(response_editAnnouncement.name); // Corrected property name
                    $('#register_address').val(response_editAnnouncement
                        .address); // Corrected property name
                    $('#register_email').val(response_editAnnouncement
                        .email); // Corrected property name
               
                    $('#register_contact').val(response_editAnnouncement
                        .contact_no); // Corrected property name
                    $('#register_purpose').val(response_editAnnouncement
                        .purpose); // Corrected property name
                    $('#register_request').val(response_editAnnouncement
                        .request); // Corrected property name

                    $('#status').val(response_editAnnouncement.status); // Corrected property name



                }
            });


        });
    </script>
</body>

</html>