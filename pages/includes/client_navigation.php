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
                        <a class="dropdown-item" href="about.php">About Barangay 20</a>
                        <a class="dropdown-item" href="officers.php">About Barangay Officials</a>
                        <a class="dropdown-item" href="projects.php">Projects</a>
                        <!-- Add more dropdown items here if needed -->
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="pages/login_client.php">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="../../pages/admin_logIn.php">Admin</a>
                </li>
            </ul>
        </div>

    </div>
</nav>