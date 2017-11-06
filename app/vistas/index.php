<?php
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';
?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>ACOT</h1>      
            <p>Administración de cotizaciónes</p>
        </div>        
    </div>    
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Panel 1
                        </div>
                        <div class="panel-body">
                            <p>Contenido del panel 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Panel 2
                        </div>
                        <div class="panel-body">
                            <?php
                            include_once 'app/Conexion.inc.php';
                            include_once 'app/RepositorioUsuario.inc.php';

                            Conexion::abrir_conexion();
                            $usuarios = RepositorioUsuario::obtener_todos(Conexion::obtener_conexion());
                            echo count($usuarios);
                            echo "<br>";

                            foreach ($usuarios as $i) {
                                echo $i->obtener_nombre();
                                echo "<br>";
                            }

                            Conexion::cerrar_conexion()
                            ?>
<!--                                    <p>Contenido del panel 2 kkkk</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
<?php
include_once '../plantillas/pie.php';
?>

