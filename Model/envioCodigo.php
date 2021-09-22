<?php
     
    include_once ("../Partials/menu.php"); 
    
    include_once ("../Model/conexion.php");

    if($_SESSION['usuario']){
        $correoUsuario = $_SESSION ['usuario'];

        $sql = 'SELECT * FROM persona WHERE correo_persona = ? AND confirmacion_correo_persona = "NO" ';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($correoUsuario));
        $resultado = $sentencia->fetch();

        if($resultado){

            $sql = 'SELECT codigo_confirmacion FROM confirmacion WHERE persona_confirmacion = ?';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($correoUsuario));
            $resultado = $sentencia->fetch();

            $numero_comprobacion = $resultado[0];
            
            $header = 'From: ' . "FORO SEGURIDAD COL" . "\r\n";  
            $header .= "X-mailer: PHP/" . phpversion() . "\r\n";
            $header .= "Mime-Version: 1.0  \r\n";
            $header .= "Content-Type: text/plain";
                
            $mensaje = "Este mensaje fue enviado por " . "FORO DE SEGURIDAD COL reenvio codigo de verificacion" . ",\r\n";
            $mensaje .= "Codigo de verificacion: " . $numero_comprobacion . ",\r\n";
            $mensaje .= "Su email es: " . $correoUsuario . " \r\n";
            $mensaje .= "Mensaje: Ingresa el codigo a la pagina de comprobacion " . " \r\n";
            $mensaje .= "Enviado el " . date('d/m/Y' , time());
                
            //$para = 'J02admbtura@cendoj.ramajudicial.gov.co';
            $para = $correoUsuario;
            $asunto = "Codigo de comprobacion FORO SEGUIDAD COL";
                
            mail($para,$asunto , utf8_decode($mensaje) ,$header);

            header("Location:../View/confirmarCorreo.php");

        }

    }

?>