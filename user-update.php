<?php
include("conn.php");
$sID = empty($_REQUEST['sID'])?"null":$_REQUEST['sID'];
if($sID == "null"){
	echo "请选择要修改的纪录";
}else{
	include("conn.php");
	$result2 = mysqli_query($conn,"select * from user where id = '{$sID}'");
	if(mysqli_num_rows( $result2) > 0){
		$row = mysqli_fetch_assoc( $result2);
	}else{
		echo "没有纪录";
	}
	mysqli_close($conn);
}
?>	
	<?php include("head.php"); ?>
			<div class="sui-layout">
		  <div class="sidebar">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生录入</p>
			<form class="sui-form form-horizontal sui-validate" action="user-save.php" method="post">
	<!-- 增加一个input 用来区分是新增纪录还是修改纪录 -->
	<input type="hidden" name="action"  value="add">;
	<!-- 增加一个input 保存 id 值 -->
	<input type="hidden" name="sID" value="<?php echo $row['id']; ?>" >
				  <div class="control-group">
				    <label for="inputEmail " class="control-label .input-fat">邮箱：</label>
				    <div class="controls">
				      <input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30" value="<?php echo $row['email']; ?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <label for="userm " class="control-label .input-fat">用户名：</label>
				    <div class="controls">
				      <input type="text" id="userm" placeholder="请输入用户名" class="input-fat input-large" name="userm" data-rules="required|minlength=2|maxlength=10" value="<?php echo $row['name']; ?>">
				    </div>
				  </div>

				  <div class="control-group">
				    <label for="password" class="control-label">密码：</label>
				    <div class="controls">
				      <input type="password" id="password" placeholder="请输入密码	" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=2|maxlength=12" value="<?php echo $row['password']; ?>">
				    </div>
				  </div>
				 <div class="control-group">
			    <label for="question" class="control-label">密码提示问题：</label>
			    <div class="controls">
			     <select id="question" name="question" value="<?php echo $row['question']; ?>">
						<option value="你的小学在哪上学">你的小学在哪上学</option>
						<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
						<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
			     </select>
			    </div>
			  </div>
				<div class="control-group">
				    <label for="answer " class="control-label .input-fat">密码答案：</label>
				    <div class="controls">
				      <input type="text" id="answer" placeholder="请输入密码答案" class="input-fat input-large" name="answer" data-rules="required|minlength=2|maxlength=15" value="<?php echo $row['answer']; ?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label"></label>
				    <div class="controls">
				      <button type="submit" class="sui-btn btn-primary" id="cha">提交</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>	
<?php include("foot.php") ?>

