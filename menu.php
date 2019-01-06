<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Menu</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/slide.css">
<link rel="stylesheet" type="text/css" href="css/font.css">


</head>

<body>

  <!-- Dropdown Structure -->
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="banana.php">Banana</a></li>
    <li><a href="melancia.php">Melancia</a></li>
    <li><a href="cana.php">Cana-de-Açúcar</a></li>
  </ul>
  <nav>
    <div class="nav-wrapper green darken-2">
     <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li><a href="index.php">Voltar</a></li>
    </ul>
    <ul class="right hide-on-med-and-down">

      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Culturas<i class="material-icons right">arrow_drop_down</i></a></li>

    </ul>
  </div>
</nav>

<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <br><br><center>
     <img src="img/logo.png"></center>
     <div class="row center">
      <h5 class="header col s12 light">Sistema de Monitoramento Climático para Agricultura</h5>
    </div><br><br>
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="img/banana.jpg"> <!-- random image -->
          <div class="caption right-align">
            <h3>Cultura de Banana</h3>
            <h5 class="light grey-text text-lighten-3"></h5>
          </div>
        </li>
        <li>
          <img src="img/melancia.jpg"> <!-- random image -->
          <div class="caption left-align">
            <h3>Cultura de Melancia</h3>
            <h5 class="light grey-text text-lighten-3"></h5>
          </div>
        </li>
        <li>
          <img src="img/cana.jpg"> <!-- random image -->
          <div class="caption right-align">
            <h3>Plantação de Cana-de-Açúcar</h3>
            <h5 class="light grey-text text-lighten-3"></h5>
          </div>
        </li>
      </ul>
    </div><br><br><br>
  </div>
</div>


<br><br><br><br><br><br>
<footer class="page-footer orange darken-4">

  <div class="container"><center>
    <a class="orange-text text-lighten-3">Desenvolvido por Victor Rangel Monteiro Maia</a>
  </center><br></div>

</footer>

<!--  Scripts-->
<script src="js/jquery.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script src="js/nav.js"></script>
<script>
  $(document).ready(function(){
    $('.slider').slider();
    $(".dropdown-trigger").dropdown();
  });
</script>


</body>
</html>
