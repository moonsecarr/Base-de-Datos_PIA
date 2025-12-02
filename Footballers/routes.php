<?php
 use Core\Router;

$router = new Router();

//TODO: AQUI VAN LAS RUTAS DE LAS PAGINAS 



//! INICIO DE SESION
/* $router->add('/', 'controllers/login.php');*/
 $router->add('/', 'controllers/inicioSesion.php');
 $router->add('/inicioSesion-process', 'controllers/inicioSesion-process.php');

//! REGISTRO
/* $router->add('/register','controllers/register.php');
 */
//*Pantalla que se va a usar
$router->add('/registro','controllers/registro.php'); 

//*PROCESA EL BACK DEL REGISTRO
/* $router->add('/register-process','controllers/register-process.php'); */
$router->add('/registro-process','controllers/registro-process.php'); 
//*ES UNA PAGINA DE CARGA PARA PERFIL
$router->add('/register-success','controllers/register-success.php');

//!EDITAR
//* EDITAR PERFIL
$router->add('/editarPerfil','controllers/editarPerfil.php');

//!VER USUARIOS
//* PERFIL USUARIO
$router->add('/perfilUsuario','controllers/perfilUsuario.php');

//!CERRAR SESION
$router->add('/logout','middlewares/logout.php');

//! MUNDIALES

//*CREAR MUNDIALES

$router->add('/crearMundial','controllers/crearMundial.php');
$router->add('/mundial-process','controllers/crearMundial-process.php');

//*MAIN 
//?Esta es la pagina de los mundiales

$router->add('/operador/main','controllers/main.php');
$router->add('/administrador/main','controllers/mainAdmin.php');

//*PERFIL MUNDIAL

$router->add('/perfilMundial','controllers/perfilMundial.php');



//!PUBLICACIONES

//*MIS PUBLICACIONES
$router->add('/misPublicaciones','controllers/misPublicaciones.php');


//!PUBLICACIONES ADMIN
$router->add('/PublicacionesADMIN','controllers/PublicacionesADMIN.php');
$router->add('/solicitudesPublicacion','controllers/solicitudPublicacion.php');

//*CREAR PUBLICACION
$router->add('/crearPublicacion','controllers/crearPublicacion.php');
$router->add('/crearPublicacion-process','controllers/crearPublicacion-process.php');

//*VER PUBLICACION
$router->add('/verPublicacion','controllers/verPublicacion.php');

//*REPORTES DE LIKES
$router->add('/reporteLike','controllers/reporteLike.php');

//*PUBLICACION
$router->add('/publicacion','controllers/publicacion.php');

//*REPORTES DE LIKES
$router->add('/reportesLikes','controllers/reportesLikes.php');


//!CATEGORIAS
$router->add('/crearCategorias','controllers/crearCategorias.php');

//! SOLO SIRVE PARA HACER TEST
$router->add('/test','controllers/hola.php');
// Para métodos específicos
//$router->addRoute('GET', '/api/usuarios', 'controllers/api/users.php');

//ESTE ES SUPER IMPORTANTE PORQUE EJECTUTA EL CONTROLADOR SEGUN LA URL
$router->dispatch($_SERVER['REQUEST_URI']);


?>