<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <form action="../controles/registrar-usuario.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <br>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>

