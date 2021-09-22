<?php 

include_once ("../Partials/head.php");
include_once ("../Partials/menu.php");
include_once ("../Partials/head.php");
include_once ("../Model/conexion.php");

if($_SESSION['usuario']){

    if(isset($_POST['submit'])){

        $correo = $_SESSION['usuario'];
        
        $codigoConfirmacionUsuario = $_POST['codigo_confirmacion'];
        
        $sql_leer = "SELECT * FROM persona WHERE correo_persona = ? AND confirmacion_correo_persona = 'NO'";
        $sentenciaa = $pdo->prepare($sql_leer);
        $sentenciaa->execute(array($correo));
        $resultados = $sentenciaa->fetchAll();

        if($resultados){
            
            $sql = "SELECT * FROM confirmacion WHERE codigo_confirmacion = ?";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($codigoConfirmacionUsuario));
            $resultado = $sentencia->fetchAll();

            if($resultado){
                $confirmado = "SI";
                
                $sql_confirmacion = 'UPDATE confirmacion SET confirmacion = ? WHERE persona_confirmacion = ?';
                $sentencia_agregar_confirmacion = $pdo->prepare($sql_confirmacion);
                $sentencia_agregar_confirmacion->execute(array($confirmado,$correo));

                $sql_confirmacion2 = 'UPDATE persona SET confirmacion_correo_persona = ? WHERE correo_persona = ?';
                $sentencia_agregar_confirmacion2 = $pdo->prepare($sql_confirmacion2);
                $sentencia_agregar_confirmacion2->execute(array($confirmado,$correo));
                header("Location:../View/index.php");
            }else {
                header("Location:../View/confirmarCorreo.php");
            }
           
        }else {

            header("Location:../View/index.php");
            
        }
    }
}else{
    header("Location:../View/index.php");
}

?>