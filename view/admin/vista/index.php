
<?php
session_start();
if (!isset($_SESSION['user-id'])) {
    header("Location: ../vista/index.html");
    exit(); // Asegura que el script se detenga después de redirigir
}


$nombreUsuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDVDE</title>
</head>
<body>
    panel de control
    vienvenido <?php echo $nombreUsuario; ?> <br>
    <a href="finalizar-secion.php"> salir</a>
</body>
</html>