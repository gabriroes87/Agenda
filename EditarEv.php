<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/tipo.css">
    <title>CC</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="fixed-top">
            <nav class="navbar navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id='icoLogo'>
                    <a href='./index.html'>
                        <img src='./img/home/icoLogo.jpg' alt='galileo' />
                    </a>
                </div>
            </nav>
            <div class="collapse" id="navbarToggleExternalContent">
                <div id='menu' class='bg-dark p-4'>
                    <a href='/proyectoCC/tipoEvento.php'>
                        <p class="text-white h4">Tipo de Evento</p>
                    </a>
                    <a href='/proyectoCC/eventos.php'>
                        <p class="text-white h4">Eventos</p>
                    </a>
                    <a href='/proyectoCC/reportes.php'>
                        <p class="text-white h4">Reportes</p>
                    </a>
                </div>
            </div>
        </div>

<form action="Eventoeditado.php" method="GET">
<center>
<br><br><br><br><br><br><br><br><br><br>
<b><H1>Editar Evento</H1></b>
<br><br>
<?php

$ID = $_GET["id_tipo"];
$Tipoev = $_GET["tipoeven"];
$Titulo = $_GET["titulo"];
$Descr = $_GET["descripcion"];
$FechaIN = $_GET["fecha_in"];
$FechaFIN = $_GET["fecha_fin"];
$HORA = $_GET["hora"];
echo "<b>Id</b>: $ID<br>";
echo "<input type=hidden name=id value=$ID>";
echo "<b> Tipo de Evento:</b>";

$link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
$query = "SELECT nombre, id_tipo
          FROM tipodeevento ";
$result2 = pg_query($link, $query);

$id= 0;
$nombre = "";

echo "<select name=tipoev>";

while ($line = pg_fetch_array($result2, NULL, PGSQL_ASSOC)) {
    $id = $line["id_tipo"];
    $nombre = $line["nombre"];

    echo "<option value=$id>$nombre</option>";
}

echo "</select>";
pg_close($link);

echo "<br><b>Titulo:</b>";
echo "<input type=text name=titulo value=$Titulo length=30 required=required maxlength=30><br>";
echo "<b> Descripcion:</b>";
echo "<input type=text name=desc value=$Descr length=30 required=required maxlength=30><br>";
echo "<b> Fecha de Inicio:</b>";
echo "<input type=Date name=fechain value=$FechaIN  required=required><br>";
echo "<b> Fecha de FIN:</b>";
echo "<input type=Date name=fechafin value=$FechaFIN required=required><br>";
echo "<b> Hora:</b>";
echo "<input type=Time name=hora value=$HORA required=required><br>";

?>
<br>
<input type="submit" name="submit" value="Enviar" align="center">
</form>
</center>
</body>
</html>