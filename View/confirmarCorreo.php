<?php 

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
//include_once ("../Partials/footer.php");

include_once ("../Model/conexion.php");

if($_SESSION['usuario']){

    $correo = $_SESSION['usuario'];
    $confirmacion = "NO";
    
    $sql_leer = "SELECT * FROM persona WHERE correo_persona = ? AND confirmacion_correo_persona = ?";
    $sentenciaa = $pdo->prepare($sql_leer);
    $sentenciaa->execute(array($correo,$confirmacion));
    $resultados = $sentenciaa->fetchAll();

    ?>

    <div class="container">
        <div class="row">

        <h1 class="text-center">Confirmación de Correo</h1>
        
    <?php

    if($resultados){ 
        ?>

        <div class="col-sm-12 mt-3">
            <form action="../Model/codigoCorreo.php" method="POST">
                <div class="input-group mb-3 col-sm-12 col-lg-6">
                    <span class="input-group-text">Codigo de confirmación</span>
                    <input type="number" class="form-control" placeholder="Codigo de confirmación" name="codigo_confirmacion">
                    <input type="submit" class="btn btn-danger" value="verificar" name="submit">
                </div>
            </form>
            <form action="../Model/envioCodigo.php" method="POST">
                <input type="submit" class="btn btn-primary text-center" value="Enviar codigo confirmacion">
            </form>
        </div>

        <?php
    }else {

        ?>

        <h2 class="text-center">Ya has confirmado tu correo electronico</h2>
        <a href="index.php" class="text-center btn btn-danger">Ir a la pagina principal</a>
        <?php
    }

    ?>

        </div>
    </div>

    <?php

}else {
    header("Location:../View/iniciarSesion.php");
}


?>