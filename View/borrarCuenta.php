<?php 

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");

include_once ("../Model/conexion.php");


if(isset($_SESSION['usuario'])){

    ?>

    <div class="container">
        <div class="row">
            <h2 class="text-center text-danger mt-1">¿Deseas eliminar cuenta?, escoge una razón</h2>
            <form action="../Model/borrarUsuario.php" method="POST">
                <div class="col-sm-12 mt-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Escribe contraseña</span>
                        <input type="password" class="form-control" name="contrasena" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <select class="form-select" name="razon_eliminacion_cuenta">
                        <option value="Ninguna en especifico" selected>Ninguna en especifico</option>
                        <option value="No me gustó la página">No me gustó la página, Interfaz o funciones</option>
                        <option value="La verdad ni lo uso">La verdad ni lo uso</option>
                        <option value="Siento que es insegura">Siento que es insegura</option>
                        <option value="Muy toxica su comunidad">Muy toxica su comunidad</option>
                        <option value="No le veo sentido">No le veo sentido</option>
                    </select>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="eliminar_sucesos" name="eliminar_sucesos">
                    <label class="form-check-label">
                    Eliminar Mis post o sucesos.
                    </label>
                </div>

                <input type="submit" name="submit" value="Eliminar cuenta" class="btn btn-danger mt-3">
            </form>
        </div>
    </div>

    <?php

}else {
    header("Location:../View/iniciarSesion.php");
}

?>