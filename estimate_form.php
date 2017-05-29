<?php
include_once("assets/database/connect.php");
include_once("assets/service/estimate.php");
include_once("assets/service/student.php");
if ($_SESSION["user_role"] < 2) {
	header("location:404.php");
}
$student_fetch = get_student($_GET[std_no], $_GET[year], $_GET[term]);
$estimate_check_teacher = get_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, "ครูประจำชั้น");
if (mysql_num_rows($estimate_check_teacher) == 0) {
	preinsert("ครูประจำชั้น", $student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year);
	preinsert("ผู้ปกครอง", $student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year);
}
$estimate_check_parent = get_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, "ผู้ปกครอง");
if (mysql_num_rows($estimate_check_parent) == 0) {
	preinsert("ผู้ปกครอง", $student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year);
}
$estimate_teacher = get_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, "ครูประจำชั้น");
$estimate_teacher_fetch = mysql_fetch_object($estimate_teacher)or die(mysql_error());
$estimate_teacher_table = get_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, 'ครูประจำชั้น');
$estimate_teacher_tscore = get_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, 'ครูประจำชั้น');

$estimate_parent = get_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, "ผู้ปกครอง");
$estimate_parent_fetch = mysql_fetch_object($estimate_parent)or die(mysql_error());
$estimate_parent_table = get_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, 'ผู้ปกครอง');
$estimate_parent_tscore = get_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, 'ผู้ปกครอง');

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
				<div class="row site_content-detail">
					<fieldset class="fieldset-form">
						<legend class="legend-form">ข้อมูลนักเรียน</legend>
						<p>รหัสประจำตัวประชาชน : <?php echo $student_fetch->Std_id; ?></p>
						<p>ชื่อ - นามสกุล : <?php echo ($student_fetch->Std_gender == 1 ? 'เด็กหญิง ' : 'เด็กชาย ') ?><?php echo $student_fetch->Std_name; ?> <?php echo $student_fetch->Std_surname; ?></p>
						<p>ห้องเรียน : <?php echo $student_fetch->class_grade.' ห้อง '.$student_fetch->class_number; ?></p>
						<p>ปีการศึกษา : <?php echo $student_fetch->Term.'/'.$student_fetch->Term_year; ?></p>
					</fieldset>
				</div>
				<div class="row site_content-menu">
					<a href="" id="assessor-teacher_link" data-toggle="modal" data-target="#assesor-teacher_edit_box" value="edit_assesor">
						<div class="col-md-4 col-md-offset-2 site_content-menu_box">
							<img src="image/estimate-icon.png" class="img-responsive img-menu" alt="Image"><br>
							แก้ไขข้อมูลผู้ให้การประเมิน <br> (ครูประจำชั้น)
						</div>
					</a>
					<a href="" id="assessor-parent_link" data-toggle="modal" data-target="#assesor-parent_edit_box" value="edit_assesor">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/estimate-icon.png" class="img-responsive img-menu" alt="Image"><br>
							แก้ไขข้อมูลผู้ให้การประเมิน <br> (ผู้ปกครอง)
						</div>
					</a>
				</div>
				<hr>
				<div class="row site_content-menu">
					<a href="" id="estimate_techer-link" data-toggle="modal" data-target="#estimate-teacher_edit_box" value="edit_estimate">
						<div class="col-md-4 col-md-offset-2 site_content-menu_box">
							<img src="image/estimate-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ทำแบบประเมิน <br> (ครูประจำชั้น)
						</div>
					</a>
					<a href="" id="estimate_parent-link" data-toggle="modal" data-target="#estimate-parent_edit_box" value="edit_estimate">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/estimate-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ทำแบบประเมิน <br> (ผู้ปกครอง)
						</div>
					</a>
				</div>
				<hr>
				<div class="row site_content-menu">
					<a href="" id="school-link" data-toggle="modal" data-target="#teacher-estimate_box" value="display-teacher_estimate">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/school-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ดูผลการประเมินของครูประจำชั้น
						</div>
					</a>
					<a href="" id="family-link" data-toggle="modal" data-target="#parent-estimate_box" value="display-parent_estimate">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/family-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ดูผลการประเมินของผู้ปกครอง
						</div>
					</a>
					<a href="" id="overall-link" data-toggle="modal" data-target="#compare-estimate_box" value="display-compare_estimate">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/overall-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ดูผลการประเมินเปรียบเทียบ<br>ที่บ้านและโรงเรียน
						</div>
					</a>
				</div>
				<div class="row site_content-form">
					<div class="col-md-12">
						<div class="row site_content-form_assessor">
							<div class="modal fade" id="assesor-teacher_edit_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<form action="assets/service/assessor.php" role="form" method="post" data-toggle="validator" id="assesor_teacher-edit_form">
											<input type="hidden" name="as_id" value=<?php echo $estimate_teacher_fetch->As_id; ?>>
											<input type="hidden" name="as_type" value="ครูประจำชั้น">
											<input type="hidden" name="year" value=<?php echo $estimate_teacher_fetch->Es_year; ?>>
											<input type="hidden" name="term" value=<?php echo $estimate_teacher_fetch->Es_term; ?>>
											<input type="hidden" name="std_no" value=<?php echo $estimate_teacher_fetch->Std_no; ?>>
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แก้ไขข้อมูลผู้ประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputStdName">ชื่อ - นามสกุลผู้ถูกประเมิน</label>
															<input type="text" class="form-control" name="std_name" disabled="" value="<?php echo ($student_fetch->Std_gender==1? "เด็กหญิง " : "เด็กชาย ").$student_fetch->Std_name.' '.$student_fetch->Std_surname; ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputAssName">ชื่อผู้ประเมิน</label>
															<input type="text" class="form-control" name="as_name" id="as_name" placeholder="ชื่อผู้ประเมิน" value="<?php echo $estimate_teacher_fetch->As_name; ?>" maxlength="50" data-error="กรุณาระบุชื่อผู้ประเมิน" required>
															<div class="help-block with-errors"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputStdSurname">นามสกุลผู้ประเมิน</label>
															<input type="text" class="form-control" name="as_surname" id="as_surname" placeholder="นามสกุลผู้ประเมิน" value="<?php echo $estimate_teacher_fetch->As_surname; ?>" maxlength="50" data-error="กรุณาระบุนามสกุลผู้ประเมิน" required>
															<div class="help-block with-errors"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputRelationship">เกี่ยวข้องกับผู้ถูกประเมินโดยเป็น</label>
															<input type="text" class="form-control" name="relation" id="relation" value="ครูประจำชั้น" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6 form-inline">
														<div class="form-group">
															<label for="DisplayTermAndYear">ปีการศึกษา <?php echo $estimate_teacher_fetch->Es_term.'/'.$estimate_teacher_fetch->Es_year; ?></label>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-4 col-md-offset-4">
														<input type="submit" id="EditAsBtn" name="EditAsBtn" class="form-control btn btn-edit" value="แก้ไขผู้ประเมิน">
													</div>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
							<!-- จบฟอร์มสำหรับผู้ประเมิน (ครูประจำชั้น) -->
							<div class="modal fade" id="assesor-parent_edit_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<form action="assets/service/assessor.php" role="form" method="post" data-toggle="validator" id="assesor_parent-edit_form">
											<input type="hidden" name="as_id" value=<?php echo $estimate_parent_fetch->As_id; ?>>
											<input type="hidden" name="as_type" value="ผู้ปกครอง">
											<input type="hidden" name="year" value=<?php echo $estimate_parent_fetch->Es_year; ?>>
											<input type="hidden" name="term" value=<?php echo $estimate_parent_fetch->Es_term; ?>>
											<input type="hidden" name="std_no" value=<?php echo $estimate_parent_fetch->Std_no; ?>>
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แก้ไขข้อมูลผู้ประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputStdName">ชื่อ - นามสกุลผู้ถูกประเมิน</label>
															<input type="text" class="form-control" name="std_name" disabled="" placeholder="<?php echo ($student_fetch->Std_gender==1? "เด็กหญิง " : "เด็กชาย ").$student_fetch->Std_name.' '.$student_fetch->Std_surname; ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputAssName">ชื่อผู้ประเมิน</label>
															<input type="text" class="form-control" name="as_name" id="as_name" placeholder="ชื่อผู้ประเมิน" value="<?php echo $estimate_parent_fetch->As_name; ?>" maxlength="50" data-error="กรุณาระบุชื่อผู้ประเมิน" required>
															<div class="help-block with-errors"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputStdSurname">นามสกุลผู้ประเมิน</label>
															<input type="text" class="form-control" name="as_surname" id="as_surname" placeholder="นามสกุลผู้ประเมิน" value="<?php echo $estimate_parent_fetch->As_surname; ?>" maxlength="50" data-error="กรุณาระบุนามสกุลผู้ประเมิน" required>
															<div class="help-block with-errors"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputRelationship">เกี่ยวข้องกับผู้ถูกประเมินโดยเป็น</label>
															<input type="text" class="form-control" name="relation" id="relation" placeholder="<?php echo $estimate_parent_fetch->As_type; ?>" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6 form-inline">
														<div class="form-group">
															<label for="DisplayTermAndYear">ปีการศึกษา <?php echo $estimate_parent_fetch->Es_term.'/'.$estimate_parent_fetch->Es_year; ?></label>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-4 col-md-offset-4">
														<input type="submit" id="EditAsBtn" name="EditAsBtn" class="form-control btn btn-edit" value="แก้ไขผู้ประเมิน">
													</div>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
							<!-- จบฟอร์มสำหรับผู้ประเมิน (ครูประจำชั้น)-->
						</div>
						<div class="row site_content-form_estimate">
							<div class="modal fade" id="estimate-teacher_edit_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<form action="assets/service/estimate.php" role="form" method="post" data-toggle="validator" id="estimte-teacher_edit_form" name="estimte-teacher_edit_form">
										<div class="modal-content estimate-edit_form_1">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<input type="hidden" name="as_type" value="<?php echo $estimate_teacher_fetch->As_type; ?>">
														<input type="hidden" name="std_no" value="<?php echo $estimate_teacher_fetch->Std_no; ?>">
														<input type="hidden" name="year" value="<?php echo $estimate_teacher_fetch->Es_year; ?>">
														<input type="hidden" name="term" value="<?php echo $estimate_teacher_fetch->Es_term; ?>">
														<input type="hidden" name="es_id" value="<?php echo $estimate_teacher_fetch->Es_id; ?>">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item active estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_1">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">1</td>
																	<td>ไม่ใช้กำลังเวลาโกรธหรือไม่พอใจ</td>
																	<td align="center"><input type="radio" name="choice_1" value="1"></td>
																	<td align="center"><input type="radio" name="choice_1" value="2"></td>
																	<td align="center"><input type="radio" name="choice_1" value="3"></td>
																	<td align="center"><input type="radio" name="choice_1" value="4"></td>
																</tr>
																<tr>
																	<td align="right">2</td>
																	<td>รู้จักรอคอยเมื่อยังไม่ถึงคราวหรือเวลาของตน</td>
																	<td align="center"><input type="radio" name="choice_2" value="1"></td>
																	<td align="center"><input type="radio" name="choice_2" value="2"></td>
																	<td align="center"><input type="radio" name="choice_2" value="3"></td>
																	<td align="center"><input type="radio" name="choice_2" value="4"></td>
																</tr>
																<tr>
																	<td align="right">3</td>
																	<td>ยับยั้งที่จะทำอะไรตามอำเภอใจตนเอง</td>
																	<td align="center"><input type="radio" name="choice_3" value="1"></td>
																	<td align="center"><input type="radio" name="choice_3" value="2"></td>
																	<td align="center"><input type="radio" name="choice_3" value="3"></td>
																	<td align="center"><input type="radio" name="choice_3" value="4"></td>
																</tr>
																<tr>
																	<td align="right">4</td>
																	<td>ต้องการอะไรต้องได้ทันที</td>
																	<td align="center"><input type="radio" name="choice_4" value="4"></td>
																	<td align="center"><input type="radio" name="choice_4" value="3"></td>
																	<td align="center"><input type="radio" name="choice_4" value="2"></td>
																	<td align="center"><input type="radio" name="choice_4" value="1"></td>
																</tr>
																<tr>
																	<td align="right">5</td>
																	<td>เมื่อมีอารมณ์โกรธ ต้องใช้เวลานานกว่าจะหายโกรธ</td>
																	<td align="center"><input type="radio" name="choice_5" value="4"></td>
																	<td align="center"><input type="radio" name="choice_5" value="3"></td>
																	<td align="center"><input type="radio" name="choice_5" value="2"></td>
																	<td align="center"><input type="radio" name="choice_5" value="1"></td>
																</tr>
																<tr>
																	<td align="right">6</td>
																	<td>หมกมุ่นกับการเล่นมากเกินไป</td>
																	<td align="center"><input type="radio" name="choice_6" value="4"></td>
																	<td align="center"><input type="radio" name="choice_6" value="3"></td>
																	<td align="center"><input type="radio" name="choice_6" value="2"></td>
																	<td align="center"><input type="radio" name="choice_6" value="1"></td>
																</tr>
																<tr>
																	<td align="right">7</td>
																	<td>ชี้แจงเหตุผลแทนการใช้กำลัง</td>
																	<td align="center"><input type="radio" name="choice_7" value="1"></td>
																	<td align="center"><input type="radio" name="choice_7" value="2"></td>
																	<td align="center"><input type="radio" name="choice_7" value="3"></td>
																	<td align="center"><input type="radio" name="choice_7" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn1" class="form-control btn btn-primary" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 1 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 1) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 1) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 1 -->
										<div class="modal-content estimate-edit_form_2" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_2">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">8</td>
																	<td>ช่วยปกป้อง ดูแล และช่วยเหลือเด็กที่เล็กกว่า</td>
																	<td align="center"><input type="radio" name="choice_8" value="1"></td>
																	<td align="center"><input type="radio" name="choice_8" value="2"></td>
																	<td align="center"><input type="radio" name="choice_8" value="3"></td>
																	<td align="center"><input type="radio" name="choice_8" value="4"></td>
																</tr>
																<tr>
																	<td align="right">9</td>
																	<td>เห็นอกเห็นใจเมื่อผู้อื่นเดือดร้อน</td>
																	<td align="center"><input type="radio" name="choice_9" value="1"></td>
																	<td align="center"><input type="radio" name="choice_9" value="2"></td>
																	<td align="center"><input type="radio" name="choice_9" value="3"></td>
																	<td align="center"><input type="radio" name="choice_9" value="4"></td>
																</tr>
																<tr>
																	<td align="right">10</td>
																	<td>ใส่ใจหรือรู้ว่าใครชอบอะไร ไม่ชอบอะไร</td>
																	<td align="center"><input type="radio" name="choice_10" value="1"></td>
																	<td align="center"><input type="radio" name="choice_10" value="2"></td>
																	<td align="center"><input type="radio" name="choice_10" value="3"></td>
																	<td align="center"><input type="radio" name="choice_10" value="4"></td>
																</tr>
																<tr>
																	<td align="right">11</td>
																	<td>เป็นที่พึ่งได้เมื่อเพื่อนต้องการความช่วยเหลือ</td>
																	<td align="center"><input type="radio" name="choice_11" value="1"></td>
																	<td align="center"><input type="radio" name="choice_11" value="2"></td>
																	<td align="center"><input type="radio" name="choice_11" value="3"></td>
																	<td align="center"><input type="radio" name="choice_11" value="4"></td>
																</tr>
																<tr>
																	<td align="right">12</td>
																	<td>ระมัดระวังที่จะไม่ทำให้ผู้อื่นเดือดร้อนหรือเสียใจ</td>
																	<td align="center"><input type="radio" name="choice_12" value="1"></td>
																	<td align="center"><input type="radio" name="choice_12" value="2"></td>
																	<td align="center"><input type="radio" name="choice_12" value="3"></td>
																	<td align="center"><input type="radio" name="choice_12" value="4"></td>
																</tr>
																<tr>
																	<td align="right">13</td>
																	<td>ไม่ช่วยเหลือหรือไม่ให้ความร่วมมือกับผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_13" value="4"></td>
																	<td align="center"><input type="radio" name="choice_13" value="3"></td>
																	<td align="center"><input type="radio" name="choice_13" value="2"></td>
																	<td align="center"><input type="radio" name="choice_13" value="1"></td>
																</tr>
																<tr>
																	<td align="right">14</td>
																	<td>รู้จักให้กำลังใจผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_14" value="1"></td>
																	<td align="center"><input type="radio" name="choice_14" value="2"></td>
																	<td align="center"><input type="radio" name="choice_14" value="3"></td>
																	<td align="center"><input type="radio" name="choice_14" value="4"></td>
																</tr>
																<tr>
																	<td align="right">15</td>
																	<td>รู้จักรับฟังผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_15" value="1"></td>
																	<td align="center"><input type="radio" name="choice_15" value="2"></td>
																	<td align="center"><input type="radio" name="choice_15" value="3"></td>
																	<td align="center"><input type="radio" name="choice_15" value="4"></td>
																</tr>
																<tr>
																	<td align="right">16</td>
																	<td>รู้จักแสดงความห่วงใยผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_16" value="1"></td>
																	<td align="center"><input type="radio" name="choice_16" value="2"></td>
																	<td align="center"><input type="radio" name="choice_16" value="3"></td>
																	<td align="center"><input type="radio" name="choice_16" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn2" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 2 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 2) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 2) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 2 -->
										<div class="modal-content estimate-edit_form_3" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_3">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">17</td>
																	<td>มักสารภาพเมื่อทำผิด</td>
																	<td align="center"><input type="radio" name="choice_17" value="1"></td>
																	<td align="center"><input type="radio" name="choice_17" value="2"></td>
																	<td align="center"><input type="radio" name="choice_17" value="3"></td>
																	<td align="center"><input type="radio" name="choice_17" value="4"></td>
																</tr>
																<tr>
																	<td align="right">18</td>
																	<td>ไม่ชอบแกล้งเพื่อน</td>
																	<td align="center"><input type="radio" name="choice_18" value="1"></td>
																	<td align="center"><input type="radio" name="choice_18" value="2"></td>
																	<td align="center"><input type="radio" name="choice_18" value="3"></td>
																	<td align="center"><input type="radio" name="choice_18" value="4"></td>
																</tr>
																<tr>
																	<td align="right">19</td>
																	<td>ยอมรับว่าผิดเมื่อถูกถาม</td>
																	<td align="center"><input type="radio" name="choice_19" value="1"></td>
																	<td align="center"><input type="radio" name="choice_19" value="2"></td>
																	<td align="center"><input type="radio" name="choice_19" value="3"></td>
																	<td align="center"><input type="radio" name="choice_19" value="4"></td>
																</tr>
																<tr>
																	<td align="right">20</td>
																	<td>เมื่อทำผิด มักแก้ตัวว่าไม่ได้ตั้งใจ</td>
																	<td align="center"><input type="radio" name="choice_20" value="4"></td>
																	<td align="center"><input type="radio" name="choice_20" value="3"></td>
																	<td align="center"><input type="radio" name="choice_20" value="2"></td>
																	<td align="center"><input type="radio" name="choice_20" value="1"></td>
																</tr>
																<tr>
																	<td align="right">21</td>
																	<td>ยอมรับกฎเกณฑ์ เช่น ยอมรับการลงโทษเมื่อทำผิด</td>
																	<td align="center"><input type="radio" name="choice_21" value="1"></td>
																	<td align="center"><input type="radio" name="choice_21" value="2"></td>
																	<td align="center"><input type="radio" name="choice_21" value="3"></td>
																	<td align="center"><input type="radio" name="choice_21" value="4"></td>
																</tr>
																<tr>
																	<td align="right">22</td>
																	<td>รู้จักขอโทษ</td>
																	<td align="center"><input type="radio" name="choice_22" value="1"></td>
																	<td align="center"><input type="radio" name="choice_22" value="2"></td>
																	<td align="center"><input type="radio" name="choice_22" value="3"></td>
																	<td align="center"><input type="radio" name="choice_22" value="4"></td>
																</tr>
																<tr>
																	<td align="right">23</td>
																	<td>ยอมรับคำตำหนิหรือตักเตือนเมื่อทำผิด</td>
																	<td align="center"><input type="radio" name="choice_23" value="1"></td>
																	<td align="center"><input type="radio" name="choice_23" value="2"></td>
																	<td align="center"><input type="radio" name="choice_23" value="3"></td>
																	<td align="center"><input type="radio" name="choice_23" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn3" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 3 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 3) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 3) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 3 -->
										<div class="modal-content estimate-edit_form_4" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_4">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">24</td>
																	<td>มีความตั้งใจเมื่อทำสิ่งต่างๆ ที่สนใจ</td>
																	<td align="center"><input type="radio" name="choice_24" value="1"></td>
																	<td align="center"><input type="radio" name="choice_24" value="2"></td>
																	<td align="center"><input type="radio" name="choice_24" value="3"></td>
																	<td align="center"><input type="radio" name="choice_24" value="4"></td>
																</tr>
																<tr>
																	<td align="right">25</td>
																	<td>มีสมาธิในการทำงาน เช่น อ่านหนังสือได้นานๆ</td>
																	<td align="center"><input type="radio" name="choice_25" value="1"></td>
																	<td align="center"><input type="radio" name="choice_25" value="2"></td>
																	<td align="center"><input type="radio" name="choice_25" value="3"></td>
																	<td align="center"><input type="radio" name="choice_25" value="4"></td>
																</tr>
																<tr>
																	<td align="right">26</td>
																	<td>พยายามทำงานที่ยากให้สำเร็จได้ด้วยตนเอง เช่น การบ้าน การฝีมือ</td>
																	<td align="center"><input type="radio" name="choice_26" value="1"></td>
																	<td align="center"><input type="radio" name="choice_26" value="2"></td>
																	<td align="center"><input type="radio" name="choice_26" value="3"></td>
																	<td align="center"><input type="radio" name="choice_26" value="4"></td>
																</tr>
																<tr>
																	<td align="right">27</td>
																	<td>
																		สนุกกับการแก้ปัญหายากๆ หรือท้าทาย เช่น ปัญหาการบ้าน
																		ของเล่นที่แปลกๆ ใหม่ๆ
																	</td>
																	<td align="center"><input type="radio" name="choice_27" value="1"></td>
																	<td align="center"><input type="radio" name="choice_27" value="2"></td>
																	<td align="center"><input type="radio" name="choice_27" value="3"></td>
																	<td align="center"><input type="radio" name="choice_27" value="4"></td>
																</tr>
																<tr>
																	<td align="right">28</td>
																	<td>เฉื่อยชา ไม่สนใจที่จะทำงานให้เสร็จ</td>
																	<td align="center"><input type="radio" name="choice_28" value="4"></td>
																	<td align="center"><input type="radio" name="choice_28" value="3"></td>
																	<td align="center"><input type="radio" name="choice_28" value="2"></td>
																	<td align="center"><input type="radio" name="choice_28" value="1"></td>
																</tr>
																<tr>
																	<td align="right">29</td>
																	<td>บ่นหรือต่อรองว่างานต่างๆ ยากเกินกว่าที่จะทำได้ทั้งๆ ที่ยังไม่ได้ลงมือทำ</td>
																	<td align="center"><input type="radio" name="choice_29" value="4"></td>
																	<td align="center"><input type="radio" name="choice_29" value="3"></td>
																	<td align="center"><input type="radio" name="choice_29" value="2"></td>
																	<td align="center"><input type="radio" name="choice_29" value="1"></td>
																</tr>
																<tr>
																	<td align="right">30</td>
																	<td>ทำงานต่อไปจนเสร็จแม้ว่าเพื่อนๆ ไปเล่นแล้วก็ตาม</td>
																	<td align="center"><input type="radio" name="choice_30" value="1"></td>
																	<td align="center"><input type="radio" name="choice_30" value="2"></td>
																	<td align="center"><input type="radio" name="choice_30" value="3"></td>
																	<td align="center"><input type="radio" name="choice_30" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn4" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 4 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 4) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 4) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 4 -->
										<div class="modal-content estimate-edit_form_5" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_5">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">31</td>
																	<td>ไม่ท้อใจเมื่อประสบกับความผิดหวัง</td>
																	<td align="center"><input type="radio" name="choice_31" value="1"></td>
																	<td align="center"><input type="radio" name="choice_31" value="2"></td>
																	<td align="center"><input type="radio" name="choice_31" value="3"></td>
																	<td align="center"><input type="radio" name="choice_31" value="4"></td>
																</tr>
																<tr>
																	<td align="right">32</td>
																	<td>หาทางตกลงกับเพื่อนหรือเด็กคนอื่นเมื่อเกิดขัดแย้งกัน</td>
																	<td align="center"><input type="radio" name="choice_32" value="1"></td>
																	<td align="center"><input type="radio" name="choice_32" value="2"></td>
																	<td align="center"><input type="radio" name="choice_32" value="3"></td>
																	<td align="center"><input type="radio" name="choice_32" value="4"></td>
																</tr>
																<tr>
																	<td align="right">33</td>
																	<td>ไม่เอะอะโวยวายเมื่อพบปัญหาหรือความยุ่งยาก</td>
																	<td align="center"><input type="radio" name="choice_33" value="1"></td>
																	<td align="center"><input type="radio" name="choice_33" value="2"></td>
																	<td align="center"><input type="radio" name="choice_33" value="3"></td>
																	<td align="center"><input type="radio" name="choice_33" value="4"></td>
																</tr>
																<tr>
																	<td align="right">34</td>
																	<td>รู้จักรอจังหวะหรือรอคอยเวลาที่เหมาะสมในการแก้ปัญหา</td>
																	<td align="center"><input type="radio" name="choice_34" value="1"></td>
																	<td align="center"><input type="radio" name="choice_34" value="2"></td>
																	<td align="center"><input type="radio" name="choice_34" value="3"></td>
																	<td align="center"><input type="radio" name="choice_34" value="4"></td>
																</tr>
																<tr>
																	<td align="right">35</td>
																	<td>เมื่อมีปัญหา จะคิดหาวิธีแก้หลายๆ ทาง</td>
																	<td align="center"><input type="radio" name="choice_35" value="1"></td>
																	<td align="center"><input type="radio" name="choice_35" value="2"></td>
																	<td align="center"><input type="radio" name="choice_35" value="3"></td>
																	<td align="center"><input type="radio" name="choice_35" value="4"></td>
																</tr>
																<tr>
																	<td align="right">36</td>
																	<td>ร่วมกิจกรรมที่ตนไม่ชอบ หรือไม่ถนัดกับผู้อื่นได้</td>
																	<td align="center"><input type="radio" name="choice_36" value="1"></td>
																	<td align="center"><input type="radio" name="choice_36" value="2"></td>
																	<td align="center"><input type="radio" name="choice_36" value="3"></td>
																	<td align="center"><input type="radio" name="choice_36" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn5" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 5 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 5) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 5) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 5 -->
										<div class="modal-content estimate-edit_form_6" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_6">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">37</td>
																	<td>ทักทายหรือทำความรู้จักกับเพื่อนใหม่</td>
																	<td align="center"><input type="radio" name="choice_37" value="1"></td>
																	<td align="center"><input type="radio" name="choice_37" value="2"></td>
																	<td align="center"><input type="radio" name="choice_37" value="3"></td>
																	<td align="center"><input type="radio" name="choice_37" value="4"></td>
																</tr>
																<tr>
																	<td align="right">38</td>
																	<td>กล้าแสดงความสามารถที่มีอยู่ต่อหน้าคนหมู่มาก</td>
																	<td align="center"><input type="radio" name="choice_38" value="1"></td>
																	<td align="center"><input type="radio" name="choice_38" value="2"></td>
																	<td align="center"><input type="radio" name="choice_38" value="3"></td>
																	<td align="center"><input type="radio" name="choice_38" value="4"></td>
																</tr>
																<tr>
																	<td align="right">39</td>
																	<td>กล้าซักถามข้อสงสัย</td>
																	<td align="center"><input type="radio" name="choice_39" value="1"></td>
																	<td align="center"><input type="radio" name="choice_39" value="2"></td>
																	<td align="center"><input type="radio" name="choice_39" value="3"></td>
																	<td align="center"><input type="radio" name="choice_39" value="4"></td>
																</tr>
																<tr>
																	<td align="right">40</td>
																	<td>เมื่อถูกถาม ใช้วิธีนิ่งเฉย แทนการตอบว่าไม่รู้</td>
																	<td align="center"><input type="radio" name="choice_40" value="4"></td>
																	<td align="center"><input type="radio" name="choice_40" value="3"></td>
																	<td align="center"><input type="radio" name="choice_40" value="2"></td>
																	<td align="center"><input type="radio" name="choice_40" value="1"></td>
																</tr>
																<tr>
																	<td align="right">41</td>
																	<td>มักจะใช้ข้ออ้างเมื่อไม่กล้าทำอะไร</td>
																	<td align="center"><input type="radio" name="choice_41" value="4"></td>
																	<td align="center"><input type="radio" name="choice_41" value="3"></td>
																	<td align="center"><input type="radio" name="choice_41" value="2"></td>
																	<td align="center"><input type="radio" name="choice_41" value="1"></td>
																</tr>
																<tr>
																	<td align="right">42</td>
																	<td>ไม่กล้าออกความเห็นเมื่ออยู่กับผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_42" value="4"></td>
																	<td align="center"><input type="radio" name="choice_42" value="3"></td>
																	<td align="center"><input type="radio" name="choice_42" value="2"></td>
																	<td align="center"><input type="radio" name="choice_42" value="1"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn6" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 6 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 6) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 6) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 6 -->
										<div class="modal-content estimate-edit_form_7" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_7">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">43</td>
																	<td>เล่าถึงความสำเร็จของตนเองให้ผู้ใหญ่ฟัง</td>
																	<td align="center"><input type="radio" name="choice_43" value="1"></td>
																	<td align="center"><input type="radio" name="choice_43" value="2"></td>
																	<td align="center"><input type="radio" name="choice_43" value="3"></td>
																	<td align="center"><input type="radio" name="choice_43" value="4"></td>
																</tr>
																<tr>
																	<td align="right">44</td>
																	<td>
																		ไม่อายในสิ่งที่ตนมีอยู่ เช่น ฐานะบ้าน อาชีพของพ่อแม่ รูปร่างหน้าตา
																		ความสามารถของตนเอง ฯลฯ
																	</td>
																	<td align="center"><input type="radio" name="choice_44" value="1"></td>
																	<td align="center"><input type="radio" name="choice_44" value="2"></td>
																	<td align="center"><input type="radio" name="choice_44" value="3"></td>
																	<td align="center"><input type="radio" name="choice_44" value="4"></td>
																</tr>
																<tr>
																	<td align="right">45</td>
																	<td>
																		ภูมิใจที่ตนเองมีจุดดีหรือความสามารถพิเศษบางอย่าง เช่น เรียนเก่ง
																		เล่นกีฬาเก่ง เล่นดนตรีได้
																	</td>
																	<td align="center"><input type="radio" name="choice_45" value="1"></td>
																	<td align="center"><input type="radio" name="choice_45" value="2"></td>
																	<td align="center"><input type="radio" name="choice_45" value="3"></td>
																	<td align="center"><input type="radio" name="choice_45" value="4"></td>
																</tr>
																<tr>
																	<td align="right">46</td>
																	<td>
																		ภูมิใจที่ได้รับความไว้วางใจจากผู้ใหญ่ เช่น ดูแลน้อง ดูแลสัตว์เลี้ยง
																		ช่วยเหลืองานผู้ใหญ่
																	</td>
																	<td align="center"><input type="radio" name="choice_46" value="1"></td>
																	<td align="center"><input type="radio" name="choice_46" value="2"></td>
																	<td align="center"><input type="radio" name="choice_46" value="3"></td>
																	<td align="center"><input type="radio" name="choice_46" value="4"></td>
																</tr>
																<tr>
																	<td align="right">47</td>
																	<td>น้อยใจง่าย</td>
																	<td align="center"><input type="radio" name="choice_47" value="4"></td>
																	<td align="center"><input type="radio" name="choice_47" value="3"></td>
																	<td align="center"><input type="radio" name="choice_47" value="2"></td>
																	<td align="center"><input type="radio" name="choice_47" value="1"></td>
																</tr>
																<tr>
																	<td align="right">48</td>
																	<td>รู้สึกน้อยเนื้อต่ำใจที่สู้คนอื่นไม่ได้</td>
																	<td align="center"><input type="radio" name="choice_48" value="4"></td>
																	<td align="center"><input type="radio" name="choice_48" value="3"></td>
																	<td align="center"><input type="radio" name="choice_48" value="2"></td>
																	<td align="center"><input type="radio" name="choice_48" value="1"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn7" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 7 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 7) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 7) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 7 -->
										<div class="modal-content estimate-edit_form_8" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_8">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">49</td>
																	<td>พอใจกับผลการเรียนที่ได้ แม้จะไม่ดีเด่นมากนัก</td>
																	<td align="center"><input type="radio" name="choice_49" value="1"></td>
																	<td align="center"><input type="radio" name="choice_49" value="2"></td>
																	<td align="center"><input type="radio" name="choice_49" value="3"></td>
																	<td align="center"><input type="radio" name="choice_49" value="4"></td>
																</tr>
																<tr>
																	<td align="right">50</td>
																	<td>เมื่อไม่ได้สิ่งที่ต้องการก็รู้จักยอมรับสิ่งทดแทนอย่างอื่นได้</td>
																	<td align="center"><input type="radio" name="choice_50" value="1"></td>
																	<td align="center"><input type="radio" name="choice_50" value="2"></td>
																	<td align="center"><input type="radio" name="choice_50" value="3"></td>
																	<td align="center"><input type="radio" name="choice_50" value="4"></td>
																</tr>
																<tr>
																	<td align="right">51</td>
																	<td>แม้เกมหรือกีฬาแพ้ก็ไม่เสียใจนาน</td>
																	<td align="center"><input type="radio" name="choice_51" value="1"></td>
																	<td align="center"><input type="radio" name="choice_51" value="2"></td>
																	<td align="center"><input type="radio" name="choice_51" value="3"></td>
																	<td align="center"><input type="radio" name="choice_51" value="4"></td>
																</tr>
																<tr>
																	<td align="right">52</td>
																	<td>แม้เป็นสิ่งที่ไม่จำเป็นก็เรียกร้องที่จะเอาให้ได้ตามที่ต้องการ</td>
																	<td align="center"><input type="radio" name="choice_52" value="4"></td>
																	<td align="center"><input type="radio" name="choice_52" value="3"></td>
																	<td align="center"><input type="radio" name="choice_52" value="2"></td>
																	<td align="center"><input type="radio" name="choice_52" value="1"></td>
																</tr>
																<tr>
																	<td align="right">53</td>
																	<td>หงุดหงิดอยู่นานเมื่อไม่ได้ดั่งใจ</td>
																	<td align="center"><input type="radio" name="choice_53" value="4"></td>
																	<td align="center"><input type="radio" name="choice_53" value="3"></td>
																	<td align="center"><input type="radio" name="choice_53" value="2"></td>
																	<td align="center"><input type="radio" name="choice_53" value="1"></td>
																</tr>
																<tr>
																	<td align="right">54</td>
																	<td>เมื่อทำอะไรไม่ได้ตามต้องการจะผิดหวังมาก เช่น บ่น คร่ำครวญ หรือซึม</td>
																	<td align="center"><input type="radio" name="choice_54" value="4"></td>
																	<td align="center"><input type="radio" name="choice_54" value="3"></td>
																	<td align="center"><input type="radio" name="choice_54" value="2"></td>
																	<td align="center"><input type="radio" name="choice_54" value="1"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn8" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 8 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 8) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 8) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 8 -->
										<div class="modal-content estimate-edit_form_9" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_9">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">55</td>
																	<td>มีอารมณ์ขัน</td>
																	<td align="center"><input type="radio" name="choice_55" value="1"></td>
																	<td align="center"><input type="radio" name="choice_55" value="2"></td>
																	<td align="center"><input type="radio" name="choice_55" value="3"></td>
																	<td align="center"><input type="radio" name="choice_55" value="4"></td>
																</tr>
																<tr>
																	<td align="right">56</td>
																	<td>เล่นสนุกสนานหรือล้อกันเล่นสนุกๆ ได้</td>
																	<td align="center"><input type="radio" name="choice_56" value="1"></td>
																	<td align="center"><input type="radio" name="choice_56" value="2"></td>
																	<td align="center"><input type="radio" name="choice_56" value="3"></td>
																	<td align="center"><input type="radio" name="choice_56" value="4"></td>
																</tr>
																<tr>
																	<td align="right">57</td>
																	<td>เมื่ออยู่คนเดียวก็รู้จักหาสิ่งมาทำให้ตัวเองเพลิดเพลินได้</td>
																	<td align="center"><input type="radio" name="choice_57" value="1"></td>
																	<td align="center"><input type="radio" name="choice_57" value="2"></td>
																	<td align="center"><input type="radio" name="choice_57" value="3"></td>
																	<td align="center"><input type="radio" name="choice_57" value="4"></td>
																</tr>
																<tr>
																	<td align="right">58</td>
																	<td>
																		รู้จักผ่อนคลายอารมณ์ด้วยการดูหนัง ฟังเพลง เล่นสนุก วาดรูป
																		พูดคุยกับเพื่อน
																	</td>
																	<td align="center"><input type="radio" name="choice_58" value="1"></td>
																	<td align="center"><input type="radio" name="choice_58" value="2"></td>
																	<td align="center"><input type="radio" name="choice_58" value="3"></td>
																	<td align="center"><input type="radio" name="choice_58" value="4"></td>
																</tr>
																<tr>
																	<td align="right">59</td>
																	<td>เป็นคนแจ่มใส ยิ้มง่าย หัวเราะง่าย</td>
																	<td align="center"><input type="radio" name="choice_59" value="1"></td>
																	<td align="center"><input type="radio" name="choice_59" value="2"></td>
																	<td align="center"><input type="radio" name="choice_59" value="3"></td>
																	<td align="center"><input type="radio" name="choice_59" value="4"></td>
																</tr>
																<tr>
																	<td align="right">60</td>
																	<td>สนุกกับการแข่งขันแม้จะรู้ว่าไม่ชนะ</td>
																	<td align="center"><input type="radio" name="choice_60" value="1"></td>
																	<td align="center"><input type="radio" name="choice_60" value="2"></td>
																	<td align="center"><input type="radio" name="choice_60" value="3"></td>
																	<td align="center"><input type="radio" name="choice_60" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn9" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 9 : <?php echo (check_estimate($estimate_teacher_fetch->Es_id, 9) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_teacher_fetch->Es_id, 9) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 9 -->
									</form>
								</div>
							</div>
							<div class="modal fade" id="estimate-parent_edit_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<form action="assets/service/estimate.php" role="form" method="post" data-toggle="validator" id="estimte-teacher_edit_form" name="estimte-teacher_edit_form">
										<div class="modal-content estimate-edit_form_1">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<input type="hidden" name="as_type" value="<?php echo $estimate_parent_fetch->As_type; ?>">
														<input type="hidden" name="std_no" value="<?php echo $estimate_parent_fetch->Std_no; ?>">
														<input type="hidden" name="year" value="<?php echo $estimate_parent_fetch->Es_year; ?>">
														<input type="hidden" name="term" value="<?php echo $estimate_parent_fetch->Es_term; ?>">
														<input type="hidden" name="es_id" value="<?php echo $estimate_parent_fetch->Es_id; ?>">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item active estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_1">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">1</td>
																	<td>ไม่ใช้กำลังเวลาโกรธหรือไม่พอใจ</td>
																	<td align="center"><input type="radio" name="choice_1" value="1"></td>
																	<td align="center"><input type="radio" name="choice_1" value="2"></td>
																	<td align="center"><input type="radio" name="choice_1" value="3"></td>
																	<td align="center"><input type="radio" name="choice_1" value="4"></td>
																</tr>
																<tr>
																	<td align="right">2</td>
																	<td>รู้จักรอคอยเมื่อยังไม่ถึงคราวหรือเวลาของตน</td>
																	<td align="center"><input type="radio" name="choice_2" value="1"></td>
																	<td align="center"><input type="radio" name="choice_2" value="2"></td>
																	<td align="center"><input type="radio" name="choice_2" value="3"></td>
																	<td align="center"><input type="radio" name="choice_2" value="4"></td>
																</tr>
																<tr>
																	<td align="right">3</td>
																	<td>ยับยั้งที่จะทำอะไรตามอำเภอใจตนเอง</td>
																	<td align="center"><input type="radio" name="choice_3" value="1"></td>
																	<td align="center"><input type="radio" name="choice_3" value="2"></td>
																	<td align="center"><input type="radio" name="choice_3" value="3"></td>
																	<td align="center"><input type="radio" name="choice_3" value="4"></td>
																</tr>
																<tr>
																	<td align="right">4</td>
																	<td>ต้องการอะไรต้องได้ทันที</td>
																	<td align="center"><input type="radio" name="choice_4" value="4"></td>
																	<td align="center"><input type="radio" name="choice_4" value="3"></td>
																	<td align="center"><input type="radio" name="choice_4" value="2"></td>
																	<td align="center"><input type="radio" name="choice_4" value="1"></td>
																</tr>
																<tr>
																	<td align="right">5</td>
																	<td>เมื่อมีอารมณ์โกรธ ต้องใช้เวลานานกว่าจะหายโกรธ</td>
																	<td align="center"><input type="radio" name="choice_5" value="4"></td>
																	<td align="center"><input type="radio" name="choice_5" value="3"></td>
																	<td align="center"><input type="radio" name="choice_5" value="2"></td>
																	<td align="center"><input type="radio" name="choice_5" value="1"></td>
																</tr>
																<tr>
																	<td align="right">6</td>
																	<td>หมกมุ่นกับการเล่นมากเกินไป</td>
																	<td align="center"><input type="radio" name="choice_6" value="4"></td>
																	<td align="center"><input type="radio" name="choice_6" value="3"></td>
																	<td align="center"><input type="radio" name="choice_6" value="2"></td>
																	<td align="center"><input type="radio" name="choice_6" value="1"></td>
																</tr>
																<tr>
																	<td align="right">7</td>
																	<td>ชี้แจงเหตุผลแทนการใช้กำลัง</td>
																	<td align="center"><input type="radio" name="choice_7" value="1"></td>
																	<td align="center"><input type="radio" name="choice_7" value="2"></td>
																	<td align="center"><input type="radio" name="choice_7" value="3"></td>
																	<td align="center"><input type="radio" name="choice_7" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn1" class="form-control btn btn-primary" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 1 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 1) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 1) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 1 -->
										<div class="modal-content estimate-edit_form_2" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_2">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">8</td>
																	<td>ช่วยปกป้อง ดูแล และช่วยเหลือเด็กที่เล็กกว่า</td>
																	<td align="center"><input type="radio" name="choice_8" value="1"></td>
																	<td align="center"><input type="radio" name="choice_8" value="2"></td>
																	<td align="center"><input type="radio" name="choice_8" value="3"></td>
																	<td align="center"><input type="radio" name="choice_8" value="4"></td>
																</tr>
																<tr>
																	<td align="right">9</td>
																	<td>เห็นอกเห็นใจเมื่อผู้อื่นเดือดร้อน</td>
																	<td align="center"><input type="radio" name="choice_9" value="1"></td>
																	<td align="center"><input type="radio" name="choice_9" value="2"></td>
																	<td align="center"><input type="radio" name="choice_9" value="3"></td>
																	<td align="center"><input type="radio" name="choice_9" value="4"></td>
																</tr>
																<tr>
																	<td align="right">10</td>
																	<td>ใส่ใจหรือรู้ว่าใครชอบอะไร ไม่ชอบอะไร</td>
																	<td align="center"><input type="radio" name="choice_10" value="1"></td>
																	<td align="center"><input type="radio" name="choice_10" value="2"></td>
																	<td align="center"><input type="radio" name="choice_10" value="3"></td>
																	<td align="center"><input type="radio" name="choice_10" value="4"></td>
																</tr>
																<tr>
																	<td align="right">11</td>
																	<td>เป็นที่พึ่งได้เมื่อเพื่อนต้องการความช่วยเหลือ</td>
																	<td align="center"><input type="radio" name="choice_11" value="1"></td>
																	<td align="center"><input type="radio" name="choice_11" value="2"></td>
																	<td align="center"><input type="radio" name="choice_11" value="3"></td>
																	<td align="center"><input type="radio" name="choice_11" value="4"></td>
																</tr>
																<tr>
																	<td align="right">12</td>
																	<td>ระมัดระวังที่จะไม่ทำให้ผู้อื่นเดือดร้อนหรือเสียใจ</td>
																	<td align="center"><input type="radio" name="choice_12" value="1"></td>
																	<td align="center"><input type="radio" name="choice_12" value="2"></td>
																	<td align="center"><input type="radio" name="choice_12" value="3"></td>
																	<td align="center"><input type="radio" name="choice_12" value="4"></td>
																</tr>
																<tr>
																	<td align="right">13</td>
																	<td>ไม่ช่วยเหลือหรือไม่ให้ความร่วมมือกับผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_13" value="4"></td>
																	<td align="center"><input type="radio" name="choice_13" value="3"></td>
																	<td align="center"><input type="radio" name="choice_13" value="2"></td>
																	<td align="center"><input type="radio" name="choice_13" value="1"></td>
																</tr>
																<tr>
																	<td align="right">14</td>
																	<td>รู้จักให้กำลังใจผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_14" value="1"></td>
																	<td align="center"><input type="radio" name="choice_14" value="2"></td>
																	<td align="center"><input type="radio" name="choice_14" value="3"></td>
																	<td align="center"><input type="radio" name="choice_14" value="4"></td>
																</tr>
																<tr>
																	<td align="right">15</td>
																	<td>รู้จักรับฟังผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_15" value="1"></td>
																	<td align="center"><input type="radio" name="choice_15" value="2"></td>
																	<td align="center"><input type="radio" name="choice_15" value="3"></td>
																	<td align="center"><input type="radio" name="choice_15" value="4"></td>
																</tr>
																<tr>
																	<td align="right">16</td>
																	<td>รู้จักแสดงความห่วงใยผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_16" value="1"></td>
																	<td align="center"><input type="radio" name="choice_16" value="2"></td>
																	<td align="center"><input type="radio" name="choice_16" value="3"></td>
																	<td align="center"><input type="radio" name="choice_16" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn2" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 2 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 2) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 2) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 2 -->
										<div class="modal-content estimate-edit_form_3" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_3">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">17</td>
																	<td>มักสารภาพเมื่อทำผิด</td>
																	<td align="center"><input type="radio" name="choice_17" value="1"></td>
																	<td align="center"><input type="radio" name="choice_17" value="2"></td>
																	<td align="center"><input type="radio" name="choice_17" value="3"></td>
																	<td align="center"><input type="radio" name="choice_17" value="4"></td>
																</tr>
																<tr>
																	<td align="right">18</td>
																	<td>ไม่ชอบแกล้งเพื่อน</td>
																	<td align="center"><input type="radio" name="choice_18" value="1"></td>
																	<td align="center"><input type="radio" name="choice_18" value="2"></td>
																	<td align="center"><input type="radio" name="choice_18" value="3"></td>
																	<td align="center"><input type="radio" name="choice_18" value="4"></td>
																</tr>
																<tr>
																	<td align="right">19</td>
																	<td>ยอมรับว่าผิดเมื่อถูกถาม</td>
																	<td align="center"><input type="radio" name="choice_19" value="1"></td>
																	<td align="center"><input type="radio" name="choice_19" value="2"></td>
																	<td align="center"><input type="radio" name="choice_19" value="3"></td>
																	<td align="center"><input type="radio" name="choice_19" value="4"></td>
																</tr>
																<tr>
																	<td align="right">20</td>
																	<td>เมื่อทำผิด มักแก้ตัวว่าไม่ได้ตั้งใจ</td>
																	<td align="center"><input type="radio" name="choice_20" value="4"></td>
																	<td align="center"><input type="radio" name="choice_20" value="3"></td>
																	<td align="center"><input type="radio" name="choice_20" value="2"></td>
																	<td align="center"><input type="radio" name="choice_20" value="1"></td>
																</tr>
																<tr>
																	<td align="right">21</td>
																	<td>ยอมรับกฎเกณฑ์ เช่น ยอมรับการลงโทษเมื่อทำผิด</td>
																	<td align="center"><input type="radio" name="choice_21" value="1"></td>
																	<td align="center"><input type="radio" name="choice_21" value="2"></td>
																	<td align="center"><input type="radio" name="choice_21" value="3"></td>
																	<td align="center"><input type="radio" name="choice_21" value="4"></td>
																</tr>
																<tr>
																	<td align="right">22</td>
																	<td>รู้จักขอโทษ</td>
																	<td align="center"><input type="radio" name="choice_22" value="1"></td>
																	<td align="center"><input type="radio" name="choice_22" value="2"></td>
																	<td align="center"><input type="radio" name="choice_22" value="3"></td>
																	<td align="center"><input type="radio" name="choice_22" value="4"></td>
																</tr>
																<tr>
																	<td align="right">23</td>
																	<td>ยอมรับคำตำหนิหรือตักเตือนเมื่อทำผิด</td>
																	<td align="center"><input type="radio" name="choice_23" value="1"></td>
																	<td align="center"><input type="radio" name="choice_23" value="2"></td>
																	<td align="center"><input type="radio" name="choice_23" value="3"></td>
																	<td align="center"><input type="radio" name="choice_23" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn3" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 3 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 3) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 3) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 3 -->
										<div class="modal-content estimate-edit_form_4" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_4">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">24</td>
																	<td>มีความตั้งใจเมื่อทำสิ่งต่างๆ ที่สนใจ</td>
																	<td align="center"><input type="radio" name="choice_24" value="1"></td>
																	<td align="center"><input type="radio" name="choice_24" value="2"></td>
																	<td align="center"><input type="radio" name="choice_24" value="3"></td>
																	<td align="center"><input type="radio" name="choice_24" value="4"></td>
																</tr>
																<tr>
																	<td align="right">25</td>
																	<td>มีสมาธิในการทำงาน เช่น อ่านหนังสือได้นานๆ</td>
																	<td align="center"><input type="radio" name="choice_25" value="1"></td>
																	<td align="center"><input type="radio" name="choice_25" value="2"></td>
																	<td align="center"><input type="radio" name="choice_25" value="3"></td>
																	<td align="center"><input type="radio" name="choice_25" value="4"></td>
																</tr>
																<tr>
																	<td align="right">26</td>
																	<td>พยายามทำงานที่ยากให้สำเร็จได้ด้วยตนเอง เช่น การบ้าน การฝีมือ</td>
																	<td align="center"><input type="radio" name="choice_26" value="1"></td>
																	<td align="center"><input type="radio" name="choice_26" value="2"></td>
																	<td align="center"><input type="radio" name="choice_26" value="3"></td>
																	<td align="center"><input type="radio" name="choice_26" value="4"></td>
																</tr>
																<tr>
																	<td align="right">27</td>
																	<td>
																		สนุกกับการแก้ปัญหายากๆ หรือท้าทาย เช่น ปัญหาการบ้าน
																		ของเล่นที่แปลกๆ ใหม่ๆ
																	</td>
																	<td align="center"><input type="radio" name="choice_27" value="1"></td>
																	<td align="center"><input type="radio" name="choice_27" value="2"></td>
																	<td align="center"><input type="radio" name="choice_27" value="3"></td>
																	<td align="center"><input type="radio" name="choice_27" value="4"></td>
																</tr>
																<tr>
																	<td align="right">28</td>
																	<td>เฉื่อยชา ไม่สนใจที่จะทำงานให้เสร็จ</td>
																	<td align="center"><input type="radio" name="choice_28" value="4"></td>
																	<td align="center"><input type="radio" name="choice_28" value="3"></td>
																	<td align="center"><input type="radio" name="choice_28" value="2"></td>
																	<td align="center"><input type="radio" name="choice_28" value="1"></td>
																</tr>
																<tr>
																	<td align="right">29</td>
																	<td>บ่นหรือต่อรองว่างานต่างๆ ยากเกินกว่าที่จะทำได้ทั้งๆ ที่ยังไม่ได้ลงมือทำ</td>
																	<td align="center"><input type="radio" name="choice_29" value="4"></td>
																	<td align="center"><input type="radio" name="choice_29" value="3"></td>
																	<td align="center"><input type="radio" name="choice_29" value="2"></td>
																	<td align="center"><input type="radio" name="choice_29" value="1"></td>
																</tr>
																<tr>
																	<td align="right">30</td>
																	<td>ทำงานต่อไปจนเสร็จแม้ว่าเพื่อนๆ ไปเล่นแล้วก็ตาม</td>
																	<td align="center"><input type="radio" name="choice_30" value="1"></td>
																	<td align="center"><input type="radio" name="choice_30" value="2"></td>
																	<td align="center"><input type="radio" name="choice_30" value="3"></td>
																	<td align="center"><input type="radio" name="choice_30" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn4" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 4 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 4) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 4) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 4 -->
										<div class="modal-content estimate-edit_form_5" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_5">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">31</td>
																	<td>ไม่ท้อใจเมื่อประสบกับความผิดหวัง</td>
																	<td align="center"><input type="radio" name="choice_31" value="1"></td>
																	<td align="center"><input type="radio" name="choice_31" value="2"></td>
																	<td align="center"><input type="radio" name="choice_31" value="3"></td>
																	<td align="center"><input type="radio" name="choice_31" value="4"></td>
																</tr>
																<tr>
																	<td align="right">32</td>
																	<td>หาทางตกลงกับเพื่อนหรือเด็กคนอื่นเมื่อเกิดขัดแย้งกัน</td>
																	<td align="center"><input type="radio" name="choice_32" value="1"></td>
																	<td align="center"><input type="radio" name="choice_32" value="2"></td>
																	<td align="center"><input type="radio" name="choice_32" value="3"></td>
																	<td align="center"><input type="radio" name="choice_32" value="4"></td>
																</tr>
																<tr>
																	<td align="right">33</td>
																	<td>ไม่เอะอะโวยวายเมื่อพบปัญหาหรือความยุ่งยาก</td>
																	<td align="center"><input type="radio" name="choice_33" value="1"></td>
																	<td align="center"><input type="radio" name="choice_33" value="2"></td>
																	<td align="center"><input type="radio" name="choice_33" value="3"></td>
																	<td align="center"><input type="radio" name="choice_33" value="4"></td>
																</tr>
																<tr>
																	<td align="right">34</td>
																	<td>รู้จักรอจังหวะหรือรอคอยเวลาที่เหมาะสมในการแก้ปัญหา</td>
																	<td align="center"><input type="radio" name="choice_34" value="1"></td>
																	<td align="center"><input type="radio" name="choice_34" value="2"></td>
																	<td align="center"><input type="radio" name="choice_34" value="3"></td>
																	<td align="center"><input type="radio" name="choice_34" value="4"></td>
																</tr>
																<tr>
																	<td align="right">35</td>
																	<td>เมื่อมีปัญหา จะคิดหาวิธีแก้หลายๆ ทาง</td>
																	<td align="center"><input type="radio" name="choice_35" value="1"></td>
																	<td align="center"><input type="radio" name="choice_35" value="2"></td>
																	<td align="center"><input type="radio" name="choice_35" value="3"></td>
																	<td align="center"><input type="radio" name="choice_35" value="4"></td>
																</tr>
																<tr>
																	<td align="right">36</td>
																	<td>ร่วมกิจกรรมที่ตนไม่ชอบ หรือไม่ถนัดกับผู้อื่นได้</td>
																	<td align="center"><input type="radio" name="choice_36" value="1"></td>
																	<td align="center"><input type="radio" name="choice_36" value="2"></td>
																	<td align="center"><input type="radio" name="choice_36" value="3"></td>
																	<td align="center"><input type="radio" name="choice_36" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn5" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 5 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 5) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 5) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 5 -->
										<div class="modal-content estimate-edit_form_6" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_6">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">37</td>
																	<td>ทักทายหรือทำความรู้จักกับเพื่อนใหม่</td>
																	<td align="center"><input type="radio" name="choice_37" value="1"></td>
																	<td align="center"><input type="radio" name="choice_37" value="2"></td>
																	<td align="center"><input type="radio" name="choice_37" value="3"></td>
																	<td align="center"><input type="radio" name="choice_37" value="4"></td>
																</tr>
																<tr>
																	<td align="right">38</td>
																	<td>กล้าแสดงความสามารถที่มีอยู่ต่อหน้าคนหมู่มาก</td>
																	<td align="center"><input type="radio" name="choice_38" value="1"></td>
																	<td align="center"><input type="radio" name="choice_38" value="2"></td>
																	<td align="center"><input type="radio" name="choice_38" value="3"></td>
																	<td align="center"><input type="radio" name="choice_38" value="4"></td>
																</tr>
																<tr>
																	<td align="right">39</td>
																	<td>กล้าซักถามข้อสงสัย</td>
																	<td align="center"><input type="radio" name="choice_39" value="1"></td>
																	<td align="center"><input type="radio" name="choice_39" value="2"></td>
																	<td align="center"><input type="radio" name="choice_39" value="3"></td>
																	<td align="center"><input type="radio" name="choice_39" value="4"></td>
																</tr>
																<tr>
																	<td align="right">40</td>
																	<td>เมื่อถูกถาม ใช้วิธีนิ่งเฉย แทนการตอบว่าไม่รู้</td>
																	<td align="center"><input type="radio" name="choice_40" value="4"></td>
																	<td align="center"><input type="radio" name="choice_40" value="3"></td>
																	<td align="center"><input type="radio" name="choice_40" value="2"></td>
																	<td align="center"><input type="radio" name="choice_40" value="1"></td>
																</tr>
																<tr>
																	<td align="right">41</td>
																	<td>มักจะใช้ข้ออ้างเมื่อไม่กล้าทำอะไร</td>
																	<td align="center"><input type="radio" name="choice_41" value="4"></td>
																	<td align="center"><input type="radio" name="choice_41" value="3"></td>
																	<td align="center"><input type="radio" name="choice_41" value="2"></td>
																	<td align="center"><input type="radio" name="choice_41" value="1"></td>
																</tr>
																<tr>
																	<td align="right">42</td>
																	<td>ไม่กล้าออกความเห็นเมื่ออยู่กับผู้อื่น</td>
																	<td align="center"><input type="radio" name="choice_42" value="4"></td>
																	<td align="center"><input type="radio" name="choice_42" value="3"></td>
																	<td align="center"><input type="radio" name="choice_42" value="2"></td>
																	<td align="center"><input type="radio" name="choice_42" value="1"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn6" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 6 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 6) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 6) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 6 -->
										<div class="modal-content estimate-edit_form_7" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_7">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">43</td>
																	<td>เล่าถึงความสำเร็จของตนเองให้ผู้ใหญ่ฟัง</td>
																	<td align="center"><input type="radio" name="choice_43" value="1"></td>
																	<td align="center"><input type="radio" name="choice_43" value="2"></td>
																	<td align="center"><input type="radio" name="choice_43" value="3"></td>
																	<td align="center"><input type="radio" name="choice_43" value="4"></td>
																</tr>
																<tr>
																	<td align="right">44</td>
																	<td>
																		ไม่อายในสิ่งที่ตนมีอยู่ เช่น ฐานะบ้าน อาชีพของพ่อแม่ รูปร่างหน้าตา
																		ความสามารถของตนเอง ฯลฯ
																	</td>
																	<td align="center"><input type="radio" name="choice_44" value="1"></td>
																	<td align="center"><input type="radio" name="choice_44" value="2"></td>
																	<td align="center"><input type="radio" name="choice_44" value="3"></td>
																	<td align="center"><input type="radio" name="choice_44" value="4"></td>
																</tr>
																<tr>
																	<td align="right">45</td>
																	<td>
																		ภูมิใจที่ตนเองมีจุดดีหรือความสามารถพิเศษบางอย่าง เช่น เรียนเก่ง
																		เล่นกีฬาเก่ง เล่นดนตรีได้
																	</td>
																	<td align="center"><input type="radio" name="choice_45" value="1"></td>
																	<td align="center"><input type="radio" name="choice_45" value="2"></td>
																	<td align="center"><input type="radio" name="choice_45" value="3"></td>
																	<td align="center"><input type="radio" name="choice_45" value="4"></td>
																</tr>
																<tr>
																	<td align="right">46</td>
																	<td>
																		ภูมิใจที่ได้รับความไว้วางใจจากผู้ใหญ่ เช่น ดูแลน้อง ดูแลสัตว์เลี้ยง
																		ช่วยเหลืองานผู้ใหญ่
																	</td>
																	<td align="center"><input type="radio" name="choice_46" value="1"></td>
																	<td align="center"><input type="radio" name="choice_46" value="2"></td>
																	<td align="center"><input type="radio" name="choice_46" value="3"></td>
																	<td align="center"><input type="radio" name="choice_46" value="4"></td>
																</tr>
																<tr>
																	<td align="right">47</td>
																	<td>น้อยใจง่าย</td>
																	<td align="center"><input type="radio" name="choice_47" value="4"></td>
																	<td align="center"><input type="radio" name="choice_47" value="3"></td>
																	<td align="center"><input type="radio" name="choice_47" value="2"></td>
																	<td align="center"><input type="radio" name="choice_47" value="1"></td>
																</tr>
																<tr>
																	<td align="right">48</td>
																	<td>รู้สึกน้อยเนื้อต่ำใจที่สู้คนอื่นไม่ได้</td>
																	<td align="center"><input type="radio" name="choice_48" value="4"></td>
																	<td align="center"><input type="radio" name="choice_48" value="3"></td>
																	<td align="center"><input type="radio" name="choice_48" value="2"></td>
																	<td align="center"><input type="radio" name="choice_48" value="1"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn7" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 7 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 7) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 7) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 7 -->
										<div class="modal-content estimate-edit_form_8" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_8">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">49</td>
																	<td>พอใจกับผลการเรียนที่ได้ แม้จะไม่ดีเด่นมากนัก</td>
																	<td align="center"><input type="radio" name="choice_49" value="1"></td>
																	<td align="center"><input type="radio" name="choice_49" value="2"></td>
																	<td align="center"><input type="radio" name="choice_49" value="3"></td>
																	<td align="center"><input type="radio" name="choice_49" value="4"></td>
																</tr>
																<tr>
																	<td align="right">50</td>
																	<td>เมื่อไม่ได้สิ่งที่ต้องการก็รู้จักยอมรับสิ่งทดแทนอย่างอื่นได้</td>
																	<td align="center"><input type="radio" name="choice_50" value="1"></td>
																	<td align="center"><input type="radio" name="choice_50" value="2"></td>
																	<td align="center"><input type="radio" name="choice_50" value="3"></td>
																	<td align="center"><input type="radio" name="choice_50" value="4"></td>
																</tr>
																<tr>
																	<td align="right">51</td>
																	<td>แม้เกมหรือกีฬาแพ้ก็ไม่เสียใจนาน</td>
																	<td align="center"><input type="radio" name="choice_51" value="1"></td>
																	<td align="center"><input type="radio" name="choice_51" value="2"></td>
																	<td align="center"><input type="radio" name="choice_51" value="3"></td>
																	<td align="center"><input type="radio" name="choice_51" value="4"></td>
																</tr>
																<tr>
																	<td align="right">52</td>
																	<td>แม้เป็นสิ่งที่ไม่จำเป็นก็เรียกร้องที่จะเอาให้ได้ตามที่ต้องการ</td>
																	<td align="center"><input type="radio" name="choice_52" value="4"></td>
																	<td align="center"><input type="radio" name="choice_52" value="3"></td>
																	<td align="center"><input type="radio" name="choice_52" value="2"></td>
																	<td align="center"><input type="radio" name="choice_52" value="1"></td>
																</tr>
																<tr>
																	<td align="right">53</td>
																	<td>หงุดหงิดอยู่นานเมื่อไม่ได้ดั่งใจ</td>
																	<td align="center"><input type="radio" name="choice_53" value="4"></td>
																	<td align="center"><input type="radio" name="choice_53" value="3"></td>
																	<td align="center"><input type="radio" name="choice_53" value="2"></td>
																	<td align="center"><input type="radio" name="choice_53" value="1"></td>
																</tr>
																<tr>
																	<td align="right">54</td>
																	<td>เมื่อทำอะไรไม่ได้ตามต้องการจะผิดหวังมาก เช่น บ่น คร่ำครวญ หรือซึม</td>
																	<td align="center"><input type="radio" name="choice_54" value="4"></td>
																	<td align="center"><input type="radio" name="choice_54" value="3"></td>
																	<td align="center"><input type="radio" name="choice_54" value="2"></td>
																	<td align="center"><input type="radio" name="choice_54" value="1"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn8" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 8 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 8) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 8) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 8 -->
										<div class="modal-content estimate-edit_form_9" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<table class="table table-bordered table-striped" id="table_estimate_9">
															<thead>
																<tr>
																	<th width="5%"><p>ลำดับ</p></th>
																	<th width="41%"><p>คำถาม</p></th>
																	<th width="12%"><p class="text-center">ไม่เป็นเลย</p></th>
																	<th width="12%"><p class="text-center">เป็นบางครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นบ่อยครั้ง</p></th>
																	<th width="12%"><p class="text-center">เป็นประจำ</p></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td align="right">55</td>
																	<td>มีอารมณ์ขัน</td>
																	<td align="center"><input type="radio" name="choice_55" value="1"></td>
																	<td align="center"><input type="radio" name="choice_55" value="2"></td>
																	<td align="center"><input type="radio" name="choice_55" value="3"></td>
																	<td align="center"><input type="radio" name="choice_55" value="4"></td>
																</tr>
																<tr>
																	<td align="right">56</td>
																	<td>เล่นสนุกสนานหรือล้อกันเล่นสนุกๆ ได้</td>
																	<td align="center"><input type="radio" name="choice_56" value="1"></td>
																	<td align="center"><input type="radio" name="choice_56" value="2"></td>
																	<td align="center"><input type="radio" name="choice_56" value="3"></td>
																	<td align="center"><input type="radio" name="choice_56" value="4"></td>
																</tr>
																<tr>
																	<td align="right">57</td>
																	<td>เมื่ออยู่คนเดียวก็รู้จักหาสิ่งมาทำให้ตัวเองเพลิดเพลินได้</td>
																	<td align="center"><input type="radio" name="choice_57" value="1"></td>
																	<td align="center"><input type="radio" name="choice_57" value="2"></td>
																	<td align="center"><input type="radio" name="choice_57" value="3"></td>
																	<td align="center"><input type="radio" name="choice_57" value="4"></td>
																</tr>
																<tr>
																	<td align="right">58</td>
																	<td>
																		รู้จักผ่อนคลายอารมณ์ด้วยการดูหนัง ฟังเพลง เล่นสนุก วาดรูป
																		พูดคุยกับเพื่อน
																	</td>
																	<td align="center"><input type="radio" name="choice_58" value="1"></td>
																	<td align="center"><input type="radio" name="choice_58" value="2"></td>
																	<td align="center"><input type="radio" name="choice_58" value="3"></td>
																	<td align="center"><input type="radio" name="choice_58" value="4"></td>
																</tr>
																<tr>
																	<td align="right">59</td>
																	<td>เป็นคนแจ่มใส ยิ้มง่าย หัวเราะง่าย</td>
																	<td align="center"><input type="radio" name="choice_59" value="1"></td>
																	<td align="center"><input type="radio" name="choice_59" value="2"></td>
																	<td align="center"><input type="radio" name="choice_59" value="3"></td>
																	<td align="center"><input type="radio" name="choice_59" value="4"></td>
																</tr>
																<tr>
																	<td align="right">60</td>
																	<td>สนุกกับการแข่งขันแม้จะรู้ว่าไม่ชนะ</td>
																	<td align="center"><input type="radio" name="choice_60" value="1"></td>
																	<td align="center"><input type="radio" name="choice_60" value="2"></td>
																	<td align="center"><input type="radio" name="choice_60" value="3"></td>
																	<td align="center"><input type="radio" name="choice_60" value="4"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-2">
																<input type="submit" name="SaveBtn9" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-10">
																<p class="show_score">ประวัติการประเมินส่วนที่ 9 : <?php echo (check_estimate($estimate_parent_fetch->Es_id, 9) > 0) ? 'คะแนนการประเมินครั้งล่าสุดคือ '.check_estimate($estimate_parent_fetch->Es_id, 9) : 'ยังไม่ได้ทำการประเมินหรือคะแนนการประเมินครั้งล่าสุดเป็น 0'; ?></p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 9 -->
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row site_content-result">
					<div class="col-md-12">
						<div class="row site_content-result_student">
							<div class="modal fade" id="teacher-estimate_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="container">
											<div class="row" id="teacher-estimate_display_score">
												<div class="col-md-9">
													<h2>
														ผลการประเมินของครูประจำชั้น 
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</h2> 
													<hr>
													<h3>คะแนนการประเมิน</h3>
													<table class="table table-bordered table-striped" id="teacher-table_result">
														<thead>
															<tr>
																<th colspan="3"><p class="text-center">ดี</p></th>
																<th colspan="3"><p class="text-center">เก่ง</p></th>
																<th colspan="3"><p class="text-center">สุข</p></th>
															</tr>
															<tr>
																<?php
																$groups = get_group();
																while($group = mysql_fetch_array($groups)) {
																	?>
																	<td><center><?php echo $group['Sg_name']; ?></center></td>
																	<?php
																}
																?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<?php
																while($result = mysql_fetch_array($estimate_teacher_table)) {
																	?>
																	<td><?php echo $result['Es_score']; ?></td>
																	<?php
																}
																?>
															</tr>
														</tbody>
													</table>
													<h3>เกณฑ์คะแนนที (T-Score Norms)</h3>
													<table class="table table-bordered table-striped" id="teacher_tscore-table_result">
														<thead>
															<tr>
																<th colspan="3"><p class="text-center">ดี</p></th>
																<th colspan="3"><p class="text-center">เก่ง</p></th>
																<th colspan="3"><p class="text-center">สุข</p></th>
															</tr>
															<tr>
																<?php
																$groups = get_group();
																while($group = mysql_fetch_array($groups)) {
																	?>
																	<td><center><?php echo $group['Sg_name']; ?></center></td>
																	<?php
																}
																?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<?php
																while($result = mysql_fetch_array($estimate_teacher_tscore)) {
																	?>
																	<td><?php echo T_Score($result['Es_score'],$result['Sg_id']); ?></td>
																	<?php
																}
																?>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="row" id="teacher-estimate_display_text">
												<div class="col-md-9">
													<?php
													$estimate_score = "SELECT * FROM estimate_score es WHERE es.Es_id = $estimate_teacher_fetch->Es_id";
													include("assets/template/guide.php");
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row site_content-result_family">
							<div class="modal fade" id="parent-estimate_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="container">
											<div class="row" id="parent-estimate_display_score">
												<div class="col-md-9">
													<h2>
														ผลการประเมินของผู้ปกครอง
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</h2> 
													<hr>
													<h3>คะแนนการประเมิน</h3>
													<table class="table table-bordered table-striped" id="parent-table_result">
														<thead>
															<tr>
																<th colspan="3"><p class="text-center">ดี</p></th>
																<th colspan="3"><p class="text-center">เก่ง</p></th>
																<th colspan="3"><p class="text-center">สุข</p></th>
															</tr>
															<tr>
																<?php
																$groups = get_group();
																while($group = mysql_fetch_array($groups)) {
																	?>
																	<td><center><?php echo $group['Sg_name']; ?></center></td>
																	<?php
																}
																?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<?php
																while($result = mysql_fetch_array($estimate_parent_table)) {
																	?>
																	<td><?php echo $result['Es_score']; ?></td>
																	<?php
																}
																?>
															</tr>
														</tbody>
													</table>
													<h3>เกณฑ์คะแนนที (T-Score Norms)</h3>
													<table class="table table-bordered table-striped" id="parent_tscore-table_result">
														<thead>
															<tr>
																<th colspan="3"><p class="text-center">ดี</p></th>
																<th colspan="3"><p class="text-center">เก่ง</p></th>
																<th colspan="3"><p class="text-center">สุข</p></th>
															</tr>
															<tr>
																<?php
																$groups = get_group();
																while($group = mysql_fetch_array($groups)) {
																	?>
																	<td><center><?php echo $group['Sg_name']; ?></center></td>
																	<?php
																}
																?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<?php
																while($result = mysql_fetch_array($estimate_parent_tscore)) {
																	?>
																	<td><?php echo T_Score($result['Es_score'],$result['Sg_id']); ?></td>
																	<?php
																}
																?>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="row" id="parent-estimate_display_text">
												<div class="col-md-9">
													<?php
													$estimate_score = "SELECT * FROM estimate_score es WHERE es.Es_id = $estimate_parent_fetch->Es_id";
													include("assets/template/guide.php");
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row site_content-result_overall">
							<div class="modal fade" id="compare-estimate_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="container">
											<div class="row" id="compare-estimate_display_score">
												<div class="col-md-9">
													<h2>
														ผลการประเมินเปรียบเทียบ
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</h2>
													<hr>
													<h3>คะแนนการประเมิน</h3>
													<table class="table table-bordered table-striped" id="compare-table_result">
														<thead>
															<tr>
																<th></th>
																<th><p class="text-center">ครูประจำชั้น</p></th>
																<th><p class="text-center">ผู้ปกครอง</p></th>
															</tr>
														</thead>
														<tbody>
															<?php
															$groups = get_group();
															while($group = mysql_fetch_array($groups)) {
																?>
																<tr>
																	<td>
																		<?php echo $group['Sg_name']; ?>
																	</td>
																	<td>
																		<center>
																			<?php
																			echo get_compare_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, $group['Sg_id'] , "ครูประจำชั้น");
																			?>
																		</center>
																	</td>
																	<td>
																		<center>
																			<?php
																			echo get_compare_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, $group['Sg_id'] , "ผู้ปกครอง");
																			?>
																		</center>
																	</td>
																</tr>
																<?php
															}
															?>														
														</tbody>
													</table>
													<h3>เกณฑ์คะแนนที (T-Score Norms)</h3>
													<table class="table table-bordered table-striped" id="compare_tscore-table_result">
														<thead>
															<tr>
																<th></th>
																<th><p class="text-center">ครูประจำชั้น</p></th>
																<th><p class="text-center">ผู้ปกครอง</p></th>
															</tr>
														</thead>
														<tbody>
															<?php
															$groups = get_group();
															while($group = mysql_fetch_array($groups)) {
																?>
																<tr>
																	<td>
																		<?php echo $group['Sg_name']; ?>
																	</td>
																	<td>
																		<center>
																			<?php
																			$teacher_estimate_score = get_compare_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, $group['Sg_id'] , "ครูประจำชั้น");
																			echo T_Score($teacher_estimate_score, $group['Sg_id']);
																			?>
																		</center>
																	</td>
																	<td>
																		<center>
																			<?php
																			$parent_estimate_score = get_compare_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, $group['Sg_id'] , "ผู้ปกครอง");
																			echo T_Score($parent_estimate_score, $group['Sg_id']);
																			?>
																		</center>
																	</td>
																</tr>
																<?php
															}
															?>
														</tbody>
													</table>
												</div>
											</div>
											<hr>
											<div class="row" id="compare-estimate_display_text">
												<div class="col-md-9">
													<h3>เปรียบเทียบผลการประเมิน</h3>
													<table class="table table-bordered table-striped" id="compare_guide">
														<?php
														for ($i = 1; $i <= 8; $i++) {
															$teacher_guide_score = get_compare_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, $i , "ครูประจำชั้น");
															$parent_guide_score = get_compare_estimate($student_fetch->Std_no, $student_fetch->Term, $student_fetch->Term_year, $i , "ผู้ปกครอง");
															?>
															<tr>
																<td>
																	<li class="list-group-item">
																		<?php
																		if ($i == 1) {
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านควบคุมอารมณ์ที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านควบคุมอารมณ์ที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านควบคุมอารมณ์ที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		} else if ($i == 2){
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านใส่ใจและเข้าใจอารมณ์ที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านใส่ใจและเข้าใจอารมณ์ที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านใส่ใจและเข้าใจอารมณ์ที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		} else if ($i == 3){
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านยอมรับถูกผิดที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านยอมรับถูกผิดที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านใส่ยอมรับถูกผิดที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		} else if ($i == 4) {
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านมุ่งมั่นพยายามที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านมุ่งมั่นพยายามที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านมุ่งมั่นพยายามที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		} else if ($i == 5) {
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านปรับตัวต่อปัญหาที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านปรับตัวต่อปัญหาที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านปรับตัวต่อปัญหาที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		} else if ($i == 6) {
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านกล้าแสดงออกที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านกล้าแสดงออกที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านกล้าแสดงออกที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		} else if ($i == 7) {
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านพอใจในตนเองที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านพอใจในตนเองที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านพอใจในตนเองกที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		} else if ($i == 8) {
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านรู้จักปรับตัวที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านรู้จักปรับตัวที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านรู้จักปรับตัวที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		} else if ($i == 9) {
																			if (compare_score($teacher_guide_score, $parent_guide_score) == 1) {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านรื่นเริงเบิกบานที่บ้านมีค่าคะแนนการประเมินน้อยกว่าที่โรงเรียน";
																			} else if (compare_score($teacher_guide_score, $parent_guide_score) == 2){
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านรื่นเริงเบิกบานที่บ้านมีค่าคะแนนการประเมินมากกว่าที่โรงเรียน";
																			} else {
																				echo "ค่าความฉลาดทางอารมณ์ทางด้านรื่นเริงเบิกบานที่บ้านและที่โรงเรียนมีคะแนนการประเมินเท่ากัน";
																			}
																		}
																		?>
																	</li>
																</td>
															</tr>
															<?php
														}
														?>
													</table>
													<fieldset>
														<legend>คำแนะนำ</legend>
														<div class="panel panel-success">
															<div class="panel-heading">
																<h3 class="panel-title">เกณฑ์คะแนนทีตั้งแต่ 50 คะแนนขึ้นไป</h3>
															</div>
															<div class="panel-body">
																บ่งบอกว่าเด็กมีความฉลาดทางอารมณ์อยู่ในเกณฑ์ที่ดี ควรส่งเสริมและรักษาคุณลักษณะนี้ให้คงไว้
															</div>
														</div>
														<div class="panel panel-warning">
															<div class="panel-heading">
																<h3 class="panel-title">เกณฑ์คะแนนทีอยู่ในช่วง 40 ถึง 49 คะแนน</h3>
															</div>
															<div class="panel-body">
																บ่งบอกว่าเด็กควรได้รับการพัฒนาความฉลาดทางอารมณ์ในด้านนั้นๆให้ดียิ่งขึ้น ผู้ใหญ่ควรร่วมกันส่งเสริมให้เด็กมีความฉลาดทางอารมณ์ในด้านนั้นๆ อย่างต่อเนื่อง
															</div>
														</div>
														<div class="panel panel-danger">
															<div class="panel-heading">
																<h3 class="panel-title">เกณฑ์คะแนนทีต่ำกว่า 40 คะแนน</h3>
															</div>
															<div class="panel-body">
																บ่งบอกว่าเด็กจำเป็นต้องได้รับการพัฒนาความฉลาดทางอารมณ์ในด้านนั้นๆ ให้ดียิ่งขึ้น ผู้ใหญ่จำเป็นต้องช่วยกันเอาใจใส่พัฒนาความฉลาดทางอารมณ์เด็กอย่างจริงจังและสม่ำเสมอ
															</div>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
	<script type="text/javascript">
		$(function() {
			$('.estimate_form-link_1').click(function(e) {
				$(".estimate-edit_form_1").delay(100).fadeIn(100);
				$(".estimate-edit_form_2").fadeOut(100);
				$(".estimate-edit_form_3").fadeOut(100);
				$(".estimate-edit_form_4").fadeOut(100);
				$(".estimate-edit_form_5").fadeOut(100);
				$(".estimate-edit_form_6").fadeOut(100);
				$(".estimate-edit_form_7").fadeOut(100);
				$(".estimate-edit_form_9").fadeOut(100);
				$(".estimate-edit_form_8").fadeOut(100);
				$('.estimate_form-link_1').addClass('active');
				$('.estimate_form-link_2').removeClass('active');
				$('.estimate_form-link_3').removeClass('active');
				$('.estimate_form-link_4').removeClass('active');
				$('.estimate_form-link_5').removeClass('active');
				$('.estimate_form-link_6').removeClass('active');
				$('.estimate_form-link_7').removeClass('active');
				$('.estimate_form-link_8').removeClass('active');
				$('.estimate_form-link_9').removeClass('active');
				e.preventDefault();
			});
			$('.estimate_form-link_2').click(function(e) {
				$(".estimate-edit_form_1").fadeOut(100);
				$(".estimate-edit_form_2").delay(100).fadeIn(100);
				$(".estimate-edit_form_3").fadeOut(100);
				$(".estimate-edit_form_4").fadeOut(100);
				$(".estimate-edit_form_5").fadeOut(100);
				$(".estimate-edit_form_6").fadeOut(100);
				$(".estimate-edit_form_7").fadeOut(100);
				$(".estimate-edit_form_9").fadeOut(100);
				$(".estimate-edit_form_8").fadeOut(100);
				$('.estimate_form-link_1').removeClass('active');
				$('.estimate_form-link_2').addClass('active');
				$('.estimate_form-link_3').removeClass('active');
				$('.estimate_form-link_4').removeClass('active');
				$('.estimate_form-link_5').removeClass('active');
				$('.estimate_form-link_6').removeClass('active');
				$('.estimate_form-link_7').removeClass('active');
				$('.estimate_form-link_8').removeClass('active');
				$('.estimate_form-link_9').removeClass('active');
				e.preventDefault();
			});
			$('.estimate_form-link_3').click(function(e) {
				$(".estimate-edit_form_1").fadeOut(100);
				$(".estimate-edit_form_2").fadeOut(100);
				$(".estimate-edit_form_3").delay(100).fadeIn(100);
				$(".estimate-edit_form_4").fadeOut(100);
				$(".estimate-edit_form_5").fadeOut(100);
				$(".estimate-edit_form_6").fadeOut(100);
				$(".estimate-edit_form_7").fadeOut(100);
				$(".estimate-edit_form_9").fadeOut(100);
				$(".estimate-edit_form_8").fadeOut(100);
				$('.estimate_form-link_1').removeClass('active');
				$('.estimate_form-link_2').removeClass('active');
				$('.estimate_form-link_3').addClass('active');
				$('.estimate_form-link_4').removeClass('active');
				$('.estimate_form-link_5').removeClass('active');
				$('.estimate_form-link_6').removeClass('active');
				$('.estimate_form-link_7').removeClass('active');
				$('.estimate_form-link_8').removeClass('active');
				$('.estimate_form-link_9').removeClass('active');
				e.preventDefault();
			});
			$('.estimate_form-link_4').click(function(e) {
				$(".estimate-edit_form_1").fadeOut(100);
				$(".estimate-edit_form_2").fadeOut(100);
				$(".estimate-edit_form_3").fadeOut(100);
				$(".estimate-edit_form_4").delay(100).fadeIn(100);
				$(".estimate-edit_form_5").fadeOut(100);
				$(".estimate-edit_form_6").fadeOut(100);
				$(".estimate-edit_form_7").fadeOut(100);
				$(".estimate-edit_form_8").fadeOut(100);
				$(".estimate-edit_form_9").fadeOut(100);
				$('.estimate_form-link_1').removeClass('active');
				$('.estimate_form-link_2').removeClass('active');
				$('.estimate_form-link_3').removeClass('active');
				$('.estimate_form-link_4').addClass('active');
				$('.estimate_form-link_5').removeClass('active');
				$('.estimate_form-link_6').removeClass('active');
				$('.estimate_form-link_7').removeClass('active');
				$('.estimate_form-link_8').removeClass('active');
				$('.estimate_form-link_9').removeClass('active');
				e.preventDefault();
			});
			$('.estimate_form-link_5').click(function(e) {
				$(".estimate-edit_form_1").fadeOut(100);
				$(".estimate-edit_form_2").fadeOut(100);
				$(".estimate-edit_form_3").fadeOut(100);
				$(".estimate-edit_form_4").fadeOut(100);
				$(".estimate-edit_form_5").delay(100).fadeIn(100);
				$(".estimate-edit_form_6").fadeOut(100);
				$(".estimate-edit_form_7").fadeOut(100);
				$(".estimate-edit_form_8").fadeOut(100);
				$(".estimate-edit_form_9").fadeOut(100);
				$('.estimate_form-link_1').removeClass('active');
				$('.estimate_form-link_2').removeClass('active');
				$('.estimate_form-link_3').removeClass('active');
				$('.estimate_form-link_4').removeClass('active');
				$('.estimate_form-link_5').addClass('active');
				$('.estimate_form-link_6').removeClass('active');
				$('.estimate_form-link_7').removeClass('active');
				$('.estimate_form-link_8').removeClass('active');
				$('.estimate_form-link_9').removeClass('active');
				e.preventDefault();
			});
			$('.estimate_form-link_6').click(function(e) {
				$(".estimate-edit_form_1").fadeOut(100);
				$(".estimate-edit_form_2").fadeOut(100);
				$(".estimate-edit_form_3").fadeOut(100);
				$(".estimate-edit_form_4").fadeOut(100);
				$(".estimate-edit_form_5").fadeOut(100);
				$(".estimate-edit_form_6").delay(100).fadeIn(100);
				$(".estimate-edit_form_7").fadeOut(100);
				$(".estimate-edit_form_8").fadeOut(100);
				$(".estimate-edit_form_9").fadeOut(100);
				$('.estimate_form-link_1').removeClass('active');
				$('.estimate_form-link_2').removeClass('active');
				$('.estimate_form-link_3').removeClass('active');
				$('.estimate_form-link_4').removeClass('active');
				$('.estimate_form-link_5').removeClass('active');
				$('.estimate_form-link_6').addClass('active');
				$('.estimate_form-link_7').removeClass('active');
				$('.estimate_form-link_8').removeClass('active');
				$('.estimate_form-link_9').removeClass('active');
				e.preventDefault();
			});
			$('.estimate_form-link_7').click(function(e) {
				$(".estimate-edit_form_1").fadeOut(100);
				$(".estimate-edit_form_2").fadeOut(100);
				$(".estimate-edit_form_3").fadeOut(100);
				$(".estimate-edit_form_4").fadeOut(100);
				$(".estimate-edit_form_5").fadeOut(100);
				$(".estimate-edit_form_6").fadeOut(100);
				$(".estimate-edit_form_7").delay(100).fadeIn(100);
				$(".estimate-edit_form_8").fadeOut(100);
				$(".estimate-edit_form_9").fadeOut(100);
				$('.estimate_form-link_1').removeClass('active');
				$('.estimate_form-link_2').removeClass('active');
				$('.estimate_form-link_3').removeClass('active');
				$('.estimate_form-link_4').removeClass('active');
				$('.estimate_form-link_5').removeClass('active');
				$('.estimate_form-link_6').removeClass('active');
				$('.estimate_form-link_7').addClass('active');
				$('.estimate_form-link_8').removeClass('active');
				$('.estimate_form-link_9').removeClass('active');
				e.preventDefault();
			});
			$('.estimate_form-link_8').click(function(e) {
				$(".estimate-edit_form_1").fadeOut(100);
				$(".estimate-edit_form_2").fadeOut(100);
				$(".estimate-edit_form_3").fadeOut(100);
				$(".estimate-edit_form_4").fadeOut(100);
				$(".estimate-edit_form_5").fadeOut(100);
				$(".estimate-edit_form_6").fadeOut(100);
				$(".estimate-edit_form_7").fadeOut(100);
				$(".estimate-edit_form_8").delay(100).fadeIn(100);
				$(".estimate-edit_form_9").fadeOut(100);
				$('.estimate_form-link_1').removeClass('active');
				$('.estimate_form-link_2').removeClass('active');
				$('.estimate_form-link_3').removeClass('active');
				$('.estimate_form-link_4').removeClass('active');
				$('.estimate_form-link_5').removeClass('active');
				$('.estimate_form-link_6').removeClass('active');
				$('.estimate_form-link_7').removeClass('active');
				$('.estimate_form-link_8').addClass('active');
				$('.estimate_form-link_9').removeClass('active');
				e.preventDefault();
			});
			$('.estimate_form-link_9').click(function(e) {
				$(".estimate-edit_form_1").fadeOut(100);
				$(".estimate-edit_form_2").fadeOut(100);
				$(".estimate-edit_form_3").fadeOut(100);
				$(".estimate-edit_form_4").fadeOut(100);
				$(".estimate-edit_form_5").fadeOut(100);
				$(".estimate-edit_form_6").fadeOut(100);
				$(".estimate-edit_form_7").fadeOut(100);
				$(".estimate-edit_form_8").fadeOut(100);
				$(".estimate-edit_form_9").delay(100).fadeIn(100);
				$('.estimate_form-link_1').removeClass('active');
				$('.estimate_form-link_2').removeClass('active');
				$('.estimate_form-link_3').removeClass('active');
				$('.estimate_form-link_4').removeClass('active');
				$('.estimate_form-link_5').removeClass('active');
				$('.estimate_form-link_6').removeClass('active');
				$('.estimate_form-link_7').removeClass('active');
				$('.estimate_form-link_8').removeClass('active');
				$('.estimate_form-link_9').addClass('active');
				e.preventDefault();
			});
		});
	</script>
</body>
</html> 