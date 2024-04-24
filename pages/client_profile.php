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

                    <div class="row">
                        <div class="col-xl-4">

                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>

                                <div class="card-body text-center">

                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="C:\Users\Hello\Documents\user profile\icon.png" alt>
                                    <h3>Arabella Belardo</h3>
                                    <div class="small text-muted mb-4">MEMBER ID:</div>
                                    <button class="btn btn-primary" type="button">UPLOAD IMAGE</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card mb-4">
                                <div class="card-header">Account Information</div>
                                <div class="card-body">

                                    <form>


                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-3">
                                                <label class="small mb-1" for="precinct">Precinct No.</label>
                                                <input class="form-control" id="precinct" name="precinct" type="text"
                                                    placeholder="Enter your precinct" maxlength="6"
                                                    pattern="\d{4}-[A-Za-z]+" required>
                                            </div>



                                        </div>
                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="firstname">First Name</label>
                                                <input class="form-control" id="firstname" name="firstname" type="text"
                                                    placeholder="Enter your firstname">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="small mb-1" for="middlename">Middle Name</label>
                                                <input class="form-control" id="middlename" name="middlename"
                                                    type="text" placeholder="Enter your Middle Name">
                                            </div>

                                            <div class="col-md-3">
                                                <label class="small mb-1" for="lastname">Last Name</label>
                                                <input class="form-control" id="lastname" name="lastname" type="text"
                                                    placeholder="Enter your lastname">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="small mb-1" for="surfix">Surfix</label>
                                                <input class="form-control" id="surfix" name="surfix" type="text"
                                                    placeholder="Enter your surfix">
                                            </div>

                                        </div>


                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="birth_date">Birth Date</label>
                                                <input class="form-control" id="birth_date" name="birth_date" type="date">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="small mb-1"  for="civil_status">Civil Status</label>
                                                <select class="form-control" id="civil_status" name="civil_status">
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="small mb-1" for="campus_id">Gender</label>
                                                <select class="form-control " id="inputStatus">
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                </select>
                                            </div>

                                            


                                            
                                            <div class="col form-group ">
                                                    <label for="register_gender" class="mt-2">Gender</label>
                                                    <select class="form-control form-control-border mt-1"
                                                        style="height:40px" id="campus" name="campus" required>
                                                        <option selected disabled>Select a Gender</option>
                                                        <option value="male" data-campus-id="01">Male
                                                        </option>
                                                        <option value="female" data-campus-id="02">Female
                                                        </option>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="small mb-1" for="inputAddress">Address</label>
                                            <input class="form-control" id="inputAddress" type="text">
                                        </div>

                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputContact">Contact Number</label>
                                                <input class="form-control" id="inputContact" type="tel">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputPrecinct">Precinct
                                                    Number</label>
                                                <input class="form-control" id="inputPrecinct" type="text">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputPrecinct">Precinct
                                                    Number</label>
                                                <input class="form-control" id="inputPrecinct" type="text">
                                            </div>
                                        </div>



                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputSss">GSIS/SSS Number</label>
                                                <input class="form-control" id="inputSss" type="text">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputTin">TIN Number</label>
                                                <input class="form-control" id="inputTin" type="text">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputPrecinct">Precinct
                                                    Number</label>
                                                <input class="form-control" id="inputPrecinct" type="text">
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="button">Save</button>

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

</html>