<?php
// Parámetros de conexión a la base de datos PostgreSQL
$host = 'localhost';
$dbname = 'symfony';
$username = 'postgres';
$password = 'juan2005';

try {
    // Conexión a la base de datos PostgreSQL utilizando PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
   

    $pdo->exec("CREATE TABLE IF NOT EXISTS estudiantes (
        id SERIAL PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        edad INT,
        email VARCHAR(100)
    )");
    
    
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS notas (
        id SERIAL PRIMARY KEY,
        id_estudiante INT NOT NULL,
        materia VARCHAR(100) NOT NULL,
        nota FLOAT NOT NULL,
        FOREIGN KEY (id_estudiante) REFERENCES estudiantes(id)
    )");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $materia = $_POST['materia'];
        $nota = $_POST['nota'];
        
        // Insertar datos en la tabla estudiantes
        $stmt_estudiantes = $pdo->prepare("INSERT INTO estudiantes (nombre, edad, email) VALUES (:nombre, :edad, :email)");
        $stmt_estudiantes->bindParam(':nombre', $nombre);
        $stmt_estudiantes->bindParam(':edad', $edad);
        $stmt_estudiantes->bindParam(':email', $email);
        $stmt_estudiantes->execute();
        
        // Obtener el ID del estudiante insertado
        $id_estudiante = $pdo->lastInsertId();
        
        // Insertar datos en la tabla notas
        $stmt_notas = $pdo->prepare("INSERT INTO notas (id_estudiante, materia, nota) VALUES (:id_estudiante, :materia, :nota)");
        $stmt_notas->bindParam(':id_estudiante', $id_estudiante);
        $stmt_notas->bindParam(':materia', $materia);
        $stmt_notas->bindParam(':nota', $nota);
        $stmt_notas->execute();
        
        echo '<meta http-equiv="refresh" content="0;url=notas.php">';
    } 
        
    
    
} catch (PDOException $e) {
    // Capturar cualquier excepción ocurrida durante la conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>
