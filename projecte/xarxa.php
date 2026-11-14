<?php
include_once("includes/header.php");
include_once("config/config.php");

// Activitats de la resta d'usuaris, de la més recent a la més antiga
$sql = "SELECT a.id_activitat, a.tipus, a.data, a.durada, a.distancia,
               u.nom, u.cognoms, u.username
        FROM activitat a
        JOIN usuari u ON u.id_usuari = a.id_usuari
        WHERE a.id_usuari <> ?
        ORDER BY a.data DESC
        LIMIT 50";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$activitats = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);

$icones = ['Córrer' => '🏃', 'Trail' => '⛰️', 'Ciclisme' => '🚴', 'Caminar' => '🚶'];
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Xarxa</title>
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

        <!-- FEED -->
        <main id="main">

            <div class="page-title">
                <h2>Activitats de la comunitat</h2>
                <p>El que han corregut la resta d'atletes</p>
            </div>

        <?php if (empty($activitats)): ?>
            <div class="empty">Encara no hi ha activitats d'altres atletes.</div>
        <?php endif; ?>

        <?php foreach ($activitats as $a):
            $segons = (int) $a['durada'];
            $h = intdiv($segons, 3600);
            $m = intdiv($segons % 3600, 60);
            $s = $segons % 60;
            $temps = $h > 0 ? sprintf('%dh%02dm%02ds', $h, $m, $s) : sprintf('%dm%02ds', $m, $s);
            $dist  = rtrim(rtrim(number_format((float) $a['distancia'], 2, '.', ''), '0'), '.');
            $icona = $icones[$a['tipus']] ?? '🏅';
            $inicials = strtoupper(mb_substr($a['nom'], 0, 1) . mb_substr($a['cognoms'], 0, 1));
        ?>
            <article class="post feed">
                <header>
                    <div class="title">
                        <h2><span class="icon" aria-hidden="true"><?php echo $icona ?></span><?php echo htmlspecialchars($a['tipus']) ?></h2>
                        <p><?php echo date('d/m/Y H:i', strtotime($a['data'])) ?></p>
                    </div>
                    <div class="meta">
                        <span class="author">
                            <span class="name"><b><?php echo htmlspecialchars($a['nom'] . ' ' . $a['cognoms']) ?></b>@<?php echo htmlspecialchars($a['username']) ?></span>
                            <span class="avatar" aria-hidden="true"><?php echo htmlspecialchars($inicials) ?></span>
                        </span>
                    </div>
                </header>

                <footer>
                    <span class="distance"><?php echo $dist ?> km</span>
                    <ul class="stats">
                        <li><b><?php echo $temps ?></b> Temps</li>
                    </ul>
                </footer>
            </article>
        <?php endforeach; ?>

        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <a href="index.php" class="brand"><img src="images/logo.jfif" alt="AthNet"></a>
                <header>
                    <h2>La xarxa</h2>
                    <p>Segueix els entrenaments de la comunitat, del més recent al més antic</p>
                </header>
            </section>

            <section class="blurb">
                <h2>I tu, què has corregut?</h2>
                <p>Afegeix el teu entrenament i apareixerà al feed de la resta d'atletes.</p>
                <div class="actions stacked">
                    <a href="afegir_activitat.php" class="button primary fit">Afegir activitat</a>
                    <a href="profile.php" class="button fit">El meu perfil</a>
                </div>
            </section>

            <section id="footer">
                <p class="copyright">&copy; 2026 AthNet. Tots els drets reservats.<br>
                    Disseny: <a href="https://html5up.net">HTML5 UP</a></p>
            </section>

        </section>

    </div>

</body>

</html>
