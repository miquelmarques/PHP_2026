<?php 

    include("config/config.php");
    $calendari = Get_Calendar(); 
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Calendari</title>
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
                <li><a href="xarxa.php">Xarxa</a></li>
                <li><a href="calendari.php" class="active">Calendari</a></li>
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

            <div class="page-title">
                <h2>Calendari de competicions</h2>
                <p>Totes les proves de la temporada 2026</p>
            </div>

            <!-- Filtres per tipus de prova -->
            <div class="actions filters" aria-label="Filtra per tipus">
                <a href="#" class="button small primary">Totes</a>
                <a href="#" class="button small">Ruta</a>
                <a href="#" class="button small">Pista</a>
                <a href="#" class="button small">Cros</a>
                <a href="#" class="button small">Trail</a>
            </div>

            <!-- Un article per mes -->
             <?php
                for($i=1;$i<=12; $i++):
                    $month_calendar = Get_CalendarByMonth($i, 2026);
                    $CALENDAR_LIB= [ 
                        1 => 'Gener', 2 => 'Febrer', 3=> 'Març', 4 => 'Abril', 
                        5 => 'Maig', 6 => 'Juny', 7 => 'Juliol', 8 => 'Agost', 
                        9 => 'Septembre', 10 => 'Ocutbre', 11 => 'Novembre', 
                        12 => 'Desembre'
                    ];
                    ?>
                <article class="post">
                <header>
                    <div class="title">
                        <h2><?php echo "$CALENDAR_LIB[$i] 2026"?> </h2>
                    </div>
                    <div class="meta">
                        <span class="published"></span>
                        <span class="author"><span class="name">Inscripcions <b>Obertes</b></span></span>
                    </div>
                </header>
                <div class="activity-list">
                    <?php foreach($month_calendar as $competicio): ?>
                    <div class="activity race">
                        <div class="event-date-mini">
                            <span class="day"><?php echo $competicio['dia'] ?></span>
                            <span class="month"><?php echo strtoupper(mb_substr($CALENDAR_LIB[$i],0,3)) ?></span>
                        </div>
                        <div class="body">
                            <strong><?php echo $competicio['nom'] ?></strong>
                            <span><?php echo $competicio['ubicacio'] ?> · <?php echo $competicio['hora'] ?> · <?php echo $competicio['distancia'] ?> km</span>
                        </div>
                        <span class="tag"><?php echo $competicio['tipus'] ?></span>
                        <a href="#" class="button small primary">Inscriu-me</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </article>           
            <?php endfor ?>

            <article class="post">
                <header>
                    <div class="title">
                        <h2>Desembre 2026</h2>
                        <p>Proves del mes vinent</p>
                    </div>
                    <div class="meta">
                        <span class="published">3 proves</span>
                        <span class="author"><span class="name">Inscripcions <b>Obertes</b></span></span>
                    </div>
                </header>

                <div class="activity-list">
                    <div class="activity race">
                        <div class="event-date-mini">
                            <span class="day">06</span>
                            <span class="month">Des</span>
                        </div>
                        <div class="body">
                            <strong>10K de Girona</strong>
                            <span>Girona · 10:00 · 10 km</span>
                        </div>
                        <span class="tag">Ruta</span>
                        <a href="#" class="button small primary">Inscriu-me</a>
                    </div>

                    <div class="activity race">
                        <div class="event-date-mini">
                            <span class="day">13</span>
                            <span class="month">Des</span>
                        </div>
                        <div class="body">
                            <strong>Trail del Montseny</strong>
                            <span>Sant Celoni · 08:00 · 24 km</span>
                        </div>
                        <span class="tag">Trail</span>
                        <a href="#" class="button small primary">Inscriu-me</a>
                    </div>

                    <!-- Exemple de prova amb les inscripcions tancades -->
                    <div class="activity race closed">
                        <div class="event-date-mini">
                            <span class="day">31</span>
                            <span class="month">Des</span>
                        </div>
                        <div class="body">
                            <strong>Cursa de Sant Silvestre</strong>
                            <span>Lleida · 18:00 · 5 km</span>
                        </div>
                        <span class="tag">Ruta</span>
                        <span class="button small" aria-disabled="true">Places exhaurides</span>
                    </div>
                </div>
            </article>

        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <a href="index.php" class="brand"><img src="images/logo.jfif" alt="AthNet"></a>
                <header>
                    <h2>Calendari</h2>
                    <p>Tria la teva propera cursa i apunta-t'hi</p>
                </header>
            </section>

            <section>
                <h2>Les teves inscripcions</h2>
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
                            <span class="day">13</span>
                            <span class="month">Des</span>
                        </div>
                        <div>
                            <div class="event-name">Trail del Montseny</div>
                            <div class="event-loc">Sant Celoni · Trail</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="blurb">
                <h2>Ja has competit?</h2>
                <p>Consulta els temps de les proves acabades i mira com queda el rànquing de la temporada.</p>
                <div class="actions stacked">
                    <a href="resultats.php" class="button primary fit">Veure resultats</a>
                    <a href="classificacio.php" class="button fit">Classificació</a>
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
