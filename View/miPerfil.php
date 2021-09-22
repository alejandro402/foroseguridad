<?php

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
//include_once ("../Partials/footer.php");

include_once ("../Model/conexion.php");

if(isset($_SESSION['usuario'])) {

    $correo = $_SESSION['usuario'];

    $sql_leer = "SELECT * FROM persona WHERE correo_persona = ?";
    $sentenciaa = $pdo->prepare($sql_leer);
    $sentenciaa->execute(array($correo));
    $verificar = $sentenciaa->fetchAll();

    if($verificar){

        ?>

        <div class="container">
            <div class="row">
            <h1 class="text-center">Mi perfil</h1>
                <h5 class="text-center">Correo electronico: <?php echo $_SESSION['usuario']; ?></h5>

                <div class="col-sm-12">
                    <a href="modificarUsuario.php" class="btn btn-primary">Modificar Usuario</a>
                    <a href="misDiscusiones.php" class="btn btn-primary">Mis discusiones</a>
                    
                    <a href="borrarCuenta.php" class="btn btn-danger">Borrar Usuario</a>
                </div>

            </div>
        </div>

        <?php

    }

}


?>