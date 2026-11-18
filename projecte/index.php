<?php
session_start();
include_once("config/config.php");
$comp = get_CompetitionInfo();
$activitats = Get_ActivitiesRecentActivities();
if(isset($_SESSION['user'])){
    $user = get_UserInfo();
    $username = $user['username'];
}

?>
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
                <?php 
                    if(isset($_SESSION['user'])){
                    echo "<li><a href='profile.php'>$username</a></li>";
                    } else {
                        echo "<li><a href='profile.php'>Perfil</a></li>";
                    }
                    ?>                
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
                    <?php
                    foreach ($comp as $c) {
                        $dia = date("d", strtotime($c['data']));
                        $mes = substr(date("F", strtotime($c['data'])), 0, 3);
                        echo "<div class='event-item'>
                            <div class='event-date-mini'>
                                <span class='day'>$dia</span>
                                <span class='month'>$mes</span>
                            </div>
                            <div>
                                <div class='event-name'>" . $c['nom'] . "</div>
                                <div class='event-loc'>" . $c['ubicacio'] . " · " . $c['tipus'] . "</div>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </section>

            <section>
                <h2>Activitat recent</h2>
                <ul class="posts">
                     <?php
                    foreach ($activitats as $a) {
                        $segons = (int) $a['durada'];
                        $h = intdiv($segons, 3600);
                        $m = intdiv($segons % 3600, 60);
                        $s = $segons % 60;
                        $temps = $h > 0 ? sprintf('%dh%02dm%02ds', $h, $m, $s) : sprintf('%dm%02ds', $m, $s);
                        $dist  = rtrim(rtrim(number_format((float) $a['distancia'], 2, '.', ''), '0'), '.');
                        $inicials = strtoupper(mb_substr($a['nom'], 0, 1) . mb_substr($a['cognoms'], 0, 1));
                        $date = strtotime($a['data']);  // Converteix string → timestamp
                        $diferencia =  time() - $date;
                        if ($diferencia < 60) {
                            $antiguitat = $diferencia . ' segons';
                        } elseif ($diferencia < 3600) {
                            $antiguitat = floor($diferencia / 60) . ' minuts';
                        } elseif ($diferencia < 86400) {
                            $antiguitat = floor($diferencia / 3600) . ' hores';
                        } else {
                            $antiguitat = floor($diferencia / 86400) . ' dies';
                        }
                        echo '<li>
                        <span class="avatar" aria-hidden="true">'.$inicials.'</span>
                        <p><strong>'.$a['nom'] . ' ' . $a['cognoms'].'</strong> ha registrat una activitat nova!
                            <span class="detail">'.$dist.' Km en '.$temps.'</span>
                            <span class="when">fa '.$antiguitat.'</span>
                        </p>
                    </li>';
                    }
                    ?>
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
