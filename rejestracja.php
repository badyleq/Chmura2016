<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/master.css" media="screen" title="no title">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Rejestracja</h1>
		<nav>
		     <ul>
                        <li><a href="http://rafal.ebond.pl/index.php">Powrót</a></li>
                    </ul>
		</nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />


<?php include("config.php");

$ip = $_SERVER['REMOTE_ADDR'];

$akcja = $_GET['akcja'];
    if ($akcja == wykonaj) {
//
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
if ($emailx[1] == 'o2.pl') {
$emailx1 = $emailx[0].'@go2.pl';
$emailx2 = $emailx[0].'@tlen.pl';
$spr3 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE email='$emailx1' OR `email`='$emailx2' LIMIT 1"));
}elseif ($emailx[1] == 'go2.pl') {
$emailx1 = $emailx[0].'@o2.pl';
$emailx2 = $emailx[0].'@tlen.pl';
$spr3 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE email='$emailx1' OR `email`='$emailx2' LIMIT 1"));
}elseif ($emailx[1] == 'tlen.pl') {
$emailx1 = $emailx[0].'@go2.pl';
$emailx2 = $emailx[0].'@o2.pl';
$spr3 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE email='$emailx1' OR `email`='$emailx2' LIMIT 1"));
}
$komunikaty = '';
$spr5 = strlen($haslo);

if (!$imie || !$nazwisko || !$wydzial || !$nr_indeksu || !$email || !$haslo || !$vhaslo || !$vemail ) {
$komunikaty .= "Musisz wypełnić wszystkie pola!<br>"; }
if ($spr5 < 4) {
$komunikaty .= "Hasło musi mieć przynajmniej 4 znaki<br>"; }
if ($spr2[0] >= 1) {
$komunikaty .= "Ten e-mail jest już używany!<br>"; }
if ($email != $vemail) {
$komunikaty .= "E-maile się nie zgadzają ...<br>";}
if ($haslo != $vhaslo) {
$komunikaty .= "Hasła się nie zgadzają ...<br>";}
if ($pos == false OR $pos2 == false) {
$komunikaty .= "Nieprawidłowy adres e-mail<br>"; }
if ($spr3[0] >= 1) {
$komunikaty .= "Nie można zarejestrować kilku kont na jedną pocztę o2.<br>"; }


if ($komunikaty) {
echo '
<b>Rejestracja nie powiodła się, popraw następujące błędy:</b><br>
'.$komunikaty.'<br>';
} else {

$imie = str_replace ( ' ','', $imie );
$haslo = md5($haslo);

mysql_query("INSERT INTO `lista_uzytkownikow` (imie, nazwisko, nr_indeksu, email, haslo, wydzial) VALUES('$imie', '$nazwisko', '$nr_indeksu', '$email','$haslo','$wydzial')") or die("Nie mogłem Cie zarejestrować!");

echo '<br><span style="color: green; font-weight: bold;">Zostałeś zarejestrowany '.$imie.'  '.$nazwisko.'. Teraz możesz się zalogować</span><br>';
echo '<br><a href="logowanie.php">Logowanie</a>';
}
}
?>

<div align="center" id="mainWrapper">

<tr><strong>Rejestracja nowego użytkownika</strong></tr>
<form method="post" action="rejestracja.php?akcja=wykonaj">
  <div class="form-style-1">

<label>Imie</label>
<input maxlength="18" type="text" name="imie" class="field-long" value="<?=$imie?>"/>
<label>Nazwisko</label>
<input maxlength="18" type="text" name="nazwisko" class="field-long" value="<?=$nazwisko?>"/>
<label>Numer indeksu</label>
<input maxlength="18" type="text" name="nr_indeksu" class="field-long" value="<?=$nr_indeksu?>"/>
<label>Wydział</label>
<input maxlength="18" type="text" name="wydzial" class="field-long" value="<?=$wydzial?>"/>
<label>Hasło</label>
<input maxlength="32" type="password" name="haslo" class="field-long">
<label>Powtóz hasło</label>
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

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
