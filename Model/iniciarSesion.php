<?php 

session_start();

include_once '../Model/conexion.php';

$correo = $_POST['correo'];
$contrasena_login = $_POST['contrasena'];

//verifica si el usuario existe
$sql = 'SELECT * FROM persona WHERE correo_persona = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($correo));
$resultado = $sentencia->fetch();


if(!$resultado){
    //ejecutrar el codigo
    echo 'No existe usuario';
    
    header('location:../View/iniciarSesion.php');

    die();

}

//var_dump($resultado['contrasena_usuario']);


if(password_verify( $contrasena_login , $resultado['contrasena_persona'] ) ){

    //las contraseñas son iguales
    session_start();

    $_SESSION['usuario'] = $correo;
    header('location: ../view/index.php');


}else{
    
    header("Location:../View/iniciarSesion.php");
    
    die();

}

?>