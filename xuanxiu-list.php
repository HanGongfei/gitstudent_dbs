<?php
include "conn.php";
$sql="select * from xuanxiu";
echo $sql;
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>		
<?php include("head.php"); ?>
		<div class="sui-layout">
		  <div class="sidebar">
				<!--左菜单  -->
				<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩录入</p>
			<table class="sui-table table-primary">
				<tr>
					<th>id</th>
					<th>学号</th>
					<th>课程编号</th>
					<th>成绩</th>
					<th>设置</th>
				</tr>
<?php 
if (mysqli_num_rows($result) > 0) {
	while ( $row = mysqli_fetch_assoc($result) ) {
		echo "<tr>
		<td>{$row['id']}</td>
		<td>{$row['学号']}</td>
		<td>{$row['课程编号']}</td>
		<td>{$row['成绩']}</td>
		<td>
			<a class='sui-btn btn-small btn-warning' href='xuanxiu-update.php?kid={$row['id']}'>修改</a>
			&nbsp;&nbsp;
			<a class='sui-btn btn-small btn-danger' href='xuanxiu-del.php?kid={$row['id']}'>删除</a>
		</td>
			</tr>";
	}
}else{
	echo "没有记录";
}
 ?>	
		  </div>
		</div>		
<?php include("foot.php"); ?>