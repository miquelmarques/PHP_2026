<?php
include_once("includes/header.php");
include_once("config/config.php");

# Funció get_UserInfo
$user = get_UserInfo();
if (!$user) {
    header("Location: login.php");
    exit;
}


$nom_complet = $user['nom'] . ' ' . $user['cognoms'];
$inicials = strtoupper(mb_substr($user['nom'], 0, 1) . mb_substr($user['cognoms'], 0, 1));
$username = $user['username'];
$edat = (new DateTime($user['data_naixement']))->diff(new DateTime())->y;
$data_naix = date('d/m/Y', strtotime($user['data_naixement']));
$club = $user['nom_club'] ?? 'Sense club';
$email = $user['email'];
$rol = $user['rol'];
$data_reg = date('d/m/Y', strtotime($user['data_registre']));

# Funció get_CompetitionInfo
$comp = get_CompetitionInfo();

$km = get_SumaryActivitiesKm();
$totalActivitats=get_SumaryActivities();
$activitats = get_NewestActivites();

# PB de la competició més recent: format "5K:17:34"
$pb = get_PBActivitat();
$pb_text = 'Sense marca';
if ($pb) {
    $dist = rtrim(rtrim(number_format((float)$pb['distancia'], 2, '.', ''), '0'), '.');
    $segons = (int) $pb['durada'];
    $h = intdiv($segons, 3600);
    $m = intdiv($segons % 3600, 60);
    $s = $segons % 60;
    $temps = $h > 0 ? sprintf('%dh%02dm%02ds', $h, $m, $s) : sprintf('%dm%02ds', $m, $s);
    $pb_text = $dist . 'K:' . $temps;
}


?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Perfil</title>
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
                <li><a href="calendari.php">Calendari</a></li>
                <li><a href="resultats.php">Resultats</a></li>
                <li><a href="classificacio.php">Classificació</a></li>
            </ul>
        </nav>
        <nav class="main" aria-label="Compte">
            <ul>
                <li><a href="profile.php"><?php echo $username ?> </a></li>
            </ul>
        </nav>
    </header>

    <div id="wrapper">

        <!-- CONTINGUT PRINCIPAL -->
        <main id="main">

            <article class="post">
                <header>
                    <div class="title">
                        <h2>El teu resum</h2>
                        <p>Tot el que has corregut fins ara</p>
                    </div>
                    <div class="meta">
                        <span class="published">Usuari des del</span>
                        <span class="author"><span class="name"><b><?php echo "$data_reg" ?></b></span></span>
                    </div>
                </header>

                <ul class="lanes" aria-label="Estadístiques">
                    <li><b><?php echo "$km" ?></b> Quilòmetres</li>
                    <li><b><?php echo "$totalActivitats" ?> </b> Activitats</li>
                    <li><b><?php echo htmlspecialchars($pb_text) ?></b> Marca personal</li>
                </ul>
            </article>

            <article class="post">
                <header>
                    <div class="title">
                        <h2>Activitats recents</h2>
                        <p>Els teus últims entrenaments</p>
                    </div>
                </header>

                <div class="activity-list">
                <?php
                if (empty($activitats)) {
                    echo "<p>Encara no has afegit cap activitat.</p>";
                }
                foreach ($activitats as $a) {
                    $segons = (int) $a['durada'];
                    $h = intdiv($segons, 3600);
                    $m = intdiv($segons % 3600, 60);
                    $s = $segons % 60;
                    $temps = $h > 0 ? sprintf('%dh%02dm%02ds', $h, $m, $s) : sprintf('%dm%02ds', $m, $s);
                    $dist  = rtrim(rtrim(number_format((float) $a['distancia'], 2, '.', ''), '0'), '.');
                    $icona = $icones[$a['tipus']] ?? '🏅';
                    $data  = date('d/m/Y H:i', strtotime($a['data']));
                    ?>
                    <div class="activity">
                        <span class="icon" aria-hidden="true"><?php echo $icona ?></span>
                        <div class="body">
                            <strong><?php echo $a['tipus'] ?></strong>
                            <span><?php echo $data ?> · <?php echo $temps ?></span>
                        </div>
                        <span class="distance"><?php echo $dist ?> km</span>
                    </div>
                    <?php
                }
                ?>
                </div>

                <footer>
                    <div class="actions">
                        <a href="afegir_activitat.php" class="button primary">Afegir activitat</a>
                        <a href="xarxa.php" class="button">Veure la xarxa</a>
                    </div>
                </footer>
            </article>

        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <div class="avatar large" aria-hidden="true"><?php echo "$inicials" ?></div>
                <header>
                    <h2><?php echo "$nom_complet" ?></h2>
                    <p>@<?php echo "$username" ?></p>
                    <span class="tag"> <?php echo "$rol" ?></span>
                </header>
                <div class="actions">
                    <a href="edit_profile.php" class="button small">Editar perfil</a>
                    <a href="logout.php" class="button small">Tancar sessió</a>
                </div>
            </section>

            <section class="blurb">
                <h2>Dades personals</h2>
                <dl class="datalist">
                    <div>
                        <dt>Nom complet</dt>
                        <dd><?php echo "$nom_complet" ?></dd>
                    </div>
                    <div>
                        <dt>Nom d'usuari</dt>
                        <dd><?php echo "$username" ?></dd>
                    </div>
                    <div>
                        <dt>Correu</dt>
                        <dd><?php echo "$email" ?></dd>
                    </div>
                    <div>
                        <dt>Naixement</dt>
                        <dd><?php echo "$data_naix" ?></dd>
                    </div>
                    <div>
                        <dt>Club</dt>
                        <dd><?php echo "$club" ?></dd>
                    </div>
                    <div>
                        <dt>Rol</dt>
                        <dd><?php echo "$rol" ?></dd>
                    </div>
                </dl>
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
