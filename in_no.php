<?php
// Parámetros de conexión a la base de datos PostgreSQL
$host = 'localhost';
$dbname = 'symfony';
$username = 'postgres';
$password = 'juan2005';

try {
    // Conexión a la base de datos PostgreSQL utilizando PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar las credenciales del usuario
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        
        // Consultar la base de datos para verificar las credenciales del usuario
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND contrasena = :contrasena");
        $stmt->execute(['email' => $email, 'contrasena' => $contrasena]);
        $user = $stmt->fetch();

        if ($user) {
            // Las credenciales son válidas
            $authenticated = true;
        } else {
            // Las credenciales son inválidas
            $authenticated = false;
        }

        // Redirigir según el resultado de la autenticación
        if ($authenticated) {
            // Si las credenciales son válidas, redirigir a la página de registro de notas
            header("Location:public/notas.php");
            exit(); // Asegurar que el script se detenga después de la redirección
        } else {
            // Si las credenciales son inválidas, mostrar un mensaje de error o realizar alguna otra acción
            echo "El correo o contraseña es invalido.";
            echo '<meta http-equiv="refresh" content="0;url=index.php">';
        }

    }
} catch (PDOException $e) {
    // Capturar cualquier excepción ocurrida durante la conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>