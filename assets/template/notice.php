<?php
$action = $_GET["action"];
if ($action ==  "forgot_fail") {
	?>
	<div class="alert alert-danger" role="alert">
		เกิดข้อผิดพลาด! กรุณาตรวจสอบความถูกต้องของอีเมลล์
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "login_fail") {
	?>
	<div class="alert alert-danger" role="alert">
		เข้าสู่ระบบล้มเหลว กรุณาตรวจสอบความถูกต้องของชื่อผู้ใช้และรหัสผ่าน
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "login_success") {
	?>
	<div class="alert alert-success" role="alert">
		เข้าสู่ระบบเรียบร้อย
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "insert_success") {
	?>
	<div class="alert alert-success" role="alert">
		เพิ่มข้อมูลเรียบร้อย
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "update_success") {
	?>
	<div class="alert alert-success" role="alert">
		แก้ไขข้อมูลเรียบร้อยแล้ว
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "delete_success") {
	?>
	<div class="alert alert-warning" role="alert">
		ลบข้อมูลเรียบร้อยแล้ว
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "user_delete_warning") {
	?>
	<div class="alert alert-danger" role="alert">
		เนื่องจากผู้ใช้งานดังกล่าวมีประวัติการประเมิน จึงไม่สามารถลบผู้ใช้ดังกล่าวได้ แต่ระบบจะทำการล็อคการใช้งานของผู้ใช้ดังกล่าว
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "teacher_delete_warning") {
	?>
	<div class="alert alert-danger" role="alert">
		เนื่องจากครูประจำชั้นดังกล่าวมีประวัติการประเมิน จึงไม่สามารถลบครูดังกล่าวได้ แต่ระบบจะทำการล็อคการใช้งานของครูดังกล่าวแทน
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "wrong_classroom") {
	?>
	<div class="alert alert-danger" role="alert">
		เกิดข้อผิดพลาดในการระบุห้องเรียน กรุณาตรวจสอบห้องเรียนและเลขที่ห้องเรียนให้ถูกต้อง
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "student_duplicate") {
	?>
	<div class="alert alert-warning" role="alert">
		ข้อมูลนักเรียนดังกล่าว มีการซ้ำซ้อน กรุณาใช้ส่วนค้นหาและแก้ไขข้อมูลเดิม
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "edit_assessor_success") {
	?>
	<div class="alert alert-success" role="alert">
		จัดการข้อมูลผู้ประเมินเรียบร้อยแล้ว
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "estimate_update_success") {
	?>
	<div class="alert alert-success" role="alert">
		บันทึกการประเมินส่วนที่ <?php echo $_GET[part]; ?> เรียบร้อยแล้ว
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "import_success") {
	?>
	<div class="alert alert-success" role="alert">
		นำเข้าข้อมูลนักเรียนเรียบร้อยแล้ว
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "insert_user_duplicate") {
	?>
	<div class="alert alert-danger" role="alert">
		ไม่สามารถใช้ชื่อผู้ใช้นี้ได้ เนื่องจากมีการใช้งานแล้ว
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
} else if ($action == "insert_teacher_dupplicate") {
	$old = $_GET["old"];
	$classroom = "SELECT * FROM classroom class JOIN work_time wt ON wt.class_id = class.class_id
	WHERE wt_id = $old";
	$classroom_query = mysql_query($classroom)or die(mysql_error());
	$classroom_fetch = mysql_fetch_object($classroom_query)or die(mysql_error());
	?>
	<div class="alert alert-warning" role="alert">
		ไม่สามารถเพิ่มข้อมูลครูดังกล่าวได้ เนื่องจากมีการบันทึกว่า 
		<?php
		if ($classroom_fetch->class_id == 0) {
			?>
			ไม่ได้รับตำแหน่งครูประจำชั้นในปีการศึกษานี้ หากต้องการเปลี่ยนให้ใช้การแก้ไขข้อมูลหรือ <a href="_edit_teacher.php?id=<?php echo $classroom_fetch->t_id; ?>">คลิกที่นี่</a>
			<?php
		} else {
			?>
			เป็นครูประจำชั้นของ <?php echo $classroom_fetch->class_grade; ?>/<?php echo $classroom_fetch->class_number;?> แล้วในปีการศึกษานี้ หากต้องการเปลี่ยนให้ใช้การแก้ไขข้อมูลหรือ <a href="_edit_teacher.php?id=<?php echo $classroom_fetch->t_id; ?>">คลิกที่นี่</a>
			<?php
		}
		?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php
}
?>