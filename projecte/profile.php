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
$inicials    = strtoupper(mb_substr($user['nom'],0,1) . mb_substr($user['cognoms'],0,1));
$username    = $user['username'];
$edat        = (new DateTime($user['data_naixement']))->diff(new DateTime())->y;
$data_naix   = date('d/m/Y', strtotime($user['data_naixement']));
$club        = $user['nom_club'] ?? 'Sense club';
$email       = $user['email'];
$rol         = $user['rol'];
$data_reg    = date('d/m/Y', strtotime($user['data_registre']));

# Funció get_CompetitionInfo
$comp = get_CompetitionInfo()



?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Perfil</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ===== PROFILE PAGE ===== */
        .profile-page {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* --- Capçalera del perfil --- */
        .profile-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #163a64 100%);
            border-radius: 16px;
            padding: 40px;
            display: flex;
            align-items: center;
            gap: 35px;
            margin-bottom: 30px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '🏃';
            position: absolute;
            right: 40px;
            top: 20px;
            font-size: 8rem;
            opacity: 0.07;
        }

        .profile-avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: var(--primary-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: 800;
            color: #fff;
            flex-shrink: 0;
            border: 4px solid rgba(255, 255, 255, 0.3);
            letter-spacing: 2px;
        }

        .profile-info h2 {
            color: #fff;
            font-size: 1.8rem;
            margin-bottom: 4px;
        }

        .profile-info .username {
            color: rgba(255, 255, 255, 0.65);
            font-size: 1rem;
            margin-bottom: 12px;
        }

        .profile-info .role-badge {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 0.82rem;
            font-weight: 700;
            color: #fff;
            background-color: var(--primary-orange);
            margin-bottom: 14px;
        }

        .profile-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            font-size: 0.88rem;
            color: rgba(255, 255, 255, 0.75);
        }

        .profile-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .profile-actions {
            margin-left: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-logout {
            padding: 10px 22px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            text-align: center;
            transition: background 0.3s;
            text-decoration: none;
        }

        .btn-logout:hover {
            background: rgba(255, 255, 255, 0.22);
            color: #fff;
        }

        /* --- Grid principal --- */
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 25px;
        }

        /* --- Targetes --- */
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
            margin-bottom: 25px;
        }

        .card:last-child {
            margin-bottom: 0;
        }

        .card h3 {
            font-size: 1.1rem;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--primary-orange);
            color: var(--primary-blue);
        }

        /* --- Dades personals --- */
        .data-row {
            display: flex;
            flex-direction: column;
            margin-bottom: 16px;
        }

        .data-row:last-child {
            margin-bottom: 0;
        }

        .data-row label {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #aaa;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .data-row span {
            font-size: 0.95rem;
            color: var(--text-color);
            font-weight: 500;
        }

        /* --- Activitats --- */
        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px;
            background: var(--bg-color);
            border-radius: 10px;
            border-left: 4px solid var(--primary-orange);
            margin-bottom: 12px;
        }

        .activity-item:last-child {
            margin-bottom: 0;
        }

        .activity-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .activity-data {
            flex: 1;
        }

        .activity-data strong {
            display: block;
            color: var(--primary-blue);
            font-size: 0.95rem;
        }

        .activity-data .activity-meta {
            font-size: 0.82rem;
            color: #888;
            margin-top: 2px;
        }

        .activity-badge {
            background: rgba(234, 107, 36, 0.12);
            color: var(--primary-orange);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            white-space: nowrap;
        }

        /* --- Inscripcions --- */
        .event-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px;
            background: var(--bg-color);
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .event-item:last-child {
            margin-bottom: 0;
        }

        .event-date-mini {
            background: var(--primary-blue);
            color: #fff;
            border-radius: 8px;
            padding: 10px 12px;
            text-align: center;
            min-width: 55px;
            flex-shrink: 0;
        }

        .event-date-mini .day {
            display: block;
            font-size: 1.2rem;
            font-weight: 800;
            line-height: 1;
        }

        .event-date-mini .month {
            display: block;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
            margin-top: 2px;
        }

        .event-name {
            font-weight: 600;
            color: var(--primary-blue);
            font-size: 0.95rem;
        }

        .event-loc {
            font-size: 0.82rem;
            color: #888;
            margin-top: 2px;
        }

        /* --- Responsive --- */
        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-actions {
                margin-left: 0;
                flex-direction: row;
            }

            .profile-meta {
                justify-content: center;
            }

            .profile-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER NAV -->
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
                <a href="profile.php" class="button">👤 <?php echo $username ?> </a>
            </div>
        </div>
    </header>

    <!-- PERFIL -->
    <main class="profile-page">

        <!-- Capçalera del perfil -->
        <div class="profile-header">
            <div class="profile-avatar"><?php echo "$inicials" ?></div>

            <div class="profile-info">
            <h2><?php echo "$nom_complet"?></h2>
                <p class="username">@<?php echo "$username"?></p>
                <span class="role-badge"> <?php echo "$rol"?></span>
                <div class="profile-meta">
                    <span>📧 <?php echo "$email"?></span>
                    <span>🎂 <?php echo "$edat"?> anys</span>
                    <span>🏟️ <?php echo "$data_naix"?></span>
                    <span>📅 Usuari des del: <?php echo "$data_reg" ?></span>
                </div>
            </div>

            <div class="profile-actions">
                <a href="edit_profile.php" class="button">✏️ Editar perfil</a>
                <a href="logout.php" class="btn-logout">🚪 Tancar sessió</a>
            </div>
        </div>

        <!-- Grid de contingut -->
        <div class="profile-grid">

            <!-- Columna esquerra -->
            <div>
                <!-- Dades personals -->
                <div class="card">
                    <h3>📋 Dades personals</h3>
                    <div class="data-row">
                        <label>Nom complet</label>
                        <span><?php echo "$nom_complet"?></span>
                    </div>
                    <div class="data-row">
                        <label>Nom d'usuari</label>
                        <span>@<?php echo "$username"?></span>
                    </div>
                    <div class="data-row">
                        <label>Correu electrònic</label>
                        <span><?php echo "$email"?></span>
                    </div>
                    <div class="data-row">
                        <label>Data de naixement</label>
                        <span><?php echo "$data_naix"?></span>
                    </div>
                    <div class="data-row">
                        <label>Club</label>
                        <span><?php echo "$club" ?></span>
                    </div>
                    <div class="data-row">
                        <label>Rol</label>
                        <span><?php echo "$rol"?></span>
                    </div>
                </div>

                <!-- Properes inscripcions -->
                <div class="card">
                    <h3>📅 Properes proves</h3>

                    <?php 
                    #<div class="event-item">
                    #    <div class="event-date-mini">
                    #        <span class="day">15</span>
                    #        <span class="month">NOV</span>
                    #    </div>
                    #    <div>
                    #        <div class="event-name">Mitja Marató de Barcelona</div>
                    #        <div class="event-loc">📍 Barcelona · Ruta</div>
                    #    </div>
                    #</div>
                    ?>
                </div>

            <!-- Columna dreta: activitats recents -->
            <div class="card">
                <h3>🏃 Activitats recents</h3>

                <div class="activity-item">
                    <div class="activity-icon">🏃</div>
                    <div class="activity-data">
                        <strong>Córrer</strong>
                        <div class="activity-meta">📅 04/11/2026 07:30 &nbsp;·&nbsp; ⏱️ 45 min &nbsp;·&nbsp; 📏 10.2 km</div>
                    </div>
                    <span class="activity-badge">10.2 km</span>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">⛰️</div>
                    <div class="activity-data">
                        <strong>Trail</strong>
                        <div class="activity-meta">📅 02/11/2026 09:00 &nbsp;·&nbsp; ⏱️ 1h 20min &nbsp;·&nbsp; 📏 15.5 km</div>
                    </div>
                    <span class="activity-badge">15.5 km</span>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">🏃</div>
                    <div class="activity-data">
                        <strong>Córrer</strong>
                        <div class="activity-meta">📅 31/10/2026 18:00 &nbsp;·&nbsp; ⏱️ 30 min &nbsp;·&nbsp; 📏 6.0 km</div>
                    </div>
                    <span class="activity-badge">6.0 km</span>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">🚴</div>
                    <div class="activity-data">
                        <strong>Ciclisme</strong>
                        <div class="activity-meta">📅 29/10/2026 10:00 &nbsp;·&nbsp; ⏱️ 2h 0min &nbsp;·&nbsp; 📏 42.0 km</div>
                    </div>
                    <span class="activity-badge">42.0 km</span>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">🏃</div>
                    <div class="activity-data">
                        <strong>Córrer</strong>
                        <div class="activity-meta">📅 27/10/2026 07:00 &nbsp;·&nbsp; ⏱️ 55 min &nbsp;·&nbsp; 📏 12.3 km</div>
                    </div>
                    <span class="activity-badge">12.3 km</span>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h4>AthNet</h4>
                <p>La xarxa social per a atletes. Connecta, competeix i millora cada dia.</p>
            </div>
            <div class="footer-col">
                <h4>Navegació</h4>
                <ul>
                    <li><a href="index.php">Inici</a></li>
                    <li><a href="calendari.php">Calendari</a></li>
                    <li><a href="resultats.php">Resultats</a></li>
                    <li><a href="classificacio.php">Classificació</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Comunitat</h4>
                <ul>
                    <li><a href="#">Clubs</a></li>
                    <li><a href="#">Atletes</a></li>
                    <li><a href="contacte.php">Contacte</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Compte</h4>
                <ul>
                    <li><a href="profile.php">El meu perfil</a></li>
                    <li><a href="edit_profile.php">Editar perfil</a></li>
                    <li><a href="logout.php">Tancar sessió</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 AthNet. Tots els drets reservats.</p>
        </div>
    </footer>

</body>

</html>