<?php
include("config/config.php");
function iniciar_sessio()
{
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: profile.php");
    } else {
        return login_athnet();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = iniciar_sessio();
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Iniciar Sessió</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;800;900&family=Source+Sans+3:wght@400;600&display=swap">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="auth">

    <div id="wrapper">

        <!-- FORMULARI -->
        <main id="main">
            <article class="post">
                <header>
                    <div class="title">
                        <h2>Benvingut de nou</h2>
                        <p>Inicia sessió per continuar a AthNet</p>
                    </div>
                </header>

                <form method="POST" action="login.php">
                    <div class="fields">
                        <div class="field full">
                            <label for="email">Correu electrònic</label>
                            <input type="email" id="email" name="email" placeholder="el-teu@correu.com" required>
                        </div>
                        <div class="field full">
                            <label for="password">Contrasenya</label>
                            <input type="password" id="password" name="password" placeholder="La teva contrasenya" required>
                        </div>
                        <div class="field full">
                            <label class="check">
                                <input type="checkbox" name="remember"> Recorda'm en aquest dispositiu
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="button primary fit">Iniciar Sessió</button>
                </form>

                <div class="form-message">
                    <?php
                    if ($result) {
                        echo "<p style='color: red;'>Error: Usuari o Contrassenya Incorrecte</p>";
                    }
                    ?>
                </div>

                <div class="form-foot">
                    <p>No tens compte? <a href="registre.php">Registra't gratis</a></p>
                    <p><a href="#">Has oblidat la contrasenya?</a></p>
                </div>
            </article>
        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <a href="index.php" class="brand"><img src="images/logo.jfif" alt="AthNet"></a>
                <header>
                    <h2>La xarxa social per a atletes</h2>
                    <p>Connecta amb la comunitat, comparteix les teves marques i millora cada dia</p>
                </header>
            </section>

            <section>
                <h2>La comunitat en xifres</h2>
                <ul class="stats">
                    <li><b>2.5K+</b> Atletes</li>
                    <li><b>150+</b> Proves</li>
                    <li><b>50+</b> Clubs</li>
                </ul>
            </section>

            <section id="footer">
                <p class="copyright">&copy; 2026 AthNet. Tots els drets reservats.<br>
                    Disseny: <a href="https://html5up.net">HTML5 UP</a></p>
            </section>

        </section>

    </div>

</body>

</html>
