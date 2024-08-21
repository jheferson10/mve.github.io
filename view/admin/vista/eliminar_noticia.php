<?php
include '../db.php';

try {
    if (isset($_GET['idnoticia'])) {
        // Obtener el nombre de las fotos asociadas a la noticia
        $stmt = $basededatos->prepare("SELECT fotos FROM noticias WHERE idnoticia = :idnoticia");
        $stmt->bindParam(':idnoticia', $_GET['idnoticia']);
        $stmt->execute();
        $noticia = $stmt->fetch();
        
        if ($noticia) {
            $fotos = json_decode($noticia->fotos);
            
            // Eliminar los archivos de fotos del servidor
            foreach ($fotos as $foto) {
                $fotoRuta = 'fotos/' . $foto;
                if (file_exists($fotoRuta)) {
                    unlink($fotoRuta);
                }
            }

            // Eliminar la noticia de la base de datos
            $stmt = $basededatos->prepare("DELETE FROM noticias WHERE idnoticia = :idnoticia");
            $stmt->bindParam(':idnoticia', $_GET['idnoticia']);
            
            if ($stmt->execute()) {
                echo "Noticia eliminada exitosamente.";
            } else {
                echo "Error al eliminar la noticia.";
            }
        } else {
            echo "Noticia no encontrada";
        }
    }
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>
