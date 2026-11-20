<?php

include("config/config.php");
$calendari = Get_Calendar();
$any = isset($_GET['any']) ? (int) $_GET['any'] : (int) date('Y');
if ($any < 2000 || $any > 2100)
    $any = (int) date('Y');
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Calendari</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;800;900&family=Source+Sans+3:wght@400;600&display=swap">
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
                <p>Totes les proves de la temporada <?php echo $any ?></p>
                <form method="get" class="year-filter">
                    <div class=" filters" aria-label="Filtra per tipus">
                        <label for="any">Any:</label>
                        <select name="any" id="any" onchange="this.form.submit()">
                            <?php for ($a = (int) date('Y') - 2; $a <= (int) date('Y') + 1; $a++): ?>
                                <option value="<?php echo $a ?>" <?php if ($a === $any)
                                       echo 'selected' ?>><?php echo $a ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <!-- Filtres per tipus de prova -->
                    <div class="actions filters" aria-label="Filtra per tipus">
                        <button name="tipus_activitat" class="button small <?php if(!isset($_GET['tipus_activitat']) OR $_GET['tipus_activitat'] == 'Totes'){echo "primary";} ?>" onclick="this.form.submit()"
                            value="Totes">Totes</button>
                        <button name="tipus_activitat" class="button small <?php if(isset($_GET['tipus_activitat']) AND $_GET['tipus_activitat'] == 'Ruta'){echo "primary";} ?>" onclick="this.form.submit()"
                            value="Ruta">Ruta</button>
                        <button name="tipus_activitat" class="button small <?php if(isset($_GET['tipus_activitat']) AND $_GET['tipus_activitat'] == 'Pista'){echo "primary";} ?>" onclick="this.form.submit()"
                            value="Pista">Pista</button>
                        <button name="tipus_activitat" class="button small <?php if(isset($_GET['tipus_activitat']) AND $_GET['tipus_activitat'] == 'Cros'){echo "primary";} ?>" onclick="this.form.submit()"
                            value="Cros">Cros (XC)</button>
                        <button name="tipus_activitat" class="button small <?php if(isset($_GET['tipus_activitat']) AND $_GET['tipus_activitat'] == 'Trail'){echo "primary";} ?>" onclick="this.form.submit()"
                            value="Trail">Trail</button>
                    </div>
                </form>
            </div>


    <!-- Un article per mes -->

    <?php
    for ($i = 1; $i <= 12; $i++):
        if ($_GET['tipus_activitat'] == "Totes"){
            $month_calendar = Get_CalendarByMonthAll($i, $any);
        } else {
            $month_calendar = Get_CalendarByMonth($i, $any, $_GET['tipus_activitat']);
        }
        $CALENDAR_LIB = [
            1 => 'Gener',
            2 => 'Febrer',
            3 => 'Març',
            4 => 'Abril',
            5 => 'Maig',
            6 => 'Juny',
            7 => 'Juliol',
            8 => 'Agost',
            9 => 'Septembre',
            10 => 'Ocutbre',
            11 => 'Novembre',
            12 => 'Desembre'
        ];
        ?>
        <article class="post">
            <header>
                <div class="title">
                    <h2><?php echo "$CALENDAR_LIB[$i] $any" ?> </h2>
                </div>
                <div class="meta">
                    <span class="published"></span>
                    <span class="author"><span class="name">Inscripcions <b>Obertes</b></span></span>
                </div>
            </header>
            <div class="activity-list">
                <?php if (empty($month_calendar)): ?>
                    <p class="no-activities">No hi ha activitats aquest mes.</p>
                <?php endif; ?>
                <?php foreach ($month_calendar ?: [] as $competicio): ?>
                    <div class="activity race">
                        <div class="event-date-mini">
                            <span class="day"><?php echo $competicio['dia'] ?></span>
                            <span class="month"><?php echo strtoupper(mb_substr($CALENDAR_LIB[$i], 0, 3)) ?></span>
                        </div>
                        <div class="body">
                            <strong><?php echo $competicio['nom'] ?></strong>
                            <span><?php echo $competicio['ubicacio'] ?> · <?php echo $competicio['hora'] . ":00" ?> ·
                                <?php echo $competicio['distancia_km'] ?> km</span>
                        </div>
                        <span class="tag"><?php echo $competicio['tipus'] ?></span>
                        <a href="#" class="button small primary">Inscriu-me</a>
                    </div>
                <?php endforeach; ?>

            </div>
        </article>
    <?php endfor ?>
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