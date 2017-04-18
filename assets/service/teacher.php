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
if ($_GET["action"] == "delete") {

} else if ($_POST["AddTeacherBtn"]) {
	$name = $_POST["teacher_name"];
	$surname = $_POST["teacher_surname"];
	$grade = $_POST["classroom"];
	$classroom = $_POST["classroom_number"];
	insert_teacher($name, $surname, $grade, $classroom);
}


////------------------------------------------------- 
////------------ Function Login ---------------------
////-----------------------------------------------//
function get_teacher_room_init($t_id, $year) {
	if (date(m) <= 4 || date(m) >= 11) {
		$year = $year - 1;
		$term = 2;
	} else if (date(m) >= 5 || date(m) <= 10) {
		$term = 1;
	}
	$sql = "SELECT * FROM classroom c 
	JOIN work_time wt 
	JOIN teacher t 
	WHERE t.t_id = wt.t_id 
	AND c.class_id = wt.class_id 
	AND wt.wt_year = $year 
	AND wt.wt_term = $term 
	AND t.t_id = $t_id";

	$query = mysql_query($sql)or die(mysql_error());
	$fetch = mysql_fetch_object($query)or die(mysql_error());
	return $fetch->class_grade.'/'.$fetch->class_number;
}

function insert_teacher($name, $surname, $grade, $room) {
	$sql = "INSERT INTO teacher('','$name','$surname',0)";
	$query = mysql_query($sql)or die(mysql_error());

	$sql2 = "SELECT * FROM classroom WHERE class_grade = '$grade' AND class_number = $room";
	$query2 = mysql_query($sql2)or die(mysql_error());
	$fetch2 = mysql_fetch_object($query2)or die(mysql_error());


	echo $sql3;
}

?>