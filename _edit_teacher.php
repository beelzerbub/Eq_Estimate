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
					$teacher = "SELECT * FROM teacher JOIN work_time wt JOIN user 
					WHERE teacher.t_user = user.user_id
					AND teacher.t_id = wt.t_id
					AND teacher.t_id = $t_id";
					$teacher_query = mysql_query($teacher)or die(mysql_error());
					$teacher_fetch = mysql_fetch_object($teacher_query)or die(mysql_error());

					$classroom = "SELECT * FROM classroom";
					$classroom_query = mysql_query($classroom)or die(mysql_error());
					?>
					<form action="assets/service/teacher.php" role="form" method="post" data-toggle="validator" id="teacher-edit_form">
						<input type="hidden" name="teacher_id" value=<?php echo $teacher_fetch->t_id; ?>>
						<input type="hidden" name="user_id" value=<?php echo $teacher_fetch->user_id; ?>>
						<fieldset class="fieldset-form">
							<legend class="legend-form"><h1>แก้ไขข้อมูลครูประจำชั้น</h1></legend>
							<div class="row">
								<div class="col-md-6">
									<label for="InputTeacher">ครูประจำชั้น</label>
									<input type="text" id="teacher_id" class="form-control" value="ครู <?php echo $teacher_fetch->t_name." ".$teacher_fetch->t_surname; ?>" disabled>
								</div>
								<div class="col-md-6">
									<label for="InputClassroom">ห้องเรียน</label>
									<select name="InputClassroom" id="InputClassroom" class="form-control" required>
										<option value="" disabled selected> กรุณาระบุห้องเรียน </option>
										<?php
										while($classroom_fetch = mysql_fetch_array($classroom_query)) {
											?>
											<option value="<?php echo $classroom_fetch[class_id]; ?>"
												<?php echo ($classroom_fetch[class_id] == $teacher_fetch->class_id)? 'SELECTED' : ''; ?>>
												<?php echo $classroom_fetch[class_grade];
												if ($classroom_fetch[class_id] != 0) {
													echo "/".$classroom_fetch[class_number];
												}
												?>
											</option>
											<?php
										}
										?>
									</select>
								</div>
							</div>
							<br>
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
										<label for="InputTerm">ภาคเรียน</label><br>
										<div class="row">
											<div class="col-md-2">
												<input type="radio" name="term_reg" id="term_reg" value="1" <?php echo ($teacher_fetch->wt_term == 1) ? 'CHECKED' : ''; ?> required> <label for="">1</label>
											</div>
											<div class="col-md-2">
												<input type="radio" name="term_reg" id="term_reg" value="2" <?php echo ($teacher_fetch->wt_term == 2) ? 'CHECKED' : ''; ?> required> <label for="">2</label>
											</div>
											<div class="col-md-2">
												<input type="radio" name="term_reg" id="term_reg" value="3" <?php echo ($teacher_fetch->wt_term == 3) ? 'CHECKED' : ''; ?> required> <label for="">3</label>
											</div>
										</div>
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