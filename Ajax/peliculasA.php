<?php
session_start();

require_once "../Controladores/peliculasC.php";
require_once "../Modelos/peliculasM.php";

class PelisA{

	public $id_peli;

	public function PeliNoInt(){

		$idp = $this->id_peli;
		$id_u = $_SESSION["id"];

		$resultado = PeliculasC::PeliculaNoInteresaC($idp, $id_u);

		echo json_encode($resultado);

	}

	public $resena;
	public $id_peliR;
	public $comentario;

	public function ResenaA(){

		$resena = $this->resena;
		$id_peliR = $this->id_peliR;
		$comentario = $this->comentario;

		$id_u = $_SESSION["id"];


		$resultado = PeliculasC::PeliculaResenaC($id_peliR, $id_u, $comentario, $resena);

		echo json_encode($resultado);


	}


	public $id_peliNG;

	public function NoMeGustaA(){

		$id_peliNG = $this->id_peliNG;
		$id_u = $_SESSION["id"];

		$resultado = PeliculasC::PeliculaNoInteresaC($id_peliNG, $id_u);

		echo json_encode($resultado);


	}


}


if(isset($_POST["id_peli"])){

	$PNI = new PelisA();
	$PNI -> id_peli = $_POST["id_peli"];
	$PNI -> PeliNoInt();

}



if(isset($_POST["resena"])){

	$res = new PelisA();
	$res -> resena = $_POST["resena"];
	$res -> id_peliR = $_POST["id_peliR"];
	$res -> comentario = $_POST["comentario"];
	$res -> ResenaA();

}


if(isset($_POST["id_peliNG"])){

	$ng = new PelisA();
	$ng -> id_peliNG = $_POST["id_peliNG"];
	$ng -> NoMeGustaA();

}




