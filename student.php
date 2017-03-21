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
		<div class="row site__header">
			<img src="image/banner.jpg" class="img-responsive" alt="">
		</div>
		<div class="row site__navbar">
			<?php
			include('assets/template/navbar.php');
			?>
		</div>
		<div class="row site__content">
			<div class="col-md-12">
				<div class="row">
					<form action="#" class="form-inline" role="form" method="post" data-toggle="validator" id="student-filter-form">
						<fieldset>
							<legend>ข้อมูลนักเรียน</legend>
							<div class="col-md-9">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" id="filter-keyword" maxlength="50" placeholder="ชื่อ/นามสกุล/รหัสบัตรประชาชน">
								</div>
								<div class="form-group">
									<label for="filter-class" class="sr-only"></label>
									<select name="filter-class" id="filter-class" class="form-control" required>
										<option value="0">ระดับการศึกษา</option>
										<option value="-1">อนุบาลปีที่ 1</option>
										<option value="-2">อนุบาลปีที่ 2</option>
										<option value="-3">อนุบาลปีที่ 3</option>
										<option value="1">ประถมศึกษาปีที่ 1</option>
										<option value="2">ประถมศึกษาปีที่ 2</option>
										<option value="3">ประถมศึกษาปีที่ 3</option>
										<option value="4">ประถมศึกษาปีที่ 4</option>
										<option value="5">ประถมศึกษาปีที่ 5</option>
										<option value="6">ประถมศึกษาปีที่ 6</option>
									</select>
								</div>
								<div class="form-group">
									<label for="filter-year" class="sr-only"></label>
									<input type="number" data-errors="กรุณาระบุปีการศึกษาที่ต้องการดูข้อมูล" placeholder="ปีการศึกษา" id="filter-year" class="form-control" required>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="filterBtn" id="filterBtn" tabindex="1" value="ค้นหา">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" name="filterAllBtn" id="filterAllBtn" tabindex="1" value="เลือกทั้งหมด">
								</div>
								<div class="form-group">
									<input type="reset"	class="btn btn-danger" name="resetBtn" id="resetBtn" tabindex="1" value="ล้างข้อมูล">
								</div>
							</div>
							<div class="col-md-3" id="insert-btn">
								<div class="form-group">
									<input type="button" class="btn btn-primary btn-insert-std" name="insert-student-form" id="insert-student-form" data-toggle="collapse" data-target="#insert-student-form" aria-expanded="false" tabindex="1" value="เพิ่มข้อมูลนักเรียน">
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<br>
				<div class="row">
					<table id="student-table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><p class="text-center">ลำดับ</p></th>
								<th><p class="text-center">รหัสบัตรประชาชน</p></th>
								<th><p class="text-center">คำนำหน้า</p></th>
								<th><p class="text-center">ชื่อ</p></th>
								<th><p class="text-center">นามสกุล</p></th>
								<th><p class="text-center">อายุ</p></th>
								<th><p class="text-center">ระดับการศึกษาปัจจุบัน</p></th>
								<th><p class="text-center">ลบ</p></th>
								<th><p class="text-center">แก้ไข</p></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row site__footer">
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