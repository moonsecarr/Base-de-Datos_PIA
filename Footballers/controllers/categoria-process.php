<?php

use Core\Database;
// Incluir la configuración y la clase Database
$config = require 'core/config.php';

// Crear instancia de la base de datos
$db = new Database($config);

//*Es la cabecera para lod json 
header('Content-Type: application/json; charset=utf-8');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //!   MUCHO OJO ES EL NAME JAJAJA
    $categoria = trim($_POST['input_newCat']);
    


    // Validaciones básicas
    if ( empty($categoria)
    ) {
        echo json_encode([
            "status" => "error",
            "message" => "Todos los campos son obligatorios."
        ]);
        exit;
    }

    //Categoria

    $soloLetrasYEspacios = "/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/";

    if (!preg_match($soloLetrasYEspacios, $categoria)) {
        echo json_encode([
            "status" => "error",
            "message" => "La categoria   solo puede contener letras y espacios."
        ]);
        exit;
    }

  
    try {

        $sql = "CALL sp_categoria(?, ?, ?, ?)";
        $params = [
            1,
            null,
            $categoria,
            null
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