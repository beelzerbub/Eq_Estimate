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
	delete_user($_GET["user"]);
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
} else if ($_POST["filterBtn"]) {
	$keyword = $_POST["filter-keyword"];
	get_user($keyword);
}




////------------------------------------------------- 
////------------ Function Login ---------------------
////-----------------------------------------------//
function get_users($action) {
	$sql = "SELECT * FROM user";
	?>
	<meta http-equiv='refresh' content='0;url=/project2/user.php?filter=<?php echo $sql; ?>&action=<?php echo $action; ?>'>
	<?php
}

function get_user($keyword) {
	$sql = "SELECT * FROM user WHERE username LIKE `%".$keyword."%` OR  user_name LIKE `%".$keyword."%` OR user_email LIKE `%".$keyword."%`";
	?>
	<meta http-equiv='refresh' content='0;url=/project2/user.php?filter=<?php echo $sql; ?>'>
	<?php
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
	$sql = "INSERT INTO user VALUES('','".$username."','".$password."','".$email."','".$name."','".$surname."'";
	if ($role == 1) {
		$sql .= ",2)";
	} else if ($role ==2 ){
		$sql .= ",1)";
	}
	mysql_query($sql)or die(mysql_error());
	?>
	<meta http-equiv="refresh" content="0; url=\project2\user.php?action=insert_success">
	<?php
}

function delete_user($username) {
	$find = "SELECT * FROM assessor join user WHERE user.user_name = assessor.As_name AND user.username = '".$username."'";
	$query = mysql_query($find)or die(mysql_error());
	if (mysql_num_rows($query) > 0) {
		$sql = "UPDATE user SET user_role = -99 WHERE user.username = '".$username."'";
		mysql_query($sql)or die(mysql_error());
		?>
		<meta http-equiv="refresh" content="0; url=\project2\user.php?action=user_delete_warning">
		<?php
	} else {
		$sql = "DELETE FROM user WHERE user.username = '".$username."'";
		mysql_query($sql)or die(mysql_error());
		?>
		<meta http-equiv="refresh" content="0; url=\project2\user.php?action=delete_success">
		<?php
	}
}

function rollback($username) {
	$sql = "UPDATE user SET user_role = 1";
	mysql_query($sql)or die(mysql_query());
	?>
	<meta http-equiv="refresh" content="0; url=\project2\user.php?action=user_rollback-success">
	<?php
}

?>