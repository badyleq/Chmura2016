<?php include("config.php"); ?>
<?php
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo = addslashes($haslo);
$login = addslashes($login);
$login = htmlspecialchars($login);
if ($_GET['login'] != '')
{
  exit;
}
if ($_GET['haslo'] != '')
{
  exit;
}

$haslo = md5($haslo);
if (!$login OR empty($login))
{
  echo '<p class="alert">Wypełnij pole z loginem!</p>';
  exit;
}
if (!$haslo OR empty($haslo))
{
  echo '<p class="alert">Wypełnij pole z hasłem!</p>';
  exit;
}
$istnick = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM lista_uzytkownikow WHERE nr_indeksu = '$login' AND haslo = '$haslo'"));
if ($istnick[0] == 0)
{
  header("Location: blad_logowania.php");
}
else
{
  $_SESSION['login'] = $login;
  $_SESSION['haslo'] = $haslo;
  header("Location: index.php");
}
?>
