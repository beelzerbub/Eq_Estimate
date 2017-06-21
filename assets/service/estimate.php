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
if ($_POST["SaveBtn1"]) {
	$choice_1 = $_POST['choice_1'];
	$choice_2 = $_POST['choice_2'];
	$choice_3 = $_POST['choice_3'];
	$choice_4 = $_POST['choice_4'];
	$choice_5 = $_POST['choice_5'];
	$choice_6 = $_POST['choice_6'];
	$choice_7 = $_POST['choice_7'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	//check_assessor($es_id, $as_type, $year, $term, $std_no);
	update_estimate_score($es_id, 1);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=1");
} else if ($_POST["SaveBtn2"]) {
	$choice_8 = $_POST['choice_8'];
	$choice_9 = $_POST['choice_9'];
	$choice_10 = $_POST['choice_10'];
	$choice_11 = $_POST['choice_11'];
	$choice_12 = $_POST['choice_12'];
	$choice_13 = $_POST['choice_13'];
	$choice_14 = $_POST['choice_14'];
	$choice_15 = $_POST['choice_15'];
	$choice_16 = $_POST['choice_16'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	update_estimate_score($es_id, 2);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=2");
} else if ($_POST["SaveBtn3"]) {
	$choice_17 = $_POST['choice_17'];
	$choice_18 = $_POST['choice_18'];
	$choice_19 = $_POST['choice_19'];
	$choice_20 = $_POST['choice_20'];
	$choice_21 = $_POST['choice_21'];
	$choice_22 = $_POST['choice_22'];
	$choice_23 = $_POST['choice_23'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	update_estimate_score($es_id, 3);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=3");
} else if ($_POST["SaveBtn4"]) {
	$choice_24 = $_POST['choice_24'];
	$choice_25 = $_POST['choice_25'];
	$choice_26 = $_POST['choice_26'];
	$choice_27 = $_POST['choice_27'];
	$choice_28 = $_POST['choice_28'];
	$choice_29 = $_POST['choice_29'];
	$choice_30 = $_POST['choice_30'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	update_estimate_score($es_id, 4);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=4");
} else if ($_POST["SaveBtn5"]) {
	$choice_31 = $_POST['choice_31'];
	$choice_32 = $_POST['choice_32'];
	$choice_33 = $_POST['choice_33'];
	$choice_34 = $_POST['choice_34'];
	$choice_35 = $_POST['choice_35'];
	$choice_36 = $_POST['choice_36'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	update_estimate_score($es_id, 5);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=5");
} else if ($_POST["SaveBtn6"]) {
	$choice_37 = $_POST['choice_37'];
	$choice_38 = $_POST['choice_38'];
	$choice_39 = $_POST['choice_39'];
	$choice_40 = $_POST['choice_40'];
	$choice_41 = $_POST['choice_41'];
	$choice_42 = $_POST['choice_42'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	update_estimate_score($es_id, 6);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=6");
} else if ($_POST["SaveBtn7"]) {
	$choice_43 = $_POST['choice_43'];
	$choice_44 = $_POST['choice_44'];
	$choice_45 = $_POST['choice_45'];
	$choice_46 = $_POST['choice_46'];
	$choice_47 = $_POST['choice_47'];
	$choice_48 = $_POST['choice_48'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	update_estimate_score($es_id, 7);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=7");
} else if ($_POST["SaveBtn8"]) {
	$choice_49 = $_POST['choice_49'];
	$choice_50 = $_POST['choice_50'];
	$choice_51 = $_POST['choice_51'];
	$choice_52 = $_POST['choice_52'];
	$choice_53 = $_POST['choice_53'];
	$choice_54 = $_POST['choice_54'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	update_estimate_score($es_id, 8);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=8");
} else if ($_POST["SaveBtn9"]) {
	$choice_55 = $_POST['choice_55'];
	$choice_56 = $_POST['choice_56'];
	$choice_57 = $_POST['choice_57'];
	$choice_58 = $_POST['choice_58'];
	$choice_59 = $_POST['choice_59'];
	$choice_60 = $_POST['choice_60'];
	$es_id = $_POST["es_id"];

	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];

	update_estimate_score($es_id, 9);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_success&part=9");
}




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
	AND et.Std_no = std.Std_no
	AND et.As_id = asses.As_id
	AND et.Es_id = es.Es_id
	AND asses.As_type = '$as_type'";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	return $estimate_query;
}

function get_estimate_assessor($std_no, $term, $year, $as_type) {
	$estimate = "SELECT * FROM student std
	JOIN estimate_score es
	JOIN estimate_time et
	JOIN assessor asses
	WHERE std.Std_no = $std_no
	AND et.Es_year = $year
	AND et.Es_term = $term
	AND et.Std_no = std.Std_no
	AND et.As_id = asses.As_id
	AND et.Es_id = es.Es_id
	AND asses.As_type = '$as_type'
	AND asses.As_name != ''
	AND asses.As_surname != ''";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	return mysql_num_rows($estimate_query);
}

function get_compare_estimate($std_no, $term, $year, $sg_id, $as_type) {
	$estimate = "SELECT * FROM student std
	JOIN estimate_score es
	JOIN estimate_time et
	JOIN assessor asses
	JOIN score_group sg
	WHERE std.Std_no = $std_no
	AND et.Es_year = $year
	AND et.Es_term = $term
	AND et.Std_no = std.Std_no
	AND et.As_id = asses.As_id
	AND et.Es_id = es.Es_id
	AND sg.Sg_id = es.Sg_id
	AND asses.As_type = '$as_type'
	AND sg.Sg_id = $sg_id";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	if (mysql_num_rows($estimate_query) > 0) {
		$estimate_fetch = mysql_fetch_object($estimate_query)or die(mysql_error());
		return $estimate_fetch->Es_score;
	} 
}

function get_average_estimate($std_no, $term, $year, $sg_id, $as_type) {
	$classroom = "SELECT * FROM student std
	JOIN term t
	JOIN classroom cls
	WHERE t.Std_no = std.Std_no
	AND t.Class_id = cls.Class_id
	AND t.Term_year = $year
	AND t.Term = $term
	AND std.Std_no = $std_no";
	$classroom_query = mysql_query($classroom)or die(mysql_error());
	$classroom_fetch = mysql_fetch_object($classroom_query);
	
	$estimate = "SELECT * FROM estimate_score es
	JOIN estimate_time et
	JOIN score_group sg
	JOIN student std
	JOIN assessor asses
	JOIN term t
	JOIN classroom cls
	WHERE es.Es_id = et.Es_id
	AND es.Sg_id = sg.Sg_id
	AND sg.Sg_id = $sg_id
	AND et.Es_year = $year
	AND et.Es_term = $term
	AND et.Std_no = std.Std_no
	AND et.As_id = asses.As_id
	AND asses.As_type = '$as_type'
	AND std.Std_no = t.Std_no
	AND t.class_id = cls.class_id
	AND cls.class_id = $classroom_fetch->class_id
	GROUP BY es.Ess_id";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	$total = mysql_num_rows($estimate_query)or die(mysql_error());
	while($estimate_fetch = mysql_fetch_array($estimate_query)) {
		$sum += $estimate_fetch[Es_score];
	}
	echo $sum/$total;
}

function get_average_t_score($std_no, $term, $year, $sg_id, $as_type) {
	$classroom = "SELECT * FROM student std
	JOIN term t
	JOIN classroom cls
	WHERE t.Std_no = std.Std_no
	AND t.Class_id = cls.Class_id
	AND t.Term_year = $year
	AND t.Term = $term
	AND std.Std_no = $std_no";
	$classroom_query = mysql_query($classroom)or die(mysql_error());
	$classroom_fetch = mysql_fetch_object($classroom_query);

	$estimate = "SELECT * FROM estimate_score es
	JOIN estimate_time et
	JOIN score_group sg
	JOIN student std
	JOIN assessor asses
	JOIN term t
	JOIN classroom cls
	WHERE es.Es_id = et.Es_id
	AND es.Sg_id = sg.Sg_id
	AND sg.Sg_id = $sg_id
	AND et.Es_year = $year
	AND et.Es_term = $term
	AND et.Std_no = std.Std_no
	AND et.As_id = asses.As_id
	AND asses.As_type = '$as_type'
	AND std.Std_no = t.Std_no
	AND t.class_id = cls.class_id
	AND cls.class_id = $classroom_fetch->class_id
	GROUP BY es.Ess_id";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	$total = mysql_num_rows($estimate_query)or die(mysql_error());
	while($estimate_fetch = mysql_fetch_array($estimate_query)) {
		$sum += T_Score($estimate_fetch[Es_score], $sg_id);
	}
	echo $sum/$total;
}

function check_estimate($es_id, $sg_id) {
	$estimate = "SELECT * FROM estimate_score es 
	WHERE es.Es_id = $es_id
	AND es.Sg_id = $sg_id";
	$estimate_query = mysql_query($estimate)or die(mysql_error());
	if (mysql_num_rows($estimate_query) > 0) {
		$estimate_fetch = mysql_fetch_object($estimate_query)or die(mysql_error());
		return $estimate_fetch->Es_score;
	} else {
		return 0;
	}
}

function preinsert($as_type, $std_no, $term, $term_year) {
	$as_id = preinsert_assessor($as_type);
	$et_id = preinsert_estimate_time($term_year, $term, $std_no, $as_id);
	$es_id = preinsert_estimate_score($et_id);
}

function preinsert_assessor($as_type) {
	$insert_assessor = "INSERT INTO assessor VALUES('', '', '', '$as_type')";
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

function update_estimate_score($es_id, $sg_id) {
	if ($sg_id == 1) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score1()." WHERE Es_id = ".$es_id." and Sg_id = 1";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	} else if ($sg_id == 2) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score2()." WHERE Es_id = ".$es_id." and Sg_id = 2";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	} else if ($sg_id == 3) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score3()." WHERE Es_id = ".$es_id." and Sg_id = 3";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	} else if ($sg_id == 4) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score4()." WHERE Es_id = ".$es_id." and Sg_id = 4";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	} else if ($sg_id == 5) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score5()." WHERE Es_id = ".$es_id." and Sg_id = 5";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	} else if ($sg_id == 6) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score6()." WHERE Es_id = ".$es_id." and Sg_id = 6";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	} else if ($sg_id == 7) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score7()." WHERE Es_id = ".$es_id." and Sg_id = 7";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	} else if ($sg_id == 8) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score8()." WHERE Es_id = ".$es_id." and Sg_id = 8";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	} else if ($sg_id == 9) {
		$update_score = "UPDATE estimate_score SET Es_score = ".Set_Score9()." WHERE Es_id = ".$es_id." and Sg_id = 9";
		$update_score_query = mysql_query($update_score)or die(mysql_error());
	}
}

