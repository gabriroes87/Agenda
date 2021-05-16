
<?php
$withevent = array();
$link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
$numero = $_GET["id_tipo"];
$query2 = "SELECT tipo_de_evento
            FROM   eventos";
$result2 = pg_query($link,$query2);
while ($line = pg_fetch_array($result2, NULL, PGSQL_ASSOC)) {
    $tipo=$line['tipo_de_evento'];
    $withevent[] = $tipo;

}
if (in_array($numero, $withevent)) {
    echo '<br><br><br><br><br><CENTER><H1>TIPO DE EVENTO EN USO</H1></CENTER><br>';
    echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/tipoEvento.php" />
    </head>
    <body>';


echo '</body></html>';
}else{

$query = "DELETE FROM tipodeevento WHERE id_tipo=$numero";

$result = pg_query($link,$query);

echo '<br><br><br><br><br><CENTER><H1>Eliminado Correctamente</H1></CENTER><br>';


pg_close($link);

echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/tipoEvento.php" />
    </head>
    <body>';


echo '</body></html>';
}
?>

