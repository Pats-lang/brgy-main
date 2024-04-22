<?php
session_start();
include '../config/connection.php';

$userLogged = $_SESSION['userLogged'];

if (empty($userLogged)) {
    header('Location: ../index.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
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
        padding: 0.875rem 1.125rem;
        font-size: 0.850rem;
        font-weight: 400;
        font-family: Arial, Helvetica, sans-serif;
        line-height: 1;
        color: #414345;
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

    <?php include '../pages/import.php'; ?>

    </style>
</head>

<body>
    <?php include ' ../../includes/client_nav.php'; ?>

    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <a class="nav-link active ms-0">Profile</a>
            <a class="nav-link" href="request.php">Request</a>
        </nav>

        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">

                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>

                    <div class="card-body text-center">

                        <img class="img-account-profile rounded-circle mb-2"
                            src="C:\xampp\htdocs\brgy-main\user_profile\icon.png" alt>
                        <h3>Arabella Belardo</h3>
                        <div class="small font-italic text-muted mb-4">ID:</div>
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

                                <div class="col-md-4">
                                    <label class="small mb-1" for="inputFirstname">First Name</label>
                                    <input class="form-control" id="inputFirstname" type="tel"
                                        placeholder="Enter your firstname">
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1" for="inputMidname">Middle Name</label>
                                    <input class="form-control" id="inputMidname" type="text"
                                        placeholder="Enter your middle name">
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1" for="inputLastname">Last Name</label>
                                    <input class="form-control" id="inputLastname" type="text"
                                        placeholder="Enter your lastname">
                                </div>

                            </div>



                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1" for="inputBirthday">Birth Date</label>
                                    <input class="form-control" id="inputBirthday" type="date">
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1" for="inputGender">Gender</label>
                                    <select class="form-control" id="inputGender">
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1" for="inputStatus">Civil Status</label>
                                    <select class="form-control" id="inputStatus">
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                    </select>
                                </div>


                                <!-- <div class="row gx-3 mb-3">

<div class="col-md-4">
    <label class="small mb-1" for="inputContact">Contact Number</label>
    <input class="form-control" id="inputContact" type="tel" placeholder="Enter your number">
</div>
    
<div class="col-md-4">
    <label class="small mb-1" for="inputPrecinct">Precinct Number</label>
    <input class="form-control" id="inputPrecinct" type="text" placeholder="Enter your tin number">
</div>

<div class="col-md-4">
    <label class="small mb-1" for="inputReligion">Religion</label>
    <select class="form-control" id="inputReligion">
      <option value="female">Catholic</option> 
      <option value="male">others</option>
    </select>
</div>
    
</div>

    

<div class="row gx-3 mb-3">

<div class="col-md-4">
    <label class="small mb-1" for="inputSss">GSIS/SSS Number</label>
    <input class="form-control" id="inputSss" type="text" placeholder="Enter your sss number">
</div>

<div class="col-md-4">
    <label class="small mb-1" for="inputTin">TIN Number</label>
    <input class="form-control" id="inputTin" type="text" placeholder="Enter your tin number">
</div>

<div class="col-md-4">
    <label class="small mb-1" for="inputEmail">Email Adress</label>
    <input class="form-control" id="inputEmail" type="text" placeholder="Enter your email">
</div>

</div> -->

                                <div class="mb-4">
                                    <label class="small mb-1" for="inputAddress">Address</label>
                                    <input class="form-control" id="inputAddress" type="text"
                                        placeholder="Enter your address">
                                </div>

                                <div class="row gx-3 mb-3">

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputContact">Contact Number</label>
                                        <input class="form-control" id="inputContact" type="tel"
                                            placeholder="Enter your contact number">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputPrecinct">Precinct Number</label>
                                        <input class="form-control" id="inputPrecinct" type="text"
                                            placeholder="Enter your precinct number">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputPrecinct">Email</label>
                                        <input class="form-control" id="inputPrecinct" type="text"
                                            placeholder="Enter your email">
                                    </div>
                                </div>



                                <button class="btn btn-primary" type="button">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>