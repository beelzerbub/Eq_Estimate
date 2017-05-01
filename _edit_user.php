<?php
include_once("assets/database/connect.php");
include_once("assets/service/user.php");
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
				<div class="row site_content-form">
					<?php
					$user_id = $_GET['id'];
					$user = get_user_byPK($user_id);
					$user_fetch = mysql_fetch_object($user)or die(mysql_error());
					?>
					<form action="assets/service/user.php" role="form" method="post" data-toggle="validator" id="edit_user-form">
						<input type="hidden" name="id" value=<?php echo $user_fetch->user_id; ?>>
						<fieldset class="fieldset-form">
							<legend class="legend-form"><h1>แก้ไขข้อมูลผู้ใช้</h1></legend>
							<div class="form-group">
								<p>ชื่อผู้ใช้</p>
								<input type="text" name="reg_username" id="reg_username" tabindex="1" class="form-control" placeholder="ชื่อผู้ใช้" pattern="[A-z0-9]{1,}$" data-minlength="8" maxlength="20" value="<?php echo $user_fetch->username; ?>" required>
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
										<p>รหัสผ่าน</p>
										<input type="password" name="reg_password" id="reg_password" tabindex="1" class="form-control" data-minlength="8" data-error="กรุณาตรวจสอบความถูกต้อง" placeholder="รหัสผ่าน" value="<?php echo $user_fetch->password; ?>" required>
										<div class="help-block with-errors"></div>
										<span class="help-block small">
											<ul>
												<li>ความยาว 8-15 อักขระ</li>
												<li>ใช้ตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น</li>
											</ul>
										</span>
									</div>
									<div class="col-md-6">
										<p>ยืนยันรหัสผ่าน</p>
										<input type="password" name="reg_passwordConfirm" data-match="#reg_password" class="form-control" data-match-error="รหัสยืนยันผิดพลาด" placeholder="ยืนยันรหัสผ่าน" value="<?php echo $user_fetch->password; ?>" data-error="กรุณาตรวจสอบความถูกต้อง" required>
										<div class="help-block with-errors"></div>
										<span class="help-block small">
											<ul>
												<li>ตรวจสอบความถูกต้องของรหัสยืนยัน</li>
											</ul>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<p>อีเมล</p>
								<input type="email" name="reg_email" id="reg_email" tabindex="1" class="form-control" placeholder="อีเมลล์" value="<?php echo $user_fetch->user_email; ?>" data-error="กรุณาตรวจสอบความถูกต้อง อีเมลล์ต้องมีลักษณะดังนี้ example@mail.com" required>
								<div class="help-block with-errors"></div>
								<span class="help-block small">( กรุณาระบุอีเมลล์ที่ใช้งานได้จริง )</span>
							</div>
							<div class="form-group">
								<p>ชื่อ</p>
								<input type="name" name="reg_name" id="reg_name" tabindex="1" class="form-control" placeholder="ชื่อ" value="<?php echo $user_fetch->user_name; ?>" required>
								<span class="help-block small">( กรุณาระบุชื่อ เพื่อประโยชน์ในการใช้เก็บข้อมูล) </span>
							</div>
							<div class="form-group">
								<p>นามสกุล</p>
								<input type="reg_surname" name="reg_surname" id="reg_surname" tabindex="1" class="form-control" placeholder="นามสกุล" value="<?php echo $user_fetch->user_surname; ?>" required>
								<span class="help-block small">( กรุณาระบุนามสกุล เพื่อประโยชน์ในการใช้เก็บข้อมูล)</span>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										ประเภทผู้ใช้
									</div>
									<div class="col-md-8 col-md-pull-1">
										<label for="reg_role" class="radio-inline">
											<input type="radio" name="reg_role" value="1" <?php echo ($user_fetch->user_role == 1)? 'checked' : ''; ?> required> ผู้ใช้งานทั่วไป
										</label>
										<label for="reg_role" class="radio-inline">
											<input type="radio" name="reg_role" value="2" <?php echo ($user_fetch->user_role == 2)? 'checked' : ''; ?> required> ครูประจำชั้น
										</label>
										<?php
										if ($_SESSION["user_role"] == 8) {
											?>
											<label for="reg_role" class="radio-inline">
												<input type="radio" name="reg_role" value="8" <?php echo ($user_fetch->user_role == 8)? 'checked' : ''; ?> required> ผู้ดูแลระบบ
											</label>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
										<input type="submit" name="updateBtn" id="updateBtn" tabindex="4" class="form-control btn btn-register" value="แก้ไขข้อมูล">
									</div>
								</div>
							</div>
						</fieldset>
					</form>
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
</body>
</html>