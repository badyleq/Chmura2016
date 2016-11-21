<?php include("config.php");?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wykłady Eksperckie CTI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/master.css" media="screen" title="no title">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
  </head>
  <body>

    <?php include "menu.php" ?>
    <?php include "php/isLogged.php" ?>
    
    <div class="myDiv">
      <div class="main wrapper clearfix">
        <div class="form-style-1">
          <?php
          $conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
          $conn -> query ('SET NAMES utf8');
          $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
          if($conn->connect_error)
          {
            die("Connection error: " .$conn ->connect_error);
          }
          $resultLecture = $conn->query("select * from lista_wykladow where id_wykladu = ".$_GET['id']);
          $lecture = $resultLecture -> fetch_assoc();
          $resultTeacher = $conn->query("select * from lista_prowadzacych where id_prowadzacego = ".$lecture['id_prowadzacego']);
          $teacher = $resultTeacher -> fetch_assoc();
          echo '<strong>' .$lecture['temat'] . '</strong><br><br>';
          echo 'Termin:  ' . $lecture['data'] . '<br><br>';
          echo $lecture['szczegoly_wykladu'] . '<br><br>';
          echo '<u>' . $teacher['imie_prowadzacego'].'</u> - ' .$teacher['szczegoly_prowadzacego'] . '<br><br>';
          ?>
	  <div align = "center"><a href="http://rafal.ebond.pl/zapis_wyklad.php"><input type="button" name="submit" value="Zapisz sie"></a><br><br></div>
          <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a>
          <script async="" src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
          <!-- w wypadku fb : w tej wersji wy�wietli si� jeszcze pod nim lista os�b -->
          <div style="margin-top:2px;" class="fb-like" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
          <!-- <div class="fb-like" data-href="http://rafal.ebond.pl/" data-layout="standard" data-action="recommend"></div> -->
          <script src="https://apis.google.com/js/platform.js" async="" defer=""></script>
          <g:plusone>+</g:plusone>
        </div>
      </div>
    </div>
    <div class="footer">
      <a href="http://rafal.ebond.pl/admin.php">Admin</a>
    </div>
    <script src="js/index.js"></script>
  </body>
</html>
