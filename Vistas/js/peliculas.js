$("#btn-p").on("click", "#img-res", function(){

	$('#id_p').val($(this).attr("idP"));

})


$("#btn-resena").click(function(){

	var resena = $('input:radio[name=estrellas]:checked').val();

	if($("#comentario-res").change()){

		var comentario = $("#comentario-res").val();

	}else{

		var comentario = "";

	}

	var id_peliR = $('#id_p').val();

	var datos = new FormData();
	datos.append("resena", resena);
	datos.append("id_peliR", id_peliR);
	datos.append("comentario", comentario);

	$.ajax({

		url: "Ajax/peliculasA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			console.log('isisisi');

		}

	})

	// console.log(datos);


})

		


$("#No_me_gusta").click(function(){

	var id_peliNG = $(this).attr('PeliId');

	var datos = new FormData();
	datos.append("id_peliNG", id_peliNG);

	$.ajax({

		url: "Ajax/peliculasA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			console.log('isisisi');

		}

	})

	// console.log(datos);


})

