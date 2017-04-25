<?php
////------------------------------------------------- 
////---------------- Connect ------------------------
////-----------------------------------------------//
session_start();
$host = "localhost";
$user = "root";
$pass = "rootroot";
$db = "eq_estimate";
$link = mysql_connect($host,$user,$pass);
mysql_query("SET NAMES UTF8");
if(!$link)
{
	echo "can't connect";
}
mysql_select_db($db) or die ("Can't connnect Database");
$year = date('Y') + 543;





////------------------------------------------------- 
////-------------- Include --------------------------
////-----------------------------------------------//





////------------------------------------------------- 
////-------------- Recive Data ----------------------
////-----------------------------------------------//





////------------------------------------------------- 
////-------------- Call Function --------------------
////-----------------------------------------------//





////------------------------------------------------- 
////------------ Function Name ----------------------
////-----------------------------------------------//
function get_estimate($Std_no, $term, $year) {
	$estimate = "SELECT * FROM student std
	JOIN estimate_score es 
	JOIN estimate_time et 
	JOIN score_group sg
	JOIN assessor asses
	WHERE std.Std_no = $Std_no
	AND et.";
	echo $estimate;
}
?>