
$("#user").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

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

				$("#user").parent().after('<div class="alert alert-danger">El Usuario ya Existe.</div>');
				$("#user").val("");

			}

		}

	})

})



$("#mail").change(function(){

	$(".alert").remove();

	var mail = $(this).val();

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

				$("#mail").parent().after('<div class="alert alert-danger">El Email ya Existe.</div>');
				$("#mail").val("");

			}

		}

	})

})


$("#c1").change(function(){

	var C1 = $('#c1').val();

	$(".alert").remove();

	if(C1.length >= 6){

		$("#c2").change(function(){

			$(".alert").remove();

			var C2 = $(this).val();

			if(C1 != C2){

				$("#c2").parent().after('<div class="alert alert-danger">Las Contraseñas no Coinciden.</div>');
				$("#c2").val("");

			}

		})

	}else{

		$("#c1").parent().after('<div class="alert alert-danger">La Contraseña debe tener al menos 6 carácteres.</div>');
		$("#c1").val("");

	}

})



$("#btn-p").on("click", "#btn-nm", function(){

	var id_peli = $("#id_peli").val();

	var datos = new FormData();

	datos.append("id_peli", id_peli);

	$.ajax({

		url: "Ajax/peliculasA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			function reload(){
            const baseMov = new XMLHttpRequest();
            baseMov.open("GET", baseMovURL, true);
            baseMov.onload = function() {
                var response = JSON.parse(this.responseText);
                var array = response.results;
                var rand = Math.random() * (array.length - 0) + 0;
                console.log(array.length);
                rand = parseInt(rand);
                console.log(rand);
                array = response.results[rand];
        
                var movieId = array.id;

                $("#id_peli").val(movieId);

                var discoverURL = mainURL + movieId + APIkey + "&language=es";

                const discover = new XMLHttpRequest();
                discover.open("GET", discoverURL, true);
                discover.onload = function() {
                    var response = JSON.parse(this.responseText);
                    imgFile = response.poster_path;
                    document.getElementById("movTit").innerHTML = response.title;
                    var descIn = response.overview;
                    descIn = descIn.slice(0, 500)+' <a href="#">Ver más</a>';
                    document.getElementById("desc").innerHTML = descIn;
                }
                discover.send();

                const picture = new XMLHttpRequest();
                var getPic = mainURL + movieId + "/images" + APIkey;
                picture.open("GET",getPic,true);
                picture.onload = function() {
                    var response = JSON.parse(this.responseText);
                    document.getElementById("initial").src = mainImgPath + response.posters[3].file_path;

                }
                picture.send();


                const detail = new XMLHttpRequest();
                var getDet = mainURL + movieId + "/credits" + APIkey;
                detail.open("GET",getDet,true);
                detail.onload = function() {
                    var response = JSON.parse(this.responseText);
                    document.getElementById("director").innerHTML = response.crew[1].name;

                }
                detail.send();

                const platfotm = new XMLHttpRequest();
                var getPlat = mainURL + movieId + "/watch/providers" + APIkey;
                platfotm.open("GET",getPlat,true);
                platfotm.onload = function() {
                    var response = JSON.parse(this.responseText);
                    result = response.results.AR.flatrate[0].logo_path;
                    // for (var i = response.flatrate.length - 1; i >= 0; i--) {
                    //     Things[i]
                    // }
                    document.getElementById("platforms").src = imgPath + result;

                }
                platfotm.send();

                const similar = new XMLHttpRequest();
                var getSim = mainURL + movieId + "/similar" + APIkey;
                similar.open("GET",getSim,true);
                similar.onload = function() {
                    var response = JSON.parse(this.responseText);
                    // for (var i = response.flatrate.length - 1; i >= 0; i--) {
                    //     Things[i]
                    // }
                    document.getElementById("similar").src = imgPath + response.results[0].poster_path;

                }
                similar.send();
                            

            }
            baseMov.send();
        }
        reload();
			

		}

	})

	// console.log(datos);


})


 function toggle() {
  var x = document.getElementById("toggle");
  var z = document.getElementById("black");
  if (x.style.display === "none") {
    x.style.display = "block";
    z.style.display = "block";
  } else {
    x.style.display = "none";
    z.style.display = "none";
  }
}
            
            function noti() {
              var x = document.getElementById("noti");
              var z = document.getElementById("black");
              if (x.style.display === "none") {
                x.style.display = "block";
                z.style.display = "block";
              } else {
                x.style.display = "none";
                z.style.display = "none";
              }
            }
            function seeAll() {
                var x = document.getElementsByClassName("recomendacion");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = 'block';
                }
                var z = document.getElementsByClassName("solicitud");
                var h;
                for (h = 0; h < x.length; h++) {
                    z[h].style.display = 'block';
                }
            }
            function seeRec() {
                var x = document.getElementsByClassName("recomendacion");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = 'block';
                }
                var z = document.getElementsByClassName("solicitud");
                var h;
                for (h = 0; h < x.length; h++) {
                    z[h].style.display = 'none';
                }
            }
            function seeSol() {
                var x = document.getElementsByClassName("recomendacion");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = 'none';
                }
                var z = document.getElementsByClassName("solicitud");
                var h;
                for (h = 0; h < x.length; h++) {
                    z[h].style.display = 'block';
                }
            }