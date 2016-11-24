<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: admin.php");
    exit();
}
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]);
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]);
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]);

$db_host = "sql.s24.vdl.pl";
$db_username = "bleizer_rafal";
$db_pass = "7uDntXzn";
$db_name = "bleizer_rafal";
mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");

$existCount = mysql_num_rows($sql);
if ($existCount == 0) {
	 echo "Błąd";
     exit();
}
?>
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
  </head>
  <body>
    <?php include "menu-admin.php" ?>
    <?php //include "php/isLogged.php" ?>
    <div class="myDiv">
      <div class="main wrapper clearfix">
        <div align="center" id="mainWrapper">
          <div id="pageContent"><br />
            <h3>Dodawanie nowego wykładu</h3>
            <form id="form1" name="form1" method="post" action="php/new_lecture.php">
              <div class="form-style-1">
                <label>Prowadzący</label>
                <?php
                $conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
                $result = $conn->query("Select nazwisko_prowadzacego, imie_prowadzacego from lista_prowadzacych");
                $array = array();
                while($row = $result -> fetch_assoc()){
                  $array[] = $row['nazwisko_prowadzacego']." ". $row['imie_prowadzacego'];
                }
                ?>
                <select class="field-long" name="dane_prow" id="dane_prow">
                  <?php foreach ($array as $option): ?>
                    <option value="<?php echo $option; ?>">
                      <?php echo $option; ?>
                    </option>
                  <?php endforeach;
                  ?>
                </select>
                <label style="margin-top: 30px;">Tytuł wykładu</label>
                <input type="text" name="title" id="title" class="field-long" placeholder="Tytuł wykładu" style="margin-bottom: 30px;"/>
                <label>Szczegóły</label>
                <textarea name="details" id="details" class="field-long field-textarea" placeholder="O wykładzie" style="margin-bottom: 30px;"></textarea>
                <label>Data i czas rozpoczęcia wykładu</label>
                <input type="date" class="field-long" name="date" value="" style="margin-bottom: 30px;">
                <input type="time" class="field-long" name="time" value="00:00">
                <input type="submit" name="button" id="button" value="Dodaj wykład" />
              </div>
            </form>
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
