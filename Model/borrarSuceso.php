<?php 

include_once ('../Model/conexion.php');
include_once ('../Partials/menu.php');

if(isset($_SESSION['usuario'])){

    if($_POST['borrar_Suceso']){

        $id_suceso = $_POST['id_suceso'];
        $id_persona = $_SESSION['usuario'];

        $sql_leer = "SELECT * FROM suceso WHERE id_suceso = ? AND id_creador_suceso = ?";
        $sentenciaa = $pdo->prepare($sql_leer);
        $sentenciaa->execute(array($id_suceso,$id_persona));
        $resultados = $sentenciaa->fetchAll();

        if($resultados){

            $sql = 'DELETE FROM comentarios_suceso WHERE id_suceso = ?';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($id_suceso));
            $resultado = $sentencia->fetch();

            $sql = 'DELETE FROM suceso WHERE id_suceso = ? AND id_creador_suceso = ?';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($id_suceso,$id_persona));
            $resultado = $sentencia->fetch();


            header("Location:../View/misDiscusiones.php");
        }else {
            //header("Location:../View/index.php");
            echo $id_persona . "  " . $id_suceso; 
        }


    }

}else {
    header("Location:../View/index.php");
}




?>