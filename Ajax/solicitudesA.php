<?php
session_start();

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

class SolicitudesA{

	public $id_u;

	public function EnviarSolicitudA(){

		$id_u = $this->id_u;
		$id_seg = $_SESSION["id"];

		$resultado = UsuariosC::EnviarSolcitudC($id_seg, $id_u);

		echo json_encode($resultado);

	}

	// Cancelar Solicitudes
	public $id_uCancelar;

	public function CancelarSolicitudA(){

		$id_uCancelar = $this->id_uCancelar;
		$id_seg = $_SESSION["id"];

		$resultado = UsuariosC::CancelarSolcitudC($id_seg, $id_uCancelar);

		echo json_encode($resultado);

	}


	// Dejar de Seguir
	public $id_uDejar;

	public function DejarDeSeguirA(){

		$id_uDejar = $this->id_uDejar;
		$id_seg = $_SESSION["id"];

		$resultado = UsuariosC::DejarDeSeguirC($id_seg, $id_uDejar);

		echo json_encode($resultado);

	}


	// Borrar Solicitud
	public $id_solicitud;

	public function BorrarSolicitudA(){

		$id_solicitud = $this->id_solicitud;

		$resultado = UsuariosC::BorrarSolicitudC($id_solicitud);

		echo json_encode($resultado);

	}


	// Aceptar Solicitud
	public $id_solicitudAceptada;

	public function AceptarSolicitudA(){

		$id_solicitudAceptada = $this->id_solicitudAceptada;

		$resultado = UsuariosC::AceptarSolicitudC($id_solicitudAceptada);

		echo json_encode($resultado);

	}

	// Enviar Solicitud Tambien
	public $id_solicitudEnv;

	public function EnviarSolicitudTambienA(){

		$id_solicitudEnv = $this->id_solicitudEnv;

		$resultado = UsuariosC::EnviarSolicitudTambienC($id_solicitudEnv);

		echo json_encode($resultado);

	}

}


if(isset($_POST["id_u"])){

	$PNI = new SolicitudesA();
	$PNI -> id_u = $_POST["id_u"];
	$PNI -> EnviarSolicitudA();

}


if(isset($_POST["id_uCancelar"])){

	$cancelar = new SolicitudesA();
	$cancelar -> id_uCancelar = $_POST["id_uCancelar"];
	$cancelar -> CancelarSolicitudA();

}


if(isset($_POST["id_uDejar"])){

	$dejar = new SolicitudesA();
	$dejar -> id_uDejar = $_POST["id_uDejar"];
	$dejar -> DejarDeSeguirA();

}

if(isset($_POST["id_solicitud"])){

	$borrar = new SolicitudesA();
	$borrar -> id_solicitud = $_POST["id_solicitud"];
	$borrar -> BorrarSolicitudA();

}

if(isset($_POST["id_solicitudAceptada"])){

	$aceptar = new SolicitudesA();
	$aceptar -> id_solicitudAceptada = $_POST["id_solicitudAceptada"];
	$aceptar -> AceptarSolicitudA();

}


if(isset($_POST["id_solicitudEnv"])){

	$envTamb = new SolicitudesA();
	$envTamb -> id_solicitudEnv = $_POST["id_solicitudEnv"];
	$envTamb -> EnviarSolicitudTambienA();

}


