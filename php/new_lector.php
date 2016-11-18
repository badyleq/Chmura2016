<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = new mysqli('sql.s24.vdl.pl', 'bleizer_rafal', '7uDntXzn', 'bleizer_rafal');

mysqli_query($link, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$lector_name = mysqli_real_escape_string($link, $_POST['lector_name']);
$lector_lastname = mysqli_real_escape_string($link, $_POST['lector_lastname']);
$lector_company = mysqli_real_escape_string($link, $_POST['lector_company']);
$lector_details = mysqli_real_escape_string($link, $_POST['lector_details']);

// attempt insert query execution
$sql = "INSERT INTO lista_prowadzacych (imie_prowadzacego, nazwisko_prowadzacego, nazwa_firmy, szczegoly_prowadzacego) VALUES ('$lector_name', '$lector_lastname', '$lector_company', '$lector_details')";
if(mysqli_query($link, $sql)){
  echo
  '<script>  window.location = "'.$SITE_URL.'../inventory_list.php" </script>';
  // alert("Dodano wykład!");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
