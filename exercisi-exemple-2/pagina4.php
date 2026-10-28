<?php

require_once 'conexion.php';

$registre = mysqli_query($conn,"SELECT rubro_id, descripcion FROM rubros WHERE descripcion='$_POST[descripcion]'") or("error en la consulta"); 
if ($reg = $registre -> fetch_array()){
echo'<table border=1>';
echo "<tr> <th> Codigo </th> <th>Descripción</th>";
    echo "<tr><td>$reg[rubro_id]</td> <td>$reg[descripcion]</td></tr>";
echo "</table>";
}

mysqli_close($conn);

?>