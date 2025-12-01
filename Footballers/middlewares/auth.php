<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['session_id']);
$currentUri = $_SERVER['REQUEST_URI'];

if (!$isLoggedIn && $currentUri !== '/') {
    header('Location: /');
    exit();
}

if ($isLoggedIn && $currentUri === '/') {
    header('Location: /main');
    exit();
}
