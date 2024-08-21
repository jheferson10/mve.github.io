<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    
    $fotoNombres = [];
    $totalFotos = count($_FILES['fotos']['name']);
    
    for ($i = 0; $i < $totalFotos; $i++) {
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

    $fotosJson = json_encode($fotoNombres);
    
    $sql = "INSERT INTO noticias (titulo, descripcion, categoria, fotos, fecha) VALUES (:titulo, :descripcion, :categoria, :fotos, NOW())";
    $stmt = $basededatos->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':fotos', $fotosJson);
    
    if ($stmt->execute()) {
        echo "Noticia subida exitosamente.";
    } else {
        echo "Error al subir la noticia.";
    }
}
?>
