<?php include_once("../components/header.php"); ?>

<!-- Content -->
<div class="container row main-content mx-auto align-items-center my-5 p-3 w-75">

  <div class="container dominio">
    <div class="m-5 row gx-5">
      <h5 class="text-center">Seleccionar una opcion del primer select, modificara las opciones posibles en el segundos</h5>
      <div class="col-xl-6 col-md-6 col-12 my-3">
        <select class="form-select" id="estaciones" aria-label="Default select example">
          <option selected>Seleccionar estacion del año</option>
        </select>
      </div>

      <div class="col-xl-6 col-md-6 col-12 my-3">
        <select class="form-select" id="categorias" aria-label="Default select example">
          <option selected>Seleccionar una Opcion</option>
        </select>
      </div>
    </div>
  </div>
</div>

<script src="../js/tp2-ej2.js" defer></script>

<?php include_once("../components/footer.php"); ?>