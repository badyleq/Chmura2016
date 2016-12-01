<?php header('Content-type: text/html; charset=utf-8'); ?>
<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wykłady Eksperckie CTI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/master.css" media="screen" title="no title" charset="utf-8">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    </script>
  </head>
  <body>
    <?php include "menu-admin.php" ?>
    <?php //include "php/isLogged.php" ?>
    <div class="myDiv">
      <div class="main wrapper clearfix">
        <div align="center" id="mainWrapper">
          <div id="pageContent"><br />
            <div class="form-style-1">
              <canvas id="myChart" width="400" height="400"></canvas>




              <?php
              $conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
              $lectures = $conn->query("Select id_wykladu from lista_wykladow");
              $signsIns = $conn->query("Select id_wykladu from lista_zapisow");
              $arrayOfLectures = array();
              while($row = $lectures -> fetch_assoc()){
                $arrayOfLectures[] = $row['id_wykladu'];
              }

              $arrayOfSignIns = array();
              $array = array();
              while($row2 = $signsIns -> fetch_assoc()){
                $arrayOfSignIns[] = $row2['id_wykladu'];
              }
              $array = array_merge($arrayOfLectures, $arrayOfSignIns);
              $arrayResult = array_count_values($array);

              while($row = $lectures -> fetch_assoc()){
                $arrayOfResults[] = $arrayResult[$row['id_wykladu']];
              }

              $finalArray = array();

              foreach ($arrayResult as $key => $value){
                array_push($finalArray, ($value-1));
              }
              ?>

<script>
var jArrayLabels = <?php echo json_encode($arrayOfLectures); ?>;
var jArrayData = <?php echo json_encode($finalArray); ?>;
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: jArrayLabels,
        datasets: [{
            label: 'Liczba uczestników',
            data: jArrayData,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.1.1.min.js"><\/script>')</script>
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
