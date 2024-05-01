<?php
session_start();
include 'header.php';
include '../../server/client_server/conn.php';
// Check if the user has completed both email and OTP verification steps
// if (!isset($_SESSION['message_sent']) || $_SESSION['message_sent'] !== true) {
//     // Redirect the user back to index.php
//     header("Location: index.php");
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGBMS</title>
    <link rel="icon" href="img/logo.png" />

    <style>
    /* Additional custom styles */
    body {
        font-family: Georgia, serif;
        font-weight: bold;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../../assets/images/stepper.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .breadcrumb-container {
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .breadcrumb-container h2 {
        margin: 0;
    }

    .breadcrumb-container img {
        margin: 5px;
    }

    .card {
        margin: 20px;
        padding: 20px;

    }

    .modal-overlay {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-color: rgba(0, 0, 0, 0.5);


        z-index: 1;
        /* Lower z-index value for the overlay */
    }
    </style>
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
    <?php include '../includes/client_navigation.php'; ?>
    <!--   <section>
            <div class="bg-warning py-0">
                <div class="container">
                    <div class="mx-auto">
                        <div class="p-2 breadcrumb-container">
                            <div class="d-flex justify-content-center align-items-center mt-2 flex-wrap">
                                <h2>
                                    <img src="../../assets/images/logo/barangay.png" alt="Logo" width="60" height="60">
                                    BARANGAY 20
                                    <img src="../../assets/images/logo/caloocan.png" alt="Logo" width="60" height="60">
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-8">
            <!-- Adjust column size to make the card larger -->
            <div class="card p-4">
                <div class="card-header text-center">
                    Enter the OTP sent to your Email Address.
                </div>
                <div class="card-body">
                    <div class="alert alert-success alert-dismissable">
                        <strong>NOTE: Your OTP will only be available for 5 Minutes!</strong>
                    </div>
                    <form id="verificationForm">
                        <div class="form-outline mb-4">

                            <label class="form-label" for="otp">OTP:</label>
                            <input type="text" class="form-control" id="otp" name="otp" required>
                        </div>
                        <button type="submit" class="btn btn-primary" aria-hidden="true" name="verify">VERIFY</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include '../../pages/includes/client_footer.php' ?>
    </footer>

    <script>
    $(document).ready(function() {

        $('#centeredModal').modal('show');
        // Add a custom validation method for numbers-only input with exactly 6 digits
        $.validator.addMethod("otpValidation", function(value, element) {
            return /^[0-9]{6}$/.test(value);
        }, "Please enter a valid OTP (6 digits only).");

        // Initialize form validation
        $("#verificationForm").validate({
            rules: {
                otp: {
                    required: true,
                    otpValidation: true
                }
            },
            messages: {
                otp: {
                    required: "Please enter the OTP.",
                    otpValidation: "Please enter a valid OTP (6 digits only)."
                }
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            },
            submitHandler: function(form) {
                // Get the form data
                var formData = $(form).serialize();
                $.ajax({
                    type: 'POST',
                    url: '../../server/client_server/sql_verify_otp.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); // Check the response object
                        // Handle the response from the PHP file
                        if (response.status === 'success') {
                            // Display a success SweetAlert
                            Swal.fire('Success', response.message, 'success').then((
                                result) => {
                                if (result.isConfirmed) {
                                    // Redirect to the desired page when the user clicks "OK"
                                    window.location.href = 'stepper.php';
                                }
                            });
                        } else {
                            // Display an error SweetAlert
                            Swal.fire({
                                title: 'Error',
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Check if the error is due to OTP expiration
                                    if (response.status === 'error' && response
                                        .message ===
                                        'OTP has expired. Please request a new OTP.'
                                        ) {
                                        // Redirect to 'index.php' if OTP has expired
                                        window.location.href = 'send_otp.php';
                                    }
                                }
                            });
                        }
                    },

                    error: function(xhr, status, error) {
                        // Handle AJAX errors
                        console.error('AJAX Error:', error);
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while processing your request. Please try again later.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            } // <-- Close submitHandler function here
        }); // <-- Close validate function call here


        window.history.pushState(null, null, window.location.href);
        window.addEventListener('popstate', function(event) {
            window.history.pushState(null, null, window.location.href);
        });
    });
    </script>

</body>

</html>