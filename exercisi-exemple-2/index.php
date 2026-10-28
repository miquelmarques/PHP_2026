<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Ejemplo 2 - Artículos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1 { color: #333; }
        nav { margin-bottom: 20px; }
        nav a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        nav a:hover { background-color: #0056b3; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #ddd; }
        .empty { color: #999; font-style: italic; padding: 20px; }
    </style>
</head>
<body>
    <h1>Formulario</h1>

    <form action="pagina2.php" method="post">
        <label for="name">Descripción rulo:  </label>
        <input type="text" name="descripcion" id="descripcion">
        <button type="submit">enviar</button>
    </form>
</body>
</html>