function Set_Score1() {
	$sum_group1 = 0;
	for($i=1; $i<=7; $i++) {
		$sum_group1 = $sum_group1 + $GLOBALS['choice_'.$i];
	}
	return $sum_group1;
}

function Set_Score2() {
	$sum_group2 = 0;
	for($i=8; $i<=16; $i++) {
		$sum_group2 = $sum_group2 + $GLOBALS['choice_'.$i];
	}
	return $sum_group2;
}

function Set_Score3() {
	$sum_group3 = 0;
	for($i=17; $i<=23; $i++) {
		$sum_group3 = $sum_group3 + $GLOBALS['choice_'.$i];
	}
	return $sum_group3;
}

function Set_Score4() {
	$sum_group4 = 0;
	for($i=24; $i<=30; $i++) {
		$sum_group4 = $sum_group4 + $GLOBALS['choice_'.$i];
	}
	return $sum_group4;
}

function Set_Score5() {
	$sum_group5 = 0;
	for($i=31; $i<=36; $i++) {
		$sum_group5 = $sum_group5 + $GLOBALS['choice_'.$i];
	}
	return $sum_group5;
}

function Set_Score6() {
	$sum_group6 = 0;
	for($i=37; $i<=42; $i++) {
		$sum_group6 = $sum_group6 + $GLOBALS['choice_'.$i];
	}
	return $sum_group6;
}

