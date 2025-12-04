<?php
session_start();

use Core\Database;

// --- Configuración de Base de Datos ---

if (!isset($_SESSION['user']['idUsuario'])) {
    header('Location: /login');
    exit();
}

$userId = $_SESSION['user']['idUsuario']; // Mantener el ID por si se necesita para likes/interacción

$config = require 'core/config.php';
$db = new Database($config); 

// Consulta SQL modificada para obtener todas las publicaciones activas
$query = "
    SELECT
        P.idPublicacion,
        P.titulo,
        P.descripcion,
        P.multimedia,
        P.mime_type,
        P.estadoPublicacion,
        P.fechaElaboracion,
        U.nickname AS nombre_usuario_publi,
        U.idUsuario AS idUsuarioPublicacion -- Añadir el ID del autor por si se necesita
    FROM
        Publicacion P
    LEFT JOIN 
        Usuarios U ON P.idUsuario = U.idUsuario
    WHERE
        P.estadoPublicacion = 'Activa' -- Solo mostramos publicaciones que han sido aprobadas
    ORDER BY 
        P.fechaElaboracion DESC;
";

try {
    // Ejecutar la consulta sin vincular el ID del usuario logueado (solo se usa la restricción 'Activa')
    $publicaciones_globales = $db->query($query)->fetchAll();
    
} catch (Exception $e) {
    // Manejo de error de base de datos
    $publicaciones_globales = [];
    $error_db = "Error al obtener publicaciones: " . $e->getMessage();
}

// Cargar la vista, pasando las publicaciones obtenidas
require 'views/feedGlobal.view.php';