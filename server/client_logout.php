<?php
   include '../config/connection.php';
   session_start();
   // Unset all of the session variables
   session_unset();

   session_destroy();
   header('Location: ../index.php');
?>
