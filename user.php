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
				<div class="row site_content-filter">
					<form action="#" class="form-inline" id="user-filter_form" name="user-filter_form" role="form" method="POST" data-toggle="validator">
						<fieldset class="fieldset-form">
							<legend class="legend-form">ข้อมูลผู้ใช้</legend>
							<div class="col-md-7">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" id="filter-keyword" maxlength="50" placeholder="ชื่อผู้ใช้/ชื่อ/นามสกุล/อีเมลล์" required>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="filterBtn" id="filterBtn" value="ค้นหา">
								</div>
								<div class="form-group">
									<a href="#" class="btn btn-primary">ค้นหาทั้งหมด</a>
								</div>
								<div class="form-group">
									<input type="reset" class="btn btn-danger" name="resetBtn" id="resetBtn" value="ล้างข้อมูล">
								</div>
							</div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-3 col-md-offset-1">
										<button type="button" class="btn btn-primary insert_user-link" name="insert_user-link" data-toggle="modal" data-target="#insert_user-box" value="insert_user">เพิ่มข้อมูลผู้ใช้</button>
									</div>
									<div class="col-md-3">
										<button type="button" class="btn btn-primary user-link" name="user-link" >หน้ารายชื่อผู้ใช้</button>
									</div>
									<div class="col-md-5">
										<button type="button" class="btn btn-primary confirm_user-link" name="confirm_user-link">หน้ารายชื่อผู้ใช้ที่รอการอนุมัติ</button>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
					<form action="#" class="form-inline" id="confirm-filter_form" name="confirm-filter_form" role="form" method="POST" data-toggle="validator" style="display:none">
						<fieldset class="fieldset-form">
							<legend class="legend-form">ข้อมูลผู้ใช้</legend>
							<div class="col-md-7">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" id="filter-keyword" maxlength="50" placeholder="ชื่อผู้ใช้/ชื่อ/นามสกุล/อีเมลล์" required>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="filterBtn" id="filterBtn" value="ค้นหา">
								</div>
								<div class="form-group">
									<a href="#" class="btn btn-primary">ค้นหาทั้งหมด</a>
								</div>
								<div class="form-group">
									<input type="reset" class="btn btn-danger" name="resetBtn" id="resetBtn" value="ล้างข้อมูล">
								</div>
							</div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-3 col-md-offset-1">
										<button type="button" class="btn btn-primary insert_user-link" name="insert_user-link" data-toggle="modal" data-target="#insert_user-box" value="insert_user">เพิ่มข้อมูลผู้ใช้</button>
									</div>
									<div class="col-md-3">
										<button type="button" class="btn btn-primary user-link" name="user-link">หน้ารายชื่อผู้ใช้</button>
									</div>
									<div class="col-md-5">
										<button type="button" class="btn btn-primary confirm_user-link" name="confirm_user-link">หน้ารายชื่อผู้ใช้ที่รอการอนุมัติ</button>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="row site_content-form">
					<div class="modal fade" id="insert_user-box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<form action="#" role="form" method="post" data-toggle="validator" id="insert_user-form">
									<fieldset class="fieldset-form">
										<legend class="legend-form"><h1>เพิ่มข้อมูลผู้ใช้</h1></legend>
										<div class="form-group">
											<input type="text" name="reg_username" id="reg_username" tabindex="1" class="form-control" placeholder="ชื่อผู้ใช้" pattern="[A-z0-9]{1,}$" data-minlength="8" maxlength="20" value="" required>
											<span class="help-block small">
												<ul>
													<li>ความยาว 8-20 อักขระ</li>
													<li>ใช้ตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น</li>
												</ul>
											</span>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<input type="password" name="reg_password" id="reg_password" tabindex="1" class="form-control" data-minlength="8" data-error="กรุณาตรวจสอบความถูกต้อง" placeholder="รหัสผ่าน" value="" required>
													<div class="help-block with-errors"></div>
													<span class="help-block small">
														<ul>
															<li>ความยาว 8-15 อักขระ</li>
															<li>ใช้ตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น</li>
														</ul>
													</span>
												</div>
												<div class="col-md-6">
													<input type="password" name="reg_passwordConfirm" data-match="#reg_password" class="form-control" data-match-error="รหัสยืนยันผิดพลาด" placeholder="ยืนยันรหัสผ่าน" value="" data-error="กรุณาตรวจสอบความถูกต้อง" required>
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<input type="email" name="reg_email" id="reg_email" tabindex="1" class="form-control" placeholder="อีเมลล์" value="" data-error="กรุณาตรวจสอบความถูกต้อง อีเมลล์ต้องมีลักษณะดังนี้ example@mail.com" required>
											<div class="help-block with-errors"></div>
											<span class="help-block small">( กรุณาระบุอีเมลล์ที่ใช้งานได้จริง )</span>
										</div>
										<div class="form-group">
											<input type="name" name="reg_name" id="reg_name" tabindex="1" class="form-control" placeholder="ชื่อ" value="" required>
											<span class="help-block small">( กรุณาระบุชื่อ เพื่อประโยชน์ในการใช้เก็บข้อมูล) </span>
										</div>
										<div class="form-group">
											<input type="reg_surname" name="reg_surname" id="reg_surname" tabindex="1" class="form-control" placeholder="นามสกุล" value="" required>
											<span class="help-block small">( กรุณาระบุนามสกุล เพื่อประโยชน์ในการใช้เก็บข้อมูล)</span>
										</div>
										<div class="form-group">
											<input type="reg_question" name="reg_question" id="reg_question" tabindex="1" class="form-control" placeholder="คำถามสำหรับกู้รหัสผ่าน" value="" required>
											<span class="help-block small">( กรุณาระบุคำถามที่ใช้ในการกู้คืนรหัสผ่าน )</span>
										</div>
										<div class="form-group">
											<input type="reg_answer" name="reg_answer" id="reg_answer" tabindex="1" class="form-control" placeholder="คำตอบ" value="" required>
											<span class="help-block small">( กรุณาระบุคำตอบที่ใช้ในการกู้คืนรหัสผ่าน )</span>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													ประเภทผู้ใช้
												</div>
												<div class="col-md-8 col-md-pull-1">
													<label for="reg_role" class="radio-inline">
														<input type="radio" name="reg_role" value="-1" required> ผู้ใช้งานทั่วไป
													</label>
													<label for="reg_role" class="radio-inline">
														<input type="radio" name="reg_role" value="-2" required> ครูประจำชั้น
													</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6 col-md-offset-3">
													<input type="submit" name="regBtn" id="regBtn" tabindex="4" class="form-control btn btn-register" value="สมัครสมาชิก">
												</div>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row site_content-table">
					<table id="user-table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><p class="text-center">ลำดับ</p></th>
								<th><p class="text-center">ชื่อผู้ใช้</p></th>
								<th><p class="text-center">ชื่อ</p></th>
								<th><p class="text-center">นามสกุล</p></th>
								<th><p class="text-center">อีเมลล์</p></th>
								<th><p class="text-center">สิทธิ์ผู้ใช้</p></th>
								<th><p class="text-center">ประเภทผู้ใช้</p></th>
								<th><p class="text-center">ลบ</p></th>
								<th><p class="text-center">แก้ไข</p></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<table id="confirm-table" class="table table-bordered table-hover" style="display:none">
						<thead>
							<tr>
								<th>
									<p class="text-center">ลำดับ</p>
								</th>
								<th>
									<p class="text-center">ชื่อผู้ใช้</p>
								</th>
								<th>
									<p class="text-center">ชื่อ</p>
								</th>
								<th>
									<p class="text-center">นามสกุล</p>
								</th>
								<th>
									<p class="text-center">อีเมลล์</p>
								</th>
								<th>
									<p class="text-center">ประเภทผู้ใช้</p>
								</th>
								<th>
									<p class="text-center">อนุมัติการสมัคร</p>
								</th>
								<th>
									<p class="text-center">ไม่อนุมัติการสมัคร</p>
								</th>
							</tr>
						</thead>
					</table>
				</div>
				<div class="row site_content-profile">
				</div>
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
			$('.confirm_user-link').click(function(e) {
				$("#confirm-filter_form").delay(100).fadeIn(100);
				$("#confirm-table").delay(100).fadeIn(100);
				$("#user-filter_form").fadeOut(100);
				$("#user-table").fadeOut(100);
				e.preventDefault();
			});
			$('.user-link').click(function(e) {
				$("#user-filter_form").delay(100).fadeIn(100);
				$("#user-table").delay(100).fadeIn(100);
				$("#confirm-filter_form").fadeOut(100);
				$("#confirm-table").fadeOut(100);
				e.preventDefault();
			});
		});
	</script>
</body>
</html>