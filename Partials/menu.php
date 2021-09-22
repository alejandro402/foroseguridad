<?php
  session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-danger" href="../View/index.php">ForoSeguridadCol</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <!--
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../View/motosCilindros.php">.</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../View/Motos.php">.</a></li>
          </ul>
        </li>

      -->
        
        <li class="nav-item">
          <a class="nav-link <?php if(!isset($_SESSION['usuario'])){echo "disabled"; } ?>" href="../View/foro.php" >Escribe algo que te pasó</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(!isset($_SESSION['usuario'])){echo "disabled"; } ?>" href="../View/misDiscusiones.php" >Mis Discusiones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(!isset($_SESSION['usuario'])){echo "disabled"; } ?>" href="../View/confirmarCorreo.php" >Confirmar Correo</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if(!isset($_SESSION['usuario'])){echo "disabled"; } ?>" href="../View/miPerfil.php" >Mi perfil</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../View/verMas.php" tabindex="-1" aria-disabled="true">Ver más</a>
        </li>


      </ul>
      
      <form class="d-flex" action="../View/buscador.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Escribe algo a buscar"  name="relato" >
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>

      <?php 

      if( isset($_SESSION['usuario']) ){
        
          //echo 'bienvenido! ' . $_SESSION['usuario'];
          //echo '<br><a href="cerrar.php">Cerrar session</a>';
          
          $inactividad = 15;

          ?>
          <a href="../Model/cerrarSesion.php" class="btn btn-outline-primary">Cerrar Sesión</a>
          <?php

      }
  
      else{

      ?>

        <a href="iniciarSesion.php" class="btn btn-outline-primary ">Iniciar sesión</a>

      <?php

      }

      ?>

    </div>
  </div>
</nav>