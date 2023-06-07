<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <center><img src="Vistas/img/images/logosolo.png" width="150px" height="150px"></center>
    <p class="login-box-msg" style="margin-top: -30px"><center><h2 style="color: #fff">Bienvenido!</h2></center></p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="clave" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>

      <?php

      $ingresar = new UsuariosC();
      $ingresar-> IniciarSesionC();

      ?>
    </form>

    <div class="social-auth-links text-center">

      <a href="#">I forgot my password</a><br>
      
      <a href="Registrarse" class="text-center">Register a new membership</a>
      <br>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->



  </div>
  <!-- /.login-box-body -->
</div>