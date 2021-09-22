<?php 

include_once ("../Model/conexion.php");
include_once ("../Partials/menu.php");

if(isset($_SESSION['usuario'])){

    if(isset($_POST['submit'])){
        
        $correo = $_SESSION['usuario'];
        $contrasena = $_POST['contrasena'];
        $razon = $_POST['razon_eliminacion_cuenta'];
        
        $sql = 'SELECT * FROM persona WHERE correo_persona = ?';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($correo));
        $resultado = $sentencia->fetch();

        if($resultado){

            if(password_verify( $contrasena , $resultado['contrasena_persona'] ) ){

                //las contraseñas son iguales

                $sql_agregar = 'INSERT INTO razones_eliminacion (razon_eliminacion) VALUES (?)';
                $sentenciaa = $pdo->prepare($sql_agregar);
                $sentenciaa->execute(array($razon));
                $resultados = $sentenciaa->fetch();

                $sql = 'DELETE FROM persona WHERE correo_persona = ?';        
                $sentencia = $pdo->prepare($sql);
                $sentencia->execute(array($correo));
                $resultado = $sentencia->fetchAll(); 

                $sqlss = 'DELETE FROM comentarios_suceso WHERE id_persona = ?';        
                $sentenciass = $pdo->prepare($sqlss);
                $sentenciass->execute(array($correo));
                $resultadoss = $sentenciass->fetchAll();

                $sqlss = 'DELETE FROM confirmacion WHERE persona_confirmacion = ?';        
                $sentenciass = $pdo->prepare($sqlss);
                $sentenciass->execute(array($correo));
                $resultadoss = $sentenciass->fetchAll();


                if(isset($_POST['eliminar_sucesos'])){
                    $sqlss = 'DELETE FROM suceso WHERE id_creador_suceso = ?';        
                    $sentenciass = $pdo->prepare($sqlss);
                    $sentenciass->execute(array($correo));
                    $resultadoss = $sentenciass->fetchAll();
                }


                header("Location:../Model/cerrarSesion.php");
            
            }else{
                
                
                header("Location:../View/borrarCuenta.php");
                
                die();
            
            }

        }else {
            header("Location:../View/IniciarSesion.php");
        }

    }

}else {
    header("Location:../View/iniciarSesion.php");
}

?>