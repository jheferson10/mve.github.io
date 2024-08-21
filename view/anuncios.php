<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: white;
    display: flex;
    flex-direction: row;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: 20px;
    border-radius: 8px;
}

.image-section {
    padding: 20px;
    text-align: center;
    border-right: 1px solid #ddd;
    flex-basis: 40%;
}

.image-section img {
    height: auto;
    border-radius: 5px;
    width: auto;
}

.name-title {
    font-size: 16px;
    color: #555;
    margin-top: 10px;
}

.text-section {
    padding: 20px;
    flex-grow: 1;
}

.text-section h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.text-section p {
    font-size: 16px;
    line-height: 1.6;
    color: #666;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
        max-width: 100%;
        margin: 10px;
    }

    .image-section {
        border-right: none;
        border-bottom: 1px solid #ddd;
        flex-basis: auto;
        padding-bottom: 0;
        width: auto;
    }

    .text-section {
        padding-top: 0;
    }
}

@media (max-width: 480px) {
    .text-section h1 {
        font-size: 20px;
    }

    .text-section p {
        font-size: 14px;
    }

    .name-title {
        font-size: 14px;
    }
    .image-section{
        width: 100%;
    }
}


</style>
<body>
    <div class="container">
        <div class="image-section">
            <img src="../images/alcalde.jpg" alt="Alcalde Juan Carlos Arango Claudio">
            <p class="name-title">Abog. Juan Carlos Arango Claudio<br>Alcalde 2023 - 2026</p>
        </div>
        <div class="text-section">
            <h1>Bienvenidos</h1>
            <p>
                Les damos la más cordial bienvenida a este espacio digital donde usted podrá encontrar toda la información que necesita sobre nuestra institución. Conscientes de que la tecnología es un soporte muy importante para el logro de nuestros objetivos, debemos indicar que, desde la municipalidad, con miras a la celebración del Bicentenario de la República, visionamos a Huamanga como una provincia al rescate de su patrimonio construido, a través de megaproyectos que nos permitirán tener un lugar más seguro, ordenado, limpio y acogedor.
            </p>
            <p>
                En este período de gobierno municipal, inspirados por un fuerte sentimiento de amor por nuestra querida tierra, nos proponemos convertir Ayacucho en un lugar para todos.
            </p>
        </div>
    </div>
</body>
</html>
