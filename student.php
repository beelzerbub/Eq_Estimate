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
					<form action="#" class="form-inline" role="form" method="post" data-toggle="validator" id="student-filter_form">
						<fieldset class="fieldset-form">
							<legend class="legend-form">ค้นหาข้อมูลนักเรียน</legend>
							<div class="col-md-9">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" id="filter-keyword" maxlength="50" placeholder="ชื่อ/นามสกุล/รหัสบัตรประชาชน">
								</div>
								<div class="form-group">
									<label for="filter-class" class="sr-only"></label>
									<select name="filter-class" id="filter-class" class="form-control" required>
										<option value="" disabled selected>ระดับการศึกษา</option>
										<option value="อนุบาลปีที่ 1">ชั้นอนุบาลปีที่ 1/1</option>
										<option value="อนุบาลปีที่ 1">ชั้นอนุบาลปีที่ 1/2</option>
										<option value="อนุบาลปีที่ 1">ชั้นอนุบาลปีที่ 1/3</option>
										<option value="อนุบาลปีที่ 2">ชั้นอนุบาลปีที่ 2/1</option>
										<option value="อนุบาลปีที่ 2">ชั้นอนุบาลปีที่ 2/2</option>
										<option value="อนุบาลปีที่ 3">ชั้นอนุบาลปีที่ 3/1</option>
										<option value="อนุบาลปีที่ 2">ชั้นอนุบาลปีที่ 3/2</option>
										<option value="ประถมศึกษาปีที่ 1">ชั้นประถมศึกษาปีที่ 1</option>
										<option value="ประถมศึกษาปีที่ 2">ชั้นประถมศึกษาปีที่ 2</option>
										<option value="ประถมศึกษาปีที่ 3">ชั้นประถมศึกษาปีที่ 3</option>
										<option value="ประถมศึกษาปีที่ 4">ชั้นประถมศึกษาปีที่ 4</option>
										<option value="ประถมศึกษาปีที่ 5">ชั้นประถมศึกษาปีที่ 5</option>
										<option value="ประถมศึกษาปีที่ 6">ชั้นประถมศึกษาปีที่ 6</option>
									</select>
								</div>
								<div class="form-group">
									<label for="filter-year" class="sr-only"></label>
									<input type="number" placeholder="ปีการศึกษา" id="filter-year" class="form-control" required>
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
							<div class="col-md-3">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<button type="button" class="btn btn-primary btn-insert-std" name="insert-student-link" id="insert-student-link" data-toggle="modal"  data-target="#student-insert_box" tabindex="1" value="insert_student">เพิ่มข้อมูลนักเรียน</button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<button type="button" class="btn btn-primary btn-import-std" name="import-student-link" id="import-student-link" data-toggle="modal"  data-target="#student-import_box" tabindex="1" value="import_student">นำเข้าข้อมูลนักเรียน</button>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>	
				<div class="row site_content-form">
					<!-- Large modal -->
					<div class="modal fade" id="student-insert_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<form action="assets/service/student.php" role="form" method="post" data-toggle="validator" id="student-insert_form">
									<fieldset class="fieldset-form">
										<legend class="legend-form"><h1>เพิ่มข้อมูลนักเรียน</h1></legend>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputStdID">รหัสบัตรประชาชน</label>
													<input type="text" class="form-control" name="std_id" id="std_id" placeholder="รหัสบัตรประชาชน" maxlength="13" data-minlength="13" pattern="[0-9]{1,}$" data-error="( กรุณาตรวจสอบรหัสบัตรประชาชน รหัสบัตรประชาชนต้องประกอบด้วยตัวเลข 13 หลัก โดยไม่ต้องใส่ช่องว่างหรือเครื่องหมาย - )" required>
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputStdName">ชื่อ</label>
													<input type="text" class="form-control" name="std_name" id="std_name" placeholder="ชื่อนักเรียน"  maxlength="50" data-error="กรุณาระบุชื่อนักเรียน" required>
													<div class="help-block with-errors"></div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputStdSurname">นามสกุล</label>
													<input type="text" class="form-control" name="std_surname" id="std_surname" placeholder="นามสกุลนักเรียน" maxlength="50" data-error="กรุณาระบุนามสกุลนักเรียน" required>
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputStdAge">อายุ</label>
													<input type="number" class="form-control" name="std_age" id="std_age" placeholder="อายุ" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputStdGender">เพศ</label>
													<select class="form-control" name="std_gender" id="std_gender" required>
														<option value="" disabled selected>กรุณาเลือก</option>
														<option value="1">หญิง</option>
														<option value="2">ชาย</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="InputClassRoom">ระดับชั้น</label>
													<select name="classroom" id="classroom" class="form-control" required>
														<option value="" disabled selected>กรุณาเลือก</option>
														<option value="1">ชั้นอนุบาลปีที่ 1/1</option>
														<option value="2">ชั้นอนุบาลปีที่ 1/2</option>
														<option value="3">ชั้นอนุบาลปีที่ 1/3</option>
														<option value="4">ชั้นอนุบาลปีที่ 2/1</option>
														<option value="5">ชั้นอนุบาลปีที่ 2/2</option>
														<option value="6">ชั้นอนุบาลปีที่ 3/1</option>
														<option value="7">ชั้นอนุบาลปีที่ 3/2</option>
														<option value="8">ชั้นประถมศึกษาปีที่ 1</option>
														<option value="9">ชั้นประถมศึกษาปีที่ 2</option>
														<option value="10">ชั้นประถมศึกษาปีที่ 3</option>
														<option value="11">ชั้นประถมศึกษาปีที่ 4</option>
														<option value="12">ชั้นประถมศึกษาปีที่ 5</option>
														<option value="13">ชั้นประถมศึกษาปีที่ 6</option>
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
												<input type="submit" id="AddStdBtn" name="AddStdBtn" class="form-control btn btn-add" value="เพิ่มข้อมูลนักเรียน">
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<!-- end student-insert_box -->
					<div class="modal fade" id="student-import_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<form action="#" id="student-import_form" role="form" method="post" data-toggle="validator" >
									<fieldset class="fieldset-form">
										<legend class="legend-form"><h1>นำเข้าข้อมูลนักเรียนด้วยไฟล์ CSV</h1></legend>
										<div class="form-group">
											<label for="InputFileCsv">เลือก File CSV ที่ต้องการนำเข้า : </label>
											<input type="file" class="form-control" data-error="กรุณาเลือกไฟล์ ที่ต้องการนำเข้าข้อมูลนักเรียน" required />
											<div class="help-block with-errors"></div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-4 col-md-offset-4">
												<input type="submit" id="ImportStdBtn" name="ImportStdBtn" tabindex="" class="form-control btn btn-add" value="นำเข้าข้อมูล">
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<!-- end student-import_box -->
				</div>
				<div class="row site_content-table">
					<table id="student-table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><p class="text-center">ลำดับ</p></th>
								<th><p class="text-center">รหัสบัตรประชาชน</p></th>
								<th><p class="text-center">ชื่อ - นามสกุล</p></th>
								<th><p class="text-center">อายุ</p></th>
								<th><p class="text-center">ห้องเรียน</p></th>
								<th><p class="text-center">ปีการศึกษา</p></th>
								<th><p class="text-center">แก้ไข</p></th>
								<th><p class="text-center">ลบ</p></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (empty($_GET["filter"])) {
								if (date(m) <= 4 || date(m) >= 11) {
									$year_init = $year-1;
									$term_init = 2;
								} else {
									$year_init = $year;
									$term_init = 1;
								}
								$filter = mysql_query("SELECT * FROM student s JOIN term t JOIN classroom c
									WHERE s.Std_id = t.Std_id
									AND t.Term_year = $year_init
									AND t.Term = $term_init
									AND t.Class_id = c.Class_id")or die(mysql_error());
							}
							$counter = 0;
							if (mysql_num_rows($filter) > 0) {
								while ($result = mysql_fetch_array($filter)) {
									?>
									<tr>
										<td><?php echo ++$counter; ?></td>
										<td><?php echo $result[Std_id]; ?></td>
										<td>
											<?php if ($result[Std_gender] == 1) { echo "เด็กหญิง ";} else { echo "เด็กชาย "; } ?> 
											<?php echo $result[Std_name]; ?>
											<?php echo $result[Std_surname]; ?>
										</td>
										<td><?php echo $result[Std_age]; ?> ปี</td>
										<td><?php echo $result[class_grade]; ?> ห้อง <?php echo $result[class_number];?></td>
										<td><?php echo $result[Term]."/".$result[Term_year];?></td>
										<td>
											<p class="text-center">
												<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_student-box" id="student_edit-link">แก้ไข</a>
											</p>
										</td>
										<td>
											<p class="text-center">
												<a href="assets/service/teacher.php?action=delete&id=<?php echo $result["Std_id"]; ?>" class="btn btn-primary" onClick="return confirm('ต้องการลบข้อมูลครู <?php echo $result["Std_name"]; ?> จริงหรือไม่?')" id="student_delete-link">ลบ</a>
											</p>
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