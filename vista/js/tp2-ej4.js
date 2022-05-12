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

		//console.log(Object.keys($("#contactForm").validate().invalid).length);

		if (/^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test($('#telefono').val())) {
			if (Object.keys($("#contactForm").validate().invalid).length == 0) {
				submit()
				//console.log(submit())
			}
		} else alert('Telefono mal formateado, debe ser: (123) 456-7890, (123)456-7890, 123-456-7890, 123.456.7890, 1234567890, +31636363634, 075-63546725')
		//else console.log("Datos no enviado")

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