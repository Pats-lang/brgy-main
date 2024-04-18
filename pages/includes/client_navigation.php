
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARANGAY OR-KA-NA DAGAT-DAGATAN</title>
    <link rel="stylesheet" type="text/css" href="path/to/toastr.css">
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/toastr.js"></script>

    <!-- LOGO SA TAAS -->
    <link rel="icon" href="assets/images/logo/<?php echo $row['sLogo']; ?> " />
    <!--PERSONAL CSS -->
    <!-- <link rel="stylesheet" href="assets/css/index.css" /> -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"
        integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://kit.fontawesome.com/301afcc9b9.js" crossorigin="anonymous"></script>
    <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<style>
    .navbar {
        background-color: #333;
        color: white;
        padding: 5px;
        position: relative;
        z-index: 2;
        /* Make navigation appear on top */
    }

    .nav-link {
        font-weight: bold;
    }

    .nav-link:hover {
        color: blue;
    }


    .logo-text {
        font-weight: bold;
        margin-right: 10px;
    }

    .alumni-organization-container {
        font-weight: bold;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .alumni-text {
        font-size: 14px;
        font-weight: bold;
    }

    .organization-text {
        font-weight: bold;
        font-size: 12px;
    }

    .custom-navbar {
        border-bottom: 10px solid orange;
        /* Adjust the color as needed */
    }

    .bg-orange {
        background-color: #ee7600;
        height: 10px;
        /* Adjust the height as needed */
    }

    .bg-green {
        background-color: #529f37;
        height: 20px;
        /* Adjust the height as needed */
    }
     /* Full-width inputs */
     input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    #login {
        background-color: #4285f4;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    /* Add a hover effect for buttons */
    button:hover {
        opacity: 0.8;
    }

    /* Extra style for the cancel button (red) */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the avatar image inside this container */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    /* Avatar image */
    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    /* Add padding to containers */


    /* The "Forgot password" text */
    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }

    #forgotPassword {
    display: block;
    text-align: center;
    margin-top: 10px; /* Adjust the margin as needed */
}

#createAccountBtn {
    display: block;
    margin: 0 auto; /* This centers the button horizontally */
    margin-top: 20px; /* Adjust the top margin as needed */
}
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
.imgcontainer {
    background-color: #fff; /* Change to the color you prefer */
    padding: 5px; /* Add padding to create space between the image and the background */
}
.password-container {
    position: relative;
}

.password-container .eye-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
}

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top custom-navbar ">
    <div class="container">
        <?php
        include '../../server/client_server/conn.php';
        $sql = "SELECT * FROM settings";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

        ?>
            <a class="navbar-brand d-flex align-items-center" href="../../index.php">
                <img src="../../assets/images/logo/<?php echo $row['sLogo']; ?> " alt="Logo" width="50" height="50">
                <div class="alumni-organization-container pl-2">
                    <span class="alumni-text"><?php echo $row['sName']; ?></span>
                    <span class="organization-text"><?php echo $row['sDescription']; ?></span>
                </div>
            </a>
        <?php } ?>
        <button class="navbar-toggler navbar-toggler-white navbar-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item ">
                    <a class="nav-link " href="../../index.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../pages/client/about.php">About Barangay 20</a>
                        <a class="dropdown-item" href="../../pages/client/officers.php">About Barangay Officials</a>
                        <a class="dropdown-item" href="../../pages/client/projects.php">Projects</a>
                        <!-- Add more dropdown items here if needed -->
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../../pages/client/services_client.php">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../../pages/client/contact.php">Contacts</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#loginModal" href="#">Login</a>
                    </li>

                <li class="nav-item">
                    <a class="nav-link " href="../../pages/admin_logIn.php">Admin</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="admin_logInForm" method="post">
                    <div class="imgcontainer">
                        <img src="../../assets/images/logo/barangay.png" alt="Avatar" class="avatar">
                    </div>

                    <!-- Close "x" -->
                    <span class="close" data-dismiss="modal" aria-label="Close">&times;</span>

                    <div class="container">
                        <label for="username"><b>Username</b></label>
                        <input type="text" name="username" id="username" placeholder="Enter Username" required>

                        <label for="password"><b>Password</b></label>
                        <div class="password-container">
                            <input type="password" name="password" id="password" placeholder="Enter Password" required>
                            <span class="eye-icon fa fa-eye-slash fa-lg" onclick="togglePasswordVisibility()"></span>
                        </div>

                        <button id="login" type="submit">Login</button>
                        
                        <!-- Both "Create Account" and "Forgot Password?" links aligned to the left -->
                        <div style="text-align: center; margin-top: 10px;">
                            Don't have an account? <a href="../../pages/client/send_otp.php">Create Account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#admin_logInForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../server/login_validation.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message, '', {
                        positionClass: 'toast-top-right',
                        timeOut: 1500,
                        closeButton: false,
                        onHidden: function() {
                            // Redirect to client_index.php after the toast message is hidden
                            window.location.href = '../../client_index.php';
                        }
                    });
                } else {
                    toastr.error(response.message, '', {
                        positionClass: 'toast-top-right',
                        closeButton: false
                    });
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });

    function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.querySelector(".eye-icon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    }
}

    $(document).ready(function() {
        AOS.init();
        // Check for the registration query parameter in the URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('registration') === 'success') {
            // Show the registration success toast
            $('#registrationSuccessToast').toast('show');

            // Close the toast after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                $('#registrationSuccessToast').toast('hide');
            }, 3000);

            // Add an event listener for toast hidden event
            $('#registrationSuccessToast').on('hidden.bs.toast', function() {
                // Reload the page (index.php)
                window.location.href = 'index.php';
            });
        }
    });
    // Add a click event listener to the button

    $('#alumniButton').click(function() {
        window.location.href =
            'pages/client/send_otp.php'; // Replace 'registration_page.php' with your actual registration page URL
    });
    </script>

</body>

</html>
    