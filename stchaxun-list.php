<?php include("head.php");
	include "conn.php";
	$cxks=empty($_POST["cxks"])?"null":$_POST["cxks"];
	if($cxks == "null"){
		$sql1="select id,学号,班号,姓名,出生日期,性别,电话 from student;";
	}else{
		$xhao=$_POST["xhao"];
		$xming=$_POST["xming"];
		$sql1="select id,学号,班号,姓名,出生日期,性别,电话 from student where 姓名='{$xming}' or 学号='{$xhao}';";
	}
	
	echo $sql1; 
	$result = mysqli_query($conn,$sql1);
	mysqli_close($conn);
?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息查询</p>
			<table class="sui-table table-primary">
				<tr>
					<th>id</th>
					<th>学号</th>
					<th>班号</th>
					<th>姓名</th>
					<th>出生日期</th>
					<th>性别</th>
					<th>电话</th>
					<th>设置</th>
				</tr>
<?php 
if (mysqli_num_rows($result) > 0) {
	while ( $row = mysqli_fetch_assoc($result) ) {
		echo "<tr>
		<td>{$row['id']}</td>
		<td>{$row['学号']}</td>
		<td>{$row['班号']}</td>
		<td>{$row['姓名']}</td>
		<td>{$row['出生日期']}</td>
		<td>{$row['性别']}</td>
		<td>{$row['电话']}</td>
			</tr>";
	}
}else{
	echo "没有记录";	
}
 					
?>			</table>
		  </div>
		</div>		
<?php include("foot.php"); ?>