function Set_Score7() {
	$sum_group7 = 0;
	for($i=43; $i<=48; $i++) {
		$sum_group7 = $sum_group7 + $GLOBALS['choice_'.$i];
	}
	return $sum_group7;
}

function Set_Score8() {
	$sum_group8 = 0;
	for($i=49; $i<=54; $i++) {
		$sum_group8 = $sum_group8 + $GLOBALS['choice_'.$i];
	}
	return $sum_group8;
}

function Set_Score9() {
	$sum_group9 = 0;
	for($i=55; $i<=60; $i++) {
		$sum_group9 = $sum_group9 + $GLOBALS['choice_'.$i];
	}
	return $sum_group9;
}

function get_group() {
	$groups = "SELECT * FROM score_group";
	$groups_query = mysql_query($groups)or die(mysql_error());
	return $groups_query;
}

function T_Score ($score, $group) {
	if ($score == 6) {
		if ($group == 5) {
			return 22;
		} else if ($group == 6) {
			return 11;
		} else if ($group == 7) {
			return 11;
		} else if ($group == 8) {
			return 7;
		} else if ($group == 9) {
			return 9;
		} else {
			return false;
		}
	} else if ($score == 7) {
		if ($group == 1) {
			return 10;
		} else if ($group == 3) {
			return 13;
		} else if ($group == 4) {
			return 13;
		} else if ($group == 5) {
			return 25;
		} else if ($group == 6) {
			return 14;
		} else if ($group == 7) {
			return 14;
		} else if ($group == 8) {
			return 10;
		} else if ($group == 9) {
			return 12;
		} else {
			return false;
		}
	} else if ($score == 8) {
		if ($group == 1) {
			return 13;
		} else if ($group == 3) {
			return 15;
		} else if ($group == 4) {
			return 16;
		} else if ($group == 5) {
			return 27;
		} else if ($group == 6) {
			return 17;
		} else if ($group == 7) {
			return 17;
		} else if ($group == 8) {
			return 14;
		} else if ($group == 9) {
			return 15;
		} else {
			return false;
		}
	} else if ($score == 9) {
		if ($group == 1) {
			return 16;
		} else if ($group == 2) {
			return 15;
		} else if ($group == 3) {
			return 18;
		} else if ($group == 4) {
			return 18;
		} else if ($group == 5) {
			return 30;
		} else if ($group == 6) {
			return 20;
		} else if ($group == 7) {
			return 20;
		} else if ($group == 8) {
			return 17;
		} else if ($group == 9) {
			return 18;
		} else {
			return false;
		}
	} else if ($score == 10) {
		if ($group == 1) {
			return 19;
		} else if ($group == 2) {
			return 17;
		} else if ($group == 3) {
			return 20;
		} else if ($group == 4) {
			return 20;
		} else if ($group == 5) {
			return 33;
		} else if ($group == 6) {
			return 23;
		} else if ($group == 7) {
			return 23;
		} else if ($group == 8) {
			return 20;
		} else if ($group == 9) {
			return 21;
		} else {
			return false;
		}
	} else if ($score == 11) {
		if ($group == 1) {
			return 22;
		} else if ($group == 2) {
			return 19;
		} else if ($group == 3) {
			return 23;
		} else if ($group == 4) {
			return 23;
		} else if ($group == 5) {
			return 35;
		} else if ($group == 6) {
			return 26;
		} else if ($group == 7) {
			return 26;
		} else if ($group == 8) {
			return 23;
		} else if ($group == 9) {
			return 24;
		} else {
			return false;
		}
	} else if ($score == 12) {
		if ($group == 1) {
			return 25;
		} else if ($group == 2) {
			return 21;
		} else if ($group == 3) {
			return 25;
		} else if ($group == 4) {
			return 25;
		} else if ($group == 5) {
			return 38;
		} else if ($group == 6) {
			return 29;
		} else if ($group == 7) {
			return 29;
		} else if ($group == 8) {
			return 27;
		} else if ($group == 9) {
			return 26;
		} else {
			return false;
		}
	} else if ($score == 13) {
		if ($group == 1) {
			return 28;
		} else if ($group == 2) {
			return 22;
		} else if ($group == 3) {
			return 28;
		} else if ($group == 4) {
			return 27;
		} else if ($group == 5) {
			return 41;
		} else if ($group == 6) {
			return 32;
		} else if ($group == 7) {
			return 32;
		} else if ($group == 8) {
			return 30;
		} else if ($group == 9) {
			return 29;
		} else {
			return false;
		}
	} else if ($score == 14) {
		if ($group == 1) {
			return 31;
		} else if ($group == 2) {
			return 24;
		} else if ($group == 3) {
			return 30;
		} else if ($group == 4) {
			return 30;
		} else if ($group == 5) {
			return 43;
		} else if ($group == 6) {
			return 35;
		} else if ($group == 7) {
			return 35;
		} else if ($group == 8) {
			return 33;
		} else if ($group == 9) {
			return 32;
		} else {
			return false;
		}
	} else if ($score == 15) {
		if ($group == 1) {
			return 34;
		} else if ($group == 2) {
			return 26;
		} else if ($group == 3) {
			return 33;
		} else if ($group == 4) {
			return 32;
		} else if ($group == 5) {
			return 46;
		} else if ($group == 6) {
			return 38;
		} else if ($group == 7) {
			return 38;
		} else if ($group == 8) {
			return 36;
		} else if ($group == 9) {
			return 35;
		} else {
			return false;
		}
	} else if ($score == 16) {
		if ($group == 1) {
			return 37;
		} else if ($group == 2) {
			return 28;
		} else if ($group == 3) {
			return 35;
		} else if ($group == 4) {
			return 34;
		} else if ($group == 5) {
			return 49;
		} else if ($group == 6) {
			return 41;
		} else if ($group == 7) {
			return 41;
		} else if ($group == 8) {
			return 40;
		} else if ($group == 9) {
			return 38;
		} else {
			return false;
		}
	} else if ($score == 17) {
		if ($group == 1) {
			return 40;
		} else if ($group == 2) {
			return 30;
		} else if ($group == 3) {
			return 38;
		} else if ($group == 4) {
			return 37;
		} else if ($group == 5) {
			return 51;
		} else if ($group == 6) {
			return 44;
		} else if ($group == 7) {
			return 44;
		} else if ($group == 8) {
			return 43;
		} else if ($group == 9) {
			return 41;
		} else {
			return false;
		}
	} else if ($score == 18) {
		if ($group == 1) {
			return 43;
		} else if ($group == 2) {
			return 32;
		} else if ($group == 3) {
			return 40;
		} else if ($group == 4) {
			return 39;
		} else if ($group == 5) {
			return 54;
		} else if ($group == 6) {
			return 47;
		} else if ($group == 7) {
			return 48;
		} else if ($group == 8) {
			return 46;
		} else if ($group == 9) {
			return 43;
		} else {
			return false;
		}
	} else if ($score == 19) {
		if ($group == 1) {
			return 46;
		} else if ($group == 2) {
			return 34;
		} else if ($group == 3) {
			return 43;
		} else if ($group == 4) {
			return 41;
		} else if ($group == 5) {
			return 57;
		} else if ($group == 6) {
			return 50;
		} else if ($group == 7) {
			return 51;
		} else if ($group == 8) {
			return 49;
		} else if ($group == 9) {
			return 46;
		} else {
			return false;
		}
	} else if ($score == 20) {
		if ($group == 1) {
			return 48;
		} else if ($group == 2) {
			return 36;
		} else if ($group == 3) {
			return 45;
		} else if ($group == 4) {
			return 44;
		} else if ($group == 5) {
			return 59;
		} else if ($group == 6) {
			return 53;
		} else if ($group == 7) {
			return 54;
		} else if ($group == 8) {
			return 53;
		} else if ($group == 9) {
			return 49;
		} else {
			return false;
		}
	} else if ($score == 21) {
		if ($group == 1) {
			return 51;
		} else if ($group == 2) {
			return 38;
		} else if ($group == 3) {
			return 48;
		} else if ($group == 4) {
			return 46;
		} else if ($group == 5) {
			return 62;
		} else if ($group == 6) {
			return 56;
		} else if ($group == 7) {
			return 57;
		} else if ($group == 8) {
			return 56;
		} else if ($group == 9) {
			return 52;
		} else {
			return false;
		}
	} else if ($score == 22) {
		if ($group == 1) {
			return 54;
		} else if ($group == 2) {
			return 40;
		} else if ($group == 3) {
			return 50;
		} else if ($group == 4) {
			return 48;
		} else if ($group == 5) {
			return 64;
		} else if ($group == 6) {
			return 59;
		} else if ($group == 7) {
			return 60;
		} else if ($group == 8) {
			return 59;
		} else if ($group == 9) {
			return 55;
		} else {
			return false;
		}
	} else if ($score == 23) {
		if ($group == 1) {
			return 57;
		} else if ($group == 2) {
			return 42;
		} else if ($group == 3) {
			return 53;
		} else if ($group == 4) {
			return 51;
		} else if ($group == 5) {
			return 67;
		} else if ($group == 6) {
			return 62;
		} else if ($group == 7) {
			return 63;
		} else if ($group == 8) {
			return 63;
		} else if ($group == 9) {
			return 58;
		} else {
			return false;
		}
	} else if ($score == 24) {
		if ($group == 1) {
			return 60;
		} else if ($group == 2) {
			return 44;
		} else if ($group == 3) {
			return 55;
		} else if ($group == 4) {
			return 53;
		} else if ($group == 5) {
			return 70;
		} else if ($group == 6) {
			return 65;
		} else if ($group == 7) {
			return 66;
		} else if ($group == 8) {
			return 66;
		} else if ($group == 9) {
			return 60;
		} else {
			return false;
		}
	} else if ($score == 25) {
		if ($group == 1) {
			return 60;
		} else if ($group == 2) {
			return 45;
		} else if ($group == 3) {
			return 58;
		} else if ($group == 4) {
			return 55;
		} else {
			return false;
		}
	} else if ($score == 26) {
		if ($group == 1) {
			return 66;
		} else if ($group == 2) {
			return 47;
		} else if ($group == 3) {
			return 60;
		} else if ($group == 4) {
			return 58;
		} else {
			return false;
		}
	} else if ($score == 27) {
		if ($group == 1) {
			return 69;
		} else if ($group == 2) {
			return 49;
		} else if ($group == 3) {
			return 63;
		} else if ($group == 4) {
			return 60;
		} else {
			return false;
		}
	} else if ($score == 28) {
		if ($group == 1) {
			return 72;
		} else if ($group == 2) {
			return 51;
		} else if ($group == 3) {
			return 65;
		} else if ($group == 4) {
			return 62;
		} else {
			return false;
		}
	} else if ($score == 29) {
		if ($group == 2) {
			return 53;
		} else {
			return false;
		}
	} else if ($score == 30) {
		if ($group == 2) {
			return 55;
		} else {
			return false;
		}
	} else if ($score == 31) {
		if ($group == 2) {
			return 57;
		} else {
			return false;
		}
	} else if ($score == 32) {
		if ($group == 2) {
			return 59;
		} else {
			return false;
		}
	} else if ($score == 33) {
		if ($group == 2) {
			return 61;
		} else {
			return false;
		}
	} else if ($score == 34) {
		if ($group == 2) {
			return 63;
		} else {
			return false;
		}
	} else if ($score == 35) {
		if ($group == 2) {
			return 65;
		} else {
			return false;
		}
	} else if ($score == 36) {
		if ($group == 2) {
			return 67;
		} else {
			return false;
		}
	} else {
		return 0;
	}
}

