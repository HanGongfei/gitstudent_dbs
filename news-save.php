<?php
include "conn.php";
$sbiaoti = $_REQUEST['sbiaoti'];
$sjianti = $_REQUEST['sjianti'];
$slanmu = $_REQUEST['slanmu'];
$sName = $_REQUEST['sName'];
$sdata = $_REQUEST['sdata'];
$scont = $_REQUEST['scont'];
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10241000*10))
{
	if ($_FILES["file"]["error"] > 0) {
	  echo "错误: " . $_FILES["file"]["error"] . "<br/>";
	 }else{
	 	//重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
	 	$filename = "image/".date('YmdHis').$_FILES["file"]["name"];
		//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
	move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
	}
}else{
	// echo "您上传的文件不符合要求！";
}
$action =$_REQUEST['action'];
if( $action == "add"){
	$str = "数据插入成功";
	$str2 = "数据插入失败";
	$url = "news-input.php";
	$sql = "insert into news (标题,肩题,图片,内容,发布时间,创建时间,userid,columnid) values('{$sbiaoti}','{$sjianti}','{$filename}','{$scont}','{$sdata}','".time()."','{$sName}','{$slanmu}') ";
}else{
	$sID = $_REQUEST['sID'];
	$str = "数据修改成功";
	$str2 = "数据修改失败";
	$url = "news-list.php";
	if(empty($filename)){
		$sql = "update news set 标题='{$sbiaoti}',肩题='{$sjianti}',内容='{$scont}',发布时间='{$sdata}',userid='{$sName}',columnid='{$slanmu}' where id='{$sID}'";
	}else{
		$sql = "update news set 标题='{$sbiaoti}',肩题='{$sjianti}',图片='{$filename}',内容='{$scont}',发布时间='{$sdata}',userid='{$sName}',columnid='{$slanmu}' where id='{$sID}'";
	}
		
}
// echo $sql;
$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('{$str}')</script>";
	header("Refresh:1;url={$url}");
}else{
	echo $str2.mysqli_error($conn);
}
//关闭连接
mysqli_close($conn);
?>