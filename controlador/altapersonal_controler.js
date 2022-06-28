// const expresiones = {
// 	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
// 	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
// 	password: /^.{4,12}$/, // 4 a 12 digitos.
// 	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
// 	telefono: /^\d{7,14}$/ // 7 a 14 numeros.


const formulario = document.getElementById('formulario');

formulario.addEventListener('submit', (e)=>{
	e.preventDefault();
})

$(document).ready(function () {


	$('#password2').keyup(function () { 
		
		pass1 = $('#password1').val();
		pass2 = $('#password2').val();

		if (pass1 == pass2 && pass1.length >= 8 && pass2.length >=8) {

			$('#password1').removeClass('border-danger');
			$('#password2').removeClass('border-danger');
			$('#password1').addClass('border-success');
			$('#password2').addClass('border-success');
			
		}
		else{

			$('#password1').removeClass('border-success');
			$('#password2').removeClass('border-success');
			$('#password1').addClass('border-danger');
			$('#password2').addClass('border-danger');

		}
	});
})
