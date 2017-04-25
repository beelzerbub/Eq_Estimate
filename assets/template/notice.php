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
	<div class="alert alert-warning" role="alert">
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
}
?>