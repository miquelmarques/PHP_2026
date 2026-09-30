<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div>
   <?php
   $hora = date("H");
   if ($hora <= 12){
    echo"<p style=\"color:white\">Bon dia</p>";
   } elseif( $hora >= 12 and $hora <= 19) {
    echo "<p style=\"color:orange\">Bona tarda</p>";
   } else {
    echo "<p style=\"color:black\">Bona nit</p>";
   }
   ?>
   </div>
</body>
</html>