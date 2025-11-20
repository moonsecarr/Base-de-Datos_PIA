<?php
$host = "localhost";
$user = "root"; 
$password = "Noe_050703"; // Normalmente vacía en desarrollo
$database = "mundiales";

// Crear conexión MySQLi
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "¡Conectado a MySQL con MySQLi!<br>";



// Checa la tabla de usuarios
$result = $conn->query("SELECT * FROM usuarios");
echo "<h3>Jugadores en la base de datos:</h3>";
while($row = $result->fetch_assoc()) {
    echo "ID: {$row['id_Usuario']} - {$row['nombre_completo']} ({$row['correo']})<br>";
}

$conn->close();
?>