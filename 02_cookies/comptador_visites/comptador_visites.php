<?php
if (isset($_COOKIE['contador'])) {
    $contador = $_COOKIE['contador'];
    setcookie("contador", $contador + 1);

} else {
    setcookie('contador', 0);
}
if (isset($_GET['codi'])) {
    if ($_GET['codi'] == 'BOTIGA50') {
        setcookie('compra', 1);
        setcookie('contador',0);
    }

} else {
    setcookie('compra', 0);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Activitat Cookies - Comptador Visites</title>
    <style>
        .anunci {
            max-width: 800px;
            margin: 20px auto;
            padding: 16px 24px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            animation: aparece 0.6s ease-out;
        }

        /* Variante para la oferta del 50% */
        .anunci.anunci-50 {
            background: linear-gradient(135deg, #c0392b, #e74c3c);
            animation: aparece 0.6s ease-out, pulso 2s ease-in-out infinite 0.6s;
        }

        @keyframes aparece {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulso {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }
        }

        @media (max-width: 600px) {
            .anunci {
                margin: 12px;
                padding: 12px 16px;
                font-size: 1rem;
            }
        }

        .form-codi {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px 24px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-codi label {
            flex-basis: 100%;
            font-weight: 600;
            color: #333;
        }

        .form-codi input[type="text"] {
            flex: 1;
            min-width: 150px;
            padding: 10px 14px;
            font-size: 1rem;
            text-transform: uppercase;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-codi input[type="text"]:focus {
            outline: none;
            border-color: #ff6b35;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
        }

        .form-codi button {
            padding: 10px 24px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.15s, box-shadow 0.15s;
        }

        .form-codi button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .form-codi button:active {
            transform: translateY(0);
        }

        @media (max-width: 600px) {
            .form-codi {
                margin: 12px;
                padding: 16px;
            }

            .form-codi button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <?php

    if ($_COOKIE['contador'] >= 10 and $_COOKIE['compra'] == 0) {
        echo '<p class="anunci">Oferta exclusiva sols per a tu! Utilitza el codi BOTIGA50 per obtenir un 50% de descompte en les teves primeres compres a la botiga</p>';
    } elseif ($_COOKIE['contador'] >= 10) {
        echo '<p class="anunci">Oferta exclusiva! Utilitza el codi BOTIGA20 per obtenir un 20% de descompte en les teves primeres compres a la botiga</p>';

    }
    ?>
    <form action="comptador_visites.php" method="get" class="form-codi">
        <label for="codi">Codi descompte:</label>
        <input type="text" id="codi" name="codi">
        <button type="submit">Comprar</button>
    </form>
</body>

</html>