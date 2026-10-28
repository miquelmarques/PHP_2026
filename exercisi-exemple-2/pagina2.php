<?php
    require_once 'conexion.php';

   mysqli_query($conn,"INSERT INTO rubros (descripcion) VALUES ('$_POST[descripcion]')") 
        or die(mysqli_error($conn));
    echo "El nuevo rubro se ha almacenado";
    
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Artículo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1 { color: #333; }
        nav { margin-bottom: 20px; }
        nav a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        nav a:hover { background-color: #545b62; }
        form {
            background-color: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.25);
        }
        button {
            padding: 12px 30px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover { background-color: #218838; }
        .mensaje {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .warning { background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
    </style>
</head>
<body>

</body>
</html>

