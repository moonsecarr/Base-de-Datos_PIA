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
    $Titulo = trim($_POST['input_TituloMundial']);
    $Descripcion = $_POST['input_DesMundial'];
    $Year = $_POST['input_YearMundial'];
    $Campeon = $_POST['input_Campeon'];
    $Subcampeon = $_POST['input_Subcampeon'];
    $MayorGoleador = $_POST['input_MayorGoleador'];
    $MVP = $_POST['input_MVP'];

    // Validaciones básicas
    if (
        empty($Titulo) || empty($Descripcion) || empty($Year) || empty($Campeon) ||
        empty($Subcampeon) || empty($MayorGoleador) | empty($MVP) 
    ) {
        echo json_encode([
            "status" => "error",
            "message" => "Todos los campos son obligatorios."
        ]);
        exit;
    }

      //Nombre completo

    $soloLetrasYEspacios = "/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/";

    if (!preg_match($soloLetrasYEspacios, $Titulo)) {
        echo json_encode([
            "status" => "error",
            "message" => "El titulo solo puede contener letras y espacios."
        ]);
        exit;
    }

    //!Multimedia
    $Multimedia = null;
    
    //*isset --> Verifica si la variable está declarada y si tiene un valor distinto de null.
    if (isset($_FILES['CargarMultimedia'])) {
        $archivo = $_FILES['CargarMultimedia'];

        //*Aqui  vamos a hacer dos tipos de variables para distinguir la extension de video e imagenes
        $tipos_permitidos = [
        'image/jpeg','image/png','image/gif',
        'video/mp4','video/avi','video/mpeg','video/quicktime'
        ];
        $extensiones_permitidas = [
        'jpg','jpeg','png','gif',
        'mp4','avi','mpeg','mov'
        ];

        $file_extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
        $file_type = $archivo['type'];

        if (in_array($file_type, $tipos_permitidos) && in_array($file_extension, $extensiones_permitidas)) {
            $max_size = 20 * 1024 * 1024; // 20MB
            if ($archivo['size'] <= $max_size) {
                if (strpos($file_type, 'image/') === 0) {
                    //*Validar imagen
                    if (!@getimagesize($archivo['tmp_name'])) {
                        echo json_encode(["status" => "error", "message" => "El archivo no es una imagen válida."]);
                        exit;
                    }
                }
                //*AQUI GUARDA EN BLOB 
                $Multimedia = file_get_contents($archivo['tmp_name']);
            } else {
                echo json_encode(["status" => "error", "message" => "El archivo supera el tamaño máximo permitido."]);
                exit;
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Formato no permitido."]);
            exit;
        }
    }

    try {

        $sql = "CALL sp_mundial(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [
            1,
            null,
            $Multimedia,
            $Titulo,
            $Year,
            $Descripcion,
            $Campeon,
            $Subcampeon,
            $MayorGoleador,
            $MVP,
            NULL
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
        $page = 'crearMundiales';   
        require 'views/administrador/crearMundial.view.php';  

        exit();
    }
}