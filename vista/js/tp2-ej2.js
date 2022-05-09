$(document).ready(function () {
  fetch('http://localhost:8001/requests/tab')
    .then(response => response.json())
    .then(data => {
      $('#pills-nombre').append(data.payload[0].contenido);
      $('#pills-razones').append(data.payload[1].contenido);
    })
    .catch(error => console.error(error));
});