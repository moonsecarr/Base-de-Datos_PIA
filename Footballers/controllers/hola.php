<?php

echo "Cargando controlador hola...<br>";
$page = 'hola';

$currentPage = $_SERVER['REQUEST_URI'];

require 'views/hola.view.php';
