<?php
session_start();
unset($_SESSION['otp_sent']);
unset($_SESSION['email_verified']);
include 'server/client_server/conn.php';
$sql = "SELECT * FROM settings";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BARANGAY OR-KA-NA DAGAT-DAGATAN</title>

        <!-- LOGO SA TAAS -->
        <link rel="icon" href="assets/images/logo/<?php echo $row['sLogo']; ?> " />
        <!--PERSONAL CSS -->
        <!-- <link rel="stylesheet" href="assets/css/index.css" /> -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://kit.fontawesome.com/301afcc9b9.js" crossorigin="anonymous"></script>

        <style>



            .navbar {
                background-color: #333;
                color: white;
                padding: 5px;
                position: relative;
                z-index: 99;
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
                text-transform: uppercase;
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
            }

            .bg-green {
                background-color: #529f37;
                height: 20px;

            }

            button {
                border: 0;
                background-color: orange;
                font-weight: 500;
                font-size: 16px;
                letter-spacing: 1px;
                padding: 12px 24px;
                border-radius: 5px;
                transition: 0.3s;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            button:hover {
                background: #529f37;
                padding-right: 19px;
                color: white;
            }

            .about {
                background-color: #f4f4f4;
                padding: 20px 0px;
            }

            .about-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 15px;
            }

            .about .icon-box {
                padding: 60px 40px;
                box-shadow: 0px 10px 50px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                transition: all 0.3s ease-out 0s;
                background-color: none;
            }

            .about .icon-box i {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 24px;
                font-size: 32px;
                line-height: 0;
                transition: all 0.4s ease-out 0s;
                background-color: #212529;
                color: #e84545;
            }

            .icon-boxes .icon-box:hover {
                transform: translateY(-10px);
            }

            .icon-boxes .icon-box:hover h3,
            .icon-boxes .icon-box:hover p {
                transform: translateY(0);

            }

            .about .icon-box p {
                margin-bottom: 0;
            }

            .about .icon-box:hover i {
                background-color: #e84545;
                color: #ffffff;

            }

            .contain {
    background:#f4f4f4;
    padding:15px 9%;
    
}

.contain .heading{
    text-align: center;
    padding-bottom: 15px;
    color:#000;
    
    font-size: 35px;
}

.contain .box-contain{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
    gap:15px;
}

.contain .box-contain .box{
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    background: #fff;
    text-align: center;
    padding:30px 20px;
}

.contain .box-contain .box img{
    height: 80px;
}

.contain .box-contain .box h3{
    color:#444;
    font-size: 22px;
    padding:10px 0;
}

.contain .box-contain .box p{
    color:#777;
    font-size: 15px;
    line-height: 1.8;
}

.contain .box-contain .box .btn{
    margin-top: 10px;
    display: inline-block;
    background:#333;
    color:#fff;
    font-size: 17px;
    border-radius: 5px;
    padding: 8px 25px;
}

.contain .box-contain .box .btn:hover{
    letter-spacing: 1px;
}

.contain .box-contain .box:hover{
    box-shadow: 0 10px 15px rgba(0,0,0,.3);
    transform: scale(1.03);
}

@media (max-width:768px){
    .contain{
        padding:20px;
    }
}

.modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

            /* .about .icon-boxes .col-md-6:nth-child(2) .icon-box,
            .about .icon-boxes .col-md-6:nth-child(4) .icon-box {
                margin-top: -40px;
            }

            @media (max-width: 768px) {

                .about .icon-boxes .col-md-6:nth-child(2) .icon-box,
                .about .icon-boxes .col-md-6:nth-child(4) .icon-box {
                    margin-top: 0;
                }
            } */

            /* stats*/
            .stats {
                --color-default: #ffffff;
                --color-default-rgb: 255, 255, 255;
                --color-background: #000000;
                --color-background-rgb: 0, 0, 0;
                position: relative;
                padding: 40px 0;
            }

            .stats img {
                position: absolute;
                inset: 0;
                display: block;
                width: 100%;
                height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                z-index: 1;
            }

            .stats:before {
                content: "";
                background: rgba(var(--color-background-rgb), 0.6);
                position: absolute;
                inset: 0;
                z-index: 2;
            }

            .stats .container {
                position: relative;
                z-index: 3;
            }

            .stats .stats-item {
                padding: 30px;
                width: 100%;
            }



            .stats .stats-item span {
                display: block;
                color: var(--color-default);
                font-weight: 700;
            }

            .stats .stats-item p {
                padding: 0;
                margin: 0;
                font-family: var(--font-primary);
                font-size: 16px;
                font-weight: 700;
                color: rgba(var(--color-default-rgb), 0.6);
            }

            .navbar-toggler:hover {
                background-color: black !important;
                /* Remove any background color on hover */
                /* Remove any border color on hover */
            }

            .navbar-toggler:focus,
            .navbar-toggler:active {
                outline: none;
                /* Remove the default focus outline */
                box-shadow: none;
                /* Remove the default box-shadow */

                border-color: transparent !important;
                /* Remove any border color when active */
            }





            @keyframes animate {
                0% {
                    transform: translateX(100%);
                }

                100% {
                    transform: translateX(-100%);
                }
            }
        </style>
    </head>

    <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

        <!-- navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top custom-navbar ">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="assets/images/logo/<?php echo $row['sLogo']; ?> " alt="Logo" width="50" height="50">
                    <div class="alumni-organization-container pl-2">
                        <span class="alumni-text"><?php echo $row['sName']; ?></span>
                        <span class="organization-text"><?php echo $row['sDescription']; ?></span>
                    </div>
                <?php } ?>
                </a>
                <button class="navbar-toggler navbar-toggler-white navbar-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: none; ">
                    <i class="fas fa-bars"></i>

                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link " href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="pages/client/about.php">About Barangay 20</a>
                                <a class="dropdown-item" href="pages/client/officers.php">Barangay Officials</a>
                                <a class="dropdown-item" href="pages/client/projects.php">Projects</a>
                            </div>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/client/contact.php">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="pages/login_client.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="pages/admin_logIn.php">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section>

            <!-- announcements  -->
            <?php
            $sql = "SELECT * FROM announcement";
            $result = mysqli_query($connection, $sql);
            ?>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                    $indicatorIndex = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $isActive = ($indicatorIndex === 0) ? 'active' : '';
                    ?>

                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $indicatorIndex; ?>" class="<?php echo $isActive; ?>" aria-label="Slide <?php echo $indicatorIndex + 1; ?>"></button>
                    <?php
                        $indicatorIndex++;
                    }
                    ?>
                </div>

                <div class="carousel-inner">
                    <?php
                    $active = true; // To set the first item as active
                    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
                    while ($row = mysqli_fetch_assoc($result)) {
                        $itemClass = ($active) ? 'active' : '';
                    ?>
                        <!-- announcement  -->
                        <div class="carousel-item <?php echo $itemClass; ?>">
                            <div class="position-relative">
                                <img src="assets/images/announcement/<?php echo $row['img']; ?>" class="img-fluid d-block" style="width:100%; height:700px;" alt="Image">
                                <div class="mask" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                                      background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7));">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="card mx-auto" style="width: 60rem; background-color: rgba(0, 0, 0, 0.5); color: white; border: solid;" data-aos-duration="3000" data-aos="fade-up">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $row['title']; ?></h4>
                                            <hr>
                                            <h5>
                                                <?php echo $row['description']; ?>
                                            </h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                        $active = false; // Set active to false for subsequent items
                    }
                    ?>

                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>

            <?php
            $sql = "SELECT COUNT(*) AS account_id FROM user_account";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $account_id = $row['account_id'];

            // Format the total count as "00:01"
            $formatted_count = sprintf("%02d:%02d", floor($account_id / 60), $account_id % 60);
            ?>


            <!-- alumni count -->
            <section id="alumni" class="stats">
                <img src="assets/images/background.jpg" alt="" data-aos="fade-in">
                <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4">
                        <?php
                        $sql = "SELECT COUNT(*) AS account_id FROM user_account WHERE status = '2'";
                        $result = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $account_id = $row['account_id'];

                        // Format the total count as "00:01"
                        $formatted_count = sprintf("%02d:%02d", floor($account_id / 60), $account_id % 60);
                        ?>

                        <div class="col-lg-12 col-md-12 mx-auto">

                            <div class="stats-item text-center w-100 h-100">
                                <span class="stats-count" style="font-size: 120px;"><?php echo $formatted_count; ?></span>

                                <span style="font-size: 24px;">TOTAL REGISTERED POPULATION</span>
                            </div>
                        </div>



                    </div>
                </div>
            </section>

            <!-- request  -->
            <section>
        <div id="services">
                <div class="contain">

    <h1 class="heading">Services</h1>

    <div class="box-contain">

        <div class="box">
            <img src="assets/images/docu/1.jpg" alt="">
            <h3>Barangay ID </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a class="btn read-more">read more</a>
        </div>

        <div class="box">
            <img src="assets/images/docu/2.jpg" alt="">
            <h3>Barangay Clearance</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a class="btn read-more">read more</a>
        </div>

        <div class="box">
            <img src="assets/images/docu/4.jpg" alt="">
            <h3>Barangay Certificate</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a class="btn read-more">read more</a>
        </div>

        <div class="box">
            <img src="assets/images/docu/5.jpg" alt="">
            <h3>Business Clearance</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a class="btn read-more">read more</a>
        </div>

        <div class="box">
            <img src="assets/images/docu/3.png" alt="">
            <h3>Business Permit</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a class="btn read-more">read more</a>
        </div>

        <div class="box">
            <img src="assets/images/docu/6.jpg" alt="">
            <h3>Assistance</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a class="btn read-more">read more</a>
        </div>

    </div>

