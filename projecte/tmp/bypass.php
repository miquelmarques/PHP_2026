<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","athnet");
    $result = mysqli_query($conn,"SELECT id_usuari FROM usuari WHERE id_usuari = 1");
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user'] = (int) $row['id_usuari'];
    mysqli_close($conn);
    header("location:../profile.php");
    exit;
?>
