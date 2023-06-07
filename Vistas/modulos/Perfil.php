<div class="content">
    <div class="profile col">
        <div class="head_profile row">
            <div class="col-lg-4">
                <?php

                    $columna = 'id';
                    $valor = $_SESSION["id"];

                    $usuario = UsuariosC::VerUsuariosC($columna, $valor);

                    if($usuario["foto"] != ""){

                        echo '<img src="'.$generales["ruta"].$usuario["foto"].'">';

                    }else{

                        echo '<img src="'.$generales["ruta"].'Vistas/img/user.png">';

                    }


                ?>

            </div>
            <div class="col-lg-8 px-2">
                <div class="row">
                    <div class="col-lg-3">
                       <p class="user">@<?php echo $usuario["usuario"]; ?></p>
                    </div>
                    <div class="col-lg-8">
                        <button type="button" class="edit cursos-pointer" onclick="toggle()">Editar perfil</button>
                    </div>
                </div>
                <div class="row mt-4">
                    <?php

                    // Peliculas Vistas Contador
                    $columna = "id_usuario";
                    $valor = $_SESSION["id"];

                    $resultado = PeliculasC::PelisVistasC($columna, $valor);

                    $vistas = count($resultado);

                    echo '<div class="col-lg-4 cursor-pointer">
                            <div class="row">
                                <div class="col-3 mx-0 px-0 font-weight-bold h4 text-center">
                                    '.$vistas.'
                                </div>
                                <div class="col-4 mx-0 px-0 text-left pt-1">
                                    <p class="foll" >vistos</p>
                                </div>
                            </div>
                        </div>';

                    // Seguidores Contador
                    $columna = "id_user";
                    $valor = $_SESSION["id"];

                    $segs = UsuariosC::SeguidoresC($columna, $valor);

                    $seguidores = count($segs);

                    echo '<div class="col-lg-4 cursor-pointer" onclick="showFollowers()">
                        <div class="row">
                            <div class="col-3 mx-0 px-0 font-weight-bold h4 text-center">
                                '.$seguidores.'
                            </div>
                            <div class="col-4 mx-0 px-0 text-left pt-1">
                                <p class="foll" >seguidores</p>
                            </div>
                        </div>
                    </div>';

                    // Seguidos Contador
                    $columna = "id_seguidor";
                    $valor = $_SESSION["id"];

                    $segu = UsuariosC::SeguidoresC($columna, $valor);

                    $seguidos = count($segu);

                    echo '<div class="col-lg-4 cursor-pointer" onclick="showFollowers2()">
                            <div class="row">
                                <div class="col-3 mx-0 px-0 font-weight-bold h4 text-center">
                                    '.$seguidos.'
                                </div>
                                <div class="col-4 mx-0 px-0 text-left pt-1">
                                    <p class="foll" >seguidos</p>
                                </div>
                            </div>
                        </div>';

                    ?>
                   
                </div>
               <!--  <div class="row text-center mb-3">
                    <div class="col-lg-4">
                        VISTOS
                    </div>
                    <div class="col-lg-4 cursor-pointer" onclick="showFollowers()">
                        SEGUIDORES
                    </div>
                   <div class="col-lg-4 cursor-pointer" onclick="showFollowers()">
                        SEGUIDOS
                    </div>
                </div> -->
                <div class="row">
                    <h2><?php echo $usuario["nombre"]; ?></h2>
                </div>
                <br>
                <div class="row">
                    <p><?php echo $usuario["info"]; ?></p>
                </div>
            </div>
        </div>
        <div class="opciones row">
            <div class="col-lg-4">
                Mi Lista
            </div>
            <div class="col-lg-4">
                Películas
            </div>
            <div class="col-lg-4">
                Series
            </div>
        </div>
        <div class="top-rated row mt-4">
            <div class="col-lg-12 text-left">
                <h3>TOP RATED 
                    <svg viewBox="0 0 100 100" width="2%">
                                      <defs>
                                        <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                                          <stop offset="0%" stop-color="#FF9900"/>
                                          <stop offset="100%" stop-color="#FFDA00"/>
                                        </linearGradient>
                                      </defs>
                                      <polygon points="50,0 61.803,35.355 98.197,35.355 68.405,57.745 79.608,93.098 50,70.708 20.392,93.098 31.595,57.745 1.803,35.355 38.197,35.355" fill="url(#grad)"/>
                    </svg>
                    <svg viewBox="0 0 100 100" width="2%">
                      <defs>
                        <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                          <stop offset="0%" stop-color="#FF9900"/>
                          <stop offset="100%" stop-color="#FFDA00"/>
                        </linearGradient>
                      </defs>
                      <polygon points="50,0 61.803,35.355 98.197,35.355 68.405,57.745 79.608,93.098 50,70.708 20.392,93.098 31.595,57.745 1.803,35.355 38.197,35.355" fill="url(#grad)"/>
                    </svg>
                    <svg viewBox="0 0 100 100" width="2%">
                      <defs>
                        <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                          <stop offset="0%" stop-color="#FF9900"/>
                          <stop offset="100%" stop-color="#FFDA00"/>
                        </linearGradient>
                      </defs>
                      <polygon points="50,0 61.803,35.355 98.197,35.355 68.405,57.745 79.608,93.098 50,70.708 20.392,93.098 31.595,57.745 1.803,35.355 38.197,35.355" fill="url(#grad)"/>
                    </svg>
                    <svg viewBox="0 0 100 100" width="2%">
                      <defs>
                        <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                          <stop offset="0%" stop-color="#FF9900"/>
                          <stop offset="100%" stop-color="#FFDA00"/>
                        </linearGradient>
                      </defs>
                      <polygon points="50,0 61.803,35.355 98.197,35.355 68.405,57.745 79.608,93.098 50,70.708 20.392,93.098 31.595,57.745 1.803,35.355 38.197,35.355" fill="url(#grad)"/>
                    </svg>
                    <svg viewBox="0 0 100 100" width="2%">
                      <defs>
                        <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                          <stop offset="0%" stop-color="#FF9900"/>
                          <stop offset="100%" stop-color="#FFDA00"/>
                        </linearGradient>
                      </defs>
                      <polygon points="50,0 61.803,35.355 98.197,35.355 68.405,57.745 79.608,93.098 50,70.708 20.392,93.098 31.595,57.745 1.803,35.355 38.197,35.355" fill="url(#grad)"/>
                    </svg>

                </h3>
            </div>
            <div class="col-lg-12 row mt-3">
                <div class="indicator">
                    <img src="Vistas/img/images/left.png">
                </div>
                <div class="col clasifier">
                    <div class="row">
                        <?php

                        $columna = 'id_usuario';
                        $valor = $_SESSION["id"];

                        $pelisVistas = PeliculasC::PelisVistasC($columna, $valor);

                        foreach ($pelisVistas as $key => $value) {
                            
                            if($value["resena"] == 5){

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

                                echo '<div class="col-lg-3">
                                        <img src="https://image.tmdb.org/t/p/w500'.$imgP["posters"][0]["file_path"].'">
                                    </div>';
                            }
                        }

                        ?>
                    </div>
                        
                </div>
                <div class="indicator">
                    <img src="Vistas/img/images/right.png">
                </div>
            </div>
        </div>

        <div class="top-rated row">
            <div class="col-lg-12 text-left">
                <h3>VISTAS</h3>
            </div>
            <div class="col-lg-12 row mt-5">
                <div class="indicator">
                    <img src="Vistas/img/images/left.png">
                </div>
                <div class="col clasifier">

                    <div class="row">

                        <?php

                        $columna = 'id_usuario';
                        $valor = $_SESSION["id"];

                        $pelisVistas = PeliculasC::PelisVistasC($columna, $valor);

                        foreach ($pelisVistas as $key => $value) {
                            
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

                            echo '<div class="col-lg-3">
                                    <img src="https://image.tmdb.org/t/p/w500'.$imgP["posters"][0]["file_path"].'">
                                </div>';

                        }

                        ?>
                        
                        
                    </div>

                    
                </div>
               <div class="indicator">
                    <img src="Vistas/img/images/right.png">
                </div>
            </div>
        </div>
    </div>
