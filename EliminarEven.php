
<?php

$link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
$numero = $_GET["id_evento"];

$query = "DELETE FROM eventos WHERE id_evento=$numero";

$result = pg_query($link,$query);

echo '<br><br><br><br><br><CENTER><H1> Eliminado Correctamente</H1></CENTER><br>';
echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
    </head>
    <body>';
pg_close($link);


?>
