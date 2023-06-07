// ==============================================
// Editar Perfil Validaciones 
// ==============================================

$("#UE").hide();

$("#usuarioN").change(function(){
	
	$("#UE").hide();
	var usuario = $(this).val();
	var userA = $("#usuarioA").val();

	var datos = new FormData();
	datos.append("VerificarUsuario", usuario);

	$.ajax({

		url: "Ajax/usuariosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			if(resultado){

				if(usuario != userA){

					$("#UE").show();
					$("#usuarioN").val("");

				}
				
			}

		}

	})

})


$("#EE").hide();

$("#emailN").change(function(){

	$("#EE").hide();

	var mail = $(this).val();
	var emailA = $("#emailA").val();

	var datos = new FormData();
	datos.append("VerificarEmail", mail);

	$.ajax({

		url: "Ajax/usuariosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			if(resultado){

				if(mail != emailA){

					$("#EE").show();
					$("#emailN").val("");

				}

			}

		}

	})

})




// function toggle() {
//   var x = document.getElementById("toggle");
//   var z = document.getElementById("black");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//     z.style.display = "block";
//     document.body.style.overflow = 'hidden';
//   } else {
//     x.style.display = "none";
//     z.style.display = "none";
//     document.body.style.overflow = 'scroll';
//   }
// }
// function noti() {
//   var x = document.getElementById("noti");
//   var z = document.getElementById("black");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//     z.style.display = "block";
//     document.body.style.overflow = 'hidden';
//   } else {
//     x.style.display = "none";
//     z.style.display = "none";
//     document.body.style.overflow = 'scroll';
//   }
// }
// function closeAll(){
//     var x = document.getElementById("noti");
//     var y = document.getElementById("toggle");
//     var z = document.getElementById("black");
//     x.style.display = "none";
//     z.style.display = "none";
//     y.style.display = "none";
//     document.getElementById("seguidores").style.display = "none";
//     document.body.style.overflow = 'scroll';
// }
// function showFollowers(){
//     document.getElementById("seguidores").style.display = "block";
//     document.getElementById("black").style.display = "block";
//     document.body.style.overflow = 'hidden';
// }
// function seeAll() {
//     var x = document.getElementsByClassName("recomendacion");
//     var i;
//     for (i = 0; i < x.length; i++) {
//         x[i].style.display = 'block';
//     }
//     var z = document.getElementsByClassName("solicitud");
//     var h;
//     for (h = 0; h < x.length; h++) {
//         z[h].style.display = 'block';
//     }
// }
// function seeRec() {
//     var x = document.getElementsByClassName("recomendacion");
//     var i;
//     for (i = 0; i < x.length; i++) {
//         x[i].style.display = 'block';
//     }
//     var z = document.getElementsByClassName("solicitud");
//     var h;
//     for (h = 0; h < x.length; h++) {
//         z[h].style.display = 'none';
//     }
// }
// function seeSol() {
//     var x = document.getElementsByClassName("recomendacion");
//     var i;
//     for (i = 0; i < x.length; i++) {
//         x[i].style.display = 'none';
//     }
//     var z = document.getElementsByClassName("solicitud");
//     var h;
//     for (h = 0; h < x.length; h++) {
//         z[h].style.display = 'block';
//     }
// }



function seguidores() {
  var x = document.getElementById("seguidores");
  var z = document.getElementById("black");
  if (x.style.display === "none") {
    x.style.display = "block";
    z.style.display = "block";
  } else {
    x.style.display = "none";
    z.style.display = "none";
  }
}

function seguidos() {
  var x = document.getElementById("seguidos");
  var z = document.getElementById("black");
  if (x.style.display === "none") {
    x.style.display = "block";
    z.style.display = "block";
  } else {
    x.style.display = "none";
    z.style.display = "none";
  }
}




// ============================================
// BUSCADOR SEGUIDORES
// ============================================
// $("#buscarSeg").on('keyup', function(){
	
// 	var busqueda = $("#buscarSeg").val();
// 	var url = $("#url").val();

// 	if(busqueda == ""){
// 		$("#SinBusq").show();
// 		$("#Busq").hide();
// 	}else{
// 		$("#SinBusq").hide();
// 		$("#Busq").show();

// 		var datos = new FormData();
// 		datos.append("busqueda", busqueda);

// 		$.ajax({

// 			url: "Ajax/usuariosA.php",
// 			method: "POST",
// 			data: datos,
// 			dataType: "json",
// 			cache: false,
// 			contentType: false,
// 			processData: false,

// 			success: function(resultado){

// 				resultado.forEach(function(word) {

// 				  	if(word[5] != ""){
// 		                var foto = url+word[5];
// 		            }else{
// 		                var foto = url+'Vistas/img/user.png';
// 		            }

// 				  $('#Busq').append('<p> <a href="Usuario/'+word[0]+'"><img src="'+foto+'" width="50px">'+word[4]+' - '+word[1]+'</a></p>');


// 				  console.log(resultado);
				  
// 				});

// 				// for (var i = 0; i < resultado.length; i+=1) {

// 				// 	if(resultado[i]["foto"] != ""){
// 		  //               var foto = url+resultado[i]["foto"];
// 		  //           }else{
// 		  //               var foto = url+'Vistas/img/user.png';
// 		  //           }

// 				// 	$('#Busq').append('<p> <a href="Usuario/'+resultado[i]["id"]+'"><img src="'+foto+'" width="50px">'+resultado[i]["nombre"]+' - '+resultado[i]["usuario"]+'</a></p>');

// 				// }


// 				// console.log(resultado);

// 			}

// 		})

// 	}
	

// })


$(obtener_registros());

function obtener_registros(busqueda)
{
  $.ajax({
    url : 'Ajax/usuariosA.php',
    type : 'POST',
    dataType : 'html',
    data : { busqueda: busqueda},
    })

  .done(function(resultado){

    var spl = resultado.substring(0, resultado.length - 4);
    
    $("#Busq").html(spl);
  })
}

$(document).on('keyup', '#buscarSeg', function()
{
  
  var valorBusqueda = $(this).val();

  if (valorBusqueda!="")
  {
    $("#SinBusq").hide();
    $("#Busq").show();
    obtener_registros(valorBusqueda);
  }
  else
    {
      $("#SinBusq").show();
      $("#Busq").hide();
      obtener_registros();
    }

  
});


// Buscador de Seguidos ----------------------
$(obtener_registros2());

function obtener_registros2(busqueda2)
{
  $.ajax({
    url : 'Ajax/usuariosA.php',
    type : 'POST',
    dataType : 'html',
    data : { busqueda2: busqueda2},
    })

  .done(function(resultado){

    var spl2 = resultado.substring(0, resultado.length - 4);
    
    $("#Busq2").html(spl2);
  })
}

$(document).on('keyup', '#buscarSeg2', function()
{
  
  var valorBusqueda2 = $(this).val();

  if (valorBusqueda2!="")
  {
    $("#SinBusq2").hide();
    $("#Busq2").show();
    obtener_registros2(valorBusqueda2);
  }
  else
    {
      $("#SinBusq2").show();
      $("#Busq2").hide();
      obtener_registros2();
    }

  
});
