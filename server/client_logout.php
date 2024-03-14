<?php
   include '../server/client_server/conn.php';
   session_start();
   session_destroy();
   header('Location:index.php'); 
?>