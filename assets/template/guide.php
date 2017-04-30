<?php
$estimate_score = "SELECT * FROM estimate_score es WHERE es.Es_id = $estimate_fetch->Es_id";
$estimate_score_query = mysql_query($estimate_score)or die(mysql_error());
$danger = "เด็กจำเป็นต้องได้รับการพัฒนาความฉลาดทางอารมณ์ด้านการ";
$warning = "เด็กควรได้รับการพัฒนาความฉลาดทางอารมณ์ด้านการ";
$success = "เด็กควรได้รับการส่งเสริมและรักษาความฉลาดทางอารมณ์ด้านการ";
$high = "คะแนนทีมากกว่าหรือเท่ากับ 50 คะแนน";
$average = "คะแนนทีอยู่ในช่วง 40 - 49 คะแนน";
$low = "คะแนนทีต่ำกว่า 40 คะแนน";
?>
<ul class="list-group text-advice">
	<?php
	while ($result = mysql_fetch_array($estimate_score_query)) {
		if (T_Score($result['Es_score'],$result['Sg_id']) >= 0 && T_Score($result['Es_score'],$result['Sg_id']) <= 39) {
			if ($result['Sg_id'] == 1) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>ควบคุมอารมณ์</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 2 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>ใส่ใจและเข้าใจอารมณ์</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 3 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>ยอมรับถูกผิด</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 4 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>มุ่งมั่นพยายาม</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 5 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>ปรับตัวต่อปัญหา</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 6 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>กล้าแสดงออก</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 7 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>พอใจในตนเอง</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 8 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>รู้จักปรับตัว</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 9 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $low; ?></span>
					<span class="label label-text label-danger"><?php echo $result['Sg_id']; ?>.<?php echo $danger; ?>รื่นเริงเบิกบาน</span>
				</li>
				<?php
			}
		} else if (T_Score($result['Es_score'],$result['Sg_id']) >= 40 && T_Score($result['Es_score'],$result['Sg_id']) <= 49) {
			if ($result['Sg_id'] == 1) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>ควบคุมอารมณ์</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 2 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>ใส่ใจและเข้าใจอารมณ์</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 3 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>ยอมรับถูกผิด</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 4 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>มุ่งมั่นพยายาม</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 5 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>ปรับตัวต่อปัญหา</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 6 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>กล้าแสดงออก</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 7 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>พอใจในตนเอง</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 8 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>รู้จักปรับตัว</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 9 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $average; ?></span>
					<span class="label label-text label-warning"><?php echo $result['Sg_id']; ?>.<?php echo $warning; ?>รื่นเริงเบิกบาน</span>
				</li>
				<?php
			}
		} else if (T_Score($result['Es_score'],$result['Sg_id']) >= 50 && T_Score($result['Es_score'],$result['Sg_id']) <= 100) {
			if ($result['Sg_id'] == 1) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>ควบคุมอารมณ์</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 2 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>ใส่ใจและเข้าใจอารมณ์</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 3 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>ยอมรับถูกผิด</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 4 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>มุ่งมั่นพยายาม</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 5 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>ปรับตัวต่อปัญหา</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 6 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>กล้าแสดงออก</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 7 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>พอใจในตนเอง</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 8 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>รู้จักปรับตัว</span>
				</li>
				<?php
			} else if ($result['Sg_id'] == 9 ) {
				?>
				<li class="list-group-item">
					<span class="badge"><?php echo $high; ?></span>
					<span class="label label-text label-success"><?php echo $result['Sg_id']; ?>.<?php echo $success; ?>รื่นเริงเบิกบาน</span>
				</li>
				<?php
			}
		}
	}
	?>
</ul>
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