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
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-page {
            max-width: 560px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .form-card {
            background: #fff;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        }

        .form-card h2 {
            color: var(--primary-blue);
            margin-bottom: 20px;
        }

        .form-card label {
            display: block;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
            font-weight: 600;
            margin: 14px 0 6px;
        }

        .form-card input,
        .form-card select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            box-sizing: border-box;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-row > div {
            flex: 1;
        }

        .form-error {
            background: #fdecea;
            color: #b3261e;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 14px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }

        .form-actions button,
        .form-actions a {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
        }

        .form-actions button {
            background: var(--primary-orange);
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-actions a {
            background: #eee;
            color: var(--primary-blue);
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
                    <li><a href="calendari.php">Calendari</a></li>
                    <li><a href="resultats.php">Resultats</a></li>
                    <li><a href="classificacio.php">Classificació</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <a href="profile.php" class="button"><?php echo "$username"?></a>
            </div>
        </div>
    </header>

    <main class="form-page">
        <div class="form-card">
            <h2> Afegir activitat</h2>
            <form method="post" action="afegir_activitat.php">
                <label for="tipus">Tipus</label>
                <select id="tipus" name="tipus" required>
                    <option value="Córrer">Córrer</option>
                    <option value="Trail">Trail</option>
                    <option value="Ciclisme">Ciclisme</option>
                    <option value="Caminar">Caminar</option>
                </select>

                <label for="data">Data i hora</label>
                <input type="datetime-local" id="data" name="data" required>

                <label for="distancia">Distància (km)</label>
                <input type="text" id="distancia" name="distancia" placeholder="p. ex. 10.5" required>

                <label>Temps</label>
                <div class="form-row">
                    <div>
                        <input type="number" name="hores" min="0" placeholder="h" required>
                    </div>
                    <div>
                        <input type="number" name="minuts" min="0" max="59" placeholder="min" required>
                    </div>
                    <div>
                        <input type="number" name="segons" min="0" max="59" placeholder="s" required>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="profile.php">Cancel·lar</a>
                    <button type="submit">Desar</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>
