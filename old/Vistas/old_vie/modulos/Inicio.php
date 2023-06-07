

        <div class="content">
            <div class="avcon">
                <div class="arrow">
                     <img src="Vistas/img/images/left.png" class="arrow" onclick="reload();">
                </div>
                <div class="row avcon_inner">
                    <div class="col-lg-7" id="btn-p">
                        <div class="card show">
                            <img class="show" id="initial">
                        </div>
                        <div class="watch">
                            <div class="calif">
                                <h1 id="movTit"></h1>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="Vistas/img/images/home-return.png">
                                </div>
                                <div class="col-lg-3">
                                    <input type="hidden" id="id_peli" name="id_pelicula">
                                    <?php

                                    echo '<input type="hidden" id="id_user" name="id_user" value="'.$_SESSION["id"].'">';
                                    ?>
                                    
                                    <button class="btn-x" id="btn-nm"><img src="Vistas/img/images/home-error.png"></button>
                                </div>

                                <div class="col-lg-3">
                                    <img src="Vistas/img/images/home-seen.png" id="img-res" idP="" onclick="resena()" style="cursor:pointer;">
                                </div>

                                <div class="col-lg-3">
                                    <img src="Vistas/img/images/home-share.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 info">
                        <p>DIRECTED BY</p>
                        <h2 id="director"></h2>
                        <div class="detail">
                            
                        </div>
                        <div class="h2 color-white">
                            
                        </div>
                        <div class="desc" id="desc">
                        </div>
                        <div class="where">
                            <h3>Ver ahora en:</h3>
                            <div class="row">
                                <div class="col-lg-3 plats">
                                    <img id="platforms">
                                </div>
                            </div>
                            <h3 class="mt-4">Elenco</h3>
                            <h3 class="mt-4 line">Sugerencias</h3>
                            <div class="row">
                                <div class="col-lg-3 mt-3">
                                    <img class="show" id="similar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arrow">
                    <img src="Vistas/img/images/right.png" class="arrow" onclick="reload();">
                </div>
            </div>
        </div>


<div class="editar" id="resena"  style="display:none;">
    <div class="editar_close">
        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/close.png" class="close" onclick="resena()">
    </div>
    <h4>Deja Tu Reseña</h4>

    <br>

    <form id="form-res">
      <p class="clasificacion">
        <input id="radio1" type="radio" name="estrellas" value="5"><!--
        --><label for="radio1">★</label><!--
        --><input id="radio2" type="radio" name="estrellas" value="4"><!--
        --><label for="radio2">★</label><!--
        --><input id="radio3" type="radio" name="estrellas" value="3"><!--
        --><label for="radio3">★</label><!--
        --><input id="radio4" type="radio" name="estrellas" value="2"><!--
        --><label for="radio4">★</label><!--
        --><input id="radio5" type="radio" name="estrellas" value="1"><!--
        --><label for="radio5">★</label>
      </p>
      <input type="text" id="comentario-res" placeholder="Deja un Comentario Opcional">
      <input type="hidden" id="id_p">
      <br>
      <button type="button" id="btn-resena">Dejar Deseña</button>
    </form>

</div>

    <script type="text/javascript">

        let imgPath = "https://image.tmdb.org/t/p/original";
        let mainImgPath = "https://image.tmdb.org/t/p/w500";

        let mainURL = "https://api.themoviedb.org/3/movie/";
        let APIkey = "?api_key=f359e4f5496836068edda48527fe8c58";
        let baseMovURL = "https://api.themoviedb.org/3/discover/movie?api_key=f359e4f5496836068edda48527fe8c58&language=es&sort_by=popularity.desc";
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
                $("#img-res").attr("idP", movieId);



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


        function resena() {
  var x = document.getElementById("resena");
  var z = document.getElementById("black");
  if (x.style.display === "none") {
    x.style.display = "block";
    z.style.display = "block";
  } else {
    x.style.display = "none";
    z.style.display = "none";
  }
}
        

    </script>