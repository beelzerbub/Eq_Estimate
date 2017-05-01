<?php
include_once("assets/database/connect.php");
include_once("assets/service/login.php");
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
					$id = $_GET['id'];
					$student = get_teacher_byPK($id);
					$student_fetch = mysql_fetch_object($student)or die(mysql_error());
					?>
					<form action="assets/service/student.php" role="form" method="post" data-toggle="validator" id="student-insert_form">
						<input type="hidden" name="id" value="<?php echo $student_fetch->Std_no; ?>">
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
								<div class="col-md-6">
									<div class="form-group">
										<label for="InputYear">ปีการศึกษา</label>
										<input type="number" id="year_reg" name="year_reg" placeholder="ปีการศึกษา" class="form-control" data-error="กรุณาระบุปีการศึกษาที่ต้องการเพิ่มข้อมูล" required>
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
									<input type="submit" id="updateBtn" name="updateBtn" class="form-control btn btn-add" value="แก้ไขข้อมูล">
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