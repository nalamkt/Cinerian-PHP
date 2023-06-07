<?php

require_once "ConexionBD.php";

class GeneralesM extends ConexionBD{

	static public function VerGeneralesM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = 1");

		$pdo -> execute();

		return $pdo ->fetch();
		

	}




}