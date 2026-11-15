<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Perfil de Marc García</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;800;900&family=Source+Sans+3:wght@400;600&display=swap">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- CAPÇALERA -->
    <header id="header">
        <h1><a href="index.php"><img src="images/logo.jfif" alt="AthNet"></a></h1>
        <nav class="links" aria-label="Navegació principal">
            <ul>
                <li><a href="index.php">Inici</a></li>
                <li><a href="xarxa.php" class="active">Xarxa</a></li>
                <li><a href="calendari.php">Calendari</a></li>
                <li><a href="resultats.php">Resultats</a></li>
                <li><a href="classificacio.php">Classificació</a></li>
            </ul>
        </nav>
        <nav class="main" aria-label="Compte">
            <ul>
                <li><a href="profile.php">Perfil</a></li>
            </ul>
        </nav>
    </header>

    <div id="wrapper">

        <!-- CONTINGUT PRINCIPAL -->
        <main id="main">

            <article class="post">
                <header>
                    <div class="title">
                        <h2>Resum de Marc</h2>
                        <p>Tot el que ha corregut fins ara</p>
                    </div>
                    <div class="meta">
                        <span class="published">Usuari des del</span>
                        <span class="author"><span class="name"><b>12/03/2025</b></span></span>
                    </div>
                </header>

                <ul class="lanes" aria-label="Estadístiques">
                    <li><b>1.482</b> Quilòmetres</li>
                    <li><b>148</b> Activitats</li>
                    <li><b>10K:32m04s</b> Marca personal</li>
                </ul>
            </article>

            <article class="post">
                <header>
                    <div class="title">
                        <h2>Activitats recents</h2>
                        <p>Els seus últims entrenaments</p>
                    </div>
                </header>

                <div class="activity-list">
                    <div class="activity">
                        <span class="icon" aria-hidden="true">🏃</span>
                        <div class="body">
                            <strong>Cursa</strong>
                            <span>14/11/2026 07:30 · 48m12s</span>
                        </div>
                        <span class="distance">12 km</span>
                    </div>
                    <div class="activity">
                        <span class="icon" aria-hidden="true">⏱️</span>
                        <div class="body">
                            <strong>Sèries</strong>
                            <span>12/11/2026 18:45 · 35m40s</span>
                        </div>
                        <span class="distance">8 km</span>
                    </div>
                    <div class="activity">
                        <span class="icon" aria-hidden="true">🏅</span>
                        <div class="body">
                            <strong>Competició</strong>
                            <span>08/11/2026 10:00 · 32m04s</span>
                        </div>
                        <span class="distance">10 km</span>
                    </div>
                    <div class="activity">
                        <span class="icon" aria-hidden="true">🏃</span>
                        <div class="body">
                            <strong>Tirada llarga</strong>
                            <span>05/11/2026 08:00 · 1h38m20s</span>
                        </div>
                        <span class="distance">22.5 km</span>
                    </div>
                </div>

                <footer>
                    <div class="actions">
                        <a href="xarxa.php" class="button">Tornar a la xarxa</a>
                    </div>
                </footer>
            </article>

        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <div class="avatar large" aria-hidden="true">MG</div>
                <header>
                    <h2>Marc García</h2>
                    <p>@marcgarcia</p>
                    <span class="tag">Atleta</span>
                </header>
                <div class="actions">
                    <a href="#" class="button small primary">Seguir</a>
                    <a href="xarxa.php" class="button small">Tornar</a>
                </div>
            </section>

            <!-- Dades públiques: sense correu ni data de naixement -->
            <section class="blurb">
                <h2>Dades de l'atleta</h2>
                <dl class="datalist">
                    <div>
                        <dt>Nom complet</dt>
                        <dd>Marc García</dd>
                    </div>
                    <div>
                        <dt>Nom d'usuari</dt>
                        <dd>marcgarcia</dd>
                    </div>
                    <div>
                        <dt>Club</dt>
                        <dd>Club Atletisme Tarragona</dd>
                    </div>
                    <div>
                        <dt>Rol</dt>
                        <dd>Atleta</dd>
                    </div>
                </dl>
            </section>

            <section>
                <h2>Les seves properes proves</h2>
                <div class="mini-posts">
                    <div class="event-item">
                        <div class="event-date-mini">
                            <span class="day">22</span>
                            <span class="month">Nov</span>
                        </div>
                        <div>
                            <div class="event-name">Mitja Marató de Barcelona</div>
                            <div class="event-loc">Barcelona · Ruta</div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-date-mini">
                            <span class="day">06</span>
                            <span class="month">Des</span>
                        </div>
                        <div>
                            <div class="event-name">10K de Girona</div>
                            <div class="event-loc">Girona · Ruta</div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="footer">
                <ul class="links">
                    <li><a href="index.php">Inici</a></li>
                    <li><a href="xarxa.php">Xarxa</a></li>
                    <li><a href="contacte.php">Contacte</a></li>
                </ul>
                <p class="copyright">&copy; 2026 AthNet. Tots els drets reservats.<br>
                    Disseny: <a href="https://html5up.net">HTML5 UP</a></p>
            </section>

        </section>

    </div>

</body>

</html>
