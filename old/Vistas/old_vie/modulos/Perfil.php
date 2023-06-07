<div class="content">
            
    <div class="profile">
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
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                       <p class="textU">@<?php echo $usuario["usuario"]; ?></p>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="edit" onclick="toggle()">Editar perfil</button>
                    </div>
                </div>
                <div class="row">

                    <?php

                    // Peliculas Vistas Contador
                    $columna = "id_usuario";
                    $valor = $_SESSION["id"];

                    $resultado = PeliculasC::PelisVistasC($columna, $valor);

                    $vistas = count($resultado);

                    echo '<div class="col-lg-4">
                            <p class="textU">'.$vistas.' VISTOS</p>
                        </div>';

                    // Seguidores Contador
                    $columna = "id_user";
                    $valor = $_SESSION["id"];

                    $segs = UsuariosC::SeguidoresC($columna, $valor);

                    $seguidores = count($segs);

                    echo '<div class="col-lg-4">
                            <p class="textU" onclick="showFollowers()" style="cursor:pointer;">'.$seguidores.' SEGUIDORES</p>
                        </div>';

                    // Seguidos Contador
                    $columna = "id_seguidor";
                    $valor = $_SESSION["id"];

                    $segu = UsuariosC::SeguidoresC($columna, $valor);

                    $seguidos = count($segu);

                    echo '<div class="col-lg-4">
                            <p class="textU" onclick="seguidos()" style="cursor:pointer;">'.$seguidos.' SEGUIDOS</p>
                        </div>';


                    ?>
                    
                </div>
                <h2 class="textU"><?php echo $usuario["nombre"]; ?></h2>
                <p><?php echo $usuario["info"]; ?></p>
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
        <div class="top-rated row">
            <h3>TOP RATED <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/star5.png"></h3>
            <div class="clear">&nbsp;</div>
            <div class="col-lg-1">
                <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/left.png">
            </div>
            <div class="col-lg-9 clasifier">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/avatar.jpeg">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/elgato.jpeg">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/90s.jpeg">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/avatar.jpeg">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/lou.jpeg">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/jung.jpeg">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/90s.jpeg">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/avatar.jpeg">
                    </div>
                </div>
            </div>
            <div class="col-lg-1">
                <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/right.png">
            </div>
        </div>
        <div class="top-rated row">
            <h3>VISTAS</h3>
            <div class="clear">&nbsp;</div>
            <div class="col-lg-1">
                <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/left.png">
            </div>
            <div class="col-lg-9 clasifier">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/qpa.png">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/lobo.png">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/ferrari.png">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/qpa.png">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/qpa.png">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/lobo.png">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/ferrari.png">
                    </div>
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/lobo.png">
                    </div>
                </div>
            </div>
            <div class="col-lg-1">
                <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/pruebas/right.png">
            </div>
        </div>
    </div>


</div>



<div class="editar" id="toggle"  style="display:none;">
    <div class="editar_close">
        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/close.png" class="close" onclick="toggle()">
    </div>
    <h4>TU CUENTA</h4>

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

<div id="black" style="display:none;">&nbsp;</div>

<div class="editar" id="seguidores"  style="display:none;">
    <div class="editar_close">
        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/close.png" class="close" onclick="seguidores()">
    </div>
    <h4>SEGUIDORES</h4>

    <br>

    <input type="text" id="buscarSeg" style="color:black">
    <input type="hidden" id="url" value="<?php echo $generales["ruta"]; ?>">

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

            echo '<p>
                    <a href="'.$generales["ruta"].'/Usuario/'.$seguidor["id"].'"><img src="'.$foto.'" width="50px">
                    '.$seguidor["nombre"].' - @'.$seguidor["usuario"].' - '.$sig.'</a>
                </p>';

        }

            


        ?>
    </div>
        

</div>

<div class="seguidores row" id="seguidores" style="display:none;">
    <div class="col-lg-12">
        <div class="editar_close">
            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/close.png" class="close" onclick="closeAll()">
        </div>
    </div>
    <div class="col-lg-12">
        <h4>Seguidores</h4>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="row">
            <div class="col">
                <input type="text" name="Search" id="buscarSeg" class="look" placeholder="Buscar...">
                <input type="hidden" id="url" value="<?php echo $generales["ruta"]; ?>">
            </div>
        </div>                
    </div>
    <div class="col seguidores_display">
        <div class="row">
            <!------------------------------NEW--------------------------------->
            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="../images/profile.png">
                    </div>
                    <div class="col-lg-5 text-left">
                        <div class="row">
                            <div class="col-12">
                            <p class="h6">Dianna Smiley</p>
                            </div>
                             <div class="col-12">
                                <p>@Dianna Smiley - 105 Reseñas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button><span>º &nbsp; Seguir </span> </button>
                    </div>
                </div>
            </div>
            <!------------------------------NEW--------------------------------->
            
        </div>
    </div>     
