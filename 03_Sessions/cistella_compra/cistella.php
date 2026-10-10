<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions - Cistella Compra</title>
    <style>
        .site-header {
            background-color: #121212;
            color: #ffffff;
            padding: 15px 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo span {
            color: #107c10;
        }

        .nav-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .nav-menu a {
            color: #cccccc;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-menu a:hover {
            color: #107c10;
        }

        .nav-menu .cart-link {
            background-color: #107c10;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            transition: background-color 0.2s ease;
        }

        .nav-menu .cart-link:hover {
            background-color: #0e6b0e;
            color: white;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
        }

        /* Graella de productes */
        .list-products {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 30px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        /* El títol ocupa tota la fila */
        .list-products h2 {
            grid-column: 1 / -1;
            margin: 0;
            font-size: 1.8rem;
            color: #111;
        }

        /* Targeta de producte (el div de cada producte) */
        .list-products>div {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .list-products>div:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        /* Imatge */
        .list-products img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        /* Text (títol i descripció) */
        .list-products>div>div:nth-of-type(1) {
            padding: 15px 20px;
            flex-grow: 1;
        }

        .list-products h3 {
            margin: 0 0 10px 0;
            font-size: 1.25rem;
            color: #111;
        }

        .list-products p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4;
        }

        /* Part inferior (quantitat) */
        .list-products>div>div:nth-of-type(2) {
            padding: 15px 20px;
            background-color: #fafafa;
            border-top: 1px solid #eee;
        }

        .list-products label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #444;
        }

        .list-products input[type="number"] {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 0.95rem;
            background: #fff;
        }

        .list-products input[type="number"]:disabled {
            background: #eee;
            color: #666;
        }

        @media (max-width: 600px) {
            .list-products {
                padding: 25px 15px;
            }
        }

        /* Botó de confirmar compra */
        .checkout {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px 50px;
            display: flex;
            justify-content: flex-end;
        }

        .checkout button {
            background-color: #107c10;
            color: #fff;
            border: none;
            padding: 14px 35px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(16, 124, 16, 0.35);
            transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }

        .checkout button:hover {
            background-color: #0e6b0e;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(16, 124, 16, 0.45);
        }

        .checkout button:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(16, 124, 16, 0.35);
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div class="header-container">
            <!-- Logo o Títol de la Botiga -->
            <div class="logo">
                <a href="index.php">🎮 Xbox <span>Store</span></a>
            </div>

            <!-- Menú de navegació -->
            <nav class="nav-menu">
                <ul>
                    <li><a href="index.php">Inici</a></li>
                    <li><a href="cistella.php" class="cart-link">🛒 Cistella</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="list-products">
        <h2>Llista de la compra</h2>
        <?php
        /* Revisa si existeix el array de producte de SESSION */
        if (isset($_SESSION["producte"])) {
            /* Guarda en variables per fer el print amb el for*/
            $productes = $_SESSION["producte"];
            $quant = $_SESSION["quant"];
            $total = count($productes);
            $preu = $_SESSION["preu"];
            /* For per cada producte que hi ha*/
            for ($i = 0; $i < $total; $i++) {
                if ($productes[$i] == "XSX") {
                    echo '<div>
                <img src="https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/07/xbox-series-x.jpg"
                    alt="Xbox Series X">
                <div>
                    <input type="hidden" name="prod" value="XSX">
                    <h3>Xbox Series X</h3>
                    <p>Porta\'t a casa la bèstia definitiva del gaming amb la Xbox Series X i sent el poder d\'una
                        resolució
                        4K real a 120 FPS!</p>
                     <h4>Total: ' . $preu[$i] . '€</h4> 
                </div>
                <div>
                    <label>Quantitat:</label> <br><input type="number" id="quant" name="quant" readonly value="' . $quant[$i] . '"> <br>
                </div>
            </div> ';
                } elseif ($productes[$i] === "XSS") {
                    echo '
           <div>
                <img src="https://tse2.mm.bing.net/th/id/OIP.0wjRMdAGhqV_p0Tnkwb_uAHaHa?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
                    alt="Xbox Series S">
                <div>
                    <h3>Xbox Series S</h3>
                    <p>Viu la potència de nova generació en format ultra compacte amb la Xbox Series S, ideal per a jocs
                        totalment digitals i ràpids.</p>
                    <h4>Total: ' . $preu[$i] . '€ </h4> 
                </div>
                <div>
                    <label>Quantitat:</label> <br><input type="number" id="quant" name="quant" readonly value="' . $quant[$i] . '"> <br>
                </div>
            </div>
        ';
                }

            }
        } else {
            echo '<div>
                <div>
                    <h3>No hi ha cap producte</h3>
                </div>
            </div>';
        }


        ?>
    </div>
    <?php 
    if (isset($_SESSION["producte"]) && count($_SESSION["producte"]) > 0) { 
        echo '
        <h3> Total: '.array_sum($_SESSION['preu']).'€
        <form action="compra.php" method="POST" class="checkout">
            <button type="submit">🛒 Confirmar compra</button>
        </form>';
    
    } ?>
</body>

</html>