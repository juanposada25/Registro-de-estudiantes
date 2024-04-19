<?php

// src/Controller/LoginController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PDO;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="app_login", methods={"GET", "POST"})
     */
    public function login(Request $request): Response
    {
        $error = '';

        if ($request->isMethod('POST')) {
            // Parámetros de conexión a la base de datos PostgreSQL
            $host = 'localhost';
            $dbname = 'symfony';
            $username = 'postgres';
            $password = 'juan2005';

            try {
                // Conexión a la base de datos PostgreSQL utilizando PDO
                $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                // Obtener los datos del formulario
                $email = $request->request->get('email');
                $contrasena = $request->request->get('contrasena');

                // Consultar la base de datos para verificar las credenciales del usuario
                $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND contrasena = :contrasena");
                $stmt->execute(['email' => $email, 'contrasena' => $contrasena]);
                $user = $stmt->fetch();

                if ($user) {
                    // Las credenciales son válidas
                    // Redirigir a la página de registro de notas
                    return $this->redirectToRoute('registro_notas');
                } else {
                    // Las credenciales son inválidas
                    $error = "El correo o contraseña es inválido.";
                }
            } catch (\PDOException $e) {
                // Capturar cualquier excepción ocurrida durante la conexión
                $error = "Error de conexión: " . $e->getMessage();
            }
        }

        // Renderizar la plantilla Twig con el formulario de inicio de sesión
        return $this->render('login/index.html.twig', [
            'error' => $error,
        ]);
    }
}
?>