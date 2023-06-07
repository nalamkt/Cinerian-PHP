<div class="content">
            
    <div class="profile">
        <div class="head_profile row">
            <div class="col-lg-4">

                <?php

                    $exp = explode('/', $_GET["url"]);

                    if($exp[1] == $_SESSION["id"]){
                        echo '<script>
                            window.location = "'.$generales["ruta"].'/Perfil";
                        </script>';
                    }

                    $columna = 'id';
                    $valor = $exp[1];

                    $usuario = UsuariosC::VerUsuariosC($columna, $valor);

                    if($usuario["foto"] != ""){

                        echo '<img src="'.$generales["ruta"].''.$usuario["foto"].'">';

                    }else{

                        echo '<img src="'.$generales["ruta"].'Vistas/img/user.png">';

                    }


                ?>

            </div>
            <div class="col-lg-8">
                <div class="row" id="Soli">
                    <div class="col-lg-6">
                       <p class="textU">@<?php echo $usuario["usuario"]; ?></p>
                    </div>
                    <div class="col-lg-6">

                        <form method="post">
                            
                            <?php

                            echo '<input type="hidden" id="id_usuario" value="'.$exp[1].'">
                            <input type="hidden" id="url" value="'.$generales["ruta"].'">';

                            $id_user = $exp[1];
                            $id_seguidor = $_SESSION["id"];

                            $sigo = UsuariosC::SeguirC($id_user, $id_seguidor);

                            $id_user = $_SESSION["id"];
                            $id_seguidor = $exp[1];

                            $tesigue = UsuariosC::SeguirC($id_user, $id_seguidor);

                            $tipo = 'esteU';
                            $id_usuario = $exp[1];
                            $id_seguidor = $_SESSION["id"];

                            $solicitud = UsuariosC::VerSolicitudesC($id_usuario, $id_seguidor, $tipo);

                            // Si ya se le envio la solicitud
                            if($solicitud != false){

                                if($sigo == false && $tesigue != false){

                                    echo '<p class="textU">Te Sigue 

                                    <button type="button" id="CancelSol1" class="edit">Cancelar Solicitud</button>

                                    <button type="button" id="SeguirSol1" class="edit">Seguir También</button></p>';

                                }else{

                                    echo ' 
                                    <button type="button" id="CancelSol1" class="edit">Cancelar Solicitud</button>
                                    <button type="button" id="SeguirSol1" class="edit">Seguir</button></p>';

                                }

                            // Si ya fue aceptado
                            }else{

                                if($sigo == false && $tesigue != false){

                                    echo '<p class="textU">Te Sigue 

                                     <button type="button" id="SeguirSol" class="edit">Seguir También</button>
                                        <button type="button" id="CancelSol" class="edit">Cancelar Solicitud</button>
                                        </p>';

                                }else if($sigo != false && $tesigue != false){

                                    echo '<p class="textU" id="SSGG">Se Siguen
                                     <button type="button" class="edit" id="DejarDeSeguir">Dejar de Seguir</button>
                                     <input type="hidden" id="perfilP" value="'.$usuario["perfil"].'">
                                        </p>

                                        <p class="textU" id="SSGG2">Te Sigue 
                                        <button type="button" id="SeguirSol" class="edit">Seguir También</button>
                                        <button type="button" id="CancelSol" class="edit">Cancelar Solicitud</button>
                                        </p>';

                                }else if($sigo != false && $tesigue == false){

                                    echo '<p class="textU" id="SSGG">Lo Sigues <button type="button" class="edit" id="DejarDeSeguir">Dejar de Seguir</button>
                                    <input type="hidden" id="perfilP" value="'.$usuario["perfil"].'">
                                    </p>

                                    <p class="textU" id="SSGG2"><button type="button" id="CancelSol" class="edit">Cancelar Solicitud</button>
                                    <button type="button" id="SeguirSol" class="edit">Seguir</button>
                                        </p>';

                                }else{

                                    echo ' <p class="textU">
                                    <button type="button" id="CancelSol" class="edit">Cancelar Solicitud</button>
                                    <button type="button" id="SeguirSol" class="edit">Seguir</button></p>';

                                }

                            }



                            ?>

                        </form>
                        
                    </div>
                </div>
                <div class="row">

                    <?php

                    // Peliculas Vistas Contador
                    $columna = "id_usuario";
                    $valor = $exp[1];

                    $resultado = PeliculasC::PelisVistasC($columna, $valor);

                    $vistas = count($resultado);

                    echo '<div class="col-lg-4">
                            <p class="textU">'.$vistas.' VISTOS</p>
                        </div>';

                    // Seguidores Contador
                    $columna = "id_user";
                    $valor = $exp[1];

                    $segs = UsuariosC::SeguidoresC($columna, $valor);

                    $seguidores = count($segs);

                    echo '<div class="col-lg-4">
                            <p class="textU">'.$seguidores.' SEGUIDORES</p>
                        </div>';

                    // Seguidos Contador
                    $columna = "id_seguidor";
                    $valor = $exp[1];

                    $segu = UsuariosC::SeguidoresC($columna, $valor);

                    $seguidos = count($segu);

                    echo '<div class="col-lg-4">
                            <p class="textU">'.$seguidos.' SEGUIDOS</p>
                        </div>';


                    ?>
                    
                </div>
                <h2 class="textU"><?php echo $usuario["nombre"]; ?></h2>
                <p><?php echo $usuario["info"]; ?></p>
            </div>
        </div>

        <?php

        if($usuario["perfil"] == 1){

            if($sigo != false){

                echo '<div class="opciones row perP">
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
                    <div class="top-rated row perP">
                        <h3>TOP RATED <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/star5.png"></h3>
                        <div class="clear">&nbsp;</div>
                        <div class="col-lg-1">
                            <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/left.png">
                        </div>
                        <div class="col-lg-9 clasifier">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/avatar.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/elgato.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/90s.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/avatar.jpeg">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/lou.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/jung.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/90s.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/avatar.jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/right.png">
                        </div>
                    </div>
                    <div class="top-rated row perP">
                        <h3>VISTAS</h3>
                        <div class="clear">&nbsp;</div>
                        <div class="col-lg-1">
                            <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/left.png">
                        </div>
                        <div class="col-lg-9 clasifier">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/qpa.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/lobo.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/ferrari.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/qpa.png">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/qpa.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/lobo.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/ferrari.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/lobo.png">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/right.png">
                        </div>
                    </div>';

                    echo '<h2 class="textU perPr">Perfil Privado</h2>';

            }else{

                echo '<h2 class="textU perPr">Perfil Privado</h2>';

            }


        }else{

            echo '<div class="opciones row" id="perP">
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
                    <div class="top-rated row" id="perP">
                        <h3>TOP RATED <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/star5.png"></h3>
                        <div class="clear">&nbsp;</div>
                        <div class="col-lg-1">
                            <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/left.png">
                        </div>
                        <div class="col-lg-9 clasifier">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/avatar.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/elgato.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/90s.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/avatar.jpeg">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/lou.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/jung.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/90s.jpeg">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/avatar.jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/right.png">
                        </div>
                    </div>
                    <div class="top-rated row" id="perP">
                        <h3>VISTAS</h3>
                        <div class="clear">&nbsp;</div>
                        <div class="col-lg-1">
                            <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/left.png">
                        </div>
                        <div class="col-lg-9 clasifier">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/qpa.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/lobo.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/ferrari.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/qpa.png">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/qpa.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/lobo.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/ferrari.png">
                                </div>
                                <div class="col-lg-3">
                                    <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/lobo.png">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <img src="'.$generales["ruta"].'Vistas/img/images/pruebas/right.png">
                        </div>
                    </div>';

        }

        ?>

        
    </div>


</div>