<?php
include_once("assets/database/connect.php");
include_once("assets/service/login.php");
if ($_SESSION["user_role"]) {
	header("location:estimate.php");
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
			<img src="image/banner.jpg" class="img-responsive" alt="img-banner">
		</div>
		<div class="row site_navbar">
			<?php
			include('assets/template/navbar.php');
			?>
		</div>
		<div class="row site_content">
			<div class="col-md-6 col-md-offset-3">
				<?php
				if (!empty($_GET["result"])) {
					$sql = str_replace("`", "'", $_GET["result"]);
					$results = mysql_query($sql)or die(mysql_error());
					$result = mysql_fetch_array($results);
					?>
					<div class="alert alert-success" role="alert">
						รหัสผ่านของคุณคือ <?php echo $result["password"]; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
				} else if (!empty($_GET["action"])) {
					include_once("assets/template/notice.php");
				}
				?>
				<div class="panel panel-default panel-login">
					<div class="panel-heading">
						<div class="row" id="forgot-header" style="display:none">
							<div class="col-md-4 col-md-offset-4">
								<label for="forgot-header">
									กู้คืนรหัสผ่าน
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<a href="#" id="login-form-link" class="active">เข้าสู่ระบบ</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form action="assets/service/login.php" id="login-form" role="form" method="post" data-toggle="validator"  style="display:block">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="ชื่อผู้ใช้" value="" pattern="[A-z0-9]{1,}$" data-error="กรุณากรอกชื่อผู้ใช้" required>
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="1" class="form-control" placeholder="รหัสผ่าน" value="" data-error="กรุณากรอกรหัสผ่าน" required>
										<div class="help-block with-errors"></div>
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
								<form action="assets/service/login.php" id="forgot-form" role="form" method="post" data-toggle="validator" style="display:none">
									<div class="form-group">
										<input type="email" class="form-control" name="forgot_email" id="forgot_email" tabindex="1" placeholder="ระบุอีเมลล์" value="" data-error="กรุณากรอกอีเมลล์ให้ถูกต้อง" required="">
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
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#forgot-form-link').click(function(e) {
				$("#forgot-form").delay(100).fadeIn(100);
				$("#forgot-header").delay(100).fadeIn(100);
				$("#login-form-link").fadeOut(100);
				$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				e.preventDefault();
			});
			$('#backBtn').click(function(e) {
				$("#login-form-link").delay(100).fadeIn(100);
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