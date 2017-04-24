<?php
include_once("assets/database/connect.php");
include_once("assets/service/login.php");
if ($_SESSION["user_role"] < 8) {
	header("location:404.php");
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title Page</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css/assets/style.css">
	<link rel="icon" href="data:;base64,iVBORwOKGO=" />
</head>
<body>
	<div class="container">
		<div class="row site_header">
			<img src="image/banner.jpg" class="img-responsive" alt="">
		</div>
		<div class="row site_navbar">
			<?php
			include('assets/template/navbar.php');
			?>
		</div>
		<div class="row site_content">
			<div class="col-md-12">
				<div class="row site_content-notice">
					<?php
					include_once("assets/template/notice.php");
					?>
				</div>
			</div>
			<form action="#" id="student-import_form" role="form" method="post" data-toggle="validator" >
				<fieldset class="fieldset-form">
					<legend class="legend-form"><h1>นำเข้าข้อมูลนักเรียนด้วยไฟล์ CSV</h1></legend>
					<div class="form-group">
						<label for="InputFileCsv">เลือก File CSV ที่ต้องการนำเข้า : </label>
						<input type="file" class="form-control" data-error="กรุณาเลือกไฟล์ ที่ต้องการนำเข้าข้อมูลนักเรียน" required />
						<div class="help-block with-errors"></div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<input type="submit" id="ImportStdBtn" name="ImportStdBtn" tabindex="" class="form-control btn btn-add" value="นำเข้าข้อมูล">
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="row site_footer">
			<hr>
			&copy;2016 HATAICHAT SCHOOL
		</div>
	</div>
	<!-- jQuery -->
	<script src="js/jquery/jquery.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/bootstrap/validator.min.js"></script>
</body>
</html>