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
$transaction_id = 'CERT-'. $currentYear . '-' . $randomNumber ;


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
            <!-- Main content -->
            <section>




                <div class="container-fluid bg-light p-5">
                    <form id="request_barangay-certform" method="post" class="p-5 rounded border" style=" max-width: 650px; margin: 0 auto; background-color: #ADE8F4; box-shadow: 0px 1px 10px rgba(0, 0, 255, 0.4);
                background-color: #fdfdfd;">

                        <div class="text-center mb-5">
                            <img src="../assets/images/logo/barangay.png" alt="Image"
                                style="height: 100px; max-width: 100px;">
                        </div>

                        <?php
                        // Fetch member data based on the logged-in user
                        $sql = "SELECT members.member_id, members.fullname, members.address, members.email_address, members.cellphone_no, member_address.yrs_res
                                FROM members
                                INNER JOIN member_account ON members.member_id = member_account.member_id
                                INNER JOIN member_address ON members.member_id = member_address.member_id
                                WHERE member_account.username = '$userLogged'";
                        $result = mysqli_query($db, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                        }
                        ?>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="transaction_id">Transaction Id</label>
                                    <input type="text" name="transaction_id" id="transaction_id" class="form-control"
                                        value="<?php echo $transaction_id; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="member_id">Member Id</label>
                                    <input type="text" name="member_id" id="member_id" class="form-control"
                                        value="<?php echo $row['member_id']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $row['fullname']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="request">Request</label>
                                    <input type="text" name="request" id="request" class="form-control"
                                        value="Barangay Certificate" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="residency">Year Residency</label>
                                    <input type="number" name="residency" id="residency" class="form-control"
                                        value="<?php echo $row['yrs_res']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="<?php echo $row['address']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="<?php echo $row['email_address']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact Number</label>
                                    <input type="number" name="contact" id="contact" class="form-control"
                                        value="<?php echo $row['cellphone_no']; ?>">
                                </div>
                            </div>
                        </div>



                        <div class="form-group mb-4">
                            <label for="purpose">Purpose</label>
                            <textarea class="form-control" name="purpose" id="purpose" rows="4"></textarea>
                        </div>


                        <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block w-75 mx-auto">Send</button>
                        </div>



                    </form>
                </div>

            </section>
        </div>
        <!-- /.content-wrapper -->

        <?php include 'includes/admin_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>

<script>
$(document).ready(function() {
    $('#request_barangay-certform').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Perform form validation
        var isValid = $('#request_barangay-certform').valid();

        // If the form is valid, proceed with the submission
        if (isValid) {
            Swal.fire({
                title: 'Do you want to send this request?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Send',
                denyButtonText: 'Don\'t Send',
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData($('#request_barangay-certform')[0]);
                    $.ajax({
                        url: "../server/req_brgycerti_apii.php",
                        type: "POST",
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status) {
                                toastr.success(response.message, '', {
                                    timeOut: 1000,
                                    closeButton: false,
                                    onHidden: function() {
                                        setTimeout(function() {
                                            location.reload();
                                        }, 500);
                                    }
                                });
                            } else {
                                toastr.error(response.message, '', {
                                    closeButton: false,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            toastr.error(
                                'An error occurred while sending the request.',
                                '', {
                                    closeButton: false,
                                });
                        }
                    });
                } else if (result.isDenied) {
                    toastr.info('Sending failed', '', {
                        closeButton: false
                    });
                }
            });
        }
    });
});


$(document).ready(function() {
    // Add custom validation method for alphabetic characters with space
    
   
    jQuery.validator.addMethod("alphabeticWithSpaceAndDot", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s.,]*$/.test(value);
    }, "Please enter alphabetic characters only.");
    // Form validation
    var validate_form = $('#request_barangay-certform').validate({
        rules: {
            transaction_id: {
                required: true,
            },
            member_id: {
                required: true,
            },
            request: {
                required: true,
            },
            name: {
                required: true,
                alphabeticWithSpaceAndDot: true,
            },
            contact: {
                required: true,
                maxlength: 11,
                minlength: 11,
                pattern: /^09\d{9}$/,
            },
            address: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            residency: {
                required: true,
                // Add additional condition for residency
                minlength: 1,
                digits: true,
            },
            purpose: {
                required: true,
                maxlength: 100,
                minlength: 2,


            },
        },
        messages: {
            // Add appropriate error messages for each field
            transaction_id: {
                required: 'Please enter Transaction ID!',
            },
            member_id: {
                required: 'Please enter Member ID!',
            },
            request: {
                required: 'Please enter Request!',
            },
            name: {
                required: 'Please enter your Name!',
            },
            address: {
                required: 'Please provide a valid Address!',
            },
            email: {
                required: 'Please provide a valid Email Address! Ex.(example@gmail.com)',
            },
            contact: {
                required: 'Please provide Contact Number!',
                maxlength: 'Please provide 11 digits! ',
                minlength: 'Please provide 11 digits! ',
                pattern: 'Please provide a valid Contact Number! Ex.(09123456789)',
            },
            residency: {
                required: 'Please provide a valid Year Residency!',
                minlength: 'Please provide a valid Year Residency!',
                digits: 'Please provide a valid Year Residency!',
            },
            purpose: {
                required: 'Please provide a valid purpose!',
                maxlength: 'Please limit your input to 50 characters.',
                minlength: 'Please provide a valid purpose! ',

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
        }
    });
});
</script>


</html>