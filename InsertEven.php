
<?php
$NUM = $_GET["numero"];
$Nombre = $_GET["nombre"];
$Titulo = $_GET["Titulo"];
$Desc = $_GET["Descr"];
$fechaIN = $_GET["FechaIN"];
$fechaFIN = $_GET["FechaFIN"];
$hora = $_GET["tiemp"];
$Frec = $_GET["frecuencia"];
$anioin = substr($fechaIN,0,4);
$mesin = substr($fechaIN,5,7);
$diain = substr($fechaIN,8,9); 

$aniofin= substr($fechaFIN,0,4);
$mesfin = substr($fechaFIN,5,7);

$diafin= substr($fechaFIN,8,9); 
$fech = substr($fechaIN,2,2); 
$fech2 = substr($fechaIN,2,2); 
$fechM2 = substr($fechaIN,6,1);
$mes1 = substr($fechaIN,5,2);
$dia1 =  substr($fechaIN,8,2);
$dia2 =  substr($fechaIN,9,1);
$date1 = strtotime($fechaIN);
$date2 = strtotime($fechaFIN);
$diff =($date2-$date1);
$time = Round($diff/(60*60*24)+1);
$A = Round($time /365);
$M = round($time /30.436875);
$S = round($time *0.14520547945205479452054794520548);


