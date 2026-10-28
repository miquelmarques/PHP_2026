<?php

require_once 'conexion.php';

$registres = mysqli_query($conn,"SELECT rubros_id, descripcion FROM rubros") or("error en la consulta"); 

echo'<table border=1>';
echo "<tr> <th> Codigo </th> <th>Descripción</th>";
while ($reg = $registres->fetch_array()){
    echo "<tr><td>$reg[codigo]</td> <td>$reg[descripcion]</td></tr>";
}
echo "</table>";