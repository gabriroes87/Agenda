<!DOCTYPE html>
<html lang="en">

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

        <div class="row justify-content-md-center">
            <div id='title' class="col-lg-2">
                <p>
                    Reporte Por tipo
                </p>
            </div>
        </div>
       
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo de Evento</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Tipo = $_GET["tipo"];
                        $ID = 0;
                        $nombreTipo = "";
                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
                        $query = "select E.id_evento,E.titulo, T.nombre from eventos E, tipodeevento T where tipo_de_evento=$Tipo AND T.id_tipo = E.tipo_de_evento order by hora";
                        $result = pg_query($link, $query);

                        while ($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                            $ID = $line["id_evento"];
                            $Titulo = $line["titulo"];
                            $nombre = $line["nombre"];
                            echo "<tr>";
                            echo "<td>$ID</td>";
                            echo "<td>$nombre</td>";
                            echo "<td>$Titulo</td>";
                            echo "<td><a href=Detalle.php?id=$ID><img src='./img/icon/edit.png' height='30' width='30' ></a></td>";
                            echo "</tr>";
                        }
                        pg_close($link);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<html>