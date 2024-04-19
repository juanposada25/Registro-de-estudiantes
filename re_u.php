<?php
// Parámetros de conexión a la base de datos PostgreSQL
$host = 'localhost';
$dbname = 'symfony';
$username = 'postgres';
$password = 'juan2005';

try {
    // Conexión a la base de datos PostgreSQL utilizando PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

    // Crear la tabla de usuarios si no existe
    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id SERIAL PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        contrasena VARCHAR(255) NOT NULL
    )");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        
        // Insertar datos en la tabla usuarios
        $stmt_usuarios = $pdo->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)");
        $stmt_usuarios->bindParam(':nombre', $nombre);
        $stmt_usuarios->bindParam(':email', $email);
        $stmt_usuarios->bindParam(':contrasena', $contrasena);
        $stmt_usuarios->execute();
        
        echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }
} catch (PDOException $e) {
    // Capturar cualquier excepción ocurrida durante la conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>