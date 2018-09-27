<?php 
	include("conn.php");
		// 邮箱
		$emali = empty($_POST['emali']) ? "null":strtolower($_POST['emali']);
		// 用户名
	    $userm = empty($_POST['userm']) ? "null":$_POST['userm'];
	    // 密码
	    $password = empty($_POST['password']) ? "null":$_POST['pass word'];
	    // 密码提示
	    $question = empty($_POST['question']) ? "null":$_POST['question'];
	    // 答案
	    $answer = empty($_POST['answer']) ? "null":$_POST['answer'];
	    // 选择有没有邮件名称一样的
	    
		if ($password=="null") {
			$scc="select email,name,password,question,answer from user where email = '{$emali}'";
			$rcc = mysqli_query($conn,$scc);
			if (mysqli_num_rows($rcc) >=1){ 
				echo "on";
			}else{
				echo "ok";
			}
		}else{
			$sql="insert into user(email,name,password,question,answer) value('$emali','$userm','$password','$question','$answer')";
			$result = mysqli_query($conn,$sql);
			if ($result) {
				echo "ok";
			}else{
				echo "on";
			}
		}
	mysqli_close($conn);
?>