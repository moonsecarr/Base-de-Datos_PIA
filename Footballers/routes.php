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

//!EDITAR
//* EDITAR PERFIL
$router->add('/editarPerfil','controllers/editarPerfil.php');

//!VER USUARIOS
//* PERFIL USUARIO
$router->add('/perfilUsuario','controllers/perfilUsuario.php');


//! MUNDIALES

//*CREAR MUNDIALES

$router->add('/crearMundial','controllers/crearMundial.php');

//*MAIN 
//?Esta es la pagina de los mundiales

$router->add('/main','controllers/main.php');

//*PERFIL MUNDIAL

$router->add('/perfilMundial','controllers/perfilMundial.php');



//!PUBLICACIONES

//*MIS PUBLICACIONES
$router->add('/misPublicaciones','controllers/misPublicaciones.php');


//PUBLICACIONES ADMIN
$router->add('/PublicacionesADMIN','controllers/PublicacionesADMIN.php');

//*CREAR PUBLICACION
$router->add('/crearPublicacion','controllers/crearPublicacion.php');

//*VER PUBLICACION
$router->add('/verPublicacion','controllers/verPublicacion.php');

//*REPORTES DE LIKES
$router->add('/reporteLike','controllers/reporteLike.php');

//*PUBLICACION
$router->add('/publicacion','controllers/publicacion.php');

//*REPORTES DE LIKES
$router->add('/reportesLikes','controllers/reportesLikes.php');



//! SOLO SIRVE PARA HACER TEST
$router->add('/test','controllers/hola.php');
// Para métodos específicos
//$router->addRoute('GET', '/api/usuarios', 'controllers/api/users.php');

//ESTE ES SUPER IMPORTANTE PORQUE EJECTUTA EL CONTROLADOR SEGUN LA URL
$router->dispatch($_SERVER['REQUEST_URI']);


?>