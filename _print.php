<?php
include_once("assets/database/connect.php");
include_once("assets/service/login.php");
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
						<li role="presentation" id="student-form-link-active" class="active">
							<a class="btn btn-default" id="student-form-link" href="" role="button">
								สั่งพิมพ์รายชื่อทั้งห้องเรียน
							</a>
						</li>
						<li role="presentation" id="estimate-form-link-active">
							<a class="btn btn-default" id="estimate-form-link" href="" role="button">
								สั่งพิมพ์รายชื่อรายบุคคล
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<form action="assets/service/export.php" name="student-form" id="student-form" role="form" method="post">
					<fieldset class="fieldset-form">
						<legend class="legend-form"><h2>สั่งพิมพ์แบบรายชื่อทั้งห้องเรียน</h2></legend>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="filter-year">ปีการศึกษา</label>
									<input type="number" placeholder="ปีการศึกษา" id="year_export" name="year_export" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="filter-term">ภาคการเรียน</label>
									<select name="filter-term" id="filter-term" class="form-control" required>
										<option value="" disabled selected>ภาคเรียน</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
						</div>
						<label for="classroom">ห้องเรียน</label>
						<div class="row">
							<?php
							$classroom = "SELECT * FROM classroom";
							$classroom_query = mysql_query($classroom)or die(mysql_error());
							$i=0;
							while($classroom_fetch = mysql_fetch_array($classroom_query)) {
								if ($classroom_fetch["class_grade"] != "ไม่ระบุ") {
									?>
									<div class="col-md-3">
										<div class="form-group">
											<input type="checkbox" name="classroom_select[]" value="<?php echo $classroom_fetch["class_id"]; ?>">
											<?php echo $classroom_fetch["class_grade"]."/".$classroom_fetch["class_number"]; ?>
										</div>
									</div>
									<?php
								}
								$i++;
							}
							?>
						</div>
						<div class="col-md-4 col-md-offset-4">
							<input type="submit" id="PrintRoomBtn" name="PrintRoomBtn" tabindex="" class="form-control btn btn-add" value="บันทึกรายชื่อสำหรับส่งพิมพ์">
						</div>
					</fieldset>
				</form>
				<form action="assets/service/export.php" name="estimate-export_form" id="estimate-export_form" role="form" method="post" enctype="multipart/form-data" data-toggle="validator" style="display:none">
					<fieldset class="fieldset-form">
						<legend class="legend-form"><h2>สั่งพิมพ์แบบระบุรายชื่อนักเรียน</h2></legend>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input-name">ชื่อ</label>
									<input type="text" placeholder="ชื่อ" id="input_name" name="input_name" class="form-control" required>								</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="input-name">นามสกุล</label>
										<input type="text" placeholder="นามสกุล" id="input_surname" name="input_surname" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="filter-year">ปีการศึกษา</label>
										<input type="number" placeholder="ปีการศึกษา" id="year_export" name="year_export" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="filter-term">ภาคการเรียน</label>
										<select name="filter-term" id="filter-term" class="form-control" required>
											<option value="" disabled selected>ภาคเรียน</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-4">
								<input type="submit" id="PrintRoomBtn" name="PrintStdBtn" tabindex="" class="form-control btn btn-add" value="บันทึกรายชื่อสำหรับส่งพิมพ์">
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
				$('#student-form-link').click(function(e) {
					$("#student-form").delay(100).fadeIn(100);
					$("#estimate-export_form").fadeOut(100);
					$(this).addClass('active');
					$("#estimate-form-link").removeClass('active');
					$("#student-form-link-active").addClass('active');
					$("#estimate-form-link-active").removeClass('active');
					e.preventDefault();
				});
				$('#estimate-form-link').click(function(e) {
					$("#estimate-export_form").delay(100).fadeIn(100);
					$("#student-form").fadeOut(100);
					$(this).addClass('active');
					$('#student-form-link').removeClass('active');
					$("#student-form-link-active").removeClass('active');
					$("#estimate-form-link-active").addClass('active');
					e.preventDefault();
				});
			});
		</script>
	</body>
	</html>