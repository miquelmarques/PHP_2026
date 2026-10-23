<?php
    $conn = mysqli_connect("localhost","root","","base1") or die("Problemas con la connexion BD");

if (isset($_REQUEST["nombre"])){
    $select = mysqli_query($conn,"SELECT * FROM alumnos WHERE nombre = '$_REQUEST[nombre]'")
            or die ("Problemas en el insert".mysqli_error($conn));
    while ($fila = mysqli_fetch_array($select)){
        echo "  Nombre: ".$fila["nombre"] ;
        echo " Email: ". $fila["email"];
        echo " Codigo: ". $fila["codigo"]."<br> <hr>";
    }}
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
        <button type="submit">Consultar</button>
    </form>
</body>
</html>