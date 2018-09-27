<?php include("head.php"); ?>
<?php 
include("conn.php");
$sql = "select 班号,班长,教室,班主任 from class1";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);
?>
		<div class="sui-layout">
		  <div class="sidebar">
				<!--左菜单  -->
				<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级信息录入</p>
			<table class="sui-table table-primary">
				<tr>
					<th>班号</th>
					<th>班长</th>
					<th>教室</th>
					<th>班主任</th>
					<th>设置</th>
				</tr>
<?php 
if (mysqli_num_rows($result) > 0) {
	while ( $row = mysqli_fetch_assoc($result) ) {
		echo "<tr>
		<td>{$row['班号']}</td>
		<td>{$row['班长']}</td>
		<td>{$row['教室']}</td>
		<td>{$row['班主任']}</td>
		<td>
			<a class='sui-btn btn-small btn-warning' href='banji-update.php?kid={$row['班号']}'>修改</a>
			&nbsp;&nbsp;
			<a class='sui-btn btn-small btn-danger' href='banji-del.php?kid={$row['班号']}'>删除</a>
		</td>
			</tr>";
	}
}else{
	echo "没有记录";
}
 ?>	
			</table>
		  </div>
		</div>		
<?php include("foot.php"); ?>

