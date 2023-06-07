<?php

session_start();


require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

class UsuariosA{

	public $VerificarUsuario;

	public function VerificarUsuario(){

		$columna = "usuario";
		$valor = $this->VerificarUsuario;

		$resultado = UsuariosC::VerUsuariosC($columna, $valor);

		echo json_encode($resultado);

	} 

	public $VerificarEmail;

	public function VerificarEmail(){

		$columna = "email";
		$valor = $this->VerificarEmail;

		$resultado = UsuariosC::VerUsuariosC($columna, $valor);

		echo json_encode($resultado);

	} 


	public $busqueda;

	public function busquedaA(){

		$busqueda = $this->busqueda;
		$id_usuario = $_SESSION["id"];
		$dd = "d_s";

		$resultado = UsuariosC::BuscarSeguidoresC($busqueda, $id_usuario, $dd);

		echo json_encode($resultado);

	} 

	public $busqueda2;

	public function busquedaA2(){

		$busqueda2 = $this->busqueda2;
		$id_usuario = $_SESSION["id"];
		$dd2 = "d_u";

		$resultado = UsuariosC::BuscarSeguidoresC($busqueda2, $id_usuario, $dd2);

		echo json_encode($resultado);

	} 


}


if(isset($_POST["VerificarUsuario"])){

	$verificar = new UsuariosA();
	$verificar -> VerificarUsuario = $_POST["VerificarUsuario"];
	$verificar -> VerificarUsuario();

}


if(isset($_POST["VerificarEmail"])){

	$VerificarE = new UsuariosA();
	$VerificarE -> VerificarEmail = $_POST["VerificarEmail"];
	$VerificarE -> VerificarEmail();

}


if(isset($_POST["busqueda"])){

	$busqueda = new UsuariosA();
	$busqueda -> busqueda = $_POST["busqueda"];
	$busqueda -> busquedaA();

}

if(isset($_POST["busqueda2"])){

	$busqueda2 = new UsuariosA();
	$busqueda2 -> busqueda2 = $_POST["busqueda2"];
	$busqueda2 -> busquedaA2();

}

