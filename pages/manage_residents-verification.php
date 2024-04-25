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
    <?php include 'import.php'; ?>
    <script src="../assets/js/system_changes.js?v=<?php echo time(); ?>" defer></script>
</head>
<style>
/* Add your styles here */
.id-card {
    border: 1px solid #000;
    padding: 20px;
    margin: 20px;
    max-width: 300px;
}

.id-card img {
    width: 100%;
    height: auto;
}

/* edit form style*/
.profile-picture-container {
    position: relative;
    overflow: hidden;
}

.profile-picture-label {
    display: block;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.profile-picture-label img {
    transition: transform 0.3s ease-in-out;
}

.profile-picture-label:hover img {
    transform: scale(1.1);
}

.change-picture-text {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 5px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.profile-picture-label:hover .change-picture-text {
    opacity: 1;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Resident Verification</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Resident
                                        Verification</i>
                                <li class="breadcrumb-item text-secondary">Verification </li>
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
                                        Verification
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="member_" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>Picture</th>
                                                <th>Member ID</th>
                                                <th>FullName</th>
                                                <th>Address</th>
                                                <th>Precinct</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                                $query = "SELECT m.*, mp.valid_id, mp.proof_residency
                                                FROM members m
                                                INNER JOIN member_proof mp ON m.member_id = mp.member_id
                                                WHERE m.status = 0";
          
                                             $result = mysqli_query(getDatabase(), $query);
                                             while ($row = mysqli_fetch_array($result)) {

                                               $campusId = $row['campus_id'];
                                               $campusName = '';
                                               if ($campusId === '01') {
                                                 $campusName = ' Male';
                                               } elseif ($campusId === '02') {
                                                 $campusName = 'Female';
                                               } else {
                                                 $campusName = 'Unknown Campus';
                                               }
                                               
                                           
                                             ?>
                                            <tr id="<?php echo $row['member_id']; ?>">
                                                <td>
                                                    <img src="../assets/images/member_pictures/<?php echo $row['picture']; ?>"
                                                        alt="Member Picture" width="100">
                                                </td>
                                                <td>
                                                    <?php echo $row['member_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['fullname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['address']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['precinct']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $campusName; ?>
                                                </td>

                                                <td>
                                                    <?php 
                            
                            $status = $row['status'];
                                  
                                        // $link_class = 'btn btn-secondary';
                                        // $link_href = 'actions/status.php?id='.$id.'&status=1';
                                     

                                        if ($status == 0) {
                                          $link_class = 'btn btn-warning  user-select-none';
                                          $link_text = 'PENDING';
                                      } elseif ($status === '1') {
                                        $link_class = 'btn btn-success  user-select-none';
                                        $link_text = 'ACCEPTED';
                                      }
                                     else {
                                      $link_class = 'btn btn-danger  user-select-none';
                                      $link_text = 'REJECTED';
                                      }
                  ?>
                                                    <span
                                                        class="badge <?php echo $link_class; ?>"><?php echo $link_text; ?></span>
                                                </td>

                                                <td class="text-center">
                                                    <button type="button" class="btn " data-bs-toggle="modal"
                                                        data-bs-target="#viewMembers"
                                                        data-id="<?php echo $row['member_id']; ?>"
                                                        data-role="viewMember">
                                                        <i class="fa-solid fa-eye fa-xl" style="color: green;"></i>
                                                    </button>
                                                    <button type="button" class="btn " data-bs-toggle="modal"
                                                        data-bs-target="#EditMembers"
                                                        data-id="<?php echo $row['member_id']; ?>"
                                                        data-role="editMember">
                                                        <i class="fa-solid fa-pen-to-square fa-xl"
                                                            style="color: blue;"></i>
                                                    </button>

                                                </td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include 'includes/admin_footer.php'; ?>

    <!-- View Members -->
    <div class="modal fade" id="viewMembers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <form id="viewMembersForm">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">View Members</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Personal Information -->
                        <div id="personal_information" class="content" role="tabpanel">

                            <div class="row">
                                <div class="col-3">
                                    <label for="member_picture" class="form-label">Picture</label>
                                    <img src="" style="width: 100%; margin-top: 10px;" id="member_picture"
                                        class="border border-dark img-fluid" alt="member Picture">
                                </div>

                                <div class="col-9">
                                    <label for="member_id" class="form-label">Member ID</label>
                                    <input type="text" class="form-control" id="member_id" name="member_id"
                                        placeholder="Member ID" required readonly>

                                    <label for="member_fullname" class="form-label">FullName</label>
                                    <input type="text" class="form-control" id="member_fullname" name="member_fullname"
                                        placeholder="FullName" required readonly>

                                    <label for="member_precinct" class="form-label">Precinct No.</label>
                                    <input type="text" class="form-control" id="member_precinct" name="member_precinct"
                                        placeholder="Precinct No." required readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="member_address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="member_address" name="member_address"
                                        placeholder="Address" required readonly>
                                </div>
                                <div class="col-6">
                                    <label for="member_emailAddress" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="member_emailAddress"
                                        name="member_emailAddress" placeholder="Email Address" required readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label for="member_birthDate" class="form-label">Birth Date</label>
                                    <input type="date" class="form-control" id="member_birthDate"
                                        name="member_birthDate" placeholder="Birth Date" required readonly>
                                </div>
                                <div class="col-4">
                                    <label for="member_cellNo" class="form-label">Tel/Cellphone #</label>
                                    <input type="number" class="form-control" id="member_cellNo" name="member_cellNo"
                                        placeholder="Tel/Cellphone #" required readonly>
                                </div>
                                <div class="col-4">
                                    <label for="member_religion" class="form-label">Religion</label>
                                    <input type="text" class="form-control" id="member_religion" name="member_religion"
                                        placeholder="religion" required readonly>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-4">
                                    <label for="member_civilStatus" class="form-label">Civil Status</label>
                                    <input type="text" class="form-control" id="member_civilStatus"
                                        name="member_civilStatus" placeholder="Civil Status" required readonly>
                                </div>
                                <div class="col-4">
                                    <label for="stats" class="form-label">STATUS</label>
                                    <select class="form-select" id="stats" name="stats" disabled>
                                        <option value="0">PENDING</option>
                                        <option value="1">ACCEPTED</option>
                                        <option value="2">REJECTED</option>
                                    </select>
                                </div>
                                <div class="col-4 d-flex align-items-end">
                                    <!-- Button for Show More -->
                                    <button type="button" class="btn btn-success w-100" id="showMoreBtn">Show
                                        More</button>
                                </div>
                                <div class="additional-info" style="display: none;">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="idpicture">ID Picture</label>
                                            <input type="file" id="Editmember_idpicture_input"
                                                name="Editmember_idpicture_input" accept="image/*"
                                                style="display: none;">
                                            <img src="" style="width: 100%; margin-top: 10px;" id="Editmember_idpicture"
                                                class=" border border-dark img-fluid" alt="Editmember ID Picture">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- ./Personal Information -->

                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" onclick="generateIDCard()" class="btn btn-primary">Generate ID Card</button> -->
                        <button type="button" data-bs-dismiss="modal"
                            class="btn btn-block bg-gradient-secondary text-white">Close</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <!-- Edit Members -->
    <div class="modal fade" id="EditMembers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="EditMembersForm" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Members</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Personal Information -->
                        <div id="personal_information" class="content" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    <label for="Editmember_picture" class="form-label">Picture</label>
                                    <div class="profile-picture-container">
                                        <input type="file" id="Editmember_picture_input" name="Editmember_picture_input"
                                            accept="image/*" style="display: none;">
                                        <label for="Editmember_picture_input" class="profile-picture-label">
                                            <img src="" style="width: 100%; margin-top: 10px;" id="Editmember_picture"
                                                class=" border border-dark img-fluid" alt="Editmember Picture">
                                            <span class="change-picture-text">Change Picture</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <label for="Editmember_id" class="form-label">member ID</label>
                                    <input type="text" class="form-control" id="Editmember_id" name="Editmember_id"
                                        placeholder="member ID" readonly>

                                    <label for="Editmember_fullname" class="form-label">FullName</label>
                                    <input type="text" class="form-control" id="Editmember_fullname"
                                        name="Editmember_fullname" placeholder="Name">

                                    <label for="Editmember_precinct" class="form-label">Precinct No.</label>
                                    <input type="text" class="form-control" id="Editmember_precinct"
                                        name="Editmember_precinct" placeholder="Precinct No.">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="Editmember_address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="Editmember_address"
                                        name="Editmember_address" placeholder="Address">
                                </div>
                                <div class="col-6">
                                    <label for="Editmember_emailAddress" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="Editmember_emailAddress"
                                        name="Editmember_emailAddress" placeholder="Email Address">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-4">
                                    <label for="Editmember_birthDate" class="form-label">Birth Date</label>
                                    <input type="date" class="form-control" id="Editmember_birthDate"
                                        name="Editmember_birthDate" placeholder="Birth Date">
                                </div>
                                <div class="col-4">
                                    <label for="Editmember_cellNo" class="form-label">Tel/Cellphone #</label>
                                    <input type="number" class="form-control" id="Editmember_cellNo"
                                        name="Editmember_cellNo" placeholder="Tel/Cellphone #">
                                </div>
                                <div class="col-4">
                                    <label for="Editmember_religion" class="form-label">Religion</label>
                                    <input type="text" class="form-control" id="Editmember_religion"
                                        name="Editmember_religion" placeholder="Religion">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label for="Editmember_civilStatus" class="form-label">Civil Status</label>
                                    <input type="text" class="form-control" id="Editmember_civilStatus"
                                        name="Editmember_civilStatus" placeholder="Civil Status">
                                </div>

                                <div class="col-4">
                                    <label for="stats" class="form-label">STATUS</label>
                                    <select class="form-select" id="stats" name="stats">
                                        <option value="0" disabled>PENDING</option>
                                        <option value="1">ACCEPTED</option>
                                        <option value="2">REJECTED</option>
                                    </select>
                                </div>
                                    <!-- Button for Show More -->

                                <!-- <div class="col-4 d-flex align-items-end">
                                    <button type="button" class="btn btn-success w-100" id="editshowMoreBtn">Show
                                        More</button>
                                </div>
                                <div class="editadditional-info" style="display: none;">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="idpicture">ID Picture</label>
                                            <input type="file" id="Editmember_idpicture_input"
                                                name="Editmember_idpicture_input" accept="image/*"
                                                style="display: none;">
                                            <img src="" style="width: 100%; margin-top: 10px;" id="Editmember_idpicture"
                                                class=" border border-dark img-fluid" alt="Editmember ID Picture">
                                        </div>
                                    </div>
                                </div> -->
                                
                                
                            </div>

                        </div>
                        <!-- ./Personal Information -->
                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col-6">
                                <button type="submit" id="submit"
                                    class="btn btn-block bg-gradient-primary text-white">Update</button>
                            </div>
                            <div class="col-6">
                                <button type="button" data-bs-dismiss="modal"
                                    class="btn btn-block bg-gradient-secondary text-white">Close</button>
                            </div>
                        </div>
                    </div>
            </form>

        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the "Show More" button
        var showMoreBtn = document.getElementById('showMoreBtn');

        // Get the additional info container
        var additionalInfo = document.querySelector('.additional-info');

        // Add click event listener to the "Show More" button
        showMoreBtn.addEventListener('click', function() {
            // Toggle the visibility of the additional info container
            if (additionalInfo.style.display === 'none') {
                additionalInfo.style.display = 'block';
                showMoreBtn.innerText = 'Show Less'; // Change button text
            } else {
                additionalInfo.style.display = 'none';
                showMoreBtn.innerText = 'Show More'; // Change button text
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Get the "Show More" button
        var showMoreBtn = document.getElementById('editshowMoreBtn');

        // Get the additional info container
        var additionalInfo = document.querySelector('.editadditional-info');

        // Add click event listener to the "Show More" button
        showMoreBtn.addEventListener('click', function() {
            // Toggle the visibility of the additional info container
            if (additionalInfo.style.display === 'none') {
                additionalInfo.style.display = 'block';
                showMoreBtn.innerText = 'Show Less'; // Change button text
            } else {
                additionalInfo.style.display = 'none';
                showMoreBtn.innerText = 'Show More'; // Change button text
            }
        });
    });


    $(document).ready(function() {
        $('#member_').DataTable({
            buttons: [{
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copy'
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> PDF'
                }, {
                    text: '<i class="fa-solid fa-print"></i>',
                    className: 'print-btn',
                    action: function(e, dt, node, config) {
                        location.href = "../server/print_member.php";
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"></i> Columns'
                },
            ],
            dom: 'Bfrtip',
            responsive: true
        });
    });
    //View member 
    $(document).on('click', 'button[data-role=viewMember]', function() {
        $.ajax({
            type: "POST",
            url: "../server/read_member.php",
            data: {
                member_id: $(this).attr('data-id'),
            },
            dataType: "json",
            success: function(response_viewMember) {
                $('#member_id').val(response_viewMember.member_id);
                $('#member_fullname').val(response_viewMember.fullname);
                $('#member_precinct').val(response_viewMember.precinct);
                $('#member_emailAddress').val(response_viewMember.email_address);
                $('#member_address').val(response_viewMember.address);
                $('#member_birthDate').val(response_viewMember.birth_date);
                $('#member_cellNo').val(response_viewMember.cellphone_no);
                $('#member_religion').val(response_viewMember.religion);
                $('#member_civilStatus').val(response_viewMember.civil_status);
                $('#stats').val(response_viewMember.status);
                $('#member_picture').attr('src', '../assets/images/member_pictures/' +
                    response_viewMember.picture);

            }
        })
    })


    //Edit member 
    $(document).on('click', 'button[data-role=editMember]', function() {
        $.ajax({
            type: "POST",
            url: "../server/read_member.php",
            data: {
                member_id: $(this).attr('data-id'),
            },
            dataType: "json",
            success: function(response_Editmember) {
                $('#Editmember_id').val(response_Editmember.member_id);
                $('#Editmember_fullname').val(response_Editmember.fullname);
                $('#Editmember_precinct').val(response_Editmember.precinct);
                $('#Editmember_emailAddress').val(response_Editmember.email_address);
                $('#Editmember_address').val(response_Editmember.address);
                $('#Editmember_birthDate').val(response_Editmember.birth_date);
                $('#Editmember_cellNo').val(response_Editmember.cellphone_no);
                $('#Editmember_religion').val(response_Editmember.religion);
                $('#Editmember_civilStatus').val(response_Editmember.civil_status);
                $('#Editmember_picture').attr('src', '../assets/images/member_pictures/' +
                    response_Editmember.picture);
                $('#Editmember_idpicture').attr('src', '../assets/images/proof-pictures/' + response_Editmember.valid_id);

                $('#stats').val(response_Editmember.status);
            }
        })

    });
    const pictureFileInput = $("#Editmember_picture_input");


    const picturePreview = $("#Editmember_picture");


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
        $('#selectedFileName').text(fileInput.val().split("\\").pop()); // Extract the file name
    }

    // Bind change event for picture input
    pictureFileInput.on("change", function() {
        handleFileInputChange(pictureFileInput, picturePreview);
    });




    $('#EditMembersForm').on('submit', function(e) {
        e.preventDefault();
        if ($('#EditMembersForm').valid()) {
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                $('#EditMembers').modal('hide');
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
                                success: function(response_Editmember) {
                                    if (response_Editmember.status) {

                                        toastr.success(response_Editmember
                                            .message, '', {
                                                timeOut: 1000,
                                                closeButton: false,
                                                onHidden: function() {
                                                    location.reload();
                                                }

                                            });

                                        systemChanges(response_Editmember.admin,
                                            response_Editmember.operation,
                                            response_Editmember.description);
                                    } else {
                                        toastr.error(response_Editmember
                                            .message, '', {
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
    </script>
</body>

</html>