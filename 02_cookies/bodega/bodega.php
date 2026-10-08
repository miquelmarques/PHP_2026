<?php
if (isset($_GET["idioma"]) && isset($_GET["edat"])) {
    setcookie("idioma", $_GET["idioma"]);
    setcookie("majoredat", $_GET["edat"]);
}
if (isset($_GET["moneda"])) {
    if ($_GET["moneda"] == 'eur') {
        setcookie('moneda', '€');
    } elseif ($_GET["moneda"] == 'dol') {
        setcookie('moneda', '$');
    } elseif ($_GET["moneda"] == 'pnd') {
        setcookie('moneda', '£');
    }
}
if (isset($_COOKIE['moneda'])) {
    $moneda = $_COOKIE['moneda'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activitat Cookies - Bodega</title>
    <style>
        body {
            font-family: Georgia, serif;
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .idioma {
            margin-bottom: 3rem;
        }

        .idioma h2 {
            border-bottom: 2px solid #7b1e3a;
            padding-bottom: .3rem;
            color: #7b1e3a;
        }

        .vins {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .vi {
            flex: 1 1 250px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
        }

        .vi h3 {
            margin-top: 0;
        }

        .preu {
            font-weight: bold;
            color: #7b1e3a;
        }
    </style>
</head>

<body>
    <div>
        <form method="GET">
            <label for="edat">+18</label><input type="checkbox" name="edat" id="edat" checked>
            <select name="idioma" id="idioma">
                <option value="ca"> Català</option>
                <option value="es"> Castellano</option>
                <option value="uk"> English</option>
            </select>
            <select name="moneda">
                <option value="eur"> € </option>
                <option value="dol"> $ </option>
                <option value="pnd"> £ </option>
            </select>
            <button type="submit">Mostrar</button>
        </form>
    </div>
    <?php

    if (isset($_COOKIE["majoredat"]) and isset($_COOKIE['idioma'])) {
        if ($_COOKIE["majoredat"] == 'on' and $_COOKIE['idioma'] == "ca") {
            echo '<div class="idioma" id="ca" lang="ca">
    <h2>Els nostres vins</h2>
    <div class="vins">
      <article class="vi">
        <h3>Mas Roig Crianza</h3>
        <p><strong>Tipus:</strong> Negre</p>
        <p><strong>Varietats:</strong> Garnatxa i Samsó</p>
        <p>Vi intens, amb notes de fruita vermella madura i un punt de fusta.</p>
        <p class="preu">14,50 ' . $moneda . '</p>
      </article>
      <article class="vi">
        <h3>Mas Blanc Joven</h3>
        <p><strong>Tipus:</strong> Blanc</p>
        <p><strong>Varietats:</strong> Xarel·lo</p>
        <p>Vi fresc i afruitat, ideal per acompanyar peix i marisc.</p>
        <p class="preu">9,80 ' . $moneda . '</p>
      </article>
    </div>
  </div>';
        } elseif ($_COOKIE['majoredat'] == 'on' and $_COOKIE['idioma'] == 'es') {

            echo '<div class="idioma" id="es" lang="es">
    <h2>Nuestros vinos</h2>
    <div class="vins">
      <article class="vi">
        <h3>Mas Roig Crianza</h3>
        <p><strong>Tipo:</strong> Tinto</p>
        <p><strong>Variedades:</strong> Garnacha y Cariñena</p>
        <p>Vino intenso, con notas de fruta roja madura y un toque de madera.</p>
        <p class="preu">14,50 ' . $moneda . '</p>
      </article>
      <article class="vi">
        <h3>Mas Blanc Joven</h3>
        <p><strong>Tipo:</strong> Blanco</p>
        <p><strong>Variedades:</strong> Xarel·lo</p>
        <p>Vino fresco y afrutado, ideal para acompañar pescado y marisco.</p>
        <p class="preu">9,80 ' . $moneda . '</p>
      </article>
    </div>
  </div>';
        } elseif ($_COOKIE['majoredat'] == 'on' and $_COOKIE['idioma'] == 'uk') {

            echo '<div class="idioma" id="en" lang="en">
    <h2>Our wines</h2>
    <div class="vins">
      <article class="vi">
        <h3>Mas Roig Crianza</h3>
        <p><strong>Type:</strong> Red</p>
        <p><strong>Grapes:</strong> Grenache and Carignan</p>
        <p>An intense wine with notes of ripe red fruit and a hint of oak.</p>
        <p class="preu">' . $moneda . '14.50</p>
      </article>
      <article class="vi">
        <h3>Mas Blanc Joven</h3>
        <p><strong>Type:</strong> White</p>
        <p><strong>Grapes:</strong> Xarel·lo</p>
        <p>A fresh, fruity wine, perfect with fish and seafood.</p>
        <p class="preu">' . $moneda . '9.80</p>
      </article>
    </div>
  </div>';
        } else {
            echo '<p> Ho sentim no et podem vendre alcohol si ets menor d\'edat';
        }
    }
    ?>
</body>

</html>