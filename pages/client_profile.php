<?php
include '../config/connection.php';

session_start();

$userLogged = $_SESSION['userLogged'];

if (empty($userLogged)) {
    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGBMS | E-Governance Barangay Management System</title>
    <?php
    $sql_2 = "SELECT * FROM settings";
    $result_2 = mysqli_query($db, $sql_2);
    $row_2 = mysqli_fetch_assoc($result_2);
  ?>
    <link rel="icon" href="../assets/images/logo/<?php echo $row_2['sLogo']; ?>" />


    <?php include 'import.php'; ?>
</head>

<style>
body {
    margin-top: 20px;
    background-color: #ebeced;
    color: #000000;
}

.img-account-profile {
    height: 10rem;
}

.rounded-circle {
    border-radius: 50% !important;
}

.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}

.card .card-header {
    font-weight: 600;
}

.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}

.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}

.form-control,
.dataTable-input {
    display: block;
    width: 100%;
    font-size: 0.850rem;
    font-weight: 400;
    font-family: Arial, Helvetica, sans-serif;
    line-height: 1;
    color: #69707a;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #636363;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}

.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
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
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a>Home</a></li>
                                <li class="breadcrumb-item text-secondary">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section>

                <div class="container-xl px-4 mt-4">
                    <form id="editprofileform" method="post">
                        <?php
                                        // Fetch member data based on the logged-in user
                                        $sql = "SELECT *
                                                FROM members
                                                INNER JOIN member_account ON members.member_id = member_account.member_id
                                                INNER JOIN member_address ON members.member_id = member_address.member_id
                                                INNER JOIN member_emergency ON members.member_id = member_emergency.member_id

                                                WHERE member_account.username = '$userLogged'";
                                        $result = mysqli_query($db, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                        }?>
                        <div class="row">
                            <div class="col-xl-4">

                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>

                                    <div class="card-body text-center">

                                        <img class="img-account-profile rounded-circle mb-2" id="profilepicture"
                                            src="../assets/images/member_pictures/<?php echo $row['picture']; ?>" alt>
                                        <h3><?php echo $row['fullname']; ?></h3>
                                        <div class="small text-muted mb-4">MEMBER ID:<?php echo $row['member_id']; ?>
                                        </div>
                                        <button class="btn btn-primary" id="uploadButton" type="button">UPLOAD
                                            IMAGE</button>
                                        <input type="file" id="fileInput" name="changeprofilepic" style="display: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header">Account Information</div>
                                    <div class="card-body">



                                    <div class="col-md-3">
                                                <input class="form-control" id="editmember_id" name="editmember_id"
                                                 value="<?php echo $row['member_id']; ?>" hidden>
                                            </div>


                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-3">
                                                <label class="small mb-1" for="precinct">Precinct No.</label>
                                                <input class="form-control" id="precinct" name="precinct" type="text"
                                                    placeholder="Enter your precinct" maxlength="6"
                                                    pattern="\d{4}-[A-Za-z]+" value="<?php echo $row['precinct']; ?>"
                                                    required>
                                            </div>



                                        </div>
                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="firstname">First Name</label>
                                                <input class="form-control" id="firstname" name="firstname" type="text"
                                                    placeholder="Enter your firstname"
                                                    value="<?php echo $row['firstname']; ?>">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="small mb-1" for="middlename">Middle Name</label>
                                                <input class="form-control" id="middlename" name="middlename"
                                                    type="text" placeholder="Enter your Middle Name"
                                                    value="<?php echo $row['middlename']; ?>">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="small mb-1" for="lastname">Last Name</label>
                                                <input class="form-control" id="lastname" name="lastname" type="text"
                                                    placeholder="Enter your lastname"
                                                    value="<?php echo $row['lastname']; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="small mb-1" for="surfix">Surfix</label>
                                                <input class="form-control" id="surfix" name="surfix" type="text"
                                                    placeholder="Enter your surfix"
                                                    value="<?php echo $row['surfix']; ?>">
                                            </div>

                                        </div>


                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="birth_date">Birth Date</label>
                                                <input class="form-control" id="birth_date" name="birth_date"
                                                    type="date" value="<?php echo $row['birth_date']; ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="civil_status">Civil Status</label>
                                                <select class="form-control custom-select" id="civil_status"
                                                    name="civil_status">
                                                    <option value="single"
                                                        <?php if ($row['civil_status'] === 'Single') echo ' selected'; ?>>
                                                        Single</option>
                                                    <option value="married"
                                                        <?php if ($row['civil_status'] === 'Married') echo ' selected'; ?>>
                                                        Married</option>
                                                    <option value="divorced"
                                                        <?php if ($row['civil_status'] === 'Divorced') echo ' selected'; ?>>
                                                        Divorced</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="campus_id">Gender</label>
                                                <select class="form-control custom-select" id="campus_id"
                                                    name="campus_id">
                                                    <option value="male"
                                                        <?php if ($row['campus_id'] === '01') echo 'selected'; ?>
                                                        data-campus-id="01">Male</option>
                                                    <option value="female"
                                                        <?php if ($row['campus_id'] === '02') echo 'selected'; ?>
                                                        data-campus-id="02">Female</option>
                                                </select>
                                            </div>


                                        </div>

                                        <div class="mb-4">
                                            <label class="small mb-1" for="inputAddress">Address</label>
                                            <input class="form-control" id="inputAddress" name="inputAddress" type="text"
                                                value="<?php echo $row['address']; ?>">
                                        </div>

                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="religion">Religion</label>
                                                <select class="form-control custom-select " id="religion"
                                                    name="religion">
                                                    <option disabled>Select a Religion</option>
                                                    <option value="Roman Catholic"
                                                        <?php if ($row['religion'] === 'Roman Catholic') echo 'selected'; ?>>
                                                        Roman Catholic</option>
                                                    <option value="Iglesia ni Cristo"
                                                        <?php if ($row['religion'] === 'Iglesia ni Cristo') echo 'selected'; ?>>
                                                        Iglesia ni Cristo</option>
                                                    <option value="Christian"
                                                        <?php if ($row['religion'] === 'Christian') echo 'selected'; ?>>
                                                        Christian</option>
                                                    <option value="Others"
                                                        <?php if ($row['religion'] === 'Others') echo 'selected'; ?>>
                                                        Others</option>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="cellphone_no">Contact Number</label>
                                                <input class="form-control" id="cellphone_no" name="cellphone_no"
                                                    type="number" value="<?php echo $row['cellphone_no']; ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="residency">Residency</label>
                                                <select class="custom-select form-control" style="height: 40px"
                                                    id="residency" name="residency" required>
                                                    <option disabled selected>Select Residency</option>
                                                    <option value="Permanent Resident"
                                                        <?php if ($row['residency'] === 'Permanent Resident') echo 'selected'; ?>>
                                                        Permanent Resident</option>
                                                    <option value="Tenant"
                                                        <?php if ($row['residency'] === 'Tenant') echo 'selected'; ?>>
                                                        Tenant</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="yrs_res">Year of Residency</label>
                                                <select class="custom-select form-control" id="yrs_res"
                                                    name="yrs_res" required>
                                                    <option value="">Select Years Of Residency</option>
                                                    <?php
                                                for ($i = 1; $i <= 100; $i++) {
                                                    // Check if $row['yrs_res'] matches current iteration value
                                                    $selected = ($row['yrs_res'] == $i) ? 'selected' : '';
                                                    echo "<option value=\"$i\" $selected>$i</option>";
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                        <hr>
                                        <div>
                                            <h1 class="small muted">In Case of Emergency</h1>
                                        </div>

                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="contact_name">Name</label>
                                                <input class="form-control" id="contact_name" name="contact_name"
                                                    type="text" value="<?php echo $row['contact_name']; ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="contact_no">Number</label>
                                                <input class="form-control" id="contact_no" type="contact_no" name="contact_no"
                                                    value="<?php echo $row['contact_no']; ?>">
                                            </div>


                                        </div>

                                        <button class="btn btn-primary" type="submit">Save</button>

                    </form>
                </div>
        </div>
    </div>
    </div>
    </div>




    </section>
    </div>
    <!-- /.content-wrapper -->

    <?php include 'includes/admin_footer.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>
<script>
     // JavaScript
     document.getElementById('uploadButton').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    // Optional: If you want to perform some action after file selection
    document.getElementById('fileInput').addEventListener('change', function(event) {
        var file = event.target.files[0];
        // Do something with the selected file
    });
    const pictureFileInput = $("#fileInput");


const picturePreview = $("#profilepicture");


// Function to handle file input changes
function handleFileInputChange(fileInput, imagePreview) {
    if (fileInput[0].files.length > 0) {
        const selectedFile = fileInput[0].files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.attr("src", e.target.result);
            imagePreview.show();
        };
        reader.readAsDataURL(selectedFile);
    } else {
        imagePreview.hide();
    }
}

// Bind change event for picture input
pictureFileInput.on("change", function() {
    handleFileInputChange(pictureFileInput, picturePreview);
});


$('#editprofileform').on('submit', function(e) {
    e.preventDefault();
    if ($('#editprofileform').valid()) {
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: `Don't save`,
        }).then((result) => {
            if (result.isConfirmed) {
                let timerInterval
                Swal.fire({
                    title: 'Wait for a while!',
                    html: 'Updating <b></b> milliseconds.',
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                        $.ajax({
                            url: "../server/edit_member.php",
                            type: "POST",
                            data: new FormData(this),
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(response_editprofile) {
                                if (response_editprofile.status) {

                                    toastr.success(response_editprofile.message,
                                        '', {
                                            timeOut: 1000,
                                            closeButton: false,
                                            onHidden: function() {
                                                location.reload();
                                            }

                                        });

                                    systemChanges(response_editprofile.admin,
                                        response_editprofile.operation,
                                        response_editprofile.description);
                                } else {
                                    toastr.error(response_editprofile.message,
                                        '', {
                                            closeButton: false,
                                        });
                                }
                            },
                            error: function(error) {
                                toastr.error('An Error occurred: ' + error,
                                    '', {
                                        positionClass: 'toast-top-end',
                                        closeButton: false
                                    });
                            }
                        });
                    },
                    willClose: () => {
                        clearInterval(timerInterval)

                    }
                })
            } else if (result.isDenied) {
                toastr.info('Changes are not saved', '', {
                    closeButton: false
                });
            }
        });
    } else {
        validate_form.focusInvalid();
    }

})
</script>

</html>