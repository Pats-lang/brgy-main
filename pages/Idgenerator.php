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
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.js"></script>


    <?php include 'import.php'; ?>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 10px;
}

.id-card {
    width: 2in;
    height: 3.5in;
    padding: 20px;
    border: 1px solid #ccc;
    background-image: url('../assets/images/id/front.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    /* Use flexbox for layout */
    flex-direction: column;
    /* Arrange child elements in a column */
    position: relative;
    /* Set position to relative for absolute positioning */
}

.id-back {
    width: 2in;
    height: 3.5in;
    padding: 20px;
    border: 1px solid #ccc;
    background-image: url('../assets/images/id/back.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    /* Use flexbox for layout */
    flex-direction: column;
    /* Arrange child elements in a column */
    position: relative;
    /* Set position to relative for absolute positioning */
}


.id-card img {
    width: 75px;
    /* Adjust the width as needed */
    height: 75px;
    /* Adjust the height as needed */
    position: absolute;
    /* Set position to absolute for specific positioning */
    margin-top: 70px;
    /* Adjust the top distance as needed */
    left: 101px;
    /* Adjust the left distance as needed */
}




.custom-border {
    border: 2px solid black;
    /* Add a 2px black border */
    padding: 15px;
    /* Add padding for better spacing */
}

#idcontan {
    background-color: black;
    padding: 20px;
}

.profile-picture {
    width: 100px;
    height: 100px;
    position: absolute;
    margin-top: -5px;
    left: 120px;
}

.member-id {
    margin-left: 115px;
    margin-right: 5px;
    margin-top: 147px;
    /* Push the member ID to the right */
    color: black;
    position: absolute;
    /* Set position to absolute for specific positioning */

    font-weight: bold;
    font-size: 10px;
    /* Adjust font size as needed */
}


.member-name {
    margin-left: -5px;

    margin-top: 180px;
    /* Push the member ID to the right */
    color: black;
    position: absolute;
    /* Set position to absolute for specific positioning */
    font-size: 9px;
    font-weight: bold;
    font-size: 9px;
    /* Adjust font size as needed */
}

.member-address {
    margin-left: -10px;
    font-weight: bold;
    font-size: 8px;
    color: black;
    margin-top: 215px;
    /* Adjust the top margin as needed */
}

.member-civilstatus {
    margin-left: 40px;
    font-weight: bold;
    font-size: 10px;
    color: black;
    margin-top: 20px;
    /* Adjust the top margin as needed */
}

.member-bday {
    margin-left: 40px;
    font-weight: bold;
    font-size: 10px;
    color: black;
    margin-top: -43px;
    /* Adjust the top margin as needed */
}



.member-contact {
    margin-left: 40px;
    font-weight: bold;
    font-size: 10px;
    color: black;
    margin-top: -5px
}

.member-precinct {
    margin-left: 40px;
    font-weight: bold;
    font-size: 10px;
    color: black;
    margin-top: -15px
}

.member-contact_name {
    margin-left: 20px;
    font-weight: bold;
    font-size: 10px;
    color: black;
    margin-top: 23px
}

.member-contact_no {
    margin-left: 45px;
    font-weight: bold;
    font-size: 10px;
    color: black;
    margin-top: -12px
}





/*.profile-signature {
    width: 100px;
    height: 100px;
    position: absolute;
    margin-top: -5px;
    margin-left: 110px;
}*/
</style>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Site wrapper -->
    <div class="wrapper">



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Id Generator</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item text-secondary">Id Generator</li>
                                <li class="breadcrumb-item text-secondary">Barangay Residence</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left content column -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Residence Id </h3>
                                    <form action="" method="post" class="mt-5">

                                        <div class="mb-3">
                                            <label for="alumid" class="form-label">MEMBER Id No:</label>
                                            <input type="text" name="alumid" id="alumid" class="form-control"
                                                placeholder="Enter MEMBER ID" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Input the Member Id. </small>
                                        </div>

                                        <button type="submit" name="generate" class="btn btn-primary btn-block">Generate
                                            Barangay ID</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- Right content column -->
                        <div class="col-md-6">
                            <div class="card custom-border" id="idcontan">
                                <?php
      

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate'])) {
            // Get form data
            $alumid = $_POST['alumid'];

            // Fetch data from the members table based on the selected member ID
            $sql = "SELECT m.*, e.contact_name, e.contact_no
            FROM members m 
            LEFT JOIN member_emergency e ON m.member_id = e.member_id
            WHERE m.member_id = '$alumid' AND m.status = 1";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

               

              //  function getCourseAbbreviation($campus_id) {
                 //   $campus_id = trim($campus_id); // Trim whitespace
                
                 //   if ($campus_id === '01') {
                 //       return 'Male';
                 //   } elseif ($campus_id === '02') {
                //        return 'Female';
                //    } 
                //     else {
                 //       return $campus_id; // Return the original course if no match
              //      }
                //}
                // Display the fetched data in the identity card
                echo '<div class="id-card" id="id-card">';
                echo '<img id="profile" src="../assets/images/member_pictures/' . $row['picture'] . '" class="profile-picture">';
                echo '<p class="member-id"><strong>' . $row['member_id'] . '</strong></p>';
                echo '<p class="member-name"><strong>' . $row['fullname'] . '</strong></p>';
                echo '<p class="member-address"><strong>' . $row['address'] . '</strong></p>';
                // Include additional data fields as needed
                echo '</div>';

                // Display the fetched data in the ID back
                echo '<div class="id-back mt-2" id="id-back">';
              //  echo '<img id="profile" src="../assets/images/member_pictures/' . $row['signature'] . '" class="profile-signature">';
                echo '<p class="member-civilstatus"><strong>' . $row['civil_status'] . '</strong></p>';
                echo '<p class="member-bday"><strong>' . $row['birth_date'] . '</strong></p>';
                echo '<p class="member-contact"><strong>' . $row['cellphone_no'] . '</strong></p>';
                echo '<p class="member-precinct"><strong>' . $row['precinct'] . '</strong></p>';
                echo '<p class="member-contact_name"><strong>' . $row['contact_name'] . '</strong></p>';
                echo '<p class="member-contact_no"><strong>' . $row['contact_no'] . '</strong></p>';
             //   echo '<p class="member-course"><strong>' . getCourseAbbreviation($row['campus_id']) . '</strong></p>';
                // Include additional data fields as needed
                echo '</div>';

                // Buttons to trigger image capture
              

                echo '<button class="generateBtn" name="generateBtn" data-id="'. $row['member_id'] .'">Generate PDF</button>';
            } else {
                echo '<p style="color:white;">No verified member was found with the provided ID.</p>';
            }
           
            $connection->close();
           
        }
        ?>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>

        <!-- /.content -->
    </div>



    </div>
    <!-- ./wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>



    <script>

    $(".generateBtn").on("click", function() {
        var alumid = $(this).data('id');

        // Capture ID card and ID back as images
        html2canvas(document.getElementById('id-card')).then(function(canvasCard) {
            var imgCard = canvasCard.toDataURL('image/jpeg', 1.0);

            html2canvas(document.getElementById('id-back')).then(function(canvasBack) {
                var imgBack = canvasBack.toDataURL('image/jpeg', 1.0);

                // Send images to the server
                $.ajax({
                    type: "POST",
                    url: "../server/generate_id.php",
                    data: {
                        alumid: alumid,
                        imgCard: imgCard,
                        imgBack: imgBack
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); // Log the response for debugging
                        if (response.success) {
                            // Call the PHP script to generate PDF
                            generatePDF(alumid);
                        } else {
                            alert('Failed to save images. ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    });
    function generatePDF(alumid) {
    // Call the PHP script to generate PDF and initiate download
    $.ajax({
        type: "POST",
        url: "../server/id.php",
        data: {
            alumid: alumid
        },
        dataType: 'json', // Specify that we expect JSON in the response
        success: function(response) {
            console.log(response); // Log the response for debugging
            if (response.success) {
                // Handle success (e.g., display a message)
                toastr.success('PDF generated successfully.', '', {
                    timeOut: 1000,
                    closeButton: false,
                    onHidden: function() {
                        // Use JavaScript to create a download link or open the PDF in a new window
                        window.open(response.pdfFileName, '_blank');
                    }
                });
            } else {
                // Handle failure (e.g., display an error message)
                toastr.error('Failed to generate PDF. ' + response.message, '', {
                    closeButton: false,
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Failed to generate PDF.');
        }
    });
}

    </script>

</body>

</html>