<?php
if (!isset($titulo) || empty($titulo)) {
    $titulo = 'ACOT';
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        echo "<title>$titulo</title>";
        ?>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" type="image/png" href="../../img/acot.png" />
        
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/estilos.css" rel="stylesheet">     
    </head>
    <body>
