<?php
 use Core\Router;

$router = new Router();

//TODO: AQUI VAN LAS RUTAS DE LAS PAGINAS 

//! INICIO DE SESION
$router->add('/', 'controllers/login.php');

//! REGISTRO
$router->add('/register','controllers/register.php');

//* MANEJA EL REGISTRO
$router->add('/register-success','controllers/register-success.php');

//* EDITAR USUARIO
$router->add('/edit','controllers/edit.php');

//! MUNDIALES

//*CREAR MUNDIALES

$router->add('/crearMundial','controllers/crearMundial.php');

//!PUBLICACIONES
$router->add('/misPublicaciones','controllers/misPublicaciones.php');

//! SOLO SIRVE PARA HACER TEST
$router->add('/test','controllers/hola.php');
// Para métodos específicos
//$router->addRoute('GET', '/api/usuarios', 'controllers/api/users.php');

//ESTE ES SUPER IMPORTANTE PORQUE EJECTUTA EL CONTROLADOR SEGUN LA URL
$router->dispatch($_SERVER['REQUEST_URI']);


?>