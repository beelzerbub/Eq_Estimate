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
	delete_teacher($_GET["id"]);
} else if ($_POST["AddTeacherBtn"]) {
	$name 		= $_POST["teacher_name"];
	$surname 	= $_POST["teacher_surname"];
	$grade 		= $_POST["classroom"];
	$classroom 	= $_POST["classroom_number"];
	$year_reg 	= $_POST["year_reg"];
	$term_reg 	= $_POST["term_reg"];
	insert_teacher($name, $surname, $grade, $classroom, $year_reg, $term_reg);
}


////------------------------------------------------- 
////------------ Function Teacher ---------------------
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
	if ($fetch->class_grade == 'none') {
		return "ไม่ได้รับหน้าที่ครูประจำชั้น";
	} else {
		return $fetch->class_grade.'/'.$fetch->class_number;
	}
}

function insert_teacher($name, $surname, $grade, $room, $year_reg, $term_reg) {
	//check classroom number
	$presql = "SELECT * FROM classroom WHERE class_grade = '$grade' AND class_number = $room";
	$prequery = mysql_query($presql)or die(mysql_error());
	if (mysql_num_rows($prequery) == 0 && $grade != 'none') {
		header("location:../../teacher.php?action=wrong_classroom");
	}

	//check duplicate insert data
	$presql2 = "SELECT * FROM teacher 
	WHERE t_name = '$name'
	AND t_surname = '$surname'"; // ถ้ามีครูคนนี้อยู่แล้ว
	$prequery2 = mysql_query($presql2)or die(mysql_error());
	if (mysql_num_rows($prequery2) == 0 ) {
		$sql1 = "INSERT INTO teacher VALUES('','$name','$surname',0)";
		mysql_query($sql1)or die(mysql_error());
	}

	$sql2 = "SELECT * FROM teacher WHERE t_name = '$name' AND t_surname = '$surname'";
	$query2 = mysql_query($sql2)or die(mysql_error());
	$teacher = mysql_fetch_object($query2);

	//ถ้าไม่ได้เป็นครูประจำชั้นให้ work_time มี class_id เป็น 0
	if ($grade == 'none') {
		$class_id = 0;
	} else {
		$classroom = mysql_fetch_object($prequery)or die(mysql_error());
		$class_id = $classroom->class_id;
	}

	$sql3 = "INSERT INTO work_time VALUES('', $year_reg, $term_reg, $teacher->t_id, $class_id)";
	$query3 = mysql_query($sql3)or die(mysql_error());
	header("location:../../teacher.php?action=insert_success");
}

function delete_teacher($id) {
	$find = "SELECT * FROM assessor ass JOIN teacher t 
	WHERE t.t_id = $id
	AND t.t_name = ass.As_name
	AND t.t_surname = ass.As_surname
	AND ass.As_type = 'ครูประจำชั้น'";
	$query = mysql_query($find)or die(mysql_error());
	if (mysql_num_rows($query) > 0) {
		$sql = "UPDATE teacher SET t_status = -1 WHERE t_id = $id";
		mysql_query($sql)or die(mysql_error());
		header("location:../../teacher.php?action=teacher_detele_warning");
	} else {
		$sql = "DELETE FROM teacher WHERE t_id = $id";
		mysql_query($sql)or die(mysql_error());
		$sql2 = "DELETE FROM work_time WHERE t_id = $id";
		mysql_query($sql2)or die(mysql_error());
		header("location:../../teacher.php?action=delete_success");
	}
}

?>