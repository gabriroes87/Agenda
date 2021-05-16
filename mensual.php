<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tipo.css">
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

        <div class="row justify-content-md-center py-4">

        </div>

        <div class="row mt-4">
            <div class="col-lg-8 offset-lg-2">

                        <?php
                        $month = $_GET["Mes"];
                        $mes = "";
                        if($month == 1){
                            $mes = "ENERO";

                        }else if($month == 2){
                            $mes = "FEBRERO";

                        }else if($month == 3){
                            $mes = "MARZO";

                        }else if($month == 4){
                            $mes = "ABRIL";

                        }else if($month == 5){
                            $mes = "MAYO";

                        }else if($month == 6){
                            $mes = "JUNIO";

                        }else if($month == 7){
                            $mes = "JULIO";

                        }else if($month == 8){
                            $mes = "AGOSTO";

                        }else if($month == 9){
                            $mes = "SEPTIEMBRE";

                        }else if($month == 10){
                            $mes = "OCTUBRE";

                        }else if($month == 11){
                            $mes = "NOVIEMBRE";

                        }else if($month == 12){
                            $mes = "DICIEMBRE";

                        }
                        $Ano = $_GET["Ano"];
                        $withevent = array();

                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
                        $query = "
                            SELECT * 
                            FROM eventos 
                            WHERE EXTRACT(MONTH FROM fecha_in) = $month AND EXTRACT(YEAR FROM fecha_in) = $Ano
                        ";
                        $result = pg_query($link, $query);
                        while ($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                            $date = new DateTime($line['fecha_in']);
                            $withevent[] = $date->format('d');
                        }

                        $oddmonth = array(1,3,5,7,8,10,12);
                        $evenmonth = array(4,6,9,11);

                        if (in_array($month, $oddmonth)) {
                            $monthlength = 31;
                        } else if (in_array($month, $evenmonth)) {
                            $monthlength = 30;
                        } else {
                            $monthlength = 28;
                        }

                        echo "
                        <div class=month>
                            <ul>
                                <li><h2>$mes $Ano</h2></li>
                            </ul>
                        </div>

                        <ul class='table table-dark weekdays'> 
                            <li>Domingo</li>
                            <li>Lunes</li>
                            <li>Martes</li>
                            <li>Miercoles</li>
                            <li>Jueves</li>
                            <li>Viernes</li>
                            <li>Sabado</li>
                        </ul>

                        <ul class=days>        
                        ";

                        for ($daynumber=1; $daynumber <= $monthlength; $daynumber++) { 
                            if (in_array($daynumber, $withevent)) {
                                $selectdate = new DateTime("$Ano-$month-$daynumber");
                                echo "
                                <li><span class=active><a href=dia.php?fecha_in=".$selectdate->format('Y-m-d').">$daynumber</a></span></li>
                                ";
                            } else {
                                echo "
                            <li>$daynumber</li>
                            ";
                            }
                        }
                        echo "
                        </ul>
                        ";
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<html>