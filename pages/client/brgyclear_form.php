<?php
include 'header.php';
include '../../server/client_server/conn.php';

session_start();


if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the current year
$currentYear = date('Y');

// Generate a random 6-digit number
$randomNumber = mt_rand(100000, 999999);

// Create the transaction ID
$transaction_id = $currentYear . '-' . $randomNumber ;

$adminLogged = $_SESSION['adminLogged'];



if (empty($adminLogged)) {
    header('Location: pages\login_client.php');
    exit;
}

include '../../server/client_server/conn.php';

$sql = "SELECT members.name, members.picture
        FROM members
        INNER JOIN member_account ON members.member_id = member_account.member_id
        WHERE member_account.username = '$adminLogged'";
$result = mysqli_query($connection, $sql);

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request form</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- BS Stepper -->
    <!-- <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
        <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.css">
        <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
    <!-- Animate on Scroll (AOS) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery Validation (1.19.5 for all Plugins and Validation itself) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"
        integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://kit.fontawesome.com/301afcc9b9.js" crossorigin="anonymous"></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</head>

<style>
@media (min-width: 700px) {
    .larger-image {
        max-width: 100%;
        height: auto;
        width: 100%;
    }
}
</style>
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <?php include('../includes/client_nav.php'); }?>

    <section>
        <div class="bg-light">
            <div class="container">
                <div class="mx-auto">
                    <div class="p-2 breadcrumb-container">
                        <div class="d-flex justify-content-between align-items-center mt-2 flex-wrap">

                            <div>
                                <h2>Barangay Clearance Form</h2>
                            </div>

                            <div class="d-flex flex-wrap align-items-center">
                                <a href="../../index.php" class="text-reset fw-bold"
                                    style="text-decoration:none;">Home</a>
                                <span class="mx-1">/</span>
                                <a href="" class="text-reset" style="text-decoration:none;">Services</a>
                                <span class="mx-1">/</span>
                                <a href="" class="text-reset" style="text-decoration:none;">Barangay Clearance</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container w-50 border my-5 p-5">

        <form id="editAnnouncementForm" method="post">

            <?php

           $sql = "SELECT members.member_id, members.name, members.address, members.email_address, members.cellphone_no, member_address.yrs_res
                    FROM members
                    INNER JOIN member_account ON members.member_id = member_account.member_id
                    INNER JOIN member_address ON members.member_id = member_address.member_id
                    WHERE member_account.username = '$adminLogged'";
            $result = mysqli_query($connection, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

            ?>

            <div class="row mb-4">
                <div class="col-4">


                    <div data-mdb-input-init class="form-outline">
                        <input type="text" name="transaction_id" class="form-control"
                            value="<?php echo $transaction_id; ?>" readonly />
                        <label class="form-label" for="transaction_id">Transaction Id</label>
                    </div>

                    <div data-mdb-input-init class="form-outline">
                        <input type="text" name="member_id" class="form-control" value="<?php echo $row['member_id'];?>"
                            readonly />
                        <label class="form-label" for="member_id">Member Id</label>
                    </div>
                </div>
            </div>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">

                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" name="name" id="name" class="form-control"
                            value="<?php echo $row['name'];?>" />
                        <label class="form-label" for="form6Example1">Name</label>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" name="request" id="request" class="form-control" value="Barangay Clearance"
                            readonly style="background-color: #f2f2f2;" />
                        <label class="form-label" for="form6Example2">Request</label>
                    </div>
                </div>
            </div>



            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" name="residency" id="residency" class="form-control"
                    value="<?php echo $row['yrs_res'];?>" />
                <label class="form-label" for="form6Example3">Year Residency</label>
            </div>

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="address" id="address" class="form-control"
                    value="<?php echo $row['address'];?>" />
                <label class="form-label" for="form6Example4">Address</label>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control"
                    value="<?php echo $row['email_address'];?>" />
                <label class="form-label" for="form6Example5">Email</label>
            </div>

            <!-- Number input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" name="contact" id="contact" class="form-control"
                    value="<?php echo $row['cellphone_no'];?>" />
                <label class="form-label" for="form6Example6">Contact Number</label>
            </div>

            <!-- Message input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <textarea class="form-control" name="purpose" id="purpose" rows="4"></textarea>
                <label class="form-label" for="form6Example7">Purpose</label>
            </div>




            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Request Button</button>


            <?php } ?>
        </form>

    </div>

    <footer>
        <?php include('../includes/client_footer.php'); ?>
    </footer>

    <script>
    $(document).ready(function() {
        $('#editAnnouncementForm').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Do you want to send this request?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: ' Send ',
                denyButtonText: 'Don\'t Send',
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData(this);
                    $.ajax({
                        url: "../../server/req_brgyclrs_apii.php",
                        type: "POST",
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response_editAnnouncement) {
                            if (response_editAnnouncement.status) {
                                toastr.success(response_editAnnouncement.message,
                                    '', {
                                        timeOut: 1000,
                                        closeButton: false,
                                        onHidden: function() {
                                            setTimeout(function() {
                                                location
                                            .reload(); // Reload the page
                                            }, 500);
                                        }
                                    });

                            } else {
                                toastr.error(response_editAnnouncement.message,
                                '', {
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
                    toastr.info('Sending failed ', '', {
                        closeButton: false
                    });
                }
            });
        });
    });
    </script>

</body>

</html>