<?php
include '../config/connection.php';

session_start();

$userLogged = $_SESSION['userLogged'];

if (empty($userLogged)) {
    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EGBMS | E-Governance Barangay Management System</title>
  

  <?php include 'import.php'; ?>
</head>

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
    .custom-text-justify {
        text-align: justify !important;
    } 
    </style>

<body class="hold-transition sidebar-mini layout-fixed">
  
<?php include 'includes/client_nav.php'; ?>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item text-decoration-none"><a>Home</a></li>
              <li class="breadcrumb-item text-secondary">Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section>


     
       
        <div id="services">
                <div class="contain">

    

    <div class="box-contain">

        <div class="box" data-request="Barangay Indigency">
            <img src="../assets/images/docu/1.jpg" alt="">
            <h3>Barangay Indigency </h3>
            <p class="custom-text-justify"> Barangay Indigency refers to a certification issued by the Barangay (the smallest administrative division in the Philippines) 
            confirming that an individual or family qualifies as indigent or economically disadvantaged. </p>
            <a href="client_dashboard copy.php" class="btn read-more">Proceed</a>
        </div>

        <div class="box" data-request="Barangay Clearance">
            <img src="../assets/images/docu/2.jpg" alt="">
            <h3>Barangay Clearance</h3>
            <p class="custom-text-justify">A Barangay Clearance is a document issued by the local Barangay government in the Philippines, 
                certifying that the individual named has cleared any outstanding liabilities or obligations within the community. </p>
            <a href="../pages\client_portal\brgyclear_form.php" class="btn read-more">Proceed</a>
        </div>

        <div class="box" data-request="Barangay Certificate">
            <img src="../assets/images/docu/4.jpg" alt="">
            <h3>Barangay Certificate</h3>
            <p class="custom-text-justify">A Barangay Certificate is a document issued by the Barangay (the smallest administrative division in the Philippines)
                 that certifies specific information about an individual or a situation within the community.</p>
            <a href="../pages/client/brgycerti_form.php" class="btn read-more">Proceed</a>
        </div>

        <div class="box" data-request="Business Clearance">
            <img src="../assets/images/docu/5.jpg" alt="">
            <h3>Business Clearance</h3>
            <p class="custom-text-justify">A Barangay Business Clearance is a document issued by the Barangay (the smallest administrative division in the Philippines) 
                that grants permission for an individual or entity to conduct business activities within the Barangay's jurisdiction. </p>
            <a href="../pages/client/busiclear_form.php" class="btn read-more">Proceed</a>
        </div>

        <div class="box" data-request="Building Permit">
            <img src="../assets/images/docu/3.png" alt="">
            <h3>Building Permit</h3>
            <p class="custom-text-justify">A Barangay Building Permit is an official authorization issued by the Barangay (the smallest administrative division in the Philippines) 
                that grants permission for construction or renovation activities within its jurisdiction.  </p>
            <a href="../pages/client_bpermit_form.php" class="btn read-more">Proceed</a>
        </div>

        <div class="box" data-request="Assistance">
            <img src="../assets/images/docu/6.jpg" alt="">
            <h3>Assistance</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
            <a href="../pages/client_assistance_form.php" class="btn read-more">Proceed</a>
        </div>

    </div>

</div>   
</div>     
                        
</section>   
  </div>
  <!-- /.content-wrapper -->

  <?php include 'includes/admin_footer.php'; ?>
  
</div>
<!-- ./wrapper -->

</body>

</html>