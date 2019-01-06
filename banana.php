<?php
include("conexao.php");
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos da tabela
$result_pesquisa = "SELECT * FROM sensor1";
$resultado_pesquisa = mysqli_query($conn, $result_pesquisa);

//Contar o total
$total_pesquisa = mysqli_num_rows($resultado_pesquisa);

//Seta a quantidade por pagina
$quantidade_pg = 10;

//calcular o número de pagina necessárias para apresentar
$num_pagina = ceil($total_pesquisa/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Seleciona os itens serem apresentado na página
$result_pesquisa = "SELECT * FROM sensor1 limit $incio, $quantidade_pg";
$resultado_pesquisa = mysqli_query($conn, $result_pesquisa);
$total_pesquisa = mysqli_num_rows($resultado_pesquisa);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Banana</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/slide.css">
  <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="css/font.min.css">


</head>

<nav>
  <div class="nav-wrapper green darken-2">

    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="mediabanana.php">Média</a></li>
      <li><a href="bananatemperatura.php">Gráfico Temperatura</a></li>
      <li><a href="bananaumidade.php">Gráfico Umidade</a></li>
      <li><a href="bananalux.php">Gráfico Luminosidade</a></li>
      <li><a href="menu.php">Voltar</a></li>
    </ul>
  </div>
</nav>



<body>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <center>
       <img src="img/tabelabanana.png"></center>
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
                  <th>Data/Hora</th>
                </tr>
              </thead>
              <tbody>
                <!--Select das informações do sensor DTH11/TSL2561 do banco de dados MYSQL -->
                <?php

                //$result=("SELECT * FROM sensor1 ORDER BY 'id'");
                //$resultado=mysqli_query($conn,$result);

                while($linhas = mysqli_fetch_array($resultado_pesquisa)){
                  echo "<tr>";
                  echo "<td>".$linhas['temperatura']."</td>";
                  echo "<td>".$linhas['umidade']."</td>";
                  echo "<td>".$linhas['lux']."</td>";
                  echo "<td>".$linhas['data']."</td>";
                  echo "</tr>";
                }
                ?>

              </tbody>
            </table>
          </div><br>
          <div class="row center">
            <?php
        //Verificar a pagina anterior e posterior
            $pagina_anterior = $pagina - 1;
            $pagina_posterior = $pagina + 1;
            ?>
            <ul class="pagination">

              <!--o código abaixo, refere-se a a paginação a esquerda-->
              <li class="disabled">
                <?php
                if($pagina_anterior != 0){ ?>
                  <a href="banana.php?pagina=<?php echo $pagina_anterior; ?>"><i class="material-icons">chevron_left</i></a>
                <?php }else{ ?>

                <?php }  ?>
              </li>
              <!--o código abaixo, refere-se a listar -->
              <?php
              for ($i=1; $i < $num_pagina + 1; $i++){ ?>
                <li><a href="banana.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php }?>

              <!--o código abaixo, refere-se a a paginação a direita-->
              <li class="waves-effect">
                <?php
                if($pagina_posterior <= $num_pagina){ ?>
                  <a href="banana.php?pagina=<?php echo $i; ?>"><i class="material-icons">chevron_right</i></a>
                <?php }else{ ?>
                <?php }  ?>

              </li>
            </ul>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!--  Scripts-->
  <script src="js/jquery.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/materialize.min.js"></script>



</body>
</html>
