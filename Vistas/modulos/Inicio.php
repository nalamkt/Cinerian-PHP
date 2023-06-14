
<div class="content row" id="social" onclick="hideSearch()">

    <div class="col-9 px-5">
        <!-- INICIO DE PUBLICACION -->

        <?php

        $resultado = PeliculasC::PelisVistas2C();

        foreach ($resultado as $key => $value) {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.themoviedb.org/3/movie/'.$value["id_pelicula"].'?api_key=f359e4f5496836068edda48527fe8c58&language=es');

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

            $headers = array();
            $headers[] = 'Accept: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            curl_close($ch);

            $result = json_decode($result, true);

            $ch1 = curl_init();

            curl_setopt($ch1, CURLOPT_URL, 'https://api.themoviedb.org/3/movie/'.$value["id_pelicula"].'/images?api_key=f359e4f5496836068edda48527fe8c58');

            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'GET');

            $headers = array();
            $headers[] = 'Accept: application/json';
            curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);

            $imgP = curl_exec($ch1);

            curl_close($ch1);

            $imgP = json_decode($imgP, true);


            $columna = 'id';
            $valor = $value["id_usuario"];

            $user = UsuariosC::VerUsuariosC($columna, $valor);

            if($user["foto"] != ""){
                $imgPerfil = $user["foto"];
            }else{
                $imgPerfil = 'Vistas/img/user.png';
            }


            // Buscar si la persona esta en mi lista de seguidos
            $columna = 'id_seguidor';
            $valor = $_SESSION["id"];

            $columna2 = 'id_user';
            $id_user = $value["id_usuario"];

            $comprobar = UsuariosC::ComprobarSeguidoC($columna, $valor, $columna2, $id_user);

            if($comprobar != false){
                
                echo '<div class="card">
                
                    <div class="row">
                            <div class="col-3 col-md-2 profpic">
                                <img src="'.$urlP.''.$imgPerfil.'">
                            </div>
                            <div class="col-9 col-md-10">
                                <p class="text-white social-title">
                                    <b>'.$user["nombre"].'</b> vio
                                </p>
                                <p class="mov-tit">'.$result["title"].'</p>
                                <div class="clear"></div>
                                <div class="social-title">
                                    Puntuación: ';

                                 echo 
                                    include('starcomplete.php');
                                    include('starcomplete.php');
                                    include('starcomplete.php');
                                    include('starnofill.php');
                                    include('starnofill.php');
                                echo '
                                </div>
                            </div>
                        </div>
                    <div class="col-12 mt-3 px-0">
                        <img src="https://image.tmdb.org/t/p/w500'.$imgP["posters"][0]["file_path"].'" class="w-100 br24 minglow">

                    </div>
                    <div class="row px-0">';
                    include('buttons.php');
                    echo '
                        </div>
                    <div class="row px-5">
                        <div class="col-1 seen text-right">
                            <div class="row">
                                <div class="col-4">
                                    <img src="'.$urlP.'Vistas/img/images/smiley.png" class="w-100">
                                </div>
                                <div class="col-4">
                                    <img src="'.$urlP.'Vistas/img/images/profile.png" class="w-100">
                                </div>
                                <div class="col-4">
                                    <img src="'.$urlP.'Vistas/img/images/smiley.png" class="w-100">
                                </div>
                            </div>
                        </div>
                        <div class="col-10 text-left seen">
                            <b>Martina</b> y <b>otros</b> vieron esta película
                        </div>
                    </div>
                    <p class="px-4 py-3">Ver los 24 comentarios</p>
                </div>';

            }  

        }

        ?>
        

        <!-- FIN DE PUBLICACION -->

<!--         <div class="card">
                <div class="row">
                    <div class="col-2">
                        <img src="<?php //echo $urlP; ?>Vistas/img/images/profile.png" width="90">
                    </div>
                    <div class="col-10">
                        <p class="text-white social-title">
                            <b>Johanna Rawson</b> vio y calificó con

                            include('estre.php');
                        </p>
                        <p class="cn font-weight-bold social-title">Rush</p>
                    </div>
               <div class="col-2 text-right">
                        <svg viewBox="0 0 100 100" width="60%">
                          <defs>
                            <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                              <stop offset="0%" stop-color="#FF9900"/>
                              <stop offset="100%" stop-color="#FFDA00"/>
                            </linearGradient>
                          </defs>
                          <polygon points="50,0 61.803,35.355 98.197,35.355 68.405,57.745 79.608,93.098 50,70.708 20.392,93.098 31.595,57.745 1.803,35.355 38.197,35.355" fill="url(#grad)"/>
                          <text x="50" y="65" text-anchor="middle" font-size="40" font-weight="900" fill="#000">2</text>
                        </svg>

                    </div> -->
                <!-- </div>
                <div class="col-12 mt-3 px-0">
                    <img src="<?php //echo $urlP; ?>Vistas/img/images/peliculas/rush.jpeg" class="w-100 br24 minglow">
                </div>
                <div class="row px-4">
                    <div class="col-5 buttons">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?php //echo $urlP; ?>Vistas/img/images/like.png">
                            </div>
                            <div class="col-4">
                                <img src="<?php //echo $urlP; ?>Vistas/img/images/comentar.png">
                            </div>
                            <div class="col-4">
                                <img src="<?php //echo $urlP; ?>Vistas/img/images/mas.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-right buttons">
                        <img src="<?php //echo $urlP; ?>Vistas/img/images/visto.png">
                    </div>
                </div>
                <div class="row px-5">
                    <div class="col-1 seen text-right">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?php //echo $urlP; ?>Vistas/img/images/smiley.png" class="w-100">
                            </div>
                            <div class="col-4">
                                <img src="<?php //echo $urlP; ?>Vistas/img/images/profile.png" class="w-100">
                            </div>
                            <div class="col-4">
                                <img src="<?php //echo $urlP; ?>Vistas/img/images/smiley.png" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-10 text-left seen">
                        <b>Martina</b> y <b>otros</b> vieron esta película
                    </div>
                </div>
                <p class="px-4 py-3">Ver los 24 comentarios</p>
            </div> --> 
        

    </div>
              
</div>

