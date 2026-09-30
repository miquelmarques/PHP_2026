<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">

    <title>Resultat Exercisi 4</title>
    <style>
        body{
            background-color: gainsboro;
            font-family: Arial, Helvetica, sans-serif;
        }
        div {
            width:40%;
            margin: auto;
            margin-top: 10%;
            border: 2px solid black;
            border-radius: 20px;
            padding: 10px;
            background-color: white;
        }
    </style>
</head>
<body>
    <div>
        <?php
        $enviat = $_POST["so"];
        if ($enviat == "Windows") {
            echo"<p>Good Boy Windows user!Com et sents amb tant Copilot?</p>";
        } else if ($enviat == "linux") {
            echo "<p>Ets un crack! Linux user</p>";
        } else if ($enviat == "macOS") {
            echo "Te huelen los pies, macOS user!</p>";
        }else{
            echo "Ets una mica extrany, no? ;(";
        }
        ?>
    </div>
</body>
</html>