</div>



<div id="black" style="display:none;" onclick="closeAll()">&nbsp;</div>

<div class="editar" id="toggle"  style="display:none;">
    <div class="editar_close">
        <img src="Vistas/img/images/close.png" class="close" onclick="toggle()">
    </div>
    <h4>TU CUENTA</h4>
    <div class="editar_img">
        <?php

        $columna = 'id';
        $valor = $_SESSION["id"];

        $usuario = UsuariosC::VerUsuariosC($columna, $valor);

        if($usuario["foto"] != ""){

            echo '<div class="editar_img">
                    <img src="'.$generales["ruta"].''.$usuario["foto"].'" class="user">
                </div>';

        }else{

            echo '<div class="editar_img">
                    <img src="'.$generales["ruta"].'Vistas/img/user.png" class="user">
                </div>';

        }

    ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="file-select" id="fotoPerfil" >
          <input type="file" id="fotoPerfil" name="fotoN" value="">
        </div>

        <?php

        echo '<input type="hidden" name="fotoActual" value="'.$usuario["foto"].'">
        <input type="hidden" name="id" value="'.$usuario["id"].'">
        <input type="hidden" name="claveA" value="'.$usuario["clave"].'">

        <input type="text" name="nombre" value="'.$usuario["nombre"].'">

        <input type="text" id="usuarioN" name="usuario" value="'.$usuario["usuario"].'">
        <input type="hidden" id="usuarioA" value="'.$usuario["usuario"].'">
        <p id="UE">El Usuario Ya Existe</p>

        <input type="text" id="emailN" name="email" value="'.$usuario["email"].'">
        <input type="hidden" id="emailA" value="'.$usuario["email"].'">
        <p id="EE">El Email Ya Existe</p>

        <input type="text" name="info" value="'.$usuario["info"].'" autocomplete="off">';

        ?>
        
        <input type="submit" value="Guardar cambios">

        <?php

           $editar = new UsuariosC();
           $editar -> EditarPerfilC();

        ?>

    </form>
