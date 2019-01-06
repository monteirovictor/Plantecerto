<?php

$connection = mysqli_connect("localhost","root","","plantecerto") or die("Error " . mysqli_error($connection));

//fetch table rows from mysql db

 $sql = "select * from sensor1";
 $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

 //create an array
 $rows = array();
 //flag is not needed
 $flag = true;
 $table = array();
 $table['cols'] = array(

 // Labels for your chart, these represent the column titles
 // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title

  array('label' => 'Startup', 'type' => 'string'),
    array('label' => 'Temp. C°', 'type' => 'number')

);


  $rows = array();
    while($r =mysqli_fetch_assoc($result))
    {
    $temp = array();
    // the following line will be used to slice the Pie chart

 $temp[] = array('v' => (string) $r['data']);

    $temp[] = array('v' => (float) $r['temperatura']);



    // Values of each slice

    $rows[] = array('c' => $temp);
    }

  $table['rows'] = $rows;
   $jsonTable = json_encode($table);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Temperatura - Cana-de-Açúcar</title>

  <!-- CSS  -->
  <script type="text/javascript" src="js/jsapi.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/uds_api_contents.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/slide.css">


  <!--Load the Ajax API-->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
       title: 'Temperatura C°',
       vAxis: {title: 'C°'},
      hAxis: {title: 'Período'},
       is3D: 'true',
       width: 800,
       height: 600
     };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
</head>

<nav>
  <div class="nav-wrapper green darken-2">

    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="cana.php">Voltar</a></li>
    </ul>
  </div>
</nav>



<body>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <center>
       <img src="img/tabelacana.png"></center>
       <div class="row center">
     <div class="row center">
      <h5 class="header col s12 light"> Monitoramento Online</h5>
    </div><br><br>

    <div class="row center" id="chart_div">

    </div>
  </div>
</div>



<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>



</body>
</html>
