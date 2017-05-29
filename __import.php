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
		</div>
		<div class="row site_content-form">
			<div class="col-md-3">
				<div class="well">
					<ul class="nav nav-pills nav-stacked">
						<li role="presentation" id="howto-form-link-active" class="active">
							<a class="btn btn-default" id="howto-form-link" href="" role="button">
								วิธีการนำเข้าข้อมูลนักเรียน<br>ด้วยไฟล์ CSV
							</a>
						</li>
						<li role="presentation" id="import-form-link-active">
							<a class="btn btn-default" id="import-form-link" href="" role="button">
								นำเข้าข้อมูลนักเรียนด้วยไฟล์ <br> CSV
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<div id="howto-form" >
					<fieldset class="fieldset-form">
						<legend class="legend-form"><h2>วิธีการนำเข้าข้อมูลด้วยไฟล์ CSV</h2></legend>
						<ol>
							<li>
								เตรียมไฟล์ Excel หรือดาวโหลดจากลิ้งด้านหลัง <a href="assets/template/template.xlsx">Download</a> เพื่อใช้เป็น Pattern สำหรับกรอกบันทึกข้อมูล โดยจะต้องมีหัวคอลั่มดังรูปด้านล่าง 
								<img src="image/howto/howto_1.png" width="98%" alt=""><hr>
							</li>
							<li>
								ทำการบันทึกข้อมูลลงในไฟล์ Excel ที่เตรียมไว้ <br>
								โดยระบุระดับชั้นตามข้อความด้านล่าง
								<ul>
									<li>อนุบาลปีที่ 1</li>
									<li>อนุบาลปีที่ 2</li>
									<li>อนุบาลปีที่ 3</li>
									<li>ประถมศึกษาปีที่ 1</li>
									<li>ประถมศึกษาปีที่ 2</li>
									<li>ประถมศึกษาปีที่ 3</li>
									<li>ประถมศึกษาปีที่ 4</li>
									<li>ประถมศึกษาปีที่ 5</li>
									<li>ประถมศึกษาปีที่ 6</li>
								</ul>
								<img src="image/howto/howto_2.png" width="98%" alt=""><hr>
							</li>
							<li>
								บันทึกไฟล์เป็นนามสกุล CSV UTF-8 (Comma delimited) โดยไปที่ <br>
								File -> Save As -> เลือกนามสกุลไฟล์ให้เป็น CSV UTF-8 (Comma delimited) 
								<img src="image/howto/howto_3.png" width="98%" alt=""><hr>
								<img src="image/howto/howto_4.png" width="98%" alt=""><hr>
							</li>
							<li>
								จากนั้นทำการตรวจสอบ Format โดยการเปิดไฟล์ CSV ด้วย Notepad หากบันทึกได้ถูกต้องจะพบข้อมูลดังรูป
								<img src="image/howto/howto_5.png" width="98%" alt=""><hr>
								<img src="image/howto/howto_6.png" width="98%" alt=""><hr>
							</li>
							<li>
								ทำการลบหัวตารางออกให้เหลือเพียงแค่ข้อมูลที่ต้องการ
								<img src="image/howto/howto_7.png" width="98%" alt=""><hr>
							</li>
							<li>
								จากนั้นบันทึกไฟล์ โดยเปลี่ยน Encoding เป็น UTF-8 โดยไปที่ <br>
								File -> Save As -> Encoding
								<img src="image/howto/howto_8.png" width="98%" alt=""><hr>
							</li>
							<li>
								สามารถนำไฟล์ที่ได้ ไปบันทึกเข้าฐานข้อมูล ผ่านทางส่วน "นำเข้าข้อมูลนักเรียนด้วยไฟล์ CSV" ได้
								<img src="image/howto/howto_9.png" width="98%" alt=""><hr>
							</li>
							<li>
								หากเห็นข้อความตามรูปเป็นอันเสร็จขั้นตอนการนำเข้าข้อมูลนักเรียนด้วยไฟล์ CSV
								<img src="image/howto/howto_10.png" width="98%" alt=""><hr>
							</li>
						</ol>
					</fieldset>
				</div>
				<form action="assets/service/student.php" name="student-import_form" id="student-import_form" role="form" method="post" enctype="multipart/form-data" data-toggle="validator" style="display:none">
					<fieldset class="fieldset-form">
						<legend class="legend-form"><h2>นำเข้าข้อมูลนักเรียนด้วยไฟล์ CSV</h2></legend>
						<div class="form-group">
							<label for="InputFileCsv">เลือก File CSV ที่ต้องการนำเข้า : </label>
							<input type="file" name="fileCSV" id="fileCSV" class="form-control" data-error="กรุณาเลือกไฟล์ ที่ต้องการนำเข้าข้อมูลนักเรียน" required />
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
	<script type="text/javascript">
		$(function() {
			$('#howto-form-link').click(function(e) {
				$("#howto-form").delay(100).fadeIn(100);
				$("#student-import_form").fadeOut(100);
				$(this).addClass('active');
				$("#import-form-link").removeClass('active');
				$("#howto-form-link-active").addClass('active');
				$("#import-form-link-active").removeClass('active');
				e.preventDefault();
			});
			$('#import-form-link').click(function(e) {
				$("#student-import_form").delay(100).fadeIn(100);
				$("#howto-form").fadeOut(100);
				$(this).addClass('active');
				$('#howto-form-link').removeClass('active');
				$("#howto-form-link-active").removeClass('active');
				$("#import-form-link-active").addClass('active');
				e.preventDefault();
			});
		});
	</script>
</body>
</html>