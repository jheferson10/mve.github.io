<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Municipio</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/7c18fa3a34.js" crossorigin="anonymous"></script>
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

        

</style>
<body>
    <?php
        include 'header.php';
    ?>
    <!-- Sección del encabezado -->
    <header class="header">
        <div class="overlay">
            <h1>Mi municipio</h1>
        </div>
    </header>

    <!-- Sección del mensaje -->
    <main class="container my-5">
        <div class="row g-4 align-items-center">
            <div class="col-md-6">
                <img src="../images/alcalde.jpg" alt="Logo del Municipio" class="col-md-6 w-100">
            </div>
            <div class="col-md-6">
                <h2>Mensaje</h2>
                <p>
                    Desde la Municipalidad Provincial de Huamanga queremos que nuestra ciudad sea una de las más íntegras del país, por ello estamos trabajando de manera articulada con los distritos a fin de convertir en realidad aquel sueño colectivo del nuevo Ayacucho, donde nace el Perú.
                </p>
                <p>
                    Hoy nuestra provincia es una tierra pujante, consciente de su valiosa herencia ancestral y que ve con optimismo el futuro. Un lugar que pertenece a aquellos cuyos retos se convierten en oportunidades para seguir creciendo.
                </p>
                <p>
                    Queremos compartir con el Perú y el mundo entero un municipio coherente con su misión. Que viene trabajando en favor del desarrollo social y económico de la población, con la activa...
                </p>
            </div>
        </div>
    </main>


    <div class="container-fluid">
        <div class="row">
            <!-- Misión -->
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center bg-primary text-white text-center p-5">
                <div>
                    <div class="mb-3">
                        <i class="fa-solid fa-crosshairs fa-5x" style="color: #ffffff;"></i>
                    </div>
                    <h2>Misión</h2>
                    <p>Promover el desarrollo integral y sostenible del distrito de Vizcatán del Ene; brindando servicios públicos de calidad para el cierre de brechas sociales y de infraestructura, basado en una gestión municipal, transparente, concertada, con identidad cultural y participación vecinal.</p>
                </div>
            </div>
            <!-- Visión -->
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center bg-danger text-white text-center p-5">
                <div>
                    <div class="mb-3">
                        <i class="fa-regular fa-handshake fa-5x" style="color: #ffffff;"></i>
                    </div>
                    <h2>Visión</h2>
                    <p>Nuestra visión es lograr ser una institución líder en la promoción del desarrollo integral de un distrito sostenible, seguro y ordenado, dentro de un entorno participativo y eficiente.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container text-center my-5">
        <h2 class="mb-5">Nuestros Principios</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="p-4 border rounded-circle text-center">
                    <i class="fas fa-handshake fa-3x text-pink"></i>
                    <p class="mt-3">Respeto</p>
                </div>
            </div>
            <div class="col">
                <div class="p-4 border rounded-circle text-center">
                    <i class="fas fa-hand-holding-heart fa-3x text-pink"></i>
                    <p class="mt-3">Probidad</p>
                </div>
            </div>
            <div class="col">
                <div class="p-4 border rounded-circle text-center">
                    <i class="fas fa-tasks fa-3x text-pink"></i>
                    <p class="mt-3">Eficiencia</p>
                </div>
            </div>
            <div class="col">
                <div class="p-4 border rounded-circle text-center">
                    <i class="fas fa-user-shield fa-3x text-pink"></i>
                    <p class="mt-3">Honradez</p>
                </div>
            </div>
            <div class="col">
                <div class="p-4 border rounded-circle text-center">
                    <i class="fas fa-certificate fa-3x text-pink"></i>
                    <p class="mt-3">Veracidad</p>
                </div>
            </div>
            <div class="col">
                <div class="p-4 border rounded-circle text-center">
                    <i class="fas fa-heart fa-3x text-pink"></i>
                    <p class="mt-3">Lealtad y obediencia</p>
                </div>
            </div>
            <div class="col">
                <div class="p-4 border rounded-circle text-center">
                    <i class="fas fa-map-marker-alt fa-3x text-pink"></i>
                    <p class="mt-3">Lealtad al estado de derecho</p>
                </div>
            </div>
            <div class="col">
                <div class="p-4 border rounded-circle text-center">
                    <i class="fas fa-balance-scale fa-3x text-pink"></i>
                    <p class="mt-3">Justicia y equidad</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row g-4 align-items-center">
            <!-- Imagen -->
            <div class="col-md-6">
                <img src="../images/sanmiguel.png" alt="Imagen de la Municipalidad" class="col-md-6 w-100">
            </div>
            <!-- Texto -->
            <div class="col-md-6">
                <h2>Ley de creación</h2>
                <p>
                    La Municipalidad Distrital de Vizcatán del Ene, en la provincia de Satipo, departamento de Junín, centro poblado San Miguel, inicia su funcionamiento por acuerdo de la Constitución de 1924, ratificado con la Ley de Municipalidades de 1822, D.L. No 51, posteriormente por la Ley Orgánica de Municipalidades N° 23853 (como Órgano de Gobierno Local).
                </p>
                <p>
                    Desde su creación hasta la fecha, el ámbito de jurisdicción del municipio ha sufrido cambios. En este sentido, en sus inicios el gobierno abarcaba toda la provincia, porque aún no se creaban los distritos.
                </p>
                <p>
                    Actualmente, el ámbito de jurisdicción, como Municipalidad Distrital de Vizcatán del Ene, es a nivel de varios centros poblados, siendo responsable de promover el desarrollo y cumpliendo funciones acordes a la Ley Orgánica de Municipalidades. Sin embargo, la gestión local y pliego es ejercido principalmente en el centro poblado de San Miguel.
                </p>
            </div>
        </div>
    </div>


    <?php 
        include 'footer.php'
    ?>
</body>
</html>
