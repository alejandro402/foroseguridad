<?php 

include_once ('../Model/conexion.php');
include_once ('../Partials/menu.php');

if(isset($_SESSION['usuario'])){

    if($_POST['borrar_comentario']){

        $id_suceso = $_POST['id_comentario'];
        $id_persona = $_SESSION['usuario'];

        $sql_leer = "SELECT * FROM comentarios_suceso WHERE id_comentario = ? AND id_persona = ?";
        $sentenciaa = $pdo->prepare($sql_leer);
        $sentenciaa->execute(array($id_suceso,$id_persona));
        $resultados = $sentenciaa->fetchAll();

        if($resultados){

            $sql = 'DELETE FROM comentarios_suceso WHERE id_comentario=? AND id_persona = ?';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($id_suceso,$id_persona));
            $resultado = $sentencia->fetch();


            header("Location:../View/misDiscusiones.php");
        }else {
            header("Location:../View/index.php");
        }

    }

}else {
    header("Location:../View/index.php");
}

?>