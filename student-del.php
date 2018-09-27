<?php
// 学生删除
$action=empty($_POST["action"])?"null":$_POST["action"];
if($action == null ){
	echo "<script>alert('请指定要删除的记录！')</script>";
	header("Refresh:100;url=student-list-ajax.php");
}else{
	include("conn.php");
	$sql1="delete from student where id ='{$_REQUEST['kid']}'";
	echo $sql1;
	$result = mysqli_query($conn,$sql1);

	if($result){
		echo "<script>alert('数据删除成功')</script>";
		header("Refresh:2;url=student-list-ajax.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	mysqli_close($conn);
}

?>