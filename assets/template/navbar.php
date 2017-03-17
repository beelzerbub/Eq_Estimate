<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">โรงเรียนหทัยชาติ</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">หน้าหลัก</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ข้อมูลนักเรียน <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="student.php">จัดการข้อมูลนักเรียน</a></li>
						<li><a href="student_form.php">เพิ่มข้อมูลนักเรียน</a></li>
						<li><a href="student_form_csv.php">เพิ่มข้อมูลนักเรียนด้วยไฟล์ csv</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">การประเมิน <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="print_form.php">สั่งพิมพ์แบบฟอร์ม</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="estimate.php">ทำแบบประเมินผ่านเว็บ</a></li>
						<!--<li><a href="#">ดูผลการประเมิน</a></li>-->
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php">เข้าสู่ระบบ</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>