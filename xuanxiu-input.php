<?php include("head.php"); 
include "conn.php";
$sql="SELECT DISTINCT 课程编号 from kecheng";
$result = mysqli_query($conn,$sql);
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
			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|digits|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcbianhao" class="control-label">课程编号：</label>
			    <div class="controls">
			     <!--  <input type="text" id="kcbianhao" name="kcbianhao" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
			     <select id="kcbianhao" name="kcbianhao">
<?php
if( mysqli_num_rows($result) > 0 ){
	while ( $row = mysqli_fetch_assoc($result) ) {
		echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
	}
}else{
	echo "<option value=''>请先添加班级信息</option>";
}
 ?>     	
			     </select>
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="inputEmail" class="control-label">成绩：</label>
			    <div class="controls">
			      <input type="text" id="chengji" name="chengji" class="input-large input-fat" placeholder="输入成绩" data-rules="required|minlength=2|maxlength=10">
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