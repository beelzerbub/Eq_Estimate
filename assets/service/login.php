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
if ($_POST["loginBtn"]) {
	$username	=	$_POST["username"];
	$password 	= 	$_POST["password"];
	authorization($username, $password);
} else if ($_POST["forgotBtn"]) {
	$email 		=	$_POST["forgot_email"];
	forgot_password($email);
}




////------------------------------------------------- 
////------------ Function Login ---------------------
////-----------------------------------------------//
function authorization($username, $password) {
	$sql = "SELECT * from user WHERE username = '".$username."' AND password = '".$password."'";
	$results = mysql_query($sql)or die(mysql_error());
	if (mysql_num_rows($results) > 0) {
		while ($result = mysql_fetch_array($results)) {
			$_SESSION["username"] 	= 	$result["username"];
			$_SESSION["user_name"] 	= 	$result["user_name"];
			$_SESSION["user_role"]	=	$result["user_role"];
		}
		?>
		<meta http-equiv="refresh" content="0; url=\project2\index.php?action=login_success">
		<?php
	} else {
		?>
		<meta http-equiv="refresh" content="0; url=\project2\login.php?action=login_fail">
		<?php
	}
	?>
	<?php
}

function forgot_password($email) {
	$sql = "SELECT * FROM user WHERE user_email = '".$email."'";
	$result = mysql_query($sql)or die(mysql_error());
	if (mysql_num_rows($result) > 0) {
		$sql = str_replace("'", "`",$sql);
		?>
		<meta http-equiv='refresh' content='0;url=/project2/login.php?result=<?php echo $sql; ?>'>
		<?php
	} else {
		?>
		<meta http-equiv='refresh' content='0;url=/project2/login.php?action=forgot_fail'>
		<?php
	}
}



?>