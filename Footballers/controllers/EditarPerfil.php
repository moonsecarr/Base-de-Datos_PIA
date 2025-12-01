<?php
/* session_start(); */
require 'middlewares/auth.php';

use Core\Database;

$config = require 'core/config.php';
$db = new Database($config);

$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($requestMethod === 'GET') {
    
    $page = 'editarPerfil';
    require 'views/EditarPerfil.view.php';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');

    $idUsuario = $_SESSION['session_id'];
    $nombre_completo = trim($_POST['input_NomCom']);
    $nickname = $_POST['input_NomUsu'];
    $fecha_nacimiento = $_POST['input_fechaNac'];
    $genero = $_SESSION['session_genero'];
    $rol = $_SESSION['session_rol'];
    $nacionalidad = trim($_POST['input_Nacionalidad']);
    $correo = trim($_POST['input_Correo']);
    $contraseña = $_POST['input_Contra'];
    

    // Validaciones básicas
    if (
        empty($nombre_completo) || empty($nickname) || empty($fecha_nacimiento) ||
        empty($rol) || empty($nacionalidad) || empty($correo) || empty($contraseña)
    ) {
        echo json_encode([
            "status" => "error",
            "message" => "Todos los campos son obligatorios."
        ]);
        exit;
    }

    //Nombre completo

    $soloLetrasYEspacios = "/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/";

    if (!preg_match($soloLetrasYEspacios, $nombre_completo)) {
        echo json_encode([
            "status" => "error",
            "message" => "El nombre completo solo puede contener letras y espacios."
        ]);
        exit;
    }

    //Nickname
    if (!preg_match($soloLetrasYEspacios, $nickname)) {
        echo json_encode([
            "status" => "error",
            "message" => "El nombre de usuario solo puede contener letras y espacios."
        ]);
        exit;
    }

    //Fecha de nacimiento
    if (!empty($_POST['input_fechaNac'])) {
        $fecha_nacimiento = $_POST['input_fechaNac'];

        // Convertir a objeto DateTime
        $fechaNac = new DateTime($fecha_nacimiento);
        $hoy = new DateTime();

        // Calcular diferencia en años
        $edad = $hoy->diff($fechaNac)->y;

        if ($edad < 18) {
            echo json_encode([
                "status" => "error",
                "message" => "Debes ser mayor de edad para registrarte."
            ]);
            exit;
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Debes seleccionar una fecha de nacimiento."
        ]);
        exit;
    }



     //Gentilicios
    $gentilicios = [
        'México' => ['Hombre' => 'Mexicano', 'Mujer' => 'Mexicana'],
        'Estados Unidos' => ['Hombre' => 'Estadounidense', 'Mujer' => 'Estadounidense'],
        'Canadá' => ['Hombre' => 'Canadiense', 'Mujer' => 'Canadiense'],
        'Argentina' => ['Hombre' => 'Argentino', 'Mujer' => 'Argentina'],
        'Colombia' => ['Hombre' => 'Colombiano', 'Mujer' => 'Colombiana'],
        'España' => ['Hombre' => 'Español', 'Mujer' => 'Española'],
        'Brasil' => ['Hombre' => 'Brasileño', 'Mujer' => 'Brasileña'],
        'Chile' => ['Hombre' => 'Chileno', 'Mujer' => 'Chilena'],
        'Perú' => ['Hombre' => 'Peruano', 'Mujer' => 'Peruana'],
        'Otro' => ['Hombre' => 'Otro', 'Mujer' => 'Otra']
    ];
    //Pais
    $pais = '';

     //Nacionalidad
     if ($nacionalidad === '' || empty($nacionalidad)) {
        echo json_encode([
            "status" => "error",
            "message" => "Por favor selecciona un pais."
        ]);
        exit;
    }else{

        //*Pasamos el nombre del pais a la variable $pais
        $paisSeleccionado = $nacionalidad; 
        
        $pais = $paisSeleccionado;

        // Nacionalidad = gentilicio adaptado
        if (isset($gentilicios[$paisSeleccionado])) {
            $nacionalidad = $gentilicios[$paisSeleccionado][$genero]
                ?? ($gentilicios[$paisSeleccionado]['Hombre'] ?? $paisSeleccionado);
        } else {
            $nacionalidad = $paisSeleccionado;
        }
    }

   //Foto
    if (isset($_FILES['input_Foto']) && $_FILES['input_Foto']['error'] === UPLOAD_ERR_OK) {
        $foto_blob = file_get_contents($_FILES['input_Foto']['tmp_name']);
    } elseif (!empty($_SESSION['session_foto'])) {
        $foto_blob = $_SESSION['session_foto']; // conservar la existente
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Debes tener al menos una foto de perfil."
        ]);
        exit;
    }


    try {
        $sql = "CALL sp_usuarios(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [
            2,              // opción actualizar
            $idUsuario,
            $nombre_completo,
            $fecha_nacimiento,
            $foto_blob,
            $genero,
            $pais,
            $nacionalidad,
            $correo,
            $contraseña,
            $rol,
            $nickname
        ];

        $stmt = $db->query($sql, $params);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC); // aquí ya tienes mensaje y exito
        $stmt->closeCursor();


         //*Hay que actualizar el session
        if ($resultado['exito']) {
           
            
            //*Nombre completo
             $_SESSION['session_nomCom']= $nombre_completo;
            //*Nombre de usuario
            $_SESSION['session_nickname']= $nickname;
            //*Rol
             $_SESSION['session_rol'] = $rol;
            //*Fecha de nacimiento
            $_SESSION['session_fecha'] = $fecha_nacimiento;
            //*Genero
            $_SESSION['session_genero'] = $genero;
            //*Nacionalidad
            $_SESSION['session_nacionalidad'] = $nacionalidad;
            //*Correo
            $_SESSION['session_correo'] = $correo;
            //*Contraseña
            $_SESSION['session_contra'] = $contraseña;
            //*Foto
            $_SESSION['session_foto']      = $foto_blob;
           

           
        }

        
        echo json_encode([
            "status" => $resultado['exito'] ? "success" : "error",
            "message" => $resultado['mensaje']
        ]);
    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Error al actualizar usuario: " . $e->getMessage()
        ]);
        exit;
    }
}
