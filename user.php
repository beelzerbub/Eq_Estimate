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
				<div class="row site_content-filter">
					<form action="" class="form-inline" id="user-filter_form" name="user-filter_form" role="form" method="POST" data-toggle="validator">
						<fieldset class="fieldset-form">
							<legend class="legend-form">ข้อมูลผู้ใช้</legend>
							<div class="col-md-7">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" id="filter-keyword" name="filter-keyword" maxlength="50" placeholder="ชื่อผู้ใช้/ชื่อ/นามสกุล/อีเมลล์" required>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="filterBtn" id="filterBtn" value="ค้นหา">
								</div>
								<div class="form-group">
									<a href="user.php" class="btn btn-primary" name="filterAllBtn" id="filterAllBtn" tabindex="1" value="เลือกทั้งหมด">ค้นหาทั้งหมด</a>
								</div>
								<div class="form-group">
									<input type="reset" class="btn btn-danger" name="resetBtn" id="resetBtn" value="ล้างข้อมูล">
								</div>
							</div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-3 col-md-offset-9">
										<button type="button" class="btn btn-primary insert_user-link" name="insert_user-link" data-toggle="modal" data-target="#insert_user-box" value="insert_user">เพิ่มข้อมูลผู้ใช้</button>
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
								<form action="assets/service/user.php" role="form" method="post" data-toggle="validator" id="insert_user-form">
									<fieldset class="fieldset-form">
										<legend class="legend-form"><h1>เพิ่มข้อมูลผู้ใช้</h1></legend>
										<div class="form-group">
											<label for="reg_username">ชื่อผู้ใช้</label>
											<input type="text" name="reg_username" id="reg_username" tabindex="1" class="form-control" placeholder="ชื่อผู้ใช้" pattern="[A-z0-9]{1,}$" data-error="กรุณาตรวจสอบความถูกต้อง" value="" required>
											<div class="help-block with-errors"></div>
											<span class="help-block small">
												<ul>
													<li>ใช้ตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น</li>
												</ul>
											</span>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label for="reg_password">รหัสผ่าน</label>
													<input type="password" name="reg_password" id="reg_password" tabindex="1" class="form-control" data-error="กรุณาตรวจสอบความถูกต้องของรหัสผ่าน" placeholder="รหัสผ่าน" value="" required>
													<span class="help-block small">
														<ul>
															<li>ใช้ตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น</li>
														</ul>
													</span>
												</div>
												<div class="col-md-6">
													<label for="reg_passwordConfirm">ยืนยันรหัสผ่าน</label>
													<input type="password" name="reg_passwordConfirm" data-match="#reg_password" class="form-control"  placeholder="ยืนยันรหัสผ่าน" value="" data-error="กรุณาตรวจสอบความถูกต้องของรหัสยืนยัน" required>
												</div>
											</div>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group">
											<label for="reg_email">อีเมล</label>
											<input type="email" name="reg_email" id="reg_email" tabindex="1" class="form-control" placeholder="อีเมลล์" value="" data-error="กรุณาตรวจสอบความถูกต้อง อีเมลล์ต้องมีลักษณะดังนี้ example@mail.com" required>
											<div class="help-block with-errors"></div>
											<span class="help-block small">( กรุณาระบุอีเมลล์ที่ใช้งานได้จริง )</span>
										</div>
										<div class="form-group">
											<label for="reg_name">ชื่อ</label>
											<input type="name" name="reg_name" id="reg_name" tabindex="1" class="form-control" placeholder="ชื่อ" value="" required>
											<span class="help-block small">( กรุณาระบุชื่อ เพื่อประโยชน์ในการใช้เก็บข้อมูล) </span>
										</div>
										<div class="form-group">
											<label for="reg_surnme">นามสกุล</label>
											<input type="reg_surname" name="reg_surname" id="reg_surname" tabindex="1" class="form-control" placeholder="นามสกุล" value="" required>
											<span class="help-block small">( กรุณาระบุนามสกุล เพื่อประโยชน์ในการใช้เก็บข้อมูล)</span>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label for="reg_role">ประเภทผู้ใช้</label>
												</div>
												<div class="col-md-8 col-md-pull-1">
													<label for="reg_role" class="radio-inline">
														<input type="radio" name="reg_role" value="2" required> ครูประจำชั้น
													</label>
													<label for="reg_role" class="radio-inline">
														<input type="radio" name="reg_role" value="8" required> ผู้ดูแลระบบ
													</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6 col-md-offset-3">
													<input type="submit" name="regBtn" id="regBtn" tabindex="4" class="form-control btn btn-register" value="เพิ่มข้อมูลผู้ใช้">
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
								<th><p class="text-center">อีเมล</p></th>
								<th><p class="text-center">สิทธิ์ผู้ใช้</p></th>
								<th><p class="text-center">ประเภทผู้ใช้</p></th>
								<th><p class="text-center">แก้ไข</p></th>
								<th><p class="text-center">ลบ</p></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($_POST["filterBtn"]) {
								$keyword = $_POST["filter-keyword"];
								$filter = "SELECT * FROM user
								WHERE username LIKE '%$keyword%'
								OR user_email LIKE '%$keyword%'
								OR user_name LIKE '%$keyword%'
								OR user_surname LIKE '%$keyword%'";
								$filter_query = mysql_query($filter)or die(mysql_error());
							} else {
								$filter_query = mysql_query("SELECT * FROM user")or die(mysql_error());
							}
							$counter = 0;
							if (mysql_num_rows($filter_query) > 0) {
								while($result = mysql_fetch_array($filter_query)) {
									?>
									<tr <?php
									if ($result["user_role"] == -99) {
										echo "style='color:red;'";
									}
									?>>
									<td class="text-center"><?php echo ++$counter; ?></td>
									<td><?php echo $result["username"]; ?></td>
									<td><?php echo $result["user_name"]; ?></td>
									<td><?php echo $result["user_surname"]; ?></td>
									<td><?php echo $result["user_email"]; ?></td>
									<td class="text-center">ระดับ <?php echo $result["user_role"]; ?></td>
									<td class="text-center"><?php echo get_user_type($result["username"]); ?></td>
									<td>
										<p class="text-center">
											<a href="_edit_user.php?id=<?php echo $result["user_id"]; ?>" class="btn btn-primary" id="user_edit-link">แก้ไข</a>
										</p>
									</td>
									<td>
										<?php 
										if ($result["user_role"] > 0) {
											?>
											<p class="text-center">
												<a href="assets/service/user.php?action=delete&id=<?php echo $result["user_id"]; ?>" class="btn btn-primary" onClick="return confirm('ต้องการลบผู้ใช้ <?php echo $result["username"]; ?> จริงหรือไม่?')" id="user_delete-link">ลบ</a>
											</p>
											<?php
										} else {
											?>
											<p class="text-center">
												<a href="assets/service/user.php?action=rollback&id=<?php echo $result["user_id"]; ?>" class="btn btn-primary" onClick="return confirm('ต้องการยกเลิกการระงับผู้ใช้ <?php echo $result["username"]; ?> จริงหรือไม่?')" id="user_delete-link">เรียกคืน</a>
											</p>
											<?php
										}
										?>
									</td>
								</tr>
								<?php
							}
						} else {
							?>
							<tr>
								<td colspan="9">
									<div class="alert alert-danger" role="alert">
										<p class="text-center">ขออภัย ไม่พบข้อมูลที่ต้องการค้นหา</p>
									</div>
								</tr>
								<?
							}
							?>
						</tbody>
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
</body>
</html>