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

        <br><br><br><br><br><br><br>
        <div class="d-flex">
        <div class="row">
            <div id='buttonSearch' class="col-lg-4 offset-lg-4">
                <button type="button" class="btn btn-dark btn-lg mx-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                        Diario
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Seleccionar Fecha</h5>
                            </div>
                            <div class="modal-body">
                                <form action="/proyectoCC/Dia.php" method="GET">
                                    <div class="form-group">
                                        <label for="fecha_in" class="col-form-label">Fecha:</label>
                                        <input type="date" name="fecha_in" class="form-control" id="fecha_in" required=required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-table">
        <div id='buttonSearch' class="col-lg-4 offset-lg-4">
            <button type="button" class="btn btn-dark btn-lg mx-2" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo">
                    Semanal
            </button>
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Seleccionar Fecha</h5>
                        </div>
                        <div class="modal-body">
                            <form action="/proyectoCC/semanal.php" method="GET">
                                <div class="form-group">
                                    <label for="fecha_in" class="col-form-label">Fecha:</label>
                                    <input type="date" name="fecha_in" class="form-control" id="fecha_in" required=required>
                                </div>
                                <div id='create' class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row d-table">
            <div id='buttonSearch' class="col-lg-4 offset-lg-4">
                <button type="button" class="btn btn-dark btn-lg mx-2" data-toggle="modal" data-target="#exampleModa2" data-whatever="@mdo">
                        Mensual
                </button>
                <div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Seleccionar Tipo de Evento</h5>
                            </div>
                            <div class="modal-body">
                            <form action="/proyectoCC/mensual.php" method="GET">
                                <div class="form-group">
                                    <label for="fecha_in" class="col-form-label">Ingrese Mes</label><br><br><br>
                                    <b>Mes: </b>
                                        <select name="Mes"><br>
                                        <option value = "1"> Enero </option>
                                        <option value = "2"> Febrero </option>
                                        <option value = "3"> Marzo </option>
                                        <option value = "4"> Abril </option>
                                        <option value = "5"> Mayo </option>
                                        <option value = "6"> Junio </option>
                                        <option value = "7"> Julio </option>
                                        <option value = "8"> Agosto </option>
                                        <option value = "9"> Septiembre </option>
                                        <option value = "10"> Octubre </option>
                                        <option value = "11"> Noviembre </option>
                                        <option value = "12"> Diciembre </option>
                                        </select>   

                                    <label for="Ano" class="col-form-label">Año:</label>
                                    <input type="text" name="Ano" pattern="[0-9]+[0-9]+[0-9]+[0-9]" required=required maxlength="4">

                                </div>
                                <div id='create' class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div id='buttonSearch' class="col-lg-4 offset-lg-4">
                <button type="button" class="btn btn-dark btn-lg mx-2" data-toggle="modal" data-target="#exampleModa4" data-whatever="@mdo">
                   
                        Evento
                  
                </button>
                <div class="modal fade" id="exampleModa4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Seleccionar Tipo de Evento</h5>
                            </div>
                            <div class="modal-body">
                                <form action="/proyectoCC/portipo.php" method="GET">
                                    <div class="form-group">
                                        <label for="Tipo" class="col-form-label">Tipo de Evento:</label>
                                        <?php
                                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");
                                        $query = "SELECT nombre , id_tipo FROM tipodeevento";
                                        $result2 = pg_query($link, $query);

                                        $id = 1;
                                        $nombre = "";

                                        echo "<select name=tipo>";

                                        while ($line = pg_fetch_array($result2, NULL, PGSQL_ASSOC)) {
                                            $id = $line["id_tipo"];
                                            $nombre = $line["nombre"];

                                            echo "<option value=$id>$nombre</option>";
                                        }

                                        echo "</select>";
                                        pg_close($link);
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
                                    </div>
</body>

</html>