function calculate_compare($teacher_es_id, $parent_es_id) {
	$i = 0;
	$teacher = "SELECT * FROM estimate_score WHERE Es_id = $teacher_es_id";
	$teacher_query = mysql_query($teacher)or die(mysql_error());
	while($result = mysql_fetch_array($teacher_query)) {
		$teacher_score[$i] = $result[Es_score];
		$i++;
	}

	$i = 0;
	$parent = "SELECT * FROM estimate_score WHERE Es_id = $parent_es_id";
	$parent_query = mysql_query($parent)or die(mysql_error());
	while($result = mysql_fetch_array($parent_query)) {
		$parent_score[$i] = $result[Es_score];
		$i++;
	}


	for ($l = 0; $l < 9; $l++) {
		if ($teacher_score[$l] != 0 && $parent_score[$l] != 0) {
			echo "<td>".compare_score($teacher_score[$l], $parent_score[$l])."</td>";
		} else if ($teacher_score[$l] == 0 || $parent_score[$l] == 0) {
			echo "<td>ไม่สามารถเปรียบเทียบ</td>";
		}
	}
}

function calculate_tcompare($teacher_es_id, $parent_es_id) {
	$i = 0;
	$teacher = "SELECT * FROM estimate_score WHERE Es_id = $teacher_es_id";
	$teacher_query = mysql_query($teacher)or die(mysql_error());
	while($result = mysql_fetch_array($teacher_query)) {
		$teacher_score[$i] = $result[Es_score];
		$i++;
	}

	$i = 0;
	$parent = "SELECT * FROM estimate_score WHERE Es_id = $parent_es_id";
	$parent_query = mysql_query($parent)or die(mysql_error());
	while($result = mysql_fetch_array($parent_query)) {
		$parent_score[$i] = $result[Es_score];
		$i++;
	}

	$sg_id = 1;
	for ($l = 0; $l < 9; $l++) {
		if ($teacher_score[$l] != 0 && $parent_score[$l] != 0) {
			$score = compare_score(T_Score($teacher_score[$l], $sg_id), T_Score($parent_score[$l], $sg_id));
			echo "<td>".$score."</td>";
		} else if ($teacher_score[$l] == 0 || $parent_score[$l] == 0) {
			echo "<td>ไม่สามารถเปรียบเทียบ</td>";
		}
		$sg_id++;
	}
}

