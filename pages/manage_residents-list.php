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
                            <h1>Residents List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Residents</i>
                                </li>
                                <li class="breadcrumb-item text-secondary">Residents List</li>
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
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Sector</th>
                                                <th>Email</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $query = "SELECT * FROM `user_account` WHERE `status` = '2' ";
                                            $count = 1;
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr id="<?php echo $row['account_id']; ?>">
                                                    <td>
                                                        <?php echo $count++ ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['first_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['middle_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['last_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['sector']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['email']; ?>
                                                    </td>



                                                    <td class="text-center" style="width: 150px;">

                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewInquiry_modal" data-id="<?php echo $row['account_id']; ?>" data-role="editAnnouncement_btn">
                                                            View
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
                            <form id="editAnnouncementForm">
                                <div class="card-body">

                                    <div class="row ">
                                        <div class="col-md-8">
                                            <label for="register_last_name">Last Name</label>
                                            <input type="text" class="form-control form-control-border" id="account" name="account" readonly>
                                            <label for="add_Image_id">Proof of Residency </label>
                                            <img alt="Member Picture" id="addPreview_Image_id" class="w-100">
                                            <input type="file" class="form-control form-control-border" id="add_Image_id" name="add_Image_id" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="add_Image_profile">Profile Image</label>
                                            <img alt="Member Picture" id="addPreview_Image_profile" class="w-100">
                                            <input type="file" class="form-control form-control-border" id="add_Image_profile" name="add_Image_profile" disabled>

                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                            <label for="register_last_name">Last Name</label>
                                            <input type="text" class="form-control form-control-border" id="register_last_name" name="register_last_name" placeholder="Type your Last Name" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="register_first_name">First Name</label>
                                            <input type="text" class="form-control form-control-border" id="register_first_name" name="register_first_name" placeholder="Type your First Name" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="register_middle_name">Middle Name</label>
                                            <input type="text" class="form-control form-control-border" id="register_middle_name" name="register_middle_name" placeholder="Type your Middle Name" readonly>

                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="register_address">Address</label>
                                            <input type="text" class="form-control form-control-border" id="register_address" name="register_address" placeholder="Type your Address" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="register_email">Email Address</label>
                                            <input type="text" class="form-control form-control-border" id="register_email" name="register_email" placeholder="Type your Email Address" readonly>

                                        </div>
                                    </div>


                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                            <label for="register_bday">Birthday</label>
                                            <input type="text" class="form-control form-control-border" id="register_bday" name="register_bday" placeholder="Type your Birthday" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="register_contact">Contact</label>
                                            <input type="text" class="form-control form-control-border" id="register_contact" name="register_contact" placeholder="Type your Contact" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="register_status">Marital Status</label>
                                            <select type="text" class="form-control form-control-border" id="register_status" name="register_status" placeholder="Choose your Status" disabled>
                                                <option class="form-control form-control-border"> Single </option>
                                                <option class="form-control form-control-border"> Married </option>
                                                <option class="form-control form-control-border">Others </option>

                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <!-- /.card-footer -->
                                <div class="modal-footer">
                                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Done</button>

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

        // Edit Announcement: Populate Fields
        $(document).on('click', 'button[data-role=editAnnouncement_btn]', function() {
            $.ajax({
                type: "POST",
                url: "../server/read_verification.php",
                data: {
                    id: $(this).attr('data-id'),
                },
                dataType: "json",
                success: function(response_editAnnouncement) {
                    $('#account').val(response_editAnnouncement.account_id); // Corrected property name
                    $('#register_last_name').val(response_editAnnouncement.last_name); // Corrected property name
                    $('#register_first_name').val(response_editAnnouncement.first_name); // Corrected property name
                    $('#register_address').val(response_editAnnouncement.address); // Corrected property name
                    $('#register_email').val(response_editAnnouncement.email); // Corrected property name
                    $('#register_bday').val(response_editAnnouncement.birthday); // Corrected property name
                    $('#register_contact').val(response_editAnnouncement.contact); // Corrected property name
                    $('#register_status').val(response_editAnnouncement.marital_status); // Corrected property name
                    $('#status').val(response_editAnnouncement.status); // Corrected property name

                    $('#addPreview_Image_id').attr('src', '../assets/images/proof-pictures/' + response_editAnnouncement.proof_of_identity);
                    $('#addPreview_Image_profile').attr('src', '../assets/images/proof-pictures/' + response_editAnnouncement.profile);


                }
            });


        });
    </script>
</body>

</html>