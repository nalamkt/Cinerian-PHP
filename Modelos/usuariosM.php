<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{

	static public function RegistrarUsuarioM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (email, nombre, usuario, clave, rol) VALUES (:email, :nombre, :usuario, :clave, :rol)");

		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	static public function VerUsuariosM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}
	

	static public function IniciarSesionM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}



	static public function EditarPerfilM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, info = :info, email = :email, nombre = :nombre, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":info", $datosC["info"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	// =============================================================
	// Seguidores
	// =============================================================

	// Ver Seguidores o Seguidos
	static public function SeguidoresM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	// Ver Si se siguen o te sigue o lo sigues
	static public function SeguirM($tablaBD, $id_user, $id_seguidor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id_user = $id_user AND id_seguidor = $id_seguidor");

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


	// ================================================================
	// Solicitudes
	static public function EnviarSolcitudM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_seguidor, id_usuario) VALUES (:id_seguidor, :id_usuario)");

		$pdo -> bindParam(":id_seguidor", $datosC["id_seguidor"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_usuario", $datosC["id_usuario"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	// Ver Solicitudes
	static public function VerSolicitudesM($tablaBD, $id_usuario, $id_seguidor, $tipo){

		if($tipo == 'todas'){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id_usuario = $id_usuario AND estado = 0 ORDER BY fecha DESC");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else if($tipo == 'esteU'){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id_usuario = $id_usuario AND id_seguidor = $id_seguidor AND estado = 0");

			$pdo -> execute();

			return $pdo -> fetch();

		}else if($tipo == 'unaSol'){

			// tomo en este caso $id_usuario como si fuera el id
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = $id_usuario");

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}


	// Cancelar Solicitudes
	static public function CancelarSolcitudM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_seguidor = :id_seguidor AND id_usuario = :id_usuario");

		$pdo -> bindParam(":id_seguidor", $datosC["id_seguidor"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_usuario", $datosC["id_usuario"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	// Eliminar de mis Seguidos
	static public function EliminarSeguidoM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_seguidor = :id_seguidor AND id_user = :id_user");

		$pdo -> bindParam(":id_seguidor", $datosC["id_seguidor"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_user", $datosC["id_usuario"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	static public function VerSeguidoresM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	// Cancelar Solicitudes
	static public function BorrarSolicitudM($tablaBD, $id_solicitud){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = $id_solicitud");

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	// Aceptar Solicitudes
	static public function AceptarSolicitudM($tablaBD, $id_solicitudAceptada){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = 1 WHERE id = $id_solicitudAceptada");

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	// Agregar Seguidor
	static public function AgregarSeguidorM($tablaBD2, $id_usuario, $id_seguidor, $datos_u, $datos_s, $seg){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD2 (id_seguidor, id_user, datos_u, datos_s, seg) VALUES (:id_seguidor, :id_usuario, :datos_u, :datos_s, :seg)");

		$pdo -> bindParam(":id_seguidor", $id_seguidor, PDO::PARAM_STR);
		$pdo -> bindParam(":id_usuario", $id_usuario, PDO::PARAM_STR);
		$pdo -> bindParam(":datos_u", $datos_u, PDO::PARAM_STR);
		$pdo -> bindParam(":datos_s", $datos_s, PDO::PARAM_STR);
		$pdo -> bindParam(":seg", $seg, PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	// BUSCAR Seguidores o Seguidos
	static public function BuscarSeguidoresM($tablaBD, $busqueda, $id_usuario, $dd){

		if($dd == 'd_s'){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE datos_s LIKE '%$busqueda%' AND id_user = $id_usuario");	

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE datos_u LIKE '%$busqueda%' AND id_seguidor = $id_usuario");

		}

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	// Comprobar si lo sigo
	static public function ComprobarSeguidoM($tablaBD, $columna, $valor, $columna2, $id_user){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND $columna2 = $id_user");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


}