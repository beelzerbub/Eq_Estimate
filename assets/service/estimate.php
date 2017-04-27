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
function get_estimate($std_no, $term, $year, $as_type) {
	$estimate = "SELECT * FROM student std
	JOIN estimate_score es
	JOIN estimate_time et
	JOIN assessor asses
	WHERE std.Std_no = $std_no
	AND et.Es_year = $year
	AND et.Es_term = $term
	AND et.Std_no = $std_no
	AND et.As_id = asses.As_id
	AND et.Es_id = es.Es_id";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	return $estimate_query;
}

function preinsert($as_type, $std_no, $term, $term_year) {
	$as_id = preinsert_assessor($as_type);
	$et_id = preinsert_estimate_time($term_year, $term, $std_no, $as_id);
	$es_id = preinsert_estimate_score($et_id);
}

function preinsert_assessor($as_type) {
	$insert_assessor = "INSERT INTO assessor VALUES('', '', '', '$as_type', '')";
	$insert_assessor_query = mysql_query($insert_assessor)or die(mysql_error());
	return mysql_insert_id();
}

function preinsert_estimate_time($year, $term, $std_no, $as_id) {
	$insert_et = "INSERT INTO estimate_time VALUES('',$year,$term,$std_no,$as_id)";
	$insert_et_query = mysql_query($insert_et)or die(mysql_error());
	return mysql_insert_id();
}

function preinsert_estimate_score($es_id) {
	$pre_group1 = "INSERT INTO estimate_score VALUES('',0,1,$es_id)";
	$group_query1 = mysql_query($pre_group1)or die(mysql_error());
	$pre_group2 = "INSERT INTO estimate_score VALUES('',0,2,$es_id)";
	$group_query2 = mysql_query($pre_group2)or die(mysql_error());
	$pre_group3 = "INSERT INTO estimate_score VALUES('',0,3,$es_id)";
	$group_query3 = mysql_query($pre_group3)or die(mysql_error());
	$pre_group4 = "INSERT INTO estimate_score VALUES('',0,4,$es_id)";
	$group_query4 = mysql_query($pre_group4)or die(mysql_error());
	$pre_group5 = "INSERT INTO estimate_score VALUES('',0,5,$es_id)";
	$group_query5 = mysql_query($pre_group5)or die(mysql_error());
	$pre_group6 = "INSERT INTO estimate_score VALUES('',0,6,$es_id)";
	$group_query6 = mysql_query($pre_group6)or die(mysql_error());
	$pre_group7 = "INSERT INTO estimate_score VALUES('',0,7,$es_id)";
	$group_query7 = mysql_query($pre_group7)or die(mysql_error());
	$pre_group8 = "INSERT INTO estimate_score VALUES('',0,8,$es_id)";
	$group_query8 = mysql_query($pre_group8)or die(mysql_error());
	$pre_group9 = "INSERT INTO estimate_score VALUES('',0,9,$es_id)";
	$group_query9 = mysql_query($pre_group9)or die(mysql_error());
}
?>