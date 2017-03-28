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
				<div class="row site_content-menu">
					<a href="#" id="assessor-link" data-toggle="modal" data-target="#assesor-edit_box" value="edit_assesor">
						<div class="col-md-4 col-md-offset-2 site_content-menu_box">
							<img src="image/estimate-icon.png" class="img-responsive img-menu" alt="Image"><br>
							แก้ไขข้อมูลผู้ให้การประเมิน
						</div>
					</a>
					<a href="#" id="estimate-link" data-toggle="modal" data-target="#estimate-edit_box" value="edit_estimate">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/estimate-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ทำแบบประเมิน
						</div>
					</a>
				</div>
				<hr>
				<div class="row site_content-menu">
					<a href="#" id="school-link">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/school-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ดูผลการประเมินของครูประจำชั้น
						</div>
					</a>
					<a href="#" id="family-link">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/family-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ดูผลการประเมินของผู้ปกครอง
						</div>
					</a>
					<a href="#" id="overall-link">
						<div class="col-md-4 site_content-menu_box">
							<img src="image/overall-icon.png" class="img-responsive img-menu" alt="Image"><br>
							ดูผลการประเมินเปรียบเทียบ<br>ที่บ้านและโรงเรียน
						</div>
					</a>
				</div>
				<div class="row site_content-form">
					<div class="col-md-12">
						<div class="row site_content-form_assessor">
							<div class="modal fade" id="assesor-edit_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<form action="#" role="form" method="post" data-toggle="validator" id="assesor-edit_form">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แก้ไขข้อมูลผู้ประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputStdName">ชื่อ - นามสกุลผู้ถูกประเมิน</label>
															<input type="text" class="form-control" name="std_name" disabled="" required="">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputAssName">ชื่อผู้ประเมิน</label>
															<input type="text" class="form-control" name="ass_name" id="ass_name" placeholder="ชื่อผู้ประเมิน"  maxlength="50" data-error="กรุณาระบุชื่อผู้ประเมิน" required>
															<div class="help-block with-errors"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputStdSurname">นามสกุลผู้ประเมิน</label>
															<input type="text" class="form-control" name="ass_surname" id="ass_surname" placeholder="นามสกุลผู้ประเมิน" maxlength="50" data-error="กรุณาระบุนามสกุลผู้ประเมิน" required>
															<div class="help-block with-errors"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputRelationship">เกี่ยวข้องกับผู้ถูกประเมินโดยเป็น</label>
															<input type="text" class="form-control" name="relation" id="relation" disabled required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="InputTerm">ภาคการเรียน</label>
															<label for="InputTerm" class="radio-inline">
																<input type="radio" name="Term" id="Term1" value="1" checked>1
															</label>
															<label for="InputTerm" class="radio-inline">
																<input type="radio" name="Term" id="Term2" value="2" >2
															</label>
															<label for="InputTerm" class="radio-inline">
																<input type="radio" name="Term" id="Term3" value="3" >3
															</label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<label for="InputDate">
															วันที่ทำการประเมิน
														</label>
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
							<!-- จบฟอร์มสำหรับผู้ประเมิน -->
							<div class="modal fade" id="estimate-edit_box" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<form action="#" role="form" method="post" data-toggle="validator" id="estimte-edit_form" name="estimte-edit_form">
										<div class="modal-content" id="estimate-edit_form_1">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 1 : ยังไม่ได้ทำการประเมิน</p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 1 -->
										<div class="modal-content" id="estimate-edit_form_2" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="#" class="list-group-item estimate_form-link_previous"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 2 : ยังไม่ได้ทำการประเมิน</p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 2 -->
										<div class="modal-content" id="estimate-edit_form_3" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="#" class="list-group-item estimate_form-link_previous"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 3 : ยังไม่ได้ทำการประเมิน</p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 3 -->
										<div class="modal-content" id="estimate-edit_form_4" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="#" class="list-group-item estimate_form-link_previous"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 4 : ยังไม่ได้ทำการประเมิน</p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 4 -->
										<div class="modal-content" id="estimate-edit_form_5" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="#" class="list-group-item estimate_form-link_previous"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 5 : ยังไม่ได้ทำการประเมิน</p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 5 -->
										<div class="modal-content" id="estimate-edit_form_6" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="#" class="list-group-item estimate_form-link_previous"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 6 : ยังไม่ได้ทำการประเมิน</p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 6 -->
										<div class="modal-content" id="estimate-edit_form_7" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="#" class="list-group-item estimate_form-link_previous"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 7 : ยังไม่ได้ทำการประเมิน</p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 7 -->
										<div class="modal-content" id="estimate-edit_form_8" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="#" class="list-group-item estimate_form-link_previous"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 8 : ยังไม่ได้ทำการประเมิน</p>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<!-- แบบฟอร์มที่ 8 -->
										<div class="modal-content" id="estimate-edit_form_9" style="display:none">
											<fieldset class="fieldset-form">
												<legend class="legend-form"><h1>แบบประเมิน</h1></legend>
												<div class="row">
													<div class="col-md-12">
														<div class="list-group list-group-horizontal">
															<a href="#" class="list-group-item estimate_form-link_previous"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
															<a href="#" class="list-group-item estimate_form-link_1">ส่วนที่ 1</a>
															<a href="#" class="list-group-item estimate_form-link_2">ส่วนที่ 2</a>
															<a href="#" class="list-group-item estimate_form-link_3">ส่วนที่ 3</a>
															<a href="#" class="list-group-item estimate_form-link_4">ส่วนที่ 4</a>
															<a href="#" class="list-group-item estimate_form-link_5">ส่วนที่ 5</a>
															<a href="#" class="list-group-item estimate_form-link_6">ส่วนที่ 6</a>
															<a href="#" class="list-group-item estimate_form-link_7">ส่วนที่ 7</a>
															<a href="#" class="list-group-item estimate_form-link_8">ส่วนที่ 8</a>
															<a href="#" class="list-group-item estimate_form-link_9">ส่วนที่ 9</a>
															<a href="#" class="list-group-item estimate_form-link_next disabled"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></a>
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
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<input type="submit" name="SaveBtn" class="form-control btn btn-primary SaveBtn" value="บันทึก">
															</div>
															<div class="col-md-9">
																<p class="show_score">ประวัติการประเมินส่วนที่ 9 : ยังไม่ได้ทำการประเมิน</p>
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
						<div class="row site_content-form_estimate"></div>
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