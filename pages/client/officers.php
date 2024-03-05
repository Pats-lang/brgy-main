<?php
include 'header.php';
include '../../server/client_server/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barangay Officials</title>
        
        <style>
                body {
    
    overflow-x: hidden; /* Prevent horizontal scrollbar */
}
    
            .box {
                width: 100%;
                max-width: 300px;
                /* Adjust the maximum width as needed */
                margin: 0 auto;
                padding: 20px;
                background-color: #f9f9f9;
                text-align: center;
                border: 2px solid orange;
                /* Orange border */
                box-shadow: 0 0 15px orange;
                /* Orange box shadow */
            }

            .box img {
                max-width: 100%;
                margin-bottom: 10px;
            }

            .box-title {
                font-size: 1.5rem;
                margin-bottom: 10px;
            }

            .box-text {
                font-size: 1rem;
            }
        </style>
    </head>

    <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

        <?php include('../includes/client_navigation.php'); ?>

        <section>
            <div class="bg-light">
                <div class="container">
                    <div class="mx-auto">
                        <div class="p-2 breadcrumb-container">
                            <div class="d-flex justify-content-between align-items-center mt-2 flex-wrap">

                                <div>
                                    <h2>OFFICIALS</h2>
                                </div>

                                <div class="d-flex flex-wrap align-items-center">
                                    <a href="../../index.php" class="text-reset fw-bold"
                                        style="text-decoration:none;">Home</a>
                                    <span class="mx-1">/</span>
                                    <a href="" class="text-reset" style="text-decoration:none;">About</a>
                                    <span class="mx-1">/</span>
                                    <a href="" class="text-reset" style="text-decoration:none;">Officials</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>

<div class="col-12 col-md-3 mx-auto text-center mt-5">
    <h2 data-aos="fade-up" data-aos-delay="300">BARANGAY OFFICIALS</h2>
    </h2>
</div>


<div class="row mt-5">
    <div class="col-12 col-md-3 mx-auto text-center" data-aos="fade-up" data-aos-delay="300"
        data-aos-duration="00" data-aos-easing="ease-out">
        <div class="box border mb-4 mem">
            <?php
        $positionToDisplay = "Barangay Captain";  // Specify the position you want to display

        $sql = "SELECT img_officials, name_officials, position FROM officials WHERE position = '$positionToDisplay' LIMIT 1";
        $result = mysqli_query($connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
             <img src="../assets/images/officials/<?php echo $row['img_officials']; ?>" class="box-img-top img-"
                alt="Officials Image" style="max-width: 100%; margin: 0 auto;">
            <div class="box-body">
                <h3 class="box-title mt-2 " style="color:orange;"><?php echo $row['position']; ?></h3>
                <h4 class="box-text mt-2"><?php echo $row['name_officials']; ?></p>
            </div>
            <?php
        } else {
            // Handle case when no director with the specified position is found
            echo "No director found for the position: $positionToDisplay";
        }
    ?>
        </div>
    </div>
</div>



<div class="container ">
    <div class="row mt-3">
        <div class=" col-9 col-md-9 text-center " data-aos="fade-up" data-aos-delay="300">
            <div class="box border mb-4 mem" >
                <?php
            $positionToDisplay = "Barangay Secretary";  // Specify the position you want to display

            $sql = "SELECT img_officials, name_officials, position FROM officials WHERE position = '$positionToDisplay' LIMIT 1";
            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <img src="../assets/images/officials/<?php echo $row['img_officials']; ?>" class="box-img-top img-"
                    alt="Director Image" style="max-width: 100%; margin: 0 auto;">
                <div class="box-body">
                <h3 class="box-title mt-2 " style="color:orange;"><?php echo $row['position']; ?></h3>
                <h4 class="box-text mt-2"><?php echo $row['name_officials']; ?></p>
                </div>
                <?php
            } else {
                // Handle case when no director with the specified position is found
                echo "No director found for the position: $positionToDisplay";
            }
        ?>
            </div>
        </div>

        <div class="col-md-12 text-center " data-aos="fade-up" data-aos-delay="300">
            <div class="box border mb-4 mem" style="width: 100%;">
                <?php
            $positionToDisplay = "Barangay Treasurer";  // Specify the position you want to display

            $sql = "SELECT img_officials, name_officials, position FROM officials WHERE position = '$positionToDisplay' LIMIT 1";
            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
                  <img src="../assets/images/officials/<?php echo $row['img_officials']; ?>" class="box-img-top img-"
                    alt="Director Image" style="max-width: 100%; margin: 0 auto;">
                <div class="box-body">
                <h3 class="box-title mt-2 " style="color:orange;"><?php echo $row['position']; ?></h3>
                <h4 class="box-text mt-2"><?php echo $row['name_officials']; ?></p>
                </div>
                <?php
            } else {
                // Handle case when no director with the specified position is found
                echo "No director found for the position: $positionToDisplay";
            }
        ?>
            </div>
        </div>
    </div>
