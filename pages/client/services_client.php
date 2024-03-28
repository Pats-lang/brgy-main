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

.modal-backdrop {
    z-index: 0;
}


.modal {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
    /* Add the following styles */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* Adjust margin to center vertically */
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
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
    body.modal-open {
        overflow: hidden;
    }

    body.modal-open .modal {
        overflow-y: auto;
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
                                <h2>SERVICES</h2>
                            </div>

                            <div class="d-flex flex-wrap align-items-center">
                                <a href="../../index.php" class="text-reset fw-bold" style="text-decoration:none;">Home</a>
        
                                <span class="mx-1">/</span>
                                <a href="" class="text-reset" style="text-decoration:none;">Services</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- request  -->
     <section>
        <div id="services">
                <div class="contain">

    

    <div class="box-contain">

        <div class="box" data-request="Barangay ID">
            <img src="../../assets/images/docu/1.jpg" alt="">
            <h3>Barangay ID </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="../../pages/client/brgyid_form.php" class="btn read-more">read more</a>
        </div>

        <div class="box" data-request="Barangay Clearance">
            <img src="../../assets/images/docu/2.jpg" alt="">
            <h3>Barangay Clearance</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="../../pages/client/brgyclear_form.php" class="btn read-more">read more</a>
        </div>

        <div class="box" data-request="Barangay Certificate">
            <img src="../../assets/images/docu/4.jpg" alt="">
            <h3>Barangay Certificate</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="../../pages/client/brgycerti_form.php" class="btn read-more">read more</a>
        </div>

        <div class="box" data-request="Business Clearance">
            <img src="../../assets/images/docu/5.jpg" alt="">
            <h3>Business Clearance</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="../../pages/client/busiclear_form.php" class="btn read-more">read more</a>
        </div>

        <div class="box" data-request="Business Permit">
            <img src="../../assets/images/docu/3.png" alt="">
            <h3>Business Permit</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="../../pages/client/busiper_form.php" class="btn read-more">read more</a>
        </div>

        <div class="box" data-request="Assistance">
            <img src="../../assets/images/docu/6.jpg" alt="">
            <h3>Assistance</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="../../pages/client/assistance_form.php" class="btn read-more">read more</a>
        </div>

    </div>

</div>   
</div>     
                        
</section>   


       
<!-- footer -->
<footer>
            <?php include '../../pages/includes/client_footer.php' ?>
        </footer>
<!-- 





       
</body>

</html>

