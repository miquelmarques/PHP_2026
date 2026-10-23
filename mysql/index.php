<?php
    $conn = mysqli_connect("localhost","root","","base1") or die("Problemas con la connexion BD");

if (isset($_REQUEST["nombre"]) and isset($_REQUEST["email"]) and isset($_REQUEST["codigo"])){
    mysqli_query($conn,"INSERT INTO alumnos (nombre, email, codigo)"."values('$_REQUEST[nombre]','$_REQUEST[email]','$_REQUEST[codigo]')")
            or die ("Problemas en el insert".mysqli_error($conn));
    echo "usuario dado de alta";
}
    mysqli_close($conn);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Nom<input type="text" name="nombre">
        e-mail<input type="text" name="email">
        codigo<input type="text" name="codigo">
        <button type="submit">enviar</button>
    </form>
    <a href="select.php">consultar</a>
</body>
</html>