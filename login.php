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
			<img src="image/banner.jpg" class="img-responsive" alt="img-banner">
		</div>
		<div class="row site_navbar">
			<?php
			include('assets/template/navbar.php');
			?>
		</div>
		<div class="row site_content">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default panel-login">
					<div class="panel-heading">
						<div class="row" id="forgot-header" style="display:none">
							<label for="forgot-header">
								กู้คืนรหัสผ่าน
							</label>
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="#" id="login-form-link" class="active">เข้าสู่ระบบ</a>
							</div>
							<div class="col-md-6">
								<a href="#" id="register-form-link">สมัครสมาชิก</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form action="#" id="login-form" role="form" method="post" data-toggle="validator"  style="display:block">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="ชื่อผู้ใช้" value="" pattern="[A-z0-9]{1,}$" data-minlength="8" maxlength="20" data-error="กรุณากรอกชื่อผู้ใช้" required>
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="1" class="form-control" placeholder="รหัสผ่าน" value="" data-error="กรุณากรอกรหัสผ่าน" required>
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<input type="checkbox" name="remember" id="remember" tabindex="1" value="remember">
										<label for="remember">จำการเข้าสู่ระบบ</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6 col-md-offset-3">
												<input type="submit" name="loginBtn" id="loginBtn" tabindex="4" class="form-control btn btn-login" value="เข้าสู่ระบบ">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<div class="text-center">
													<a href="#" tabindex="5" id="forgot-form-link" class="forgot-password">ลืมรหัสผ่าน?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form action="#" id="register-form" role="form" method="post" data-toggle="validator" style="display:none">
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
												<input type="password" name="reg_password" id="reg_password" tabindex="1" class="form-control" placeholder="รหัสผ่าน" value="" required>
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
								</form>
								<form action="#" id="forgot-form" role="form" method="post" data-toggle="validator" style="display:none">
									<div class="form-group">
										<input type="email" class="form-control" name="forgot_email" id="forgot_email" tabindex="1" placeholder="ระบุอีเมลล์" value="" data-error="กรุณากรอกอีเมลล์ให้ถูกต้อง" required="">
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="forgot_question" id="forgot_question" tabindex="1" value="ดึงคำถามมาใส่" disabled>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="forgot_answer" id="forgot_answer" tabindex="1" placeholder="คำตอบ" data-error="คำตอบไม่สามารถเว้นว่างได้" required>
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<input type="submit" class="btn btn-forgot" name="forgotBtn" id="forgotBtn" tabindex="4" value="ส่ง">
											</div>
											<div class="col-md-6">
												<input type="button" class="btn btn-back" name="backBtn" id="backBtn" tabindex="4" value="ย้อนกลับ">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
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
			$('#login-form-link').click(function(e) {
				$("#login-form").delay(100).fadeIn(100);
				$("#register-form").fadeOut(100);
				$("#forgot-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#register-form-link').click(function(e) {
				$("#register-form").delay(100).fadeIn(100);
				$("#login-form").fadeOut(100);
				$("#forgot-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#forgot-form-link').click(function(e) {
				$("#forgot-form").delay(100).fadeIn(100);
				$("#forgot-header").delay(100).fadeIn(100);
				$("#login-form-link").fadeOut(100);
				$("#register-form-link").fadeOut(100);
				$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				e.preventDefault();
			});
			$('#backBtn').click(function(e) {
				$("#login-form-link").delay(100).fadeIn(100);
				$("#register-form-link").delay(100).fadeIn(100);
				$("#login-form").delay(100).fadeIn(100);
				$("#forgot-form").fadeOut(100);
				$("#forgot-header").fadeOut(100);
				$('#login-form-link').addClass('active');
				e.preventDefault();
			});
		});
	</script>
</body>
</html>