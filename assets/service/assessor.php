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
if ($_POST["EditAsBtn"]) {
	$as_id = $_POST['as_id'];
	$as_name = $_POST['as_name'];
	$as_surname = $_POST['as_surname'];
	$as_type = $_POST['as_type'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$std_no = $_POST['std_no'];
	edit_assessor($as_id, $as_name, $as_surname);
	header("location:../../estimate_form.php?as_type=$as_type&std_no=$std_no&year=$year&term=$term&action=edit_assessor_success");
}




////------------------------------------------------- 
////---------- Function assessor --------------------
////-----------------------------------------------//
function edit_assessor ($id, $name, $surname) {
	$edit_as = "UPDATE assessor SET As_name = '$name', As_surname = '$surname' WHERE As_id = $id";
	$edit_as_query = mysql_query($edit_as)or die(mysql_error());
}
?>