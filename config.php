<?php session_start();
mysql_connect("sql.s24.vdl.pl", "bleizer_rafal", "7uDntXzn") or die(mysql_error()."Nie mozna polaczyc sie z baza danych. Prosze chwile odczekac i sprobowac ponownie.");
mysql_select_db("bleizer_rafal") or die(mysql_error()."Nie mozna wybrac bazy danych.");
$conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
$conn -> query ('SET NAMES utf8');
$conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
if($conn->connect_error)
{
  die("Connection error: " .$conn ->connect_error);
}
?>
