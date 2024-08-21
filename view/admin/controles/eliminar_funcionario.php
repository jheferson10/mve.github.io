<?php
include '../db.php'; // Incluye el archivo de conexión a la base de datos

$id = $_GET['id'];

try {
    // Primero obtenemos la información del funcionario para saber el nombre del archivo de la foto
    $stmt = $basededatos->prepare("SELECT foto FROM funcionarios WHERE idfuncionario = ?");
    $stmt->execute([$id]);
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($funcionario) {
        $foto = $funcionario['foto'];

        // Eliminamos la foto de la carpeta si existe
        $foto_path = "../vista/fotos_funcio/" . $foto;
        if (file_exists($foto_path)) {
            unlink($foto_path); // Esta función elimina el archivo
        }

        // Luego, eliminamos el registro de la base de datos
        $stmt = $basededatos->prepare("DELETE FROM funcionarios WHERE idfuncionario = ?");
        $stmt->execute([$id]);

        header("Location: ../vista/listar_funcionarios.php?mensaje=Funcionario/Regidor eliminado correctamente.");
            exit;
    } else {
        echo "No se encontró el funcionario.";
    }
} catch (Exception $e) {
    echo "Error al eliminar: " . $e->getMessage();
}
?>
