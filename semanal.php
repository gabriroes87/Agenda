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
                    Reporte Semanal
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <table id='tableS' class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Dia</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Eventos</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $withevent = array();
                        $FechaIn = new DateTime($_GET["fecha_in"]);
                        $start = $FechaIn->format('Y-m-d');
                        $FechaFin = $FechaIn->modify('+6 day');
                        $end = $FechaFin->format('Y-m-d');
                        $FechaIn = $FechaIn->modify('-6 day');

                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
                        $query = "select * from eventos where fecha_in >='$start' AND fecha_fin <= '$end'";
                        $result = pg_query($link, $query);

                        // convert to date object

                       
                        while ($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                            $date = new DateTime($line['fecha_in']);
                            // catch duplicates
                            if (in_array($date, $withevent)) {
                                // skip if already in array
                            } else {
                                $withevent[] = $date;
                            }
                        }

                        for ($x = 1; $x <= 7; $x++) { 
                            echo "
                            <tr>
                                <td>".$FechaIn->format("D")."</td>
                                <td>".$FechaIn->format("d M Y")."</td>
                            ";
                            if (in_array($FechaIn, $withevent)) {
                                foreach ($withevent as &$valor) {
                                    if ($valor == $FechaIn) {
                                        # code...
                                        echo "
                                            <td><a id='numEvents' href=Dia.php?fecha_in=".$FechaIn->format('Y-m-d').">Event Dscr</a></td>
                                            <td></td>
                                        </tr>
                                    ";
                                    }
                                }
                            } else {
                                echo "
                                    <td>-- : --</td>
                                    <td></td>
                                </tr>
                             ";
                            }
                            // adding to curret date
                            $FechaIn->modify('+1 day');
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