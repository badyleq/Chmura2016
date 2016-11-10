<?php header('Content-type: text/html; charset=utf-8'); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
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
                <span class="title">Panel administracyjny</span>
                <nav>
                    <ul>
                      <li><a href="http://rafal.ebond.pl/inventory_list.php">Dodaj wykład</a></li>
                        <li><a href="http://rafal.ebond.pl/index.php">Wyloguj</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista wyk�ad�w</title>
</head>

<body>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    Dodawanie nowego prowadzącego
    </h3>
    <form id="form1" name="form1" method="post" action="php/new_lector.php">
      <div class="form-style-1">


        <label>Imie prowadzącego</label>
        <input type="text" name="lector_name" id="lector_name" class="field-long" placeholder="Imie" style="margin-bottom: 30px;"/>
        <label>Nazwisko prowadzącego</label>
        <input type="text" name="lector_lastname" id="lector_lastname" class="field-long" placeholder="Nazwisko" style="margin-bottom: 30px;"></input>
        <label>Firma</label>
        <input type="text" name="lector_company" id="lector_lcompany" class="field-long" placeholder="Nazwa firmy" style="margin-bottom: 30px;"></input>
        <label>Szczegoly o prowadzacym</label>
        <textarea name="lector_details" id="lector_details" class="field-long field-textarea" placeholder="O prowadzącym" style="margin-bottom: 30px;"></textarea>
        <input type="submit" name="button" id="button" value="Dodaj prowadzącego" />
      </div>
    </form>

    <br />
  <br />
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
