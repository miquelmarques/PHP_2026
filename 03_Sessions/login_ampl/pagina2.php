<?php
session_start();

if (empty($_SESSION["user"])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cómo funcionan las sesiones en PHP</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            color: #222;
            line-height: 1.6;
        }

        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 24px 20px 48px;
        }

        h1 {
            margin-bottom: 4px;
        }

        .subtitol {
            color: #666;
            margin-top: 0;
        }

        .entrada {
            background: #fff;
            border-radius: 8px;
            padding: 18px 22px;
            margin: 18px 0;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .12);
        }

        .entrada h2 {
            margin: 0 0 4px;
        }

        .meta {
            color: #777;
            font-size: .85rem;
            margin: 0 0 10px;
        }

        .etiqueta {
            display: inline-block;
            background: #e3eaf3;
            color: #2c3e50;
            border-radius: 12px;
            padding: 2px 10px;
            font-size: .75rem;
            margin-right: 6px;
        }

        a.llegir {
            color: #2c3e50;
            font-weight: bold;
        }

        pre {
            background: #1e1e2e;
            color: #e6e6e6;
            padding: 14px;
            border-radius: 6px;
            overflow-x: auto;
            font-size: .9rem;
        }

        article h2 {
            margin-top: 28px;
        }

        footer {
            text-align: center;
            color: #888;
            font-size: .85rem;
            padding: 20px;
        }
    </style>
</head>

<body>

    <main>
        <article class="entrada">
            <h1>Cómo funcionan las sesiones en PHP</h1>
            <p class="meta">20 de octubre de 2026 · <span class="etiqueta">PHP</span><span
                    class="etiqueta">Sesiones</span></p>

            <p>Cuando visitas una web, el navegador y el servidor intercambian peticiones independientes. El protocolo
                HTTP no tiene memoria, así que el servidor no sabe si dos peticiones vienen de la misma persona. Las
                sesiones añaden esa memoria.</p>

            <h2>1. Iniciar la sesión</h2>
            <p>Con <code>session_start()</code> PHP crea (o recupera) una sesión y envía al navegador una cookie con un
                identificador único. Los datos se guardan en el servidor, no en el navegador.</p>
            <pre>&lt;?php
session_start();
$_SESSION["usuari"] = "anna";</pre>

            <h2>2. Proteger páginas</h2>
            <p>Al principio de cada página privada se comprueba si existe el dato guardado. Si no existe, se redirige al
                login. Es lo que hace el fichero <code>comprovar.php</code> de este ejercicio.</p>
            <pre>&lt;?php
session_start();
if (empty($_SESSION["usuari"])) {
    header("Location: index.html");
    exit;
}</pre>

            <h2>3. Cerrar la sesión</h2>
            <p>Para salir se vacía <code>$_SESSION</code> y se destruye la sesión con <code>session_destroy()</code>.
                Después, el usuario ya no puede acceder a las páginas protegidas.</p>

            <h2>Buenas prácticas</h2>
            <ul>
                <li>Llama a <code>session_regenerate_id(true)</code> tras el login para evitar el robo de sesión.</li>
                <li>Escapa siempre con <code>htmlspecialchars()</code> lo que muestres en pantalla.</li>
                <li>No guardes contraseñas en la sesión.</li>
                <li>En un proyecto real, compara contraseñas con <code>password_verify()</code> y no con el propio
                    nombre de usuario.</li>
            </ul>

            <p><a class="llegir" href="pagina1.php">← Volver al blog</a></p>
        </article>
    </main>
    <footer>Blog de ejemplo · Ejercicio de sesiones en PHP</footer>
</body>

</html>