<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Formularz kontaktowy</h1>
			<nav>
                    <ul>
                        <li><a href="http://rafal.ebond.pl/index.php">Strona główna</a></li>
                    </ul>
                </nav>
            </header>
        </div>
        <div class="myDiv">


        <div class="main-container">
            <div class="main wrapper clearfix">

<div align="center" id="mainWrapper">
   <div id="pageContent"><br />
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


            </div> <!-- #main -->
        </div> <!-- #main-container -->
      </div>

        <div class="footer-container">
            <footer class="wrapper">
                <a href="http://rafal.ebond.pl/admin.php">Admin</a>
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
