<?php
include("conn.php");
$email = $_REQUEST['email'];
$userm = $_REQUEST['userm'];
$password = $_REQUEST['password'];
$question = $_REQUEST['question'];
$answer = $_REQUEST['answer'];
$sID = $_REQUEST['sID'];
$str = "数据修改成功";
$str2 = "数据修改失败";
$url = "user-list.php";
$sql = "update user set email = '{$email}',name = '{$userm}',password = '{$password}',question = '{$question}',answer = '{$answer}' where id = '{$sID}'";
echo $sql;
$result = mysqli_query($conn,$sql);
if($result){
	echo $str;
	header("Refresh:2;url={$url}");
}else{
	echo $str2.mysqli_error($conn);	
}
?>