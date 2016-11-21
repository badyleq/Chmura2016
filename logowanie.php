<?php
session_start();
?>
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
    <link rel="stylesheet" href="css/master.css" media="screen" title="no title">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  </head>
  <body>
    <?php include "menu.php" ?>
      <div class="myDiv">
        <div class="main wrapper clearfix">
          <div align="center" id="mainWrapper">
            <div id="pageContent"><br />
              <form method="POST" action="login.php">
                <strong>Zaloguj się</strong>
                <div class="form-style-1">
                  <label>Numer indeksu</label>
                  <input maxlength="18" type="text" name="login" class="field-long"/>
                  <label>Hasło</label>
                  <input maxlength="32" type="password" name="haslo" class="field-long"/>
                  <input type="submit" value="Zaloguj">
                </div>
              </form>
              <span>Nie masz jeszcze konta? <a href="http://rafal.ebond.pl/rejestracja.php">Zarejestruj się!</a></span>
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
