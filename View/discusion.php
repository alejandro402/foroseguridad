<?php 

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
//include_once ("../Partials/footer.php");

include_once ("../Model/conexion.php");

$suceso = $_GET['suceso'];

$sql_leer = "SELECT * FROM suceso WHERE id_suceso = ?";
$sentenciaa = $pdo->prepare($sql_leer);
$sentenciaa->execute(array($suceso));
$resultados = $sentenciaa->fetchAll();

$sql = "SELECT * FROM comentarios_suceso WHERE id_suceso = ?";
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($suceso));
$resultado = $sentencia->fetchAll();


if(isset($_SESSION['usuario'])){

    $correo = $_SESSION['usuario'];

    $sql_leer = "SELECT * FROM suceso WHERE id_creador_suceso = ? AND id_suceso = ?";
    $sentenciaa = $pdo->prepare($sql_leer);
    $sentenciaa->execute(array($correo,$suceso));
    $verificar = $sentenciaa->fetchAll();


    if($verificar){
        //echo "DUEÑO DEL SUCESO";
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    foreach($resultados as $fila){
                    ?>
                    <h1 class="text-center text-danger">Discusión # <?php echo $fila['id_suceso']; ?></h1>
                    <div class="card">
                        <h5 class="card-header text-danger"><?php echo $fila['lugar_suceso'] . " - " . $fila['ciudad_suceso'] . " - " . $fila['fecha_creacion_suceso'];;?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fila['suceso'];?></h5>
                            <p class="card-text"><?php echo $fila['relato_suceso']. "<br>" ?></p>
                        </div>
                    </div>
                    <?php
                    }
        
                    
                    ?>
            
                </div>

                <?php
                
                if($resultado){
               
                    foreach($resultado as $fila){
    
                    ?>
    
                    <div class="col-sm-7 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>Comentario anonimo</h5>
                                <?php echo $fila['comentario']; ?>
                            </div>
                        </div>
                    </div>
    
                    <br>
    
                    <?php 
    
                    }
    

                }

                ?>      
        
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    foreach($resultados as $fila){
                    ?>
                    <h1 class="text-center text-danger">Discusión # <?php echo $fila['id_suceso']; ?></h1>
                    <div class="card">
                        <h5 class="card-header"><?php echo $fila['lugar_suceso'] . " - " . $fila['ciudad_suceso'] . " - " . $fila['fecha_creacion_suceso'];;?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fila['suceso'];?></h5>
                            <p class="card-text"><?php echo $fila['relato_suceso']. "<br>" ?></p>
                        </div>
                    </div>
                    <?php
                    }
        
                    
                    ?>
        
                    
                </div>
        
        

               
                <?php
                
                if($resultado){
               
                    foreach($resultado as $fila){
    
                    ?>
    
                    <div class="col-sm-7 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h5><?php echo $fila['nombre_persona'];?></h5>
                                <?php echo $fila['comentario']; ?>
                            </div>
                        </div>
                    </div>
    
                    <br>
    
                    <?php 
    
                    }
    

                }

                ?>

                <div class="col-sm-7 mt-6">
                
                        <form action="../Model/crearComentario.php" method="POST" class="mt-3">
        
                            <div class="mb-3">
                                <div class="mb-3">
                                <label class="form-label">¿Quieres Escribir un comentario?</label>
                                <input type="text" class="form-control form-control-lg" name="comentario" required>
                                <input type="hidden" name="id_suceso" value="<?php echo $suceso;?>">
                                <input type="submit"  class="btn btn-danger mt-2">
                            </div>
                        
                        </form>
                    
                </div>

            </div>
        </div>
        <?php
        //echo "NOOO ENCONTRADO";

    }
    

?>

<?php

}else{
    ?>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Debes iniciar sesión , Si no tienes cuenta crea una.</h1>
            <div class="col-sm-12 text-center">
                <a href="iniciarSesion.php" class="btn btn-danger text-center">Iniciar Sesión</a>
                <a href="crearUsuario.php" class="btn btn-danger text-center">Crear Usuario</a>
            </div>
        </div>
    </div>
    
    <?php
}