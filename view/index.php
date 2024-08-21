<?php
include 'admin/db.php';

try {
    $stmt = $basededatos->prepare("SELECT * FROM noticias ORDER BY fecha DESC LIMIT 3");
    $stmt->execute();
    $noticias = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipalidad de Vizcatán del Ene</title>
    <link rel="stylesheet" href="inicio.css">

</head>
<body>
    <?php
    include 'header.php';
    ?>
    
    <main>
        <section class="hero">
            <img src="../images/regifun.jpg" alt="Hero Background" class="hero-image">
            <div class="hero-text">
                <img src="../images/logo-muni.jpeg" alt="logo" class="logo">
                <h1 class="miniene">MUNICIPALIDAD DE VIZCATÁN DEL ENE</h1>
            </div>
        </section>
        <section class="cards">
            <div class="card">
                <div class="card-icon">&#128240;</div>
                <h2>Noticias Comunitarias</h2>
                <p>PHP (acrónimo recursivo de PHP: Hypertext Preprocessor) es un lenguaje de código abierto muy popular especialmente adecuado para el desarrollo web y que puede ser incrustado en HTML</p>
                <a href="#" class="btn">Ver más</a>
            </div>
            <div class="card">
                <div class="card-icon">&#128226;</div>
                <h2>Noticias Comunitarias</h2>
                <p>PHP (acrónimo recursivo de PHP: Hypertext Preprocessor) es un lenguaje de código abierto muy popular especialmente adecuado para el desarrollo web y que puede ser incrustado en HTML</p>
                <a href="#" class="btn">Ver más</a>
            </div>
            <div class="card">
                <div class="card-icon">&#128197;</div>
                <h2>Próximas Actividades</h2>
                <p>PHP (acrónimo recursivo de PHP: Hypertext Preprocessor) es un lenguaje de código abierto muy popular especialmente adecuado para el desarrollo web y que puede ser incrustado en HTML</p>
                <a href="#" class="btn">Ver más</a>
            </div>
        </section>

        <section class="photo-description">
            <div class="photo">
                <img src="../images/alcalde.jpg" alt="Descripción de la foto">
            </div>
            <div class="description">
                <p>Python es un lenguaje de programación ampliamente utilizado en las aplicaciones web, el desarrollo de software, la ciencia de datos y el machine learning (ML). Los desarrolladores utilizan Python porque es eficiente y fácil de aprender, además de que se puede ejecutar en muchas plataformas diferentes.</p>
            </div>
        </section>

        <p class="noticia-texto">ULTIMAS NOTICIAS</p>
        <section class="noticias">

                <?php if (!empty($noticias)): ?>
                <?php foreach ($noticias as $noticia): ?>
                    <div class="noticia">
                        <h2><?php echo htmlspecialchars($noticia->titulo); ?></h2>
                        <?php
                        $fotos = json_decode($noticia->fotos);
                        if (is_array($fotos) && count($fotos) > 0) {
                            echo "<img src='admin/vista/fotos/" . htmlspecialchars($fotos[0]) . "' alt='Foto'>";
                        }
                        ?>
                        <p><?php echo htmlspecialchars(substr($noticia->descripcion, 0, 200)); ?>...</p>
                        <a href="detalle_noticia.php?idnoticia=<?php echo htmlspecialchars($noticia->idnoticia); ?>" class="ver-mas">Ver más</a>
                        <p><small><?php echo htmlspecialchars($noticia->fecha); ?></small></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay noticias disponibles.</p>
            <?php endif; ?>
                
        </section>
    </main>

        
        <?php
            include 'footer.php';
        ?>
</body>
</html>
