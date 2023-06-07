<?php

class ConexionBD{

	static public function cBD(){

		$bd = new PDO("mysql:host=localhost;dbname=cinerian", "root", "");

		$bd -> exec("set names utf8");

		return $bd;

	}


}
