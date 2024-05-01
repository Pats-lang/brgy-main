<?php
session_start();

include '../config/connection.php';


$userLogged = $_SESSION['userLogged'];

if (empty($userLogged)) {
    header('Location: ../index.php');
    exit;
}

// Get the current year
$currentYear = date('Y');

// Generate a random 6-digit number
$randomNumber = mt_rand(100000, 999999);

// Create the transaction ID
$transaction_id = 'SER-'. $currentYear . '-' . $randomNumber ;


$sql = "SELECT * FROM settings";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGBMS | E-Governance Barangay Management System</title>
    <!-- LOGO SA TAAS -->
    <link rel="icon" href="../assets/images/logo/<?php echo $row['sLogo']; ?>" />
    <?php } ?>
    <?php include 'import.php'; ?>
</head>

<style>
input[readonly] {
    background-color: #f2f2f2;
    /* Gray background color */
}
</style>

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
                            <h1>Service</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a>Service</a></li>
                                <li class="breadcrumb-item text-secondary">Barangay Certificate</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container">

                <div class="row">

                    <?php
                  // retrieve venue information from database
                    $query = "SELECT * FROM `barangay_inventory`";
                    $result = mysqli_query(getDatabase(), $query);                    
                    // generate a card for each venue
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="col-md-4">
                        <div class="card mt-3">
                            <img src="../assets/images/item/<?php echo $row['picture']; ?>"
                                class="img-thumbnail img-fluid img" data-bs-toggle="modal"
                                data-bs-target="#imageCarousel<?php echo $row['id']; ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title fs-1"><?php echo $row['item_name']; ?></h5>
                                    </div>
                                </div>
                                <div class="row mt-3 float-end">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary"  data-item-id="<?php echo $row['id']; ?>">BOOK
                                            NOW</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal1<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Booking Details for
                                        <?php echo $row['item_name']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <?php
                                 
                                 //  $userLogged = $_SESSION['userLogged'];
                                 $member_query = "SELECT * 
                                 FROM `members`
                                 WHERE member_id = (SELECT member_id FROM `member_account` WHERE username = '$userLogged')";
                $member_result = mysqli_query(getDatabase(), $member_query);
                $member_row = mysqli_fetch_assoc($member_result);
                                      ?>

                                <div class="modal-body">
                                    <form id="event-form" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="transaction_id">Transaction Id</label>
                                                    <input type="text" name="transaction_id" id="transaction_id"
                                                        class="form-control" value="<?php echo $transaction_id; ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="member_id" class="form-label">member_id</label>
                                                    <input type="text" class="form-control" id="member_id"
                                                        name="member_id" value="<?php echo $member_row['member_id']; ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <input type="hidden" name="item"
                                                        value="<?php echo $row['item_name']; ?>">
                                                    <label for="fullname" class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" id="fullname"
                                                        name="fullname" value="<?php echo $member_row['fullname']; ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        value="<?php echo $member_row['address']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="contact" class="form-label">Contact #</label>
                                                    <input type="number" class="form-control" id="contact"
                                                        name="contact"
                                                        value="<?php echo $member_row['cellphone_no']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="event-schedule" class="form-label">Borrowed
                                                        Schedule</label>
                                                    <input type="date" class="form-control event-date"
                                                        id="borrowed_sched" name="borrowed_sched"
                                                        value="<?php echo date('Y-m-d'); ?>"
                                                        min="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                            <div class="col">

                                                <div class="mb-3">
                                                    <label for="event-schedule" class="form-label">Return
                                                        Schedule</label>
                                                    <input type="date" class="form-control event-date" id="return_sched"
                                                        name="return_sched" value="<?php echo date('Y-m-d'); ?>"
                                                        min="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <div class="form-floating">
                                                        <textarea class="form-control"
                                                            placeholder="Leave a comment here" id="purpose"
                                                            name="purpose"></textarea>
                                                        <label for="purpose">Purpose</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" id="submit" class="btn btn-primary " value="submit"
                                            data-id="<?php echo $row['id']; ?>">Submit</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="imageCarousel<?php echo $row['id']; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3> <?php echo $row['item_name']; ?></h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="admin/uploaded_img/<?php echo $row['picture']; ?>" class=" img-fluid"
                                        data-aos="fade-up">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                </div>
            </div>

            <section>

            </section>
        </div>
        <!-- /.content-wrapper -->

        <?php include 'includes/admin_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>

<script>

// Click event handler for the "BOOK NOW" button
$('button.btn-primary').click(function() {
    var item_id = $(this).data('item-id');
    
    // Ajax request to check available stocks
    $.ajax({
        type: 'POST',
        url: '../server/check_stocks.php',
        data: { item_id: item_id },
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                // If there's an error (no available stocks), show alert
                showAlert();
            } else if (response.stocks > 0) {
                // If stocks available, perform action (e.g., open modal)
                $('#exampleModal1' + item_id).modal('show');
            }
        },
        error: function() {
            // Show error alert if something goes wrong with the Ajax request
            Swal.fire("Error", "Failed to check available stocks. Please try again later.", "error");
        }
    });
});

function showAlert() {
    Swal.fire({
        icon: "warning",
                title: "This item is not available",
                text: 'No available stocks for this.'
    });
}


$(document).ready(function() {
    // Add custom validation method for alphabetic characters with space
    jQuery.validator.addMethod("alphabeticWithSpaceAndDot", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s.,]*$/.test(value);
    }, "Please enter alphabetic characters only.");
    $(document).ready(function() {
        // Initialize form validation for each modal's form
        $('.modal').each(function() {
            var modalForm = $(this).find('form');
            modalForm.validate({
                rules: {
                    borrowed_sched: {
                        required: true,
                    },
                    return_sched: {
                        required: true,
                    },
                    purpose: {
                        required: true,
                        minlength: 5,
                    },
                },
                messages: {
                    borrowed_sched: {
                        required: 'Please enter Transaction ID!',
                    },
                    return_sched: {
                        required: 'Please enter Member ID!',
                    },
                    purpose: {
                        required: 'Please enter Request!',
                        minlength: 'Please enter at least 5 characters',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
                submitHandler: function(form) {
                    var isValid = $(form).valid();
                    if (isValid) {
                        submitForm($(form));
                    } else {
                        $(form).find('.is-invalid:first').focus();
                    }
                }
            });
        });

        function submitForm(form) {
            $.ajax({
                type: 'POST',
                url: '../server/client_requestform-tool.php',
                data: new FormData(form[0]),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message, '', {
                            positionClass: 'toast-top-right',
                            timeOut: 1000,
                            closeButton: false,
                            onHidden: function() {
                                location.reload();
                            }
                        });
                    } else {
                        toastr.error(response.message, '', {
                            positionClass: 'toast-top-right',
                            closeButton: false
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
        }
    });
});
</script>


</html>