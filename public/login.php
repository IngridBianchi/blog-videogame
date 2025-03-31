<?php
// Iniciar la sesión y la conexión a bd
session_start();
require_once __DIR__ . '/../includes/conexion.php';

// Recoger datos del formulario
if (isset($_POST)) {
    // Borrar error antiguo
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }

    // Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Comprobar la contraseña
        if (password_verify($password, $usuario['password'])) {
            // Utilizar una sesión para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['error_login'] = "Login incorrecto!! Contraseña inválida.";
        }
    } else {
        $_SESSION['error_login'] = "Login incorrecto!! Usuario no encontrado.";
    }
}

// Redirigir al index.php
header('Location: index.php');
exit();