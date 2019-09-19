<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
        </br>
        </br>
        </br>
        </br>
<h2 class="container">Game Bridges</h2>
        </br>
        </br>
        </br>
<form action="/Bridge/game.php" method="post" class="container col-6">
     
  <div class="form-group">
    <label for="exampleInputEmail1">Jugador Azul</label>
    <input required type="text" class="form-control" name="nombre1" aria-describedby="emailHelp" placeholder="Jugador 1">
    <label for="exampleInputEmail1">Jugador Rojo</label>
    <input required type="text" class="form-control" name="nombre2" aria-describedby="emailHelp" placeholder="Jugador 2">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1" name="size">
      <option>13</option>
      <option>11</option>
      <option>9</option>
      <option>7</option>
      <option>5</option>
    </select>
  </div>
  </div>


  <button type="submit" class="btn btn-primary col-12">Jugar</button>
</form>


    
</body>
</html>