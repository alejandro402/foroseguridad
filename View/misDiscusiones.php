<?php 

//AQUI VEO SI UN USUARIO TIENE DISCUSIONES , PUEDO BORRAR LA DISCUSION Y ASÍ MISMO BORRO LOS COMENTARIOS
include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
//include_once ("../Partials/foooter.php");

include_once ("../Model/conexion.php");

if(isset($_SESSION['usuario'])) {

    $id_creador_suceso = $_SESSION['usuario'];

    $sql_leer = "SELECT * FROM suceso WHERE id_creador_suceso = ?";
    $sentenciaa = $pdo->prepare($sql_leer);
    $sentenciaa->execute(array($id_creador_suceso));
    $resultados = $sentenciaa->fetchAll();

    $sql = "SELECT * FROM comentarios_suceso WHERE id_persona = ?";
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute(array($id_creador_suceso));
    $comentarios = $sentencia->fetchAll();
    
    ?>
    <div class="container">
        <div class="row">
        <h1 class="text-center text-danger">Mis discusiones y comentarios</h1>
    <?php
    if($resultados){
        ?>

                <?php
                foreach($resultados as $fila){

                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <?php echo "Suceso: " . $fila['ciudad_suceso'];?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fila['suceso'];?></h5>
                        <p class="card-text"><?php echo $fila['relato_suceso'];?></p>
                        <p class="card-text"><?php echo $fila['fecha_creacion_suceso'];?></p>
                        <form action="../Model/borrarSuceso.php" method="POST">
                            <input type="hidden" value="<?php echo $fila['id_suceso']?>" name="id_suceso">
                            <input type="submit" class="btn btn-danger" value="Borrar Suceso" name="borrar_Suceso">
                        </form>
                    </div>
                </div>
        
        <?php
    }

    ?>


<?php 

        if($comentarios){
            foreach($comentarios as $fila){
            ?>
            <div class="card">
            <div class="card-header">
                
            </div>
                <div class="card-body">
                        
                <p class="card-text"><?php echo $fila['comentario'];?></p>
                <p class="card-text"><?php echo $fila['fecha_comentario'];?></p>
                    <form action="../Model/borrarComentario.php" method="POST">
                        <input type="hidden" value="<?php echo $fila['id_comentario']?>" name="id_comentario">
                        <a href="discusion.php?suceso=<?php echo $fila['id_suceso']; ?>" class="btn btn-primary">Ver discusioón</a>
                        <input type="submit" class="btn btn-danger" value="Borrar comentario" name="borrar_comentario">
                    </form>
                </div>
            </div>
                <?php
                }
            }

            ?>


    <?php

}if($resultados == null && $comentarios == null) {
    ?>
    <h1>No has creado un suceso o comentario</h1>
    <?php
}

?>

    </div>
</div>