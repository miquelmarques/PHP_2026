<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","athnet");
    $_SESSION['user'] =  mysqli_query($conn,"SELECT id_usuari FROM usuari WHERE id_usuari = 1");
    mysqli_close($conn);
    header("location:profile.php")
?>
