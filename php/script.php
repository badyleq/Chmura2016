<?php
$conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
$conn -> query ('SET NAMES utf8');
$conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
if($conn->connect_error){
	die("Connection error: " .$conn ->connect_error);
}
$result = $conn->query("Select id_wykladu, temat, data, godzina_start from lista_wykladow order by data DESC, godzina_start DESC");
if($result->num_rows > 0){
	while($row = $result -> fetch_assoc()){
		 if($row['data']>date('Y-m-d')){
			 echo '<a href="lecture.php?id=' . $row['id_wykladu'] . '"> <div class="lecture" style="border:1px solid black;">'.$row['temat'].'<br/></div></a>';
		 }
		 else if($row['data']==date('Y-m-d')&&$row['godzina_start']>date('H:i:s')){
			 echo '<a href="lecture.php?id=' . $row['id_wykladu'] . '"> <div class="lecture" style="border:1px solid black;">'.$row['temat'].'<br/></div></a>';
		 }
	 }
}
?>
