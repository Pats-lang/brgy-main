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
    <title>eGBMS</title>
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
                                            </div>


                                            <div class="row">
                                                <div class="col form-group ">
                                                    <label for="campus" class="mt-2">Gender</label>
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
                                                            name="register_picture">
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="register_signature" class="mt-2">Signature</label>
                                                        <input type="file" class="form-control form-control-border mt-1"
                                                            accept="image/*" id="register_signature"
                                                            name="register_signature">
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


                      <div class="line">

                      </div>

                      <!-- Work Experience -->
                      <h5>Work Experience
                        <i class="fa-solid fa-circle-plus" style="color:green"
                          onclick="addFields('workExperience', this)"></i>
                        <i class="fa-solid fa-circle-minus d-none" style="color:red"
                          onclick="reduceFields('workExperience', this)"></i>
                      </h5>
                      <div class="row" id="workExperience_container">
                        <div class="col form-group">
                          <label for="register_workCompany">Company</label>
                          <input type="text" class="form-control form-control-border" id="register_workCompany"
                            name="register_workCompany[]" placeholder="Company">
                        </div>

                        <div class="col form-group">
                          <label for="register_workPosition">Position</label>
                          <input type="text" class="form-control form-control-border" id="register_workPosition"
                            name="register_workPosition[]" placeholder="Position">
                        </div>

                        <div class="col form-group">
                          <label for="register_workDuration">Duration</label>
                          <input type="text" class="form-control form-control-border" id="register_workDuration"
                            name="register_workDuration[]" placeholder="Duration">
                        </div>
                      </div>
                      <!-- ./Work Experience -->

                      <!-- Trainings/Seminars -->
                      <h5>Trainings and Seminars
                        <i class="fa-solid fa-circle-plus" style="color:green"
                          onclick="addFields('trainings', this)"></i>
                      </h5>
                      <div class="row" id="trainings_container">
                        <div class="col form-group">
                          <label for="register_trainingTitle">Title/Course</label>
                          <input type="text" class="form-control form-control-border" id="register_trainingTitle"
                            name="register_trainingTitle[]" placeholder="Title/Course">
                        </div>

                        <div class="col form-group">
                          <label for="register_trainingVenue">Venue</label>
                          <input type="text" class="form-control form-control-border" id="register_trainingVenue"
                            name="register_trainingVenue[]" placeholder="Venue">
                        </div>

                        <div class="col form-group">
                          <label for="register_trainingDuration">Duration</label>
                          <input type="text" class="form-control form-control-border" id="register_trainingDuration"
                            name="register_trainingDuration[]" placeholder="Duration">
                        </div>
                      </div>
                      <!-- ./Trainings/Seminars -->

                      <!-- Affiliations/Organizations -->
                      <h5>Affiliations/Organizations
                        <i class="fa-solid fa-circle-plus" style="color:green"
                          onclick="addFields('affiliations', this)"></i>
                      </h5>
                      <div class="row" id="affiliations_container">
                        <div class="col form-group">
                          <label for="register_affiliationsOrganizations">Organizations</label>
                          <input type="text" class="form-control form-control-border"
                            id="register_affiliationsOrganizations" name="register_affiliationsOrganizations[]"
                            placeholder="Organizations">
                        </div>

                        <div class="col form-group">
                          <label for="register_affiliationsPositions">Position</label>
                          <input type="text" class="form-control form-control-border"
                            id="register_affiliationsPositions" name="register_affiliationsPositions[]"
                            placeholder="Position">
                        </div>

                        <div class="col form-group">
                          <label for="register_affiliationsDuration">Duration</label>
                          <input type="text" class="form-control form-control-border" id="register_affiliationsDuration"
                            name="register_affiliationsDuration[]" placeholder="Duration">
                        </div>
                      </div>
                      <!-- ./Affiliations/Organizations -->

                      <!-- Awards/Special Achievements -->
                      <div class="row">
                        <div class="col form-group">
                          <h5>Awards/Special Achievements
                            <i class="fa-solid fa-circle-plus" style="color:green"
                              onclick="addFields('awards', this)"></i>
                          </h5>
                          <div class="row" id="awards_container">
                            <input type="text" class="form-control form-control-border" id="register_achievements"
                              name="register_achievements[]" placeholder="Achievements">
                          </div>
                        </div>
                      </div>
                      <!-- ./Awards/Special Achievements -->

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
      getMemberId("../server/create_member-id.php"); //"01", for Main/Edsa/South Campus
      
      jQuery.validator.addMethod("alphabeticWithSpace", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s ]+$/.test(value);
      }, "Please enter alphabetic characters only.");
      // Form validation
      var validate_form = $('#registerMemberForm').validate({
        rules: {
          register_name: {
            required: true,
            alphabeticWithSpace: true,
            minlength: 3,
          },
          register_yearGraduated: {
            required: true,
            maxlength: 4,
            minlength: 4,
          },
          register_address: {
            required: true,
            minlength: 5,
          },
          register_emailAddress: {
            required: true,
            minlength: 10,
          },
          register_birthDate: {
            required: true,
          },
          register_cellNo: {
            required: true,
          
            maxlength: 11,
            minlength: 11,
          },
          register_course: {
            required: true,
          },
          register_status: {
            required: true,
          },
          register_picture: {
            required: true,
            accept: "image/jpeg, image/png"
          },
          register_signature: {
            required: true,
            accept: "image/jpeg, image/png"
          },
          'register_workCompany[]': {
            alphabeticWithSpace: true,
          },
          'register_workPosition[]': {
            alphabeticWithSpace: true,
          },
          'register_workDuration[]': {
            alphabeticWithSpace: true,
          },
          'register_trainingTitle[]': {
            alphabeticWithSpace: true,
          },
          'register_trainingVenue[]': {
            alphabeticWithSpace: true,
          },
          'register_trainingDuration[]': {
            alphabeticWithSpace: true,
          },
          'register_affiliationsOrganizations[]': {
            alphabeticWithSpace: true,
          },
          'register_affiliationsPositions[]': {
            alphabeticWithSpace: true,
          },
          'register_affiliationsDuration[]': {
            alphabeticWithSpace: true,
          },
          'register_achievements[]': {
            alphabeticWithSpace: true,
          },
        },

        messages: {
          register_name: {
            required: 'Please provide a valid username!',
          },
          register_yearGraduated: {
            required: 'Please provide a valid year',
            maxlength: 'Please enter a valid 4-digit year.',
            minlength: 'Please enter a valid 4 digits'
          },
          register_address: {
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
          register_course: {
            required: ' Please select a course to register!',
          },
          register_status: {
            required: 'Please select a status to register',
          },
          register_picture: {
            required: 'Please provide a valid picture !',
            accept: 'Please select a valid JPG or PNG image file.'
          },
          register_signature: {
            required: 'Please provide a valid signature !',
            accept: 'Please select a valid JPG or PNG image file.'
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
          $(element).addClass('is-valid');
        }

      });

    </script>

  </body>

</html>