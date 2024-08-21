<?php
include '../db.php';

try {
    $stmt = $basededatos->prepare("SELECT * FROM noticias ORDER BY fecha DESC ");
    $stmt->execute();
    $noticias = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Noticias</title>
</head>
<body>
    <h1>Noticias</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Foto</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticias as $noticia): ?>
            <tr>
                <td><?php echo htmlspecialchars($noticia->idnoticia); ?></td>
                <td><?php echo htmlspecialchars($noticia->titulo); ?></td>
                <td><?php echo htmlspecialchars(substr($noticia->descripcion, 0, 100)) . '...'; ?></td>
                <td><?php echo htmlspecialchars($noticia->categoria); ?></td>
                <td>
                    <?php
                    $fotos = json_decode($noticia->fotos);
                    if (is_array($fotos) && count($fotos) > 0) {
                        echo "<img src='fotos/" . htmlspecialchars($fotos[0]) . "' width='50' />";
                    }
                    ?>
                </td>
                <td><?php echo htmlspecialchars($noticia->fecha); ?></td>
                <td>
                    <a href="editar_noticia.php?idnoticia=<?php echo $noticia->idnoticia; ?>">Editar</a> |
                    <a href="eliminar_noticia.php?idnoticia=<?php echo $noticia->idnoticia; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar esta noticia?');">Eliminar</a> |
                    <a href="ver_noticia.php?idnoticia=<?php echo $noticia->idnoticia; ?>">Ver más</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
