<!doctype html>
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
  <div class="header-container">
    <header class="wrapper clearfix">

      <h1 class="title">Wykłady eksperckie PŁ</h1>
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
          <div class="form-style-1">


  <?php
   $conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
   $conn -> query ('SET NAMES utf8');
   $conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
   if($conn->connect_error){
   	die("Connection error: " .$conn ->connect_error);
   }
   // SELECT * FROM `lista_wykladow` WHERE id_wykladu = '$_GET['id']'
   $resultLecture = $conn->query("select * from lista_wykladow where id_wykladu = ".$_GET['id']);
   $lecture = $resultLecture -> fetch_assoc();
   $resultTeacher = $conn->query("select * from lista_prowadzacych where id_prowadzacego = ".$lecture['id_prowadzacego']);
   $teacher = $resultTeacher -> fetch_assoc();
   echo $lecture['temat'] . '<br>';
   echo $lecture['data'] . '<br>';
   echo $lecture['szczegoly_wykladu'] . '<br>';
   echo $teacher['imie_prowadzacego'] . '<br>';
   echo $teacher['szczegoly_prowadzacego'] . '<br>';
  ?>

</div>
</div>
</div>
<div class="footer-container">
    <footer class="wrapper">
        <a href="http://rafal.ebond.pl/admin.php">Admin</a>
    </footer>
</div>
</div>
</body>
