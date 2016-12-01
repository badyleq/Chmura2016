<?php
require_once 'config.php';
session_start();
$id_wyk = $_SESSION['id_wyk'];


    if($_POST['act'] == 'rate'){
    	//search if the user(ip) has already gave a note
    	$ip = $_SERVER["REMOTE_ADDR"];
    	$therate = $_POST['rate'];
    	$thepost = $_POST['post_id'];
	}
	$id_wykladu = $id_wyk;
	$student = mysql_fetch_array(mysql_query("SELECT * FROM wcd_rate WHERE `ip`='$ip' AND `id_wykladu` = '$id_wykladu' LIMIT 1"));
	if (isset($student[id_wykladu]) AND (isset($student[ip]))) 
	{
		
	mysql_query("UPDATE wcd_rate SET rate= '$therate' WHERE ip = '$ip'");
	}
	else{

       		$id_wykladu = $id_wyk;
		mysql_query("INSERT INTO `wcd_rate` (`id_post`, `ip`, `rate`, `id_wykladu`)VALUES('$thepost', '$ip', '$therate', '$id_wykladu')");
     	     }

?>
