<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Noticia</title>
    <style>
        .preview img {
            max-width: 200px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <form id="newsForm" action="subir_noticia.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>

        <label for="categoria">Categoría:</label><br>
        <select name="categoria" required>
            <option value="actividades">actividades</option>
            <option value="noticia" selected>noticia</option>
            <option value="deporte">deporte</option>
            <option value="salud">salud</option>
        </select>
        
        
        
        <label for="fotos">Fotos:</label><br>
        <input type="file" id="fotos" name="fotos[]" multiple accept="image/*" required><br><br>
        
        <div class="preview" id="preview"></div><br>
        
        <input type="submit" value="Subir Noticia">
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
