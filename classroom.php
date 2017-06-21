<?php
include_once("assets/database/connect.php");
include_once("assets/service/classroom.php");
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
					<p class="text-right">
						<button type="button" class="btn btn-primary btn-insert-std" name="insert-classroom-link" id="insert-classroom-link" data-toggle="modal"  data-target="#classroom-insert_box" tabindex="1" value="insert_classroom">เพิ่มข้อมูลห้องเรียน</button>
					</p>
				</div>	
				<div class="row site_content-form">
					<!-- Large modal -->
					<div class="modal fade" id="classroom-insert_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<form action="assets/service/classroom.php" role="form" method="post" data-toggle="validator" id="student-insert_form">
									<fieldset class="fieldset-form">
										<legend class="legend-form"><h1>เพิ่มข้อมูลห้องเรียน</h1></legend>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputClassName">ระดับชั้น</label>
													<select name="class_grade" id="class_grade" class="form-control" required>
														<option value="" disabled selected>กรุณาเลือก</option>
														<option value="อนุบาลปีที่ 1">อนุบาลปีที่ 1</option>
														<option value="อนุบาลปีที่ 2">อนุบาลปีที่ 2</option>
														<option value="อนุบาลปีที่ 3">อนุบาลปีที่ 3</option>
														<option value="ประถมศึกษาปีที่ 1">ประถมศึกษาปีที่ 1</option>
														<option value="ประถมศึกษาปีที่ 2">ประถมศึกษาปีที่ 2</option>
														<option value="ประถมศึกษาปีที่ 3">ประถมศึกษาปีที่ 3</option>
														<option value="ประถมศึกษาปีที่ 4">ประถมศึกษาปีที่ 4</option>
														<option value="ประถมศึกษาปีที่ 5">ประถมศึกษาปีที่ 5</option>
														<option value="ประถมศึกษาปีที่ 6">ประถมศึกษาปีที่ 6</option>
													</select>
												</div>
												<div class="form-group">
													<label for="InputClassNumber">เลขห้อง</label>
													<input type="number" name="class_number" id="class_number" class="form-control" data-error="( กรุณาระบุเลขที่ห้องเรียน )" pattern="[0-9]{1,}$">
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 col-md-offset-4">
												<input type="submit" id="AddClassBtn" name="AddClassBtn" class="form-control btn btn-add" value="เพิ่มข้อมูลนักเรียน">
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<!-- end classroom-insert_box -->
				</div>
				<div class="row site_content-table">
					<?php
					$filter = "SELECT * FROM classroom";
					$filter_query = mysql_query($filter)or die(mysql_error());
					$counter = 0;
					?>
					<table id="student-table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><p class="text-center">ลำดับ</p></th>
								<th><p class="text-center">ระดับชั้น</p></th>
								<th><p class="text-center">ลบ</p></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (mysql_num_rows($filter_query) > 0) {
								while ($result = mysql_fetch_array($filter_query)) {
									if ($result[class_id != 0]) {
										?>
										<tr>
											<td class="text-center"><?php echo ++$counter; ?></td>
											<td><?php echo $result[class_grade]."/".$result[class_number]; ?></td>
											<td>
												<p class="text-center">
													<a href="assets/service/classroom.php?action=delete&id=<?php echo $result["class_id"]; ?>" class="btn btn-primary" onClick="return confirm('ต้องการลบข้อมูลห้อง <?php echo $result["class_grade"].'/'.$result["class_number"]; ?> จริงหรือไม่?')" id="student_delete-link">ลบ</a>
												</p>
											</td>
										</tr>
										<?php
									}
									?>
									<?php
								}
							} else {
								?>
								<tr>
									<td colspan="8">
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