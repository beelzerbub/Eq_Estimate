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
} else if ($action == "user_delete_warning") {
	?>
	<div class="alert alert-danger" role="alert">
		เนื่องจากผู้ใช้งานดังกล่าวมีประวัติการประเมิน จึงไม่สามารถลบผู้ใช้ดังกล่าวได้ แต่ระบบจะทำการล็อคการใช้งานของผู้ใช้ดังกล่าว
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
} else if ($action == "update_success") {
	
}
?>