</div>


<div class="seguidores row" id="seguidores" style="display:none;">
    <div class="col-lg-12">
        <div class="editar_close">
            <img src="Vistas/img/images/close.png" class="close" onclick="closeAll()">
        </div>
    </div>
    <div class="col-lg-12">
        <h4>Seguidores</h4>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="row">
            <div class="col">
                 <input type="text" id="buscarSeg" class="look" placeholder="Buscar...">
                <input type="hidden" id="url" value="<?php echo $generales["ruta"]; ?>">
            </div>
        </div>                
    </div>
    <div class="col seguidores_display">
        <div class="row">
            
            <div id="Busq">
        
            </div>

            <div id="SinBusq">

                <?php
        
                $columna = 'id_user';
                $valor = $_SESSION["id"];

                $resultado = UsuariosC::VerSeguidoresC($columna, $valor);

                foreach ($resultado as $key => $value) {

                    $columna = 'id';
                    $valor = $value["id_seguidor"];

                    $seguidor = UsuariosC::VerUsuariosC($columna, $valor);

                    if($seguidor["foto"] != ""){
                        $foto = $generales["ruta"].$seguidor["foto"];
                    }else{
                        $foto = $generales["ruta"].'Vistas/img/user.png';
                    }

                    $id_user = $value["id_seguidor"];
                    $id_seguidor = $_SESSION["id"];

                    $sigo = UsuariosC::SeguirC($id_user, $id_seguidor);

                    $id_user = $_SESSION["id"];
                    $id_seguidor = $value["id_seguidor"];

                    $tesigue = UsuariosC::SeguirC($id_user, $id_seguidor);

                    $tipo = 'esteU';
                    $id_usuario = $value["id_seguidor"];
                    $id_seguidor = $_SESSION["id"];

                    $solicitud = UsuariosC::VerSolicitudesC($id_usuario, $id_seguidor, $tipo);

                    // Si ya se le envio la solicitud
                    if($solicitud != false){

                        if($sigo == false && $tesigue != false){

                            $sig = 'Te Sigue ';

                        }else{

                            $sig = '';

                        }

                    // Si ya fue aceptado
                    }else{

                        if($sigo == false && $tesigue != false){

                            $sig = 'Te Sigue';

                        }else if($sigo != false && $tesigue != false){

                            $sig = 'Se Siguen';

                        }else if($sigo != false && $tesigue == false){

                            $sig = 'Lo Sigues';

                        }else{

                            $sig = '';

                        }

                    }

                    echo '<div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="'.$foto.'">
                                </div>
                                <div class="col-lg-5 text-left">
                                    <div class="row">
                                        <div class="col-12">
                                        <p class="h6">'.$seguidor["nombre"].'</p>
                                        </div>
                                         <div class="col-12">
                                            <p>@'.$seguidor["usuario"].' - 105 Reseñas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <button><span>º &nbsp; '.$sig.' </span> </button>
                                </div>
                            </div>
                        </div>';

                }


                ?>

            </div>

        </div>
    </div>     
