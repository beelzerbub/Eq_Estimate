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
					<form action="" class="form-inline" role="form" method="post" data-toggle="validator" id="teacher-filter_form">
						<fieldset class="fieldset-form">
							<legend class="legend-form">ค้นหาข้อมูลครูประจำชั้น</legend>
							<div class="col-md-10">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" id="filter-keyword" name="filter-keyword" maxlength="50" placeholder="ชื่อ/นามสกุล">
								</div>
								<div class="form-group">
									<label for="filter-class" class="sr-only"></label>
									<select name="filter-class" id="filter-class" class="form-control" required>
										<option value="" disabled selected>ห้องเรียน</option>
										<option value="-1">ทั้งหมด</option>
										<option value="0">ไม่ระบุ</option>
										<option value="1">อนุบาลปีที่ 1/1</option>
										<option value="2">อนุบาลปีที่ 1/2</option>
										<option value="3">อนุบาลปีที่ 1/3</option>
										<option value="4">อนุบาลปีที่ 2/1</option>
										<option value="5">อนุบาลปีที่ 2/2</option>
										<option value="6">อนุบาลปีที่ 3/1</option>
										<option value="7">อนุบาลปีที่ 3/2</option>
										<option value="8">ประถมศึกษาปีที่ 1</option>
										<option value="9">ประถมศึกษาปีที่ 2</option>
										<option value="10">ประถมศึกษาปีที่ 3</option>
										<option value="11">ประถมศึกษาปีที่ 4</option>
										<option value="12">ประถมศึกษาปีที่ 5</option>
										<option value="13">ประถมศึกษาปีที่ 6</option>
									</select>
								</div>
								<div class="form-group">
									<label for="filter-year" class="sr-only"></label>
									<input type="number" placeholder="ปีการศึกษา" id="filter-year" name="filter-year" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="filter-term" class="sr-only"></label>
									<select name="filter-term" id="filter-term" class="form-control" required>
										<option value="" disabled selected>ภาคเรียน</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="filterBtn" id="filterBtn" tabindex="1" value="ค้นหา">
								</div>
								<div class="form-group">
									<a href="" class="btn btn-primary" name="filterAllBtn" id="filterAllBtn" tabindex="1" value="เลือกทั้งหมด">เลือกทั้งหมด</a>
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
									<?php
									$teacher = "SELECT * FROM user WHERE user_role = 2";
									$teacher_query = mysql_query($teacher)or die(mysql_error());

									$classroom = "SELECT * FROM classroom";
									$classroom_query = mysql_query($classroom);
									?>
									<fieldset class="fieldset-form">
										<legend class="legend-form"><h1>เพิ่มข้อมูลครูประจำชั้น</h1></legend>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputTeacher">ครูประจำชั้น</label>
													<select name="InputTeacher" id="InputTeacher" class="form-control">
														<option value="" disabled selected>กรุณาเลือกครูประจำชั้น</option>
														<?php
														while($teacher_fetch = mysql_fetch_array($teacher_query)) {
															?>
															<option value="<?php echo $teacher_fetch[user_id]; ?>">ครู <?php echo $teacher_fetch[user_name]." ".$teacher_fetch[user_surname]; ?></option>
															<?php
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputClassroom">ห้องเรียน</label>
													<select name="InputClassroom" id="InputClassroom" class="form-control" required>
														<option value="" disabled selected> กรุณาระบุห้องเรียน </option>
														<?php
														while($classroom_fetch = mysql_fetch_array($classroom_query)) {
															?>
															<option value="<?php echo $classroom_fetch[class_id]; ?>"><?php echo $classroom_fetch[class_grade];
																if ($classroom_fetch[class_id] != 0) {
																	echo "/".$classroom_fetch[class_number];
																}
																?></option>
																<?php
															}
															?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="InputYear">ปีการศึกษา</label>
														<input type="number" class="form-control" name="year_reg" id="year_reg" placeholder="ปีการศึกษา (25xx)" required data-error="กรุณาระบุปีการศึกษา">
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="InputTerm">ภาคเรียน</label>
														<select name="term_reg" id="term_reg" class="form-control" required>
															<option value="" disabled selected>กรุณาเลือก</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
														</select>
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
								if ($_POST["filterBtn"]) {
									$keyword = $_POST["filter-keyword"];
									$class_id = $_POST["filter-class"];
									$year = $_POST["filter-year"];
									$term = $_POST["filter-term"];
									$filter = "SELECT * FROM teacher t JOIN work_time wt JOIN classroom c
									WHERE wt.t_id = t.t_id
									AND wt.class_id = c.class_id
									AND wt.wt_year = $year
									AND wt.wt_term = $term
									ORDER BY c.class_id ASC";
									if ($class_id > -1) {
										$filter .= " AND c.class_id = $class_id";
									}
									if (!empty($keyword)) {
										$filter .= " AND (t.t_name LIKE '%$keyword%'
										OR t.t_surname LIKE '%$keyword%')";
									} 
									$filter_query = mysql_query($filter)or die(mysql_error());
								} else {
									if (date(m) <= 4 || date(m) >= 11) {
										$year = $year-1;
										$term = 2;
									} else {
										$year = $year;
										$term = 1;
									}
									$filter_query = mysql_query("SELECT * FROM teacher t JOIN work_time wt JOIN classroom c
										WHERE (c.class_id = wt.class_id
										AND wt.wt_term = $term
										AND wt.wt_year = $year
										AND wt.t_id = t.t_id)")or die(mysql_error());
								}
								$counter = 0;
								if (mysql_num_rows($filter_query) > 0) {
									while($result = mysql_fetch_array($filter_query)) {
										?>
										<tr <?php if ($result["t_status == -1"]) { echo "style='color:red'"; } ?>>
											<td valign="middle"><?php echo ++$counter; ?></td>
											<td>คุณครู <?php echo $result["t_name"]." ".$result["t_surname"]; ?></td>
											<td><?php echo get_teacher_room($result["t_id"], $result["wt_year"], $result["wt_term"]); ?></td>
											<td><?php echo $result["wt_term"]."/".$result["wt_year"];?></td>
											<td>
												<p class="text-center">
													<a href="_edit_teacher.php?id=<?php echo $result[t_id]; ?>" class="btn btn-primary" id="teacher_edit-link">แก้ไข</a>
												</p>
											</td>
											<td>
												<p class="text-center">
													<a href="assets/service/teacher.php?action=delete&id=<?php echo $result["t_id"]; ?>&year=<?php echo $year; ?>&term=<?php echo $term;?>" class="btn btn-primary" onClick="return confirm('ต้องการลบข้อมูลครู <?php echo $result["t_name"]; ?> จริงหรือไม่?')" id="teacher_delete-link">ลบ</a>
												</p>
											</td>
										</tr>
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