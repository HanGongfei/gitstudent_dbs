<?php 
include("conn.php");
//执行SQL语句 
$sql1="delete from kecheng where 课程编号={$_GET['kid']}";
// $sql2="update kecheng set 课程名='JS面向对象' where 课程编号=4";
$result = mysqli_query($conn,$sql1);

//输出数据
if($result){
	echo "<script>alert('数据删除成功');</script>";
	header("Refresh:1;url=banji-list.php");
}else{
	echo "数据删除失败".mysqli_error($conn);
}

//关闭数据库
mysqli_close($conn);
?>