<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php include '../import.php' ?>

    <title>Responsive Regisration Form </title>
</head>
<style>
    /* ===== Google Font Import - Poppins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url('../../assets/images/background.jpg');
    }

    .container {
        position: relative;
        max-width: 900px;
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .container header {
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }

    .container header::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #4070f4;
    }

    .container form {
        position: relative;
        margin-top: 16px;
        min-height: 490px;
        background-color: #fff;
        overflow: hidden;
    }

    .container form .form {
        position: absolute;
        background-color: #fff;
        transition: 0.3s ease;
    }

    .container form .form.second {
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }

    form.secActive .form.second {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }

    form.secActive .form.first {
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }

    .container form .title {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }

    .container form .fields {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    form .fields .input-field {
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
    }

    .input-field label {
        font-size: 12px;
        font-weight: 500;
        color: #2e2e2e;
    }

    .input-field input,
    select {
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }

    .input-field input :focus,
    .input-field select:focus {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
    }

    .input-field select,
    .input-field input[type="date"] {
        color: #707070;
    }

    .input-field input[type="date"]:valid {
        color: #333;
    }

    .container form button,
    .backBtn {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }

    .container form .btnText {
        font-size: 14px;
        font-weight: 400;
    }

    form button:hover {
        background-color: #265df2;
    }

    form button i,
    form .backBtn i {
        margin: 0 6px;
    }

    form .backBtn i {
        transform: rotate(180deg);
    }

    form .buttons {
        display: flex;
        align-items: center;

    }

    form .buttons button,
    .backBtn {
        margin-right: 14px;
    }

    @media (max-width: 750px) {
        .container form {
            overflow-y: scroll;
        }

        .container form::-webkit-scrollbar {
            display: none;
        }

        form .fields .input-field {
            width: calc(100% / 2 - 15px);
        }
    }

    @media (max-width: 750px) {
        form .fields .input-field {
            width: 100%;
        }
    }

    .footer {
        margin-top: 20%;
    }
</style>

<body>
    <div class="container">
        <header>Residential Form</header>

        <form action="#" id="barangay_register" method="post" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" required>
                        </div>

                        <div class="input-field">
                            <label>Middle Name</label>
                            <input type="text" id="middle_name" name="middle_name" placeholder="Enter Middle Name" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name" required>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <select id="gender" name="gender" required>
                                <option disabled selected>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="text" id="contact_number" name="contact_number" placeholder="Enter Number" required>
                        </div>



                        <div class="input-field">
                            <label>Precinct Number</label>
                            <input type="text" name="precinct_number" id="precinct_number" placeholder="Enter Precinct Number" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <input type="date" id="birthday" name="birthday" placeholder="Enter Birth Date" required>
                        </div>

                        <div class="input-field">
                            <select id="martial_status" name="marital_status">
                                <option disabled selected>Select Marital Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <input type="text" name="address" placeholder="Address" required>
                        </div>

                        <div class="input-field">
                            <input type="email" id="email" name="email" placeholder="Enter Email" required>
                        </div>

                        <div class="input-field">
                            <select id="religion" name="religion">
                                <option hidden>Select Religion</option>
                                <option value="Christian">Christian</option>
                                <option value="Muslim">Catholic</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <select id="sector" name="sector">
                                <option hidden>Select Sector</option>
                                <option value="Residential">Residential</option>
                                <option value="Business">Business</option>
                                <option value="Education">Education</option>
                                <!-- Add more sectors as needed -->
                            </select>
                        </div>
                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>

            <!------>

            <div class="form second">
                <div class="details address">
                    <span class="title">Account Details</span>

                    <div class="fields">
                        <div class="mb-6">
                            <label for="profile" class="form-label">Insert Photo</label>
                            <input class="form-control" type="file" id="profile" name="profile">
                        </div>

                        <div class="mb-6">
                            <label for="proof_of_residency" class="form-label">Upload Proof of Residency</label>
                            <input class="form-control" type="file" id="proof_of_residency" name="proof_of_residency">
                        </div>

                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="username" id="username" placeholder="Enter Username" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password" required>
                        </div>
                    </div>
                </div>


                <div class="footer">
                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>

                        <button class="sumbit" type="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>

    <script>
        const form = document.querySelector("form"),
            nextBtn = form.querySelector(".nextBtn"),
            backBtn = form.querySelector(".backBtn"),
            allInput = form.querySelectorAll(".first input");


        nextBtn.addEventListener("click", () => {
            allInput.forEach(input => {
                if (input.value != "") {
                    form.classList.add('secActive');
                } else {
                    form.classList.remove('secActive');
                }
            })
        })

        backBtn.addEventListener("click", () => form.classList.remove('secActive'));

        $('#barangay_register').on('submit', function(e) {
            e.preventDefault();
            if ($('#barangay_register').valid()) {
                Swal.fire({
                    title: 'Are you done?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        let timerInterval;
                        Swal.fire({
                            title: 'Wait for a while!',
                            html: 'Updating <b></b> milliseconds.',
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const b = Swal.getHtmlContainer().querySelector('b');
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft();
                                }, 100);

                                $.ajax({
                                    url: "../../register-user-api.php",
                                    type: "POST",
                                    data: new FormData(this),
                                    dataType: 'json',
                                    processData: false,
                                    contentType: false,
                                    success: function(response_Editrequest) {
                                        if (response_Editrequest.status) {
                                            toastr.success(response_Editrequest.message, 'successfully registered', {
                                                timeOut: 1000,
                                                closeButton: false,
                                                onHidden: function() {
                                                    setTimeout(function() {
                                                        location.reload();
                                                    }, 500); // Adjust the delay as needed
                                                }
                                            });
                                        } else {
                                            toastr.error(response_Editrequest.message, '', {
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
                                //
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        });
                    } else if (result.isDenied) {
                        toastr.info('Changes are not saved', '', {
                            closeButton: false
                        });
                    }
                });
            } else {
                validate_form.focusInvalid();
            }
        });

        $(document).ready(function() {
            // Add custom validation method for alphabetic characters with space
            jQuery.validator.addMethod("alphabeticWithSpace", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Please enter alphabetic characters only.");

            // Form validation for the second part of the form
            var validate_form = $('#barangay_register').validate({
                rules: {
                    first_name: {
                        required: true,
                        alphabeticWithSpace: true,
                        minlength: 3,
                    },
                    middle_name: {
                        required: true,
                        alphabeticWithSpace: true,
                        minlength: 3,
                    },
                    last_name: {
                        required: true,
                        alphabeticWithSpace: true,
                        minlength: 3,
                    },
                    gender: {
                        required: true,
                    },
                    contact_number: {
                        required: true,
                        maxlength: 11,
                        minlength: 11,
                    },
                    precinct_number: {
                        required: true,
                    },
                    birthday: {
                        required: true,
                    },
                    marital_status: {
                        required: true,
                    },
                    address: {
                        required: true,
                        minlength: 5,
                    },
                    email: {
                        required: true,
                        minlength: 10,
                        email: true,
                    },
                    religion: {
                        required: true,
                    },
                    sector: {
                        required: true,
                    },
                    profile: {
                        required: true,
                        accept: "image/jpeg, image/png",
                    },
                    proof_of_residency: {
                        required: true,
                        accept: "image/jpeg, image/png",
                    },
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    // Add appropriate error messages for each field
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
</body>

</html>