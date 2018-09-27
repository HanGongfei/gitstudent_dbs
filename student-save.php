<?php
include "conn.php";
/* creater db168@ 2018-09-04*/
//接收student-input.php提交过来的信息
$sID = $_REQUEST['sID'];
$sName = $_REQUEST['sName'];
$bjNumber = $_REQUEST['bjNumber'];
$sBrithday = $_REQUEST['sBrithday'];
$sSex = $_REQUEST['sSex'];
$sPhone = $_REQUEST['sPhone'];
$kid = empty($_REQUEST['kid'])?null:$_REQUEST['kid'];
if((($_FILES['file']['type'] == "image/gif")
|| ($_FILES['file']['type'] == 'image/jpeg')
|| ($_FILES['file']['type'] == 'video/mp4')
|| ($_FILES['file']['type'] == 'image/pjpeg'))
&& ($_FILES['file']['size'] < 10241000*10))
{
	if ($_FILES["file"]["error"] > 0) {
	  echo "错误: " . $_FILES["file"]["error"] . "<br />";
	 }else{
	 	//重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
	 	$filename = "image/".date('YmdHis').$_FILES["file"]["name"];
		//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
	move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  	 	
	}
}else{
	echo "您上传的文件不符合要求！";
}	


$action = $_REQUEST['action']; //add 新增记录 update 修改记录

if( $action == "add"){
	$str = "数据插入成功！";
	$str2 = "数据插入失败！";
	$url = "student-input.php";
	$sql = "insert into student(班号,学号,姓名,照片,性别,出生日期,电话) value('{$bjNumber}','{$sID}','{$sName}','{$filename}',{$sSex},'{$sBrithday}','{$sPhone}')";
}else if($action == "update"){
	$str = "数据修改成功！";
	$str2 = "数据修改失败！";
	$url = "student-list-ajax.php";
	$sql = "update student set 班号='{$bjNumber}',学号='{$sID}',姓名='{$sName}',照片='{$filename}',性别='{$sSex}',出生日期='{$sBrithday}',电话='{$sPhone}' where id={$kid}";
}else{
	die("请选择操作方法"); //die() 输出提示语并终止下面的代码执行。
}
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if($result){
		//echo "数据插入成功！";
		echo "<script>alert('{$str}');</script>";
		//页面指定2秒后跳转
		header("Refresh:100;url={$url}");
	}else{
		echo $str2.mysqli_error($conn);
	}

//4、关闭连接，释放资源
mysqli_close($conn );

?>