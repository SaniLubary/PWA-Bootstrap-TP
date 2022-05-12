$(function () {
	'use strict';

	// Form
	var contactForm = function () {
		$("#contactForm").validate({
			rules: {
				nombre: {
					required: true,
					maxlength: 10
				},
				empresa: {
					required: true,
					maxlength: 10
				},
				telefono: {
					required: true,
					maxlength: 10
				},
				mail: {
					required: true,
					email: true
				},
				comentario: {
					required: true,
					maxlength: 50
				}
			},
			comentario: {
				nombre: "Ingrese su nombre",
				empresa: "Indique una empresa",
				telefono: "Indique un telefono valido xxx-xxx-xxxx",
				mail: "Ingrese una direccion de correo valida",
				comentario: "Ingrese un comentario"
			},

		});
	};

	// Iniciamos la validacion del formulario
	contactForm();

	// Enviamos respuesta on submit al servidor
	$("#contactForm").submit(function (event) {
		event.preventDefault();

		if ($("#contactForm").validate()) {
			submit()
		}

	});


});

async function submit() {
	const rawResponse = await fetch('http://localhost:8001/requests/contacto', {
		method: 'POST',
		headers: {
			'Accept': 'application/json',
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			nombre: $('#nombre').val(),
			empresa: $('#empresa').val(),
			telefono: $('#telefono').val(),
			mail: $('#mail').val(),
			comentario: $('#comentario').val()
		})
	});



	const content = await rawResponse.json();
	console.log(content);
};