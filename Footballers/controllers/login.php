<?php
session_start();


use Core\Database;

$config = require 'core/config.php';
$db = new Database($config);


$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($requestMethod === 'GET') {
    $page = 'Login';
    require 'views/login.view.php';
    exit();
}

if ($requestMethod === 'POST') {
    // Validar y sanitizar datos
    $correo = filter_var(trim($_POST['correo'] ?? ''), FILTER_SANITIZE_EMAIL);
    $contraseña = $_POST['contraseña'] ?? '';

    // Validaciones
    $errors = [];
    
    if (empty($correo) || empty($contraseña)) {
        $errors[] = "Por favor, complete todos los campos.";
    }
    
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Formato de correo electrónico inválido.";
    }
    
    if (strlen($contraseña) > 8) {
        $errors[] = "La contraseña no puede tener más de 8 caracteres.";
    }

    if (!empty($errors)) {
        $error = implode("<br>", $errors);
        $page = 'Login';
        require 'views/login.view.php';
        exit();
    }

    try {
        // Buscar usuario por correo y contraseña en texto plano
        $query = "SELECT idUsuario, nombre_completo, rol, foto FROM Usuarios WHERE correo = ? AND contraseña = ?";
        $stmt = $db->query($query, [$correo, $contraseña]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Regenerar ID de sesión por seguridad
            session_regenerate_id(true);
            
            // Establecer sesión
            $_SESSION['user_id'] = $usuario['idUsuario'];
            $_SESSION['nombre'] = $usuario['nombre_completo'];
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['foto'] = $usuario['foto']; // Guardar foto en sesión si es necesario
            $_SESSION['logged_in'] = true;
            
            // Redireccionar
               $page = 'hola';
               require 'views/hola.view.php';
               exit();
            
        } else {
            $error = "Credenciales inválidas.";
            $page = 'Login';
            require 'views/login.view.php';
            exit();
        }
        
    } catch (Exception $e) {
        error_log("Error en login: " . $e->getMessage());
        $error = "Error del sistema. Por favor, intente más tarde.";
        $page = 'Login';
        require 'views/login.view.php';
        exit();
    }
}
?>