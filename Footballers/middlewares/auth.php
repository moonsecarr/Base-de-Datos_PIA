<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['session_id']);
$currentUri = $_SERVER['REQUEST_URI'];

//*Este if significa si no has iniciado sesion y quieres ingresar a otra pagina que no sea inicio ,regresalo a login
if (!$isLoggedIn && $currentUri !== '/inicioSesion-process') {
    header('Location: /');
    exit();
}

//*Este if significa que si esta logueado y hace fetch a /inicioSesion-process 
//*entonces valida si es admin
//*Administrador u operador
if (
    $isLoggedIn && $currentUri === '/inicioSesion-process' 
) {
    if ($_SESSION['session_rol'] === 'Administrador') {
        header('Location: /administrador/main');
    } elseif ($_SESSION['session_rol'] === 'Operador'){
        header('Location: /operador/main');
    }
    exit();
}


