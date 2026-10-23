<?php
session_start();

if (empty($_SESSION["user"])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informació 1</title>
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
        <h1>Blog de desarrollo web</h1>
        <p class="subtitol">Bienvenido, <?= htmlspecialchars($_SESSION["user"]) ?>. Aquí encontrarás artículos sobre
            PHP, HTML y buenas prácticas.</p>

        <section class="entrada">
            <h2>Cómo funcionan las sesiones en PHP</h2>
            <p class="meta">20 de octubre de 2026 · <span class="etiqueta">PHP</span><span
                    class="etiqueta">Sesiones</span></p>
            <p>HTTP no recuerda quién eres entre una petición y otra. Las sesiones resuelven este problema guardando los
                datos del usuario en el servidor e identificándolo con una cookie.</p>
            <a class="llegir" href="pagina2.php">Leer artículo completo →</a>
        </section>

        <section class="entrada">
            <h2>Validar formularios: cliente y servidor</h2>
            <p class="meta">15 de octubre de 2026 · <span class="etiqueta">HTML</span><span
                    class="etiqueta">Seguridad</span></p>
            <p>Atributos como <code>required</code>, <code>pattern</code> o <code>minlength</code> mejoran la
                experiencia del usuario, pero nunca sustituyen la validación en el servidor: cualquiera puede saltarse
                el navegador y enviar datos directamente.</p>
        </section>

        <section class="entrada">
            <h2>Cinco hábitos para escribir código más limpio</h2>
            <p class="meta">8 de octubre de 2026 · <span class="etiqueta">Buenas prácticas</span></p>
            <p>Nombres descriptivos, funciones pequeñas, evitar repetir código con <code>include</code>, comentar el
                porqué y no el qué, y probar el código con datos incorrectos además de los correctos.</p>
        </section>
    </main>
    <footer>Blog de ejemplo · Ejercicio de sesiones en PHP</footer>
</body>

</html>