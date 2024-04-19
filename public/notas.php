<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de ingreso de datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 300px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ingrese los datos del estudiante:</h2>
        <form action="conexion.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <h2>Ingrese las notas del estudiante:</h2>
            <label for="materia">Materia:</label>
            <input type="text" id="materia" name="materia" required>
            
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" min="0" max="100" step="0.01" required>
            
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>

</html>


<?php
// Incluir el archivo de conexión a la base de datos
require_once 'conexion.php';

// Ahora puedes usar la conexión $pdo en este archivo para realizar consultas, etc.
?>