
<?php
$ID = $_GET["id"];
$Tipoev = $_GET["tipoev"];
$Titulo = $_GET["titulo"];
$Descr = $_GET["desc"];
$FechaIN = $_GET["fechain"];
$FechaFIN = $_GET["fechafin"];
$HORA = $_GET["hora"];
$anioin = substr($FechaIN,0,4);
$mesin = substr($FechaIN,5,7);
$diain = substr($FechaIN,8,9); 

$aniofin= substr($FechaFIN,0,4);
$mesfin = substr($FechaFIN,5,7);

$diafin= substr($FechaFIN,8,9); 

if($anioin<= $aniofin){
    if($mesin <= $mesfin){
        if($diain<= $diafin){

$link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
$query = "UPDATE eventos SET tipo_de_evento=$Tipoev,Titulo = '$Titulo',descripcion='$Descr',fecha_in='$FechaIN',fecha_fin='$FechaFIN',hora='$HORA' WHERE id_evento=$ID";
$result = pg_query($link,$query);
echo '<br><br><br><br><br><H1><center>Evento Editado Correctamente</center></H1><br>';
echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
    </head>
    <body>';

pg_close($link);

}else{
    echo '<br><br><br><br><br><CENTER><H1>Fecha fin de evento es incorrecta</H1></CENTER><br>';
    echo '<html>
        <head>
            <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
        </head>
        <body>';
}
}else{
echo '<br><br><br><br><br><CENTER><H1>Fecha fin de evento es incorrecta</H1></CENTER><br>';
echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
    </head>
    <body>';
}
}else{
echo '<br><br><br><br><br><CENTER><H1>Fecha fin de evento es incorrecta</H1></CENTER><br>';
echo '<html>
<head>
    <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
</head>
<body>';
}
?>