if($anioin<= $aniofin){
    if($mesin <= $mesfin){
        if($diain<= $diafin){

if($Frec == 'A'){
    for($x=0;$x<=$A;$x++){

    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
    $result = pg_query($link,$query);
    pg_close($link);
    $NUM = $NUM +1;
    $fech =$fech +1;
    $fechaIN = substr_replace($fechaIN,$fech,2,2);
    } 
    echo '<br><br><br><br><br><CENTER><H1>Evento Ingresado Correctamente</H1></CENTER><br>';
echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
    </head>
    <body>';  

}else if($Frec == 'M'){
    for($x=0;$x<=$M;$x++){
    if($fechM2<=9){
        $fechaIN = substr_replace($fechaIN,$fechM2,6,1);
        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
        $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
        $result = pg_query($link,$query);
        pg_close($link);
        $NUM = $NUM +1;
        $fechM2 =$fechM2 +1;
    
    }else if($fechM2 <=12){
            $fechaIN = substr_replace($fechaIN,$fechM2,5,2);
            $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
            $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
            $result = pg_query($link,$query);
            pg_close($link);
            $NUM = $NUM +1;
            $fechM2 =$fechM2 +1;
        }else if($fechM2>12){
                $fech =$fech +1;
                $fechaIN = substr_replace($fechaIN,$fech,2,2);
                $fechM2 = 1;
                $fechaIN = substr_replace($fechaIN,'01',5,2);
            

            }
        }
        echo '<br><br><br><br><br><CENTER><H1>Evento Ingresado Correctamente</H1></CENTER><br>';
        echo '<html>
            <head>
                <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
            </head>
            <body>';  
 
}else if ($Frec == 'S'){
    for($y=0;$y<=$S;$y++){
    if($dia1 > 0){
        if($mes1 == '2'){ 
            if($dia2<=9){
                    $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO evento VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +7;
                    $dia2 = $dia2 +7;
                    
        
            }else if($dia1>9 && $dia1<=28){

                
                   $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +7;
                    


                    
            

            }else{
                $mes1 =$mes1 +1;
                $fechaIN = substr_replace($fechaIN,$mes1,6,1);
                $dia1 = $dia1 -28;
                $dia2 = $dia1;
                $fechaIN = substr_replace($fechaIN,'01',8,2);
                



            }


        }else if($mes1 == '1'||$mes1 == '3'||$mes1 == '5'||$mes1 == '7'||$mes1 == '8'){ 
            if($dia2<=9){
                    $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +7;
                    $dia2 = $dia2 +7;
                    
        
            }else if($dia1>9 && $dia1<=31){

                
                   $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +7;
                    


                    
            

            }else{
                $mes1 =$mes1 +1;
                $fechaIN = substr_replace($fechaIN,$mes1,6,1);
                $dia1 = $dia1 -31;
                $dia2 = $dia1;
                $fechaIN = substr_replace($fechaIN,'01',8,2);
                


            }
         }else if($mes1 == '4'||$mes1 == '6'){ 
                if($dia2<=9){
                        $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                        $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                        $result = pg_query($link,$query);
                        pg_close($link);
                        $NUM = $NUM +1;
                        $dia1 = $dia1 +7;
                        $dia2 = $dia2 +7;
                        
            
                }else if($dia1>9 && $dia1<=30){
    
                    
                       $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                        $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                        $result = pg_query($link,$query);
                        pg_close($link);
                        $NUM = $NUM +1;
                        $dia1 = $dia1 +7;
                        

    
                        
                
    
                }else{
                    $mes1 =$mes1 +1;
                    $fechaIN = substr_replace($fechaIN,$mes1,6,1);
                    
                    $dia1 = $dia1 -30;
                    $dia2 = $dia1;
                    $fechaIN = substr_replace($fechaIN,'01',8,2);

                }
           }else if($mes1 == '9'||$mes1 == '11'){ 
            if($dia2<=9){
                    $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +7;
                    $dia2 = $dia2 +7;
                    
        
            }else if($dia1>9 && $dia1<=30){

                
                   $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +7;
                    

                    
            

            }else{
                $mes1 =$mes1 +1;
                $fechaIN = substr_replace($fechaIN,$mes1,5,2);
                $dia1 = $dia1 -30;
                $dia2 = $dia1;
                $fechaIN = substr_replace($fechaIN,'01',8,2);
                

            }

        }else if($mes1 == '10'||$mes1 == '12'){ 
            if($dia2<=9){
                    $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +7;
                    $dia2 = $dia2 +7;
                    
                     
        
            }else if($dia1>9 && $dia1<=31){

                
                   $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +7;
                    


                    
            

            }else{
                $mes1 =$mes1 +1;
                $fechaIN = substr_replace($fechaIN,$mes1,5,2);
                
                $dia1 = $dia1 -31;
                $dia2 = $dia1;
                $fechaIN = substr_replace($fechaIN,'01',8,2);
            }
        }else if($mes1=13){
            $fech =$fech +1;
            $fechaIN = substr_replace($fechaIN,$fech,2,2);
            $mes1 = 1;
            $fechaIN = substr_replace($fechaIN,'01',5,2);

        }


    }else{

    $dia1 = $dia1 +7;
    $dia2 = $dia1;
    }
}
echo '<br><br><br><br><br><CENTER><H1>Evento Ingresado Correctamente</H1></CENTER><br>';
echo '<html>
    <head>
        <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
    </head>
    <body>';  
}else if ($Frec == 'D'){
    for($h=1;$h<=$time;$h++){

        if($mes1 == '2'){ 
            if($dia2<=9){
                    $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +1;
                    $dia2 = $dia2 +1;
                    
        
            }else if($dia1>9 && $dia1<=28){

                
                   $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +1;
                    


                    
            

            }else{
                $mes1 =$mes1 +1;
                $dia1= 1;
                $dia2 = 1;
                $fechaIN = substr_replace($fechaIN,$mes1,6,1);
                $fechaIN = substr_replace($fechaIN,'01',8,2);
                



            }


        }else if($mes1 == '1'||$mes1 == '3'||$mes1 == '5'||$mes1 == '7'||$mes1 == '8'){ 
            if($dia2<=9){
                    $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +1;
                    $dia2 = $dia2 +1;
                    
        
            }else if($dia1>9 && $dia1<=31){

                
                   $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +1;
                   
                    


                    
            

            }else{
                $mes1 =$mes1 +1;
                $dia1= 1;
                $dia2 = 1;
                $fechaIN = substr_replace($fechaIN,$mes1,6,1);
                $fechaIN = substr_replace($fechaIN,'01',8,2);
                


            }
         }else if($mes1 == '4'||$mes1 == '6'){ 
                if($dia2<=9){
                        $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                        $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                        $result = pg_query($link,$query);
                        pg_close($link);
                        $NUM = $NUM +1;
                        $dia1 = $dia1 +1;
                        $dia2 = $dia2 +1;
                        
            
                }else if($dia1>9 && $dia1<=30){
    
                    
                       $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                        $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                        $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                        $result = pg_query($link,$query);
                        pg_close($link);
                        $NUM = $NUM +1;
                        $dia1 = $dia1 +1;
                        

    
                        
                
    
                }else{
                    $mes1 =$mes1 +1;
                    $dia1= 1;
                    $dia2 = 1;
                    $fechaIN = substr_replace($fechaIN,$mes1,6,1);
                    $fechaIN = substr_replace($fechaIN,'01',8,2);

                }
           }else if($mes1 == '9'||$mes1 == '11'){ 
            if($dia2<=9){
                    $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +1;
                    $dia2 = $dia2 +1;
                    
        
            }else if($dia1>9 && $dia1<=30){

                
                   $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +1;
                    

                    
            

            }else{
                $mes1 =$mes1 +1;
                $dia1= 1;
                $dia2 = 1;
                $fechaIN = substr_replace($fechaIN,$mes1,5,2);
                $fechaIN = substr_replace($fechaIN,'01',8,2);
                

            }

        }else if($mes1 == '10'||$mes1 == '12'){ 
            if($dia2<=9){
                    $fechaIN = substr_replace($fechaIN,$dia2,9,1);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +1;
                    $dia2 = $dia2 +1;
                    
                     
        
            }else if($dia1>9 && $dia1<=31){

                
                   $fechaIN = substr_replace($fechaIN,$dia1,8,2);
                    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
                    $query = "INSERT INTO eventos VALUES ($NUM,'$Nombre','$Titulo','$Desc','$fechaIN','$fechaFIN','$hora')";
                    $result = pg_query($link,$query);
                    pg_close($link);
                    $NUM = $NUM +1;
                    $dia1 = $dia1 +1;
                    


                    
            

            }else{
                $mes1 =$mes1 +1;
                $dia1= 1;
                $dia2 = 1;
                $fechaIN = substr_replace($fechaIN,$mes1,5,2);
                $fechaIN = substr_replace($fechaIN,'01',8,2);
            }
        }else if($mes1=13){
            $fech =$fech +1;
            $fechaIN = substr_replace($fechaIN,$fech,2,2);
            $mes1 = 1;
            $fechaIN = substr_replace($fechaIN,'01',5,2);

        }
    }
    echo '<br><br><br><br><br><CENTER><H1>Evento Ingresado Correctamente</H1></CENTER><br>';
    echo '<html>
        <head>
            <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
        </head>
        <body>';  
}else if ($Frec == 'U'){

    $link = pg_connect("host=localhost dbname=cc5-agenda user=postgres password=admin");    
    $query = "INSERT INTO eventos VALUES ($NUM,$Nombre,'$Titulo','$Desc','$fechaIN','$fechaIN','$hora')";
    $result = pg_query($link,$query);
    pg_close($link);
    echo '<br><br><br><br><br><CENTER><H1>Evento Ingresado Correctamente</H1></CENTER><br>';
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
}else{
echo '<br><br><br><br><br><CENTER><H1>Fecha fin de evento es incorrecta</H1></CENTER><br>';
echo '<html>
<head>
    <meta http-equiv="refresh" content="1;url=/proyectoCC/eventos.php" />
</head>
<body>';
}









?>

