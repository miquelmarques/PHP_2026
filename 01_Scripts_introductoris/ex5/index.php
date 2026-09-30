<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercisi 5</title>
</head>
<body>
    <div>
        <form method="get">
            <label for="preu">Introdueix el preu:</label><input type="number" name="preu" id="preu"> <br>
            <select name="VAT" id="VAT">
                <option value="IVA">IVA- ESPANYA</option>
                <option value="IGI">IGI - ANDORRA</option>
                <option value="TVA">TVA - FRANCE</option>
            </select>
            <button type="submit">Calcular</button>
        </form>
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