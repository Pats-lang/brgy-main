<?php
include '../config/connection.php';
require_once('../plugins/TCPDF-main/tcpdf.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$response = array(
   
);

$edit_IdAnnouncements = sanitizeData(getDatabase(), $_POST['account']);
$edit_lastModifiedAnnouncements = sanitizeData(getDatabase(), $_POST['status']);
$email = sanitizeData(getDatabase(), $_POST['register_email']);

$Main_name = sanitizeData(getDatabase(), $_POST['register_first_name']);

if ($preparedSql = $db->prepare("UPDATE `user_account` SET `status`= ? WHERE account_id =? ")) {
    $preparedSql->bind_param("ii", $edit_lastModifiedAnnouncements, $edit_IdAnnouncements);

    if ($preparedSql->execute()) {
        $response['status'] = true;
        $response['message'] = 'Successfully updated announcement details.'; 

        require '../plugins/PHPMailer/src/Exception.php';
        require '../plugins/PHPMailer/src/PHPMailer.php';
        require '../plugins/PHPMailer/src/SMTP.php';
    
          
        $mail = new PHPMailer(true);
    
        try {
    
    
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'barangay020@gmail.com';
            $mail->Password = 'bbcwbtiyfcxduefe';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->setFrom('barangay020@gmail.com');
          
            $mail->addAddress($email); // Replace with your actual email address
           
            $imageUrl = 'https://i.ibb.co/NC26SjV/barangay.gif';

            if ($edit_lastModifiedAnnouncements== 2) {
                $approvalMessage = " <b>Your Account Verification status is currently <span style='color:green;'> &nbsp; APPROVED</span></b></p  

                                <p>I trust this message finds you well.
                                <b>We are pleased to inform you that your registration with account has been approved.</b></p>
                              
                                <p>Your account is now active, and you can log in using the credentials you provided during the registration process.</p>
                               <p> If you have any questions or need assistance, feel free to reach out.
                                </p>
                              
                                ";
                
                $mailSubject = 'Account Verification Request - Approval Status';
            } elseif ($edit_lastModifiedAnnouncements == 1) {
                $approvalMessage = "
                                    <b><p>Your Account Verification status is currently<span style='color:red;'> &nbsp; DECLINED</span></b></p>
                                <p>I trust this email finds you well.</p>
                                <p>After careful verification by the Barangay, we regret to inform you that we were  <b>unable to verify your citizen in our barangay. </b></p>
                                <p>We regret to inform you that your registration with your account has not been approved. </b></p>
                                <p>If you believe there has been an error or if you have any questions regarding the verification process, please feel free to reach out to us at 09196994697.</p> 
                                <p>  We appreciate your interest, but unfortunately, we are unable to proceed with your registration based on your information you provided .</p> 
                                <b><p>Thank you for your understanding.
                                </b>";
                
                $mailSubject = 'Account Verification Request- Verification Status';
            } else {
                // Handle other status values if needed
                $approvalMessage = 'Undefined status';
                $mailSubject = 'Undefined Status';
            }
            

            $mail->Subject =  $mailSubject;
            $mail->Body = '<html>
            <head>
                <style>
                    body {
                        font-family: \'Arial\', sans-serif;
                        background-color: #f4f4f4;
                        color: #333;
                        margin: 0;
                    }
            
                    table.container {
                        max-width: 600px;
                        width: 100%;
                        margin: 0 auto;
                        background-color: #EDE9E8;
                        border-radius: 5px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    
                    td.img-container {
                        background-image: url("https://i.ibb.co/Kz2fshy/410931164-1509662996487803-4024040495286225472-n.jpg");             
                          background-size: cover; /* Adjust as needed */
                           background-position: center; /* Adjust as needed */
                           padding: 100px;
                           border-radius: 5px 5px 0px 0px;
                           text-align: center;
                       
                       }
            
                    img {
                        width: 100px;
                        height: 100px;
                    }
            
                    td.form-details {
                        text-align: center;
                        border-radius: 0px 0px 5px 5px;
                        background-color: #FFF;
                        padding: 25px;
                    }
                </style>
            </head>
            <body>
                <table class="container">
                <tr>
                <td class="img-container"></td>
            </tr>
                    <tr>
                    <td class="form-details">
                    <h2>Greetings "' . $Main_name . '"!</h2>
                    <p>"' .$approvalMessage  . '"!</p>
                   
                    <b><p>For more inquiries feel free to reach us!</p></b>
                </td>
                    </tr>
                </table>
            </body>
            </html>';
    
    
            $mail->isHTML(true);
            $mail->send();
    
            http_response_code(200); // OK
            $response['status'] = true;
            $response['message'] = 'Successfully .'; 
        
            
        } catch (Exception $e) {
            http_response_code(500); // Internal Server Error
            $response['status'] = false;
            $response['message'] = "Failed to update announcement information: " . $preparedSql->error;
        }
       
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to update announcement information: " . $preparedSql->error;
        http_response_code(500); // Internal Server Error
    }
    $preparedSql->close();

   



} else {
    $response['status'] = false;
    $response['message'] = " ~ An error occurred while preparing the UPDATE statement:" . $preparedSql->error . " ~ ";
    http_response_code(500); // Internal Server Error
}


// Additional check to delete member if status is 0
if ($edit_lastModifiedAnnouncements  === '1') {
    // Validate $Main_id to prevent SQL injection
    if (!empty($edit_IdAnnouncements)) {
        // Use prepared statement to prevent SQL injection
        $stmtDelete = $db->prepare("DELETE FROM `user_account` WHERE `account_id` = ?");
        $stmtDelete->bind_param("i", $edit_IdAnnouncements);

        // Execute the delete statement
        if ($stmtDelete->execute()) {
            // Member deletion successful
            $response['delete_status'] = true;
            $response['delete_message'] = 'Successfully deleted user with ID ' . $edit_IdAnnouncements;
        } else {
            // Member deletion failed
            $response['delete_status'] = false;
            $response['delete_message'] = 'Failed to delete member: ' . $stmtDelete->error;
        }

        // Close the delete statement
        $stmtDelete->close();
    } else {
        // Invalid member ID
        $response['delete_status'] = false;
        $response['delete_message'] = 'Invalid member ID for deletion.';
    }
}

 

echo json_encode($response);
?>
