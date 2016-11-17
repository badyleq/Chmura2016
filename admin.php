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

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Strefa administratora</h1>
            </header>
        </div>
        <div class="myDiv">

        <?php include('logowanie_admin.php'); ?>
          <div class="main wrapper clearfix">
            <div align="center" id="mainWrapper">
              <div id="pageContent"><br />
                <div align="center" style="margin:0px 24px;">
                  <form id="form1" name="form1" method="post" action="logowanie_admin.php">
                    <div class="form-style-1">
                      <label>Login</label>
                      <input type="text" name="username" id="username" class="field-long" placeholder="Login" style="margin-bottom: 30px;"/>
                      <label>Hasło </label>
                      <input name="password" type="password" id="password" class="field-long" placeholder="Hasło"/>
                      <input type="submit" name="button" id="button" value="Zaloguj" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="footer-container">
            <footer class="wrapper"></footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/main.js"></script>
    </body>
</html>
