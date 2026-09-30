<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Exercisi 2 - Conversor de monedes</title>+
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        div {
            background: #ffffff;
            padding: 2rem 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 400px;
        }

        button#EurosBtn,
        button#DolarBtn {
            flex: 1;
            padding: 0.7rem 1rem;
            margin-bottom: 1.2rem;
            margin-right: 0.5rem;
            border: none;
            border-radius: 8px;
            background: #e0e6ed;
            color: #1e3c72;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease, color 0.2s ease;
        }

        button#EurosBtn:hover,
        button#DolarBtn:hover {
            background: #2a5298;
            color: #ffffff;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        label {
            font-weight: 600;
            color: #333333;
        }

        input[type="text"] {
            padding: 0.6rem 0.8rem;
            border: 1px solid #cccccc;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s ease;
        }

        input[type="text"]:focus {
            border-color: #2a5298;
        }

        form button[type="submit"] {
            padding: 0.7rem 1rem;
            border: none;
            border-radius: 8px;
            background: #1e3c72;
            color: #ffffff;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        form button[type="submit"]:hover {
            background: #16305e;
        }
    </style>
</head>

<body>
    <div>
        <button id="EurosBtn">Euros a Dolars</button>
        <button id="DolarBtn">Dolar a Euros</button>
        <form action="index.php" method="post" id="formeuros">
            <label for="euros">Euros € a Dolar $: </label>
            <input type="text" name="euros" id="euros"> <br>
            <?php
            $euros = $_POST["euros"];
            $dolars = $euros * 1.12;
            echo "Tens $dolars $";
            ?>
            <button type="submit">Calcular</button>
        </form>
        <form action="index.php" method="post" id="formdolars">
            <label for="dolars">Dolars $ a Euros €: </label>
            <input type="text" name="dolars" id="dolars"> <br>
            <?php
            $dolars = $_POST["dolars"];
            $euros = $dolars * 0.88;
            echo "Tens $euros €";
            ?>
            <button type="submit">Calcular</button>
        </form>
    </div>
    <script>
        const eurosbtn = document.getElementById("EurosBtn");
        const dolarbtn = document.getElementById("DolarBtn");
        eurosbtn.addEventListener("click", () => {
            document.getElementById("formeuros").style.display = "block";
            document.getElementById("formdolars").style.display = "none";
        });
        dolarbtn.addEventListener("click", () => {
            document.getElementById("formeuros").style.display = "none";
            document.getElementById("formdolars").style.display = "block";
        });
    </script>
</body>
</html>
