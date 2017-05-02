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
					<a href="" id="family-link">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/family-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ดูผลการประเมินของผู้ปกครอง
						</div>
					</a>
					<a href="" id="overall-link">
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
										<form action="assets/service/assessor.php" role="form" method="post" data-toggle="validator" id="assesor-edit_form">
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
										<form action="assets/service/assessor.php" role="form" method="post" data-toggle="validator" id="assesor-edit_form">
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
										<div class="modal-content" id="estimate-edit_form_1">
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
															<a href="#" class="list-group-item estimate_form-link_previous disabled"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item active estimate_form-link_1">ส่วนที่ 1</a>
															<a href="#" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="#" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="#" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="#" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="#" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="#" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="#" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="#" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
															<a href="#" class="list-group-item estimate_form-link_next"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></a>
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
									</form>
								</div>
							</div>
							<div class="modal fade" id="estimate-parent_edit_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<form action="assets/service/estimate.php" role="form" method="post" data-toggle="validator" id="estimte-parent_edit_form" name="estimte-parent_edit_form">
										<div class="modal-content" id="estimate-edit_form_1">
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
															<a href="#" class="list-group-item estimate_form-link_previous disabled"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item active estimate_form-link_1">ส่วนที่ 1</a>
															<a href="#" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="#" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="#" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="#" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="#" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="#" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="#" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="#" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
															<a href="#" class="list-group-item estimate_form-link_next"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></a>
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
									</form>
								</div>
							</div>
						</div>
						<div class="row site_content-form_result">
							
						</div>
					</div>
				</div>
				<div class="row site_content-result">
					<div class="col-md-12">
						<div class="row site_content-result_student"></div>
						<div class="row site_content-result_family"></div>
						<div class="row site_content-result_overall"></div>
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
				$("#estimate-edit_form_1").delay(100).fadeIn(100);
				$("#estimate-edit_form_2").fadeOut(100);
				$("#estimate-edit_form_3").fadeOut(100);
				$("#estimate-edit_form_4").fadeOut(100);
				$("#estimate-edit_form_5").fadeOut(100);
				$("#estimate-edit_form_6").fadeOut(100);
				$("#estimate-edit_form_7").fadeOut(100);
				$("#estimate-edit_form_9").fadeOut(100);
				$("#estimate-edit_form_8").fadeOut(100);
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
				$("#estimate-edit_form_1").fadeOut(100);
				$("#estimate-edit_form_2").delay(100).fadeIn(100);
				$("#estimate-edit_form_3").fadeOut(100);
				$("#estimate-edit_form_4").fadeOut(100);
				$("#estimate-edit_form_5").fadeOut(100);
				$("#estimate-edit_form_6").fadeOut(100);
				$("#estimate-edit_form_7").fadeOut(100);
				$("#estimate-edit_form_9").fadeOut(100);
				$("#estimate-edit_form_8").fadeOut(100);
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
				$("#estimate-edit_form_1").fadeOut(100);
				$("#estimate-edit_form_2").fadeOut(100);
				$("#estimate-edit_form_3").delay(100).fadeIn(100);
				$("#estimate-edit_form_4").fadeOut(100);
				$("#estimate-edit_form_5").fadeOut(100);
				$("#estimate-edit_form_6").fadeOut(100);
				$("#estimate-edit_form_7").fadeOut(100);
				$("#estimate-edit_form_9").fadeOut(100);
				$("#estimate-edit_form_8").fadeOut(100);
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
				$("#estimate-edit_form_1").fadeOut(100);
				$("#estimate-edit_form_2").fadeOut(100);
				$("#estimate-edit_form_3").fadeOut(100);
				$("#estimate-edit_form_4").delay(100).fadeIn(100);
				$("#estimate-edit_form_5").fadeOut(100);
				$("#estimate-edit_form_6").fadeOut(100);
				$("#estimate-edit_form_7").fadeOut(100);
				$("#estimate-edit_form_8").fadeOut(100);
				$("#estimate-edit_form_9").fadeOut(100);
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
				$("#estimate-edit_form_1").fadeOut(100);
				$("#estimate-edit_form_2").fadeOut(100);
				$("#estimate-edit_form_3").fadeOut(100);
				$("#estimate-edit_form_4").fadeOut(100);
				$("#estimate-edit_form_5").delay(100).fadeIn(100);
				$("#estimate-edit_form_6").fadeOut(100);
				$("#estimate-edit_form_7").fadeOut(100);
				$("#estimate-edit_form_8").fadeOut(100);
				$("#estimate-edit_form_9").fadeOut(100);
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
				$("#estimate-edit_form_1").fadeOut(100);
				$("#estimate-edit_form_2").fadeOut(100);
				$("#estimate-edit_form_3").fadeOut(100);
				$("#estimate-edit_form_4").fadeOut(100);
				$("#estimate-edit_form_5").fadeOut(100);
				$("#estimate-edit_form_6").delay(100).fadeIn(100);
				$("#estimate-edit_form_7").fadeOut(100);
				$("#estimate-edit_form_8").fadeOut(100);
				$("#estimate-edit_form_9").fadeOut(100);
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
				$("#estimate-edit_form_1").fadeOut(100);
				$("#estimate-edit_form_2").fadeOut(100);
				$("#estimate-edit_form_3").fadeOut(100);
				$("#estimate-edit_form_4").fadeOut(100);
				$("#estimate-edit_form_5").fadeOut(100);
				$("#estimate-edit_form_6").fadeOut(100);
				$("#estimate-edit_form_7").delay(100).fadeIn(100);
				$("#estimate-edit_form_8").fadeOut(100);
				$("#estimate-edit_form_9").fadeOut(100);
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
				$("#estimate-edit_form_1").fadeOut(100);
				$("#estimate-edit_form_2").fadeOut(100);
				$("#estimate-edit_form_3").fadeOut(100);
				$("#estimate-edit_form_4").fadeOut(100);
				$("#estimate-edit_form_5").fadeOut(100);
				$("#estimate-edit_form_6").fadeOut(100);
				$("#estimate-edit_form_7").fadeOut(100);
				$("#estimate-edit_form_8").delay(100).fadeIn(100);
				$("#estimate-edit_form_9").fadeOut(100);
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
				$("#estimate-edit_form_1").fadeOut(100);
				$("#estimate-edit_form_2").fadeOut(100);
				$("#estimate-edit_form_3").fadeOut(100);
				$("#estimate-edit_form_4").fadeOut(100);
				$("#estimate-edit_form_5").fadeOut(100);
				$("#estimate-edit_form_6").fadeOut(100);
				$("#estimate-edit_form_7").fadeOut(100);
				$("#estimate-edit_form_8").fadeOut(100);
				$("#estimate-edit_form_9").delay(100).fadeIn(100);
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
			$('.estimate_form-link_previous').click(function() {
				if ($('.estimate_form-link_2').hasClass('active')){
					$('.estimate_form-link_2').removeClass('active');
					$('.estimate_form-link_1').addClass('active');
					$("#estimate-edit_form_2").fadeOut(100);
					$("#estimate-edit_form_1").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_3').hasClass('active')) {
					$('.estimate_form-link_3').removeClass('active');
					$('.estimate_form-link_2').addClass('active');
					$("#estimate-edit_form_3").fadeOut(100);
					$("#estimate-edit_form_2").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_4').hasClass('active')) {
					$('.estimate_form-link_4').removeClass('active');
					$('.estimate_form-link_3').addClass('active');
					$("#estimate-edit_form_4").fadeOut(100);
					$("#estimate-edit_form_3").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_5').hasClass('active')) {
					$('.estimate_form-link_5').removeClass('active');
					$('.estimate_form-link_4').addClass('active');
					$("#estimate-edit_form_5").fadeOut(100);
					$("#estimate-edit_form_4").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_6').hasClass('active')) {
					$('.estimate_form-link_6').removeClass('active');
					$('.estimate_form-link_5').addClass('active');
					$("#estimate-edit_form_6").fadeOut(100);
					$("#estimate-edit_form_5").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_7').hasClass('active')) {
					$('.estimate_form-link_7').removeClass('active');
					$('.estimate_form-link_6').addClass('active');
					$("#estimate-edit_form_7").fadeOut(100);
					$("#estimate-edit_form_6").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_8').hasClass('active')) {
					$('.estimate_form-link_8').removeClass('active');
					$('.estimate_form-link_7').addClass('active');
					$("#estimate-edit_form_8").fadeOut(100);
					$("#estimate-edit_form_7").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_9').hasClass('active')) {
					$('.estimate_form-link_9').removeClass('active');
					$('.estimate_form-link_8').addClass('active');
					$("#estimate-edit_form_9").fadeOut(100);
					$("#estimate-edit_form_8").delay(100).fadeIn(100);
				}
			});
			$('.estimate_form-link_next').click(function() {
				if ($('.estimate_form-link_1').hasClass('active')){
					$('.estimate_form-link_1').removeClass('active');
					$('.estimate_form-link_2').addClass('active');
					$("#estimate-edit_form_1").fadeOut(100);
					$("#estimate-edit_form_2").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_2').hasClass('active')) {
					$('.estimate_form-link_2').removeClass('active');
					$('.estimate_form-link_3').addClass('active');
					$("#estimate-edit_form_2").fadeOut(100);
					$("#estimate-edit_form_3").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_3').hasClass('active')) {
					$('.estimate_form-link_3').removeClass('active');
					$('.estimate_form-link_4').addClass('active');
					$("#estimate-edit_form_3").fadeOut(100);
					$("#estimate-edit_form_4").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_4').hasClass('active')) {
					$('.estimate_form-link_4').removeClass('active');
					$('.estimate_form-link_5').addClass('active');
					$("#estimate-edit_form_4").fadeOut(100);
					$("#estimate-edit_form_5").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_5').hasClass('active')) {
					$('.estimate_form-link_5').removeClass('active');
					$('.estimate_form-link_6').addClass('active');
					$("#estimate-edit_form_5").fadeOut(100);
					$("#estimate-edit_form_6").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_6').hasClass('active')) {
					$('.estimate_form-link_6').removeClass('active');
					$('.estimate_form-link_7').addClass('active');
					$("#estimate-edit_form_6").fadeOut(100);
					$("#estimate-edit_form_7").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_7').hasClass('active')) {
					$('.estimate_form-link_7').removeClass('active');
					$('.estimate_form-link_8').addClass('active');
					$("#estimate-edit_form_7").fadeOut(100);
					$("#estimate-edit_form_8").delay(100).fadeIn(100);
				} else if ($('.estimate_form-link_8').hasClass('active')) {
					$('.estimate_form-link_8').removeClass('active');
					$('.estimate_form-link_9').addClass('active');
					$("#estimate-edit_form_8").fadeOut(100);
					$("#estimate-edit_form_9").delay(100).fadeIn(100);
				}
			});
		});
	</script>
</body>
</html> 