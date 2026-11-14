<?php
include_once("includes/header.php");
include_once("config/config.php");

$tipus_valids = ['Córrer', 'Trail', 'Ciclisme', 'Caminar'];
$error = '';

$user = get_UserInfo();
if (!$user) {
    header("Location: login.php");
    exit;
}
$username = $user['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipus = $_POST['tipus'];
    $data  = $_POST['data'];
    $dist  = str_replace(',', '.', $_POST['distancia']);
    $hores = (int) ($_POST['hores'] ?? 0);
    $min   = (int) ($_POST['minuts'] ?? 0);
    $seg   = (int) ($_POST['segons'] ?? 0);

    $durada = $hores * 3600 + $min * 60 + $seg; // es guarda en segons
    $data_sql = str_replace('T', ' ', $data) . ':00';

    if (!in_array($tipus, $tipus_valids, true)) {
        $error = "Tipus d'activitat no vàlid.";
    } elseif (!$data || strtotime($data_sql) === false) {
        $error = "Data no vàlida.";
    } elseif (!is_numeric($dist) || (float) $dist <= 0) {
        $error = "La distància ha de ser un número més gran que 0.";
    } elseif ($durada <= 0) {
        $error = "El temps ha de ser més gran que 0.";
    } else {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO activitat (id_usuari, tipus, data, durada, distancia)
             VALUES (?, ?, ?, ?, ?)");
        $distancia = round((float) $dist, 2);
        mysqli_stmt_bind_param($stmt, "issid", $_SESSION['user'], $tipus, $data_sql, $durada, $distancia);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: profile.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Afegir activitat</title>
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
                <li><a href="profile.php"><?php echo "$username"?></a></li>
            </ul>
        </nav>
    </header>

    <div id="wrapper">

        <!-- FORMULARI -->
        <main id="main" class="narrow">
            <article class="post">
                <header>
                    <div class="title">
                        <h2>Afegir activitat</h2>
                        <p>Registra un entrenament nou</p>
                    </div>
                </header>

                <form method="post" action="afegir_activitat.php">
                    <div class="fields">
                        <div class="field">
                            <label for="tipus">Tipus</label>
                            <select id="tipus" name="tipus" required>
                                <option value="Córrer">Córrer</option>
                                <option value="Trail">Trail</option>
                                <option value="Ciclisme">Ciclisme</option>
                                <option value="Caminar">Caminar</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="distancia">Distància (km)</label>
                            <input type="text" id="distancia" name="distancia" inputmode="decimal" placeholder="p. ex. 10.5" required>
                        </div>
                        <div class="field full">
                            <label for="data">Data i hora</label>
                            <input type="datetime-local" id="data" name="data" required>
                        </div>
                        <div class="field full">
                            <label for="hores">Temps</label>
                            <div class="fields triple">
                                <input type="number" id="hores" name="hores" min="0" placeholder="h" aria-label="Hores" required>
                                <input type="number" name="minuts" min="0" max="59" placeholder="min" aria-label="Minuts" required>
                                <input type="number" name="segons" min="0" max="59" placeholder="s" aria-label="Segons" required>
                            </div>
                            <p class="hint">Hores, minuts i segons. Posa 0 si no n'hi ha.</p>
                        </div>
                    </div>

                    <div class="actions">
                        <button type="submit" class="button primary">Desar</button>
                        <a href="profile.php" class="button">Cancel·lar</a>
                    </div>
                </form>
            </article>
        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <a href="index.php" class="brand"><img src="images/logo.jfif" alt="AthNet"></a>
                <header>
                    <h2>Nova marca</h2>
                    <p>Cada quilòmetre compta per al teu resum i per a la xarxa</p>
                </header>
            </section>

            <section id="footer">
                <p class="copyright">&copy; 2026 AthNet. Tots els drets reservats.<br>
                    Disseny: <a href="https://html5up.net">HTML5 UP</a></p>
            </section>

        </section>

    </div>

</body>

</html>
