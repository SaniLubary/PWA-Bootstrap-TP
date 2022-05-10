$(document).ready(async function () {
  // Obtenemos y carganmos las tabs para el ejercicio 2
  fetch('http://localhost:8001/requests/tab')
    .then(response => response.json())
    .then(data => {
      $('#pills-nombre').append(data.payload[0].contenido);
      $('#pills-razones').append(data.payload[1].contenido);
    })
    .catch(error => console.error(error));

  // Get estaciones
  const estaciones = await fetch('http://localhost:8001/requests/estacion')
    .then(response => response.json())
    .then(data => {
      return data.payload
    })
    .catch(error => console.error(error));

  // Get categorias
  const categorias = await fetch('http://localhost:8001/requests/categoria')
    .then(response => response.json())
    .then(data => {
      return data.payload
    })
    .catch(error => console.error(error));

  // Cargando estaciones en el select
  estaciones.map(estacion => {
    $('#estaciones').append(`<option value="${estacion.id}">${estacion.descripcion}</option>`)
  })

  $("#estaciones").change(function () {
    const idEstacion = $('#estaciones').find(":selected").val();
    const categoriasFiltrado = categorias.filter(categoria => categoria.estacion.id == idEstacion)

    // Cargando estaciones en el select
    categoriasFiltrado.map(categoria => {
      $('#categorias').append(`<option value="${categoria.id}">${categoria.descripcion}</option>`)
    })
  });
});