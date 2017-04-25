<?php
include_once("assets/database/connect.php");
include_once("assets/service/estimate.php");
if ($_SESSION["user_role"] < 2) {
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
				<div class="row site_content-filter">
					<form action="" class="form-inline" role="form" method="post" data-toggle="validator" id="student-filter_form">
						<fieldset class="fieldset-form">
							<legend class="legend-form">ค้นหาข้อมูลนักเรียน</legend>
							<div class="col-md-12">
								<div class="form-group">
									<label for="filter-keyword" class="sr-only">Keyword</label>
									<input type="text" class="form-control" name="filter-keyword" id="filter-keyword" maxlength="50" placeholder="ชื่อ/นามสกุล/รหัสบัตรประชาชน">
								</div>
								<div class="form-group">
									<label for="filter-class" class="sr-only"></label>
									<select name="filter-class" id="filter-class" class="form-control" required>
										<option value="" disabled selected>ระดับการศึกษา</option>
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
						</fieldset>
					</form>
				</div>
				<div class="site_content-table">
					<table id="student-table" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><p class="text-center">ลำดับ</p></th>
								<th><p class="text-center">รหัสบัตรประชาชน</p></th>
								<th><p class="text-center">ชื่อ - นามสกุล</p></th>
								<th><p class="text-center">อายุ</p></th>
								<th><p class="text-center">ห้องเรียน</p></th>
								<th><p class="text-center">ปีการศึกษา</p></th>
								<th><p class="text-center">สถานะการประเมิน<br>ของผู้ปกครอง</p></th>
								<th><p class="text-center">สถานะการประเมิน<br>ของครูประจำชั้น</p></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($_POST["filterBtn"]) {
								$keyword = $_POST["filter-keyword"];
								$class_id = $_POST["filter-class"];
								$year = $_POST["filter-year"];
								$term = $_POST["filter-term"];
								if (!empty($keyword)) {
									$filter = "SELECT * FROM student s JOIN term t JOIN classroom c
									WHERE (c.class_id = $class_id
									AND c.class_id = t.class_id
									AND t.Term_year = $year
									AND t.Term = $term
									AND t.Std_no = s.Std_no)
									AND (s.Std_id LIKE '%$keyword%'
									OR s.Std_name LIKE '%$keyword%'
									OR s.Std_surname LIKE '%$keyword%')";
									$filter_query = mysql_query($filter)or die(mysql_error());
								} else {
									$filter = "SELECT * FROM student s JOIN term t JOIN classroom c
									WHERE (c.class_id = $class_id
									AND c.class_id = t.class_id
									AND t.Term_year = $year
									AND t.Term = $term
									AND t.Std_no = s.Std_no)";
									$filter_query = mysql_query($filter)or die(mysql_error());
								}
							} else {
								if (date(m) <= 4 || date(m) >= 11) {
									$year_init = $year-1;
									$term_init = 2;
								} else {
									$year_init = $year;
									$term_init = 1;
								}
								$filter_query = mysql_query("SELECT * FROM student s JOIN term t JOIN classroom c
									WHERE s.Std_no = t.Std_no
									AND t.Term_year = $year_init
									AND t.Term = $term_init
									AND t.Class_id = c.Class_id")or die(mysql_error());
							}
							$counter = 0;
							if (mysql_num_rows($filter_query) > 0) {
								while ($result = mysql_fetch_array($filter_query)) {
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
										<td><a href="estimate_form.php?As_type=ผู้ปกครอง&Std_no=<?php echo $result["Std_no"]; ?>&year=<?php echo $result[Term_year]; ?>&term=<?php echo $result[Term]; ?>">ทำแบบประเมิน</a></td>
										<td><a href="estimate_form.php?As_type=ครูประจำชั้น&Std_no=<?php echo $result["Std_no"]; ?>&year=<?php echo $result[Term_year]; ?>&term=<?php echo $result[Term]; ?>">ทำแบบประเมิน</a></td>
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