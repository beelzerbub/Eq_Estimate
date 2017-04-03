<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">โรงเรียนหทัยชาติ</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php">หน้าหลัก</a></li>
				<?php
				if ($_SESSION["user_role"] > 1) {
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การประเมิน <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="estimate.php">ทำแบบประเมินผ่านเว็บ</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="print_form.php">สั่งพิมพ์แบบฟอร์ม</a></li>
						</ul>
					</li>
					<?php
				}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
				if (isset($_SESSION["user_role"]) and $_SESSION["user_role"] > 2) {
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">จัดการข้อมูล <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="student.php">จัดการข้อมูลนักเรียน</a></li>
							<?php
							if ($_SESSION["user_role"] >= 8) {
								?>
								<li><a href="user.php">จัดการข้อมูลผู้ใช้</a></li>
								<li><a href="teacher.php">จัดการข้อมูลครูประจำชั้น</a></li>
								<?php
							}
							?>
						</ul>
					</li>
					<?php
				}
				if (!isset($_SESSION["user_role"])) {
					?>
					<li><a href="login.php">เข้าสู่ระบบ</a></li>
					<?php
				} else {
					?>
					<li><a href="logout.php">ออกจากระบบ</a></li>
					<?php
				}
				?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>