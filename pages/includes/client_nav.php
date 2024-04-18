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

<!-- navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top custom-navbar ">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../../assets/images/proof-pictures/<?php echo $row['picture']; ?> " class="rounded-circle mx-2 img-fluid     object-position: center;
 object-fit-cover" alt="Logo" width="50" height="50">
            <div class="alumni-organization-container pl-3">
                <span class="alumni-text"><?php echo $row['name'];
 ?></span>
            </div>
            <?php  ?>
        </a>
        <button class="navbar-toggler navbar-toggler-white navbar-light" type="button" data-toggle="collapse"
            data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
            style="border: none; ">
            <i class="fas fa-bars"></i>

        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link " href="../../client_index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="pages/client/about.php"> Barangay 20</a>
                                <a class="dropdown-item" href="pages/client/officers.php">Barangay Officials</a>
                                <a class="dropdown-item" href="pages/client/projects.php">Projects</a>
                            </div>
                        </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/client/contact.php">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../../user_profile/profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../../server/client_logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>