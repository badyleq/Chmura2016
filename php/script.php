<?php
include("config.php");
$result = $conn->query("Select id_wykladu, temat, data, godzina_start from lista_wykladow order by data ASC, godzina_start ASC");
$nerest = 0;
$tablica;
$index_tab = 0;
if($result->num_rows > 0){
	while($row = $result -> fetch_assoc()){
		 if($row['data']>date('Y-m-d')){

			if($nerest == 0) {
 				$resultLogo = $conn->query("select * from lista_logo where id_logo =
				(select lista_prowadzacych.id_logo from
				lista_prowadzacych join lista_wykladow on lista_prowadzacych.id_prowadzacego = lista_wykladow.id_prowadzacego
				where lista_wykladow.id_wykladu =" .$row['id_wykladu'].")");
				$logo = $resultLogo-> fetch_assoc();
				echo
				'<a href="lecture.php?id=' . $row['id_wykladu'] . '">
				<div class="lecture">
				<span class="headers">Temat: </span>
				'.$row['temat'].'
				<br/><span class="headers">Data: </span>
				'.$row['godzina_start'].' - '.$row['data'].'
				</div>
				</a>';
				// echo '<a href="lecture.php?id=' . $row['id_wykladu'] . '"> <img src="'.$logo['adres'].'"border="0" height="60" style="float: left"  ><div class="lecture" style="border:1px solid black;">'.$row['temat'].'<br/><br/></div></a>';
				//echo '<a href="lecture.php?id=' . $row['id_wykladu'] . '"> <img src="'.$logo['adres'].'"border="0" height="60" style="float: left"   class="lecture" style="border:1px solid black;">'.$row['temat'].'<br/></div></a>';
				//echo '<a href="lecture.php?id=' . $row['id_wykladu'] . '"> <img src="'.$logo['adres'].'"border="0" height="60" style="float: left"  ><div class="lecture" style="border:1px solid black;">'.$row['temat'].'<br/></div></a>';

				$nerest = 1;
			}else{
				echo
				'<a href="lecture.php?id=' . $row['id_wykladu'] . '">
				<div class="lecture">
				<span class="headers">Temat: </span>
				'.$row['temat'].'
				<br/><span class="headers">Data: </span>
				'.$row['godzina_start'].' - '.$row['data'].'
				</div>
				</a>';
			}

			//echo '<a href="lecture.php?id=' . $row['id_wykladu'] . '"> <div class="lecture" style="border:1px solid black;">'.$row['temat'].'<br/></div></a>';

		 }
		 else if($row['data']>=date('Y-m-d',(strtotime(date("Y-m-d")) - (60*60*24*7)))){  // sprawdza czy w ciągu ostatich 7 dni był jakiś wykład
			$tablica[$index_tab] =
			'<a href="lecture.php?id=' . $row['id_wykladu'] . '">
			<div class="lecture-past">
			<span class="headers">Temat: </span>
			'.$row['temat'].'
			<br/><span class="headers">Data: </span>
			'.$row['godzina_start'].' - '.$row['data'].'
			</div>
			</a>';
			$index_tab ++;
		 }
	 }
	echo "To już było:";
	foreach ($tablica as $value) {
    echo $value;
	}
}
?>
