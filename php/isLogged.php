<?php
$login = $_SESSION['login'];
$haslo = $_SESSION['haslo'];
    if ((empty($login)) AND (empty($haslo))) {
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM lista_uzytkownikow WHERE `nr_indeksu`='$login' AND `haslo`='$haslo' LIMIT 1"));
    if (empty($user[id_uzytkownika]) OR !isset($user[id_uzytkownika])) {
}
else echo 'Zalogowany użytkownik: <strong>'.$user[imie].' '.$user[nazwisko].'</strong> <b><a href="http://rafal.ebond.pl/wyloguj.php">(Wyloguj)</a> ';
?>
