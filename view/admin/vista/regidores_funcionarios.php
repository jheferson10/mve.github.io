<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Funcionarios</title>
    <script>
        function toggleSubcargo() {
            var cargo = document.getElementById("cargo").value;
            var subcargoDiv = document.getElementById("subcargo-div");

            if (cargo === "Funcionario") {
                subcargoDiv.style.display = "block";
                document.getElementById("subcargo").required = true;
            } else {
                subcargoDiv.style.display = "none";
                document.getElementById("subcargo").required = false;
            }
        }
    </script>
</head>
<body>
    <h1>Agregar Funcionario/Regidor</h1>
    <form action="../controles/guardar_funcionario.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="cargo">Cargo:</label>
        <select id="cargo" name="cargo" onchange="toggleSubcargo()" required>
            <option value="Regidor">Regidor</option>
            <option value="Funcionario">Funcionario</option>
        </select><br><br>

        <div id="subcargo-div" style="display: none;">
            <label for="subcargo">Subcargo:</label>
            <input type="text" id="subcargo" name="subcargo"><br><br>
        </div>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>

