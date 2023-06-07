<?php

class PeliculasC{

	// Peliculas Vistas
	static public function PelisVistasC($columna, $valor){

		$tablaBD = "peliculas_vistas";

		$resultado = PeliculasM::PelisVistasM($tablaBD, $columna, $valor);

		return $resultado;

	}

	// Peliculas Vistas Amigos
	static public function PelisVistas2C(){

		$tablaBD = "peliculas_vistas";

		$resultado = PeliculasM::PelisVistas2M($tablaBD);

		return $resultado;

	}

	// Marcar Pelicula como no Me Interesa o No Me Gusta
	public function PeliculaNoInteresaC($id_peliNG, $id_u){

			$tablaBD = "peliculas_no";

			$datosC = array("id_pelicula" => $id_peliNG, "id_usuario"=>$id_u);

			$resultado = PeliculasM::PeliculaNoInteresaM($tablaBD, $datosC);

			return $resultado;

	}


	// Dejar Reseña
	public function PeliculaResenaC($id_peliR, $id_u, $comentario, $resena){

		$tablaBD = "peliculas_vistas";

		$datosC = array("id_pelicula" => $id_peliR, "resena"=>$resena, "id_usuario"=>$id_u, 'comentario' => $comentario);

		$resultado = PeliculasM::PeliculaResenaM($tablaBD, $datosC);

		return $resultado;

	}

}