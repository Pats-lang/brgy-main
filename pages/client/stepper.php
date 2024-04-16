<?php
// Start or resume the session
session_start();

include 'header.php';

include '../../server/client_server/conn.php';

// Check if the user has completed both email and OTP verification steps
if (!isset($_SESSION['otp_sent']) || $_SESSION['otp_sent'] !== true) {
    header("Location: ../../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGBMS|BARANGAY 20 OR-KA-NA DAGAT-DAGATAN</title>
    <script src="../../assets/js/register_campus.js?v=<?php echo time(); ?>" defer></script>
    <script src="../../assets/js/client/submit_member-details.js?v=<?php echo time(); ?>" defer></script>

    <style>
    /* Additional custom styles */
    body {
        font-family: Georgia, serif;
        /* You can replace "Georgia" with your preferred formal font */
        font-weight: bold;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../../assets/images/stepper.jpg');
        /* Orange background image with a black overlay */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .breadcrumb-container {
        text-align: center;
        /* Center align the content */
    }

    .breadcrumb-container h2 {
        margin: 0;
        /* Remove default margin */
    }

    .breadcrumb-container img {
        margin: 5px;
        /* Add some margin around the logos */
    }

    /* CSS for responsiveness */
    .container {
        padding: 20px;
        /* Adjust as needed */
    }

    .card {
        margin-bottom: 20px;
        /* Adjust as needed */
    }

    .bs-stepper {
        overflow-x: auto;
        /* Allow horizontal scrolling on smaller screens */
    }

    .bs-stepper-header {
        white-space: nowrap;
        /* Prevent line breaks on step labels */
        overflow-x: auto;
        /* Allow horizontal scrolling for step labels */
    }

    .privacy-policy-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Transparent black background */
        z-index: 9999;
    }

    .privacy-policy-card {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 90%;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    .privacy-policy-card .card-header {
        background-color: #000000;
        color: #ffffff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 10px;
    }

    .privacy-policy-card .card-body {
        padding: 20px;
    }

    .card-header strong {
        color: #ffffff;
    }
    </style>
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <section>
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
    </section>

    <!-- <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" data-aos-easing="ease-in-out"
            data-aos-offset="200" data-aos-anchor="#my-element" data-aos-once="true">
            <p style="text-align: justify;">
                Donec eu dui eget ex scelerisque congue. Pellentesque sit amet arcu a mi iaculis ultrices id nec libero.
                Curabitur non justo justo. Nunc in lectus non metus consectetur hendrerit id non lectus. Nulla at tellus
                purus.
            </p>
        </div> -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card card-default">

                        <div class="card-header">
                            <h4 class="card-title">Fill out Barangay Information</h4>
                        </div>

                        <div class="card-body p-0">
                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- your steps here -->

                                    <!-- Personal Information -->
                                    <div class="step" data-target="#personal_information">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="personal_information" id="personal_information-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Personal Information</span>
                                        </button>
                                    </div>

                                    <div class="line"></div>
                                    <!-- Work Experience -->
                                    <div class="step" data-target="#address-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="address-part" id="work-trigger">

                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Address</span>
                                        </button>
                                    </div>

                                    <div class="line"></div>

                                    <!-- Emergency -->
                                    <div class="step" data-target="#emergency-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="emergency-part" id="emergency-part-trigger">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Emergency Details</span>
                                        </button>
                                    </div>

                                    <div class="line"></div>

                                    <!-- Proof -->

                                    <div class="step" data-target="#proof-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="proof-part"
                                            id="proof-part-trigger">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Proof of Residency</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>

                                    <!-- account -->
                                    <div class="step" data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="information-part" id="information-part-trigger">
                                            <span class="bs-stepper-circle">5</span>
                                            <span class="bs-stepper-label">User Account</span>
                                        </button>
                                    </div>

                                </div>

                                <!-- ./Stepper Header END -->

                                <!-- your steps content here -->
                                <form id="registerMemberForm" enctype="multipart/form-data">
                                    <div class="bs-stepper-content">

                                        <!-- Personal Information -->
                                        <div id="personal_information" class="content mt-3" role="tabpanel"
                                            aria-labelledby="personal_information-trigger">
                                            <h5 class=" ">Personal Information</h5>

                                            <div class="row">
                                                <div class="col form-group ">
                                                    <label for="register_precinctNo" class="mt-1">Precinct No.</label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        id="register_precinctNo" name="register_precinctNo"
                                                        placeholder="Precinct No." required>
                                                </div>


                                            </div>

                                            <div class="row">
                                                <div class="col form-group ">
                                                    <label for="register_name" class="mt-1">Name</label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        id="register_name" name="register_name" placeholder="Name"
                                                        required>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_birthDate" class="mt-2">Birth Date</label>
                                                    <input type="date" class="form-control form-control-border mt-1"
                                                        id="register_birthDate" name="register_birthDate"
                                                        placeholder="Birth Date" required>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col form-group ">
                                                    <label for="register_gender" class="mt-2">Gender</label>
                                                    <select
                                                        class="custom-select rounded-0 form-control form-control-border mt-1"
                                                        id="campus" name="campus" required>
                                                        <option selected disabled>Select a Gender</option>
                                                        <option value="male" data-campus-id="01">Male
                                                        </option>
                                                        <option value="female" data-campus-id="02">Female
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="register_emailAddress" class="mt-2">Email
                                                        Address</label>
                                                    <input type="email" class="form-control form-control-border  mt-1"
                                                        id="register_emailAddress" name="register_emailAddress"
                                                        placeholder="Email Address" required>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="register_cellNo" class="mt-2">Tel/Cellphone
                                                        #</label>
                                                    <input type="number" class="form-control form-control-border mt-1"
                                                        id="register_cellNo" name="register_cellNo"
                                                        placeholder="Tel/Cellphone #" required>
                                                </div>

                                            </div>




                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="register_religion" class="mt-2">Religion</label>
                                                    <select
                                                        class="custom-select rounded-0 form-control form-control-border mt-1"
                                                        id="register_religion" name="register_religion" required>
                                                        <option selected disabled>Select a Religion</option>
                                                        <option id="catholic">Catholic</option>
                                                        <option id="INC">Iglesia ni Cristo</option>
                                                        <option id="aglipay">Aglipay</option>
                                                        <option id="baptist">Baptist</option>
                                                        <option id="dd">Dating Daan</option>
                                                        <option id="islam">Islam</option>
                                                        <option id="jehovah">Jehovah's Witnesses</option>
                                                        <option id="others">Others</option>
                                                    </select>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_status" class="mt-2">Civil Status</label>
                                                    <select
                                                        class="custom-select rounded-0 form-control form-control-border mt-1"
                                                        id="register_status" name="register_status" required>
                                                        <option selected disabled>Select a Civil Status</option>
                                                        <option id="single">Single</option>
                                                        <option id="married">Married</option>
                                                        <option id="widow">Widow/er</option>
                                                        <option id="ls">Legally Separated</option>
                                                        <option id="livingin">LIVING-IN</option>
                                                        <option id="separated">Separated</option>
                                                        <option id="others">Others</option>
                                                    </select>
                                                </div>

                                                <!--
                                            <div class="col form-group">
                                                    <label for="register_status" class="mt-2">Sector</label>
                                                    <select
                                                        class="custom-select rounded-0 form-control form-control-border mt-1"
                                                        id="register_status" name="register_status" required>
                                                        <option selected disabled>Select a Sector</option>
                                                        <option id="single">Solo Parent</option>
                                                        <option id="married">PWD</option>
                                                        <option id="single">Senior Citizen</option>
                                                        <option id="married">Indigent Indigenous People</option>
                                                           
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>
-->
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="register_picture" class="mt-2">Picture</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            accept="image/*" id="register_picture"
                                                            name="register_picture" >
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="register_signature" class="mt-2">Signature</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            accept="image/*" id="register_signature"
                                                            name="register_signature" >
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col form-group  mt-3">
                                                        <div class="row">
                                                            <div class="col form-group d-flex align-items-center">
                                                                <label>Member ID: </label>
                                                            </div>
                                                            <div class="col form-group">
                                                                <input type="text"
                                                                    class="form-control form-control-border text-center"
                                                                    id="register_yearToday" name="register_yearToday"
                                                                    readonly>
                                                            </div>
                                                            <div class="col form-group ">
                                                                <input type="text"
                                                                    class="form-control form-control-border text-center"
                                                                    id="register_memberCount"
                                                                    name="register_memberCount" readonly>
                                                            </div>
                                                            <div class="col form-group">
                                                                <input type="text"
                                                                    class="form-control form-control-border text-center"
                                                                    id="register_campusId" name="register_campusId"
                                                                    readonly>
                                                            </div>
                                                            <div class="col form-group">
                                                                <input type="text"
                                                                    class="form-control form-control-border text-center"
                                                                    id="register_memberId" name="register_memberId"
                                                                    style="letter-spacing: 2px;" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <a class="btn btn-primary  col-md-12 mt-3"
                                                                    onclick="validateAndMoveToNext()">Next </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Address Information -->
                                        <div id="address-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="address-part-trigger">
                                            <h5>Address
                                                <i class="fa-solid fa-circle-plus" style="color:green"
                                                    onclick="addFields('address', this)"></i>
                                            </h5>
                                            <div class="row" id="address_container">
                                                <div class="col form-group">
                                                    <label for="register_addResidency" class="mt-2">Residency</label>
                                                    <select
                                                        class="custom-select rounded-0 form-control form-control-border mt-1"
                                                        id="register_addResidency" name="register_addResidency"
                                                        required>
                                                        <option selected disabled>Residency</option>
                                                        <option id="home">Home Owner</option>
                                                        <option id="tenant">Tenant</option>
                                                        <option id="helper">Helper</option>
                                                        <option id="CW">Constraction Worker</option>
                                                        <option id="others">Others</option>

                                                    </select>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_addYears" class="mt-2">Years Of
                                                        Residency</label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        id="register_addYears" name="register_addYears[]"
                                                        placeholder="Years Of Residency" required>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_address" class="mt-2">Address</Address></label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        id="register_address" name="register_address[]"
                                                        placeholder="Address" required>
                                                </div>
                                            </div>

                                            <div class="row" id="address_container">
                                                <div class="col form-group">
                                                    <label for="register_addPostal" class="mt-2">Postal Code</label>
                                                    <input type="number" class="form-control form-control-border mt-2"
                                                        id="register_addPostal" name="register_addPostal[]"
                                                        placeholder="Postal Code" required>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_addDistrict" class="mt-2">District</label>
                                                    <select
                                                        class="custom-select rounded-0 form-control form-control-border mt-1"
                                                        id="register_addDistrict" name="register_addDistrict" required>
                                                        <option selected disabled>District</option>
                                                        <option id="home">District I</option>
                                                        <option id="tenant">District II</option>
                                                        <option id="helper">District III</option>


                                                    </select>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_addBarangay" class="mt-2">Barangay</label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        value="Barangay 20" readonly style="background-color: #f2f2f2;"
                                                        id="register_addBarangay" name="register_addBarangay[]"
                                                        placeholder="Barangay" required>
                                                </div>
                                            </div>

                                            <div class="row" id="address_container">
                                                <div class="col form-group">
                                                    <label for="register_addRegion" class="mt-2">Region</label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        value="Metro Manila" readonly style="background-color: #f2f2f2;"
                                                        id="register_addRegion" name="register_addRegion[]"
                                                        placeholder="Region" required>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_addProvince" class="mt-2">Province</label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        value="Metro Manila" readonly style="background-color: #f2f2f2;"
                                                        id="register_addProvince" name="register_addProvince[]"
                                                        placeholder="Province" required>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_addCity" class="mt-2">City</label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        value="Caloocan City" readonly
                                                        style="background-color: #f2f2f2;" id="register_addCity"
                                                        name="register_addCity[]" placeholder="City" required>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <a class="btn btn-primary col-md-12 mt-3"
                                                        onclick="stepper.previous()">Back</a>
                                                </div>

                                                <div class="col-md-6">
                                                    <a class="btn btn-primary  col-md-12 mt-3"
                                                        onclick="validateAndMoveToNext()">Next </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./Work Experience -->


                                        <!-- Emergency Contact-->
                                        <div id="emergency-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="emergency-part-trigger">
                                            <h5>Emergency Details
                                                <i class="fa-solid fa-circle-plus" style="color:green"
                                                    onclick="addFields('emergency', this)"></i>
                                            </h5>
                                            <div class="row" id="trainings_container">
                                                <div class="col form-group">
                                                    <label for="register_emergencyName" class="mt-2">Emergency Contact
                                                        Name
                                                    </label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        id="register_emergencyName" name="register_emergencyName[]"
                                                        placeholder="Emergency Contact" required>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_emergencyRelation" class="mt-2">Emergency
                                                        Contact Relationship</label>
                                                    <input type="text" class="form-control form-control-border  mt-2"
                                                        id="register_emergencyRelation"
                                                        name="register_emergencyRelation[]"
                                                        placeholder="Emergency Contact Relationship" required>
                                                </div>
                                                <div class="row" id="trainings_container">
                                                    <div class="col form-group">
                                                        <label for="register_emergencyContact" class="mt-2">Emergency
                                                            Contact
                                                            #</label>
                                                        <input type="number"
                                                            class="form-control form-control-border mt-1"
                                                            id="register_emergencyContact"
                                                            name="register_emergencyContact[]"
                                                            placeholder="Emergency Contact #" required>
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="register_emergencyAddress" class="mt-2">Emergency
                                                            Contact Address</label>
                                                        <input type="text"
                                                            class="form-control form-control-border  mt-2"
                                                            id="register_emergencyAddress"
                                                            name="register_emergencyAddress[]"
                                                            placeholder="Emergency Contact Address" required>
                                                    </div>


                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="btn btn-primary col-md-12 mt-3"
                                                        onclick="stepper.previous()">Back</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn btn-primary  col-md-12 mt-3"
                                                        onclick="validateAndMoveToNext()">Next </a>
                                                </div>

                                            </div>
                                        </div>

                                        <!--Proof of Residency -->
                                        <div id="proof-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="proof-part-trigger">
                                            <h5>Proof of Residency
                                                <i class="fa-solid fa-circle-plus" style="color:green"
                                                    onclick="addFields('residency', this)"></i>
                                            </h5>
                                            <small class="text-muted">
                                                Please provide one (1) valid ID and one (1) proof of residence.
                                                <pre>
    *The address on your proof of residence should match exactly with the addressstated address.
    *Documents have to be dated within this month or the previous month.
    *The file uploaded must show the entire page of your proof of residence and not just a portion of it. 
    *Do not fold or cover any part of your proof of residence.</pre>
                                            </small>
                                            <div class="row" id="affiliations_container">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="register_proofId" class="mt-2">Valid Id</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            accept="image/*" id="register_proofId"
                                                            name="register_proofId[]" >
                                                    </div>


                                                    <div class="col form-group">
                                                        <label for="register_proofResidency" class="mt-2">Proof of
                                                            Residence</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            accept="image/*" id="register_proofResidency"
                                                            name="register_proofResidency[]" >
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-primary col-md-12 mt-3"
                                                            onclick="stepper.previous()">Back</a>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <a class="btn btn-primary  col-md-12 mt-3"
                                                            onclick="validateAndMoveToNext()">Next </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Account -->
                                        <div id="information-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="information-part-trigger">
                                            <h5>User Account
                                                <i class="fa-solid fa-circle-plus" style="color:green"
                                                    onclick="addFields('account', this)"></i>
                                            </h5>
                                            <div class="row" id="trainings_container">
                                                <div class="col form-group">
                                                    <label for="register_accountUser" class="mt-2">Username
                                                    </label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        id="register_accountUser" name="register_accountUser[]"
                                                        placeholder="Username">
                                                </div>
                                                <div class="col form-group">
                                                    <label for="register_accountPassword" class="mt-2">Password
                                                    </label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        id="register_accountPassword" name="register_accountPassword[]"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="privacy_agreement_checkbox">
                                                        <label class="form-check-label"
                                                            for="privacy_agreement_checkbox">
                                                            I have read and agree to the <a href="#"
                                                                onclick="showPrivacyPolicy()">Terms and Privacy Policy</a>.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="privacy_policy_modal" class="modal fade" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Privacy Policy</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body"
                                                            style="max-height: 400px; overflow-y: auto;">
                                                            <!-- Insert your privacy policy content here -->
<p> <strong>Terms of Service</strong>
<pre>
  These Terms of Service ("Terms") govern your use of the
  Barangay 20 website ("Website") operated by [E-Governance 
  Barangay Management System] ("us", "we", or "our").

  By accessing or using the Website, you agree to be bound
  by these Terms. If you disagree with any part of the
  Terms, then you may not access the Website.
</pre>
<strong> Privacy Policy</strong>
<pre>

  Your privacy is important to us. It is [Your Company
  Name]'s policy to respect your privacy regarding any
  information we may collect from you through our Website.

  We only ask for personal information when we truly need
  it to provide a service to you. We collect it by fair
  and lawful means, with your knowledge and consent. We
  also let you know why we’re collecting it and how it
  will be used.

  We do not share the collected data with any third
  parties. Any information collected from users is used
  solely for academic purposes.
</pre>
<strong> Data Security</strong>
<pre>

  We take reasonable precautions to protect your
  information. When you submit sensitive information via
  the Website, your information is protected both online
  and offline.
</pre>
<strong>Changes to Terms and Privacy Policy</strong>
<pre>

  We reserve the right to update or change our Terms and
  Privacy Policy at any time. Your continued use of the
  Website after we post any modifications to the Terms and
  Privacy Policy on this page will constitute your
  acknowledgment of the modifications and your consent to
  abide and be bound by the modified Terms and Privacy
  Policy.
</pre>
<strong>Contact Us</strong>
<pre>

  If you have any questions about these Terms and Privacy
  Policy, please contact us at [your contact information].
</pre>
                                                            </p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <a class="btn btn-primary col-md-12 mt-3"
                                                        onclick="stepper.previous()">Back</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit"
                                                        class="btn btn-primary col-md-12 mt-3">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./account -->

                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
        </div>

        <!-- Bootstrap Toast Container -->
        <div class="toast-container position-fixed top-0 end-0 p-3" data-bs-allow-stack="true">
            <!-- Toast -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Error!</strong>
                    <small class="text-muted text-white">Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    You can only add 4 fields!
                </div>
            </div>
            <!-- End Toast -->
        </div>

        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
    </section>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <script>
    const campusSelect = document.getElementById('campus');
    const registerCampusIdInput = document.getElementById('register_campusId');

    campusSelect.addEventListener('change', function() {
        const selectedOption = campusSelect.options[campusSelect.selectedIndex];
        const campusId = selectedOption.getAttribute('data-campus-id');
        registerCampusIdInput.value = campusId;
        getMemberId(campusId, '../../server/create_member-id.php');
    });


    jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
    }, "Please enter alphabetic characters only.");
    // Form validation
    var validate_form = $('#registerMemberForm').validate({
        rules: {
            register_precinctNo: {
                required: true,
                maxlength: 6,
                minlength: 6,
            },
            register_name: {
                required: true,
                alphabeticWithSpace: true,
                minlength: 3,
            },

            register_addAddress: {
                required: true,
                minlength: 20,
            },
            register_emailAddress: {
                required: true,
                minlength: 10,
                email:true,
            },
            register_birthDate: {
                required: true,
            },
            register_cellNo: {
                required: true,
                maxlength: 11,
                minlength: 11,
                pattern: /^09\d{9}$/,
            },

            register_status: {
                required: true,
            },
            register_picture: {
                required: true,
                accept: "image/jpeg, image/png",
            },
            register_signature: {
                required: true,
                accept: "image/jpeg, image/png",
            },
       
            campus: {
                required: true,
            },

            'register_addResidency[]': {
                alphabeticWithSpace: true,
            },
            'register_addYear[]': {
                alphabeticWithSpace: true,
            },
            'register_addPostal[]': {
                required: true,
                maxlength: 4,
                minlength: 4,
            },
            'register_addDistrict[]': {
                alphabeticWithSpace: true,
            },
            'register_emergencyName[]': {
                alphabeticWithSpace: true,
            },
            'register_emergencyRelation[]': {
                alphabeticWithSpace: true,
            },
            'register_emergencyContact[]': {
                required: true,
                maxlength: 11,
                minlength: 11,
                pattern: /^09\d{9}$/,
            },
            'register_emergencyAddress[]': {
                alphabeticWithSpace: true,
            },
            'register_register_proofId[]': {
                required: true,
                accept: "image/jpeg, image/png",
            },
            'register_register_proofResidency[]': {
                required: true,
                accept: "image/jpeg, image/png",
            },
            'register_accountUser[]': {
                required: true,
                pattern: /^[A-Za-z0-9!@#$%^&*()-_+=~`[\]{}|\\:;"'<>,.?/ ]+$/,
            },
            'register_accountPassword[]': {
                required: true,
                
            },
        },

        messages: {
            register_precinctNo: {
                required: 'Please provide a Precinct No.!',
            },
            register_name: {
                required: 'Please Enter your Name!',
            },

            register_addAddress: {
                required: 'Please provide a valid Address!',
            },
            register_emailAddress: {
                required: 'Please provide a valid Email Address!',
            },
            register_birthDate: {
                required: 'Member must be 18 years old and above!', //have additonal condition
            },
            register_cellNo: {
                maxlength: 'Please provide 11 digits!',
            },
            'register_emergencyContact[]': {
                maxlength: 'Please provide 11 digits!',
            },

            register_status: {
                required: 'Please select a Civil Status ',
            },
            register_picture: {
                accept: 'Please select a valid JPG or PNG image file.'
            },
            register_signature: {
                accept: 'Please select a valid JPG or PNG image file.'
            },
            campus: {
                required: 'Select Gender is required!'
            },
            register_accountUser: {
                required: 'Please provide username!'
            },
            register_accountPassword: {
                required: 'Please provide password!'
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

    function validateAndMoveToNext() {
        if ($('#registerMemberForm').valid()) {
            stepper.next();
        } else {
            Swal.fire({
                icon: "warning",
                title: "Error",
                text: "Please fill in all required fields with valid data."
            });

        }
    }
    
    function showPrivacyPolicy() {
        $('#privacy_policy_modal').modal('show');
    }

 

    function submitForm() {
        if ($('#privacy_agreement_checkbox').prop('checked')) {
            // Privacy policy agreed, proceed with form submission
            // Example: document.getElementById('myForm').submit();
            console.log('Privacy policy agreed');
        } else {
            alert('Please agree to the privacy policy before submitting the form.');
        }
    }
    </script>
</body>

</html>