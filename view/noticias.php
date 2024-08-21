<?php
include './admin/db.php';

try {
    // Consulta para obtener los regidores
    $sql_regidores = "SELECT * FROM funcionarios WHERE cargo = 'Regidor'";
    $stmt_regidores = $basededatos->prepare($sql_regidores);
    $stmt_regidores->execute();
    $regidores = $stmt_regidores->fetchAll();

    // Consulta para obtener los funcionarios
    $sql_funcionarios = "SELECT * FROM funcionarios WHERE cargo = 'Funcionario'";
    $stmt_funcionarios = $basededatos->prepare($sql_funcionarios);
    $stmt_funcionarios->execute();
    $funcionarios = $stmt_funcionarios->fetchAll();
} catch (Exception $e) {
    echo "Ocurrió un error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <script src="https://kit.fontawesome.com/7c18fa3a34.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
/* Estilo global */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Estilo del cuerpo */
body {
    margin: 0;
    padding: 0;
    line-height: 1.6;
}

/* Estilo del encabezado */
.header {
            position: relative;
            width: 100%;
            height: 200px; /* Ajusta la altura según sea necesario */
            background-image: url('../images/regifun.jpg'); /* Reemplaza con la imagen correcta */
            background-size: cover;
            background-position: center;
        }

        .header .overlay {
            background: linear-gradient(90deg, rgba(167,10,29,1) 0%, rgba(0,212,255,0) 100%);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            padding-right: 20px;
        }

        .header h1 {
            font-size: 48px;
            font-weight: bold;
            color: white;
            z-index: 1;
            text-align:left
        }

        @media(max-width: 576px){
            .header .h1{
                font-size: 10px;
            
            }
        }
        

</style>
<body>
    <?php include 'header.php'; ?>

        <div class="header">
            <div class="overlay">
                <h1>REGIDORES Y <br> FUNCIONARIOS</h1>
            </div>
    </div>
    <main class="container my-5">
        <div class="row g-4 align-items-center">
            <div class="col-md-6">
                <img src="../images/alcalde.jpg" alt="Logo" class="col-md-6 w-100">
            </div>
            <div class="col-md-6">
                <h1>MUNICIPALIDAD DE VIZCATÁN DEL ENE</h1>
                <p>Esta es una descripción de la municipalidad. Aquí puedes agregar más detalles sobre la municipalidad de Vizcatán del Ene.</p>
            </div>
        </div>
    </main>
    

    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Texto de descripción -->
            <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                <h5>Descargar estructura orgánica:</h5>
            </div>
            <!-- Botones de descarga -->
            <div class="col-md-8 d-flex justify-content-center justify-content-md-end">
                <a href="path_to_organigrama.pdf" class="btn btn-pink mx-2" download>
                    <i class="fas fa-file-pdf"></i> ORGANIGRAMA
                </a>
                <a href="path_to_ordenanza.pdf" class="btn btn-pink mx-2" download>
                    <i class="fas fa-file-pdf"></i> ORDENANZA MUNICIPAL
                </a>
            </div>
        </div>
    </div>

    <style>
        .circle-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .cardregi {
            border: none;
        }
    </style>

    <div class="container text-center mt-5">
        <!-- Sección de Regidores -->
        <h2>Regidores</h2>
        <div class="row justify-content-center">
            <?php
            if ($regidores) {
                foreach ($regidores as $row) {
                    echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
                    echo '<div class="cardregi">';
                    echo '<img src="./admin/vista/fotos_funcio/' . $row->foto . '" class="circle-img mx-auto d-block" alt="Foto de ' . $row->nombre . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row->nombre . '</h5>';
                    echo '<p class="card-text">' . $row->cargo . '</p>';
                    echo '<a href="mailto:' . $row->correo . '" class="text-muted">' . $row->correo . '</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12">';
                echo '<p class="text-center">No se encontraron regidores.</p>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- Sección de Funcionarios -->
        <h2>Funcionarios</h2>
        <div class="row justify-content-center">
            <?php
            if ($funcionarios) {
                foreach ($funcionarios as $row) {
                    echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
                    echo '<div class="cardregi">';
                    echo '<img src="./admin/vista/fotos_funcio/' . $row->foto . '" class="circle-img mx-auto d-block" alt="Foto de ' . $row->nombre . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row->nombre . '</h5>';
                    echo '<p class="card-text">' . $row->subcargo . '</p>';
                    echo '<a href="mailto:' . $row->correo . '" class="text-muted">' . $row->correo . '</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12">';
                echo '<p class="text-center">No se encontraron funcionarios.</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
