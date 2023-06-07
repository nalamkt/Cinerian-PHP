<!-- Header-->

<?php

$generales = GeneralesC::VerGeneralesC();

?>
        <header id="header">
            <div class="row">
                <div class="col-lg-2 py-3">
                    <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/logosolo.png" id="logo">
                </div>
                <div class="col-lg-6 align py-3">
                    <ul>
                        <li>
                        <a href="<?php echo $generales["ruta"]; ?>Inicio" class="line">Inicio</a>
                        </li>
                        <li>
                            Peliculas
                        </li>
                        <li>Series</li>
                        <li>Actores</li>
                        <li>Mi Lista</li>
                    </ul>
                </div>
                <div class="col-lg-4 align" id="searchbar">
                    <form action="search.php" method="post" class="line">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        <input type="text" name="buscar" placeholder="Buscar...">
                    </form>
                    <img src="<?php echo $generales["ruta"]; ?>Vistas/img/images/bell.png" id="not" onclick="noti()">

                    <?php

                    $columna = 'id';
                    $valor = $_SESSION["id"];

                    $usuario = UsuariosC::VerUsuariosC($columna, $valor);

                        if($usuario["foto"] != ""){

                            echo '<a href="'.$generales["ruta"].'Perfil"><img src="'.$generales["ruta"].''.$usuario["foto"].'" id="user"></a>';

                        }else{

                            echo '<a href="'.$generales["ruta"].'Perfil"><img src="'.$generales["ruta"].'Vistas/img/user.png" id="user"></a>';

                        }


                    ?>
                    

                    <a href="<?php echo $generales["ruta"]; ?>Salir">Salir</a>

                </div>
        </header><!-- /header -->
        <!-- Header-->



<div class="notification" id="noti" style="display:none;">
    <div class="row opciones">
        <div class="col-lg-4" onclick="seeAll(this)">
            Todas
        </div>
        <div class="col-lg-4" onclick="seeRec(this)">
            Recomendaciones
        </div>
        <div class="col-lg-4" onclick="seeSol(this)">
            Solicitudes
        </div>
    </div>
    <div class="es">
        <!-- <p class="setitle">Esta semana.</p> -->
        
        <?php

        $id_usuario = $_SESSION["id"];
        $id_seguidor = null;
        $tipo = 'todas';

        $resultado = UsuariosC::VerSolicitudesC($id_usuario, $id_seguidor, $tipo);

        foreach ($resultado as $key => $value) {

            $columna = 'id';
            $valor = $value["id_seguidor"];

            $usuario = UsuariosC::VerUsuariosC($columna, $valor);

            if($usuario["foto"] != ""){

                $foto = $generales["ruta"].''.$usuario["foto"];

            }else{

                $foto = $generales["ruta"].'Vistas/img/user.png';

            }

            $id_user = $usuario["id"];
            $id_seguidor = $_SESSION["id"];

            $sigo = UsuariosC::SeguirC($id_user, $id_seguidor);

            $id_user = $_SESSION["id"];
            $id_seguidor = $usuario["id"];

            $tesigue = UsuariosC::SeguirC($id_user, $id_seguidor);


            if($sigo != false){

                $sig = '<button type="button" class="edit aceptado" id="aceptado'.$value["id"].'" ST="No" idSolB="'.$value["id"].'">Siguiendo</button>';

            }else{

                $sig = '<button type="button" class="edit aceptado" id="aceptado'.$value["id"].'" ST="Si" idSolB="'.$value["id"].'">Seguir También</button>

                <button type="button" class="edit aceptado" id="solEnv'.$value["id"].'">Solicitud Enviada</button>';

            }

           
            echo '<div class="single-not solicitud">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="'.$foto.'">
                        </div>
                        <div class="col-lg-5">
                            <h5>'.$usuario["nombre"].'</h5>
                            <p>Solicitó Seguirte</p>
                        </div>

                        <div class="col-lg-5">
                            <div class="row solicitudesNot" id="">

                                <div class="col-lg-6">
                                    <button class="aceptarSol" id="aceptarSol'.$value["id"].'" idSolA="'.$value["id"].'">
                                        <input type="hidden" id="url" value="'.$generales["ruta"].'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                    </button>

                                        '.$sig.'


                                </div>

                                <div class="col-lg-6">
                                    <button class="borrarSol" id="borrarSol'.$value["id"].'" idSol="'.$value["id"].'">
                                        <input type="hidden" id="url" value="'.$generales["ruta"].'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>';

        }

        ?>

        

        <!-- <div class="single-not recomendacion">
            <div class="row">
                <div class="col-lg-2">
                    <img src="../images/smiley.png">
                </div>
                <div class="col-lg-5">
                    <h5>Julia Roberts</h5>
                    <p>Te recomendó "Shrek"</p>
                </div>
                <div class="col-lg-5 last">
                    <img src="../images/spiderman.png">
                </div>
            </div>
        </div> -->

    </div>

    
</div>