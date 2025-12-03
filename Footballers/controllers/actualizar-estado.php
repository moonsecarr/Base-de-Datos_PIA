<?php
session_start();

use Core\Database;

$config = require 'core/config.php';
$db = new Database($config);


// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idUsuario   = $_SESSION['session_id'] ?? null;
    $idCategoria = $_POST['idCategoria'] ?? null;
    $estado      = $_POST['estado'] ?? null;

    if (!$idUsuario || !$idCategoria || $estado === null) {
        echo json_encode([
            "status" => "error",
            "message" => "Datos inválidos."
        ]);
        exit;
    }

    try {




        $sql = "CALL sp_categoria(?, ?, ?, ?, ?)";
        $params = [
            2,              
            $idCategoria,   
            NULL,
            $estado,         
            $idUsuario      
        ];

        $stmt = $db->query($sql, $params);
        $out  = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        if ($out && $out['exito']) {
            echo json_encode([
                "status" => "success",
                "message" => $out['mensaje']
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => $out['mensaje'] ?? 'Error desconocido'
            ]);
        }
    } catch (Exception $e) {
        error_log("Error en registro: " . $e->getMessage());


        $error = "Error del sistema. Por favor, intente más tarde.";

        // Si quieres mostrar el error exacto solo en desarrollo:
        // $error = "Error exacto: " . htmlspecialchars($e->getMessage());

        $page = 'registro';
        require 'views/administrador/crearCategoria.view.php';
        exit();
    }
}
