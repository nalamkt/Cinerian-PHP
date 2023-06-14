
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
                        <img src="https://image.tmdb.org/t/p/w500'.$imgP["backdrops"][0]["file_path"].'" class="w-100 br24 minglow">
                        <img src="https://image.tmdb.org/t/p/w500'.$imgP["logos"][0]["file_path"].'" class="w-100 br24 minglow">

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
        

    </div>
              
</div>

