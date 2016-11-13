<?php
$conn = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');
$conn -> query ('SET NAMES utf8');
$conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
if($conn->connect_error){
	die("Connection error: " .$conn ->connect_error);
}
$result = $conn->query("Select temat, szczegoly_wykladu from lista_wykladow");
if($result->num_rows > 0){
	while($row = $result -> fetch_assoc()){
		echo '<div class="lecture" style="border:1px solid black;">'.$row['temat'].'</div>';
		// echo $row['nazwa'] . '<br>';
		// echo $row['szczegoly'] . '<br>';

	}
}
?>
