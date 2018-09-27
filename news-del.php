<?php 
$sID = empty($_REQUEST['sID'])?null:$_REQUEST['sID'];
if($sID == null){
	echo "<script>alert('亲指定要删除的纪录!')</script>";
	header("Refresh:1;url=news-list-ajax.php");
}else{
	include "conn.php";
	$result = mysqli_query($conn,"delete from news where id='{$sID}'");
	if ($result) {
		echo "<script>alert('数据删除成功!')</script>";
		header("Refresh:5;url=news-list-ajax.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	//释放资源
	mysqli_close( $conn );
}