<?php 

require_once "controladores/plantillaC.php";

require_once "controladores/generalesC.php";
require_once "modelos/generalesM.php";

require_once "controladores/usuariosC.php";
require_once "modelos/usuariosM.php";

require_once "controladores/peliculasC.php";
require_once "modelos/peliculasM.php";

$plantilla = new Plantilla();
$plantilla -> LLamarPlantilla();