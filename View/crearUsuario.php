<?php 

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
//include_once ("../Partials/footer.php");

?>

<div class="container">
    <div class="row">

        <h1 class="text-center">Crear usuario</h1>
        <div class="col-sm-12 d-flex justify-content-center">
            <form action="../Model/crearUsuario.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre completo o Apodo(MasterChief99)</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo electronico</label>
                    <input type="email" class="form-control" name="correo" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ciudad</label>
                    <select class="form-select" name="ciudad">
                            <option selected value="CALI">Cali</option>
                            <option value="MEDELLIN">Medellín</option>
                            <option value="BOGOTÁ">Bogotá</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña(Minimo 12 caracteres)</label>
                    <input type="password" class="form-control" name="contrasena" minlength="12" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Repite Contraseña(Minimo 12 caracteres)</label>
                    <input type="password" class="form-control" name="contrasena2" minlength="12" required>
                </div>
                
                <button type="submit" class="btn btn-danger text-center">Crear Usuario</button>
            </form>
        
        </div>
    </div>
</div>