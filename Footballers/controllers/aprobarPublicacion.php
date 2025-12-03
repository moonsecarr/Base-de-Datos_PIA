<?php
use Core\Database;

$config = require 'core/config.php';
$db = new Database($config);

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recuperar el idPublicacion desde POST
        $idPublicacion = $_POST['idPublicacion'] ?? null;

        if (!$idPublicacion) {
            echo json_encode([
                "status" => "error",
                "message" => "Falta el parámetro idPublicacion"
            ]);
            exit;
        }

        // Llamar al procedure con el parámetro
        $sql = "CALL aprobarPublicacion(?)";
        $stmt = $db->query($sql, [$idPublicacion]);

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
        error_log("Error en aprobarPublicacion: " . $e->getMessage());

        echo json_encode([
            "status" => "error",
            "message" => "Error del sistema. Intente más tarde."
        ]);
    }
}
