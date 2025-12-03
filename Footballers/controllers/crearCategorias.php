<?php
//TODO: Ok monse aqui literal solo copias y pegas esto y cambias nombres de variables
$page = 'crearCategorias';   //! Cambias el nombre de la page en este caso crearMundiales

$currentPage = $_SERVER['REQUEST_URI'];

require 'views/administrador/crearCategoria.view.php';  //! Aqui haces referencia a la vista de crearMundiales.view.php
