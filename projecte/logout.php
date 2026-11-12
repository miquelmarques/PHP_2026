<?php
session_start();

// Només es pot tancar sessió si n'hi ha una d'iniciada
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Buidar les dades de la sessió
$_SESSION = [];

// Esborrar la cookie de sessió del navegador
session_destroy();

header("Location: login.php");
exit;
