<?php
include '../db.php'; // Incluye el archivo de conexión a la base de datos

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $subcargo = isset($_POST['subcargo']) ? $_POST['subcargo'] : null; // Capturando el subcargo si existe
    $correo = $_POST['correo'];

    if ($_FILES['foto']['name']) {
        // Manejo de la subida de la nueva foto
        $foto = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_folder = "./fotos_funcio/" . $foto; // Asegúrate de que esta carpeta existe
        move_uploaded_file($foto_tmp, $foto_folder);

        try {
            $stmt = $basededatos->prepare("UPDATE funcionarios SET nombre = ?, cargo = ?, subcargo = ?, correo = ?, foto = ? WHERE idfuncionario = ?");
            $stmt->execute([$nombre, $cargo, $subcargo, $correo, $foto, $id]);
            header("Location: ./listar_funcionarios.php?mensaje=Funcionario/Regidor actualizado correctamente");
            exit;
        exit;
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    } else {
        try {
            $stmt = $basededatos->prepare("UPDATE funcionarios SET nombre = ?, cargo = ?, subcargo = ?, correo = ? WHERE idfuncionario = ?");
            $stmt->execute([$nombre, $cargo, $subcargo, $correo, $id]);
            header("Location: ./listar_funcionarios.php?mensaje=Funcionario/Regidor actualizado correctamente");
            exit;
        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }
} else {
    try {
        $stmt = $basededatos->prepare("SELECT * FROM funcionarios WHERE idfuncionario = ?");
        $stmt->execute([$id]);
        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error al obtener los datos: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionario</title>
    <script>
        function toggleSubcargo() {
            var cargoSelect = document.getElementById('cargo');
            var subcargoField = document.getElementById('subcargo-field');
            if (cargoSelect.value === 'Funcionario') {
                subcargoField.style.display = 'block';
            } else {
                subcargoField.style.display = 'none';
            }
        }

        window.onload = function() {
            toggleSubcargo(); // Llamada inicial para ajustar la visibilidad al cargar la página
        }
    </script>
</head>
<body>
    <h1>Editar Funcionario/Regidor</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($funcionario['idfuncionario']); ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($funcionario['nombre']); ?>" required><br><br>

        <label for="cargo">Cargo:</label>
        <select id="cargo" name="cargo" required onchange="toggleSubcargo()">
            <option value="Regidor" <?php if($funcionario['cargo'] == 'Regidor') echo 'selected'; ?>>Regidor</option>
            <option value="Funcionario" <?php if($funcionario['cargo'] == 'Funcionario') echo 'selected'; ?>>Funcionario</option>
        </select><br><br>

        <!-- Campo de Subcargo, inicialmente oculto si no es Funcionario -->
        <div id="subcargo-field" style="display:none;">
            <label for="subcargo">Subcargo:</label>
            <input type="text" id="subcargo" name="subcargo" value="<?php echo htmlspecialchars($funcionario['subcargo']); ?>"><br><br>
        </div>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($funcionario['correo']); ?>" required><br><br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*"><br><br>
        
        <img src="./fotos_funcio/<?php echo htmlspecialchars($funcionario['foto']); ?>" width="100" alt="Foto"><br><br>

        <button type="submit">Actualizar</button>
    </form>
    
</body>
</html>