<div class="card minglow br24">
    <img src="Vistas/img/images/logosolo.png" class="mb-4">
    <h1>Bienvenido!</h1>
    <form method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="clave" placeholder="Contraseña">
        <input type="submit" value="Ingresar" class="br24 ing w-100 mt-3">

        <?php

        $ingresar = new UsuariosC();
        $ingresar-> IniciarSesionC();

        ?>
    </form>
    <div class="col-12">
        <a href="#" class="cn mt-3">Forgot password?</a>
        <p>No account yet? <a href="Registrarse" class="cn">Registrarse</a></p>
        <p>or continue with</p>
        <div class="row mt-2 social">
            <div class="col-6">
                <button><img src="Vistas/img/images/facebook.png"></button>
            </div>
            <div class="col-6">
                <button><img src="Vistas/img/images/google.png"></button>
            </div>
        </div>
    </div>
</div>