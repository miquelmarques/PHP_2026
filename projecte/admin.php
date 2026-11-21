<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthNet | Administració</title>
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
                <li><a href="admin.php" class="active">Admin</a></li>
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
                <h2>Administració</h2>
                <p>Gestiona els usuaris i les competicions d'AthNet</p>
            </div>

            <!-- Accés ràpid a cada bloc -->
            <nav class="actions filters" aria-label="Seccions d'administració">
                <a href="#usuaris" class="button small primary">Usuaris</a>
                <a href="#competicions" class="button small">Competicions</a>
                <a href="#nova-competicio" class="button small">Afegir competició</a>
            </nav>

            <!-- Missatge de resultat (el PHP hi imprimirà el text) -->
            <div class="notice success" role="status">
                <p>El rol de <b>anna.serra</b> s'ha canviat a <b>admin</b>.</p>
            </div>

            <!-- ===== USUARIS: canvi de rol ===== -->
            <article class="post" id="usuaris">
                <header>
                    <div class="title">
                        <h2>Usuaris</h2>
                        <p>Canvia el rol de cada compte</p>
                    </div>
                    <div class="meta">
                        <span class="published">128 usuaris</span>
                        <span class="author"><span class="name">Administradors <b>3</b></span></span>
                    </div>
                </header>

                <form method="get" action="admin.php#usuaris" class="admin-search">
                    <label for="cerca" class="visually-hidden">Cerca usuaris</label>
                    <input type="text" id="cerca" name="cerca" placeholder="Cerca per nom, usuari o correu">
                    <button type="submit" class="button small">Cercar</button>
                </form>

                <div class="table-wrap">
                    <table class="data admin-table">
                        <thead>
                            <tr>
                                <th>Atleta</th>
                                <th class="hide-sm">Correu</th>
                                <th class="hide-md">Club</th>
                                <th class="hide-sm">Rol actual</th>
                                <th>Nou rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">MG</span>
                                        <div>
                                            <a href="perfil_usuari.php">Marc García</a>
                                            <span class="sub">@marc.garcia</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="hide-sm">marc@athnet.cat</td>
                                <td class="hide-md">Club Atletisme Tarragona</td>
                                <td class="hide-sm"><span class="tag role-admin">Admin</span></td>
                                <td>
                                    <form method="post" action="admin.php#usuaris" class="role-form">
                                        <input type="hidden" name="accio" value="canviar_rol">
                                        <input type="hidden" name="id_usuari" value="1">
                                        <select name="rol" aria-label="Nou rol de Marc García">
                                            <option value="usuari">Usuari</option>
                                            <option value="admin" selected>Admin</option>
                                        </select>
                                        <button type="submit" class="button small">Desar</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">AS</span>
                                        <div>
                                            <a href="perfil_usuari.php">Anna Serra</a>
                                            <span class="sub">@anna.serra</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="hide-sm">anna@athnet.cat</td>
                                <td class="hide-md">CA Girona</td>
                                <td class="hide-sm"><span class="tag role-admin">Admin</span></td>
                                <td>
                                    <form method="post" action="admin.php#usuaris" class="role-form">
                                        <input type="hidden" name="accio" value="canviar_rol">
                                        <input type="hidden" name="id_usuari" value="2">
                                        <select name="rol" aria-label="Nou rol d'Anna Serra">
                                            <option value="usuari">Usuari</option>
                                            <option value="admin" selected>Admin</option>
                                        </select>
                                        <button type="submit" class="button small">Desar</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">JR</span>
                                        <div>
                                            <a href="perfil_usuari.php">Joan Roca</a>
                                            <span class="sub">@joan.roca</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="hide-sm">joan@athnet.cat</td>
                                <td class="hide-md">Run Club Reus</td>
                                <td class="hide-sm"><span class="tag role-user">Usuari</span></td>
                                <td>
                                    <form method="post" action="admin.php#usuaris" class="role-form">
                                        <input type="hidden" name="accio" value="canviar_rol">
                                        <input type="hidden" name="id_usuari" value="3">
                                        <select name="rol" aria-label="Nou rol de Joan Roca">
                                            <option value="usuari" selected>Usuari</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <button type="submit" class="button small">Desar</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="athlete">
                                        <span class="avatar" aria-hidden="true">LP</span>
                                        <div>
                                            <a href="perfil_usuari.php">Laia Puig</a>
                                            <span class="sub">@laia.puig</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="hide-sm">laia@athnet.cat</td>
                                <td class="hide-md">—</td>
                                <td class="hide-sm"><span class="tag role-user">Usuari</span></td>
                                <td>
                                    <form method="post" action="admin.php#usuaris" class="role-form">
                                        <input type="hidden" name="accio" value="canviar_rol">
                                        <input type="hidden" name="id_usuari" value="4">
                                        <select name="rol" aria-label="Nou rol de Laia Puig">
                                            <option value="usuari" selected>Usuari</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <button type="submit" class="button small">Desar</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>

            <!-- ===== COMPETICIONS: modificar i eliminar ===== -->
            <article class="post" id="competicions">
                <header>
                    <div class="title">
                        <h2>Competicions</h2>
                        <p>Modifica o elimina les proves del calendari</p>
                    </div>
                    <div class="meta">
                        <span class="published">Temporada 2026</span>
                        <span class="author"><span class="name">Proves <b>24</b></span></span>
                    </div>
                </header>

                <div class="table-wrap">
                    <table class="data admin-table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Prova</th>
                                <th class="hide-sm">Tipus</th>
                                <th class="num hide-sm">Km</th>
                                <th class="num">Accions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="editing">
                                <td class="date-cell">22/11/2026<span class="sub">09:00</span></td>
                                <td>
                                    <strong>Mitja Marató de Barcelona</strong>
                                    <span class="sub">Barcelona</span>
                                </td>
                                <td class="hide-sm"><span class="tag">Ruta</span></td>
                                <td class="num hide-sm">21,10</td>
                                <td class="num">
                                    <div class="row-actions">
                                        <a href="admin.php?editar=1#editar-competicio" class="button small primary">Editant</a>
                                        <form method="post" action="admin.php#competicions">
                                            <input type="hidden" name="accio" value="eliminar_competicio">
                                            <input type="hidden" name="id_competicio" value="1">
                                            <button type="submit" class="button small danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="date-cell">06/12/2026<span class="sub">10:00</span></td>
                                <td>
                                    <strong>10K de Girona</strong>
                                    <span class="sub">Girona</span>
                                </td>
                                <td class="hide-sm"><span class="tag">Ruta</span></td>
                                <td class="num hide-sm">10,00</td>
                                <td class="num">
                                    <div class="row-actions">
                                        <a href="admin.php?editar=2#editar-competicio" class="button small">Editar</a>
                                        <form method="post" action="admin.php#competicions">
                                            <input type="hidden" name="accio" value="eliminar_competicio">
                                            <input type="hidden" name="id_competicio" value="2">
                                            <button type="submit" class="button small danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="date-cell">13/12/2026<span class="sub">08:30</span></td>
                                <td>
                                    <strong>Trail del Montseny</strong>
                                    <span class="sub">Sant Celoni</span>
                                </td>
                                <td class="hide-sm"><span class="tag">Trail</span></td>
                                <td class="num hide-sm">27,50</td>
                                <td class="num">
                                    <div class="row-actions">
                                        <a href="admin.php?editar=3#editar-competicio" class="button small">Editar</a>
                                        <form method="post" action="admin.php#competicions">
                                            <input type="hidden" name="accio" value="eliminar_competicio">
                                            <input type="hidden" name="id_competicio" value="3">
                                            <button type="submit" class="button small danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="date-cell">10/01/2027<span class="sub">11:00</span></td>
                                <td>
                                    <strong>Cros de Granollers</strong>
                                    <span class="sub">Granollers</span>
                                </td>
                                <td class="hide-sm"><span class="tag">Cros</span></td>
                                <td class="num hide-sm">8,00</td>
                                <td class="num">
                                    <div class="row-actions">
                                        <a href="admin.php?editar=4#editar-competicio" class="button small">Editar</a>
                                        <form method="post" action="admin.php#competicions">
                                            <input type="hidden" name="accio" value="eliminar_competicio">
                                            <input type="hidden" name="id_competicio" value="4">
                                            <button type="submit" class="button small danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>

            <!-- ===== EDITAR COMPETICIÓ (apareix quan es clica "Editar") ===== -->
            <article class="post edit-panel" id="editar-competicio">
                <header>
                    <div class="title">
                        <h2>Modificar competició</h2>
                        <p>Mitja Marató de Barcelona</p>
                    </div>
                    <div class="meta">
                        <span class="published">ID #1</span>
                    </div>
                </header>

                <form method="post" action="admin.php#competicions">
                    <input type="hidden" name="accio" value="modificar_competicio">
                    <input type="hidden" name="id_competicio" value="1">
                    <div class="fields">
                        <div class="field full">
                            <label for="edit-nom">Nom de la prova</label>
                            <input type="text" id="edit-nom" name="nom" maxlength="150" value="Mitja Marató de Barcelona" required>
                        </div>
                        <div class="field">
                            <label for="edit-data">Data i hora</label>
                            <input type="datetime-local" id="edit-data" name="data" value="2026-11-22T09:00" required>
                        </div>
                        <div class="field">
                            <label for="edit-ubicacio">Ubicació</label>
                            <input type="text" id="edit-ubicacio" name="ubicacio" maxlength="150" value="Barcelona">
                        </div>
                        <div class="field">
                            <label for="edit-distancia">Distància (km)</label>
                            <input type="number" id="edit-distancia" name="distancia_km" min="0" step="0.01" value="21.10">
                        </div>
                        <div class="field">
                            <label for="edit-tipus">Tipus</label>
                            <select id="edit-tipus" name="tipus" required>
                                <option value="Ruta" selected>Ruta</option>
                                <option value="Pista">Pista</option>
                                <option value="Cros">Cros (XC)</option>
                                <option value="Trail">Trail</option>
                            </select>
                        </div>
                    </div>

                    <div class="actions">
                        <button type="submit" class="button primary">Desar canvis</button>
                        <a href="admin.php#competicions" class="button">Cancel·lar</a>
                    </div>
                </form>
            </article>

            <!-- ===== AFEGIR COMPETICIÓ ===== -->
            <article class="post" id="nova-competicio">
                <header>
                    <div class="title">
                        <h2>Afegir competició</h2>
                        <p>Publica una prova nova al calendari</p>
                    </div>
                </header>

                <form method="post" action="admin.php#competicions">
                    <input type="hidden" name="accio" value="afegir_competicio">
                    <div class="fields">
                        <div class="field full">
                            <label for="nou-nom">Nom de la prova</label>
                            <input type="text" id="nou-nom" name="nom" maxlength="150" placeholder="p. ex. Cursa de la Mercè" required>
                        </div>
                        <div class="field">
                            <label for="nou-data">Data i hora</label>
                            <input type="datetime-local" id="nou-data" name="data" required>
                        </div>
                        <div class="field">
                            <label for="nou-ubicacio">Ubicació</label>
                            <input type="text" id="nou-ubicacio" name="ubicacio" maxlength="150" placeholder="p. ex. Barcelona">
                        </div>
                        <div class="field">
                            <label for="nou-distancia">Distància (km)</label>
                            <input type="number" id="nou-distancia" name="distancia_km" min="0" step="0.01" placeholder="p. ex. 10">
                        </div>
                        <div class="field">
                            <label for="nou-tipus">Tipus</label>
                            <select id="nou-tipus" name="tipus" required>
                                <option value="Ruta">Ruta</option>
                                <option value="Pista">Pista</option>
                                <option value="Cros">Cros (XC)</option>
                                <option value="Trail">Trail</option>
                            </select>
                        </div>
                    </div>

                    <div class="actions">
                        <button type="submit" class="button primary">Afegir competició</button>
                        <button type="reset" class="button">Netejar</button>
                    </div>
                </form>
            </article>

        </main>

        <!-- BARRA LATERAL -->
        <section id="sidebar">

            <section id="intro">
                <a href="index.php" class="brand"><img src="images/logo.jfif" alt="AthNet"></a>
                <header>
                    <h2>Panell d'admin</h2>
                    <p>Rols, competicions i calendari en un sol lloc</p>
                </header>
                <span class="tag role-admin">Administrador</span>
            </section>

            <section>
                <h2>Resum</h2>
                <dl class="datalist">
                    <div>
                        <dt>Usuaris</dt>
                        <dd>128</dd>
                    </div>
                    <div>
                        <dt>Administradors</dt>
                        <dd>3</dd>
                    </div>
                    <div>
                        <dt>Competicions</dt>
                        <dd>24</dd>
                    </div>
                    <div>
                        <dt>Inscripcions</dt>
                        <dd>412</dd>
                    </div>
                </dl>
            </section>

            <section class="blurb">
                <h2>Abans d'eliminar</h2>
                <p>Eliminar una competició també esborra totes les seves inscripcions. Aquesta acció no es pot desfer.</p>
                <div class="actions stacked">
                    <a href="calendari.php" class="button fit">Veure el calendari</a>
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
