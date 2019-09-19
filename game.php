<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bridge</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row">
    <div class=" col-9   container">      

        <?php
        if(!isset($_SESSION["jugador1"])){
            $_SESSION["jugador2"]=$_POST['nombre1'];
            $_SESSION["jugador1"]=$_POST['nombre2'];
            $_SESSION["size"]=$_POST['size'];
          
        }
      
        $mat;
        $copia;
        if(!isset($_SESSION["Mat"])){ 
            $z=0;
            $mat;
            $copia;
        for($i=0;$i<$_SESSION["size"];$i++){
            for($j=0;$j<$_SESSION["size"];$j++){              
                if($z==0){
                    $mat[$i][$j]=0;
                    $z=1;
                }else if($z==1){
                    $mat[$i][$j]=1;
                    $z=0;
                }else if($z==2){
                    $mat[$i][$j]=2;
                    $z=3;
                }else if($z==3){
                    $mat[$i][$j]=0;
                    $z=2;
                }
            }
            if($z==1){
                $z=2;
            }else{
                $z=0;
            }
        }
        $_SESSION["Mat"]=$mat; 
        $copia=$mat;
    }else{
        $posibilidadDeJugar=false;
        $mat=$_SESSION["Mat"];
        for($i=0;$i<$_SESSION["size"];$i++){
            for($j=0;$j<$_SESSION["size"];$j++){
                if($mat[$i][$j]=='0'){  
                    $posibilidadDeJugar=true;
                }
            }
        }

        if(!$posibilidadDeJugar){
            session_destroy();
            echo "
            <script language='JavaScript'>
            location.href = 'index.php';
            </script>";
        }
        $copia=$mat;
    }
    $turno=1;
    $gano=0;
    /**----------------------------Verificar las jugadas------------------------------ */
    if(isset($_GET["fil"])&&isset($_GET["col"])&&isset($_GET["tur"])){
         /**------------------PRIMER JUGADOR------------------------------ */  
       if($_GET["tur"]==1){
        if($_SESSION["Mat"][$_GET["fil"]][$_GET["col"]]==0){
            $_SESSION["Mat"][$_GET["fil"]][$_GET["col"]]=1;
        }
        for($i=0;$i<$_SESSION["size"];$i++){    
            if($copia[0][$i]=='1'){
                $copia[0][$i]='3';
            }     
        }
    $band = true;


    do{           
        for($i =0; $i<$_SESSION["size"];$i++){
            for($j=0;$j<$_SESSION["size"];$j++){
                if($copia[$i][$j]=='3'){                  
                    if($copia[$i+1][$j]=='1'){
                        $copia[$i+1][$j]='3';
                    }
                    if($copia[$i][$j+1]=='1'){
                        $copia[$i][$j+1]='3';
                    }
                    if($j!=0)
                        if($copia[$i][$j-1]=='1' ){
                            $copia[$i][$j-1]='3';                   
                        }
                                      
                }
            }
        }
        $band=false;
        for($i=0;$i<$_SESSION["size"]-1;$i++){
            for($j=0;$j<$_SESSION["size"]-1;$j++){
            if($copia[$i][$j]=='1'){
                if($copia[$i+1][$j]=='3'||$copia[$i-1][$j]=='3'||$copia[$i][$j+1]=='3'|| $copia[$i][$j-1]=='3'){
                    $band=true;
                    break;
                }
            }
            }
        }

    }while($band);

    for($i=0;$i<$_SESSION["size"]-1;$i++){
        if($copia[$_SESSION["size"]-1][$i]=='3'){
            $gano=2;
        }       
    }
        $turno=2;
        /*---------------------PARA EL 2 JUGADOR---------------------------------- */
       }else{
            if($_SESSION["Mat"][$_GET["fil"]][$_GET["col"]]==0){
                    $_SESSION["Mat"][$_GET["fil"]][$_GET["col"]]=2;
             }
                
            for($i=0;$i<$_SESSION["size"];$i++){    
                    if($copia[$i][0]=='2'){
                        $copia[$i][0]='3';
                    }     
                }
            $band = true;
 

            do{           
                for($i =0; $i<$_SESSION["size"];$i++){
                    for($j=0;$j<$_SESSION["size"];$j++){
                        if($copia[$i][$j]=='3'){
                            if($j!=$_SESSION["size"]-1)
                            if($copia[$i+1][$j]=='2'){
                                $copia[$i+1][$j]='3';
                            }
                            if($copia[$i-1][$j]=='2'){
                                $copia[$i-1][$j]='3';
                            }
                            if($copia[$i][$j+1]=='2'){
                                $copia[$i][$j+1]='3';
                            }
                            if($j!=0){
                                if($copia[$i][$j-1]=='2' ){
                                    $copia[$i][$j-1]='3';                   
                                }
                            }                   
                        }
                    }
                }
                $band=false;
                for($i=0;$i<$_SESSION["size"]-1;$i++){
                    for($j=0;$j<$_SESSION["size"]-1;$j++){
                    if($copia[$i][$j]=='2'){
                        if($copia[$i+1][$j]=='3'||$copia[$i-1][$j]=='3'||$copia[$i][$j+1]=='3'|| $copia[$i][$j-1]=='3'){
                            $band=true;
                            break;
                        }
                    }
                    }
                }

            }while($band);

            for($i=0;$i<$_SESSION["size"]-1;$i++){
                if($copia[$i][$_SESSION["size"]-1]=='3'){
                    $gano=1;
                }       
            }    
            $turno=1;     
        }
       $mat=$_SESSION["Mat"];
      
    }

    /*------------------Redireccionar al GANADOR--------------------------- */
    if($gano!=0){ 
        if($gano==1){
            session_destroy();
            echo "
            <script language='JavaScript'>
            location.href = 'ganador.php?ganador=1';
            </script>";
        }else{
            session_destroy();
            echo "
                <script language='JavaScript'>
                location.href = 'ganador.php?ganador=2';
             </script>";
            }
        }
    /**----------Accion de click en la MATRIZ---------------------------------------- */
            for($i=0;$i<$_SESSION["size"];$i++){
                for($j=0;$j<$_SESSION["size"];$j++){
                    echo "<a onclick='llamar(".$i.",".$j.",".$turno.");'><img src='img/",$mat[$i][$j],".png'/>"."</a>";
                }
                echo "</br>";
            }
 
            
        ?>  
       
    </div>
    <div class="col-3">
    </br>
    </br>
    <?php
    /**-----------------INDICA DE QUIEN ES EL TURNO -----------------------------------*/
    if($_GET["tur"]=='1'){
        echo "<h2>Turno de ".$_SESSION["jugador2"]." </h2>";
        echo "<img src='img/2.png' />";
    }else{
        echo "<h2>Turno de ".$_SESSION["jugador1"]." </h2>";
        echo "<img src='img/1.png' />";
    }
    ?>
    </div>
    </div>
</body>

<script type="text/javascript">
    function llamar(fila, columna, turno) {
        document.location = "game.php?fil=" + fila + "&col=" + columna + "&tur=" + turno;
    }
</script>

</html>