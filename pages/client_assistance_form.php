<?php
include '../config/connection.php';

// Check if the database connection is successful
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the current year
$currentYear = date('Y');

// Get the last used tracking number for the current year
$query = "SELECT MAX(SUBSTRING_INDEX(transaction_id, '-', 1)) AS last_tracking_number FROM request_busclearance WHERE YEAR(transaction_id) = $currentYear";

// Execute the query
$result = mysqli_query($db, $query);

// Check if the query execution was successful
if (!$result) {
    die("Query execution failed: " . mysqli_error($connection));
}

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the result row
    $row = mysqli_fetch_assoc($result);
    
    // Extract the last number from the tracking number
    $lastNumber = $row['last_tracking_number'];

    // If no tracking number exists for the current year, start from 1
    if ($lastNumber === null) {
        $trackingNumber = $currentYear . '-000001-G';
    } else {
        // Increment the last number and format it with leading zeros if necessary
        $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
        $trackingNumber = $currentYear . '-' . $nextNumber . '-G';
    }
} else {
    // No rows returned, set a default tracking number
    $trackingNumber = $currentYear . '-000001-G';
}
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
              <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item text-secondary">Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="container w-50 border my-5 p-5">
    <form  id="editAnnouncementForm">
        
        <div class="row mb-4">
    <div class="col-4">
        <div data-mdb-input-init class="form-outline">
            <input type="text" id="trackingNumber" class="form-control" value="<?php echo $trackingNumber; ?>" readonly />
            <label class="form-label" for="trackingNumber">Transaction Id</label>
        </div>
    </div>
</div>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                
                <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="name" class="form-control" />
                    <label class="form-label" for="form6Example1">Name</label>
                </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" id="request" class="form-control" value="Assistance" readonly style="background-color: #f2f2f2;"/>
                        <label class="form-label" for="form6Example2">Request</label>
                    </div>
                </div>
            </div>

          

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
            <input type="number" id="residency" class="form-control" />
                <label class="form-label" for="form6Example3">Year Residency</label>
            </div>

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="address" class="form-control" />
                <label class="form-label" for="form6Example4">Address</label>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="email" class="form-control" />
                <label class="form-label" for="form6Example5">Email</label>
            </div>

            <!-- Number input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" id="contact" class="form-control" />
                <label class="form-label" for="form6Example6">Contact Number</label>
            </div>

            <!-- Message input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <textarea class="form-control" id="purpose" rows="4"></textarea>
                <label class="form-label" for="form6Example7">Purpose</label>
            </div>

            


            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Request Button</button>
    </form>

</div>
 
  </div>
  <!-- /.content-wrapper -->
  <footer>
  <?php include 'includes/admin_footer.php'; ?>
  </footer>
  
  <script>
    $('#editAnnouncementForm').on('submit', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Do you want to send this request?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: ' Send ',
        denyButtonText: 'Dont Send',
    }).then((result) => {
        
        if (result.isConfirmed) {
            $.ajax({
                url: "../brgy-main/server/add_brgy_rest_coi.php",
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
            toastr.info('Request did not send', '', {
                closeButton: false
            });
        }
    });
});
</script>

  
</div>
<!-- ./wrapper -->

</body>

</html>