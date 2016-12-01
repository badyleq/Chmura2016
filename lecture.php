<?php include("config.php");?>
<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wykłady Eksperckie CTI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/master.css" media="screen" title="no title">
    <link type="text/css" rel="stylesheet" href="css/example.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script>
        // rating script
        $(function(){
            $('.rate-btn').hover(function(){
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });

            $('.rate-btn').click(function(){
                var therate = $(this).attr('id');
                var dataRate = 'act=rate&post_id=<?php echo $post_id; ?>&rate='+therate; //
                $('.rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-active');
                };
                $.ajax({
                    type : "POST",
                    url : "http://rafal.ebond.pl/ajax.php",
                    data: dataRate,
                    success:function(){}
                });

            });
        });
    </script>


	 </head>
  <body>

    <?php include "menu.php" ?>
    <?php include "php/isLogged.php" ?>



    <div class="myDiv">
      <div class="main wrapper clearfix">
        <div class="form-style-1">
          <?php
          session_start();
          $_SESSION['id_wyk'] = $_GET['id'];
          header('Location: ajax.php');


          $resultLecture = $conn->query("select * from lista_wykladow where id_wykladu = ".$_GET['id']);
          $lecture = $resultLecture -> fetch_assoc();
          $resultTeacher = $conn->query("select * from lista_prowadzacych where id_prowadzacego = ".$lecture['id_prowadzacego']);
          $teacher = $resultTeacher -> fetch_assoc();
          $resultLogo = $conn->query("select * from lista_logo where id_logo = ".$teacher['id_logo']);
          $logo = $resultLogo-> fetch_assoc();
		  if($logo['id_logo'] != 0 ){
			  echo '<img src="'.$logo['adres'].'"border="0" height="80" class="img"><br/>';
		  }
          echo '<div class="topic">' .$lecture['temat'] . '</div><br/>';
          echo '<span style="font-weight:bold;">Data: </span>' .$lecture['godzina_start'].' - '.$lecture['data']. '<br/>';
          echo '<div style="padding-top:20px;">'.$lecture['szczegoly_wykladu'] . '</div><br>';
          echo '<span style="font-weight:bold;">Prowadzący: </span>' . $teacher['imie_prowadzacego']." ". $teacher['nazwisko_prowadzacego'].'<br/> ' .$teacher['szczegoly_prowadzacego'] . '<br><br>';
          $liczba_zapisanych = $conn->query("select count(*) from lista_zapisow where id_wykladu = " .$_GET['id']);
          $zapisani = $liczba_zapisanych -> fetch_assoc();
          echo "Liczba osob zapisanych na wyklad: " .$zapisani['count(*)'] . '<br><br>';

		  if($lecture['data']<=date('Y-m-d')){?>

		<div align ="center"><h2>Jak oceniasz wykład ?</h2></div>

    <div class="tuto-cnt">

        <div class="rate-ex1-cnt">

            <div id="1" class="rate-btn-1 rate-btn"></div>
            <div id="2" class="rate-btn-2 rate-btn"></div>
            <div id="3" class="rate-btn-3 rate-btn"></div>
            <div id="4" class="rate-btn-4 rate-btn"></div>
            <div id="5" class="rate-btn-5 rate-btn"></div>
        </div>

        <div class="box-result-cnt">
		<?php include "config.php";
$login = $_SESSION['login'];
$haslo = $_SESSION['haslo'];
// session_start();
if ((empty($login)) AND (empty($haslo))) {
header("Location: must_log.php");
}else{?>
            <?php
				
                $query = mysql_query("SELECT * FROM wcd_rate where id_wykladu = " .$_GET['id']);
                while($data = mysql_fetch_assoc($query)){
                    $rate_db[] = $data;
                    $sum_rates[] = $data['rate'];
                }
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                    $sum_rates = array_sum($sum_rates);
                    $rate_value = $sum_rates/$rate_times;
                    $rate_bg = (($rate_value)/5)*100;
                }else{
                    $rate_times = 0;
                    $rate_value = 0;
                    $rate_bg = 0;
                }
}?>
        </div><!-- /rate-result-cnt -->
    </div><!-- /tuto-cnt -->
    <div class="rate-ex1-cntt">
    <div>Ocenione <?php echo $rate_times; ?> razy.</div>

    <div>Ocena to:  <?php echo $rate_value; ?></div>

  </div>
  <div style="width: 82px;position:relative;left:40%;">
  <div class="rate-result-cnt">
    <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
    <div class="rate-stars"></div>
  </div>
</div>



        <div id="result"></div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
			<form id="form1" name="form1" method="post" action="wstaw_opinie.php">
				<div align = "center"><h2>Wystaw opinię :</h2></div>
				<textarea name="opinia" id="opinia" class="field-long field-textarea" placeholder="Podziel się swoimi przemyśleniami:" style="margin-bottom: 0px;"></textarea>
				<div align = "center"><input type="submit" name="button" id="button" value="Wyślij" /> </div>

			</form
		<?php }else{?>

			 	<div align = "center"><a href="http://rafal.ebond.pl/zapis_wyklad.php"><input type="button"
				name="submit" value="Zapisz się"></a><br><br></div>

		 <?php } ?>
     <a href="http://rafal.ebond.pl/savsoftquiz_v3.0/index.php/quiz/quiz_detail/2">Quiz</a>
     <?php include('php/social.php'); ?>
      </div>
    </div>
  </div>
    <div class="footer">
      <a href="http://rafal.ebond.pl/admin.php">Admin</a>
    </div>
    <script src="js/index.js"></script>
  </body>
</html>
