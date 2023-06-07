<?php 

require_once "Controladores/plantillaC.php";

require_once "Controladores/generalesC.php";
require_once "Modelos/generalesM.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/peliculasC.php";
require_once "Modelos/peliculasM.php";

$plantilla = new Plantilla();
$plantilla -> LLamarPlantilla();