</div>


<div class="editar" id="seguidos"  style="display:none;">
    <div class="editar_close">
        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/close.png" class="close" onclick="seguidos()">
    </div>
    <h4>SEGUIDOS</h4>

    <br>

    <input type="text" id="buscarSeg2" style="color:black">
    <input type="hidden" id="url2" value="<?php echo $generales["ruta"]; ?>">

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

            echo '<p>
                    <a href="'.$generales["ruta"].'/Usuario/'.$seguidor["id"].'"><img src="'.$foto.'" width="50px">
                    '.$seguidor["nombre"].' - @'.$seguidor["usuario"].' - '.$sig.'</a>
                </p>';

        }

            


        ?>
    </div>

</div>


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
                                    <p class="foll" >VISTOS</p>
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
                                <p class="foll" >SEGUIDORES</p>
                            </div>
                        </div>
                    </div>';

                    // Seguidos Contador
                    $columna = "id_seguidor";
                    $valor = $_SESSION["id"];

                    $segu = UsuariosC::SeguidoresC($columna, $valor);

                    $seguidos = count($segu);

                    echo '<div class="col-lg-4 cursor-pointer" onclick="showFollowers()">
                            <div class="row">
                                <div class="col-3 mx-0 px-0 font-weight-bold h4 text-center">
                                    '.$seguidos.'
                                </div>
                                <div class="col-4 mx-0 px-0 text-left pt-1">
                                    <p class="foll" >SEGUIDOS</p>
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
                    <h2><?php echo $usuario["nombre"]; ?></h2>
                    <p><?php echo $usuario["info"]; ?></p>
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
                <h3>TOP RATED <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/star5.png"></h3>
            </div>
            <div class="col-lg-12 row mt-3">
                <div class="indicator">
                    <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/left.png">
                </div>
                <div class="col clasifier">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/avatar.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/elgato.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/90s.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/avatar.jpeg">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/lou.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/jung.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/90s.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/avatar.jpeg">
                        </div>
                    </div>
                </div>
                <div class="indicator">
                    <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/right.png">
                </div>
            </div>
        </div>
        <div class="top-rated row mt-5">
            <div class="col-lg-12 text-left">
                <h3>VISTAS</h3>
            </div>
            <div class="col-lg-12 row mt-5">
                <div class="indicator">
                    <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/left.png">
                </div>
                <div class="col clasifier">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/avatar.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/elgato.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/90s.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/avatar.jpeg">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/lou.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/jung.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/90s.jpeg">
                        </div>
                        <div class="col-lg-3">
                            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/avatar.jpeg">
                        </div>
                    </div>
                </div>
               <div class="indicator">
                    <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/right.png">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL EDITAR PERFIL -->
<div class="editar" id="toggle"  style="display:none;">
    <div class="editar_close">
        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/close.png" class="close" onclick="toggle()">
    </div>
    <h4>TU CUENTA</h4>

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


<!-- MODAL SEGUIDORES -->
<div class="seguidores row" id="seguidores" style="display:none;">
    <div class="col-lg-12">
        <div class="editar_close">
            <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/close.png" class="close" onclick="closeAll()">
        </div>
    </div>
    <div class="col-lg-12">
        <h4>Seguidores</h4>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="row">
            <div class="col">
                 <input type="text" name="Search" class="look" placeholder="Buscar...">
            </div>
        </div>                
    </div>
    <div class="col seguidores_display">
        <div class="row">
            
            <!------------------------------NEW--------------------------------->
            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/profile.png">
                    </div>
                    <div class="col-lg-5 text-left">
                        <div class="row">
                            <div class="col-12">
                            <p class="h6">Dianna Smiley</p>
                            </div>
                             <div class="col-12">
                                <p>@Dianna Smiley - 105 Reseñas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button><span>º &nbsp; Seguir </span> </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>     
</div>

        