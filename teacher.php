<?php
include_once("assets/database/connect.php");
include_once("assets/service/teacher.php");
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
					<form action="#" class="form-inline" role="form" method="post" data-toggle="validator" id="teacher-filter_form">
						<fieldset class="fieldset-form">
							<legend class="legend-form">ค้นหาข้อมูลครูประจำชั้น</legend>
							<div class="col-md-10">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" id="filter-keyword" maxlength="50" placeholder="ชื่อ/นามสกุล">
								</div>
								<div class="form-group">
									<label for="filter-class" class="sr-only"></label>
									<select name="filter-class" id="filter-class" class="form-control" required>
										<option value="" disabled selected>ห้องเรียนที่สอน</option>
										<option value="1">อนุบาลปีที่ 1/1</option>
										<option value="2">อนุบาลปีที่ 1/2</option>
										<option value="3">อนุบาลปีที่ 1/3</option>
										<option value="4">อนุบาลปีที่ 2/1</option>
										<option value="5">อนุบาลปีที่ 2/2</option>
										<option value="6">อนุบาลปีที่ 3/1</option>
										<option value="7">อนุบาลปีที่ 3/2</option>
										<option value="8">ประถมศึกษาปีที่ 1/1</option>
										<option value="9">ประถมศึกษาปีที่ 2/1</option>
										<option value="10">ประถมศึกษาปีที่ 3/1</option>
										<option value="11">ประถมศึกษาปีที่ 4/1</option>
										<option value="12">ประถมศึกษาปีที่ 5/1</option>
										<option value="13">ประถมศึกษาปีที่ 6/1</option>
									</select>
								</div>
								<div class="form-group">
									<label for="filter-year" class="sr-only"></label>
									<input type="number" placeholder="ปีการศึกษา" id="filter-year" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="filter-term" class="sr-only"></label>
									<select name="filter-term" id="filter-term" class="form-control" required>
										<option value="" disabled selected>ภาคการเรียน</option>
										<option value="1">ภาคเรียนที่ 1</option>
										<option value="2">ภาคเรียนที่ 2</option>
									</select>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="filterBtn" id="filterBtn" tabindex="1" value="ค้นหา">
								</div>
								<div class="form-group">
									<a href="teacher.php" class="btn btn-primary" name="filterAllBtn" id="filterAllBtn" tabindex="1" value="เลือกทั้งหมด">เลือกทั้งหมด</a>
								</div>
								<div class="form-group">
									<input type="reset"	class="btn btn-danger" name="resetBtn" id="resetBtn" tabindex="1" value="ล้างข้อมูล">
								</div>
							</div>
							<div class="col-md-2">
								<div class="row">
									<div class="col-md-6 col-md-offset-2">
										<div class="form-group">
											<button type="button" class="btn btn-primary btn-insert-teacher" name="insert-teacher-link" id="insert-teacher-link" data-toggle="modal"  data-target="#teacher-insert_box" tabindex="1" value="insert_teacher">เพิ่มข้อมูลครูประจำชั้น</button>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="row site_content-form">
					<div class="modal fade" id="teacher-insert_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<form action="assets/service/teacher.php" role="form" method="post" data-toggle="validator" id="teacher-insert_form">
									<fieldset class="fieldset-form">
										<legend class="legend-form"><h1>เพิ่มข้อมูลครูประจำชั้น</h1></legend>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputTeacherName">ชื่อ</label>
													<input type="text" class="form-control" name="teacher_name" id="teacher_name" placeholder="ชื่อครูประจำชั้น"  maxlength="50" data-error="กรุณาระบุชื่อครูประจำชั้" required>
													<div class="help-block with-errors"></div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputTeacherSurname">นามสกุล</label>
													<input type="text" class="form-control" name="teacher_surname" id="teacher_surname" placeholder="นามสกุลครูประจำชั้" maxlength="50" data-error="กรุณาระบุนามสกุลครูประจำชั้" required>
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputClassRoom">ระดับชั้น</label>
													<select name="classroom" id="classroom" class="form-control" required>
														<option value="" disabled selected>กรุณาเลือก</option>
														<option value="อนุบาลปีที่ 1">ชั้นอนุบาลปีที่ 1</option>
														<option value="อนุบาลปีที่ 2">ชั้นอนุบาลปีที่ 2</option>
														<option value="อนุบาลปีที่ 3">ชั้นอนุบาลปีที่ 3</option>
														<option value="ประถมศึกษาปีที่ 1">ชั้นประถมศึกษาปีที่ 1</option>
														<option value="ประถมศึกษาปีที่ 2">ชั้นประถมศึกษาปีที่ 2</option>
														<option value="ประถมศึกษาปีที่ 3">ชั้นประถมศึกษาปีที่ 3</option>
														<option value="ประถมศึกษาปีที่ 4">ชั้นประถมศึกษาปีที่ 4</option>
														<option value="ประถมศึกษาปีที่ 5">ชั้นประถมศึกษาปีที่ 5</option>
														<option value="ประถมศึกษาปีที่ 6">ชั้นประถมศึกษาปีที่ 6</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputClassNo">เลขที่ห้อง</label>
													<input type="number" id="classroom_number" name="classroom_number" placeholder="เลขที่ห้อง" class="form-control" required data-error="กรุณาระบุห้องเรียน">
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 col-md-offset-4">
												<input type="submit" id="AddTeacherBtn" name="AddTeacherBtn" class="form-control btn btn-add" value="เพิ่มข้อมูลครูประจำชั้น">
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row site_content-table">
					<table id="teacher-table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><p class="text-center">ลำดับ</p></th>
								<th><p class="text-center">ชื่อ - นามสกุล</p></th>
								<th><p class="text-center">ครูประจำชั้นห้อง</p></th>
								<th><p class="text-center">ภาคการเรียน</p></th>
								<th><p class="text-center">แก้ไข</p></th>
								<th><p class="text-center">ลบ</p></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (empty($_GET["filter"])) {
								if (empty($_GET["action"])) {
									$filter = mysql_query("SELECT * FROM teacher")or die(mysql_error());
								} else {
								}
							}
							$counter = 0;
							if (mysql_num_rows($filter) > 0) {
								while($result = mysql_fetch_array($filter)) {
									?>
									<tr>
										<td valign="bottom"><?php echo ++$counter; ?></td>
										<td>คุณครู <?php echo $result["t_name"]; ?> <?php echo $result["t_surname"]; ?></td>
										<td>
											<?php echo get_teacher_room_init($result["t_id"], $year); ?>
										</td>
										<td>
											<?php 
											if (date(m) <= 4 || date(m) >= 11) {
												echo "2/";
												echo $year-1;
											} else {
												echo "1/";
												echo $year;
											}
											?>
										</td>
										<td>
											<p class="text-center">
												<a href="#" class="btn btn-primary" id="teacher_edit-link">แก้ไข</a>
											</p>
										</td>
										<td>
											<?php 
											if ($result["user_role"] == 0) {
												?>
												<p class="text-center">
													<a href="assets/service/user.php?action=delete&user=<?php echo $result["username"]; ?>" class="btn btn-primary" onClick="return confirm('ต้องการลบผู้ใช้ <?php echo $result["username"]; ?> จริงหรือไม่?')" id="user_delete-link">ลบ</a>
												</p>
												<?php
											} else {
												?>
												<p class="text-center">
													<a href="assets/service/user.php?action=rollback&user=<?php echo $result["username"]; ?>" class="btn btn-primary" onClick="return confirm('ต้องการยกเลิกการระงับผู้ใช้ <?php echo $result["username"]; ?> จริงหรือไม่?')" id="user_delete-link">เรียกคืน</a>
												</p>
												<?php
											}
											?>
										</td>
									</tr>
									<?php
								}
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