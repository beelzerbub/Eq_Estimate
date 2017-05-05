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
	delete_user($_GET["id"]);
} else if ($_GET["action"] == "rollback") {
	rollback($_GET["user"]);
} else if ($_POST["regBtn"]) {
	$username 	= 	$_POST["reg_username"];
	$password 	= 	$_POST["reg_password"];
	$email 		= 	$_POST["reg_email"];
	$name 		=	$_POST["reg_name"];
	$surname 	= 	$_POST["reg_surname"];
	$role 		= 	$_POST["reg_role"];
	insert_user($username, $password, $email, $name, $surname, $role);
} else if ($_POST["updateBtn"]) {
	$id 		=	$_POST["id"];
	$username 	= 	$_POST["reg_username"];
	$password 	= 	$_POST["reg_password"];
	$email 		= 	$_POST["reg_email"];
	$name 		=	$_POST["reg_name"];
	$surname 	= 	$_POST["reg_surname"];
	$role 		= 	$_POST["reg_role"];
	update_user ($id, $username, $password, $email, $name, $surname, $role);
}



////------------------------------------------------- 
////------------ Function User ---------------------
////-----------------------------------------------//
function get_user_byPK ($id) {
	$user = "SELECT * FROM user WHERE user_id = $id";
	$user_query = mysql_query($user)or die(mysql_error());
	return $user_query;
}

function get_user_type ($username) {
	$sql = "SELECT * FROM user WHERE username = '".$username."' AND user_role >= 2";
	$query = mysql_query($sql)or die(mysql_er);
	if (mysql_num_rows($query) > 0) {
		return "ครูประจำชั้น / เจ้าหน้าที่";
	} else {
		return "ผู้ปกครอง / บุคคลภายนอก";
	}
}

function insert_user($username, $password, $email, $name, $surname, $role) {
	$check_user = "SELECT * FROM user WHERE username = '$username'";
	$check_user_query = mysql_query($check_user)or die(mysql_error());
	if (mysql_num_rows($check_user_query) > 0) {
		header("location:../../user.php?action=insert_user_duplicate");
	} else {
		$insert_user = "INSERT INTO user VALUES('','$username','$password','$email','$name','$surname'";
		if ($role == 1) {
			$insert_user .= ",2)";
		} else if ($role ==2 ){
			$insert_user .= ",1)";
		}

		mysql_query($insert_user)or die(mysql_error());
		header("location:../../user.php?action=insert_success");
	}
}

function update_user ($id, $username, $password, $email, $name, $surname, $role) {
	$update_user = "UPDATE user 
	SET username = '$username',
	password = '$password',
	user_email = '$email',
	user_name = '$name',
	user_surname = '$surname',
	user_role = $role
	WHERE user_id = $id";
	$update_user_query = mysql_query($update_user)or die(mysql_error());
	header("location:../../user.php?action=update_success");
}

function delete_user($username) {
	$find = "SELECT * FROM assessor join user 
	WHERE user.user_name = assessor.As_name
	AND user.user_surname = assessor.As_surname 
	AND user.username = '$username'";
	$query = mysql_query($find)or die(mysql_error());
	if (mysql_num_rows($query) > 0) {
		$sql = "UPDATE user SET user_role = -99 WHERE user.username = '".$username."'";
		mysql_query($sql)or die(mysql_error());
		header("location:../../user.php?action=user_delete_warning");
	} else {
		$sql = "DELETE FROM user WHERE user.username = '".$username."'";
		mysql_query($sql)or die(mysql_error());
		header("location:../../user.php?action=delete_success");
	}
}

function rollback($username) {
	$sql = "UPDATE user SET user_role = 1";
	mysql_query($sql)or die(mysql_query());
	header("location:../../user.php?action=user_rollback-success");
}

?>