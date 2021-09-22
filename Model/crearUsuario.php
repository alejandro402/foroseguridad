<?php 

include_once 'conexion.php';

$nombre = $_POST['nombre'];
$correoUsuario = $_POST['correo'];
$edad = $_POST['edad'];
$ciudad = $_POST['ciudad'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];
$confirmacion = "NO";

$sql = 'SELECT * FROM persona WHERE correo_persona = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($correoUsuario));
$resultado = $sentencia->fetch();

if($resultado){
    
    echo 'usuario registrado';
    header("location:../View/iniciarSesion.php");
    die();
}

$contrasena = password_hash($contrasena,PASSWORD_DEFAULT);

// Ver el ejemplo de password_hash() para ver de dónde viene este hash.

if (password_verify($contrasena2, $contrasena)) {
    echo '¡La contraseña es válida!';

    $sql_agregar = 'INSERT INTO persona (nombre_persona,correo_persona,edad_persona,ciudad_persona,contrasena_persona,confirmacion_correo_persona) VALUES (?,?,?,?,?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    if($sentencia_agregar->execute(array($nombre,$correoUsuario,$edad,$ciudad,$contrasena,$confirmacion))){
        header("Location:../Model/crearUsuario.php");

        $codigoConfirmacion = rand(1000000000,4000000000);
            
        $sql = 'INSERT INTO confirmacion (codigo_confirmacion,persona_confirmacion,confirmacion) VALUES (?,?,?)';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($codigoConfirmacion,$correoUsuario,$confirmacion));

        header("Location:../View/verMas.php");
    }else{
        echo 'error';
    }
    $sentencia_agregar = null;
    $pdo=null;
    

} else {
    echo 'La contraseña no es válida.';
}

?>