<?php
    include_once 'includes/header.php';
?>s
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Inici</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="images/logo.jfif" alt="AthNet Logo">
                <h1>AthNet</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html" class="active">Inici</a></li>
                    <li><a href="calendari.html">Calendari</a></li>
                    <li><a href="Resultats.html">Resultats</a></li>
                    <li><a href="classificacio.html">Classificació</a></li>
                    <li><a href="contacte.html">Contacte</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <a href="login.html" class="button">Iniciar Sessió</a>
                <a href="registre.html" class="button button-secondary">Registrar-se</a>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <h2>La xarxa social per a atletes</h2>
            <p>Connecta amb corredors, comparteix els teus entrenaments, competeix en proves i segueix el teu progrés.
                AthNet és la comunitat d'atletisme que estaves buscant.</p>
            <div class="hero-buttons">
                <a href="registre.html" class="button button-large">Uneix-te ara</a>
                <a href="#features" class="button button-secondary button-large">Descobreix més</a>
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number">2.5K+</span>
                    <span class="stat-label">Atletes</span>
                </div>
                <div class="stat">
                    <span class="stat-number">150+</span>
                    <span class="stat-label">Proves</span>
                </div>
                <div class="stat">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Clubs</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section id="features" class="features">
        <h2 class="section-title">Què pots fer a AthNet?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🏃</div>
                <h3>Registra els teus entrenaments</h3>
                <p>Puja els teus temps, distàncies i marques personals. Porta un seguiment complet del teu progrés com a
                    atleta.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📅</div>
                <h3>Calendari de competicions</h3>
                <p>Consulta les properes proves d'atletisme, inscriu-te i no et perdis cap cursa ni campionat.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏆</div>
                <h3>Classificacions en viu</h3>
                <p>Segueix les classificacions en temps real, compara els teus resultats i competeix amb altres atletes.
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Connecta amb la comunitat</h3>
                <p>Segueix altres corredors, comenta les seves marques, uneix-te a clubs i forma part d'una gran
                    comunitat.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Estadístiques avançades</h3>
                <p>Gràfiques del teu rendiment, comparacions per temporada i anàlisi de les teves millors marques.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📰</div>
                <h3>Notícies d'atletisme</h3>
                <p>Les últimes novetats del món de l'atletisme, resultats de grans competicions i entrevistes a atletes.
                </p>
            </div>
        </div>
    </section>

    <!-- ÚLTIMES ACTIVITATS -->
    <section class="recent-activity">
        <h2 class="section-title">Activitat recent</h2>
        <div class="activity-feed">
            <div class="activity-card">
                <div class="activity-avatar">MG</div>
                <div class="activity-info">
                    <strong>Marc García</strong> ha registrat una nova marca personal
                    <span class="activity-detail">10K en 38:42 🔥</span>
                    <span class="activity-time">Fa 2 hores</span>
                </div>
            </div>
            <div class="activity-card">
                <div class="activity-avatar">LP</div>
                <div class="activity-info">
                    <strong>Laura Pérez</strong> s'ha inscrit a una prova
                    <span class="activity-detail">Mitja Marató de Barcelona - 15 Nov</span>
                    <span class="activity-time">Fa 4 hores</span>
                </div>
            </div>
            <div class="activity-card">
                <div class="activity-avatar">JR</div>
                <div class="activity-info">
                    <strong>Joan Roca</strong> s'ha unit al club
                    <span class="activity-detail">Club Atletisme Tarragona</span>
                    <span class="activity-time">Fa 6 hores</span>
                </div>
            </div>
            <div class="activity-card">
                <div class="activity-avatar">AS</div>
                <div class="activity-info">
                    <strong>Anna Serra</strong> ha compartit un entrenament
                    <span class="activity-detail">Intervals 8x400m - Temps mitjà: 1:18</span>
                    <span class="activity-time">Ahir</span>
                </div>
            </div>
        </div>
    </section>

    <!-- PROPERES PROVES -->
    <section class="upcoming-events">
        <h2 class="section-title">Properes proves</h2>
        <div class="events-grid">
            <div class="event-card">
                <div class="event-date">
                    <span class="event-day">15</span>
                    <span class="event-month">NOV</span>
                </div>
                <div class="event-info">
                    <h3>Mitja Marató de Barcelona</h3>
                    <p>📍 Barcelona | 21,1 km</p>
                    <span class="event-tag">Ruta</span>
                </div>
                <a href="#" class="button">Inscriu-te</a>
            </div>
            <div class="event-card">
                <div class="event-date">
                    <span class="event-day">22</span>
                    <span class="event-month">NOV</span>
                </div>
                <div class="event-info">
                    <h3>Campionat Provincial de Cros</h3>
                    <p>📍 Tarragona | 8 km</p>
                    <span class="event-tag tag-cross">Cros</span>
                </div>
                <a href="#" class="button">Inscriu-te</a>
            </div>
            <div class="event-card">
                <div class="event-date">
                    <span class="event-day">06</span>
                    <span class="event-month">DES</span>
                </div>
                <div class="event-info">
                    <h3>Meeting de Pista Coberta</h3>
                    <p>📍 Sabadell | Múltiples proves</p>
                    <span class="event-tag tag-pista">Pista</span>
                </div>
                <a href="#" class="button">Inscriu-te</a>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <h2>Preparat per córrer amb nosaltres?</h2>
        <p>Uneix-te a la comunitat d'atletisme més gran. Registra't gratis i comença a compartir les teves marques.</p>
        <a href="registre.html" class="button button-large">Crear compte gratuït</a>
    </section>

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
                    <li><a href="index.html">Inici</a></li>
                    <li><a href="calendari.html">Calendari</a></li>
                    <li><a href="Resultats.html">Resultats</a></li>
                    <li><a href="classificacio.html">Classificació</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Comunitat</h4>
                <ul>
                    <li><a href="#">Clubs</a></li>
                    <li><a href="#">Atletes</a></li>
                    <li><a href="#">Fòrums</a></li>
                    <li><a href="contacte.html">Contacte</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Segueix-nos</h4>
                <div class="social-links">
                    <a href="#">Instagram</a>
                    <a href="#">Twitter</a>
                    <a href="#">Strava</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 AthNet. Tots els drets reservats.</p>
        </div>
    </footer>

</body>

</html>