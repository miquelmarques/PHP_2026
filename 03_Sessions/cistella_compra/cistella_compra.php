<?php
session_start();
if (isset($_POST["prod"]) && isset($_POST["quant"])) {
    /* Establir array de sessio si no existeix */
    if (!isset($_SESSION['producte']) && !isset($_SESSION['quant'])) {
        $_SESSION["producte"] = array();
        $_SESSION["quant"] = array();
        $_SESSION["preu"] = array();
    }
    /* Puja els nous valors de POST a SESSION */
    array_push($_SESSION["producte"], $_POST["prod"]);
    array_push($_SESSION["quant"], $_POST["quant"]);
    $preu_p = $_POST["preu"];
    $quant_p = $_POST["quant"];
    $calc = (int)$preu_p * (int)$quant_p;
    array_push($_SESSION["preu"], $calc);
    $_POST["prod"] = NULL;
    $_POST["quant"] = NULL;
    $_POST["preu"] = NULL;
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions - Cistella Compra</title>
    <style>
        /* Estils generals per a la disposició dels productes */
        /* Estils de la capçalera */
        .site-header {
            background-color: #121212;
            /* Fons fosc d'estil gaming */
            color: #ffffff;
            padding: 15px 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            margin: -40px -40px 40px -40px;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Logo */
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
            /* Verd Xbox */
        }

        /* Menú de navegació */
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
            /* Verd Xbox al passar el ratolí */
        }

        /* Enllaç especial per a la cistella */
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
            justify-content: center;
            gap: 20px;
            padding: 40px;
            margin: 0;
        }

        .list-products {
            margin-top: 40px;
            display: flex;
            flex-wrap: wrap;
        }

        /* Targeta del formulari / producte */
        form {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            width: 300px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        form:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        /* Contenidor intern */
        form>div {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Imatge del producte */
        form img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        /* Secció de text (títol i descripció) */
        form div>div:nth-of-type(1) {
            padding: 15px 20px;
            flex-grow: 1;
        }

        form h3 {
            margin: 0 0 10px 0;
            font-size: 1.25rem;
            color: #111;
        }

        form p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4;
        }

        /* Secció inferior (quantitat i botó) */
        form div>div:nth-of-type(2) {
            padding: 15px 20px;
            background-color: #fafafa;
            border-top: 1px solid #eee;
        }

        form label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #444;
        }

        form input[type="number"] {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 0.95rem;
        }

        form input[type="number"]:focus {
            outline: none;
            border-color: #107c10;
            /* Verd Xbox */
            box-shadow: 0 0 5px rgba(16, 124, 16, 0.3);
        }

        /* Botó d'afegir a la cistella */
        form button {
            width: 100%;
            background-color: #107c10;
            /* Verd Xbox */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        form button:hover {
            background-color: #0e6b0e;
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
        <form method="POST">
            <div>
                <img src="https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/07/xbox-series-x.jpg"
                    alt="Xbox Series X">
                <div>
                    <input type="hidden" name="prod" value="XSX">
                    <h3>Xbox Series X</h3>
                    <p>Porta't a casa la bèstia definitiva del gaming amb la Xbox Series X i sent el poder d'una
                        resolució
                        4K real a 120 FPS!</p>
                        <h4>500€</h4> <input type="hidden" value="500"  name="preu">
                </div>
                <div>
                    <label>Quantitat:</label> <br><input type="number" id="quant" name="quant" min="1" value="1"> <br>
                    <button type="submit">Afegeix a la cistella</button>
                    
                </div>
            </div>
        </form>
        <form method="POST">
            <div>
                <img src="https://tse2.mm.bing.net/th/id/OIP.0wjRMdAGhqV_p0Tnkwb_uAHaHa?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
                    alt="Xbox Series S">
                <div>
                    <input type="hidden" name="prod" value="XSS">
                    <h3>Xbox Series S</h3>
                    <p>Viu la potència de nova generació en format ultra compacte amb la Xbox Series S, ideal per a jocs
                        totalment digitals i ràpids.</p>
                        <h4>399€</h4> <input type="hidden" value="399" name="preu">
                </div>
                <div>
                    <label>Quantitat:</label> <br><input type="number" name="quant" min="1" value="1"> <br>
                    <button type="submit">Afegeix a la cistella</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>