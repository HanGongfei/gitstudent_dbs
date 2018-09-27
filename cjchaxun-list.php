<?php include("head.php"); ?>
<?php
$sName = $_POST['sName'];
$xuehao = $_POST['xuehao'];
$kcName = $_POST['kcName'];
$action = empty($_POST['kcName'])?"add":"hello";
if ($action == "hello") {
	$sql ="SELECT * FROM xuanxiu AS x LEFT JOIN kecheng AS k ON x.课程编号=k.课程编号 LEFT JOIN student as s ON x.学号=s.学号 WHERE s.姓名 = '{$sName}' AND k.课程编号 = '{$kcName}'";
}else if($action == "add"){
	$sql = "SELECT * FROM xuanxiu AS x LEFT JOIN kecheng AS k ON x.课程编号=k.课程编号 LEFT JOIN student as s ON x.学号=s.学号 WHERE x.学号 = '{$xuehao}' AND x.课程编号 = '{$kcName}'";
}else{
	die("请选择操作方法");
}
include ('conn.php');
// echo $sql;
$result = mysqli_query($conn,$sql);

//关闭数据库
mysqli_close($conn);
?>
<h1>查询信息</h1>
<hr>
<div class="sui-layout">
	<div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge">学生信息查询</p>
		<table class="sui-table table-primary">
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>课程名</th>
				<th>成绩</th>
			</tr>
			<?php
				//输出数据
				// var_dump($result);
				if (mysqli_num_rows($result) > 0) {
					while ( $row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								  <td>{$row['学号']}</td>
								  <td>{$row['姓名']}</td>
								  <td>{$row['课程编号']}</td>
								  <td>{$row['成绩']}</td>
							  </tr>";
					}
				}else{
					echo "没有记录";
				}
			?>
		</table>
	</div>
</div>
<?php include "foot.php"; ?>