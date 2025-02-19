<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>NavBar</title>
  </head>

  <body class="">

    <!-- Inicio del menu -->
    
      <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
        <div class="container-fluid">
        <!-- icono o nombre -->

        <a class="navbar-brand" href="#">
          <i class="bi bi-flower1"></i>
          <span class="text-warning">Intelio</span>
        </a>
            
        <!-- boton del menu -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

          <!-- elementos del menu colapsable -->

        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Precios</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Servicios
              </a>

              <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Renta</a></li>
                <li><a class="dropdown-item" href="#">Equipos</a><li>   
                <li><a class="dropdown-item" href="#">Networking</a></li>
              </ul>
            </li>
          </ul>

          <hr class="d-md-none text-white-50">

           <!-- enlaces redes sociales -->

          <ul class="navbar-nav  flex-row flex-wrap text-light">

           <li class="nav-item col-6 col-md-auto p-3">
                <i class="bi bi-twitter"></i>
                <small class="d-md-none ms-2">Twitter</small>  
            </li>

            <li class="nav-item col-6 col-md-auto p-3">
              <i class="bi bi-github"></i>
              <small class="d-md-none ms-2">GitHub</small> 
            </li>

            <li class="nav-item col-6 col-md-auto p-3">
              <i class="bi bi-whatsapp"></i>
              <small class="d-md-none ms-2">WhatsApp</small>
            </li>

            <li class="nav-item col-6 col-md-auto p-3">
              <i class="bi bi-facebook"></i>
              <small class="d-md-none ms-2">Facebook</small>
            </li>

          </ul>
          
         <!--boton Informacion -->

          <form class="d-flex">
            <button class="btn btn-outline-warning d-none d-md-inline-block " type="submit">Informacion</button>
          </form>
          
          
        </div>
     
        </div>  
      </nav>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>