</div>


<div class="seguidores row" id="seguidos" style="display:none;">
    <div class="col-lg-12">
        <div class="editar_close">
            <img src="Vistas/img/images/close.png" class="close" onclick="closeAll()">
        </div>
    </div>
    <div class="col-lg-12">
        <h4>Seguidos</h4>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="row">
            <div class="col">
                 <input type="text" id="buscarSeg2" class="look" placeholder="Buscar...">
                <input type="hidden" id="url2" value="<?php echo $generales["ruta"]; ?>">
            </div>
        </div>                
    </div>
    <div class="col seguidores_display">
        <div class="row">
            
            <div id="Busq2">
        
            </div>

            <div id="SinBusq2">

                <?php
        
                $columna = 'id_seguidor';
                $valor = $_SESSION["id"];

                $resultado = UsuariosC::VerSeguidoresC($columna, $valor);

                foreach ($resultado as $key => $value) {

                    $columna = 'id';
                    $valor = $value["id_user"];

                    $seguidor = UsuariosC::VerUsuariosC($columna, $valor);

                    if($seguidor["foto"] != ""){
                        $foto = $generales["ruta"].$seguidor["foto"];
                    }else{
                        $foto = $generales["ruta"].'Vistas/img/user.png';
                    }

                    $id_user = $value["id_user"];
                    $id_seguidor = $_SESSION["id"];

                    $sigo = UsuariosC::SeguirC($id_user, $id_seguidor);

                    $id_user = $_SESSION["id"];
                    $id_seguidor = $value["id_user"];

                    $tesigue = UsuariosC::SeguirC($id_user, $id_seguidor);

                    $tipo = 'esteU';
                    $id_usuario = $value["id_user"];
                    $id_seguidor = $_SESSION["id"];

                    $solicitud = UsuariosC::VerSolicitudesC($id_usuario, $id_seguidor, $tipo);

                    // Si ya se le envio la solicitud
                    if($solicitud != false){

                        if($sigo == false && $tesigue != false){

                            $sig = 'Te Sigue ';

                        }else{

                            $sig = '';

                        }

                    // Si ya fue aceptado
                    }else{

                        if($sigo == false && $tesigue != false){

                            $sig = 'Te Sigue';

                        }else if($sigo != false && $tesigue != false){

                            $sig = 'Se Siguen';

                        }else if($sigo != false && $tesigue == false){

                            $sig = 'Lo Sigues';

                        }else{

                            $sig = '';

                        }

                    }

                    echo '<div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="'.$foto.'">
                                </div>
                                <div class="col-lg-5 text-left">
                                    <div class="row">
                                        <div class="col-12">
                                        <p class="h6">'.$seguidor["nombre"].'</p>
                                        </div>
                                         <div class="col-12">
                                            <p>@'.$seguidor["usuario"].' - 105 Reseñas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <button><span>º &nbsp; '.$sig.' </span> </button>
                                </div>
                            </div>
                        </div>';

                }


                ?>

            </div>

        </div>
    </div>     
</div>



