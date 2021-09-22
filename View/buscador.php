<?php 

include_once ("../Partials/menu.php");
include_once ("../Partials/head.php");
include_once ("../Model/conexion.php");

if(isset($_SESSION['usuario'])) {

    $relato = $_POST['relato'];

    $sql = 'SELECT * FROM suceso WHERE relato_suceso like ?';        
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute(array($relato));
    $resultado = $sentencia->fetchAll();

    if($resultado){

        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h2><?php echo $fila['ciudad_suceso'];?> </h2>
                            <h4> <?php echo $fila['lugar_suceso'];?> </h4>
                            <h5> <?php echo $fila['suceso'];?> </h5>
                            <p>Fecha creacion: <?php echo $fila['fecha_creacion_suceso'];?> </p> 
                            <a href="discusion.php?suceso=<?php echo $fila['id_suceso'];?>" class="btn btn-danger">Ver relato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

    }else{
        header("Location:../View/index.php");
    }


}

?>