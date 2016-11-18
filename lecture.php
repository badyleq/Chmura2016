<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wyk≈Çady Eksperckie CTI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/master.css" media="screen" title="no title">

<script src="http://code.jquery.com/jquery-latest.js"></script>

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script>
$(document).ready(function () {
    setInterval(function() {
        $.get("test2.php", function (result) {
            $('#aa').html(result);
        });
    }, 1000);
});
</script>

 <div id="fb-root"></div>
      <script>
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

</head>



<body>
  <div class="header-container">
    <header class="wrapper clearfix">

      <h1 class="title">Wyk≈Çady eksperckie P≈Å</h1>
      <nav>
        <ul>
          <li><a href="http://rafal.ebond.pl/index.php">Strona g≈Ç√≥wna</a></li>
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
   $data = $conn->query("SELECT TIMEDIFF((SELECT DATE_FORMAT((SELECT concat(data, ' ' , godzina_start) from lista_wykladow where id_wykladu = '1'), '%Y-%m-%d %H:%i:%s')),DATE_FORMAT(SYSDATE(), '%Y-%m-%d %H:%i:%s')) as a from dual;");
   $data2 = $data -> fetch_assoc();


   echo $lecture['temat'] . '<br>';
   echo $lecture['data'] . '<br>';
   echo $lecture['szczegoly_wykladu'] . '<br>';
   echo $teacher['imie_prowadzacego'] . '<br>';
   echo $teacher['szczegoly_prowadzacego'] . '<br>';
   //echo "Pozostalo: ". $data2['a']. '<br>';
echo '<div id="aa"></div>'
?>
    <a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a>
                  <script async="" src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                 <!-- w wypadku fb : w tej wersji wyúwietli siÍ jeszcze pod nim lista osÛb -->
                 <div class="fb-like" data-href="http://rafal.ebond.pl/lecture.php?id=1" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                <br/><div class="fb-like" data-href="http://rafal.ebond.pl/" data-layout="standard" data-action="recommend"></div>
                <script src="https://apis.google.com/js/platform.js" async="" defer=""></script>
                  <g:plusone>+</g:plusone>
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
