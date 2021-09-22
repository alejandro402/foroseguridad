<?php 

include_once ('conexion.php');
include_once ('../Partials/menu.php');

    if(isset($_SESSION['usuario'])) {
        
        $id_suceso = $_POST['id_suceso'];
        $id_persona = $_SESSION['usuario'];
        $comentario = $_POST['comentario'];

        $post = (isset($_POST['id_suceso']) && !empty($_POST['id_suceso']) ) &&
                (isset($_POST['usuario']) && !empty($_POST['usuario']) ) &&
                (isset($_POST['comentario']) && !empty($_POST['comentario']));

        if($post){
            header("Location:../View/discusion.php?suceso=$id_suceso");
            exit();
        }

        $sql_leer = "SELECT * FROM persona WHERE correo_persona = ? AND confirmacion_correo_persona = 'SI' ";
        $sentenciaa = $pdo->prepare($sql_leer);
        $sentenciaa->execute(array($id_persona));
        $resultados = $sentenciaa->fetchAll();

        
        $sql = "SELECT * FROM comentarios_suceso WHERE id_persona = ? AND id_suceso = ? ";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($id_persona,$id_suceso));
        $verificar = $sentencia->fetchAll();

        if($verificar){
            header("Location:../View/discusion.php?suceso=$id_suceso");
            exit();
        }
        
        if($resultados && !$verificar){

            foreach($resultados as $fila){
                $nombre_persona = $fila['nombre_persona'];
            }
            
            
            $sql_agregar = 'INSERT INTO comentarios_suceso (id_suceso,id_persona,nombre_persona,comentario) VALUES (?,?,?,?)';
            $sentencia_agregar = $pdo->prepare($sql_agregar);
            if($sentencia_agregar->execute(array($id_suceso,$id_persona,$nombre_persona,$comentario))){
                echo 'agregado';
            }else{
                echo 'error';
            }
            $sentencia_agregar = null;
            $pdo=null;
            
            header('location:../View/index.php');


        }else {
            echo "no estas confirmado";
            header("Location:../View/index.php");
        }


    }else {
        header("Location:../View/index.php");
    }


?>