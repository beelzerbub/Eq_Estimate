<?php
////------------------------------------------------- 
////---------------- Connect ------------------------
////-----------------------------------------------//
session_start();
$host = "localhost";
$user = "root";
$pass = "rootroot";
$db = "eq_estimate";
$link = mysql_connect($host,$user,$pass);
mysql_query("SET NAMES UTF8");
if(!$link)
{
	echo "can't connect";
}
mysql_select_db($db) or die ("Can't connnect Database");
$year = date('Y') + 543;

////------------------------------------------------- 
////-------------- Call Function --------------------
////-----------------------------------------------//
if ($_POST["ExportStdBtn"]) {
	$action = "ข้อมูลนักเรียน";
	$year = $_POST["year_export"];
	$term = $_POST["filter-term"];
	$classroom = $_POST["classroom_select"];
	$i=0;
	foreach ($classroom as $class_id) {
		if ($i==0){
			$classroom_sql = "SELECT * FROM student s LEFT JOIN term t ON t.Std_no = s.Std_no
			LEFT JOIN classroom cls ON t.Class_id = cls.Class_id 
			WHERE t.Term_year = $year
			AND t.Term = $term
			AND cls.Class_id = $class_id";
		} else {
			$classroom_sql .= " OR cls.Class_id = $class_id ";
		}
		$i++;
	}
	$classroom_sql .= " GROUP BY s.Std_name, s.Std_surname ORDER BY cls.class_id ASC";
} else if ($_POST["ExportEstBtn"]) {
	$action = "ข้อมูลการประเมิน";
	$year = $_POST["year_export"];
	$term = $_POST["filter-term"];
	$classroom = $_POST["classroom_select"];
	$i=0;
	foreach($classroom as $class_id) {
		if ($i==0) {
			$classroom_sql = "SELECT */*s.Std_no,
			s.Std_id,
			s.Std_name,
			s.Std_surname,
			cls.class_grade,
			cls.class_number,
			t.Term_year,
			t.Term,
			assessor.As_name,
			assessor.As_surname,
			assessor.As_type,
			es.Es_score,
			sg.Sg_name*/
			FROM student s JOIN term t ON t.Std_no = s.Std_no
			JOIN classroom cls ON t.Class_id = cls.Class_id
			JOIN estimate_time et ON et.Std_no = s.Std_no
			JOIN estimate_score es ON et.Es_id = es.Es_id
			JOIN assessor ON assessor.As_id = et.As_id
			JOIN score_group sg ON es.Sg_id = sg.Sg_id
			WHERE et.Es_year = $year
			AND et.Es_term = $term
			AND t.Term_year = $year
			AND t.Term = $term
			AND cls.Class_id = $class_id";
		} else {
			$classroom_sql .= " OR cls.Class_id = $class_id ";
		}
		$i++;
	}
}
$classroom_query = mysql_query($classroom_sql)or die(mysql_error());
?>

<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="'."$action-$term-$year".'.xls"');# ชื่อไฟล์
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<HTML>
	<HEAD>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	</HEAD>

	<BODY>
		<TABLE  x:str BORDER="1">
			<TR>
				<td><?php echo "$action ประจำปีการศึกษา $term/$year"; ?></td>
			</TR>
			<?php
			if ($_POST["ExportStdBtn"]) {
				$i=0;
				?>
				<TR>
					<TD><b>ลำดับ</b></TD>
					<TD><b>รหัสบัตรประชาชน</b></TD>
					<TD><b>ชื่อ</b></TD>
					<TD><b>นามสกุล</b></TD>
					<TD><b>อายุ</b></TD>
					<TD><b>เพศ</b></TD>
					<TD><b>ระดับชั้น</b></TD>
					<TD><b>ห้องเรียน</b></TD>
				</TR>
				<?php
				while($classroom_fetch = mysql_fetch_array($classroom_query)) {
					?>
					<tr>
						<td><?php echo ++$i; ?></td>
						<td><?php echo $classroom_fetch["Std_id"];?></td>
						<td><?php echo $classroom_fetch["Std_name"]; ?></td>
						<td><?php echo $classroom_fetch["Std_surname"]; ?></td>
						<td><?php echo $classroom_fetch["Std_age"]; ?></td>
						<td>
							<?php 
							if ($classroom_fetch["Std_gender"] == 1) {
								echo "ชาย";
							} else {
								echo "หญิง";
							}
							?>
						</td>
						<td><?php echo $classroom_fetch["class_grade"];?></td>
						<td><?php echo $classroom_fetch["class_number"];?></td>
					</tr>
					<?php
				}
			} else if ($_POST["ExportEstBtn"]) {
				$i=0;
				?>
				<tr>
					<td>ลำดับ</td>
					<td>รหัสบัตรประชาชน</td>
					<td>ชื่อ</td>
					<td>นามสกุล</td>
					<td>อายุ</td>
					<td>เพศ</td>
					<td>ระดับชั้น</td>
					<td>ห้อง</td>
					<td>ชื่อผู้ประเมิน</td>
					<td>นามสกุลผู้ประเมิน</td>
					<td>ประเภทผู้ประเมิน</td>
					<td>คะแนน</td>
					<td>กลุ่มคะแนน</td>
				</tr>
				<?php
				while($classroom_fetch = mysql_fetch_array($classroom_query)) {
					?>
					<tr>
						<td><?php echo $classroom_fetch["Std_no"]; ?></td>
						<td><?php echo $classroom_fetch["Std_id"]; ?></td>
						<td><?php echo $classroom_fetch["Std_name"]; ?></td>
						<td><?php echo $classroom_fetch["Std_surname"]; ?></td>
						<td><?php echo $classroom_fetch["Std_age"]; ?></td>
						<td>
							<?php 
							if ($classroom_fetch["Std_gender"] == 1) {
								echo "ชาย";
							} else {
								echo "หญิง";
							}
							?>
						</td>
						<td><?php echo $classroom_fetch["class_grade"]; ?></td>
						<td><?php echo $classroom_fetch["class_number"]; ?></td>
						<td><?php echo $classroom_fetch["As_name"]; ?></td>
						<td><?php echo $classroom_fetch["As_surname"]; ?></td>
						<td><?php echo $classroom_fetch["As_type"]; ?></td>
						<td><?php echo $classroom_fetch["Es_score"]; ?></td>
						<td><?php echo $classroom_fetch["Sg_name"]; ?></td>
					</tr>
					<?php
				}
			}
			?>

		</TABLE>
	</BODY>
</HTML>
