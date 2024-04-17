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

                                                <div class="col form-group">
                                                    <label for="register_addAddress" class="mt-2">Address</Address></label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        id="register_addAddress" name="register_addAddress"
                                                        placeholder="Address" required>
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

                      <!-- Personal Information -->

                      <div class="line">

                      </div>

                      
                      <!-- Address Information -->
                      <div id="address-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="address-part-trigger">
                                            <h5>Address
                                               <!--   <i class="fa-solid fa-circle-plus" style="color:green"
                                                    onclick="addFields('address', this)"></i> -->
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

                                               
                                            </div>

                                            <div class="row" id="address_container">
                                                <div class="col form-group">
                                                    <label for="register_addPostal" class="mt-2">Postal Code</label>
                                                    <input type="number" class="form-control form-control-border mt-2"
                                                        value="1400" readonly style="background-color: #f2f2f2;"
                                                        id="register_addPostal" name="register_addPostal[]"
                                                        placeholder="Postal Code" required>
                                                </div>

                                                <div class="col form-group">
                                                    <label for="register_addDistrict" class="mt-2">District</label>
                                                    <input type="text" class="form-control form-control-border mt-2"
                                                        value="District II" readonly style="background-color: #f2f2f2;"
                                                        id="register_addDistrict" name="register_addDistrict[]"
                                                        placeholder="Barangay" required>
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
                      <!--end address -->

                      <!-- Emergency Contact-->
                      <div id="emergency-part" class="content mt-3" role="tabpanel"
                                            aria-labelledby="emergency-part-trigger">
                                            <h5>Emergency Details
                                               <!--   <i class="fa-solid fa-circle-plus" style="color:green"
                                                    onclick="addFields('emergency', this)"></i> -->
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
                                                        <label for="register_emergencyaddAddress" class="mt-2">Emergency
                                                            Contact Address</label>
                                                        <input type="text"
                                                            class="form-control form-control-border  mt-2"
                                                            id="register_emergencyaddAddress"
                                                            name="register_emergencyaddAddress[]"
                                                            placeholder="Emergency Contact Address" required>
                                                    </div>


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
    
    const campusSelect = document.getElementById('campus');
    const registerCampusIdInput = document.getElementById('register_campusId');

    campusSelect.addEventListener('change', function() {
        const selectedOption = campusSelect.options[campusSelect.selectedIndex];
        const campusId = selectedOption.getAttribute('data-campus-id');
        registerCampusIdInput.value = campusId;
        getMemberId(campusId, '../server/create_member-id.php');
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
                minlength: 15,
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