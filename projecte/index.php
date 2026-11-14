
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Inici</title>
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
                <li><a href="index.php" class="active">Inici</a></li>
                <li><a href="xarxa.php">Xarxa</a></li>
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
                        <h2>La xarxa social per a atletes</h2>
                        <p>Entrena, competeix i comparteix cada marca</p>
                    </div>
                    <div class="meta">
                        <span class="published">Temporada 2026</span>
                        <span class="author"><span class="name">Comunitat <b>AthNet</b></span></span>
                    </div>
                </header>

                <ul class="lanes" aria-label="La comunitat en xifres">
                    <li><b>2.5K+</b> Atletes</li>
                    <li><b>150+</b> Proves</li>
                    <li><b>50+</b> Clubs</li>
                </ul>

                <p>Connecta amb corredors, comparteix els teus entrenaments, competeix en proves i segueix el teu
                    progrés. AthNet és la comunitat d'atletisme que estaves buscant.</p>

                <footer>
                    <div class="actions">
                        <a href="xarxa.php" class="button primary">Veure la xarxa</a>
                        <a href="#features" class="button">Descobreix més</a>
                    </div>
                </footer>
            </article>

            <article class="post" id="features">
                <header>
                    <div class="title">
                        <h2>Què pots fer a AthNet?</h2>
                        <p>Tot el que necessita un atleta, en un sol lloc</p>
                    </div>
                </header>

                <ul class="features">
                    <li>
                        <span class="icon" aria-hidden="true">🏃</span>
                        <h3>Registra els teus entrenaments</h3>
                        <p>Puja els teus temps, distàncies i marques personals. Porta un seguiment complet del teu
                            progrés com a atleta.</p>
                    </li>
                    <li>
                        <span class="icon" aria-hidden="true">📅</span>
                        <h3>Calendari de competicions</h3>
                        <p>Consulta les properes proves d'atletisme, inscriu-te i no et perdis cap cursa ni
                            campionat.</p>
                    </li>
                    <li>
                        <span class="icon" aria-hidden="true">🏆</span>
                        <h3>Classificacions en viu</h3>
                        <p>Segueix les classificacions en temps real, compara els teus resultats i competeix amb
                            altres atletes.</p>
                    </li>
                    <li>
                        <span class="icon" aria-hidden="true">👥</span>
                        <h3>Connecta amb la comunitat</h3>
                        <p>Segueix altres corredors, comenta les seves marques, uneix-te a clubs i forma part d'una
                            gran comunitat.</p>
                    </li>
                    <li>
                        <span class="icon" aria-hidden="true">📊</span>
                        <h3>Estadístiques avançades</h3>
                        <p>Gràfiques del teu rendiment, comparacions per temporada i anàlisi de les teves millors
                            marques.</p>
                    </li>
                    <li>
                        <span class="icon" aria-hidden="true">📰</span>
                        <h3>Notícies d'atletisme</h3>
                        <p>Les últimes novetats del món de l'atletisme, resultats de grans competicions i entrevistes
                            a atletes.</p>
                    </li>
                </ul>
            </article>

        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <a href="index.php" class="brand"><img src="images/logo.jfif" alt="AthNet"></a>
                <header>
                    <h2>Corre amb nosaltres</h2>
                    <p>Connecta, competeix i millora cada dia</p>
                </header>
            </section>

            <section>
                <h2>Properes proves</h2>
                <div class="mini-posts">
                    <article class="mini-post">
                        <div class="date"><b>15</b><span>Nov</span></div>
                        <header>
                            <h3>Mitja Marató de Barcelona</h3>
                            <p>Barcelona · 21,1 km · Ruta</p>
                            <a href="#" class="more">Inscriu-te</a>
                        </header>
                    </article>
                    <article class="mini-post">
                        <div class="date"><b>22</b><span>Nov</span></div>
                        <header>
                            <h3>Campionat Provincial de Cros</h3>
                            <p>Tarragona · 8 km · Cros</p>
                            <a href="#" class="more">Inscriu-te</a>
                        </header>
                    </article>
                    <article class="mini-post">
                        <div class="date"><b>06</b><span>Des</span></div>
                        <header>
                            <h3>Meeting de Pista Coberta</h3>
                            <p>Sabadell · Múltiples proves · Pista</p>
                            <a href="#" class="more">Inscriu-te</a>
                        </header>
                    </article>
                </div>
            </section>

            <section>
                <h2>Activitat recent</h2>
                <ul class="posts">
                    <li>
                        <span class="avatar" aria-hidden="true">MG</span>
                        <p><strong>Marc García</strong> ha registrat una nova marca personal
                            <span class="detail">10K en 38:42</span>
                            <span class="when">Fa 2 hores</span>
                        </p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">LP</span>
                        <p><strong>Laura Pérez</strong> s'ha inscrit a una prova
                            <span class="detail">Mitja Marató de Barcelona · 15 Nov</span>
                            <span class="when">Fa 4 hores</span>
                        </p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">JR</span>
                        <p><strong>Joan Roca</strong> s'ha unit al club
                            <span class="detail">Club Atletisme Tarragona</span>
                            <span class="when">Fa 6 hores</span>
                        </p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">AS</span>
                        <p><strong>Anna Serra</strong> ha compartit un entrenament
                            <span class="detail">Intervals 8x400m · Temps mitjà: 1:18</span>
                            <span class="when">Ahir</span>
                        </p>
                    </li>
                </ul>
            </section>

            <section class="blurb">
                <h2>Preparat per córrer?</h2>
                <p>Registra el teu proper entrenament i comparteix-lo amb la comunitat d'atletisme més gran.</p>
                <div class="actions">
                    <a href="afegir_activitat.php" class="button primary fit">Afegir activitat</a>
                </div>
            </section>

            <section id="footer">
                <ul class="links">
                    <li><a href="xarxa.php">Xarxa</a></li>
                    <li><a href="profile.php">Perfil</a></li>
                    <li><a href="contacte.php">Contacte</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Strava</a></li>
                </ul>
                <p class="copyright">&copy; 2026 AthNet. Tots els drets reservats.<br>
                    Disseny: <a href="https://html5up.net">HTML5 UP</a></p>
            </section>

        </section>

    </div>

</body>

</html>
