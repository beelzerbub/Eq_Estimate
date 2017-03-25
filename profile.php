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
			<div class="col-md-8 col-md-offset-2">
				<form action="#" role="form" method="post" data-toggle="validator" id="profile-form">
					<fieldset>
						<legend>การตั้งค่าบัญชี</legend>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 profile-form_header">ชื่อผู้ใช้</div>
								<div class="col-md-8 profile-form_input">
									<input type="text" name="reg_username" id="reg_username" tabindex="1" class="form-control" placeholder="ชื่อผู้ใช้" pattern="[A-z0-9]{1,}$" data-minlength="8" maxlength="20" value="" required>
									<span class="help-block small">
										<ul>
											<li>ความยาว 8-20 อักขระ</li>
											<li>ใช้ตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น</li>
										</ul>
									</span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 profile-form_header">อีเมลล์</div>
								<div class="col-md-8 profile-form_input">
									<input type="email" name="reg_email" id="reg_email" tabindex="1" class="form-control" placeholder="อีเมลล์" value="" data-error="กรุณาตรวจสอบความถูกต้อง อีเมลล์ต้องมีลักษณะดังนี้ example@mail.com" required>
									<div class="help-block with-errors"></div>
									<span class="help-block small">( กรุณาระบุอีเมลล์ที่ใช้งานได้จริง )</span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 profile-form_header">ชื่อ</div>
								<div class="col-md-8 profile-form_input">
									<input type="name" name="reg_name" id="reg_name" tabindex="1" class="form-control" placeholder="ชื่อ" value="" required>
									<span class="help-block small">( กรุณาระบุชื่อ เพื่อประโยชน์ในการใช้เก็บข้อมูล) </span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 profile-form_header">นามสกุล</div>
								<div class="col-md-8 profile-form_input">
									<div class="form-group">
										<input type="reg_surname" name="reg_surname" id="reg_surname" tabindex="1" class="form-control" placeholder="นามสกุล" value="" required>
										<span class="help-block small">( กรุณาระบุนามสกุล เพื่อประโยชน์ในการใช้เก็บข้อมูล)</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 col-md-offset-4">
									<input type="submit" id="EditProfileBtn" name="EditProfileBtn" class="form-control btn btn-edit" value="แก้ไขข้อมูล">
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<br><br>
				<form action="#" role="form" method="post" data-toggle="validator" id="password-form">
					<legend>การตั้งค่ารหัสผ่าน</legend>
					<div class="row">
						<div class="form-group">
							<div class="col-md-4 profile-form_header">รหัสผ่านเดิม</div>
							<div class="col-md-8 profile-form_input">
								<input type="password" name="reg_password_old" id="reg_password_old" tabindex="1" class="form-control" data-error="กรุณาตรวจสอบความถูกต้อง" placeholder="รหัสผ่านเดิม" value="" required>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 profile-form_header">รหัสผ่านใหม่</div>
							<div class="col-md-8 profile-form_input">
								<input type="password" name="reg_password" id="reg_password" tabindex="1" class="form-control" data-minlength="8" data-error="กรุณาตรวจสอบความถูกต้อง" placeholder="รหัสผ่าน" value="" required>
								<div class="help-block with-errors"></div>
								<span class="help-block small">
									<ul>
										<li>ความยาว 8-15 อักขระ</li>
										<li>ใช้ตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น</li>
									</ul>
								</span>
							</div>
							<div class="col-md-4 profile-form_header">ยืนยันรหัสผ่านใหม่</div>
							<div class="col-md-8 profile-form_input">
								<input type="password" name="reg_passwordConfirm" data-match="#reg_password" class="form-control" data-match-error="รหัสยืนยันผิดพลาด" placeholder="ยืนยันรหัสผ่าน" value="" data-error="กรุณาตรวจสอบความถูกต้อง" required>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 profile-form_header">คำถามสำหรับกู้รหัสผ่าน</div>
							<div class="col-md-8 profile-form_input">
								<input type="reg_question" name="reg_question" id="reg_question" tabindex="1" class="form-control" placeholder="คำถามสำหรับกู้รหัสผ่าน" value="" required>
								<span class="help-block small">( กรุณาระบุคำถามที่ใช้ในการกู้คืนรหัสผ่าน )</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 profile-form_header">คำตอบ</div>
							<div class="col-md-8 profile-form_input">
								<input type="reg_answer" name="reg_answer" id="reg_answer" tabindex="1" class="form-control" placeholder="คำตอบ" value="" required>
								<span class="help-block small">( กรุณาระบุคำตอบที่ใช้ในการกู้คืนรหัสผ่าน )</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<input type="submit" id="EditPasswordBtn" name="EditPasswordBtn" class="form-control btn btn-edit" value="เปลี่ยนรหัสผ่าน">
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
			<!--<div class="col-md-2 site_content-sidebar_profile">
				<div class="list-group">
					<a href="#" class="list-group-item active" id="profile_user-link">ข้อมูลส่วนตัว</a>

				</div>
			</div>
			<div class="col-md-4 site_content-form_header"></div>
			<div class="col-md-6 site_content-form_input"></div>-->
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