<?php
include 'db.php'; // Archivo que contiene la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Verifica si el email existe
    $stmt = $basededatos->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(50));
        $expire = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Guarda el token y la fecha de expiración en la base de datos
        $stmt = $basededatos->prepare("UPDATE usuarios SET reset_token = ?, token_expire = ? WHERE email = ?");
        $stmt->execute([$token, $expire, $email]);

        $reset_link = "http://localhost/muni/view/admin/reset_password.php?token=$token";

        // Configuración del encabezado del correo
        $to = $email;
        $subject = "Recuperación de contraseña";
        $message = "
        <html>
        <head>
            <title>Recuperación de contraseña</title>
        </head>
        <body>
            <p>Haz clic en el siguiente enlace para resetear tu contraseña:</p>
            <a href='$reset_link'>Resetear Contraseña</a>
        </body>
        </html>";
        $headers = "From: no-reply@yourwebsite.com\r\n";
        $headers .= "Reply-To: no-reply@yourwebsite.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Envía el email con el enlace de recuperación
        if (mail($to, $subject, $message, $headers)) {
            echo "Enlace de recuperación enviado a tu correo electrónico.";
        } else {
            echo "Hubo un error al enviar el correo electrónico.";
        }
    } else {
        echo "Correo electrónico no encontrado.";
    }
}
?>
