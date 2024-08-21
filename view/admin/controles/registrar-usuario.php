<?php
include '../db.php'; // Archivo que contiene la conexión a la base de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verifica si el nombre de usuario o el correo electrónico ya existen
    $stmt = $basededatos->prepare("SELECT * FROM usuarios WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    $user = $stmt->fetch();

    if ($user) {
        echo "El nombre de usuario o el correo electrónico ya están en uso.";
    } else {
        // Inserta el nuevo usuario en la base de datos
        $stmt = $basededatos->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $email, $password])) {
            // Enviar correo de bienvenida
            $to = $email;
            $subject = "Bienvenido a nuestro sitio web";
            $message = "<html><body><h1>Hola, $username</h1><p>Gracias por registrarte en nuestro sitio web.</p></body></html>";
            $headers = "From: no-reply@yourwebsite.com\r\n";
            $headers .= "Reply-To: no-reply@yourwebsite.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            if (mail($to, $subject, $message, $headers)) {
                echo "Registro exitoso. Se ha enviado un correo de bienvenida a tu dirección de correo electrónico.";
            } else {
                echo "Registro exitoso, pero hubo un error al enviar el correo de bienvenida.";
            }
        } else {
            echo "Hubo un error al registrarse.";
        }
    }
}
?>
