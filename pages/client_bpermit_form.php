<?php
include '../server/client_server/conn.php';

session_start();

// Get the current year
$currentYear = date('Y');

// Generate a random 6-digit number
$randomNumber = mt_rand(100000, 999999);

// Create the transaction ID
$transaction_id = 'BP-'. $currentYear . '-' . $randomNumber ;

$adminLogged = $_SESSION['adminLogged'];



if (empty($adminLogged)) {
    header('Location: pages\login_client.php');
    exit;
}

$sql = "SELECT members.name, members.picture
        FROM members
        INNER JOIN member_account ON members.member_id = member_account.member_id
        WHERE member_account.username = '$adminLogged'";
$result = mysqli_query($db, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $sql_2 = "SELECT * FROM settings";
    $result_2 = mysqli_query($db, $sql_2);
    $row_2 = mysqli_fetch_assoc($result_2);
    



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EGBMS | E-Governance Barangay Management System</title>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://kit.fontawesome.com/301afcc9b9.js" crossorigin="anonymous"></script>

  <?php include 'import.php'; ?>
</head>

<style>
       @media (min-width: 700px) {
    .larger-image {
        max-width: 100%;
        height: auto;
        width: 100%;
    }
}

input[readonly] {
        background-color: #f2f2f2; /* Gray background color */
    }
    </style>

<body class="hold-transition sidebar-mini layout-fixed">
  
<?php include 'includes/client_nav.php'; }?>
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
              <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item text-secondary">Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="container my-5">
    <form id="request_bpform" method="post" class="p-5 rounded border" style="background-color: #ADE8F4; box-shadow: 0px 1px 10px rgba(0, 0, 255, 0.4);
                background-color: #fdfdfd;">

    <div class="text-center mb-5">
        <img src="../../assets/images/logo/barangay.png" alt="Image" style="height: 20%; max-width: 100%;">
    </div>

        <?php
        $sql = "SELECT members.member_id, members.name, members.address, members.email_address, members.cellphone_no, member_address.yrs_res
                FROM members
                INNER JOIN member_account ON members.member_id = member_account.member_id
                INNER JOIN member_address ON members.member_id = member_address.member_id
                WHERE member_account.username = '$adminLogged'";
        $result = mysqli_query($db, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        ?>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="transaction_id">Transaction Id</label>
                        <input type="text" name="transaction_id" id="transaction_id" class="form-control" value="<?php echo $transaction_id; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="member_id">Member Id</label>
                        <input type="text" name="member_id" id="member_id" class="form-control" value="<?php echo $row['member_id']; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="request">Request</label>
                        <input type="text" name="request" id="request" class="form-control" value="Building Permit" readonly>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="square_meter">Square Meter</label>
                        <input type="text" name="square_meter" id="square_meter" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="floor">Floor</label>
                        <input type="text" name="floor" id="floor" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $row['address']; ?>">
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email_address']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="number" name="contact" id="contact" class="form-control" value="<?php echo $row['cellphone_no']; ?>">
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="purpose">Purpose</label>
                <textarea class="form-control" name="purpose" id="purpose" rows="4"></textarea>
            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block w-75">Send</button>
            </div>


        <?php } ?>
    </form>

</div>
 
  </div>
  <!-- /.content-wrapper -->
  <footer>
  <?php include 'includes/admin_footer.php'; ?>
  </footer>
  
  <script>
   $(document).ready(function() {
    $('#request_bpform').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Perform form validation
        var isValid = $('#request_bpform').valid();

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
                    var formData = new FormData($('#request_bpform')[0]);
                    $.ajax({
                        url: "../../server/req_brgybp_apii.php",
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
                                            location.reload(); // Reload the page
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
                            toastr.error('An error occurred while sending the request.', '', {
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
    jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "Please enter alphabetic characters only.");

    // Form validation for the second part of the form
    var validate_form = $('#request_bpform').validate({
        rules: {
            transaction_id:{
                required: true,
            },
            member_id:{
                required: true,
            },
            request:{
                required: true,
            },
            name: {
                required: true,
                alphabeticWithSpace: true,
            },
            contact: {
                required: true,
                maxlength: 11,
                minlength: 11,
                pattern: /^09\d{9}$/,
            },
            address: {
                required: true,
                minlength: 3.
            },
            email: {
                required: true,
                email: true,
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
                required: 'Please provide a valid Address! Ex.(123 4th Street)',
                minlength: 'Please provide a valid Address! Ex.(123 4th Street)',
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
            square_meter: {
            required: 'Please provide the square meter measurement of your building. For example, (100 square meters.)',
            minlength: 'Please provide the square meter measurement of your building. For example, (100 square meters.)',
            },

            floor: {
                required: 'Please specify the number of floors in your building. For example, (5th floor)',
                minlength: 'Please specify the number of floors in your building. For example, (5th floor)',
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

  
</div>
<!-- ./wrapper -->

</body>

</html>