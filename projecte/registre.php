<?php
    include ("config/config.php");
    function registre_usuari()
    {
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: profile.php");
    } else {
        return register_athnet();
    }
    }
    $result = registre_usuari();

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Registrar-se</title>
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
                        <h2>Crea el teu compte</h2>
                        <p>Registra't gratis i comença a córrer amb nosaltres</p>
                    </div>
                </header>

                <form method="POST" action="registre.php">
                    <div class="fields">
                        <div class="field">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" placeholder="El teu nom" required>
                        </div>
                        <div class="field">
                            <label for="cognoms">Cognoms</label>
                            <input type="text" id="cognoms" name="cognoms" placeholder="Els teus cognoms" required>
                        </div>
                        <div class="field full">
                            <label for="username">Nom d'usuari</label>
                            <input type="text" id="username" name="username" placeholder="@el-teu-usuari" required>
                        </div>
                        <div class="field full">
                            <label for="email">Correu electrònic</label>
                            <input type="email" id="email" name="email" placeholder="el-teu@correu.com" required>
                        </div>
                        <div class="field">
                            <label for="password">Contrasenya</label>
                            <input type="password" id="password" name="password" placeholder="Mínim 8 caràcters" required>
                        </div>
                        <div class="field">
                            <label for="password_confirm">Repetir contrasenya</label>
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="Repeteix la contrasenya" required>
                        </div>
                        <div class="field">
                            <label for="data_naixement">Data de naixement</label>
                            <input type="date" id="data_naixement" name="data_naixement" required>
                        </div>
                        <div class="field">
                            <label for="club">Club (opcional)</label>
                            <input type="text" id="club" name="club" placeholder="El teu club d'atletisme">
                        </div>
                        <div class="field full">
                            <label class="check" for="terms">
                                <input type="checkbox" id="terms" name="terms" required>
                                <span>Accepto els <a href="#">termes i condicions</a> i la <a href="#">política de
                                        privacitat</a> d'AthNet.</span>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="button primary fit">Crear Compte</button>
                </form>

                <div class="form-foot">
                    <p>Ja tens compte? <a href="login.php">Inicia sessió</a></p>
                </div>
            </article>
        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <a href="index.php" class="brand"><img src="images/logo.jfif" alt="AthNet"></a>
                <header>
                    <h2>Uneix-te a la sortida</h2>
                    <p>La comunitat d'atletisme més gran t'espera per compartir el teu progrés</p>
                </header>
            </section>

            <section>
                <h2>Què hi trobaràs</h2>
                <ul class="posts">
                    <li>
                        <span class="avatar" aria-hidden="true">🏃</span>
                        <p><strong>Entrenaments</strong> Registra temps, distàncies i marques personals.</p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">📅</span>
                        <p><strong>Competicions</strong> Inscriu-te a les properes proves.</p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">🏆</span>
                        <p><strong>Classificacions</strong> Competeix amb altres atletes.</p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">👥</span>
                        <p><strong>Comunitat</strong> Connecta amb corredors i clubs.</p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">📊</span>
                        <p><strong>Estadístiques</strong> Consulta l'evolució del teu rendiment.</p>
                    </li>
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
