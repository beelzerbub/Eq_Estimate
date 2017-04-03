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
}
?>