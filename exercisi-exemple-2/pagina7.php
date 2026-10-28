<?php

require_once 'conexion.php';

$registre = mysqli_query($conn,"DELETE FROM rubros WHERE descripcion='$_POST[descripcion]'") or("error en la consulta"); 
echo "Borrat";

mysqli_close($conn);

?>