<?php

$ID = $_GET["id_tipo"];
$nombre = $_GET["nombre"];


$link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
$query = "UPDATE tipodeevento SET nombre='$nombre' WHERE id_tipo=$ID";
$result = pg_query($link,$query);
echo '<br><br><br><br><br><CENTER><H1>Tipo Editado Correctamente</H1></CENTER><br>';
echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/tipoEvento.php" />
    </head>
    <body>';
pg_close($link);
?>

