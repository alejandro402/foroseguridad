<?php 

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
//include_once ("../Partials/footer.php");

//include_once ("../Model/conexion.php");

if( isset($_SESSION['usuario']) ){
   
    //echo 'bienvenido! ' . $_SESSION['usuario'];
    //echo '<br><a href="cerrar.php">Cerrar session</a>';
    
    $inactividad = 15;

    echo "sesión iniciada";
    
?>


    <div class="container">
        <div class="row">
            <h1 class="text-center">Bienvenid@</h1>
            <h3 class="">¿Deseas crear un suceso que te ocurrio hace poco?</h3>
            <div class="col-sm-12 col-lg-6">
                <form action="../Model/crearSuceso.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">¿En que ciudad te ocurrio?</label>
                        <select class="form-select" name="ciudad_suceso">
                            <option selected value="CALI">Cali</option>
                            <option value="MEDELLIN">Medellín</option>
                            <option value="BOGOTÁ">Bogotá</option>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Escibre la dirección donde te ocurrio</label>
                        <input type="text" class="form-control"  name="lugar_suceso" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Describe brevemente lo que paso</label>
                        <input type="text" class="form-control" name="suceso" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Describe detalladamente que paso</label>
                        <input type="text" class="form-control" name="relato_suceso" required>
                    </div>
                    <input type="hidden" name="id_creador_suceso" value="<?php echo $_SESSION['usuario'];?>" >
                    
                    <button type="submit" class="btn btn-primary">Subir al foro</button>
                </form>
            </div>
        </div>
    </div>


<?php 


}else{
    header("Location:../View/iniciarSesion.php");
}

?>