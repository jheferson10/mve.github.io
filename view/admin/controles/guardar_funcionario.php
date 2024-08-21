<?php
include '../db.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $subcargo = isset($_POST['subcargo']) ? $_POST['subcargo'] : null; // Solo se envía si es "Funcionario"
    $correo = $_POST['correo'];

    // Manejo de la subida de la foto
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_folder = "../vista/fotos_funcio/" . $foto;

    if (move_uploaded_file($foto_tmp, $foto_folder)) {
        try {
            // Guardamos solo el nombre del archivo en la base de datos
            $stmt = $basededatos->prepare("INSERT INTO funcionarios (nombre, cargo, correo, foto, subcargo) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nombre, $cargo, $correo, $foto, $subcargo]);
            echo "Funcionario/Regidor agregado correctamente.";
        } catch (Exception $e) {
            echo "Error al agregar: " . $e->getMessage();
        }
    } else {
        echo "Error al subir la foto.";
    }
}
?>
