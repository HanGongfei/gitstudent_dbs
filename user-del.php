<?php
include("conn.php");
$sID = empty($_REQUEST['sID'])?"null":$_REQUEST['sID'];
echo $sID;
if ($sID == "null") {
	echo "<script>alert('请选择正确的条件')</script>";
	header("Refresh:5;url=user-list.php");
}else{
	include("conn.php");
	$sql = "delete from user where id = '{$sID}'";
	echo $sql;
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('数据删除成功')</script>";
		header("Refresh:2;url=user-list.php");
	}else{
		echo "<script>alert('数据删除失败')<script>".mysqli_error($conn);
	} 
	mysqli_close( $conn );
}

?>