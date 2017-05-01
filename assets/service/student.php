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
	delete_student($_GET["id"]);
} else if ($_POST["AddStdBtn"]) {
	$id 		= $_POST["std_id"];
	$name 		= $_POST["std_name"];
	$surname	= $_POST["std_surname"];
	$age		= $_POST["std_age"];
	$gender		= $_POST["std_gender"];
	$classroom	= $_POST["classroom"];
	$class_number		= $_POST["classroom_number"];
	$year_reg	= $_POST["year_reg"];
	$term_reg	= $_POST["term_reg"];
	insert_student($id, $name, $surname, $age, $gender, $classroom, $class_number, $year_reg, $term_reg);
} else if ($_POST["filterBtn"]) {
	$keyword = @$_POST["filter-keyword"];
	echo $keyword;
} else if ($_POST["updateBtn"]) {
	$id 		= $_POST["id"];
	$std_id 	= $_POST["std_id"];
	$name 		= $_POST["std_name"];
	$surname	= $_POST["std_surname"];
	$age		= $_POST["std_age"];
	$gender		= $_POST["std_gender"];
	$classroom	= $_POST["classroom"];
	$class_number	= $_POST["classroom_number"];
	$year_reg	= $_POST["year_reg"];
	$term_reg	= $_POST["term_reg"];
	update_student($id, $std_id, $name, $surname, $age, $gender, $classroom, $class_number, $year_reg, $term_reg);
}




////------------------------------------------------- 
////------------ Function Student -------------------
////-----------------------------------------------//
function get_student ($std_no, $year, $term) {
	$student = "SELECT * FROM student std
	JOIN classroom cls
	JOIN term
	WHERE std.Std_no = $std_no
	AND term.Std_no = std.Std_no
	AND term.Class_id = cls.Class_id
	AND term.term_year = $year
	AND term.term = $term";
	$student_query = mysql_query($student)or die(mysql_error());
	$student_fetch = mysql_fetch_object($student_query)or die(mysql_error());
	return $student_fetch;
}

function get_student_byPK($id) {
	$student = "SELECT * FROM student std 
	JOIN classroom c 
	JOIN term t
	WHERE std.Std_no = t.Std_no
	AND t.class_id = c.class_id
	AND std.Std_no = $id";
	$student_query = mysql_query($student)or die(mysql_error());
	return $student_query;
}

function insert_student($id, $name, $surname, $age, $gender, $classroom, $class_number, $year_reg, $term_reg) {
	if (check_classroom($classroom, $class_number)) {
		$classroom = "SELECT * FROM classroom WHERE class_grade = '$classroom'
		AND class_number = $class_number
		AND class_status = 1";
		$classroom_query = mysql_query($classroom)or die(mysql_error());
		$classroom_fetch = mysql_fetch_object($classroom_query)or die(mysql_error());
	}
	// ตรวจสอบว่ามีข้อมูลนักเรียนคนนี้รึยัง โดยใช้ อายุ เป็นตัวกำหนด ความแตกต่างในแต่ละปี
	if (check_student($id, $name, $surname, $age)) { 
		// ตรวจสอบว่าเทอมนี้มีข้อมูลนักเรียนคนนีร้ึยัง โดยใช้ เทอม และปี เป็นตัวกำหนด
		if (check_term($year_reg, $term_reg, $id)) { 
			header("location:../../student.php?action=student_duplicate");
		} 
	} else {
		$insert_std = "INSERT into student VALUES('', '$id', '$name', '$surname', $age, $gender)";
		$insert_std_query = mysql_query($insert_std)or die(mysql_error());
	}
	$student = "SELECT * FROM student WHERE Std_id = '$id'
	AND Std_name = '$name'
	AND Std_surname = '$surname'
	AND Std_age = $age";
	$student_query = mysql_query($student)or die(mysql_error());
	$student_fetch = mysql_fetch_object($student_query)or die(mysql_error());

	$insert_term = "INSERT INTO term VALUES('', $year_reg, $term_reg, $classroom_fetch->class_id, $student_fetch->Std_no)";
	$insert_term_query = mysql_query($insert_term)or die(mysql_error());
	header("location:../../student.php?action=insert_success");
}

function update_student($id, $std_id, $name, $surname, $age, $gender, $classroom, $class_number, $year, $term) {
	$update_student = "UPDATE student SET std_id = '$std_id', std_name = '$name', std_surname = '$surname', std_age = $age, std_gender = $gender WHERE std_no = $id";
	$update_student_query = mysql_query($update_student)or die(mysql_error());

	$classroom = "SELECT * FROM classroom WHERE class_grade = '$classroom' AND class_number = $class_number";
	$classroom_query = mysql_query($classroom)or die(mysql_error());
	$classroom_fetch = mysql_fetch_object($classroom_query)or die(mysql_error());

	$update_term = "UPDATE term SET Term_year = $year, Term = $term, Class_id = $classroom_fetch->class_id WHERE Std_no = $id";
	$update_term_query = mysql_query($update_term)or die(mysql_error());
	header("location:../../student.php?action=update_success");
}

function delete_student($Std_no) {
	$estimate = "SELECT * FROM estimate_time et JOIN estimate_score es JOIN student s 
	WHERE s.Std_no = et.Std_no
	AND es.Es_id = et.Es_id
	AND s.Std_no = $Std_no";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	if (mysql_num_rows($estimate_query) > 0) {
		//อย่าลืมลบข้อมูลผลการประเมิน
	} 
	$delete_student = "DELETE FROM student WHERE Std_no = $Std_no";
	$delete_student_query = mysql_query($delete_student)or die(mysql_error());
	header("location:../../student.php?action=delete_success");
}

function check_student($id, $name, $surname, $age) {
	$student = "SELECT * FROM student WHERE Std_id = '$id'
	AND Std_name = '$name'
	AND Std_surname = '$surname'
	AND Std_age = $age";
	echo $student;
	$student_query = mysql_query($student)or die(mysql_error());

	if (mysql_num_rows($student_query) == 0) {
		return false;
	} else {
		return true;
	}
}

function check_term ($year_reg, $term_reg, $std_id) {
	$check = "SELECT * FROM term JOIN student 
	WHERE student.Std_id = $std_id
	AND term.Term_year = $year_reg
	AND term.Term = $term_reg
	AND student.Std_no = term.Std_no";
	$query = mysql_query($check)or die(mysql_error());

	if (mysql_num_rows($query) == 0) {
		return false;
	} else {
		return true;
	}
}

function check_classroom ($classroom, $class_number) {
	$check = "SELECT * FROM classroom WHERE class_grade = '$classroom' AND class_number = $class_number";
	$query = mysql_query($check)or die(mysql_error());
	if (mysql_num_rows($query) == 0) {
		header("location:../../student.php?action=wrong_classroom");
	} else {
		return true;
	}
}
?>