<?php 
    if (!isset($_SESSION['user'])){
      header("Location: login.php");  
    } else {
        session_start();
    }
?>
