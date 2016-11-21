<?php
$conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
$conn -> query ('SET NAMES utf8');
$conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
if($conn->connect_error)
{
  die("Connection error: " .$conn ->connect_error);
}
$data = $conn->query("SELECT TIMEDIFF((SELECT DATE_FORMAT((SELECT concat(data, ' ' , godzina_start) from lista_wykladow where id_wykladu = (SELECT id_wykladu FROM `lista_wykladow` WHERE DATE_FORMAT(concat(data, ' ' , godzina_start), '%Y-%m-%d %H:%i:%s') > (DATE_FORMAT(SYSDATE(), '%Y-%m-%d %H:%i:%s')) ORDER BY data,`godzina_start` LIMIT 1)), '%Y-%m-%d %H:%i:%s')),DATE_FORMAT(SYSDATE(), '%Y-%m-%d %H:%i:%s')) as a from dual;");
$data2 = $data -> fetch_assoc();
echo $data2['a'];
?>
