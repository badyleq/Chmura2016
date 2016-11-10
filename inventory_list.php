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
                      <li><a href="http://rafal.ebond.pl/add_lector.php">Dodaj prowadzącego</a></li>
                      <li><a href="http://rafal.ebond.pl/index.php">Wyloguj</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

<?php
if (isset($_GET['deleteid'])) {
	echo 'Czy chcesz usunąć wykład o ID ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Tak</a> |||| <a href="inventory_list.php">Nie</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM users WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	header("location: inventory_list.php");
    exit();
}
?>

<?php //wyswietlanie wykladow - Mateusz
 $conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
 $conn -> query ('SET NAMES utf8');
 $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
 if($conn->connect_error){
 	die("Connection error: " .$conn ->connect_error);
 }
 $result = $conn->query("Select temat from lista_wykladow");
// if($result->num_rows > 0){
// 	while($row = $result -> fetch_assoc()){
// 		echo $row['temat'] . '<br>';
//
// 	}
// }
?>


<?php
if (isset($_POST['nazwa'])) {

   	$nazwa = mysql_real_escape_string($_POST['nazwa']);
	$szczegoly = mysql_real_escape_string($_POST['szczegoly']);
	$sql = mysql_query("SELECT id FROM users WHERE nazwa='$nazwa' LIMIT 1");
	$productMatch = mysql_num_rows($sql);
    if ($productMatch > 0) {
		echo 'Probujesz dodac wykład ktory jest juz w bazie, <a href="inventory_list.php">naciśnij tutaj</a>';
		exit();
	}
	$sql = mysql_query("INSERT INTO users (nazwa, szczegoly)
        VALUES('$nazwa','$szczegoly')") or die (mysql_error());
     $pid = mysql_insert_id();
	header("location: inventory_list.php");
    exit();
}
?>
<?php //wyswietlanie wykladow - Rafal
 // $conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
 // if (!$conn) {
 //     die("Connection failed: " . mysqli_connect_error());
 // }
 // $sql = "Select nazwisko_prowadzacego, imie_prowadzacego from lista_prowadzacych";
 // $result = mysqli_query($conn, $sql);
 //
 // if (mysqli_num_rows($result) > 0) {
 //     // output data of each row
 //     while($row = mysqli_fetch_assoc($result)) {
 //         echo $row["imie_prowadzacego"]. " " . $row["nazwisko_prowadzacego"]. "<br>";
 //         echo '<option value="'.$row["imie_prowadzacego"].'">'.$row["imie_prowadzacego"]." ".$row["nazwisko_prowadzacego"].'</option>';
 //     }
 // } else {
 //     echo "0 results";
 // }

 // mysqli_close($conn);

// $conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
// $result = mysqli_query($conn,"SELECT * FROM users");
// $num_rows = mysql_num_rows($result);
//
// echo "$num_rows Rows\n";
//
// $result = @mysql_query("SELECT * FROM users");
// $res = mysql_fetch_array($result);
//
//
// $result = mysqli_query($conn, "SELECT * FROM Users");
// $product_list = "";
// $itemnumrows = mysql_num_rows($result);
// if(mysqli_num_rows($result))
//     echo "Email address exists!";
// else
//     echo "sss";
//
// $sql = mysql_query("SELECT * FROM users");
// $productCount = mysql_num_rows($result);
// if ($productCount > 0) {
// 	while($row = mysql_fetch_array($sql)){
//              $id = $row["id"];
// 			 $nazwa = $row["nazwa"];
// 			 $product_list .= "Product ID: $id - <strong>$nazwa</strong> <a href='dodawanie_wykladow.php?pid=$id'>Edycja</a> &bull; <a href='inventory_list.php?deleteid=$id'>Usuń</a><br />";
//     }
// } else {
// 	$product_list = "Nie ma zadnych wykladow w najblizszym czasie";
// }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista wykładów</title>
</head>

<body>
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <!-- <div align="right" style="margin-right:32px;"><a href="inventory_list.php#inventoryForm">Dodaj nowy wykład</a></div> -->
<!-- <div align="left" style="margin-left:24px;">
      <h2>Lista wykładów</h2>
    </div> -->
    <?php //echo $product_list; ?>
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    Dodawanie nowego wykładu
    </h3>
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
        <select name="id_wyk" id="id_wyk">
          <?php foreach ($array as $option): ?>
            <option value="<?php echo $option; ?>">
              <?php echo $option; ?>
            </option>
          <?php endforeach; ?>
        </select> <br />
        <span>działa! jebane gowno :D</span> <br />
        <span>tylko teraz nie działa dodawanie wykladu, bo tam trzeba przekazac id prowadzacego, a nie imie i nazwisko</span> <br />
        <span>teraz bedzie trzeba zapytanko skontruowac ktore bedzie wrzucac do INSERTa id zamiast imienia i nazwiska</span>
        <label style="margin-top: 30px;">Tytuł wykładu</label>
        <input type="text" name="title" id="title" class="field-long" placeholder="Tytuł wykładu" style="margin-bottom: 30px;"/>
        <label>Szczegóły</label>
        <textarea name="details" id="details" class="field-long field-textarea" placeholder="O wykładzie" style="margin-bottom: 30px;"></textarea>
        <label>Data i czas rozpoczęcia wykładu</label>
        <input type="date" name="date" value="" style="margin-bottom: 30px;">
        <input type="time" name="time" value="00:00">
        <input type="submit" name="button" id="button" value="Dodaj wykład" />
      </div>
    </form>

    <!-- <form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Nazwa</td>
        <td width="80%"><label>
          <input name="nazwa" type="text" id="nazwa" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Szczegóły</td>
        <td><label>
          <textarea name="szczegoly" id="szczegoly" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Dodaj przedmiot" />
        </label></td>
      </tr>
    </table>
    </form> -->
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
