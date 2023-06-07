// =============================================
// Solicitudes

// Enviar Solicitudes
$("#CancelSol").hide();
$("#Soli").on("click", "#SeguirSol", function(){

	var id_u = $("#id_usuario").val();
	var url = $("#url").val();

	var datos = new FormData();

	datos.append("id_u", id_u);

	$.ajax({

		url: url+"Ajax/solicitudesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#CancelSol").show();
			$("#SeguirSol").hide();

		}

	})


})

$("#Soli").on("click", "#SeguirSol1", function(){

	var id_u = $("#id_usuario").val();
	var url = $("#url").val();

	var datos = new FormData();

	datos.append("id_u", id_u);

	$.ajax({

		url: url+"Ajax/solicitudesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#CancelSol1").show();
			$("#SeguirSol1").hide();

		}

	})


})

// Cancelar Solicitudes
$("#SeguirSol1").hide();
$("#Soli").on("click", "#CancelSol1", function(){

	var id_uCancelar = $("#id_usuario").val();
	var url = $("#url").val();

	var datos = new FormData();

	datos.append("id_uCancelar", id_uCancelar);

	$.ajax({

		url: url+"Ajax/solicitudesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#SeguirSol1").show();

			$("#CancelSol1").hide();

		}

	})


})

$("#Soli").on("click", "#CancelSol", function(){

	var id_uCancelar = $("#id_usuario").val();
	var url = $("#url").val();

	var datos = new FormData();

	datos.append("id_uCancelar", id_uCancelar);

	$.ajax({

		url: url+"Ajax/solicitudesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#SeguirSol").show();

			$("#CancelSol").hide();

		}

	})


})



$("#SSGG2").hide();
$("#SeguirSol3").hide();
$("#CancelSol3").hide();
$("#Soli").on("click", "#DejarDeSeguir", function(){

	var id_uDejar = $("#id_usuario").val();
	var url = $("#url").val();

	var datos = new FormData();

	datos.append("id_uDejar", id_uDejar);


	var perfil = $("#perfilP").val();

	$.ajax({

		url: url+"Ajax/solicitudesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#SSGG2").show();

			$("#SSGG").hide();

			$("#SeguirSol3").show();

			$("#DejarDeSeguir").hide();

			if(perfil == 1){

				$(".perPr").show();

				$(".perP").hide();

			}
			


		}

	})


})



// Borrar Solicitudes
// $("#CancelSol").hide();
$(".solicitudesNot").on("click", ".borrarSol", function(){

	var id_solicitud = $(this).attr("idSol");
	var url = $("#url").val();

	var datos = new FormData();

	datos.append("id_solicitud", id_solicitud);

	$.ajax({

		url: url+"Ajax/solicitudesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#aceptarSol"+id_solicitud).hide();
			$("#borrarSol"+id_solicitud).hide();

		}

	})

})

// Aceptar Solicitudes
$(".aceptado").hide();
$(".solicitudesNot").on("click", ".aceptarSol", function(){

	var id_solicitudAceptada = $(this).attr("idSolA");
	var seg = $(this).attr("segEst");
	var url = $("#url").val();

	var datos = new FormData();

	datos.append("id_solicitudAceptada", id_solicitudAceptada);

	$.ajax({

		url: url+"Ajax/solicitudesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#aceptarSol"+id_solicitudAceptada).hide();
			$("#borrarSol"+id_solicitudAceptada).hide();
			$("#aceptado"+id_solicitudAceptada).show();

			// Seguir Tambien
			$("#solEnv"+id_solicitudAceptada).hide();
			$(".solicitudesNot").on("click", "#aceptado"+id_solicitudAceptada, function(){

				if($(this).attr("ST") == "Si"){

					var id_solicitudEnv = $(this).attr("idSolB");
					var datos = new FormData();

					datos.append("id_solicitudEnv", id_solicitudEnv);

					$.ajax({

						url: url+"Ajax/solicitudesA.php",
						method: "POST",
						data: datos,
						dataType: "json",
						cache: false,
						contentType: false,
						processData: false,

						success: function(resultado){

							$("#aceptado"+id_solicitudAceptada).hide();
							$("#solEnv"+id_solicitudAceptada).show();

						}

					})

				}

			})


		}

	})

})

