<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercisi 5</title>
    <style>
                body{
            background-color: gainsboro;
            font-family: Arial, Helvetica, sans-serif;
        }
        div{
            width:40%;
            margin: auto;
            margin-top: 10%;
            border: 2px solid black;
            border-radius: 20px;
            padding: 10px;
            background-color: white;
        }
        input, textarea,select{
            width: 100%;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 5px;
        } 
        button{
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
    <div>
        <h1>Calcular Impostos</h1>
        <form method="get">
            <label for="preu">Introdueix el preu:</label><input type="number" name="preu" id="preu"> <br> <br>
            <select name="VAT" id="VAT">
                <option value="IVA">IVA- ESPANYA</option>
                <option value="IGI">IGI - ANDORRA</option>
                <option value="TVA">TVA - FRANCE</option>
            </select>
            <button type="submit">Calcular</button>
        </form>
        <br>
        <br>
        <?php 
            $preu = $_GET["preu"];
            $vat = $_GET["VAT"];
            if ($vat == "IVA"){
                $total = $preu*1.21;
            } elseif( $vat == "IGI") {
                $total = $preu*1.04;
            } else{
                $total = $preu*1.20;
            }
            echo"Resultat:".$total."€";
        ?>
    </div>
</body>
</html>