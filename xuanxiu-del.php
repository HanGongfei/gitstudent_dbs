<?php
include("conn.php");
$sql1="delete from xuanxiu where id='{$_GET['kid']}'";
echo $sql1;
$result = mysqli_query($conn,$sql1);

if($result){
	echo "<script>alert('数据删除成功')</script>";
	header("Refresh:1;url=xuanxiu-list-ajax.php");
}else{
	echo "数据删除失败".mysqli_error($conn);
}
mysqli_close($conn);
?>