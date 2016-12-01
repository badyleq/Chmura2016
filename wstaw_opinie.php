<?php
error_reporting(0);
?>
<?php include "config.php";
$login = $_SESSION['login'];
$haslo = $_SESSION['haslo'];
// session_start();
if ((empty($login)) AND (empty($haslo))) {
header("Location: must_log.php");
}
$id_wyk = $_SESSION['id_wyk'];
$link = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
mysqli_query($link, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$opinia = $_POST["opinia"];
$ip = $_SERVER["REMOTE_ADDR"];
$id_wykladu = $id_wyk;


$sql = "INSERT INTO lista_opini (id_wykladu, ip, tresc_opini) VALUES ('$id_wykladu', '$ip', '$opinia')";
if(mysqli_query($link, $sql)){
  echo
  '<script>  window.location = "/index.php" 
   window.alert("Dodano Opinie!")</script>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