</div>

<div class="container ">
    <div class="row mt-3">
        <div class="col-md-3 text-center " data-aos="fade-up" data-aos-delay="300">
            <div class="box border mb-4 mem" >
                <?php
            $positionToDisplay = "Barangay Kagawad";  // Specify the position you want to display

            $sql = "SELECT img_officials, name_officials, position FROM officials WHERE position = '$positionToDisplay' LIMIT 7";
            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <img src="../assets/images/officials/<?php echo $row['img_officials']; ?>" class="box-img-top img-"
                    alt="Director Image" style="max-width: 100%; margin: 0 auto;">
                <div class="box-body">
                <h3 class="box-title mt-2 " style="color:orange;"><?php echo $row['position']; ?></h3>
                <h4 class="box-text mt-2"><?php echo $row['name_officials']; ?></p>
                </div>
                <?php
            } else {
                // Handle case when no director with the specified position is found
                echo "No director found for the position: $positionToDisplay";
            }
        ?>
            </div>
        </div>

        <div class="col-md-3 text-center " data-aos="fade-up" data-aos-delay="300">
            <div class="box border mb-4 mem" style="width: 100%;">
                <?php
            $positionToDisplay = "Barangay Kagawad";  // Specify the position you want to display

            $sql = "SELECT img_officials, name_officials, position FROM officials WHERE position = '$positionToDisplay' LIMIT 7";
            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
                  <img src="../assets/images/officials/<?php echo $row['img_officials']; ?>" class="box-img-top img-"
                    alt="Director Image" style="max-width: 100%; margin: 0 auto;">
                <div class="box-body">
                <h3 class="box-title mt-2 " style="color:orange;"><?php echo $row['position']; ?></h3>
                <h4 class="box-text mt-2"><?php echo $row['name_officials']; ?></p>
                </div>
                <?php
            } else {
                // Handle case when no director with the specified position is found
                echo "No director found for the position: $positionToDisplay";
            }
        ?>
            </div>
        </div>

        <div class="col-md-3 text-center " data-aos="fade-up" data-aos-delay="300">
            <div class="box border mb-4 mem" style="width: 100%;">
                <?php
            $positionToDisplay = "Barangay Kagawad";  // Specify the position you want to display

            $sql = "SELECT img_officials, name_officials, position FROM officials WHERE position = '$positionToDisplay' LIMIT 7";
            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
                  <img src="../assets/images/officials/<?php echo $row['img_officials']; ?>" class="box-img-top img-"
                    alt="Director Image" style="max-width: 100%; margin: 0 auto;">
                <div class="box-body">
                <h3 class="box-title mt-2 " style="color:orange;"><?php echo $row['position']; ?></h3>
                <h4 class="box-text mt-2"><?php echo $row['name_officials']; ?></p>
                </div>
                <?php
            } else {
                // Handle case when no director with the specified position is found
                echo "No director found for the position: $positionToDisplay";
            }
        ?>
            </div>
        </div> 
    </div>
</div>
    

        


</section>  
        <?php include('../includes/client_footer.php'); ?>

        <script>
            AOS.init();
        </script>

    </body>

</html>