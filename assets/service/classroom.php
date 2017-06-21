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
if ($_POST["AddClassBtn"]) {
	$grade = $_POST['class_grade'];
	$number = $_POST['class_number'];
	if (check_classroom_duplicate($grade, $number)) {
		header("location:../../classroom.php?action=insert_class_warning");
	} else {
		insert_classroom($grade, $number);
		header("location:../../classroom.php?action=insert_class_success");
	}
} else if ($_GET['action'] == 'delete') {
	delete_classroom($_GET['id']);
}




////------------------------------------------------- 
////---------- Function assessor --------------------
////-----------------------------------------------//
function insert_classroom ($grade, $number) {
	$classroom = "INSERT INTO classroom VALUES('', '$grade', $number, 1)";
	$classroom_query = mysql_query($classroom)or die(mysql_error());

}

function check_classroom_duplicate($grade, $number) {
	$duplicate = "SELECT * FROM classroom WHERE class_grade = '$grade' AND class_number = $number";
	$duplicate_query = mysql_query($duplicate)or die(mysql_error());
	$result = mysql_num_rows($duplicate_query);
	return $result;
}

function delete_classroom($id) {
	$check_estimate = "SELECT * FROM student s JOIN estimate_time et JOIN classroom cls JOIN term t
	WHERE s.Std_no = et.Std_no
	AND t.Std_no = s.Std_no
	AND t.Class_id = cls.class_id
	AND cls.class_id = $id";
	$check_estimate_query = mysql_query($check_estimate)or die(mysql_error());
	if (mysql_num_rows($check_estimate_query) > 0) {
		$update_classroom = "UPDATE classroom SET class_status = -99 WHERE class_id = $id";
		$update_classroom_query = mysql_query($update_classroom)or die(mysql_error());
		header("location:../../classroom.php?action=delete_class_warning");
	} else {
		$delete_classroom = "DELETE FROM classroom WHERE class_id = $id";
		$delete_classroom_query = mysql_query($delete_classroom)or die(mysql_error());
		header("location:../../classroom.php?action=delete_success");
	}
}
?>