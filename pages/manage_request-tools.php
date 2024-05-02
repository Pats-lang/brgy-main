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
                                                    <?php 
        $status = $row['status'];
        if ($status == 0) {
            $badge_class = 'badge bg-warning text-dark';
            $status_text = 'Pending';
        } elseif ($status == 2) {
            $badge_class = 'badge bg-success';
            $status_text = 'Approve';
        } elseif ($status == 1) {
            $badge_class = 'badge bg-danger';
            $status_text = 'Reject';
        } else {
            $badge_class = 'badge bg-secondary';
            $status_text = 'Unknown';
        }
    ?>
                                                    <span
                                                        class="badge <?php echo $badge_class; ?>"><?php echo $status_text; ?></span>
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
                <form id="editAnnouncementForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="member_id">Member ID</label>
                                <input type="text" class="form-control form-control-border" id="member_id"
                                    name="member_id" readonly>
                            </div>
                            <div class="col">
                                <label for="transaction_id">Transaction ID</label>
                                <input type="text" class="form-control form-control-border" id="transaction_id"
                                    name="transaction_id" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="item_name">Item Name</label>
                                <input type="text" class="form-control form-control-border" id="itemname"
                                    name="itemname" readonly>
                            </div>
                            <div class="col">
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
                                    <!-- <option value="">-- Select Relationship --</option> -->
                                    <option value="0">PENDING</option>
                                    <option value="2">ACCEPTED</option>
                                    <option value="1">DECLINED</option>
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
            buttons: [
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
                $('#member_id').val(response.member_id);
                $('#transaction_id').val(response.transaction_id);
                $('#itemname').val(response.Item);
                $('#fullname').val(response.fullname);
                $('#address').val(response.address);
                $('#borrowed_sched').val(response.borrowed_sched);
                $('#return_sched').val(response.return_sched);
                $('#contact').val(response.contact);
                $('#purpose').val(response.purpose);
                $('#status').val(response.status);
            }
        })

    });

    // Edit Announcement: Submit Fields
    $('#editAnnouncementForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        // Add selected status and transaction_id to form data
        formData.append('stats', $('#stats').val()); // Add selected status
        formData.append('transaction_id', $('#transaction_id').val()); // Add transaction_id
        formData.append('itemname', $('#itemname').val()); // Add transaction_id


        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            
            confirmButtonText: ' Save',
            denyButtonText: 'Cancel',
        }).then((result) => {

            $('#editAnnouncement_modal').modal('hide');
            if (result.isConfirmed) {
                $.ajax({
                    url: "../server/edit_request-tools.php",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response_editAnnouncement) {
                        if (response_editAnnouncement.status) {
                            toastr.success(response_editAnnouncement.message, '', {
                                timeOut: 1000,
                                closeButton: false,
                                onHidden: function() {
                                    // Check if applicant data is available before sending SMS
                                    if (response_editAnnouncement
                                        .applicant_name &&
                                        response_editAnnouncement
                                        .applicant_status &&
                                        response_editAnnouncement.applicant_num
                                    ) {
                                        console.log(
                                            "Calling sendSMS with parameters:",
                                            response_editAnnouncement
                                            .applicant_name,
                                            response_editAnnouncement
                                            .applicant_status,
                                            response_editAnnouncement
                                            .applicant_num
                                        );
                                        sendSMS(response_editAnnouncement
                                            .applicant_name,
                                            response_editAnnouncement
                                            .applicant_status,
                                            response_editAnnouncement
                                            .applicant_num
                                        );

                                    } else {
                                        console.log(
                                            "Applicant data not available to send SMS."
                                            );
                                    }
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


    // The sendSMS function
    function sendSMS(name, status, num) {
        // Define the SMS message
        let message;
        if (status == 2) {
            message =
                `Magandang araw, ${name}! Nais naming ipaalam sa inyo na ang inyong request ay aprobado na ating Barangay. Maraming salamat po.`;
        } else if (status == 1) {
            message =
                `Magandang araw, ${name}! Nais naming ipaalam sa inyo na ang inyong request ay hindi aprobado na ating Barangay. Maraming salamat po.`;
        } else {
            message = `Default message for unknown status.`;
        }

        // Configuration for sending SMS
        const smsData = {
            cellphone: num,
            message: message
        };

        // Log SMS data to verify formatting
        console.log("SMS Data:", smsData);

        // AJAX call to send SMS
        $.ajax({
            type: 'POST',
            url: '../server/send_sms.php',
            data: smsData,
            dataType: 'json',
            success: function(response) {
                console.log('SMS sent successfully:', response);
                // Don't reload the page after sending SMS
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error sending SMS:', error);
                console.log('XHR:', xhr);
                console.log('Status:', status);
            }
        });
    }
    </script>
</body>

</html>