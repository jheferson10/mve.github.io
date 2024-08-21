<?php
include './admin/db.php';

$id = $_GET['idnoticia'];

try {
    // Obtener los detalles de la noticia actual
    $stmt = $basededatos->prepare("SELECT * FROM noticias WHERE idnoticia = ?");
    $stmt->execute([$id]);
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$noticia) {
        echo "Noticia no encontrada.";
        exit;
    }

    // Decodificar el JSON que contiene las fotos
    $fotos = json_decode($noticia['fotos'], true); // Decodifica como un array asociativo

    // Obtener otras noticias, excluyendo la actual
    $stmt_otros = $basededatos->prepare("SELECT * FROM noticias WHERE idnoticia != ? ORDER BY fecha DESC LIMIT 4");
    $stmt_otros->execute([$id]);
    $otras_noticias = $stmt_otros->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo "Error al obtener la noticia: " . $e->getMessage();
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($noticia['titulo']); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .main-image {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            margin-bottom: 20px;
        }
        .thumbnail-images img {
            cursor: pointer;
            margin: 0 5px;
            width: 100px;
            height: 70px;
            object-fit: cover;
        }
        .thumbnail-images {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1><?php echo htmlspecialchars($noticia['titulo']); ?></h1>
        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($noticia['fecha']); ?></p>

        <!-- Imagen principal -->
        <?php
        if (is_array($fotos) && count($fotos) > 0) {
            echo "<img id='mainImage' src='admin/vista/fotos/" . htmlspecialchars($fotos[0]) . "' class='main-image' alt='Imagen principal'>";
        } else {
            echo "<p>No hay fotos disponibles para esta noticia.</p>";
        }
        ?>

        <!-- Miniaturas -->
        <div class="thumbnail-images">
            <?php
            if (is_array($fotos) && count($fotos) > 0) {
                foreach ($fotos as $foto) {
                    if (!empty($foto)) {
                        echo "<img src='admin/vista/fotos/" . htmlspecialchars($foto) . "' alt='Miniatura' onclick='changeMainImage(this.src)'>";
                    }
                }
            }
            ?>
        </div>

        <p class="mt-4"><?php echo nl2br(htmlspecialchars($noticia['descripcion'])); ?></p>
        <a href="index.php" class="btn btn-secondary">Volver a las noticias</a>
        
        <!-- Mostrar otras noticias -->
        <h2 class="mt-5">Otras Noticias</h2>
        <div class="row">
            <?php foreach ($otras_noticias as $otra_noticia): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                    <?php
                        $fotos = json_decode($otra_noticia['fotos']);
                        if (is_array($fotos) && count($fotos) > 0) {
                            echo "<img src='admin/vista/fotos/" . htmlspecialchars($fotos[0]) . "' alt='Foto'>";
                        }
                        ?>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($otra_noticia['titulo']); ?></h5>
                            <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($otra_noticia['fecha']); ?></small></p>
                            <a href="detalle_noticia.php?idnoticia=<?php echo $otra_noticia['idnoticia']; ?>" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function changeMainImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>
</body>
</html>
