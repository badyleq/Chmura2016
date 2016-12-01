<?php
error_reporting(0);
?>
<?php include "../config.php";
$login = $_SESSION['login'];
$haslo = $_SESSION['haslo'];
if ((empty($login)) AND (empty($haslo))) {
header("Location: ../must_log.php");
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM lista_uzytkownikow WHERE `nr_indeksu`='$login' AND `haslo`='$haslo' LIMIT 1"));
if (empty($user[id_uzytkownika]) OR !isset($user[id_uzytkownika])) {
header("Location: ../must_log.php");
exit;
}
$url = $_SERVER['HTTP_REFERER'];
$id_wykladu = substr("$url", -4);
$student = mysql_fetch_array(mysql_query("SELECT * FROM testowa WHERE `nr_indeksu`='$login' LIMIT 1"));
$wyklad =  mysql_fetch_array(mysql_query("SELECT * FROM testowa WHERE `id_wykladu`='$id_wykladu' LIMIT 1"));
if (isset($wyklad[id_wykladu]) AND (isset($student[nr_indeksu]))) {
header("Location: ../juz_zapisany.php");
}
else
{
$url = $_SERVER['HTTP_REFERER'];
$id_wykladu = substr("$url", -4);
$query = "INSERT INTO `testowa`(`nr_indeksu`, `id_wykladu`, `data_zapisu`) VALUES ('$login', '$id_wykladu', SYSDATE())";
mysql_query($query);
header("Location: ../poprawny_zapis.php");
}
?>
