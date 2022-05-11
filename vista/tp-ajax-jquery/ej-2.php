<?php include_once("../components/header.php"); ?>

<!-- Content -->
<div class="container row main-content mx-auto align-items-center my-5 p-3 w-75">

  <div class="container dominio">
    <ul class="nav my-3 justify-content-center" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link custom-link active" id="pills-nombre-tab" data-bs-toggle="pill" data-bs-target="#pills-nombre" type="button" role="tab" aria-controls="pills-nombre" aria-selected="true">
          Primavera & Verano
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link custom-link" id="pills-razones-tab" data-bs-toggle="pill" data-bs-target="#pills-razones" type="button" role="tab" aria-controls="pills-razones" aria-selected="false">
          Otoño & Invierno
        </a>
      </li>
    </ul>

    <div class="tab-content content-text" id="pills-tabContent">

      <!-- nombre primavera/verano tab -->
      <div class="tab-pane fade show active text-center" id="pills-nombre" role="tabpanel" aria-labelledby="pills-nombre-tab">
      </div>

      <!-- OTOÑO INVIERNO tab -->
      <div class="tab-pane fade text-center" id="pills-razones" role="tabpanel" aria-labelledby="pills-razones-tab">
      </div>

    </div>
  </div>
</div>

<script src="../js/tp2-ej2.js" defer></script>

<?php include_once("../components/footer.php"); ?>