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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-decoration-none"><a>Home</a></li>
                        <li class="breadcrumb-item text-secondary">Service</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section id="learn" class="learn  ">
        <div class="container py-5">
            <div class="text-center mb-4" data-aos="zoom-in-up">
                <h1 class="text-light">List of items</h1>
                <hr class="mx-auto w-10 bg-light">
            </div>


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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1<?php echo $row['id']; ?>">BOOK
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
                                <div class="modal-body">
                                    <form id="event-form" method="POST">

                                    
                                        <div class="row">
                                            
                                            <div class="col">

                                            
                                                <div class="mb-3">
                                                    <label for="member_id" class="form-label">member_id</label>
                                                    <input type="text" class="form-control" id="member_id"
                                                        name="member_id">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <input type="hidden" name="item"
                                                        value="<?php echo $row['item_name']; ?>">
                                                    <label for="fullname" class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" id="fullname"
                                                        name="fullname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="contact" class="form-label">Contact #</label>
                                                    <input type="number" class="form-control" id="contact"
                                                        name="contact">
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
        </div>
        </div>
        </div>
        </div>
    </section>


    <?php include 'includes/admin_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>

<script>
$(document).ready(function() {
    // Add custom validation method for alphabetic characters with space
    jQuery.validator.addMethod("alphabeticWithSpaceAndDot", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s.,]*$/.test(value);
    }, "Please enter alphabetic characters only.");



    // Form validation
    var validate_form = $('#event-form').validate({
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
            square_meter: {
                required: true,
                minlength: 2,



            },
            floor: {
                required: true,
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
            square_meter: {
                required: 'Please provide the square meter measurement of your building. For example, (100 square meters.)',
                minlength: 'Please provide the square meter measurement of your building. For example, (100 square meters.)',

            },

            floor: {
                required: 'Please specify the number of floors in your building. For example, (5th floor)',
                minlength: 'Please specify the number of floors in your building. For example, (5th floor)',
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