function compare_guide ($teacher_es_id, $parent_es_id) {
	$danger = "เด็กจำเป็นต้องได้รับการพัฒนาความฉลาดทางอารมณ์ด้านการ";
	$warning = "เด็กควรได้รับการพัฒนาความฉลาดทางอารมณ์ด้านการ";
	$success = "เด็กควรได้รับการรักษาไว้ซึ่งความฉลาดทางอารมณ์ด้านการ";
	$high = "คะแนนทีมากกว่าหรือเท่ากับ 50 คะแนน";
	$average = "คะแนนทีอยู่ในช่วง 40 - 49 คะแนน";
	$low = "คะแนนทีต่ำกว่า 40 คะแนน";

	$i = 0;
	$teacher = "SELECT * FROM estimate_score WHERE Es_id = $teacher_es_id";
	$teacher_query = mysql_query($teacher)or die(mysql_error());
	while($result = mysql_fetch_array($teacher_query)) {
		$teacher_score[$i] = $result[Es_score];
		$i++;
	}

	$i = 0;
	$parent = "SELECT * FROM estimate_score WHERE Es_id = $parent_es_id";
	$parent_query = mysql_query($parent)or die(mysql_error());
	while($result = mysql_fetch_array($parent_query)) {
		$parent_score[$i] = $result[Es_score];
		$i++;
	}

	$sg_id = 1;
	for ($l = 0; $l < 9; $l++) {
		$score = compare_score(T_Score($teacher_score[$l], $sg_id), T_Score($parent_score[$l], $sg_id));
		$sg_id++;
	}
	?>
	<ul class="list-group text-advice">
		<?php
		$number = 1;
		for ($i = 1; $i <= 9; $i++) {
			if ($score >= 0 && $score <= 39) {
				if ($i == 1) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>ควบคุมอารมณ์</span>
					</li>
					<?php
				} else if ($i == 2 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>ใส่ใจและเข้าใจอารมณ์</span>
					</li>
					<?php
				} else if ($i == 3 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>ยอมรับถูกผิด</span>
					</li>
					<?php
				} else if ($i == 4 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>มุ่งมั่นพยายาม</span>
					</li>
					<?php
				} else if ($i == 5 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>ปรับตัวต่อปัญหา</span>
					</li>
					<?php
				} else if ($i == 6 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>กล้าแสดงออก</span>
					</li>
					<?php
				} else if ($i == 7 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>พอใจในตนเอง</span>
					</li>
					<?php
				} else if ($i == 8 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>รู้จักปรับตัว</span>
					</li>
					<?php
				} else if ($i == 9 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $low; ?></span>
						<span class="label label-text label-danger"><?php echo $number; ?>.<?php echo $danger; ?>รื่นเริงเบิกบาน</span>
					</li>
					<?php
				}
			} else if ($score >= 40 && $score <= 49) {
				if ($i == 1) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>ควบคุมอารมณ์</span>
					</li>
					<?php
				} else if ($i == 2 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>ใส่ใจและเข้าใจอารมณ์</span>
					</li>
					<?php
				} else if ($i == 3 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>ยอมรับถูกผิด</span>
					</li>
					<?php
				} else if ($i == 4 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>มุ่งมั่นพยายาม</span>
					</li>
					<?php
				} else if ($i == 5 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>ปรับตัวต่อปัญหา</span>
					</li>
					<?php
				} else if ($i == 6 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>กล้าแสดงออก</span>
					</li>
					<?php
				} else if ($i == 7 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>พอใจในตนเอง</span>
					</li>
					<?php
				} else if ($i == 8 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>รู้จักปรับตัว</span>
					</li>
					<?php
				} else if ($i == 9 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $average; ?></span>
						<span class="label label-text label-warning"><?php echo $l; ?>.<?php echo $warning; ?>รื่นเริงเบิกบาน</span>
					</li>
					<?php
				}
			} else if ($score >= 50 && $score <= 100) {
				if ($i == 1) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>ควบคุมอารมณ์</span>
					</li>
					<?php
				} else if ($i == 2 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>ใส่ใจและเข้าใจอารมณ์</span>
					</li>
					<?php
				} else if ($i == 3 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>ยอมรับถูกผิด</span>
					</li>
					<?php
				} else if ($i == 4 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>มุ่งมั่นพยายาม</span>
					</li>
					<?php
				} else if ($i == 5 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>ปรับตัวต่อปัญหา</span>
					</li>
					<?php
				} else if ($i == 6 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>กล้าแสดงออก</span>
					</li>
					<?php
				} else if ($i == 7 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>พอใจในตนเอง</span>
					</li>
					<?php
				} else if ($i == 8 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>รู้จักปรับตัว</span>
					</li>
					<?php
				} else if ($i == 9 ) {
					?>
					<li class="list-group-item">
						<span class="badge"><?php echo $high; ?></span>
						<span class="label label-text label-success"><?php echo $l; ?>.<?php echo $success; ?>รื่นเริงเบิกบาน</span>
					</li>
					<?php
				}
			}
			$number++;
		}
		?>
	</ul>
	<fieldset>
		<legend>คำแนะนำ</legend>
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">เกณฑ์คะแนนทีตั้งแต่ 50 คะแนนขึ้นไป</h3>
			</div>
			<div class="panel-body">
				บ่งบอกว่าเด็กมีความฉลาดทางอารมณ์อยู่ในเกณฑ์ที่ดี ควรส่งเสริมและรักษาคุณลักษณะนี้ให้คงไว้
			</div>
		</div>
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title">เกณฑ์คะแนนทีอยู่ในช่วง 40 ถึง 49 คะแนน</h3>
			</div>
			<div class="panel-body">
				บ่งบอกว่าเด็กควรได้รับการพัฒนาความฉลาดทางอารมณ์ในด้านนั้นๆให้ดียิ่งขึ้น ผู้ใหญ่ควรร่วมกันส่งเสริมให้เด็กมีความฉลาดทางอารมณ์ในด้านนั้นๆ อย่างต่อเนื่อง
			</div>
		</div>
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">เกณฑ์คะแนนทีต่ำกว่า 40 คะแนน</h3>
			</div>
			<div class="panel-body">
				บ่งบอกว่าเด็กจำเป็นต้องได้รับการพัฒนาความฉลาดทางอารมณ์ในด้านนั้นๆ ให้ดียิ่งขึ้น ผู้ใหญ่จำเป็นต้องช่วยกันเอาใจใส่พัฒนาความฉลาดทางอารมณ์เด็กอย่างจริงจังและสม่ำเสมอ
			</div>
		</div>
	</fieldset>
	<?php
}

function compare_score($teacher_score, $parent_score) {
	if ($teacher_score > $parent_score) {
		return 1;
	} else if ($teacher_score == $parent_score) {
		return 3;
	} else {
		return 2;
	}
}

function check_assessor($es_id, $as_type, $year, $term, $std_no) {
	//header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=estimate_update_fail");
}
?>