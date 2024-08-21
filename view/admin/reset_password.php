<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resetear Contraseña</title>
</head>
<body>
    <form action="reset_password_process.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label for="password">Nueva Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Resetear Contraseña</button>
    </form>
</body>
</html>
