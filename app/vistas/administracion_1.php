<?php
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';
?>

<div class="container-fluid">

    <nav id="sidebar" class="d-none d-sm-block bg-light sidebar">

        <!-- Sidebar Links -->
        <ul class="list-unstyled components nav nav-pills flex-column">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>

            <li><!-- Link with dropdown items -->
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                </ul>
            <li><a href="#">Portfolio</a></li>  
            <li><a href="#">Contactoss</a></li>
            <li><a href="#">Prueba 2</a></li>
            <li><a href="#">Prueba</a></li>
        </ul>
    </nav>
</div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script> 
<!--<script src="../js/ValidarLogin.js"></script>-->
<?php
include_once '../plantillas/pie.php';
?>