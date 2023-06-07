<?php

class GeneralesC{

	static public function VerGeneralesC(){

		$tablaBD = "generales";

		$resultado = GeneralesM::VerGeneralesM($tablaBD);

		return $resultado;

	}


}