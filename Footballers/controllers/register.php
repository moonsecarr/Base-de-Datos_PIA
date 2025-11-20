<?php

use Core\Database;
// Incluir la configuración y la clase Database
$config = require 'core/config.php';

// Crear instancia de la base de datos
$db = new Database($config);

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recoger y sanitizar los datos del formulario
    $nombre_completo = trim($_POST['nombre_completo']);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $pais = trim($_POST['pais']);
    $nacionalidad = trim($_POST['nacionalidad']);
    $correo = trim($_POST['correo']);
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    // Validaciones básicas
    if (empty($nombre_completo) || empty($correo) || empty($contraseña)) {
        die("Error: Campos obligatorios vacíos");
    }

    //Validar correo
    $sql = "CALL sp_validarCorreoUnico(?)";
    $stmt = $db->query($sql, [$correo]);

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor(); // Libera el result set del procedimiento

    if ($resultado && $resultado['correo_existe']) {
        die("Error: El correo electrónico ya está registrado. ID: " . $resultado['idUsuario']);
    }


    // Procesar la foto si se subió
    $foto_blob = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto'];

        // Validaciones adicionales
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/gif'];
        $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif'];

        // Obtener extensión del archivo
        $file_extension = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));

        // Validar tipo MIME y extensión
        if (
            in_array($foto['type'], $tipos_permitidos) &&
            in_array($file_extension, $extensiones_permitidas)
        ) {

            // Validar tamaño del archivo (ej: máximo 5MB)
            $max_size = 5 * 1024 * 1024; // 5MB en bytes
            if ($foto['size'] <= $max_size) {

                // Validar que realmente es una imagen PRIMERO (optimización)
                if (!@getimagesize($foto['tmp_name'])) {
                    die("Error: El archivo no es una imagen válida");
                }

                // Leer el archivo como BLOB
                $foto_blob = file_get_contents($foto['tmp_name']);

                // ECHO OPCIONAL PARA DEBUG
                /* echo "Foto procesada correctamente: " . strlen($foto_blob) . " bytes<br>"; */
            } else {
                die("Error: La imagen no debe superar los 5MB");
            }
        } else {

            // ECHO OPCIONAL PARA DEBUG
            echo "No se subió foto o hubo error<br>";
            die("Error: Solo se permiten imágenes JPEG, PNG o GIF");
        }
    }


    try {


        // Insertar usuario en la base de datos
        $sql = "CALL sp_usuarios(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @p_mensaje, @p_exito)";

        $params = [
            1, // p_opcion = 1 (INSERTAR)
            null, // p_id_usuario (null para inserción)
            $nombre_completo,
            $fecha_nacimiento,
            $foto_blob,
            $genero,
            $pais,
            $nacionalidad,
            $correo,
            $contraseña,
            $rol
        ];


        // Ejecutar el stored procedure
        $stmt = $db->query($sql, $params);
        $stmt->closeCursor(); // Liberar el resultset

        echo "DEBUG - Stored procedure ejecutado, recuperando parámetros OUT<br>";
        flush();


        /* echo "¡Usuario registrado exitosamente!<br>";
        echo "<a href='/'>Ir al login</a>";
         */
        $page = 'Login';
        require 'views/login.view.php';
        exit();
    } catch (Exception $e) {
        echo "Error al registrar usuario: " . $e->getMessage();
    }
} else {
    // Mostrar el formulario si no es POST
    require 'views/register.view.php';
}
