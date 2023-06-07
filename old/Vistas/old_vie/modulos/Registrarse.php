<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <center><img src="Vistas/img/images/logosolo.png" width="150px" height="150px"></center>

    <form method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nombre" placeholder="Su Nombre" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="user" name="usuario" placeholder="Su Usuario" required="">
        <span class="fa fa-at form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="mail" name="email" placeholder="Su Email" required="">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="c1" name="clave" placeholder="Su Contraseña" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="c2" name="clave2" placeholder="Repita su Contraseña" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div> 
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">

      
      <a href="Ingresar" class="text-center">Iniciar Sesión</a>
     
    </div>
    <!-- /.social-auth-links -->

    <?php

    $Registrarse = new UsuariosC();
    $Registrarse -> RegistrarUsuarioC();

    ?>

  </div>
  <!-- /.login-box-body -->
</div>