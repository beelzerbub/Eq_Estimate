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
	AND et.Es_year = $year
	AND et.Es_term = $term
	AND et.As_id = asses.As_id
	AND es.Es_id = et.Es_id
	AND es.Sg_id = sg.Sg_id";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	return $estimate_query;
}

function preinsert($as_type, $Std_no, $Term, $Term_year) {
	preinsert_assessor($as_type);
}

function preinsert_assessor($as_type) {
	$insert_assessor = "INSERT INTO assessor VALUES('', '', '', '$as_type', '')";
	$insert_assessor_query = mysql_query($insert_assessor)or die(mysql_error());
}
?>