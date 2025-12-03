<?php

require 'middlewares/auth.php';

$page = 'mainAdmin';  

$currentPage = $_SERVER['REQUEST_URI'];

require 'views/administrador/mainAdmin.view.php';  