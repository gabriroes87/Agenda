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
            <div id='title' class="col-lg-1">
                <p>
                    Eventos
                </p>
            </div>
        </div>
        <div class="row ">
            <div id='create' class="col-lg-4 offset-lg-1">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                    <p>
                        Crear Evento
                    </p>
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Crear Tipo de Evento</h5>
                            </div>
                            <div class="modal-body">
                                <form action="/proyectoCC/insertEven.php" method="GET">
                                    <div class="form-group">
                                        <label style="display: none;" for="numero" class="col-form-label">ID:</label>
                                        
                                        <?php

                                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
                                        $query = "SELECT id_evento FROM eventos";
                                        $result = pg_query($link, $query);
                                        $cont = 0;

                                        while ($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                                            $cont = $line["id_evento"];
                                        }
                                        $cont = $cont + 1;
                                        echo "<input style='display: none'  type=text name=numero readonly required=required value=$cont>";
                                        pg_close($link);
                                        ?>
                                        <b> Tipo de Evento </b>

                                        <?php

                                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
                                        $query = "SELECT  id_tipo ,nombre FROM tipodeevento";
                                        $result2 = pg_query($link, $query);
                                        $nombre = 0;

                                        echo "<select name=nombre>";

                                        while ($line = pg_fetch_array($result2, NULL, PGSQL_ASSOC)) {
                                            $id = $line["id_tipo"];
                                            $nombre = $line["nombre"];

                                            echo "<option value=$id>$nombre</option>";
                                        }

                                        echo "</select>";
                                        pg_close($link);


                                        ?>
                                        <br><br>
                                        <b>Titulo: </b>
                                        <input type="text" name="Titulo" maxlength=100 required=required><br><br>
                                        <b>Descripcion : </b>
                                        <input type="text" name="Descr" maxlength=100 required=required><br><br>
                                        <b>FechaInicio: </b>
                                        <input type="date" name="FechaIN" required=required><br><br>
                                        <b>FechaFin: </b>
                                        <input type="date" name="FechaFIN" required=required><br><br>
                                        <b>HORA: </b>
                                        <input type="time" name="tiemp" required=required><br><br>
                                        <b>Frecuencia: </b>
                                        <select name="frecuencia"><br>
                                        <option value = "U"> Una Vez </option>
                                        <option value = "D"> Diario </option>
                                        <option value = "S"> Semanal </option>
                                        <option value = "M"> Mensual </option>
                                        <option value = "A"> Anual </option>
                                        </select>   



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo de Evento</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Fin</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
                        $query = "select E.id_evento, E.titulo, E.descripcion, E.fecha_in,  E.fecha_fin, E.hora, T.nombre  
                                from eventos E , tipodeevento T 
                                where T.id_tipo = E.tipo_de_evento 
                                ORDER BY id_evento";
                        $result = pg_query($link, $query);

                        while ($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                            $ID = $line["id_evento"];
                            $TipodeE = $line["nombre"];
                            $Titulo = $line["titulo"];
                            $Descripcion = $line["descripcion"];
                            $FechaIN = $line["fecha_in"];
                            $fechaFIN = $line["fecha_fin"];
                            $Hora = $line["hora"];



                            echo "<tr>";
                            echo "<td>$ID</td>";
                            echo "<td>$TipodeE</td>";
                            echo "<td>$Titulo</td>";
                            echo "<td>$Descripcion</td>";
                            echo "<td>$FechaIN</td>";
                            echo "<td>$fechaFIN</td>";
                            echo "<td>$Hora</td>";
                            echo "<td><a href='EditarEv.php?id_tipo=$ID&tipoeven=$TipodeE&titulo=$Titulo&descripcion=$Descripcion&fecha_in=$FechaIN&fecha_fin=$fechaFIN&hora=$Hora'>
                            <img src='./img/icon/edit.png' width='20' height='20'></a></td>";
                            echo "<td><a href=EliminarEven.php?id_evento=$ID><img src='./img/icon/delete.png' width='20' height='20'></a></td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                        pg_close($link);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>





</body>

</html>