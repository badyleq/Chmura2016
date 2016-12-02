<?php include("config.php"); ?>
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
    <?php include "php/isLogged.php" ?>
    <div class="myDiv">
      <div class="main wrapper clearfix">
        <div align="center" id="mainWrapper">
          <div id="pageContent"><br />
            <span>Masz już konto? <a href="http://rafal.ebond.pl/logowanie.php">Zaloguj się!</a><br></span>
            <?php
            $ip = $_SERVER['REMOTE_ADDR'];
            $akcja = $_GET['akcja'];
            if ($akcja == wykonaj) {
              $imie = substr(addslashes(htmlspecialchars($_POST['imie'])),0,32);
              $nazwisko = substr(addslashes(htmlspecialchars($_POST['nazwisko'])),0,32);
              $nr_indeksu = substr(addslashes(htmlspecialchars($_POST['nr_indeksu'])),0,6);
              $haslo = substr(addslashes($_POST['haslo']),0,32);
              $vhaslo = substr($_POST['vhaslo'],0,32);
              $wydzial = substr(addslashes(htmlspecialchars($_POST['wydzial'])),0,32);
              $email = substr($_POST['email'],0,32);
              $vemail = substr($_POST['vemail'],0,32);
              $spr1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE imie='$imie' LIMIT 1"));
              $spr2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE email='$email' LIMIT 1"));
              $pos = strpos($email, "@");
              $pos2 = strpos($email, ".");
              $emailx = explode("@", $email);
              if ($emailx[1] == 'o2.pl')
              {
                $emailx1 = $emailx[0].'@go2.pl';
                $emailx2 = $emailx[0].'@tlen.pl';
                $spr3 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE email='$emailx1' OR `email`='$emailx2' LIMIT 1"));
              }
              elseif ($emailx[1] == 'go2.pl')
              {
                $emailx1 = $emailx[0].'@o2.pl';
                $emailx2 = $emailx[0].'@tlen.pl';
                $spr3 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE email='$emailx1' OR `email`='$emailx2' LIMIT 1"));
              }
              elseif ($emailx[1] == 'tlen.pl')
              {
                $emailx1 = $emailx[0].'@go2.pl';
                $emailx2 = $emailx[0].'@o2.pl';
                $spr3 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE email='$emailx1' OR `email`='$emailx2' LIMIT 1"));
              }
              $komunikaty = '';
              $spr5 = strlen($haslo);
              if (!$imie || !$nazwisko || !$wydzial || !$nr_indeksu || !$email || !$haslo || !$vhaslo || !$vemail )
              {
                $komunikaty .= "Musisz wypełnić wszystkie pola!<br>";
              }
               if ($spr5 < 4)
              {
                $komunikaty .= "Hasło musi mieć przynajmniej 4 znaki<br>";
              }
              if ($spr2[0] >= 1)
              {
                $komunikaty .= "Ten e-mail jest już używany!<br>";
              }
              if ($email != $vemail)
              {
                $komunikaty .= "E-maile się nie zgadzają ...<br>";
              }
              if ($haslo != $vhaslo)
              {
                $komunikaty .= "Hasła się nie zgadzają ...<br>";
              }
              if ($pos == false OR $pos2 == false)
              {
                $komunikaty .= "Nieprawidłowy adres e-mail<br>";
              }
              if ($spr3[0] >= 1)
              {
                $komunikaty .= "Nie można zarejestrować kilku kont na jeden adres email<br>";
              }
              if ($komunikaty)
              {
                echo '<strong>Rejestracja nie powiodła sie popraw następujące błędy:</strong>'.$komunikaty.'<br>';
              }
              else
              {
                $imie = str_replace ( ' ','', $imie );
                $haslo = md5($haslo);
                mysql_query("INSERT INTO `lista_uzytkownikow` (imie, nazwisko, nr_indeksu, email, haslo, wydzial) VALUES('$imie', '$nazwisko', '$nr_indeksu', '$email','$haslo','$wydzial')") or die("Nie mogĹ‚em Cie zarejestrowaÄ‡!");
                echo '<br><span style="color: green; font-weight: bold;">Zostałeś zarejestrowany '.$imie.'  '.$nazwisko.'. Teraz możesz się zalogować</span><br>';
                echo '<br><a href="logowanie.php">Logowanie</a>';
              }
            }
            ?>
            <div style="padding-top:30px;" align="center" id="mainWrapper">
              <strong>Rejestracja nowego użytkownika</strong>
              <form method="post" action="rejestracja.php?akcja=wykonaj">
                <div class="form-style-1">
                  <label>Imię</label>
                  <input maxlength="18" type="text" name="imie" class="field-long" value="<?=$imie?>"/>
                  <label>Nazwisko</label>
                  <input maxlength="18" type="text" name="nazwisko" class="field-long" value="<?=$nazwisko?>"/>
                  <label>Numer indeksu</label>
                  <input maxlength="18" type="text" name="nr_indeksu" class="field-long" value="<?=$nr_indeksu?>"/>
                  <label>Wydział</label>
                  <input maxlength="18" type="text" name="wydzial" class="field-long" value="<?=$wydzial?>"/>
                  <label>Hasło</label>
                  <input maxlength="32" type="password" name="haslo" class="field-long">
                  <label>Powtórz hasło</label>
                  <input maxlength="32" type="password" name="vhaslo" class="field-long">
                  <label>E-mail</label>
                  <input type="text" name="email" maxlength="50" class="field-long" value="<?=$email?>"/>
                  <label>Powtórz e-mail</label>
                  <input type="text" maxlength="50" name="vemail" class="field-long" value="<?=$vemail?>"/>
                  <br/>
                  <input type="submit" value="Zarejestruj">
                </div>
              </form>
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
