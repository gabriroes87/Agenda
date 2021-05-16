
<?php
        $numero = $_GET["numero"];
        $nombre = $_GET["nombre"];
        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
        $query = "INSERT INTO tipodeevento VALUES ($numero,'$nombre')";
        $result = pg_query($link,$query);
        pg_close($link);
        echo '<br><br><br><br><br><CENTER><H1>Tipo Ingresado Correctamente</H1></CENTER><br>';
        echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/tipoEvento.php" />
    </head>
    <body>
        <div>
                
        </div>
';
echo '</body></html>';
?>

