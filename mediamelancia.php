<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Melancia - Media</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/slide.css">



</head>
<nav>
  <div class="nav-wrapper green darken-2">

    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="melancia.php">Voltar</a></li>
    </ul>
  </div>
</nav>
<body>

 <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <center>
       <img src="img/tabelamelancia.png"></center>
       <div class="row center">
        <h5 class="header col s12 light"> Monitoramento Online</h5>
      </div><br><br>

      <div class="row">
        <form class="col s12" method="POST" action="">
          <div class="row">
            <table>
              <thead>
                <tr>
                  <th>Temperatura C°</th>
                  <th>Umidade %</th>
                  <th>Lux</th>
                </tr>
              </thead>
              <tbody>
                <!--Select das informações do sensor DTH11 do banco de dados MYSQL -->
                <?php

                $result=("SELECT AVG(temperatura) as temperatura,AVG(umidade) as umidade,AVG(lux) as lux FROM sensor1");
                $resultado=mysqli_query($conn,$result);

                while($linhas = mysqli_fetch_array($resultado)){
                  echo "<tr>";
                  echo "<td>".$linhas['temperatura']."</td>";
                  echo "<td>".$linhas['umidade']."</td>";
                  echo "<td>".$linhas['lux']."</td>";
                  echo "</tr>";
                }
                ?>

              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>



</body>
</html>
