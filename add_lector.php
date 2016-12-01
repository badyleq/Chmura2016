<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: admin.php");
    exit();
}
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]);
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]);
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]);

include("config.php");

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
    <?php include "php/isLogged.php" ?>
    <div class="myDiv">
      <div class="main wrapper clearfix">
        <div align="center" id="mainWrapper">
          <div id="pageContent">
            <a name="inventoryForm" id="inventoryForm"></a>
            <h3>Dodawanie nowego prowadzącego</h3>
            <form id="form1" name="form1" method="post" action="php/new_lector.php">
              <div class="form-style-1">
                <label>Imie prowadzącego</label>
                <input type="text" name="lector_name" id="lector_name" class="field-long" placeholder="Imie" style="margin-bottom: 30px;"/>
				<label>Nazwisko prowadzącego</label>
                <input type="text" name="lector_lastname" id="lector_lastname" class="field-long" placeholder="Nazwisko" style="margin-bottom: 30px;"></input>
                <label>Firma</label>
				<?php
                $conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
				$conn -> query ('SET NAMES utf8');
				$conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
                $result = $conn->query("Select * from lista_logo where id_logo");
                $array = array();
                while($row = $result -> fetch_assoc()){
                  $array[] = $row['nazwa_firmy'];
				}

                ?>
                <select class="field-long" name="lector_company" id="lector_company">
                  <?php foreach ($array as $option): ?>
                    <option value="<?php echo $option; ?>">
                      <?php echo $option;
					  ?>
                    </option>
                  <?php endforeach;
                  ?>
                </select>
                <label>Szczegoly o prowadzacym</label>
                <textarea name="lector_details" id="lector_details" class="field-long field-textarea" placeholder="O prowadzącym" style="margin-bottom: 30px;"></textarea>
                <input type="submit" name="button" id="button" value="Dodaj prowadzącego" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
    </div>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.1.1.min.js"><\/script>')</script>
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
