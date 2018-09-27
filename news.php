<?php
include("conn.php");
$kid = empty($_REQUEST['kid'])?"null":$_REQUEST['kid'];
$sql = "select *  from news where id = '{$kid}'";
echo $sql;
$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
	}else{
		echo "没有记录";
	}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		.box{
			width:100%;
			height:300px;
			background-color:blue;
			text-align:center;
		}
		.box h1{
			padding-top:50px;
			color:white;
		}
		.colum{
			width:100%;
			height:30px;
			background-color:#1864AD;
		}
		.bb2{
			width:1200px;
			height:30px;
			margin:0 auto;
		}
		.bb2 a{
			display:inline-block;
			margin-left:0;
			margin-right:80px;
			color:white;
			text-decoration:none;
		}
		.foot{
			width:100%;
			height:200px;
			background-color:#1864AD;
		}
	</style>
</head>
<body>
	<div class="box">
		<h1>北京网络职业学院</h1>
	</div>
	<div class="colum">
		<div class="bb2">
			<a href="index.php">首页</a>
			<a href="">学院概况</a>
			<a href="">师资队伍</a>
			<a href="">专业设置</a>
			<a href="">招生就业</a>
			<a href="">北网新闻</a>
			<a href="">走进北网</a>
			<a href="">联系我们</a>
		</div>
	</div>
	<div style="width:1000px;height:500px;margin:0 auto;">
		<h1 >
			<?php echo $row['标题']; ?>
		</h1>
		
		<h2>
			<?php echo $row['肩题']; ?>
		</h2>
		
		<h3>
			<?php echo $row['内容']; ?>
		</h3>
		<img src="<?php echo $row['图片']; ?>" alt="">
	</div>
	<div class="foot">
		
	</div>
</body>
</html>
