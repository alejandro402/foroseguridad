<?php 

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
//include_once ("../Partials/footer.php");

//include_once ("../Model/conexion.php");

?>

<div class="container">
    <div class="row">
        <h1 class="text-danger text-center mt-3">Inicia Sesión</h1>
        <div class="col-sm-12 d-flex justify-content-center">
            <form action="../Model/iniciarSesion.php" method="POST">
                <div class="div col-sm-12">
                
                    <div class="mb-3 col-sm-12">
                        <label class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" name="correo" required>
                        <div id="emailHelp" class="form-text">No compartas información personal en internet.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" required>
                    </div>
                    <div class="mb-3 form-check text-center">
                        <a href="crearUsuario.php">Crear usuario</a>
                    </div>

                    <div class="mb-3 form-check text-center">
                        <button type="submit" class="btn btn-danger">Iniciar Sesión</button>
                        
                    </div>

                </div>
                
            </form>
        </div>
    </div>
</div>