</div>   
</div>     
                        
</section>   
<!-- modal ng request  -->   
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Modal Header</h2>
        <p>This is some sample text in the modal.</p>
    </div>
</div>         


            
            <section id="about" class="about">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row align-items-xl-center gy-5 ">
                        <?php
                        $sql = "SELECT * FROM Settings";
                        $result = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="col-xl-5 content ">
                                <h2>
                                    <?php echo $row['sName']; ?>
                                </h2>
                                <p class="about-description">
                                    <?php echo $row['sNorth']; ?>
                                </p>

                                <button type="button" class="button" data-toggle="modal" data-target="#scrollableModal">
                                    Read more
                                </button>

                            </div>

                        <?php } ?>

                        <div class="col-xl-7 icon-boxes">
                            <div class="row align-items-center gy-5 mt-5">
                                <div class="col-md-6 mt-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon-box ">
                                        <h3 style="font-size: 20px;">Be a REGISTERED here in Barangay 20 Website!</h3>
                                        <p>Click here to become a Registered,
                                            and have a account!</p>
                                        <button class="mt-4" id="alumniButton">Register Now</button>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon-box ">
                                        <h3 style="font-size: 20px;">Would you like to receive updates on the status of your document request?
                                        </h3>
                                        <p>Click here to track it!</p>
                                        <button type="button" class="button mt-4" data-toggle="modal" data-target="#largeModal">
                                            Track it now!
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </section>

        <!-- footer -->
        <footer>
            <?php include 'pages/includes/client_footer.php' ?>
        </footer>

        <!-- read more modal  -->
        <?php
        $sql = "SELECT * FROM settings";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="modal fade" id="scrollableModal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scrollableModalLabel">
                                <?php echo $row['sName']; ?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>


                                <?php echo $row['sMain']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Large Modal -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Track your request progress.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form id="track-form">
                            <div class="form-group">
                                <label for="transaction_id">Transaction Id</label>
                                <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Input your transaction ID">
                            </div>
                        </form>
                        <!-- End Form -->
                        <div class="table-responsive"> <!-- Add this div to make the table horizontally scrollable -->
                            <table class="table table-bordered mt-3" id="progress-table" style="display: none;">
                                <thead>
                                    <tr>
                                        <th>Account ID</th>
                                        <th>Name</th>
                                        <th>Request</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be appended here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="transaction_btn" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>



        <script>
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
            $("#alumniButton").click(function() {
                // Display a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Register now and avail the Alumni Identification Card?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: 'orange',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirms, redirect to another page (e.g., alumni.php)
                        window.location.href = 'pages/client/register_users.php';
                    }
                });
            });

            $(document).ready(function() {
                $('#track-form').on('submit', function(e) {
                    if ($('#track-form').valid()) {
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "server/client_server/track_form.php",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(response) {


                                // if (response == "success") {
                                //     Swal.fire({
                                //         icon: 'success',
                                //         title: 'Your Lost ID  Has Been Sent',
                                //     }).then(function() {
                                //         location.href = "index.php";
                                //     });
                                // } else {
                                //     Swal.fire({
                                //         icon: 'error',
                                //         title: 'Failed to Send Re-id.',
                                //     });
                                // }
                            },
                            error: function() {
                                alert('Error importing data: ' + error);
                            }
                        });
                    } else {
                        validate_form.focusInvalid();
                    }
                });


            });


            // Edit Announcement: Populate Fields
            $(document).ready(function() {
                // Function to reset form fields
                function resetForm() {
                    $('#transaction_id').val(''); // Reset transaction ID field
                    $('#progress-table tbody').empty(); // Clear table body
                    $('#progress-table').hide(); // Hide the table
                }

                // Reset form when modal is hidden
                $('#largeModal').on('hidden.bs.modal', function() {
                    resetForm(); // Call the resetForm function
                });

                $(document).on('click', 'button#transaction_btn', function() {
                    var transactionId = $('#transaction_id').val();

                    if (!transactionId) {
                        // Display an error message or perform any other action to indicate that the field is empty
                        alert("Transaction ID cannot be empty.");
                        return; // Exit the function if the field is empty
                    }

                    // AJAX request to fetch data
                    $.ajax({
                        type: "POST",
                        url: "server/track.php",
                        data: {
                            id: transactionId,
                        },
                        dataType: "json",
                        success: function(response_editAnnouncement) {
                            console.log(response_editAnnouncement); // Check the response in the browser console

                            // Clear previous data from tbody
                            $('#progress-table tbody').empty();

                            if (response_editAnnouncement.hasOwnProperty('error')) {
                                // If an error occurred, display the error message in the table
                                var errorRow = $('<tr>').append($('<td>', {
                                    colspan: 4,
                                    text: response_editAnnouncement.error
                                }));
                                $('#progress-table tbody').append(errorRow);

                                // Hide the table header
                                $('#progress-table thead').hide();
                            } else {
                                // Create a new row
                                var newRow = $('<tr>');

                                // Append cells with input fields
                                newRow.append($('<td>').append($('<input>', {
                                    type: 'text',
                                    value: response_editAnnouncement.account_id,
                                    id: 'account_id',
                                    disabled: true, // Add disabled attribute
                                    style: 'border: none;' // Apply inline CSS to remove the border

                                })));
                                newRow.append($('<td>').append($('<input>', {
                                    type: 'text',
                                    value: response_editAnnouncement.name,
                                    id: 'name',
                                    disabled: true, // Add disabled attribute
                                    style: 'border: none;' // Apply inline CSS to remove the border

                                })));
                                newRow.append($('<td>').append($('<input>', {
                                    type: 'text',
                                    value: response_editAnnouncement.request,
                                    id: 'request',
                                    disabled: true, // Add disabled attribute
                                    style: 'border: none;' // Apply inline CSS to remove the border

                                })));
                                newRow.append($('<td>').append($('<input>', {
                                    type: 'text',
                                    value: response_editAnnouncement.status,
                                    id: 'status',
                                    disabled: true, // Add disabled attribute
                                    style: 'border: none;' // Apply inline CSS to remove the border

                                })));

                                // Append the new row to tbody
                                $('#progress-table tbody').append(newRow);

                                // Show the table header
                                $('#progress-table thead').show();
                            }

                            // Display the table if it was hidden
                            $('#progress-table').show();
                        },

                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>

<script>
    // JavaScript to handle modal functionality
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btns = document.getElementsByClassName("read-more");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    for (var i = 0; i < btns.length; i++) {
        btns[i].onclick = function() {
            modal.style.display = "block";
        }
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

    </body>

    </html>