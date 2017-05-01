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
					$t_id = $_GET['id'];
					$teacher = get_teacher_byPK($t_id);
					$teacher_fetch = mysql_fetch_object($teacher)or die(mysql_error());
					?>
					<form action="assets/service/teacher.php" role="form" method="post" data-toggle="validator" id="teacher-insert_form">
						<input type="hidden" name="id" value=<?php echo $teacher_fetch->t_id; ?>>
						<fieldset class="fieldset-form">
							<legend class="legend-form"><h1>แก้ไขข้อมูลครูประจำชั้น</h1></legend>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="InputTeacherName">ชื่อ</label>
										<input type="text" class="form-control" name="teacher_name" id="teacher_name" placeholder="ชื่อครูประจำชั้น" value="<?php echo $teacher_fetch->t_name; ?>" maxlength="50" data-error="กรุณาระบุชื่อครูประจำชั้น" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="InputTeacherSurname">นามสกุล</label>
										<input type="text" class="form-control" name="teacher_surname" id="teacher_surname" placeholder="นามสกุลครูประจำชั้น" value="<?php echo $teacher_fetch->t_surname; ?>" maxlength="50" data-error="กรุณาระบุนามสกุลครูประจำชั้น" required>
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
											<option value="อนุบาลปีที่ 1" <?php echo ($teacher_fetch->class_id == 1)? 'SELECTED' : '' ?>>ชั้นอนุบาลปีที่ 1/1</option>
											<option value="อนุบาลปีที่ 1" <?php echo ($teacher_fetch->class_id == 2)? 'SELECTED' : '' ?>>ชั้นอนุบาลปีที่ 1/2</option>
											<option value="อนุบาลปีที่ 1" <?php echo ($teacher_fetch->class_id == 3)? 'SELECTED' : '' ?>>ชั้นอนุบาลปีที่ 1/3</option>
											<option value="อนุบาลปีที่ 2" <?php echo ($teacher_fetch->class_id == 4)? 'SELECTED' : '' ?>>ชั้นอนุบาลปีที่ 2/1</option>
											<option value="อนุบาลปีที่ 2" <?php echo ($teacher_fetch->class_id == 5)? 'SELECTED' : '' ?>>ชั้นอนุบาลปีที่ 2/2</option>
											<option value="อนุบาลปีที่ 3" <?php echo ($teacher_fetch->class_id == 6)? 'SELECTED' : '' ?>>ชั้นอนุบาลปีที่ 3/1</option>
											<option value="อนุบาลปีที่ 2" <?php echo ($teacher_fetch->class_id == 7)? 'SELECTED' : '' ?>>ชั้นอนุบาลปีที่ 3/2</option>
											<option value="ประถมศึกษาปีที่ 1" <?php echo ($teacher_fetch->class_id == 8)? 'SELECTED' : '' ?>>ชั้นประถมศึกษาปีที่ 1</option>
											<option value="ประถมศึกษาปีที่ 2" <?php echo ($teacher_fetch->class_id == 9)? 'SELECTED' : '' ?>>ชั้นประถมศึกษาปีที่ 2</option>
											<option value="ประถมศึกษาปีที่ 3" <?php echo ($teacher_fetch->class_id == 10)? 'SELECTED' : '' ?>>ชั้นประถมศึกษาปีที่ 3</option>
											<option value="ประถมศึกษาปีที่ 4" <?php echo ($teacher_fetch->class_id == 11)? 'SELECTED' : '' ?>>ชั้นประถมศึกษาปีที่ 4</option>
											<option value="ประถมศึกษาปีที่ 5" <?php echo ($teacher_fetch->class_id == 12)? 'SELECTED' : '' ?>>ชั้นประถมศึกษาปีที่ 5</option>
											<option value="ประถมศึกษาปีที่ 6" <?php echo ($teacher_fetch->class_id == 13)? 'SELECTED' : '' ?>>ชั้นประถมศึกษาปีที่ 6</option>
											<option value="ไม่ระบุ" <?php echo ($teacher_fetch->class_id == 0)? 'SELECTED' : '' ?>>ไม่ระบุ</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="InputClassNo">เลขที่ห้อง</label>
										<input type="number" id="classroom_number" name="classroom_number" placeholder="เลขที่ห้อง" value="<?php echo $teacher_fetch->class_number; ?>" class="form-control" required data-error="กรุณาระบุห้องเรียน">
										<div class="help-block with-errors"></div>
										<span class="help-block small">
											<ul>
												<li>(กรณี "ไม่ระบุ" ระดับชั้นให้ใส่เลขที่ห้องเป็น 0)</li>
											</ul>
										</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="InputYear">ปีการศึกษา</label>
										<input type="number" class="form-control" name="year_reg" id="year_reg" placeholder="ปีการศึกษา (ระบุเป็นปี พ.ศ.)" value="<?php echo $teacher_fetch->wt_year; ?>" required data-error="กรุณาระบุปีการศึกษา">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="InputTerm">ภาคเรียน</label>
										<select name="term_reg" id="term_reg" class="form-control" required>
											<option value="" disabled selected>กรุณาเลือก</option>
											<option value="1" <?php echo ($teacher_fetch->wt_term == 1) ? 'SELECTED' : ''; ?>>1</option>
											<option value="2" <?php echo ($teacher_fetch->wt_term == 2) ? 'SELECTED' : ''; ?>>2</option>
											<option value="3" <?php echo ($teacher_fetch->wt_term == 3) ? 'SELECTED' : ''; ?>>3</option>
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