<?php 
include("conn.php");
	$kid=empty($_REQUEST["kid"])?"null":$_REQUEST["kid"];
	if($kid == "null"){
		echo "请选择要修改的记录";
	}else{
		include("conn.php");
		$sql="select * from student where id ='{$kid}'";
		echo $sql;
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
		 	$row = mysqli_fetch_assoc($result);
		}else{
			echo "没有记录";
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
			<form id="form1" action="student-save.php" method="post" class="sui-form form-horizontal sui-validate">
			<!-- 增加 一个隐藏的input，用来区分是新增的数据还是修改的数据 -->
			    <input type="hidden" name="action" value="update">
			     <!-- 新增一个隐藏的input.保存id -->
			     <input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
			  <div class="control-group">
			    <label for="sNumber" class="control-label">学号：</label>
			    <div class="controls">
			    
			      <input type="text" value="<?php echo $row['学号'] ?>" id="sID" name="sID" class="input-large input-fat" placeholder="输入学号" data-rules="required|digits|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="bjNumber" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" id="bjNumber" name="bjNumber" value="<?php echo $row['班号'] ?>" class="input-large input-fat"   placeholder="输入班号" data-rules="required">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="sName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['姓名'] ?>" id="sName" name="sName" class="input-large input-fat"   placeholder="输入姓名" data-rules="required">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="szhaopian" class="control-label">照片：</label>
			    <div class="controls">
			    <img src="<?php echo $row['照片']; ?>" alt="" width="100px" height="50px">
			      <input type="file" name="file"  value="<?php echo $row['照片'];?>" />
			    </div>
			  </div>	
			  <div class="control-group">
			    <label for="sBrithday" class="control-label">出生日期：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['出生日期'] ?>" id="sBrithday" name="sBrithday" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入出生日期">
			    </div>
			  </div>
			  <div class="control-group">
			  	<label for="sSex" class="control-label">性别</label>
			  	<div class="controls">
			      <label class="radio-pretty inline <?php echo $row['性别']==1?"checked":""; ?>">
				    <input type="radio" value="1" checked="<?php echo $row['性别']==1?"checked":""; ?>" name="sSex"><span>男</span>
				  </label>
				  <label class="radio-pretty inline <?php echo $row['性别']==0?"checked":""; ?>">
				    <input type="radio" value="0" name="sSex" checked="<?php echo $row['性别']==1?"checked":""; ?>"><span>女</span>
				  </label>
			  	</div>
			  </div>	
			  <div class="control-group">
			    <label for="sPhone" class="control-label">电话：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['电话'] ?>" id="sPhone" name="sPhone" class="input-large input-fat"   placeholder="输入电话" data-rules="mobile">
			    </div>
			  </div>			  		  	
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
}
<?php include("foot.php"); ?>