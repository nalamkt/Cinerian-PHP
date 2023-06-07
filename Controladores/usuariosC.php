<?php

class UsuariosC{

	public function RegistrarUsuarioC(){

		if(isset($_POST["nombre"])){

			$tablaBD = "usuarios";

			$clave = crypt($_POST["clave"], '$2a$07$usesomesillystringforsalt$');

			$datosC = array("nombre" => $_POST["nombre"], "usuario"=>$_POST["usuario"], "clave"=>$clave, "rol"=>'Visitante', "email"=>$_POST["email"]);

			$resultado = UsuariosM::RegistrarUsuarioM($tablaBD, $datosC);

			if($resultado == true){

				$_SESSION["Ingresar"] = true;
				
				$_SESSION["id"] = $resultado["id"];
				$_SESSION["usuario"] = $resultado["usuario"];
				$_SESSION["foto"] = $resultado["foto"];
				$_SESSION["clave"] = $resultado["clave"];
				$_SESSION["email"] = $resultado["email"];

				$_SESSION["nombre"] = $resultado["nombre"];

				$_SESSION["rol"] = $resultado["rol"];

				echo '<script>

				window.location = "Inicio";
				</script>';

			}

		}

	} 


	static public function VerUsuariosC($columna, $valor){

		$tablaBD = "usuarios";

		$resultado = UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);

