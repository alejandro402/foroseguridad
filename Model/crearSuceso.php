<?php 

include_once ("../Partials/menu.php");
include_once 'conexion.php';

if(isset($_SESSION['usuario'])){

    $id_creador_suceso = $_POST['id_creador_suceso'];
    $ciudad_suceso = $_POST['ciudad_suceso'];
    $lugar_suceso = $_POST['lugar_suceso'];
    $suceso = $_POST['suceso'];
    $relato_suceso = $_POST['relato_suceso'];

    $id_persona = $_SESSION['usuario'];


    $sql_leer = "SELECT * FROM persona WHERE correo_persona = ? AND confirmacion_correo_persona = 'SI' ";
    $sentenciaa = $pdo->prepare($sql_leer);
    $sentenciaa->execute(array($id_persona));
    $resultados = $sentenciaa->fetchAll();

    if($resultado){
        
        $sql_agregar = 'INSERT INTO suceso (id_creador_suceso,ciudad_suceso,lugar_suceso,suceso,relato_suceso) VALUES (?,?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        if($sentencia_agregar->execute(array($id_creador_suceso,$ciudad_suceso,$lugar_suceso,$suceso,$relato_suceso)) ){
            echo 'agregado';
            $sentencia_agregar = null;
            $pdo=null;
            header('location:../View/index.php');
        }else{
            echo 'error';
        }
        

    }else {
        header("Location:../View/confirmarCorreo.php");
    }

}else {
    header("Location:../View/iniciarSesion.php");
}

?>