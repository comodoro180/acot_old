<?php
include_once '../controles/UsuarioSesion.php';
include_once '../conf/config.inc.php';
?>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">

    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">          
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo INICIO ?>">ACOT</a>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="#">
            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>                        
            Menu
          </a>
        </li>
        <li><a href="#">Menu2</a></li>
        <li><a href="#">Menu3</a></li>
        <li><a href="#">Menu4</a></li>
<!--        <li><a href="<?php echo ACTIVAR_USUARIO ?>">Activar usuario</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo CAMBIAR_CLAVE ?>">Cambiar clave</a></li>
          <li><a href="<?php echo ACTIVAR_USUARIO ?>">Activar usuario</a></li>
          <?php
          if (ControlSesion::sesion_iniciada()) {
              ?>
            <li>
              <a href="#">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
              </a>
            </li>
            <li>
              <a href="<?php echo LOGOUT; ?>">
                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar sesión
              </a>
            </li> 
            <?php
        } else {
            ?> 
            <li><a href="<?php echo REGISTRO_USUARIO ?>">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Registro</a></li>
            <li><a href="<?php echo LOGIN ?>">
                <i class="fa fa-address-card-o" aria-hidden="true"></i>
                Iniciar sesión</a></li> 
            <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>