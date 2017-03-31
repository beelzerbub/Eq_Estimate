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
					<form action="#" class="form-inline" role="form" method="post" data-toggle="validator" id="teacher-filter_form">
						<fieldset class="fieldset-form">
							<legend class="legend-form">ค้นหาข้อมูลครูประจำชั้น</legend>
							<div class="col-md-9">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" id="filter-keyword" maxlength="50" placeholder="ชื่อ/นามสกุล/ห้องเรียน">
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
									<div class="col-md-6 col-md-offset-5">
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
								<form action="#" role="form" method="post" data-toggle="validator" id="teacher-insert_form">
									<fieldset class="fieldset-form">
										<legend class="legend-form"><h1>เพิ่มข้อมูลนักเรียน</h1></legend>
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
														<option value="-1">ชั้นอนุบาลปีที่ 1</option>
														<option value="-2">ชั้นอนุบาลปีที่ 2</option>
														<option value="-3">ชั้นอนุบาลปีที่ 3</option>
														<option value="1">ชั้นประถมศึกษาปีที่ 1</option>
														<option value="2">ชั้นประถมศึกษาปีที่ 2</option>
														<option value="3">ชั้นประถมศึกษาปีที่ 3</option>
														<option value="4">ชั้นประถมศึกษาปีที่ 4</option>
														<option value="5">ชั้นประถมศึกษาปีที่ 5</option>
														<option value="6">ชั้นประถมศึกษาปีที่ 6</option>
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
								<th><p class="text-center">ห้องเรียน</p></th>
								<th><p class="text-center">ปีการศึกษา</p></th>
								<th><p class="text-center">ชื่อผู้ใช้</p></th>
								<th><p class="text-center">สถานะผู้ใช้</p></th>
								<th><p class="text-center">แก้ไข</p></th>
								<th><p class="text-center">ลบ</p></th>
							</tr>
						</thead>
						<tbody>
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