$(function() {

	'use strict';

	// Form

	var contactForm = function() {

		if ($("#contactForm").length > 0 ) {

			$( "#contactForm" ).validate( {
				
				rules: {
					nombre:{
						required: true,
						minlength: 10
					},
					empresa: {
						required: true,
						minlength: 10
					},
					telefono: {
						required: true,
						minlength: 10
					},
					mail: {
						required: true,
						email: true
					},
					comentario: {
						required: true,
						minlength: 10
					}
				},
				comentario: {
					nombre: "Ingrese su nombre",
					mail: "Ingrese una direccion de correo valida",
					comentario: "Ingrese un comentario"
				},
				
			} );
		}
		
	};
	async function submit() {
		const rawResponse = await fetch('http://localhost:8001/requests/contactos', {
		  method: 'POST',
		  headers: {
			'Accept': 'application/json',
			'Content-Type': 'application/json'
		  },
		  body: JSON.stringify({
			nombre: 'data del submit',
			empresa: 'data del submit',
			telefono: 'data del submit',
			mail: 'data del submit',
			comentario: 'data del submit'
		  })
		});
		
		const content = await rawResponse.json();
	  
		console.log(content);
	  };
	contactForm();

	 
});