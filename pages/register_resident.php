<?php
include '../config/connection.php';
include '../server/admin_login-verification.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGBMS | E-Governance Barangay Management System</title>
    <script src="../assets/js/register_campus.js?v=<?php echo time(); ?>"></script>
    <script src="../assets/js/submit_member-details.js?v=<?php echo time(); ?>" defer></script>
    <script src="../assets/js/system_changes.js?v=<?php echo time(); ?>" defer></script>

    <?php include 'import.php'; ?>
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">

    <!-- Site wrapper -->
    <div class="wrapper">

 

      <div class="content-wrapper">

        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Resident Registration</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item text-decoration-none text-secondary"><i>Resident Registration</i></li>
                  <li class="breadcrumb-item text-secondary">Registration</li>
                </ol>
              </div>
            </div>
          </div>
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col">

                <div class="card card-primary">

                  <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon text-white text-bold" style="background-color: #20b503">
                      Registration
                    </div>
                  </div>

                  <div class="card-body p-4">
                    <form id="registerMemberForm" enctype="multipart/form-data">

                       
                          <!-- Personal Information -->
                          <div id="personal_information" class="content mt-3" role="tabpanel"
                                            aria-labelledby="personal_information-trigger">
                                            <h5 class=" ">Personal Information</h5>

                                            <div class="row">
                                                <div class="col form-group ">
                                                    <label for="register_lastname" class="mt-1">Last Name</label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_lastname"
                                                        name="register_lastname" placeholder="Last Name" required>

                                                </div>
                                                <div class="col form-group ">
                                                    <label for="register_firstname" class="mt-1">First Name</label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_firstname"
                                                        name="register_firstname" placeholder="First Name" required>

                                                </div>
                                                <div class="col form-group ">
                                                    <label for="register_middlename" class="mt-1">Middle Name</label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_middlename"
                                                        name="register_middlename" placeholder="Middle Name" required>

                                                </div>
                                                <div class="col form-group ">
                                                    <label for="register_surfix" class="mt-1">Surfix</label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_surfix" name="register_surfix"
                                                        placeholder="Surfix" >

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="register_precinctNo" class="mt-1">Precinct No.</label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_precinctNo"
                                                        name="register_precinctNo" placeholder="Precinct No."
                                                        maxlength="6" pattern="\d{4}-[A-Za-z]+" required>
                                                </div>


                                                <div class="col form-group">
                                                    <label for="register_birthDate" class="mt-1">Birth Date</label>
                                                    <input type="date" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_birthDate"
                                                        name="register_birthDate" placeholder="Birth Date" required>
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

                                                <!-- <div class="col form-group">
                                                    <label for="register_address" class="mt-1">Address</Address></label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_address"
                                                        name="register_address" placeholder="Street Name, Building, House No. " required>
                                                </div>-->
                                            </div>


                                            <div class="row">

                                            <div class="col form-group">
                                                    <label for="register_address" class="mt-1">Address</Address></label>
                                                    <input type="text" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_address"
                                                        name="register_address" placeholder="Street Name, Building, House No. " required>
                                                </div>
                                                
                                                <div class="col form-group">
                                                    <label for="register_emailAddress" class="mt-2">Email
                                                        Address</label>
                                                    <input type="email" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_emailAddress"
                                                        name="register_emailAddress" placeholder="Email Address"
                                                        required>
                                                </div>
                                                

                                            </div>




                                            <div class="row">
                                            <div class="col form-group">
                                                    <label for="register_cellNo" class="mt-2">Tel/Cellphone
                                                        #</label>
                                                    <input type="number" class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_cellNo" name="register_cellNo"
                                                        placeholder="Tel/Cellphone #" required>
                                                </div>
                                                

                                                <div class="col form-group">
                                                    <label for="register_status" class="mt-2">Civil Status</label>
                                                    <select class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_status" name="register_status"
                                                        required>
                                                        <option selected disabled>Select a Civil Status</option>
                                                        <option id="single">Single</option>
                                                        <option id="married">Married</option>
                                                        <option id="widow">Widow/er</option>
                                                        <option id="separated">Separated</option>
                                                        
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
                                                    <label for="register_religion" class="mt-2">Religion</label>
                                                    <select class="form-control form-control-border mt-1"
                                                        style="height:40px" id="register_religion"
                                                        name="register_religion" required>
                                                        <option selected disabled>Select a Religion</option>
                                                        <option id="catholic">Roman Catholic</option>
                                                        <option id="INC">Iglesia ni Cristo</option>
                                                        <option id="aglipay">Christian</option>
                                                        <option id="others">Others</option>
                                                    </select>
                                                </div>
                                               

                                                    <div class="col form-group">
                                                        <label for="register_picture" class="mt-2">Picture</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            style="height:40px" accept="image/*" id="register_picture"
                                                            name="register_picture">
                                                    </div>

                                                   <!-- <div class="col form-group">
                                                        <label for="register_signature" class="mt-2">Signature</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            style="height:40px" accept="image/*" id="register_signature"
                                                            name="register_signature">
                                                    </div> -->
                                                </div>

                      <!-- Personal Information -->

                      <div class="line">

                      </div>

                      
                     
                       <!-- Address Information -->
                       <div id="address-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="address-part-trigger">
                                            <h5>Address
                                               
                                            </h5>
                                            <div class="row" id="address_container">
                                                <div class="col form-group">
                                                    <label for="register_addResidency" class="mt-2">Residency</label>
                                                    <select
                                                        class="custom-select rounded-0 form-control form-control-border mt-1" style="height:40px"
                                                        id="register_addResidency" name="register_addResidency"
                                                        required>
                                                        <option selected disabled>Residency</option>
                                                        <option id="home">Permanent Resident</option>
                                                        <option id="tenant">Tenant</option>


                                                    </select>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_addYears" class="mt-2">Years Of
                                                        Residency</label>
                                                    <select class="form-control form-control-border mt-1"  style="height:40px"
                                                        id="register_addYears" name="register_addYears[]" required>
                                                        <option value="">Select Years Of Residency</option>
                                                        <!-- Optionally include a default option -->
                                                        <?php
        for ($i = 1; $i <= 100; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
                                                    </select>
                                                </div>


                                            </div>
                      <!--end address -->

                      <!-- Emergency Contact-->
                      <div id="emergency-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="emergency-part-trigger">
                                            <h5> In case of emergency
                                                
                                            </h5>
                                            <div class="row" id="trainings_container">
                                            <div class="col form-group">
                                                        <label for="register_emergencyName" class="mt-2">
                                                            Name:
                                                            </label>
                                                        <input type="text"
                                                            class="form-control form-control-border mt-1"  style="height:40px"
                                                            id="register_emergencyName"
                                                            name="register_emergencyName[]"
                                                            placeholder="Name" required>
                                                    </div>

                                                <div class="col form-group">
                                                        <label for="register_emergencyContact" class="mt-2">
                                                            Contact:
                                                            </label>
                                                        <input type="number"
                                                            class="form-control form-control-border mt-1"  style="height:40px"
                                                            id="register_emergencyContact"
                                                            name="register_emergencyContact[]"
                                                            placeholder="Contact No." required>
                                                    </div>

                                            </div>


                                           
                      <!-- ./Emergency -->

                     <!--Proof of Residency -->
                     <div id="proof-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="proof-part-trigger">
                                            <h5>Proof of Residency
                                               <!--   <i class="fa-solid fa-circle-plus" style="color:green"
                                                    onclick="addFields('residency', this)"></i> -->
                                            </h5>
                                          
                                            <div class="row" id="affiliations_container">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="register_proofId" class="mt-2">Valid Id</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            accept="image/*" id="register_proofId"
                                                            name="register_proofId[]" required>
                                                    </div>


                                                    <div class="col form-group">
                                                        <label for="register_proofResidency" class="mt-2">Proof of
                                                            Residence</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            accept="image/*" id="register_proofResidency"
                                                            name="register_proofResidency[]" required >
                                                    </div>

                                                </div>
                      <!-- ./proof -->

                     <!-- Account -->
                     <div id="information-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="information-part-trigger">
                                            <h5>User Account
                                             <!--   <i class="fa-solid fa-circle-plus" style="color:green"
                                                    onclick="addFields('account', this)"></i> -->
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
                                                    <input type="password" class="form-control form-control-border mt-2"
                                                        id="register_accountPassword" name="register_accountPassword[]"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                      </div>
                      <!-- ./proof -->

                      <div class="row">
                        <div class="col form-group ">
                          <div class="row">
                            <div class="col form-group d-flex align-items-center">
                              <label>Member ID: </label>
                            </div>
                            <div class="col form-group">
                              <input type="text" class="form-control form-control-border text-center"
                                id="register_yearToday" name="register_yearToday" readonly>
                            </div>
                            <div class="col form-group ">
                              <input type="text" class="form-control form-control-border text-center"
                                id="register_memberCount" name="register_memberCount" readonly>
                            </div>
                            <div class="col form-group">
                              <input type="text" class="form-control form-control-border text-center"
                                id="register_campusId" name="register_campusId" readonly>
                            </div>
                            <div class="col form-group">
                              <input type="text" class="form-control form-control-border text-center"
                                id="register_memberId" name="register_memberId" style="letter-spacing: 2px;" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="col form-group">
                          <button type="submit" class="btn btn-block bg-gradient-success text-white">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </section>

      </div>
      <?php include 'includes/admin_footer.php'; ?>
    </div>

    <script>
    //   getMemberId("01", "../server/create_member-id.php"); 01 for Main/Edsa/South Campus
    
    
    document.getElementById("register_precinctNo").addEventListener("input", function() {
        let value = this.value.toUpperCase(); // Convert to uppercase to handle case sensitivity
        let formattedValue = value.replace(/[^0-9A-Z]/g,
            ''); // Remove any non-numeric and non-letter characters

        // Insert a hyphen after the fourth character if the total length is greater than 4
        if (formattedValue.length > 4) {
            formattedValue = formattedValue.substring(0, 4) + '-' + formattedValue.substring(4);
        }

        // Trim excess characters if the total length is greater than 6
        if (formattedValue.length > 6) {
            formattedValue = formattedValue.substring(0, 6);
        }

        // Update the input field value
        this.value = formattedValue;
    });


    const campusSelect = document.getElementById('campus');
    const registerCampusIdInput = document.getElementById('register_campusId');

    campusSelect.addEventListener('change', function() {
        const selectedOption = campusSelect.options[campusSelect.selectedIndex];
        const campusId = selectedOption.getAttribute('data-campus-id');
        registerCampusIdInput.value = campusId;
        getMemberId(campusId, '../server/create_member-id.php');
    });


    jQuery.validator.addMethod("alphabeticWithSpaceAndDot", function(value, element) {
        return this.optional(element) || /^[a-zA-Z\s.,]*$/.test(value);
    }, "Please enter alphabetic characters only.");
    // Form validation
    var validate_form = $('#registerMemberForm').validate({
        rules: {
            register_precinctNo: {
                required: true,
                maxlength: 6,
                minlength: 6,
            },
            register_fullname: {
                required: true,
                alphabeticWithSpaceAndDot: true,
                minlength: 3,
            },

            register_lastname: {
                required: true,
                alphabeticWithSpaceAndDot: true,
                minlength: 3,
            },

            register_firstname: {
                required: true,
                alphabeticWithSpaceAndDot: true,
                minlength: 3,
            },

            register_middlename: {
                required: true,
                alphabeticWithSpaceAndDot: true,
                minlength: 3,
            },
            register_surfix: {
                
                alphabeticWithSpaceAndDot: true,
                
            },

            register_Address: {
                required: true,
                minlength: 15,
            },
            register_emailAddress: {
                required: true,
                minlength: 10,
                email: true,
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
                alphabeticWithSpaceAndDot: true,
            },
            'register_addYear[]': {
                alphabeticWithSpaceAndDot: true,
            },
            'register_addPostal[]': {
                required: true,
                maxlength: 4,
                minlength: 4,
            },
            'register_addDistrict[]': {
                required: true,
            },
            'register_emergencyName[]': {
                alphabeticWithSpaceAndDot: true,
            },
            'register_emergencyRelation[]': {
                alphabeticWithSpaceAndDot: true,
            },
            'register_emergencyContact[]': {
                required: true,
                maxlength: 11,
                minlength: 11,
                pattern: /^09\d{9}$/,
            },
            'register_emergencyAddress[]': {
                alphabeticWithSpaceAndDot: true,
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
                pattern: 'Use format: 0000-A'
            },
            register_fullname: {
                required: 'Please Enter your Name!',
            },

            register_Address: {
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


    function addDash() {
        let input = document.getElementById('register_precinctNo');
        let value = input.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
        let formattedValue = value.slice(0, 5) + '-' + value.slice(5);
        input.value = formattedValue;
    }
    </script>

  </body>

</html>