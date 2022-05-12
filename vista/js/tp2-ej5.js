$(document).ready(async function () {
  // Get contactos
  const contactos = await fetch('http://localhost:8001/requests/contacto/')
    .then(response => response.json())
    .then(data => {
      return data.payload
    })
    .catch(error => console.error(error));

  const data = contactos.map(contacto => Object.values(contacto))
  console.log(data);
  $('#table').DataTable({
    data: data,
    columns: [
      { title: "Id" },
      { title: "Nombre" },
      { title: "Empresa" },
      { title: "Telefono" },
      { title: "Mail" },
      { title: "Comentario" }
    ],
    pageLength: 5,
    lengthMenu: [5, 10, 25],
    responsive: true,
    scrollY: 200,
    deferRender: true,
    scroller: true
  });
});





