<?php include("head.php");
	  include ("conn.php");
	$sql = "SELECT DISTINCT 课程编号,课程名 FROM kecheng";
	// $sql1 = "SELECT DISTINCT  FROM kecheng";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn)?>		
		<div class="sui-layout">
		  <div class="sidebar">
				<!--左菜单  -->
				<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩查询</p>
			<form id="form1" action="cjchaxun-list.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="xuehao" class="control-label">学号：</label>
			    <div class="controls">
			  <!-- 增加一个隐藏的input -->
			  <input type="hidden" name="xxhh" value="hello">
			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" >
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcName" class="control-label">课程名：</label>
			    <div class="controls">
			     <select id="kcName" name="kcName">
					<?php
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['课程编号']}'>{$row['课程名']}</option>";
						}
					}else{
						echo "<option value=''>请先添加课程信息</option>";
					}
					 ?>     	
			     </select>
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="sName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="sName" name="sName" class="input-large input-fat"  >
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