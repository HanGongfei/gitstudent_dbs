<?php include("head.php");?> 
<?php 
	$kid=empty($_GET['kid'])?"null":$_GET["kid"];
	include("conn.php");
	if($kid =="null"){
		echo "亲选择要修改的记录";
	}else{
		$sql="select id,学号,课程编号,成绩 from xuanxiu where id='{$kid}'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			 $row = mysqli_fetch_assoc($result);
		}else{
			echo "没有记录";
		}
	
	}
	mysqli_close($conn);
?>
		
		<div class="sui-layout">
		  <div class="sidebar">
				<!--左菜单  -->
				<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩录入</p>
			<form id="form1" action="xuanxiu-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="xuehao" class="control-label">学号：</label>
			    <div class="controls">
			    <!-- 增加一个隐藏的input，用来区分是新增的数据还是修改的数据 -->
			    <input type="hidden" name="action" value="update">
			    <!-- 新增一个隐藏的input，保存id -->
			    <input type="hidden" name="kid" value="<?php echo $row['id'];?>">
			      <input type="text" value="<?php echo $row['学号'];?>" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|digits|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcbianhao" class="control-label">课程编号：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['课程编号']; ?>" id="kcbianhao" name="kcbianhao" class="input-large input-fat"   placeholder="输入课程编号" data-rules="required"> 
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="inputEmail" class="control-label">成绩：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['成绩']; ?>" id="chengji" name="chengji" class="input-large input-fat" placeholder="输入成绩" data-rules="required|minlength=2|maxlength=10">
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
<?php include("foot.php"); ?>