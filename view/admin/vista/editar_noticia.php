<?php
include '../db.php';

$idnoticia = $_GET['idnoticia'] ?? null;
$noticia = null;

try {
    if ($idnoticia) {
        $stmt = $basededatos->prepare("SELECT * FROM noticias WHERE idnoticia = :idnoticia");
        $stmt->bindParam(':idnoticia', $idnoticia);
        $stmt->execute();
        $noticia = $stmt->fetch(PDO::FETCH_OBJ);
        
        if (!$noticia) {
            echo "Noticia no encontrada";
            exit();
        }
    } else {
        echo "ID de noticia no especificado";
        exit();
    }
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];

    $fotoNombres = isset($noticia->fotos) ? json_decode($noticia->fotos) : [];
    
    // Eliminar fotos seleccionadas
    if (isset($_POST['eliminar_fotos'])) {
        foreach ($_POST['eliminar_fotos'] as $index) {
            $index = intval($index);
            if (isset($fotoNombres[$index])) {
                $fotoRuta = 'fotos/' . $fotoNombres[$index];
                if (file_exists($fotoRuta)) {
                    unlink($fotoRuta); // Eliminar archivo del servidor
                }
                unset($fotoNombres[$index]);
            }
        }
        $fotoNombres = array_values($fotoNombres); // Reindexar array
    }

    // Subir nuevas fotos
    $totalFotos = count($_FILES['fotos']['name']);
    for ($i = 0; $i < $totalFotos; $i++) {
        if (!empty($_FILES['fotos']['tmp_name'][$i])) {
            $fotoNombre = $_FILES['fotos']['name'][$i];
            $fotoTmpNombre = $_FILES['fotos']['tmp_name'][$i];
            $fotoRuta = 'fotos/' . $fotoNombre;

            $check = getimagesize($fotoTmpNombre);
            if ($check !== false) {
                if (move_uploaded_file($fotoTmpNombre, $fotoRuta)) {
                    $fotoNombres[] = $fotoNombre;
                } else {
                    echo "Error al mover el archivo de foto: $fotoNombre.";
                }
            } else {
                echo "El archivo subido no es una imagen: $fotoNombre.";
            }
        }
    }

    $fotosJson = json_encode($fotoNombres);

    try {
        $sql = "UPDATE noticias SET titulo = :titulo, descripcion = :descripcion, categoria = :categoria, fotos = :fotos WHERE idnoticia = :idnoticia";
        $stmt = $basededatos->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':fotos', $fotosJson);
        $stmt->bindParam(':idnoticia', $idnoticia);
        
        if ($stmt->execute()) {
            echo "Noticia actualizada exitosamente.";
        } else {
            echo "Error al actualizar la noticia.";
        }
    } catch (Exception $e) {
        echo "Ocurrió algo con la base de datos: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Noticia</title>
    <style>
        .preview img {
            max-width: 200px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Editar Noticia</h1>
    <form id="editForm" action="editar_noticia.php?idnoticia=<?php echo htmlspecialchars($idnoticia); ?>" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($noticia->titulo); ?>" required><br><br>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($noticia->descripcion); ?></textarea><br><br>
        
        

        <label for="categoria">Categoría:</label><br>
        <select name="categoria" required>
            <option value="<?php echo htmlspecialchars($noticia->categoria); ?>"><?php echo htmlspecialchars($noticia->categoria); ?></option>
            <option value="actividades">actividades</option>
            <option value="noticia">noticia</option>
            <option value="deporte">deporte</option>
            <option value="salud">salud</option>
        </select> <br>
        
        <label for="fotos">Fotos actuales:</label><br>
        <?php
        $fotos = json_decode($noticia->fotos);
        if (is_array($fotos)) {
            foreach ($fotos as $index => $foto) {
                echo "<div>";
                echo "<img src='fotos/" . htmlspecialchars($foto) . "' width='100' />";
                echo "<label><input type='checkbox' name='eliminar_fotos[]' value='$index'> Eliminar</label>";
                echo "</div>";
            }
        }
        ?><br>
        
        <label for="fotos">Subir nuevas fotos:</label><br>
        <input type="file" id="fotos" name="fotos[]" multiple accept="image/*"><br><br>
        
        <div class="preview" id="preview"></div><br>
        
        <input type="submit" value="Actualizar Noticia">
    </form>

    <script>
        document.getElementById('fotos').addEventListener('change', function() {
            var preview = document.getElementById('preview');
            preview.innerHTML = '';
            for (var i = 0; i < this.files.length; i++) {
                var file = this.files[i];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
