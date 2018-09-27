<?php 

include("conn.php");
//执行SQL语句
$sql = "select * from news";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);
 ?>
<?php include("head.php"); ?>
		<div class="sui-layout">
		  <div class="sidebar">
		  	<!-- 左菜单 -->
		  	<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻管理</p>
			<table class="sui-table table-primary">
				<tr>
					<th>id</th>
					<th>标题</th>
					<th>肩题</th>
					<th>图片</th>
					<th>内容</th>
					<th>发布时间</th>
					<th>创建时间</th>
					<th>userid</th>
					<th>columnid</th>
					<th>设置</th>
				</tr>
<?php 
if (mysqli_num_rows($result) > 0) {
	while ( $row = mysqli_fetch_assoc($result) ) {
		echo "<tr>
		<td>{$row['id']}</td>
		<td>{$row['标题']}</td>
		<td>{$row['肩题']}</td>
		<td>{$row['图片']}</td>
		<td>{$row['内容']}</td>
		<td>{$row['发布时间']}</td>
		<td>{$row['创建时间']}</td>
		<td>{$row['userid']}</td>
		<td>{$row['columnid']}</td>
		<td>
			<a class='sui-btn btn-small btn-warning' href='news-update.php?sID={$row['id']}'>修改</a>
			&nbsp;&nbsp;
			<a class='sui-btn btn-small btn-danger' href='news-del.php?sID={$row['id']}'>删除</a>
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
<?php include "foot.php"; ?>
