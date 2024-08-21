<?php
include 'db.php'; // Archivo que contiene la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verifica el token
    $stmt = $basededatos->prepare("SELECT * FROM usuarios WHERE reset_token = ? AND token_expire > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Actualiza la contraseña
        $stmt = $basededatos->prepare("UPDATE usuarios SET password = ?, reset_token = NULL, token_expire = NULL WHERE reset_token = ?");
        $stmt->execute([$password, $token]);

        echo "Contraseña actualizada exitosamente.";
    } else {
        echo "Token inválido o expirado.";
    }
}
?>
