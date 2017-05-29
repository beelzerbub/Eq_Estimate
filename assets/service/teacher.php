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
	delete_teacher($_GET["id"], $_GET["year"], $_GET["term"]);
} else if ($_POST["AddTeacherBtn"]) {
	$teacher_id = $_POST["InputTeacher"];
	$class_id	= $_POST["InputClassroom"];
	$year_reg 	= $_POST["year_reg"];
	$term_reg 	= $_POST["term_reg"];
	insert_teacher($teacher_id, $class_id, $year_reg, $term_reg);
} else if ($_POST["updateBtn"]) {
	$teacher_id = $_POST["teacher_id"];
	$user_id 	= $_POST["user_id"];
	$class_id	= $_POST["InputClassroom"];
	$year 		= $_POST["year_reg"];
	$term 		= $_POST["term_reg"];
	update_teacher($teacher_id, $user_id, $class_id, $year, $term);
}


////------------------------------------------------- 
////------------ Function Teacher ---------------------
////-----------------------------------------------//
function get_teacher_room($t_id, $year, $term) {
	$teacher = "SELECT * FROM classroom c 
	JOIN work_time wt 
	JOIN teacher t 
	WHERE t.t_id = wt.t_id 
	AND c.class_id = wt.class_id 
	AND wt.wt_year = $year 
	AND wt.wt_term = $term 
	AND t.t_id = $t_id";
	$teacher_query = mysql_query($teacher)or die(mysql_error());
	$teacher_query_fetch = mysql_fetch_object($teacher_query)or die(mysql_error());
	if ($teacher_query_fetch->class_grade == 'ไม่ระบุ') {
		return "ไม่ได้รับหน้าที่ครูประจำชั้น";
	} else {
		return $teacher_query_fetch->class_grade.'/'.$teacher_query_fetch->class_number;
	}
}

function insert_teacher($teacher_id, $class_id, $year_reg, $term_reg) {
	$teacher = "SELECT * FROM user WHERE user_id = $teacher_id";
	$teacher_query = mysql_query($teacher)or die(mysql_error());
	$teacher_fetch = mysql_fetch_object($teacher_query)or die(mysql_error());

	$classroom = "SELECT * FROM classroom WHERE class_id = $class_id";
	$classroom_query = mysql_query($classroom)or die(mysql_error());
	$classroom_fetch = mysql_fetch_object($classroom_query)or die(mysql_error());

	$check_teacher = "SELECT * FROM teacher WHERE t_name = '$teacher_fetch->user_name' AND t_surname = '$teacher_fetch->user_surname'";
	$check_teacher_query = mysql_query($check_teacher)or die(mysql_error());

	if (mysql_num_rows($check_teacher_query) == 0) {
		$insert_teacher = "INSERT INTO teacher VALUES('', '$teacher_fetch->user_name', '$teacher_fetch->user_surname', 0, $teacher_id)";
		mysql_query($insert_teacher)or die(mysql_error());
		$t_id = mysql_insert_id();
	} else {
		$check_teacher_fetch = mysql_fetch_object($check_teacher_query)or die(mysql_error());
		$t_id = $check_teacher_fetch->t_id;
	}

	$check_work = "SELECT * FROM work_time WHERE t_id = $t_id AND wt_year = $year_reg AND wt_term = $term_reg";
	$check_work_query = mysql_query($check_work)or die(mysql_error());
	if (mysql_num_rows($check_work_query) == 0) {
		$insert_worktime = "INSERT INTO work_time VALUES('', $year_reg, $term_reg, $t_id, $class_id)";
		$insert_worktime_query = mysql_query($insert_worktime)or die(mysql_error());
		header("location:../../teacher.php?action=insert_success");
	} else {
		$check_work_fetch = mysql_fetch_object($check_work_query);
		header("location:../../teacher.php?action=insert_teacher_dupplicate&old=".$check_work_fetch->wt_id);
	}
}

function update_teacher($teacher_id, $user_id, $class_id, $year, $term) {
	$update_worktime = "UPDATE work_time SET wt_year = $year, wt_term = $term, class_id = $class_id WHERE t_id = $teacher_id";
	$update_worktime_query = mysql_query($update_worktime)or die(mysql_error());
	header("location:../../teacher.php?action=update_success");
}

function delete_teacher($id, $year, $term) {
	$teacher = "SELECT * FROM assessor ass JOIN teacher t 
	WHERE t.t_id = $id
	AND t.t_name = ass.As_name
	AND t.t_surname = ass.As_surname
	AND ass.As_type = 'ครูประจำชั้น'";
	$teacher_query = mysql_query($teacher)or die(mysql_error());
	if (mysql_num_rows($teacher_query) > 0) {
		$teacher_update = "UPDATE teacher SET t_status = -1 WHERE t_id = $id";
		mysql_query($teacher_update)or die(mysql_error());
		header("location:../../teacher.php?action=teacher_detele_warning");
	} else {
		$check = "SELECT * FROM work_time wt JOIN teacher
		WHERE teacher.t_id = $id
		AND wt.t_id = teacher.t_id";
		$check_query = mysql_query($check)or die(mysql_error());
		if (mysql_num_rows($check_query) == 1) {
			$delete_teacher = "DELETE FROM teacher WHERE t_id = $id";
			$delete_teacher_query = mysql_query($delete_teacher)or die(mysql_error());

			$delete_worktime = "DELETE FROM work_time WHERE t_id = $id";
			$delete_worktime_query = mysql_query($delete_worktime)or die(mysql_error());
			header("location:../../teacher.php?action=delete_success");
		} else {
			$delete_worktime = "DELETE FROM work_time WHERE t_id = $id AND wt_year = $year AND wt_yerm = $term";
			$delete_worktime_query = mysql_query($delete_worktime)or die(mysql_error());
			header("location:../../teacher.php?action=delete_success");
		}
	}
}

?>