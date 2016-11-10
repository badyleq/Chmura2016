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
$id_wyk = mysqli_real_escape_string($link, $_POST['id_wyk']);
$id_prow = mysqli_real_escape_string($link, $_POST['id_prow']);
$title = mysqli_real_escape_string($link, $_POST['title']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$time = mysqli_real_escape_string($link, $_POST['time']);
$details = mysqli_real_escape_string($link, $_POST['details']);

// attempt insert query execution
$sql = "INSERT INTO lista_wykladow (id_prowadzacego, temat, data, godzina_start, szczegoly_wykladu) VALUES (1, '$title', '$date', '$time', '$details')";
if(mysqli_query($link, $sql)){
  echo
  '<script>  window.location = "'.$SITE_URL.'../index.php" </script>';
  // alert("Dodano wykład!");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
