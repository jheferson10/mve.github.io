<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="./controles/login.php" method="post">
        <label for="email">Usuario:</label>
        <input type="text" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Iniciar sesión</button>
        <br>
        <a href="recu-contraseña.php">¿Olvidaste tu contraseña?</a>
    </form>
</body>
</html>
