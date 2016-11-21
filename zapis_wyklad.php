<?php include("config.php");
$login = $_SESSION['login'];
$haslo = $_SESSION['haslo'];
if ((empty($login)) AND (empty($haslo))) {
header("Location: must_log.php");
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM lista_uzytkownikow WHERE `nr_indeksu`='$login' AND `haslo`='$haslo' LIMIT 1"));
    if (empty($user[id_uzytkownika]) OR !isset($user[id_uzytkownika])) {
header("Location: must_log.php");
}
else header("Location: index.php");
?>
