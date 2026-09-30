<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
         body{
            background-color: gainsboro;
            font-family: Arial, Helvetica, sans-serif;
        }
        form {
            width:40%;
            margin: auto;
            margin-top: 10%;
            border: 2px solid black;
            border-radius: 20px;
            padding: 10px;
            background-color: white;
        }
        input, textarea, button{
            width: 100%;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 5px;
        }
        button{
            background-color: rgb(98, 148, 24);
            color: white;
        }
      </style>
   </head>
   <body>
        <form action="index.html" method="post">
            <?php
            $nom = $_POST['nom'];
            $cognoms = $_POST['cognoms'];
            $email = $_POST['email'];
            $missatge = $_POST['missatge'];

            echo "<p> Missatge rebut, $nom. Gràcies per contactar. Et respondrem a $email </p>"
            ?>
            <button type="submit">Tornar</button>
        </form>

   </body>
   </html>
