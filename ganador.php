<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .btn a{
            color:white;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="row container">
    <div  class="ganador col-12">
    <h2>Ganador:Jugador</h2>
    <?php
    $ganador=$_GET["ganador"];
    echo "<h2> $ganador</h2>"
    ?>
    </div>
    </br>
    <a href="index.php" class=" col-12 btn btn-primary">Menu</a>
    </div>
</body>
</html>