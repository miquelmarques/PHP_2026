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
    <link rel="stylesheet" href="css/style.css">
    <style>
        .feed-page {
            max-width: 680px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .feed-page h2 {
            color: var(--primary-blue);
            margin-bottom: 20px;
        }

        .post {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
            margin-bottom: 20px;
        }

        .post-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .post-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--primary-orange);
            color: #fff;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .post-author strong {
            display: block;
            color: var(--primary-blue);
        }

        .post-author small {
            color: #888;
        }

        .post-body {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px;
            background: var(--bg-color);
            border-radius: 10px;
            border-left: 4px solid var(--primary-orange);
        }

        .post-icon {
            font-size: 1.6rem;
        }

        .post-data {
            flex: 1;
        }

        .post-data strong {
            display: block;
            color: var(--primary-blue);
        }

        .post-data .post-meta {
            font-size: 0.85rem;
            color: #888;
            margin-top: 2px;
        }

        .post-badge {
            background: rgba(234, 107, 36, 0.12);
            color: var(--primary-orange);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .empty {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>

    <header>
        <div class="header-container">
            <div class="logo">
                <img src="images/logo.jfif" alt="AthNet Logo">
                <h1>AthNet</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inici</a></li>
                    <li><a href="xarxa.php">Xarxa</a></li>
                    <li><a href="calendari.php">Calendari</a></li>
                    <li><a href="resultats.php">Resultats</a></li>
                    <li><a href="classificacio.php">Classificació</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <a href="profile.php" class="button">👤 Perfil</a>
            </div>
        </div>
    </header>

    <main class="feed-page">
        <h2>🌍 Activitats de la comunitat</h2>

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
            <div class="post">
                <div class="post-header">
                    <div class="post-avatar"><?php echo htmlspecialchars($inicials) ?></div>
                    <div class="post-author">
                        <strong><?php echo htmlspecialchars($a['nom'] . ' ' . $a['cognoms']) ?></strong>
                        <small>@<?php echo htmlspecialchars($a['username']) ?> · <?php echo date('d/m/Y H:i', strtotime($a['data'])) ?></small>
                    </div>
                </div>

                <div class="post-body">
                    <div class="post-icon"><?php echo $icona ?></div>
                    <div class="post-data">
                        <strong><?php echo htmlspecialchars($a['tipus']) ?></strong>
                        <div class="post-meta">⏱️ <?php echo $temps ?></div>
                    </div>
                    <span class="post-badge"><?php echo $dist ?> km</span>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h4>AthNet</h4>
                <p>La xarxa social per a atletes. Connecta, competeix i millora cada dia.</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 AthNet. Tots els drets reservats.</p>
        </div>
    </footer>

</body>

</html>
