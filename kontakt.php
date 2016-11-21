<?php include("config.php");?>

<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wykłady Eksperckie CTI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/master.css" media="screen" title="no title" charset="utf-8">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  </head>
  <body>
    <?php include "menu.php" ?>
    <?php include "php/isLogged.php" ?>
    <div class="myDiv">
      <div class="main wrapper clearfix">
        <div align="center" id="mainWrapper">
          <div id="pageContent">
		<strong>Formularz kontaktowy</strong>
            <div class="form-style-1">
              <?php
              if (empty($_POST['submit'])) {
                echo "<form method=\"post\">
                <label>Treść wiadomości</label>
                <textarea name=\"tresc\" id=\"tresc\" class=\"field-long field-textarea\" placeholder=\"Wiadomość\" style=\"margin-bottom: 30px;\"></textarea>
                <label>Imię i nazwisko</label>
                <input type=\"text\" name=\"nazwa\" class=\"field-long\" placeholder=\"Imie i nazwisko\" style=\"margin-bottom: 30px;\"/>
                <label>Adres e-mail</label>
                <input type=\"text\" name=\"email\" class=\"field-long\" placeholder=\"Adres e-mail\" style=\"margin-bottom: 30px;\"/>
                <input type=\"submit\" name=\"submit\" class=\"field-divided\" style=\"margin:0;\" value=\"Wyślij\">
                <input type=\"reset\" value=\"Od nowa\" class=\"field-divided\" style=\"margin:0;\"></form>";
              }
              elseif (!empty($_POST['tresc']) && !empty($_POST['nazwa']) && !empty($_POST['email'])) {
                $message = "Treść wiadomości:\n$_POST[tresc]\nWysłał: $_POST[nazwa]\ne-mail: $_POST[email]";
                $header = "From: $_POST[nazwa] <$_POST[email]>";
                @mail("deli.gares@gmail.com","Wiadomosc ze strony WWW","$message","$header")
                or die('Nie udało się wysłać wiadomości');
                echo "<div align=\"center\"><strong>Wiadomość została wysłana poprawnie</strong></div>";
                echo '<br><a href="http://rafal.ebond.pl/index.php">Powrót do strony głównej</a>';
              }
              else
              {
                echo "<div align=\"center\"><strong>Wypełnij wszystkie pola formularza !</strong></div>";
                echo '<br><a href="http://rafal.ebond.pl/kontakt.php">Powrót do formularza</a>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <a href="http://rafal.ebond.pl/admin.php">Admin</a>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.1.1.min.js"><\/script>')</script>
    <!-- <script src="js/main.js"></script> -->
    <script src="js/index.js"></script>
  </body>
</html>