		return $resultado;

	}

	

	public function IniciarSesionC(){

		if(isset($_POST["usuario"])){

			$tablaBD = "usuarios";

			$clave = crypt($_POST["clave"], '$2a$07$usesomesillystringforsalt$');

			$datosC = array("usuario" => $_POST["usuario"], "clave" => $_POST["clave"]);

			$resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

			if($resultado["usuario"] == $_POST["usuario"] && $resultado["clave"] == $clave){

				$_SESSION["Ingresar"] = true;
				
				$_SESSION["id"] = $resultado["id"];
				$_SESSION["usuario"] = $resultado["usuario"];
				$_SESSION["foto"] = $resultado["foto"];
				$_SESSION["clave"] = $resultado["clave"];
				$_SESSION["email"] = $resultado["email"];

				$_SESSION["nombre"] = $resultado["nombre"];

				$_SESSION["rol"] = $resultado["rol"];

				echo '<script>

				window.location = "Inicio";
				</script>';


			}else{

				echo '<br><div class="alert alert-danger">Error al Ingresar.</div>';

			}

		}

	}


	public function EditarPerfilC(){

		if(isset($_POST["id"])){
			
			$rutaImg = $_POST["fotoActual"];

			if(isset($_FILES["fotoN"]["tmp_name"]) && !empty($_FILES["fotoN"]["tmp_name"])){

				if(!empty($_POST["fotoActual"])){

					unlink($_POST["fotoActual"]);

				}

				if($_FILES["fotoN"]["type"] == "image/jpeg"){

					$nombre = mt_rand(10, 999);

					$rutaImg = "Vistas/img/Usuarios/".$_POST["usuario"]."-".$_POST["id"]."-".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["fotoN"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}

				if($_FILES["fotoN"]["type"] == "image/png"){

					$nombre = mt_rand(10, 999);

					$rutaImg = "Vistas/img/Usuarios/".$_POST["usuario"]."-".$_POST["id"]."-".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["fotoN"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}

			}

			$tablaBD = "usuarios";

			$datosC = array("id" => $_POST["id"], "nombre" => $_POST["nombre"], "usuario" => $_POST["usuario"], 'email'=>$_POST["email"], "info" => $_POST["info"], 'foto'=>$rutaImg);

			$resultado = UsuariosM::EditarPerfilM($tablaBD, $datosC);


			if($resultado == true){

				echo '<script>

						window.location = "Perfil";
								
				</script>';

			}

		}

	}





	// =============================================================
	// Seguidores
	// =============================================================

	// Ver Seguidores o Seguidos
	static public function SeguidoresC($columna, $valor){

		$tablaBD = "seguidores";

		$resultado = UsuariosM::SeguidoresM($tablaBD, $columna, $valor);

		return $resultado;

	}


	// Ver Si se siguen o te sigue o lo sigues
	static public function SeguirC($id_user, $id_seguidor){

		$tablaBD = "seguidores";

		$resultado = UsuariosM::SeguirM($tablaBD, $id_user, $id_seguidor);

		return $resultado;

	}


	// ================================================================
	// Solicitudes
	public function EnviarSolcitudC($id_seg, $id_u){

			$tablaBD = "solicitudes";

			$datosC = array("id_seguidor" => $id_seg, "id_usuario"=>$id_u);

			$resultado = UsuariosM::EnviarSolcitudM($tablaBD, $datosC);

			return $resultado;

	}


	// Ver Solicitudes
	static public function VerSolicitudesC($id_usuario, $id_seguidor, $tipo){

		$tablaBD = "solicitudes";

		$resultado = UsuariosM::VerSolicitudesM($tablaBD, $id_usuario, $id_seguidor, $tipo);

		return $resultado;

	}


	// Solicitudes
	public function CancelarSolcitudC($id_seg, $id_uCancelar){

			$tablaBD = "solicitudes";

			$datosC = array("id_seguidor" => $id_seg, "id_usuario"=>$id_uCancelar);

			$resultado = UsuariosM::CancelarSolcitudM($tablaBD, $datosC);

			return $resultado;

	}


	// Dejar de Seguir y Eliminar de Seguidos
	public function DejarDeSeguirC($id_seg, $id_uDejar){

			$tablaBD = "solicitudes";

			$datosC = array("id_seguidor" => $id_seg, "id_usuario"=>$id_uDejar);

			$resultado = UsuariosM::CancelarSolcitudM($tablaBD, $datosC);

			$tablaBD2 = "seguidores";

			$resultado2 = UsuariosM::EliminarSeguidoM($tablaBD2, $datosC);

			return $resultado;

	}


	static public function VerSeguidoresC($columna, $valor){

		$tablaBD = "seguidores";

		$resultado = UsuariosM::VerSeguidoresM($tablaBD, $columna, $valor);

		return $resultado;

	}

	// BORRAR SOLICITUDES
	public function BorrarSolicitudC($id_solicitud){

		$tablaBD = "solicitudes";

		$resultado = UsuariosM::BorrarSolicitudM($tablaBD, $id_solicitud);

		return $resultado;

	}


	// ACEPTAR SOLICITUDES
	public function AceptarSolicitudC($id_solicitudAceptada){

		$tablaBD = "solicitudes";

		$resultado = UsuariosM::AceptarSolicitudM($tablaBD, $id_solicitudAceptada);

		$tipo = 'unaSol';
		$id_usuario = $id_solicitudAceptada;
		$id_seguidor = null;

		$solicitud = UsuariosM::VerSolicitudesM($tablaBD, $id_usuario, $id_seguidor, $tipo);

		$tablaBD3 = 'usuarios';
		$columna = 'id';
		$valor = $solicitud["id_usuario"];
		$usuario = UsuariosM::VerUsuariosM($tablaBD3, $columna, $valor);

		$valor = $solicitud["id_seguidor"];
		$usuario1 = UsuariosM::VerUsuariosM($tablaBD3, $columna, $valor);

		// primero los datos del usuario
		$datos_u = $usuario["nombre"].'-'.$usuario["email"].'-'.$usuario["usuario"];

		$datos_s = $usuario1["nombre"].'-'.$usuario1["email"].'-'.$usuario1["usuario"];

		$tablaBD2 = "seguidores";

		$id_user = $solicitud["id_seguidor"];
        $id_seguidor = $solicitud["id_usuario"];

        $sigo = UsuariosM::SeguirM($tablaBD2, $id_user, $id_seguidor);

        $id_user = $solicitud["id_usuario"];
        $id_seguidor = $solicitud["id_seguidor"];

        $tesigue = UsuariosM::SeguirM($tablaBD2, $id_user, $id_seguidor);

        if($sigo == false){

            $seg = 1;

        }else if($tesigue == false){

            $seg = 2;

        }else{

        	$seg = 3;

        }

		$id_usuario = $solicitud["id_usuario"];
		$id_seguidor = $solicitud["id_seguidor"];

		$agregar = UsuariosM::AgregarSeguidorM($tablaBD2, $id_usuario, $id_seguidor, $datos_u, $datos_s, $seg);

		return $resultado;

	}



	// ENVIAR TAMBIEN SOLICITUD
	public function EnviarSolicitudTambienC($id_solicitudEnv){

		$tablaBD = "solicitudes";
		$tipo = 'unaSol';
		$id_usuario = $id_solicitudEnv;
		$id_seguidor = null;

		$solicitud = UsuariosM::VerSolicitudesM($tablaBD, $id_usuario, $id_seguidor, $tipo);

		$id_usuario = $solicitud["id_seguidor"];
		$id_seg = $solicitud["id_usuario"];

		$datosC = array("id_seguidor" => $id_seg, "id_usuario"=>$id_usuario);

		$resultado = UsuariosM::EnviarSolcitudM($tablaBD, $datosC);

		return $resultado;

	}


	// Buscar SEGUIDORES
	static public function BuscarSeguidoresC($busqueda, $id_usuario, $dd){

		$tablaBD = "seguidores";

		$resultado = UsuariosM::BuscarSeguidoresM($tablaBD, $busqueda, $id_usuario, $dd);

		foreach ($resultado as $key => $value) {

			$columna = 'id';

			if($dd == 'd_s'){
				$valor = $value["id_seguidor"];
			}else{
				$valor = $value["id_user"];
			}

			$tablaBD2 = 'usuarios';

			$seguidor = UsuariosM::VerUsuariosM($tablaBD2, $columna, $valor);

			if($seguidor["foto"] != ""){
                 $foto = $seguidor["foto"];
            }else{
                 $foto = 'Vistas/img/user.png';
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
                    </div>
                </div>';

		}
		

	}


	// Comprobar si lo sigo
	static public function ComprobarSeguidoC($columna, $valor, $columna2, $id_user){

		$tablaBD = "seguidores";

		$resultado = UsuariosM::ComprobarSeguidoM($tablaBD, $columna, $valor, $columna2, $id_user);

		return $resultado;

	}


}