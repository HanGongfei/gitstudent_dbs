<?php 

include("conn.php");
//执行SQL语句
$sql = "select * from user";
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
			<p class="sui-text-xxlarge my-padd">会员管理</p>
			<table class="sui-table table-primary">
				<tr>
					<th>id</th>
					<th>email</th>
					<th>name</th>
					<th>password</th>
					<th>question</th>
					<th>answer</th>
					<th>设置</th>
				</tr>
<?php 
if (mysqli_num_rows($result) > 0) {
	while ( $row = mysqli_fetch_assoc($result) ) {
		echo "<tr>
		<td>{$row['id']}</td>
		<td>{$row['email']}</td>
		<td>{$row['name']}</td>
		<td>{$row['password']}</td>
		<td>{$row['question']}</td>
		<td>{$row['answer']}</td>>
		<td>
			<a class='sui-btn btn-small btn-warning' href='user-update.php?sID={$row['id']}'>修改</a>
			&nbsp;&nbsp;
			<a class='sui-btn btn-small btn-danger' href='user-del.php?sID={$row['id']}'>删除</a>
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
