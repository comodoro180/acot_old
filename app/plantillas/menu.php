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
          <li>
          <a href="<?php echo ADMINISTRACION ?>">
            <i class="fa fa-cogs" aria-hidden="true"></i>                       
            Administración
          </a>              
        </li>
        <!-- Menu Administracion-->
<!--        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="menu_administracion" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cogs" aria-hidden="true"></i>                       
            Administración
          </a>              
          <div class="dropdown-menu" aria-labelledby="menu_administracion">                    
            <a class="dropdown-item btn" href="#">Geográfica</a>                    
            <a class="dropdown-item btn" href="#">Opción 2</a><br>                   
            <a class="dropdown-item btn" href="#">Opción 3</a>
          </div>
        </li>
-->
        <!--fin menu administración-->
        <li><a href="#">Menu2</a></li>
        <li><a href="#">Menu3</a></li>
        <li><a href="#">Menu4</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <?php
          if (ControlSesion::sesion_iniciada()) {
              ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                <i class="fa fa-caret-down" aria-hidden="true"></i>
              </a>              
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">                    
                <a class="dropdown-item btn" href="<?php echo CAMBIAR_CLAVE; ?>">Cambiar contraseña</a>                    
                <a class="dropdown-item btn" href="#">Opción 2</a><br>                   
                <a class="dropdown-item btn" href="#">Opción 3</a>
              </div>
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