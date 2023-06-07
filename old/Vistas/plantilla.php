<?php

  session_start();

  $generales = GeneralesC::VerGeneralesC();

  $urlP = $generales["ruta"];

?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CINERIAN</title>
        <meta name="description" content="CINERIAN">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $urlP; ?>Vistas/css/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo $urlP; ?>Vistas/css/index.css">
        <link rel="stylesheet" href="<?php echo $urlP; ?>Vistas/css/index1.css">
        <link rel="stylesheet" href="<?php echo $urlP; ?>Vistas/css/index2.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="<?php echo $urlP; ?>Vistas/js/main.js"></script>
    </head>
    <body class="index">

<?php

  if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){

    echo '<div id="right-panel">';

    include "modulos/menu.php";

    $url = array();

    if(isset($_GET["url"])){

      $url = explode("/", $_GET["url"]);

      if($url[0] == "Inicio" || $url[0] == "Salir" || $url[0] == "Perfil" || $url[0] == "Usuario"){

        include "modulos/".$url[0].".php";

      }

    }else{

      include "modulos/Inicio.php";

    }

    echo '</div>';


  }else if(isset($_GET["url"])){

    $url = explode("/", $_GET["url"]);

    if($url[0] == "Ingresar"){

      include "modulos/Ingresar.php";

    }else if($url[0] == "Registrarse"){

      include "modulos/Registrarse.php";

    }

  }else{

    include "modulos/Ingresar.php";

  }



 ?> 


<!-- jQuery 3 -->
<script src="<?php echo $urlP; ?>Vistas/js/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $urlP; ?>Vistas/js/jquery-ui/jquery-ui.min.js"></script>

<script src="<?php echo $urlP; ?>Vistas/js/plantilla.js"></script>
<script src="<?php echo $urlP; ?>Vistas/js/usuarios.js"></script>
<script src="<?php echo $urlP; ?>Vistas/js/solicitudes.js"></script>
<script src="<?php echo $urlP; ?>Vistas/js/peliculas.js"></script>

</body>
</html>
