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


//* EDITAR PERFIL
$router->add('/editarPerfil','controllers/editarPerfil.php');

//! MUNDIALES

//*CREAR MUNDIALES

$router->add('/crearMundial','controllers/crearMundial.php');






//!PUBLICACIONES

//*MIS PUBLICACIONES
$router->add('/misPublicaciones','controllers/misPublicaciones.php');

//*CREAR PUBLICACION
$router->add('/crearPublicacion','controllers/crearPublicacion.php');


//! SOLO SIRVE PARA HACER TEST
$router->add('/test','controllers/hola.php');
// Para métodos específicos
//$router->addRoute('GET', '/api/usuarios', 'controllers/api/users.php');

//ESTE ES SUPER IMPORTANTE PORQUE EJECTUTA EL CONTROLADOR SEGUN LA URL
$router->dispatch($_SERVER['REQUEST_URI']);


?>