<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Classificació</title>
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
                <li><a href="classificacio.php" class="active">Classificació</a></li>
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
                <h2>Classificació</h2>
                <p>El rànquing de la temporada 2026</p>
            </div>

            <!-- Filtres per criteri -->
            <div class="actions filters" aria-label="Ordena la classificació">
                <a href="#" class="button small primary">Quilòmetres</a>
                <a href="#" class="button small">Activitats</a>
                <a href="#" class="button small">Millor 10K</a>
                <a href="#" class="button small">Clubs</a>
            </div>

            <article class="post">
                <header>
                    <div class="title">
                        <h2>Rànquing general</h2>
                        <p>Quilòmetres acumulats per atleta</p>
                    </div>
                    <div class="meta">
                        <span class="published">Temporada 2026</span>
                        <span class="author"><span class="name">Actualitzat <b>15/11/2026</b></span></span>
                    </div>
                </header>

                <!-- Podi: els carrers 1, 2 i 3 -->
                <ul class="lanes" aria-label="Podi">
                    <li><b>1.482 km</b> Marc García</li>
                    <li><b>1.397 km</b> Anna Serra</li>
                    <li><b>1.310 km</b> Joan Roca</li>
                </ul>

                <div class="table-wrap" style="margin-top: 0;">
                    <table class="data">
                        <thead>
                            <tr>
                                <th class="pos">Pos.</th>
                                <th>Atleta</th>
                                <th class="hide-sm">Club</th>
                                <th class="num hide-sm">Activitats</th>
                                <th class="num">Km</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pos">1</td>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">MG</span>
                                        <a href="perfil_usuari.php">Marc García</a>
                                    </div>
                                </td>
                                <td class="hide-sm">Club Atletisme Tarragona</td>
                                <td class="num hide-sm">148</td>
                                <td class="num">1.482</td>
                            </tr>
                            <tr>
                                <td class="pos">2</td>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">AS</span>
                                        <a href="perfil_usuari.php">Anna Serra</a>
                                    </div>
                                </td>
                                <td class="hide-sm">Barcelona Runners</td>
                                <td class="num hide-sm">131</td>
                                <td class="num">1.397</td>
                            </tr>
                            <tr>
                                <td class="pos">3</td>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">JR</span>
                                        <a href="perfil_usuari.php">Joan Roca</a>
                                    </div>
                                </td>
                                <td class="hide-sm">Club Atletisme Tarragona</td>
                                <td class="num hide-sm">126</td>
                                <td class="num">1.310</td>
                            </tr>
                            <tr>
                                <td class="pos">4</td>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">LP</span>
                                        <a href="perfil_usuari.php">Laura Pérez</a>
                                    </div>
                                </td>
                                <td class="hide-sm">Sense club</td>
                                <td class="num hide-sm">117</td>
                                <td class="num">1.204</td>
                            </tr>
                            <tr>
                                <td class="pos">5</td>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">PV</span>
                                        <a href="perfil_usuari.php">Pau Vidal</a>
                                    </div>
                                </td>
                                <td class="hide-sm">Barcelona Runners</td>
                                <td class="num hide-sm">102</td>
                                <td class="num">1.088</td>
                            </tr>
                            <tr>
                                <td class="pos">6</td>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">CF</span>
                                        <a href="perfil_usuari.php">Clara Font</a>
                                    </div>
                                </td>
                                <td class="hide-sm">Sense club</td>
                                <td class="num hide-sm">95</td>
                                <td class="num">976</td>
                            </tr>
                            <!-- La fila de l'usuari connectat porta la classe "me" -->
                            <tr class="me">
                                <td class="pos">7</td>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">TU</span>
                                        <a href="profile.php">Tu</a>
                                    </div>
                                </td>
                                <td class="hide-sm">Club Atletisme Tarragona</td>
                                <td class="num hide-sm">88</td>
                                <td class="num">912</td>
                            </tr>
                            <tr>
                                <td class="pos">8</td>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">NB</span>
                                        <a href="perfil_usuari.php">Núria Bosch</a>
                                    </div>
                                </td>
                                <td class="hide-sm">Girona Atletisme</td>
                                <td class="num hide-sm">81</td>
                                <td class="num">845</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>

        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <a href="index.php" class="brand"><img src="images/logo.jfif" alt="AthNet"></a>
                <header>
                    <h2>Classificació</h2>
                    <p>Compara't amb la resta d'atletes de la comunitat</p>
                </header>
            </section>

            <section class="blurb">
                <h2>La teva posició</h2>
                <dl class="datalist">
                    <div>
                        <dt>Posició</dt>
                        <dd>7a de 2.512</dd>
                    </div>
                    <div>
                        <dt>Quilòmetres</dt>
                        <dd>912 km</dd>
                    </div>
                    <div>
                        <dt>Activitats</dt>
                        <dd>88</dd>
                    </div>
                    <div>
                        <dt>Fins al 6è lloc</dt>
                        <dd>64 km</dd>
                    </div>
                </dl>
            </section>

            <section>
                <h2>Millors clubs</h2>
                <ul class="posts">
                    <li>
                        <span class="avatar" aria-hidden="true">1r</span>
                        <p><strong>Club Atletisme Tarragona</strong>
                            <span class="detail">12.840 km</span>
                            <span class="when">34 atletes</span>
                        </p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">2n</span>
                        <p><strong>Barcelona Runners</strong>
                            <span class="detail">11.975 km</span>
                            <span class="when">41 atletes</span>
                        </p>
                    </li>
                    <li>
                        <span class="avatar" aria-hidden="true">3r</span>
                        <p><strong>Girona Atletisme</strong>
                            <span class="detail">8.310 km</span>
                            <span class="when">22 atletes</span>
                        </p>
                    </li>
                </ul>
            </section>

            <section class="blurb">
                <h2>Vols pujar posicions?</h2>
                <p>Cada entrenament que registres suma quilòmetres al rànquing.</p>
                <div class="actions">
                    <a href="afegir_activitat.php" class="button primary fit">Afegir activitat</a>
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
