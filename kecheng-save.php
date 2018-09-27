<?php 

	$kcName=$_POST["kcName"];
	$kcTime=$_POST["kcTime"];
	//如果是录入页面提交的,name$action等于add
	$action=empty($_POST["action"])?"add":$_POST["action"];
	if($action=="add"){
		$str="数据添加成功!";
		$str2="数据添加失败!";
		$url = "kecheng-input.php";
		$sql1="insert into kecheng(课程名,时间) value('$kcName','$kcTime')";
	}else if($action=="update"){
		$str="数据更新成功";
		$str2="数据更新失败!";
		$url = "kecheng-list-ajax.php";
		$kid = $_POST["kid"];
		$sql1="update kecheng set 课程名='{$kcName}',时间='{$kcTime}' where 课程编号={$kid}";
	}else{
		die("请选择操作方法");
	}


include("conn.php");
$result = mysqli_query($conn,$sql1);


//输出数据
// var_dump($result);
if($result){
	echo "<script>alert('{$str}');</script>";
	header("Refresh:1;url={$url}");
}else{
	echo $str2.mysqli_error($conn);
}

//关闭数据库
mysqli_close($conn);
?>