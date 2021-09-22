<?php 

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
//include_once ("../Partials/footer.php");

include_once ("../Model/conexion.php");


if(isset($_POST['ciudad'])){

    $ciudad = $_POST['ciudad'];

    $sql_leer = "SELECT * FROM suceso WHERE ciudad_suceso = ? ORDER BY fecha_creacion_suceso DESC";
    $sentenciaa = $pdo->prepare($sql_leer);
    $sentenciaa->execute(array($ciudad));
    $resultados = $sentenciaa->fetchAll();

}else{

    $sql_leer = "SELECT * FROM suceso ORDER BY fecha_creacion_suceso DESC";
    $sentenciaa = $pdo->prepare($sql_leer);
    $sentenciaa->execute();
    $resultados = $sentenciaa->fetchAll();
    
}

?>


<div class="container">
    <div class="row">
        <h1 class="text-center">Foro de sucesos de seguridad en Colombia</h1>
        <div class="col-sm-2 ">
            Ciudad: 
            <br>
            <div class="card" >
                <img src="https://www.cali.gov.co/gobierno/info/principal/media/pubInt/thumbs/thpub_700x400_155052.jpg." class="card-img-top" alt="Cali">
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <input type="submit" class="btn btn-danger" value="CALI" name="ciudad">
                    </form>
                </div>
            </div>
            <br>
            
            <div class="card" >
                <img src="https://img.blogs.es/smartcitylab/wp-content/uploads/2019/11/transformacion-de-medellin-1920x1000.jpg" class="card-img-top" alt="Medellín">
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <input type="submit" class="btn btn-danger" value="MEDELLÍN" name="ciudad">
                    </form>
                </div>
            </div>

            <br>

            <div class="card" >
                <img src="https://www.valoraanalitik.com/wp-content/uploads/2021/02/Bogota.png" class="card-img-top" alt="Bogotá">
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <input type="submit" class="btn btn-danger" value="BOGOTA" name="ciudad">
                    </form>
                </div>
            </div>
            
            <div class="card" >
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/1200px-Flag_of_Colombia.svg.png" class="card-img-top mt-4" alt="Bogotá">
                <div class="card-body">
                    <a href="index.php" class="btn btn-danger">Todas las ciudades</a>
                </div>
            </div>

        </div>
        <div class="col-sm-8 ">

            Ultimos sucesos:
            <?php

            foreach($resultados as $fila){
                ?>

                <div class="card">
                    <div class="card-body">
                        <h2><?php echo $fila['ciudad_suceso']?> </h2>
                        <h4> <?php echo $fila['lugar_suceso']?> </h4>
                        <h5> <?php echo $fila['suceso']?> </h5>
                        <p>Fecha creacion: <?php echo $fila['fecha_creacion_suceso']?> </p> 
                        <a href="discusion.php?suceso=<?php echo $fila['id_suceso'] ?>" class="btn btn-danger">Ver relato</a>
                    </div>
                </div>

            <?php
            
            }
                
            ?>

        </div>
        <div class="col-sm-2">
            publicidad
        </div>
    </div>
</div>