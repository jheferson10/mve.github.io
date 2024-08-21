<?php
session_start();
include '../db.php'; // Archivo que contiene la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Consulta de usuario
    $stmt = $basededatos->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user->password)) {
        $_SESSION['user-id'] = $user->id;
        $_SESSION['username'] = $user->username;
        header('Location: ../vista/index.php');
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
