<?php 
	include("conn.php");
	$kid=empty($_GET['kid'])?"null":$_GET['kid'];
	$sql1="delete from class1 where 班号='{$kid}'";
	echo $sql1;
	$result=mysqli_query($conn,$sql1);

	if($result){
		echo "<script>alert('数据删除成功')</script>";
		header("Refresh:2;url=banji-list-ajax.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	mysqli_close($conn);
?>