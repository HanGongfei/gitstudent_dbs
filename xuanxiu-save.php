<?php 
$xuehao=$_POST["xuehao"];
$kcbianhao=$_POST["kcbianhao"];
$chengji=$_POST["chengji"];
$action = empty($_POST["action"])?"add":$_POST["action"];
if($action == "add"){
	$str="数据添加成功";
	$str2="数据添加失败";
	$url = "xuanxiu-input.php";
	$sql1="insert into xuanxiu(学号,课程编号,成绩) value('$xuehao','$kcbianhao','$chengji')";
	echo $sql1;
}else if($action == "update"){
	$str="数据更新成功";
	$str2="数据更新失败!";
	$url = "xuanxiu-list-ajax.php";
	$kid = $_POST["kid"];
	$sql1="update xuanxiu set 学号='{$xuehao}',课程编号='{$kcbianhao}',成绩='{$chengji}' where id={$kid}";
}
include("conn.php");

$result= mysqli_query($conn,$sql1);
if($result){
	echo $str;
	header("Refresh:100;url={$url}");
}else{
	echo $str2.mysqli_error($conn);
}
mysqli_close($conn);
?>