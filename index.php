<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión / Registrarse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 300px;
            margin: 100px auto;
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
        input[type="email"],
        input[type="contrasena"],
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
        .toggle-form {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="in_no.php" method="post">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contrasena">Contraseña:</label>
            <input type="contrasena" id="contrasena" name="contrasena" required>
            
            <input type="submit" value="Iniciar Sesión">
        </form>
        
        <div class="toggle-form">
            <p>¿No tienes una cuenta?</p>
            <button onclick="toggleRegistration()">Registrarse</button>
        </div>
        
        <form id="registration_form" action="re_u.php" method="post" style="display: none;">
            <h2>Registrarse</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contrasena">Contraseña:</label>
            <input type="contrasena" id="contrasena" name="contrasena" required>
            
            <input type="submit" value="Registrarse">
        </form>
    </div>

    <script>
        function toggleRegistration() {
            var registrationForm = document.getElementById("registration_form");
            if (registrationForm.style.display === "none") {
                registrationForm.style.display = "block";
            } else {
                registrationForm.style.display = "none";
            }
        }
    </script>
</body>
</html>