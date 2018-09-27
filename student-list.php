<?php include("head.php"); 
include "conn.php";
$sql="select id,学号,班号,姓名,出生日期,性别,电话 from student";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生录入</p>
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
if(mysqli_num_rows($result)> 0 ){
        // 将查询的结果转换为下列数组
 	while($row=mysqli_fetch_assoc($result)){
     $rows=$row["性别"]=="1"?"男":"女";
      echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['学号']}</td>
      <td>{$row['班号']}</td>
        <td>{$row['姓名']}</td>
        <td>{$rows}</td>
        <td>{$row['出生日期']}</td>
        <td>{$row['电话']}</td>
      <td>
         <a class='sui-btn btn-warning' title=''href='student-update.php?kid={$row['学号']}' >修改</a> 
  		&nbsp; <a class='sui-btn btn-danger' title='' href='student-del.php?kid={$row['学号']}'>删除</a> 
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
}
<?php include("foot.php"); ?>