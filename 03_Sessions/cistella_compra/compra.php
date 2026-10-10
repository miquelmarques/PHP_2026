<?php

session_start();
$_SESSION = [];
session_destroy();
?>
<html lang="ca">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra realitzada - Xbox Store</title>
    <style>
        * {
            box-sizing: border-box;
        }
 
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
 
        .message-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 40px 30px;
            max-width: 450px;
            width: 100%;
            text-align: center;
        }
 
        .check {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #107c10;
            color: #fff;
            font-size: 2.8rem;
            line-height: 80px;
        }
 
        h1 {
            margin: 0 0 10px 0;
            font-size: 1.8rem;
            color: #111;
        }
 
        p {
            margin: 0 0 25px 0;
            color: #666;
            line-height: 1.4;
        }
 
        .btn {
            display: inline-block;
            background-color: #107c10;
            color: #fff;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }
 
        .btn:hover {
            background-color: #0e6b0e;
        }
    </style>
</head>
 
<body>
    <div class="message-card">
        <div class="check">✓</div>
        <h1>Compra realitzada!</h1>
        <p>Gràcies per la teva compra. Hem rebut la teva comanda correctament.</p>
        <a href="index.php" class="btn">Tornar a l'inici</a>
    </div>
</body>
 
</html>