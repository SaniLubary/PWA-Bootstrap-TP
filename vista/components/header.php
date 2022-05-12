<?php include "/var/www/html/config.php"; ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GaTop</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/index.css">
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

</head>

<!-- este body se cierra en footer.php -->

<body>
  <!-- Header -->
  <header class="container w-75 mx-auto mt-3">
    <div class="row">
      <a href="/vista/tp-ajax-jquery" class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 d-flex justify-content-center align-items-center title">
        ropa para gatos</a>
      <a href="/vista/tp-ajax-jquery" class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 d-flex justify-content-center align-items-center logo">
        <img src="../assets/Logo.png" alt="logo del grupo">
      </a>
      <a href="/vista/tp-ajax-jquery" class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 d-flex justify-content-center align-items-center title">
        felicidad para vos</a>
    </div>
  </header>
  <!-- Separator -->
  <div class="separador w-75 border border-1 mx-auto my-3"></div>

  <!-- Nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light w-50 mx-auto rounded-3">
    <div class="container-fluid">
      <ul class="navbar-nav w-100 nav justify-content-around">
        <li class="nav-item">
          <a class="nav-link custom-link" aria-current="page" href="/vista/tp-ajax-jquery">Inicio</a>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link custom-link" href="/vista/tp-bootstrap/ej-0.html" role="button">
            Bootstrap
          </a>
        </li>

        <li class="nav-item dropdown ">
          <a class="nav-link custom-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ajax &AMP; jquery
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="ej-1.php">Ejercicio 1 Selects</a></li>
            <li><a class="dropdown-item" href="ej-2.php">Ejercicio 2 Tabs</a></li>
            <li><a class="dropdown-item" href="ej-3-ex11.php">Ejercicio 3 Modal</a></li>
            <li><a class="dropdown-item" href="ej-3-ex11.php">Ejercicio 4 Form</a></li>
            <li><a class="dropdown-item" href="ej-5.php">Ejercicio 5 Table</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>