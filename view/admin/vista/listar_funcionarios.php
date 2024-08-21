<?php
include '../db.php'; // Incluye el archivo de conexión a la base de datos

try {
    $stmt = $basededatos->query("SELECT * FROM funcionarios");
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error al obtener los funcionarios: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionarios</title>
</head>
<body>
<div class="mensajes">
        <?php
            // Mostrar mensaje si existe
            if (isset($_GET['mensaje'])) {
                echo '<p class="pt-3 pb-3 text-center">' . htmlspecialchars($_GET['mensaje']) . '</p>';
            }
        ?>
</div>
    <h1>Lista de Funcionarios/Regidores</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Correo</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($funcionarios as $funcionario): ?>
        <?php
            $fotoPath = htmlspecialchars($funcionario['foto']);
        ?>
        <tr>
            <td><?php echo htmlspecialchars($funcionario['idfuncionario']); ?></td>
            <td><?php echo htmlspecialchars($funcionario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($funcionario['cargo']); ?></td>
            <td><?php echo htmlspecialchars($funcionario['correo']); ?></td>
            <td>
                <img src="./fotos_funcio/<?php echo $fotoPath; ?>" width="100" alt="Foto">
            </td>
            <td>
                <a href="editar_funcionario.php?id=<?php echo $funcionario['idfuncionario']; ?>">Editar</a>
                <a href="../controles/eliminar_funcionario.php?id=<?php echo $funcionario['idfuncionario']; ?>" onclick="return confirm('¿Estás seguro de eliminar?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
