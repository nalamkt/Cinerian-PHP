<div class="card minglow br24">
    <img src="Vistas/img/images/logosolo.png" class="mb-2">
    <form method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" id="user1" name="usuario" placeholder="Nombre de Usuario">
        <p id="UR">El Usuario Ya Existe</p>

        <input type="text" id="mail" name="email" placeholder="Ingresar E-mail">
        <p id="mR">El Email Ya Existe</p>
        
        <input type="text" id="c1" name="clave" placeholder="Establecer contraseña de 6-12 dígitos">
        <p id="CR">La Contraseña debe tener al menos 6 carácteres.</p>
        <input type="text" id="c2" name="clave2" placeholder="Re ingresar contraseña de 6-12 dígitos">
        <p id="CCR">Las Contraseñas no Coinciden.</p>

        <div class="col-12">
            <div class="row mt-2 nav">
                <div class="col-6">
                    <a href="Ingresar">
                        <button type="button">Ingresar</button>
                    </a>
                </div>
                <div class="col-6">
                    <button type="submit">Registrarse</button>
                </div>
            </div>
        </div>

        <?php

        $Registrarse = new UsuariosC();
        $Registrarse -> RegistrarUsuarioC();

        ?>
    </form>
    
</div>