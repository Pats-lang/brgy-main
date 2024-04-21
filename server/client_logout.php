<?php
   include '../config/connection.php';
   session_start();
   session_destroy();
   header('Location: ../index.php');
?>

