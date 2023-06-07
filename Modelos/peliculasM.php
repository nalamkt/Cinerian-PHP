<?php

require_once "ConexionBD.php";

class PeliculasM extends ConexionBD{

	// Peliculas Vistas
	static public function PelisVistasM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

	// Peliculas Vistas Amigos
	static public function PelisVistas2M($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY fecha DESC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	// Marcar Pelicula cmo no Me Interesa o No Me Gusta
	static public function PeliculaNoInteresaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_pelicula, id_usuario) VALUES (:id_pelicula, :id_usuario)");

		$pdo -> bindParam(":id_pelicula", $datosC["id_pelicula"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_usuario", $datosC["id_usuario"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	static public function PeliculaResenaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_pelicula, id_usuario, resena, comentario) VALUES (:id_pelicula, :id_usuario, :resena, :comentario)");

		$pdo -> bindParam(":id_pelicula", $datosC["id_pelicula"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_usuario", $datosC["id_usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":resena", $datosC["resena"], PDO::PARAM_STR);
		$pdo -> bindParam(":comentario", $datosC["comentario"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}
	


}